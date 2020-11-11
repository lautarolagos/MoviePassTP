<?php
    namespace Models;

    class Projection   
    {
        private $idProjection;
        private $date;
        private $startTime;
        private $endTime;
        private $auditorium;
        private $movie;
        private $ticket; //Array de tickets
        private $isActive;
        
        function __construct($idProjection = NULL, $date = NULL, $startTime = NULL, $endTime = NULL, $auditorium = NULL, $movie = NULL, $ticket = NULL, $isActive = NULL)
        {
            $this->idProjection = $idProjection;
            $this->date = $date;
            $this->startTime = $startTime;
            $this->endTime = $endTime;
            $this->auditorium = $auditorium;
            $this->movie = $movie;
            $this->ticket = $ticket;
            $this->isActive = $isActive;
        }

        public function getIdProjection()
        {
            return $this->idProjection;
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

        public function getTicket()
        {
            return $this->ticket;
        }

        public function getIsActive()
        {
            return $this->isActive;
        }


        public function setIdProjection($idProjection)
        {
            $this->idProjection = $idProjection;
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

        public function setTicket($ticket)
        {
            $this->ticket = $ticket;
        }

        public function setIsActive($isActive)
        {
            $this->isActive = $isActive;
        }
    }
?>