<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use Models\User as User;
    require_once("Config/Autoload.php");

    class RegisterController
    {
        private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }

        public function ShowAddView($message = "")
        {
            require_once(VIEWS_PATH."Login.php");
        }

        public function ShowRegisterView()
        {
            require_once(VIEWS_PATH."Register.php");
        }
        
        public function Add($name, $lastName, $email, $password)
        {
            $user = new User();
            $user->setFirstName($firstName);
            $user->setLastName($lastName);
            $user->setEmail($email);
            $user->setPassword($password);

            $this->userDAO->Add($user);

            // aca falta meter el mensaje
            $this->ShowAddView($message);
        }
    }
     

?>
