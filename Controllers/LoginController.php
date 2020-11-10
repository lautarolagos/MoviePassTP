<?php
    namespace Controllers;

    require_once("Config/Autoload.php");

    use Models\User as User;
    use DAO\UserDAO as UserDAO;
    use DAO\CinemaDAOMySQL as CinemaDAOMySQL;
    use DAO\AuditoriumDAO as AuditoriumDAO;
    use Models\Cinema as Cinema;

    class LoginController
    {
        private $userDAO;
        private $cinemaDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
            $this->cinemaDAO = new CinemaDAOMySQL();
        }

        public function ShowCinemaView($message="")
        {
            $cinemasList = $this->cinemaDAO->GetAll();
            
            require_once(VIEWS_PATH."CinemaList.php");
        }

        public function ShowSigninView($message="")
        {
            require_once(VIEWS_PATH."Login.php");
        }

        public function setSession($user)
        {
            $_SESSION['userLogedIn'] = $user;
            $_SESSION['firstName'] = $user->getFirstName();
            $_SESSION['isAdmin'] = $user->getIsAdmin();
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
                    $message="";
                    $this->ShowCinemaView($message);
                    return $user;
                }
            }
            else
            {
                $message="Incorrect email / password";
                $this->ShowSigninView($message);
                return false;
            }
            
        }
    }
?>