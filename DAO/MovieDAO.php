<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\Connection as Connection;
    use Models\Movie as Movie;

    class MovieDAO
    {
        private $connection;
        private $tableName = "movies";

        public function Add($movie)
        {
            try
            {
                $query = "INSERT INTO" . $this->tableName . "(idMovie, adult, language, title, overview, releaseDate, posterPath) VALUES (:movieId, :adult, :language, :title, :overview, :releaseDate, :posterPath);";
                $parameters['idMovie'] = $movie->getIdMovie();
                $parameters['adult'] = $movie->getAdult();
                $parameters['language'] = $movie->getLanguage();
                $parameters['title'] = $movie->getTitle();
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

        public function ReturnMovieByIdFromAPI($movieId)
        {
            $movies = json_decode(file_get_contents(API_PATH."movie/now_playing".API_KEY."&language=en-US"), true);

            $moviesArray = $movies['results'];

            if(isset($moviesArray))
            {
                foreach($moviesArray as $movie)
                {
                    if($movie['id'] == $movieId)
                    {
                        $newMovie = new Movie();
                        $newMovie->setIdMovie($movie['id']);
                        $newMovie->setAdult($movie['adult']);
                        $newMovie->setLanguage($movie['original_language']);
                        $newMovie->setTitle($movie['title']);
                        $newMovie->setGenreIds($movie['genre_ids']);
                        $newMovie->setOverview($movie['overview']);
                        $newMovie->setReleaseDate($movie['release_date']);
                        $newMovie->setPosterPath($movie['poster_path']);
                        
                        break;
                    }
                }
            }

            if(!isset($newMovie))
            {
                return false;
            }
            else
            {
                return $newMovie;
            }
        }
    }
?>