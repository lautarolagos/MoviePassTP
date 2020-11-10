<?php
    namespace Models;

    
    class Ticket
    {
        private $number; // seria como el ID
        private $QRcode; 
        private $purchase; // la compra a la que pertenece

        function __construct($number = NULL, $QRcode = NULL, $purchase = NULL)
        {
            $this->number = $number;
            $this->QRcode = $QRcode;
            $this->purchase = $purchase;
        }

        // Getters
        public function getNumber()
        {
            return $this->number;
        }
        public function getQRCode()
        {
            return $this->QRcode;
        }
        public function getPurchase()
        {
            return $this->purchase;
        }

        // Setters
        public function setNumber($number)
        {
            $this->number = $number;
        }
        public function setQRCode($QRcode)
        {
            $this->QRcode = $QRcode;
        }
        public function setPurchase($purchase)
        {
            $this->purchase = $purchase;
        }
    }
?>