<?php
    namespace Controllers;

    use DAO\BillboardDAO as BillboardDAO;
    use Models\Movie as Movie;
    use Models\Genre as Genre;

    class BillboardController
    {
        private $billboardDAO;

        function __construct()
        {
            $this->billboardDAO = new BillboardDAO;
        }

        //API Functions:
        public function ShowMoviesAPI()
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
                require_once(VIEWS_PATH."ShowAddMovieAPI.php");
            }
        }

        // public function setGenres($genreIdsAPI)
        // {
        //     $genre = json_decode(file_get_contents(API_PATH . "genre/movie/list" . API_KEY . "&language=en-US"), true);

        //     $genreArrayAPI = $genre['genres'];
        //     $genreArray = array();

        //     //Recorremos el arreglo que nos viene de la API con los id's del o los géneros de una película
        //     foreach($genreIdsAPI as $genreIds)
        //     {
        //         //Recorremos todo el arreglo de generos que tambén pedimos a la API para poder saber el nombre y la id del o los generos que nos lleguen
        //         foreach($genreArrayAPI as $values)
        //         {
        //             if($genreIds == $values['id'])
        //             {
        //                 $newGenre = new Genre();
        //                 $newGenre->setIdGenre($values['id']);
        //                 $newGenre->setName($values['name']);
        //                 array_push($genreArray, $newGenre);
        //             }
        //         }
        //     }
        //     return $genreArray;
        // }

        //Billboard functions:
        public function Add($movieId)
        {
            echo "Movie id: ".$movieId;
        }
    }
?>