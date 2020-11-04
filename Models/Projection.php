<?php
    namespace Models;

    class Projection   
    {
        private $date;
        private $startTime;
        private $endTime;
        private $auditorium;
        private $movie;
        
        function __construct($date, $startTime, $endTime, $auditorium, $movie)
        {
            $this->date = $date;
            $this->startTime = $startTime;
            $this->endTime = $endTime;
            $this->auditorium = $auditorium;
            $this->movie = $movie;
        }

        public function getDate()
        {
            return $this->date;
        }

        public function getStartTime()
        {
            return $this->startTime;
        } 

        public function getEndTime()
        {
            return $this->endTime;
        }

        public function getAuditorium()
        {
            return $this->auditorium;
        }

        public function getMovie()
        {
            return $this->movie;
        }

        public function setDate($date)
        {
            $this->date = $date;
        }

        public function setStartTime($startTime)
        {
            $this->startTime = $startTime;
        }

        public function setEndTime($endTime)
        {
            $this->endTime = $endTime;
        }

        public function setAuditorium($auditorium)
        {
            $this->auditorium = $auditorium;
        }

        public function setMovie($movie)
        {
            $this->movie = $movie;
        }
    }
?>