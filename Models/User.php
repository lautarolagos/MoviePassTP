<?php
    namespace Models;

    class User
    {
        private $idUser;
        private $firstName;
        private $lastName;
        private $email;
        private $password;
        private $isAdmin;
        
        function __construct($idUser = NULL, $firstName = NULL, $lastName = NULL, $email = NULL , $password = NULL, $isAdmin = NULL)
        {
            $this->idUser = $idUser;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->password = $password;
            $this->isAdmin = $isAdmin; // 0 NO  es admin, 1 ES admin
            
        }

        public function getIdUser()
        {
            return $this->idUser;
        }
        public function getFirstName()
        {
            return $this->firstName;
        }
        public function getLastName()
        {
            return $this->lastName;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function getPassword()
        {
            return $this->password;
        }
        public function getIsAdmin()
        {
            return $this->isAdmin;
        }
        

        public function setIdUser($idUser)
        {
            $this->idUser = $idUser;
        }
        public function setFirstName($firstName)
        {
            $this->firstName = $firstName;
        }
        public function setLastName($lastName)
        {
            $this->lastName=$lastName;
        }
        public function setEmail($email)
        {
            $this->email = $email;
        }
        public function setPassword($password)
        {
            $this->password = $password;
        }
        public function setIsAdmin($isAdmin)
        {
            $this->isAdmin = $isAdmin;
        }
    }
?>