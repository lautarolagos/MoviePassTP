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
    }
?>