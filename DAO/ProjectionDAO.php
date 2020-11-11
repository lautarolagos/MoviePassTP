<?php
    namespace DAO;

    use \Exception as Exception;  
    use DAO\Connection as Connection;
    use Models\Projection as Projection;
    use Interfaces\IProjectionDAO as IProjectionDAO;

    class ProjectionDAO implements IProjectionDAO
    {
        private $conenection;
        private $tableName  = "projections";

        public function Add($projection, $idAuditorium, $idMovie)
        {
            try
            {
                $query = "INSERT INTO " . $this->tableName . " (date, startTime, endTime, idAuditorium, idMovie) VALUES (:date, :startTime, :endTime, :idAuditorium, :idMovie)";
                $parameters['date'] = $projection->getDate();
                $parameters['startTime'] = $projection->getStartTime();
                $parameters['endTime'] = $projection->getEndTime();
                $parameters['idAuditorium'] = $idAuditorium; // Este dato y el de abajo los mando por parametro porque no me deja acceder desde projection por ser metodos privados
                $parameters['idMovie'] = $idMovie;

                $this->connection = Connection::GetInstance();
                $result = $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

            if(!empty($result))
                return true;
            else
                return false;
        }

        public function Search($date, $idMovie)
        {
            try
            {
                $query = "SELECT * FROM " . $this->tableName . " WHERE (date = :date) AND (idMovie = :idMovie) AND isActive = 1";
                $parameters['date'] = $date;
                $parameters['idMovie'] = $idMovie;

                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($query, $parameters, QueryType::Query);
            } catch(Exception $ex)
            {
                throw $ex;
            }

            if(!empty($resultSet))
                return true;
            else
                return false;
        }

        public function GetProjectionsByIdAuditorium($idAuditorium)
        {
            try
            {
                $projectionList = array();
                $query = "SELECT * FROM " . $this->tableName . " WHERE (idAuditorium = :idAuditorium) AND isActive = 1";
                $parameters['idAuditorium'] = $idAuditorium;

                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($query, $parameters, QueryType::Query);
                foreach($resultSet as $row)
                {
                    $projection = new Projection();
                    $projection->setDate($row['date']);
                    $projection->setStartTime($row['startTime']);
                    $projection->setEndTime($row['endTime']);
                    $projection->setIsActive($row['isActive']);

                    array_push($projectionList, $projection);
                }
                return $projectionList;
            } catch (Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>