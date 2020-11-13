<?php
    namespace DAO;
    use \Exception as Exception;
    use DAO\Connection as Connection;
    use Interfaces\ITicketDAO as ITicketDAO;
    use Models\Ticket as Ticket;

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
    }
?>