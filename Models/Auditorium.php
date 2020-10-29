<?php
    namespace Models;
    
    class Auditorium
    {
        private $amountOfSeats;
        private $idAuditorium;
        private $ticketPrice;
        private $nameAuditorium;
    
        function __construct($amountOfSeats=NULL, $idAuditorium=NULL, $ticketPrice=NULL, $nameAuditorium=NULL)
        {
            $this->amountOfSeats=$amountOfSeats;   
            $this->idAuditorium=$idAuditorium;
            $this->ticketPrice=$ticketPrice;
            $this->nameAuditorium=$nameAuditorium;
        }

        public function getAmountOfSeats()
        {
            return $this->amountOfSeats;
        }
        public function getIdAuditorium()
        {
            return $this->idAuditorium;
        }
        public function getTicketPrice()
        {
            return $this->ticketPrice;
        }
        public function getNameAuditorium()
        {
            return $this->nameAuditorium;
        }


        public function setAmountOfSeats($amountOfSeats)
        {
            $this->amountOfSeats = $amountOfSeats;
        }
        public function setIdAuditorium($idAuditorium)
        {
            $this->idAuditorium=$idAuditorium;
        }
        public function setTicketPrice($ticketPrice)
        {
            $this->ticketPrice=$ticketPrice;
        }
        public function setNameAuditorium($nameAuditorium)
        {
            $this->nameAuditorium=$nameAuditorium;
        }
    }
?>