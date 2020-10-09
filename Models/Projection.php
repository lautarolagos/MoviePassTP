<?php
    namespace Models;

    class Cinema
    {
        //idCompra
        //peliculaSeleccionada
        //cantidadEntradas
        //funcionID
        //totalCompra
        private $idBuy;
        private $movieSelected;
        private $ticketQuantity;
        private $totalPurchase;
        private $id;
        

        function construct__($idBuy = NULL, $movieSelected = NULL, $ticketQuantity = NULL, $totalPurchase = NULL, $idTicket = NULL)
        {
            $this->idBuy = $idBuy;
            $this->movieSelected = $movieSelected;
            $this->ticketQuantity = $ticketQuantity;
            $this->totalPurchase = $totalPurchase;
            $this->idTicket = $idTicket;
        }

        public function getIdBuy()
        {
            return $this->useridBuy;
        }

        public function setIdBuy($idBuy)
        {
            $this->idBuy = $idBuy;
        }

        public function getMovieSelected()
        {
            return $this->movieSelected;
        }

        public function setMovieSelected($movieSelected)
        {
            $this->movieSelected = $movieSelected;
        }

        public function getTicketQuantity()
        {
            return $this->ticketQuantity;
        }

        public function setTicketQuantity($ticketQuantity)
        {
            $this->ticketQuantity = $ticketQuantity;
        }

        public function getTotalPurchase()
        {
            return $this->totalPurchase;
        }

        public function setTotalPurchase($totalPurchase)
        {
            $this->totalPurchase = $totalPurchase;
        }

        public function getIdTicket()
        {
            return $this->idTicket;
        }

        public function setIdTicket($idTicket)
        {
            $this->idTicket = $idTicket;
        }

        public function __toString()
        {
            return  " | Id Buy: $this->idBuy "."| Movie Selected: $this->movieSelected"."| Ticket Quantity: $this->ticketQuantity"."| Total purchase: $this->totalPurchase"."| ID Ticket: $this->idTicket";
        }
    }
?>