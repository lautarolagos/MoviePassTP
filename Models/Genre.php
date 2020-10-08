<?php
    namespace Models;

    class Genero
    {
        private $idGender;
        private $nameGender;
    
        function construct__($idGender = NULL, $nameGender = NULL)
        {
            $this->idGender = $idGender;
            $this->nameGender = $nameGender;
            
        }

        public function getIdGender()
        {
            return $this->idGender;
        }

        public function setIdGender($idGender)
        {
            $this->idGender = $idGender;
        }

        public function getNameGender()
        {
            return $this->nameGender;
        }

        public function setNameGender($nameGender)
        {
            $this->nameGender = $nameGender;
        }

        public function __toString()
        {
            return  " | ID Gender: $this->idGender "."| Name Gender: $this->nameGender";
        }
    }
?>