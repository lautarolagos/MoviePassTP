<?php
    namespace Controllers;

    //use DAO\PurchaseDAO as PurchaseDAO;
    use Models\Purchase as Purchase;
    use models\Ticket as Ticket;

    class PurchaseController
    {
        private $purchaseDAO;

        public function __construct()
        {
            //$this->purchaseDAO = new PurchaseDAO();
        }

        public function ShowStartPurchase()
        {
            require_once(VIEWS_PATH."BuyTicket.php");
        }
        public function ShowConfirmBuy()
        {
            require_once(VIEWS_PATH."ConfirmBuy.php");
        }
    }
?>