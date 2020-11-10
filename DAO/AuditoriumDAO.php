<?php
    namespace DAO;

    use \Exception as Exception;
    use Interfaces\IUserDAO as IUserDAO;
    use Models\Auditorium as Auditorium;  
    use DAO\Connection as Connection;
    use Interfaces\IAuditoriumDAO as IAuditoriumDAO;

    
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

        public function GetById($idCinema) // Metodo para obtener la lista de salas pertenecientes a un cine pasado por ID
        {
            try 
            {
                $auditoriumsList = array();
                $query = "SELECT * FROM " . $this->tableName ." WHERE idCinema = ".$idCinema . " AND active = '1'";

                $this->connection = Connection::GetInstance();
                $result = $this->connection->Execute($query);
                foreach ($result as $row) 
                {
                    $auditorium = new Auditorium();
                    $auditorium->setAmountOfSeats($row["amountOfSeats"]);
                    $auditorium->setIdAuditorium($row["idAuditorium"]);
                    $auditorium->setTicketPrice($row["ticketPrice"]);
                    $auditorium->setNameAuditorium($row["nameAuditorium"]);
                 

                    array_push($auditoriumsList, $auditorium);
                }
                return $auditoriumsList;
            }
            catch (Exception $ex) 
            {
                return null;
            }
        }

        protected function mapear($value)
        {
            $value = is_array($value) ? $value : [];

            $resp = array_map( function($p){
                return new Auditorium($p['amountOfSeats'], $p['idAuditorium'], $p['ticketPrice'], $p['nameAuditorium']);
            }, $value);
            
            return count($resp) > 1 ? $resp : $resp['0'];
        }

        public function Delete($idAuditorium)
        {
            $sql = "UPDATE ".$this->tableName . " SET active = '0' WHERE idAuditorium = :idAuditorium";
            
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

        public function DeleteFromCinema($idCinema)
        {
            $sql = "UPDATE " . $this->tableName . " SET active = '0' WHERE idCinema = :idCinema";
            $parameters['idCinema'] = $idCinema;

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
            $sql = "SELECT * FROM " .$this->tableName. " WHERE (nameAuditorium = :nameAuditorium) AND (idCinema = :idCinema) AND active = '1'";

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


        public function Edit($nameAuditorium, $amountOfSeats, $ticketPrice, $idAuditorium)
        {
            try
            {
                $sql = "UPDATE " . $this->tableName . " SET nameAuditorium = :nameAuditorium, amountOfSeats = :amountOfSeats, ticketPrice = :ticketPrice WHERE idAuditorium = :idAuditorium";
                $parameters["nameAuditorium"] = $nameAuditorium;
                $parameters["amountOfSeats"] = $amountOfSeats;
                $parameters["ticketPrice"] = $ticketPrice;
                $parameters["idAuditorium"] = $idAuditorium;

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
    }
?>