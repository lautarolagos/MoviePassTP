<?php
    namespace Models;

    //number,   QRcode 
    class Ticket
    {
        private $number;
        private $QRcode;

        function construct__($number=NULL, $QRcode=NULL)
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

        public function __toString()
        {
            return  " | Number: $this->number "."| QRCode: $this->QRcode";
        }
    }
?>