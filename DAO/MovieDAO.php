<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\Connection as Connection;
    use Models\Movie as Movie;

    class MovieDAO
    {
        private $connection;
        private $tableName = "movies";

        public function Add(Movie $movie)
        {
            try
            {
                $query = "INSERT INTO " . $this->tableName . "(idMovie, adult, language, title, runtime, overview, releaseDate, posterPath) VALUES (:idMovie, :adult, :language, :title, :runtime, :overview, :releaseDate, :posterPath);";
                $parameters['idMovie'] = $movie->getIdMovie();
                $parameters['adult'] = $movie->getAdult();
                $parameters['language'] = $movie->getLanguage();
                $parameters['title'] = $movie->getTitle();
                $parameters['runtime'] = $movie->getRuntime();
                $parameters['overview'] = $movie->getOverview();
                $parameters['releaseDate'] = $movie->getReleaseDate();
                $parameters['posterPath'] = $movie->getPosterPath();


                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        
        public function Search($idMovie) // Busca una pelicula en la BDD
        {
            $sql = "SELECT * FROM ".$this->tableName . " WHERE (idMovie = :idMovie)";

            $parameters['idMovie'] = $idMovie;

            try
            {
                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($sql, $parameters, QueryType::Query);

                if(!empty($resultSet))
                {
                    foreach($resultSet as $row)
                    {
                        $movie = new Movie();
                        $movie->setIdMovie($row['idMovie']);
                        $movie->setAdult($row['adult']);
                        $movie->setLanguage($row['language']);
                        $movie->setTitle($row['title']);
                        $movie->setRuntime($row['runtime']);
                        $movie->setOverview($row['overview']);
                        $movie->setReleaseDate($row['releaseDate']);
                        $movie->setPosterPath($row['posterPath']);
                    }
                }
            } catch(Exception $ex)
            {
                throw $ex;
            }

            if(!empty($resultSet))
                return $movie;
            else
                return false;
        }

        public function GetMoviesBillboard() // Obtener las peliculas que estan en cartelera
        {
            $sql = "select movies.idMovie, movies.adult, movies.language, movies.title, movies.runtime, movies.overview, movies.releaseDate, movies.posterPath
            from movies
            JOIN projections
            ON movies.idMovie = projections.idMovie
            WHERE projections.isActive = 1;";
            
            $moviesOnBillboard = array();
            
            try
            {
                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($sql);

                if(!empty($resultSet))
                {
                    foreach($resultSet as $row)
                    {
                        $movie = new Movie();
                        $movie->setIdMovie($row['idMovie']);
                        $movie->setAdult($row['adult']);
                        $movie->setLanguage($row['language']);
                        $movie->setTitle($row['title']);
                        $movie->setRuntime($row['runtime']);
                        $movie->setOverview($row['overview']);
                        $movie->setReleaseDate($row['releaseDate']);
                        $movie->setPosterPath($row['posterPath']);

                        array_push($moviesOnBillboard, $movie);
                    }
                }
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
            return $moviesOnBillboard;

        }

    }
?>