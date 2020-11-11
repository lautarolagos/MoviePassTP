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
            $genreList = $this->APIDAO->GetGenres();
            require_once(VIEWS_PATH."ShowMoviesAPI.php");
        }
    }
?>