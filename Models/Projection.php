<?php
    namespace Models;

    class Projection   
    {
        private $dateTime;
        private $endTime;
        private $auditorium;
        private $movie;
        private $ticket; //Array de tickets
        
        function __construct($dateTime, $endTime, $auditorium, $movie, $ticket)
        {
            $this->dateTime = $dateTime;
            $this->endTime = $endTime;
            $this->auditorium = $auditorium;
            $this->movie = $movie;
            $this->ticket = $ticket;
        }

        public function getDateTime()
        {
            return $this->dateTime;
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


        public function setDateTime($dateTime)
        {
            $this->dateTime = $dateTime;
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
    }
?>