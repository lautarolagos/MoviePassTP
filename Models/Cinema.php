<?php
    namespace Models;

    class Cinema
    {
        private $name;
        private $capacity;
        private $adress;
        private $id;
        private $active;
        private $auditoriums = array();
        
        function __construct($name = NULL, $capacity = NULL, $adress = NULL, $id = NULL, $active = NULL, $auditoriums = NULL)
        {
            $this->name = $name;
            $this->capacity = $capacity;
            $this->adress = $adress;
            $this->id = $id;
            $this->active = $active;
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

        public function setActive($active)
        {
            $this->active=$active;
        }

        public function getActive()
        {
            return $this->active;
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