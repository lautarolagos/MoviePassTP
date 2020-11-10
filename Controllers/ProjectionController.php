<?php
    namespace Controllers;

    use DAO\ProjectionDAO as ProjectionDAO;
    use Models\Projection as Projection;

    class ProjectionController
    {
        private $projectionDAO;

        public function __construct()
        {
            $this->projectionDAO = new ProjectionDAO();
        }

        public function AddProjection($dateTime, $movieId, $idAuditorium, $movieRuntime, $idCinema)
        {
            //Separamos la fecha de la hora (fecha en $dateTimeArray[0] y hora en $dateTimeArray[1])
            $dateTimeArray = explode("T", $dateTime);
            //Validacion Nº1: Una misma película no se puede proyectar en dos cines distintos el mismo dia (tampoco en el mismo cine pero en diferente auditorium). Para esto
            //buscamos por Id de la pelicula y la fecha en la cual se va a proyectar, si ya existe esa pelicula en esa fecha devolverá un mensaje de error y no se guardara
            $exists = $this->projectionDAO->Search($dateTimeArray[0], $movieId);
            if($exists == false)
            {
                //Validacion Nº2: Comprobar que la nueva película comience 15 minutos despúes que la anterior
                
            }
        }

        public function ShowAddProjection($movieId, $idAuditorium, $movieRuntime)
        {
            require_once(VIEWS_PATH."AddProjection.php");
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
            
            //Retornamos un array de enteros con las horas cargadas en la posicion 0 y los minutos cargados en la posicion 1
            return implode(":",$totalArray);
        }
    }
?>