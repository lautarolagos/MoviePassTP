<?php
    namespace DAO;

    use \Exception as Exception;  
    use DAO\Connection as Connection;
    use Models\Projection as Projection;

    class ProjectionDAO
    {
        private $conenection;
        private $tableName  = "projections";

        public function Add($dateTime, $endTime, $idAuditorium, $movieId)
        {
            try
            {
                $query = "INSERT INTO" . $this->tableName . "(dateTime, endTime, idAuditorium, idMovie) VALUES (:dateTime, :endTime, :movieId, :idAuditorium)";
                $parameters['dateTime'] = $dateTime;
                $parameters['endTime'] = $endTime;
                $parameters['idAuditorium'] = $idAuditorium;
                $parameters['idMovie'] = $movieId;

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Search($date, $idMovie)
        {
            try
            {
                $query = "SELECT * FROM" . $this->tableName . "WHERE (date = :date) AND (idMovie = :idMovie) AND isActive = 1";
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

        public function GetProjections($idAuditorium)
        {
            try
            {
                $projectionList = array();
                $query = "SELECT * FROM" . $this->tableName . "WHERE (idAuditorium = :idAuditorium) AND isActive = 1";
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
                throw null;
            }
        }
    }
?>