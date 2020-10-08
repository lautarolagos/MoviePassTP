<?php
    namespace Models;

    class Pelicula
    {
        private $name;
        private $description;
        private $duration;
        private $classification;
        

        function construct__($name = NULL, $description = NULL, $duration = NULL, $classification = NULL)
        {
            $this->name = $name;
            $this->description = $description;
            $this->duration = $duration;
            $this->classification = $classification;  
        }

        public function getName()
        {
            return $this->userName;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function setDescription($description)
        {
            $this->description = $description;
        }

        public function getDuration()
        {
            return $this->duration;
        }

        public function setDuration($duration)
        {
            $this->duration = $duration;
        }

        public function getClassification()
        {
            return $this->classification;
        }

        public function setClassification($classification)
        {
            $this->classification = $classification;
        }
        
        public function __toString()
        {
            return  " | Name: $this->name "."| Description: $this->description"."| Duration: $this->duration"."| Classification: $this->classification";
        }
    }
?>