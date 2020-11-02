<?php
    namespace Controllers;

    class SessionController
    {
        public function ShowLoginView($message="")
        {
            require_once(VIEWS_PATH."Login.php");
        }

        public function Logout()
        {
            session_destroy();
            $message="";
            $this->ShowLoginView($message);
        }
    }
    
?>