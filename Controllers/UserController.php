<?php
    namespace Controllers;
    use Models\User as User;
    use DAO\UserDAO as UserDAO;
    use Models\Purchase as Purchase;
    use DAO\PurchaseDAO as PurchaseDAO;
    use DAO\TicketDAO as TicketDAO;

    class UserController
    {
        private $userDAO;
        private $purchaseDAO;
        private $ticketDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
            $this->purchaseDAO = new PurchaseDAO();
            $this->ticketDAO = new TicketDAO();
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
            
            foreach($arrayPurchases as $purchase)
            {
                $arrayTickets = $this->ticketDAO->GetTicketsPurchase($purchase->getIdPurchase()); // Meto el array de tickets a cada compra
                $purchase->setTickets($arrayTickets);
            }

            require_once(VIEWS_PATH."ShowPurchases.php");
        }
    }
?>