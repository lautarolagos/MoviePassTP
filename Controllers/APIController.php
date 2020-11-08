<?php
    namespace Controllers;

    use DAO\APIDAO as APIDAO;

    class APIController
    {
        private $APIDAO;

        function __construct()
        {
            $this->APIDAO = new APIDAO();
        }

        public function ShowMovies($idAuditorium)
        {
            $moviesArray = $this->APIDAO->ShowMovies();
            require_once(VIEWS_PATH."ShowMoviesAPI.php");
        }
        
        public function ShowAddProjection($movieId, $idAuditorium, $movieRuntime)
        {
            require_once(VIEWS_PATH."AddProjection.php");
        }

        public function Test($dateTime, $idMovie, $idAuditorium, $movieRuntime)
        {
            // echo $dateTime;
            $dateTimeArray = explode("T", $dateTime);
            // print_r($dateTimeArray);
            $projectionHour = $dateTimeArray[1];
            // echo "<br>Projection hour: ".$projectionHour;
            // echo "<br>Runtime movie: ".$movieRuntime;
            $this->sumHours($projectionHour, $movieRuntime);
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
            //1º Si los minutos son menor que 10 agregarle un 0 adelante para tener un mejor formato de hora
            if($totalArray[1] < 10)
            {
                $totalArray[1] = "0".$totalArray[1];    
            }
            //2º Si los minutos son mayor 
            if($totalArray[1] > 59)
            {
                $totalArray[0] = $totalArray[0] + 1;
                $totalArray[1] = $totalArray[1] - 60;
                if($totalArray[1] < 10)
                {
                    $totalArray[1] = "0".$totalArray[1];    
                }
            }
            if($totalArray[0] < 10)
            {
                $totalArray[0] = "0".$totalArray[0]; 
            }
            if($totalArray[0] > 23)
            {
                $totalArray[0] = $totalArray[0] - 24;
                if($totalArray[0] < 10)
                {
                    $totalArray[0] = "0".$totalArray[0]; 
                }
            }
            
            return $totalArray;
        }
    }
?>