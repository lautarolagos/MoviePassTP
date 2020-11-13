<?php
    namespace Controllers;

    use DAO\ProjectionDAO as ProjectionDAO;
    use DAO\AuditoriumDAO as AuditoriumDAO;
    use DAO\APIDAO as APIDAO;
    use DAO\MovieDAO as MovieDAO;
    use Models\Projection as Projection;
    use Models\Auditorium as Auditorium;
    use Models\Movie as Movie;

    class ProjectionController
    {
        private $projectionDAO;
        private $auditoriumDAO;
        private $APIDAO;
        private $MovieDAO;

        public function __construct()
        {
            $this->projectionDAO = new ProjectionDAO();
            $this->auditoriumDAO = new AuditoriumDAO();
            $this->APIDAO = new APIDAO();
            $this->MovieDAO = new MovieDAO();
        }

        public function ShowAddProjection($movieId, $idAuditorium, $movieRuntime, $posterImg, $msg="")
        {
            require_once(VIEWS_PATH."AddProjection.php");
        }

        public function AddNewProjection($date, $startTime, $endTime, $idAuditorium, $idMovie)
        {
            //Si ya llegamos hasta aca quiere decir que se valido todo correctamente y podemos agregar esta projection
            $auditorium = new Auditorium();
            $auditorium = $this->auditoriumDAO->GetAuditoriumById($idAuditorium);

            $auditorium = $this->auditoriumDAO->SetCinemaForAuditorium($auditorium);
            /*echo "<pre>";
            var_dump($auditorium);
            echo "</pre>";*/


            $movie = new Movie();
            $movie = $this->APIDAO->ReturnMovieByIdFromAPI($idMovie);
            //Añadimos la peícula a nuestra DB
            $exists = $this->MovieDAO->Search($idMovie); // Verifico si ya esta agregada la peli para no duplicarla
            if($exists == false)
            {
                $this->MovieDAO->Add($movie);
            }


            $projection = new Projection();
            $projection->setDate($date);
            $projection->setStartTime($startTime);
            $projection->setEndTime($endTime);
            $projection->setAuditorium($auditorium);
            $projection->setMovie($movie);
            $projection->setTicket(NULL);

            $check = $this->projectionDAO->Add($projection);

            if($check == true)
            {
                $msg = "Proyection added succesfully";
                $this->LoadProjections($msg);
            }
            else
            {
                $msg = "Something went wrong :/";
                $this->LoadProjections($msg);
            }
        }

        public function projectionCheck($dateTime, $movieId, $idAuditorium, $movieRuntime, $posterImg)
        {
            //Separamos la fecha de la hora (fecha en $dateTimeArray[0] y hora en $dateTimeArray[1])
            $dateTimeArray = explode("T", $dateTime);
            
            //Calculamos la hora de fin de la nueva projection que se esta validando (con los 15 minutos incluidos)
            $endTimeNewProjection = $this->sumHours($dateTimeArray[1], $movieRuntime);

            //Validacion Nº1: Una misma película no se puede proyectar en dos cines distintos el mismo dia (tampoco en el mismo cine pero en diferente auditorium). Para esto
            //buscamos por Id de la pelicula y la fecha en la cual se va a proyectar, si ya existe esa pelicula en esa fecha devolverá un mensaje de error y no se guardara
            $exists = $this->projectionDAO->Search($dateTimeArray[0], $movieId);
            if($exists == false)
            {
                //Validacion Nº2: Comprobar que la nueva película comience 15 minutos despúes que la anterior
                $allAuditoriums = $this->AssignProjectionsToAuditoriums($idAuditorium);
                
                //Recorremos todos los auditoriums almacenados en nuestra DB hasta encontrar el auditorium en el que vamos a agregar una nueva projection
                foreach($allAuditoriums as $auditoriums)
                {
                    if($auditoriums->getIdAuditorium() == $idAuditorium)
                    {
                        $validate = $this->checkTime($auditoriums->getProjection(), $dateTimeArray[1], $endTimeNewProjection);
                    }
                }

                if($validate == true)
                {
                    $this->AddNewProjection($dateTimeArray[0], $dateTimeArray[1], $endTimeNewProjection, $idAuditorium, $movieId);
                }
                else
                {
                    $msg = "Please enter another hour";
                    $this->ShowAddProjection($movieId, $idAuditorium, $movieRuntime, $posterImg, $msg);
                    
                }
            }
            else
            {
                $msg = "Sorry, that movie already exists in the billboard for today";
                $this->ShowAddProjection($movieId, $idAuditorium, $movieRuntime, $posterImg, $msg);
            }
        }

        public function AssignProjectionsToAuditoriums($idAuditorium)
        {
            //Guardamos en un array todos los auditoriums que estén activos
            $auditoriumsList = $this->auditoriumDAO->GetAll();

            //Recorremos ese array hasta encontrar el auditorium al cúal le vamos a asignar sus Projections
            foreach($auditoriumsList as $auditoriums)
            {
                if($auditoriums->getIdAuditorium() == $idAuditorium)
                {
                    $auditoriums->setProjection($this->projectionDAO->GetProjectionsByIdAuditorium($idAuditorium));
                    break;
                }
            }
            return $auditoriumsList;
        }

        public function checkTime($projections, $newStartTime, $newEndTime)
        {
            $flag = true;
            if($projections != NULL)
            {
                foreach($projections as $projections)
                {
                    //Comprobamos que la hora de inicio de la nueva projections no este entre medio de las horas de inicio y fin de las projections 
                    //guardadas en nuestra DB
                    if(strtotime($newStartTime) > strtotime($projections->getStartTime()))
                    { 
                        if(strtotime($newStartTime) >= strtotime($projections->getEndTime()))
                        {
                            $flag = true;
                        }
                        //Si esta entre medio corta el foreach y devuelve false
                        else
                        {
                            return false;
                        }
                    }
                    //En el caso de que la nueva projections se ubique en medio del array comprobamos que su hora de fin no pise la hora de inicio 
                    //de otra projections
                    else
                    {
                        if(strtotime($newEndTime) > strtotime($projections->getEndTime()))
                        {
                            $flag = false;
                        }
                        else
                        {
                            $flag = true;
                        }
                    }
                }
            }
            return $flag;
        }

        public function sumHours($starTime, $movieRuntime)
        {
            //Pasamos a un array las horas (posicion 0 del array) y los minutos (posicion 1 del array) tanto de la hora a la que arranca
            //la funcion ($starTime) como de la duracion de la pelicula ($movieRuntime) y creamos un nuevo array donde se guardara la suma
            //de esas dos horas
            $starTimeArray = explode(":",$starTime);
            $runtimeMovieArray = explode(":", $movieRuntime);
            $totalArray = array();

            //Sumamos horas con horas y minutos con minutos, y los guardamos en el nuevo array respetando las horas en la posicion 0 y los
            //minutos en la posicion 1
            $totalArray[0] = (int)$starTimeArray[0] + (int)$runtimeMovieArray[0];
            $totalArray[1] = (int)$starTimeArray[1] + (int)$runtimeMovieArray[1];

            //Comprobaciones:
            //1º Si el resultado de la suma de los minutos es menor que 10 agregamos un 0 adelante para respetar el formato establecido
            if($totalArray[1] < 10)
            {
                $totalArray[1] = "0".$totalArray[1];    
            }
            //2º Si el resultado de la suma de los minutos es mayor a 59 sumamos una hora en la posicion de las horas y restamos 60 al total de minutos para que nos
            //quede el resto de minutos
            if($totalArray[1] > 59)
            {
                $totalArray[0] = $totalArray[0] + 1;
                $totalArray[1] = $totalArray[1] - 60;
                //2.1º Si ese sobrante es menor a 10 le agregamos un cero adelante para respetar el formato
                if($totalArray[1] < 10)
                {
                    $totalArray[1] = "0".$totalArray[1];    
                }
            }
            //3º Si el resultado de la suma de las horas es menor a 10 agregamos un 0 adelante para respetar el formato establecido
            if($totalArray[0] < 10)
            {
                $totalArray[0] = "0".$totalArray[0]; 
            }
            //4º Si el resultado de la suma de las horas es mayor a 23, a ese resultado le restamos 24 para obtener el total de horas 
            if($totalArray[0] > 23)
            {
                $totalArray[0] = $totalArray[0] - 24;
                //4.1º Si ese resultado es menor a 10 le agregamos un cero adelante para respetar el formato
                if($totalArray[0] < 10)
                {
                    $totalArray[0] = "0".$totalArray[0]; 
                }
            }
            
            //Sumamos una constante de 15 minutos para obtener el tiempo final con el tiempo que debe transcurrir una vez que termina una projection incluido
            $totalArray[1] = $totalArray[1] + TIME_AFTER_MOVIE;
            //Retornamos un array de enteros con las horas cargadas en la posicion 0 y los minutos cargados en la posicion 1
            return implode(":",$totalArray);
        }

        public function ShowProjection($posterPath, $title, $overview, $idMovie)
        {
            $projections = $this->projectionDAO->GetProjectionsByIdMovie($idMovie); // Me trae todas las funciones de cierta pelicula
            // el array de projections viene cargado con su obj movie, obj auditorium y adentro de auditorium un obj cine
            require_once(VIEWS_PATH."ShowProjection.php");
        }

        public function ShowBillboard($moviesOnBillboard)
        {
            require_once(VIEWS_PATH."Billboard.php");
        }

        public function LoadProjections($msg="")
        {
            $moviesOnBillboard = $this->MovieDAO->GetMoviesBillboard(); // Obtengo la lista de peliculas que estan activas en cartelera
            $moviesOnBillboard = $this->DeleteDuplicates($moviesOnBillboard); // Elimino las que esten duplicadas

            $this->ShowBillboard($moviesOnBillboard); // Mando la lista filtrada a la vista
        }
        public function DeleteDuplicates($moviesOnBillboard, $keep_key_assoc = false)
        {    
            $duplicates = array(); // array donde van a ir las peliculas duplicadas
            $aux = array(); // array auxiliar donde van a ir las NO repetidas
        
            foreach ($moviesOnBillboard as $key => $val) 
            {
                if (is_object($val)) // Como la funcion "in_array" no deja usar objetos, lo convierto a un array
                {
                    $val = (array)$val;
                }
                if (!in_array($val, $aux)) // con in_array busco si un elemento esta en el array, en el primer caso obviamente no va a estar repetido
                {
                    $aux[] = $val; // lo meto en un array auxiliar de peliculas NO repetidas
                }
                else
                {
                    $duplicates[] = $key; // Luego si la proxima pelicula esta repetida, va a ir aca
                }
            }
        
            foreach ($duplicates as $key) // Recorro el array de duplicados y a cada valor, lo saco del array de peliculas
            {
                unset($moviesOnBillboard[$key]);
            }   
        
            return $keep_key_assoc ? $moviesOnBillboard : array_values($moviesOnBillboard);
        }
    }
?>