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

        public function Test($dateTime, $idMovie, $idAuditorium, $movieRuntime)
        {
            echo "No hay nada :)";
        }
    }
?>