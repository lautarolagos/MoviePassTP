<?php
    namespace Controllers;

    use DAO\MovieDAO as MovieDAO;
    use DAO\GenreDAO as GenreDAO;
    use Models\Movie as Movie;
    use Models\Genre as Genre;

    class BillboardController
    {
        private $movieDAO;
        private $genreDAO;

        function __construct()
        {
            $this->movieDAO = new MovieDAO();
            $this->genreDAO = new GenreDAO();
        }

        //API Functions:
        public function ShowMoviesAPI($idAuditorium)
        {
            $movies = json_decode(file_get_contents(API_PATH."movie/now_playing".API_KEY."&language=en-US"), true);

            if(isset($movies))
            {
                $moviesArray = array();

                //Lo hacemos con un for para poder traer la cantidad de películas que nosotros querramos desde la API 
                for($i = 0; $i < 20; $i++)
                {
                    $movie = new Movie;
                    $movie->setIdMovie($movies['results'][$i]['id']);
                    $movie->setAdult($movies['results'][$i]['adult']);
                    $movie->setLanguage($movies['results'][$i]['original_language']);
                    $movie->setTitle($movies['results'][$i]['title']);
                    $movie->setGenreIds($movies['results'][$i]['genre_ids']);
                    $movie->setOverview($movies['results'][$i]['overview']);
                    $movie->setReleaseDate($movies['results'][$i]['release_date']);
                    $movie->setPosterPath($movies['results'][$i]['poster_path']);

                    array_push($moviesArray, $movie);
                }
                require_once(VIEWS_PATH."ShowMoviesAPI.php");
            }
        }

        //Billboard functions:
        public function ShowAddProjection($movieId, $idAuditorium)
        {
            require_once(VIEWS_PATH."AddProjection.php");
        }

        public function Add($date, $startTime, $endTime, $movieId, $idAuditorium)
        {
           $movieObj = $this->movieDAO->ReturnMovieByIdFromAPI($movieId);

           
        }

        public function ShowBillboard()
        {
            require_once(VIEWS_PATH."Billboard.php");
        }
    }
?>