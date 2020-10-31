<?php
    namespace DAO;
    use \Exception as Exception;
    use Interfaces\ICinemaDAO as ICinemaDAO;
    use Models\Cinema as Cinema;
    use DAO\Connection as Connection;
    use DAO\AuditoriumDAO as AuditoriumDAO;
    use Interfaces\IAuditoriumDAO as IAuditoriumDAO;
    use Models\Auditorium as Auditorium;

    class CinemaDAOMySQL implements ICinemaDAO
    {
        private $connection;
        private $tableName = "cinemas";

        public function Add(Cinema $cinema)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (name, capacity, adress) VALUES (:name, :capacity, :adress);";
                $parameters["name"] = $cinema->getName();
                $parameters["capacity"] = $cinema->getCapacity();
                $parameters["adress"] = $cinema->getAdress();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll()
        {
            $auditoriumDAO = new AuditoriumDAO();
            try
            {
                $cinemasList = array();

                $query = "SELECT * FROM ".$this->tableName. " WHERE isActive = 1";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $cinema = new Cinema(); // aca quizas algo esta mal
                    $cinema->setName($row["name"]);
                    $cinema->setCapacity($row["capacity"]);
                    $cinema->setAdress($row["adress"]);
                    $cinema->setIdCinema($row['idCinema']);
                    //$cinema->setAuditoriums(NULL);

                    array_push($cinemasList, $cinema);
                }

                foreach($cinemasList as $cinema)
                {
                    $auditoriums=$auditoriumDAO->GetById($cinema->getIdCinema());
                    $cinema->setAuditoriums($auditoriums);
                }
                
                return $cinemasList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        

        public function ReadAll()
        {
            $sql = "SELECT * FROM ".$this->tableName; " WHERE isActive = '1'";

            try
            {
                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query);
            } catch(Exception $ex) {
                throw $ex;
            }

            if(!empty($resultSet))
                return $this->mapear($resultSet);
            else
                return false;
        }


        public function Search($adress) // Busca un cine en la BDD con la direccion pasada
        {
            $sql = "SELECT * FROM ".$this->tableName . " WHERE (adress = :adress) and isActive = '1'";

            $parameters['adress'] = $adress;

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
                return new Cinema($p['name'], $p['capacity'], $p['adress'], $p['idCinema']);
            }, $value);
            
            return count($resp) > 1 ? $resp : $resp['0'];
        }

        public function Edit($name, $capacity, $adress, $id)
        {
            try
            {
                $sql = "UPDATE" . $this->tableName . "SET name = :name, capacity = :capacity, adress = :adress WHERE idCinema = :id";
                $parameters["name"] = $name;
                $parameters["capacity"] = $capacity;
                $parameters["adress"] = $adress;

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

        public function Delete($id)
        {
            $sql = "UPDATE ".$this->tableName . " SET isActive = '0' WHERE idCinema = :id";
            $parameters['id'] = $id;

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
    }
?>