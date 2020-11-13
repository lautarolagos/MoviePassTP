<?php
    namespace Controllers;

    use DAO\PurchaseDAO as PurchaseDAO;
    use DAO\ProjectionDAO as ProjectionDAO;
    use DAO\TicketDAO as TicketDAO;
    use Models\Purchase as Purchase;
    use Models\Ticket as Ticket;
    use Models\Projection as Projection;
    use Models\User as User;

    class PurchaseController
    {
        private $purchaseDAO;
        private $projectionDAO;
        private $ticketDAO;

        public function __construct()
        {
            $this->purchaseDAO = new PurchaseDAO();
            $this->projectionDAO = new ProjectionDAO();
            $this->ticketDAO = new TicketDAO();
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

        public function ProcessBuy($quantity, $idProjection)
        {
            $user = new User();
            $user = $_SESSION['userLogedIn']; // Lo paso a una variable de tipo user para mas comodidad

            $projection = new Projection();
            $projection = $this->projectionDAO->GetProjection($idProjection); // Obtengo la projection que eligio el usuario
            
            $purchase = new Purchase(); // Creo el objeto de tipo compra
            $purchase->setDiscount(0); // Falta hacer esto
            $purchase->setTotalPrice($projection->getAuditorium()->getTicketPrice()*$quantity); // Y esto iria despues de saber si tiene descuento o no
            $purchase->setDatePurchase(date("Y-m-d")); // Habria que agregar hora tambien?
            $purchase->setProjection($projection);
            $purchase->setUser($user);

            $this->purchaseDAO->Add($purchase); // Agrego la compra a la base de datos
            $lastPurchase = $this->purchaseDAO->GetLastPurchaseUser($user->getIdUser()); // Busco la compra que se acaba de crear en la BDD

            for($i=0; $i<$quantity; $i++)
            {
                $ticket = new Ticket();
                $ticket->setQRCode(rand(1000,5000));
                $ticket->setPurchase($lastPurchase);
                $this->ticketDAO->Add($ticket);
            }

            $msg = "COMPRA REALIZADA";

            $this->ShowCompraRealizada($msg);
        }

        public function ShowCompraRealizada($msg)
        {
            echo $msg;
        }
    }
?>