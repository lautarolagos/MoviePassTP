<?php
    namespace Models;

    class Movie 
    {
        private $idMovie;
        private $adult;
        private $language;
        private $title;
        private $runtime;
        private $genreIds; //Array de los ids de generos 
        private $overview;
        private $releaseDate;
        private $posterPath;
        private $isActive;

        function __construct($idMovie = NULL, $adult = NULL, $language = NULL, $title = NULL, $runtime = NULL, $genreIds = NULL, $overview = NULL, $releaseDate = NULL, $posterPath = NULL, $isActive = NULL){
            $this->idMovie = $idMovie;
            $this->adult = $adult;
            $this->language = $language;
            $this->title = $title;
            $this->runtime = $runtime;
            $this->genreIds = $genreIds;
            $this->overview = $overview;
            $this->releaseDate = $releaseDate;
            $this->posterPath = $posterPath;
            $this->isActive = $isActive;
        }

        //Getters
        function getIdMovie(){
            return $this->idMovie;
        }

        function getAdult(){
            return $this->adult;
        }

        function getLanguage(){
            return $this->language;
        }

        function getTitle(){
            return $this->title;
        }

        function getRuntime(){
            return $this->runtime;
        }
        
        function getGenreIds(){
            return $this->genreIds;
        }

        function getOverview(){
            return $this->overview;
        }

        function getReleaseDate(){
            return $this->releaseDate;
        }

        function getPosterPath(){
            return $this->posterPath;
        }

        function getIsActive(){
            return $this->isActive;
        }

        //Setters
        function setIdMovie($idMovie){
            $this->idMovie = $idMovie;
        }

        function setAdult($adult){
            $this->adult = $adult;
        }

        function setLanguage($language){
            $this->language = $language;
        }

        function setTitle($title){
            $this->title = $title;
        }

        function setRuntime($runtime){
            $hours = floor($runtime / 60);
            $minutes = $runtime % 60;
            $total = $hours.":".$minutes;
            $this->runtime = $total;
        }
        
        function setGenreIds($genreIds){
            $this->genreIds = $genreIds;
        }

        function setOverview($overview){
            $this->overview = $overview;
        }

        function setReleaseDate($releaseDate){
            $this->releaseDate = $releaseDate;
        }

        function setPosterPath($posterPath){
            $this->posterPath = $posterPath;
        }

        function setIsActive($isActive){
            $this->isActive = $isActive;
        }

        public function StyleRuntime($Runtime)
        {
            $runtimeArray = explode(":",$Runtime);
            return $newRuntime = $runtimeArray[0]."h ".$runtimeArray[1]."m";
        }
    }
?>