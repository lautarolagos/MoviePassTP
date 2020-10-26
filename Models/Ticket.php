<?php
    namespace Models;

    //number,   QRcode 
    class Ticket
    {
        private $number;
        private $QRcode;
        // Creo que habria que agregar una variable que sea Fecha de la funcion

        function __construct($number = NULL, $QRcode = NULL)
        {
            $this->number = $number;
            $this->QRcode = $QRcode; 
        }

        public function getNumber()
        {
            return $this->Number;
        }

        public function setNumber($number)
        {
            $this->number = $number;
        }

        public function getQRCode()
        {
            return $this->QRcode;
        }

        public function setQRCode($QRcode)
        {
            $this->QRcode = $QRcode;
        }
    }
?>