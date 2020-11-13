<?php
    namespace DAO;
    use \Exception as Exception;
    use DAO\Connection as Connection;
    use Interfaces\IPurchaseDAO as IPurchaseDAO;
    use Models\Purchase as Purchase;
    use Models\Ticket as Ticket;

    class PurchaseDAO implements IPurchaseDAO
    {
        private $connection;
        private $tableName = "purchases";

        public function Add(Purchase $purchase)
        {
            /*try
            {
                $query = "INSERT INTO ".$this->tableName." (totalPrice, discount, datePurchase, idProjection, idUser) VALUES (:totalPrice, :discount, :datePurchase, :idProjection, :idUser);";
                $parameters['totalPrice'] = $purchase->getTotalPrice();
                $parameters['discount'] = $purchase->getDiscount();
                $parameters['datePurchase'] = $purchase->getDatePurchase();
                $parameters['idProjection'] = $purchase->getProjection()->getIdProjection();
                $parameters['idUser'] = $_SESSION['userLogedIn']->getIdUser();
                
            }*/
        }
    }
?>