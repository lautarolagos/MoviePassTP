<?php
    namespace Models;

    class CreditCard
    {
        private $cardNumber;
        private $code;
        private $expirationDate;
    
        function construct__($cardNumber = NULL, $code = NULL, $expirationDate = NULL)
        {
            $this->cardNumber = $cardNumber;
            $this->code = $code;
            $this->expirationDate = $expirationDate;
            
        }

        public function getCardNumber()
        {
            return $this->cardNumber;
        }

        public function setCardNumber($cardNumber)
        {
            $this->cardNumber = $cardNumber;
        }

        public function getCode()
        {
            return $this->code;
        }

        public function setCode($code)
        {
            $this->code = $code;
        }

        public function getExpirationDate()
        {
            return $this->expirationDate;
        }

        public function setExpirationDate($expirationDate)
        {
            $this->expirationDate = $expirationDate;
        }

        public function __toString()
        {
            return  " | Card Number: $this->cardNumber "."| Code: $this->code"."| Expiration date: $this->expirationDate";
        }
    }
?>