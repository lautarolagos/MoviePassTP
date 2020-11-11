<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use Models\User as User;

    class RegisterController
    {
        private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }

        public function ShowLoginView($message = "")
        {
            require_once(VIEWS_PATH."Login.php");
        }

        public function ShowRegisterView()
        {
            require_once(VIEWS_PATH."Register.php");
        }
        
        public function Add($firstName, $lastName, $email, $password)
        {
            $userDAO = new UserDAO();

            $exists = $userDAO->Search($email); // Busca si ya hay un usuarios registrado con el mail recibido

            if($exists==false) // Si retorna false es porque no lo encontro y continua con el registro
            {
                $user = new User();
                $user->setFirstName($firstName);
                $user->setLastName($lastName);
                $user->setEmail($email);
                $user->setPassword($password);
    
                $this->userDAO->Add($user);
                $message="Registration finished, please sign in to continue";
                $this->ShowLoginView($message);
            }
            else // Aca entra si retorno algo y el usuario ya esta registrado
            {
                $message="Email already registered!";
                $this->ShowRegisterView($message);
            }
            
        }
    }
     

?>
