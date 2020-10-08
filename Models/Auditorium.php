<?php
    namespace Models;

    class Auditorium
    {
        private $maximumSeats;
        private $seatsAviable;
        
    
        function construct__($maximumSeats=NULL, $seatsAviable=NULL)
        {
            $this->maximumSeats = $maximumSeats;
            $this->password = $password; 
        }

        public function getMaximumSeats()
        {
            return $this->maximumSeats;
        }

        public function setMaximumSeats($maximumSeats)
        {
            $this->maximumSeats = $maximumSeats;
        }

        public function getSeatsAviable()
        {
            return $this->seatsAviable;
        }

        public function setSeatsAviable($seatsAviable)
        {
            $this->seatsAviable = $seatsAviable;
        }

        public function __toString()
        {
            return  " | Maximum Seats: $this->maximumSeats "."| Seats Aviable: $this->seatsAviable";
        }
    }
?>