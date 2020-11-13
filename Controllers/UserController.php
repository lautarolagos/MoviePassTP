<?php
    namespace Controllers;
    use Models\User as User;
    use DAO\UserDAO as UserDAO;

    class UserController
    {
        private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }

        public function ShowProfile()
        {
            require_once(VIEWS_PATH."ShowProfile.php");
        }
    }
?>