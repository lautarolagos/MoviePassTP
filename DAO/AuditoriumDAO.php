<?php
    namespace DAO;

    use \Exception as Exception;
    use Interfaces\IUserDAO as IUserDAO;
    use Models\Auditorium as Auditorium;    
    use DAO\Connection as Connection;

    class AuditoriumDAO implements IAuditoriumDAO
    {
        private $connection;
        private $tableName = "auditoriums";

        public function Add(Auditorium $auditorium, $idCinema)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName."(amountOfSeats, idCinema, ticketPrice, nameAuditorium) VALUES (:amountOfSeats, :idCinema, :ticketPrice, :nameAuditorium);";
                $parameters['amountOfSeats'] = $auditorium->getAmountOfSeats();
                $parameters['idCinema'] = $idCinema;
                $parameters['ticketPrice'] = $auditorium->getTicketPrice();
                $parameters['nameAuditorium'] = $auditorium->getNameAuditorium();

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetById($idCinema) // Obtener los auditoriums de un cine pasado por ID
        {
            $query = "SELECT * FROM ".$this->tableName; " WHERE idCinema = :idCinema AND active = '1'";

            $parameters['idCinema'] = $idCinema;
            
            try
            {
                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($sql, $parameters, QueryType::Query);
            } catch(Exception $ex)
            {
                throw $ex;
            }

            if(!empty($resultSet))
                return $this->mapear($resultSet);
            else
                return false;
        }

        protected function mapear($value)
        {
            $value = is_array($value) ? $value : [];

            $resp = array_map( function($p){
                return new Auditorium($p['amountOfSeats'], $p['idAuditorium'], $p['ticketPrice'], $p['nameAuditorium']);
            }, $value);
            
            return count($resp) > 1 ? $resp : $resp['0'];
        }

        public function Delete($idCinema, $idAuditorium)
        {
            $sql = "UPDATE ".$this->tableName . " SET active = '0' WHERE idCinema = :idCinema AND idAuditorium = :idAuditorium";
            
            $parameters['idCinema'] = $idCinema;
            $parameters['idAuditorium'] = $idAuditorium;

            try
            {
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->ExecuteNonQuery($sql, $parameters, QueryType::Query);
            } catch(Exception $ex)
            {
                throw $ex;
            }

            if(!empty($resultSet))
                return true;
            else
                return false;

        }

        
        public function Search($nameAuditorium, $idCinema)
        {
            $sql = "SELECT * FROM ".$this->tableName; " WHERE (nameAuditorium = :nameAuditorium) AND (idCinema = :idCinema) AND active = '1'";

            $parameters['nameAuditorium'] = $nameAuditorium;
            $parameters['idCinema'] = $idCinema;

            try
            {
                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($sql, $parameters, QueryType::Query);
            } catch(Exception $ex)
            {
                throw $ex;
            }

            if(!empty($resultSet))
                return $this->mapear($resultSet);
            else
                return false;
        }
    }
?>