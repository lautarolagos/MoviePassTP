<?php
    namespace Models;

    class Movie 
    {
        private $idMovie;
        private $adult;
        private $language;
        private $title;
        private $genreIds; //Array ids
        private $overview;
        private $releaseDate;
        private $posterPath;
// agregar duracion
        function __construct($idMovie = NULL, $adult = NULL, $language = NULL, $title = NULL, $genreIds = NULL, $overview = NULL, $releaseDate = NULL, $posterPath = NULL){
            $this->idMovie = $idMovie;
            $this->adult = $adult;
            $this->language = $language;
            $this->title = $title;
            $this->genreIds = $genreIds;
            $this->overview = $overview;
            $this->releaseDate = $releaseDate;
            $this->posterPath = $posterPath;
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
    }
?>