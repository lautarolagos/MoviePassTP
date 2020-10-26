<?php
    namespace Models;

    class Cinema
    {
        private $name;
        private $capacity;
        private $adress;
        private $id;
        private $eliminated;
        private $auditoriums;

        function __construct($name = NULL, $capacity = NULL, $adress = NULL, $id = NULL, $eliminated = NULL, $auditoriums = NULL)
        {
            $this->name = $name;
            $this->capacity = $capacity;
            $this->adress = $adress;
            $this->id = $id;
            $this->eliminated = $eliminated;
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

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setEliminated($eliminated)
        {
            $this->eliminated=$eliminated;
        }

        public function getEliminated()
        {
            return $this->eliminated;
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