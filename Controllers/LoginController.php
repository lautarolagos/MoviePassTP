<?php
    namespace Controllers;

    require_once("Config/Autoload.php");

    use Models\Client as Client;
    use DAO\ClientDAO as ClientDAO;

    class LoginController
    {
        private $clientDAO;

        public function __construct()
        {
            $this->clientDAO = new ClientDAO();
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

        public function Check($email, $password)
        {
            $clientsList = $this->clientDAO->GetAll();
            $succesLogin=0;
            if($clientsList!=NULL)
            {
                foreach($clientsList as $value)
                {
                    if(($email==$value->getEmail()) && ($password==$value->getPassword()))
                    {
                        if($value->getIsAdmin()==0)
                        {
                            $succesLogin=1;
                            $loggedUser = $value;
                            $_SESSION['loggedUser'] = $loggedUser;
                            $_SESSION['isAdmin'] = $value->getIsAdmin();
                            $_SESSION['email'] = $email;
                            $this->ShowCinemaView();
                            break;
                        }
                        else if($value->getIsAdmin()==1)
                        {
                            $succesLogin=1;
                            $loggedUser = $value;
                            $_SESSION['loggedUser'] = $loggedUser;
                            $_SESSION['isAdmin'] = $value->getIsAdmin();
                            $_SESSION['email'] = $email;
                            
                            $this->ShowCinemaView();
                            break;
                        }
                    }
                }
            }

            if($succesLogin==0)
            {
                $message="Incorrect email/password";
                $this->ShowSigninView($message);
            }
        }
    }
?>