<?php
    namespace DAO;
    use \Exception as Exception;
    use DAO\Connection as Connection;
    use Interfaces\IPurchaseDAO as IPurchaseDAO;
    use Models\Purchase as Purchase;
    use Models\Ticket as Ticket;
    use Models\Movie as Movie;
    use Models\Projection as Projection;

    class PurchaseDAO implements IPurchaseDAO
    {
        private $connection;
        private $tableName = "purchases";

        public function Add(Purchase $purchase)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (totalPrice, discount, subtotal, datePurchase, idProjection, idUser) VALUES (:totalPrice, :discount, :subtotal, :datePurchase, :idProjection, :idUser);";
                $parameters['totalPrice'] = $purchase->getTotalPrice();
                $parameters['discount'] = $purchase->getDiscount();
                $parameters['subtotal'] = $purchase->getSubtotal();
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
                $query = "SELECT idPurchase, totalPrice, discount, subtotal, datePurchase
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
                    $purchase->setSubtotal($row['subtotal']);
                    $purchase->setDatePurchase($row['datePurchase']);
                }
                return $purchase;

            } catch (Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetPurchasesUser($idUser)
        {
            $arrayPurchases = array();
            try
            {
                $query = "select p.idPurchase, p.totalPrice, p.discount, p.subtotal, p.datePurchase, f.idProjection, m.title
                from purchases as p
                join projections as f
                on p.idProjection = f.idProjection
                join movies as m
                on f.idMovie = m.idMovie
                where p.idUser = :idUser;";

                $parameters['idUser'] = $idUser;

                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($query, $parameters, QueryType::Query);
                foreach($resultSet as $row)
                {
                    $purchase = new Purchase();
                    $projection = new Projection();
                    $movie = new Movie();
                    $purchase->setIdPurchase($row['idPurchase']);
                    $purchase->setTotalPrice($row['totalPrice']);
                    $purchase->setDiscount($row['discount']);
                    $purchase->setSubtotal($row['subtotal']);
                    $purchase->setDatePurchase($row['datePurchase']);
                    $projection->setIdProjection($row['idProjection']);
                    $movie->setTitle($row['title']);
                    $projection->setMovie($movie);
                    $purchase->setProjection($projection);
                    
                    array_push($arrayPurchases, $purchase);
                }
                return $arrayPurchases;

            } catch (Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>