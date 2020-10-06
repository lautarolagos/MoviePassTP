<?php
    namespace Models;

    class Cliente
    {
        private $email;
        private $password;
    
        function construct__($email, $nameGender)
        {
            $this->email = $email;
            $this->password = $password;
            
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function getPurchaseHistory()
        {
            return $this->purchaseHistory;
        }

        public function setPurchaseHistory($purchaseHistory)
        {
            $this->purchaseHistory = $purchaseHistory;
        }

        public function __toString()
        {
            return  " | Email: $this->email "."| Password: $this->password"."| Purchase History: $this->purchaseHistory";
        }
    }
?>