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
                $_SESSION['userLogedIn'] = null;
                $this->ShowHomePage();
            }
        }

        public function ShowLoginView($message="")
        {
            require_once(VIEWS_PATH."Login.php");
        }
    }
    
?>