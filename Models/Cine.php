<?php
    namespace Models;

    class Cine
    {
        private $name;
        private $capacity;
        private $adress;
        private $inputValue;
        private $idCinemas;

        function construct__($name, $capacity, $adress, $inputValue, $idCinemas)
        {
            $this->name = $name;
            $this->capacity = $capacity;
            $this->adress = $adress;
            $this->inputValue = $inputValue;
            $this->idCinemas = $idCinemas;
        }

        public function getName()
        {
            return $this->userName;
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

        public function getInputValue()
        {
            return $this->inputValue;
        }

        public function setInputValue($inputValue)
        {
            $this->inputValue = $inputValue;
        }

        public function getIdCinemas()
        {
            return $this->idCinemas;
        }

        public function setIdCinemas($idCinemas)
        {
            $this->idCinemas = $idCinemas;
        }

        public function __toString()
        {
            return  " | Name: $this->name "."| Capacity: $this->capatity"."| Adress: $this->adress"."| Input Value: $this->inputValue"."| ID Cinemas: $this->idCinemas";
        }
    }
?>