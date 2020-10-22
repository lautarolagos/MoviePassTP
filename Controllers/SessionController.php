<?php
    namespace Controllers;

    class SessionController
    {
        public function ShowLoginView()
        {
            require_once(VIEWS_PATH."Login.php");
        }

        public function Logout()
        {
            session_destroy();
            $this->ShowLoginView();
        }
    }
    
?>