<?php
    namespace Models;

    class Cinema
    {
        private $name;
        private $capacity;
        private $adress;
        private $idCinema;
        private $auditoriums = array(); // Array de Auditoriums
        
        function __construct($name = NULL, $capacity = NULL, $adress = NULL, $idCinema = NULL, $auditoriums = NULL)
        {
            $this->name = $name;
            $this->capacity = $capacity;
            $this->adress = $adress;
            $this->idCinema = $idCinema;
            $this->auditoriums = $auditoriums;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getCapacity()
        {
            return $this->capacity;
        }

        public function setCapacity($capacity)
        {
            $this->capacity = $capacity;
        }

        public function getAdress()
        {
            return $this->adress;
        }

        public function setAdress($adress)
        {
            $this->adress = $adress;
        }

        public function getIdCinema()
        {
            return $this->idCinema;
        }

        public function setIdCinema($idCinema)
        {
            $this->idCinema = $idCinema;
        }

        public function setAuditoriums($auditoriums)
        {
            $this->auditoriums=$auditoriums;
        }

        public function getAuditoriums()
        {
            return $this->auditoriums;
        }
    }
?>