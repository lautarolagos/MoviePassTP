<?php
    namespace DAO;

    use \Exception as Exception;  
    use DAO\Connection as Connection;
    use Models\Projection as Projection;
    use Models\Movie as Movie;
    use Models\Auditorium as Auditorium;
    use Models\Cinema as Cinema;
    use Interfaces\IProjectionDAO as IProjectionDAO;

    class ProjectionDAO implements IProjectionDAO
    {
        private $conenection;
        private $tableName  = "projections";

        public function Add($projection)
        {
            try
            {
                $query = "INSERT INTO " . $this->tableName . " (date, startTime, endTime, idAuditorium, idMovie) VALUES (:date, :startTime, :endTime, :idAuditorium, :idMovie)";
                $parameters['date'] = $projection->getDate();
                $parameters['startTime'] = $projection->getStartTime();
                $parameters['endTime'] = $projection->getEndTime();
                $parameters['idAuditorium'] = $projection->getAuditorium()->getIdAuditorium();
                $parameters['idMovie'] = $projection->getMovie()->getIdMovie(); 

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

        public function GetActiveProjections()
        {
            try
            {
                $activeProjections = array();

                $query = "SELECT * FROM ".$this->tableName. " WHERE isActive = 1";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $projection = new Projection();
                    $projection->setIdProjection($row["idProjection"]);
                    $projection->setDate($row["date"]);
                    $projection->setStartTime($row['startTime']);
                    $projection->setEndTime($row['endTime']);
                    $projection->setIsActive($row['isActive']);
                    
                    $movie = new Movie(); // creo un obj de tipo Movie para la projection
                    $idMovie = $row['idMovie']; // obtengo la id de la movie que me llega de la DB
                    $movie->setIdMovie($idMovie); // se lo asigno a la movie recien creada
                    $projection->setMovie($movie); // y meto el objeto movie en el obj projection

                    array_push($activeProjections, $projection); 
                }
                return $activeProjections;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetProjectionsByIdMovie($idMovie) // Retorna todas las funciones donde este la pelicula seleccionada
        {
            try
            {
                $projections = array();
                $query = "select 
                p.idProjection, p.date, p.startTime, p.endTime, p.idAuditorium, a.nameAuditorium, a.amountOfSeats, a.ticketPrice, a.idCinema, c.name, c.adress, m.idMovie, m.title
                from projections as p
                join auditoriums as a
                on p.idAuditorium = a.idAuditorium
                join cinemas as c
                on a.idCinema = c.idCinema
                join movies as m
                on p.idMovie = m.idMovie
                WHERE p.idMovie = :idMovie AND p.isActive = 1;";

                $parameters['idMovie'] = $idMovie;

                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($query, $parameters, QueryType::Query);
                foreach($resultSet as $row)
                {
                    $projection = new Projection();
                    $projection->setIdProjection($row['idProjection']);
                    $projection->setDate($row['date']);
                    $projection->setStartTime($row['startTime']);
                    $projection->setEndTime($row['endTime']);
                    $auditorium = new Auditorium();
                    $auditorium->setIdAuditorium($row['idAuditorium']);
                    $auditorium->setNameAuditorium($row['nameAuditorium']);
                    $auditorium->setAmountOfSeats($row['amountOfSeats']);
                    $auditorium->setTicketPrice($row['ticketPrice']);
                    $cinema = new Cinema();
                    $cinema->setIdCinema($row['idCinema']);
                    $cinema->setName($row['name']);
                    $cinema->setAdress($row['adress']);
                    $movie = new Movie();
                    $movie->setIdMovie($row['idMovie']);
                    $movie->setTitle($row['title']);
                    $auditorium->setCinema($cinema);
                    $projection->setAuditorium($auditorium);
                    $projection->setMovie($movie);

                    array_push($projections, $projection);
                }
                return $projections;
            } catch (Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetProjection($idProjection) // Retorna todas las funciones donde este la pelicula seleccionada
        {
            try
            {
                $query = "select 
                p.idProjection, p.date, p.startTime, p.endTime, p.idAuditorium, a.nameAuditorium, a.amountOfSeats, a.ticketPrice, a.idCinema, c.name, c.adress, m.idMovie, m.title
                from projections as p
                join auditoriums as a
                on p.idAuditorium = a.idAuditorium
                join cinemas as c
                on a.idCinema = c.idCinema
                join movies as m
                on p.idMovie = m.idMovie
                WHERE p.idProjection = :idProjection;";

                $parameters['idProjection'] = $idProjection;

                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($query, $parameters, QueryType::Query);
                foreach($resultSet as $row)
                {
                    $projection = new Projection();
                    $projection->setIdProjection($row['idProjection']);
                    $projection->setDate($row['date']);
                    $projection->setStartTime($row['startTime']);
                    $projection->setEndTime($row['endTime']);
                    $auditorium = new Auditorium();
                    $auditorium->setIdAuditorium($row['idAuditorium']);
                    $auditorium->setNameAuditorium($row['nameAuditorium']);
                    $auditorium->setAmountOfSeats($row['amountOfSeats']);
                    $auditorium->setTicketPrice($row['ticketPrice']);
                    $cinema = new Cinema();
                    $cinema->setIdCinema($row['idCinema']);
                    $cinema->setName($row['name']);
                    $cinema->setAdress($row['adress']);
                    $movie = new Movie();
                    $movie->setIdMovie($row['idMovie']);
                    $movie->setTitle($row['title']);
                    $auditorium->setCinema($cinema);
                    $projection->setAuditorium($auditorium);
                    $projection->setMovie($movie);
                }
                return $projection;

            } catch (Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>