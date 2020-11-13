<?php
    namespace Controllers;

    class SessionController
    {
        public function ShowHomePage($message="")
        {
            require_once(VIEWS_PATH."Home.php");
        }

        public function Logout()
        {
            $status = session_status();
            if($status == PHP_SESSION_ACTIVE)
            {
                session_destroy();
                $_SESSION['userLogedIn'] = null; // Esto arregla que al cerrar sesion, en la vista de Home aparezca el boton de Sign In
                $this->ShowHomePage();
            }
        }

        public function ShowLoginView($message="")
        {
            require_once(VIEWS_PATH."Login.php");
        }

        public function ShowProfile()
        {
            require_once(VIEWS_PATH."Profile.php");
        }
    }
    
?>