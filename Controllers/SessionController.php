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
            session_destroy();
            $message="";
            $this->ShowHomePage($message);
        }

        public function ShowLoginView($message="")
        {
            require_once(VIEWS_PATH."Login.php");
        }
    }
    
?>