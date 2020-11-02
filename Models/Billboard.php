<?php
    namespace Models;

    class Billboard 
    {
        private $movies; //Array de peículas
        
        function __construct($movies)
        {
            $this->movies = $movies;
        }

        public function getMovies()
        {
            return $this->movies;
        }

        public function setMovies($movies)
        {
            $this->movie = $movies;
        }
    }
?>