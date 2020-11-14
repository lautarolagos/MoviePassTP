<?php
    namespace Controllers;

    use DAO\PurchaseDAO as PurchaseDAO;
    use DAO\ProjectionDAO as ProjectionDAO;
    use DAO\TicketDAO as TicketDAO;
    use Models\Purchase as Purchase;
    use Models\Ticket as Ticket;
    use Models\Projection as Projection;
    use Models\User as User;

    date_default_timezone_set('America/Argentina/Buenos_Aires');

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

        public function ShowLoginView($message)
        {
            require_once(VIEWS_PATH."Login.php");
        }

        public function ShowStartPurchase($idProjection, $movieTitle, $posterPath, $overview, $idMovie)
        {
            if(!isset($_SESSION['userLogedIn']))
            {
                $message = "You need to login or register to continue!";
                $this->ShowLoginView($message);
            }
            else
            {
            require_once(VIEWS_PATH."BuyTicket.php");
            }
        }

        public function ShowConfirmBuy($quantity, $creditCard, $securityCode, $movieTitle, $idProjection)
        {
            $projection = new Projection();
            $projection = $this->projectionDAO->GetProjection($idProjection);
            
            if($quantity>=2) // Proceso de aplicar o no descuento
            {
                $day = date("w");
                if($day==2 || $day==3) // Si es Martes o Miercoles (0 es domingo, 6 es sabado)
                {
                    $subtotal = $projection->getAuditorium()->getTicketPrice()*$quantity;
                    $discount = $subtotal * 0.25; 
                    $totalPrice = $subtotal - $discount; // Aplico el descuento
                }
                else
                {   
                    $subtotal = $projection->getAuditorium()->getTicketPrice()*$quantity;
                    $discount = 0;
                    $totalPrice = $subtotal; // No aplico ningun descuento
                }
            }
            else
            {
                $subtotal = $projection->getAuditorium()->getTicketPrice()*$quantity;
                $discount = 0;
                $totalPrice = $subtotal; // No aplico ningun descuento
            }

            require_once(VIEWS_PATH."ConfirmBuy.php");
        }

        public function ProcessBuy($quantity, $idProjection, $subtotal, $discount, $totalPrice)
        {
            $user = new User();
            $user = $_SESSION['userLogedIn']; // Lo paso a un obj de tipo user para mas comodidad

            $projection = new Projection();
            $projection = $this->projectionDAO->GetProjection($idProjection); // Obtengo la projection que eligio el usuario
            
            $purchase = new Purchase(); // Creo el objeto de tipo compra
            $purchase->setDiscount($discount);
            $purchase->setTotalPrice($totalPrice); // Y esto iria despues de saber si tiene descuento o no
            $purchase->setSubtotal($subtotal);
            $purchase->setDatePurchase(date("Y-m-d"));
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

            $arrayTickets = array();
            $arrayTickets = $this->ticketDAO->GetTicketsPurchase($lastPurchase->getIdPurchase());
            $idPurchase = $lastPurchase->getIdPurchase();

            $this->ShowPurchaseDone($arrayTickets, $idPurchase);
        }

        public function ShowPurchaseDone($arrayTickets, $idPurchase)
        {
            require_once(VIEWS_PATH."PurchaseCompleted.php");
        }
    }
?>