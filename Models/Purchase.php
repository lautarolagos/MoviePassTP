<?php
    namespace Models;

    class Purchase
    {
        private $idPurchase;
        private $totalPrice; // Precio total de la compra con descuento aplicado o no
        private $discount; // para saber si se aplico descuento o no
        private $subtotal; // esto dice el precio sin ningun tipo de descuento
        private $datePurchase; // Fecha en que realizo la compra
        private $tickets; // array de tickets
        private $projection; // Una projection tiene una pelicula, un auditorium que a su vez contiene un cine
        private $user;

        function __construct($idPurchase = NULL, $totalPrice = NULL, $discount = NULL, $subtotal=NULL, $datePurchase = NULL, $tickets = NULL, $projection = NULL, $user = NULL)
        {
            $this->idPurchase = $idPurchase;
            $this->totalPrice = $totalPrice;
            $this->discount = $discount;
            $this->subtotal = $subtotal;
            $this->datePurchase = $datePurchase;
            $this->tickets = $tickets;
            $this->projection = $projection;
            $this->user = $user;
        }

        // Getters
        public function getIdPurchase()
        {
            return $this->idPurchase;
        }
        public function getTotalPrice()
        {
            return $this->totalPrice;   
        }
        public function getDiscount()
        {
            return $this->discount;
        }
        public function getSubtotal()
        {
            return $this->subtotal;
        }
        public function getDatePurchase()
        {
            return $this->datePurchase;
        }
        public function getTickets()
        {
            return $this->tickets;
        }
        public function getProjection()
        {
            return $this->projection;
        }
        public function getUser()
        {
            return $this->user;
        }

        // Setters
        public function setIdPurchase($idPurchase)
        {
            $this->idPurchase = $idPurchase;
        }
        public function setTotalPrice($totalPrice)
        {
            $this->totalPrice = $totalPrice;
        }
        public function setDiscount($discount)
        {
            $this->discount = $discount;
        }
        public function setSubtotal($subtotal)
        {
            $this->subtotal = $subtotal;
        }
        public function setDatePurchase($datePurchase)
        {
            $this->datePurchase = $datePurchase;
        }
        public function setTickets($tickets)
        {
            $this->tickets = $tickets;
        }
        public function setProjection($projection)
        {
            $this->projection = $projection;
        }
        public function setUser($user)
        {
            $this->user = $user;
        }
    }
?> 