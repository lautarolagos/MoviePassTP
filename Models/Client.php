<?php
    namespace Models;

    class Client
    {
        private $email;
        private $password;
        private $isAdmin;
    
        function construct__($email = NULL , $password = NULL, $isAdmin = NULL)
        {
            $this->email = $email;
            $this->password = $password;
            $this->isAdmin = $isAdmin; // 0 NO  es admin, 1 ES admin
            // Luego metemos aca el atributo que seria una lista de las compras que realizo
            
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

        public function getIsAdmin()
        {
            return $this->isAdmin;
        }

        public function setIsAdmin($isAdmin)
        {
            $this->isAdmin = $isAdmin;
        }

        public function __toString()
        {
            return  " | Email: $this->email "."| Password: $this->password";
        }
    }
?>