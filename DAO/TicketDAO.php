<?php
    namespace DAO;
    use \Exception as Exception;
    use DAO\Connection as Connection;
    use Interfaces\ITicketDAO as ITicketDAO;
    use Models\Ticket as Ticket;
    use Models\Purchase as Purchase;

    class TicketDAO implements ITicketDAO
    {
        private $connection;
        private $tableName = "tickets";

        public function Add(Ticket $ticket)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (qrCode, idPurchase) VALUES (:qrCode, :idPurchase);";
                $parameters['qrCode'] = $ticket->getQRCode();
                $parameters['idPurchase'] = $ticket->getPurchase()->getIdPurchase();
                
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetTicketsPurchase($idPurchase) // Obtiene todos los tickets de una compra pasada por parametro
        {
            $arrayTickets = array();
            try
            {
                $query = "SELECT * FROM tickets WHERE idPurchase = :idPurchase";

                $parameters['idPurchase'] = $idPurchase;

                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($query, $parameters, QueryType::Query);
                foreach($resultSet as $row)
                {
                    $purchase = new Purchase();
                    $ticket = new Ticket();
                    $ticket->setNumber($row['number']);
                    $ticket->setQRCode($row['qrCode']);
                    $purchase->setIdPurchase($row['idPurchase']);
                    $ticket->setPurchase($purchase);
                    array_push($arrayTickets, $ticket);
                }
                return $arrayTickets;

            } catch (Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>