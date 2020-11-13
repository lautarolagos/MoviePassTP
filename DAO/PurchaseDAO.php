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
            try
            {
                $query = "INSERT INTO ".$this->tableName." (totalPrice, discount, datePurchase, idProjection, idUser) VALUES (:totalPrice, :discount, :datePurchase, :idProjection, :idUser);";
                $parameters['totalPrice'] = $purchase->getTotalPrice();
                $parameters['discount'] = $purchase->getDiscount();
                $parameters['datePurchase'] = $purchase->getDatePurchase();
                $parameters['idProjection'] = $purchase->getProjection()->getIdProjection();
                $parameters['idUser'] = $purchase->getUser()->getIdUser();
                
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetLastPurchaseUser($idUser) // obtiene id de ultima purchase de un usuario
        {
            try
            {
                $query = "SELECT idPurchase, totalPrice, discount, datePurchase
                FROM purchases
                WHERE idUser = :idUser
                ORDER by idPurchase DESC
                LIMIT 1;";

                $parameters['idUser'] = $idUser;

                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($query, $parameters, QueryType::Query);
                foreach($resultSet as $row)
                {
                    $purchase = new Purchase();
                    $purchase->setIdPurchase($row['idPurchase']);
                    $purchase->setTotalPrice($row['totalPrice']);
                    $purchase->setDiscount($row['discount']);
                    $purchase->setDatePurchase($row['datePurchase']);
                }
                return $purchase;

            } catch (Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>