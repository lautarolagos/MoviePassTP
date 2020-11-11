<?php
    namespace Controllers;

    use Models\User as User;
    use DAO\UserDAO as UserDAO;

    class LoginController
    {
        private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }

        public function ShowBillboard()
        {
            require_once(VIEWS_PATH."Billboard.php");
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
                    $this->ShowBillboard();
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