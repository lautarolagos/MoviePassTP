<?php
    namespace Controllers;

    //use DAO\PurchaseDAO as PurchaseDAO;
    use DAO\ProjectionDAO as ProjectionDAO;
    use Models\Purchase as Purchase;
    use Models\Ticket as Ticket;
    use Models\Projection as Projection;

    class PurchaseController
    {
        private $purchaseDAO;
        private $projectionDAO;

        public function __construct()
        {
            //$this->purchaseDAO = new PurchaseDAO();
            $this->projectionDAO = new ProjectionDAO();
        }

        public function ShowStartPurchase($idProjection, $movieTitle)
        {
            require_once(VIEWS_PATH."BuyTicket.php");
        }
        public function ShowConfirmBuy($quantity, $movieTitle, $idProjection)
        {
            $projection = new Projection();
            $projection = $this->projectionDAO->GetProjection($idProjection);
            require_once(VIEWS_PATH."ConfirmBuy.php");
        }
    }
?>