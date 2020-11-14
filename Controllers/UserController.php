<?php
    namespace Controllers;
    use Models\User as User;
    use DAO\UserDAO as UserDAO;
    use Models\Purchase as Purchase;
    use DAO\PurchaseDAO as PurchaseDAO;

    class UserController
    {
        private $userDAO;
        private $purchaseDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
            $this->purchaseDAO = new PurchaseDAO();
        }

        public function ShowProfile()
        {
            require_once(VIEWS_PATH."ShowProfile.php");
        }

        public function ShowPurchases()
        {
            $user = new User();
            $arrayPurchases = array();
            $user = $_SESSION['userLogedIn'];

            $arrayPurchases = $this->purchaseDAO->GetPurchasesUser($user->getIdUser()); // array de obj de tipo Purchase que realizo el usuario

            require_once(VIEWS_PATH."ShowPurchases.php");
        }
    }
?>