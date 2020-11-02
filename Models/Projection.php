<?php
    namespace Models;

    class Projection   
    {
        private $date;
        private $hour;
        private $auditorium;
        function __construct($date, $hour)
        {
            $this->date = $date;
            $this->hour = $hour;
        }

        public function getDate()
        {
            return $this->date;
        }

        public function getHour()
        {
            return $this->hour;
        } 

        public function setDate($date)
        {
            $this->date = $date;
        }

        public function setHour($hour)
        {
            $this->hour = $hour;
        }
    }
?>