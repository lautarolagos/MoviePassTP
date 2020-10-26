<?php
    namespace Controllers;

    require_once("Config/Autoload.php");

    use Models\User as User;
    use DAO\UserDAO as UserDAO;

    class LoginController
    {
        private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }

        public function ShowCinemaView()
        {
            require_once(VIEWS_PATH."CinemaList.php");
        }
        
        public function ShowAddView()
        {
            require_once(VIEWS_PATH."AddCinema.php");
        }

        public function ShowSigninView($message="")
        {
            require_once(VIEWS_PATH."Login.php");
        }

        public function ShowConecto()
        {
            require_once(VIEWS_PATH."Conecto.php");
        }

        public function ShowNoConecto()
        {
            require_once(VIEWS_PATH."NoConecto.php");
        }

        public function setSession($user)
        {
            $_SESSION['userLogedIn'] = $user;
        }


        public function Check($email, $password)
        {
            $userDAO = new UserDAO();

            $user = $userDAO->Read($email, $password);

            if($user)
            {
                if($user->getPassword() == $password)
                {
                    $this->setSession($user);
                    $this->ShowConecto();
                    return $user;
                }
            }
            else
            {
                $this->ShowNoConecto();
                return false;
            }
            
        }
    }
?>