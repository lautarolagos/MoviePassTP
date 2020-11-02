<?php
    namespace Controllers;

    use Models\Movie as Movie;

    class BillboardController
    {
        public function ShowMoviesAPI()
        {
            $movies = json_decode(file_get_contents(API_PATH."movie/now_playing".API_KEY."&language=en-US"), true);

            $moviesArray = array();

            for($i = 0; $i < 9; $i++)
            {
                $movie = new Movie;
                $movie->setIdMovie($movies['results'][$i]['id']);
                $movie->setAdult($movies['results'][$i]['adult']);
                $movie->setLanguage($movies['results'][$i]['original_language']);
                $movie->setTitle($movies['results'][$i]['title']);
                $movie->setGenreIds($this->setGenres($movies['results'][$i]['genre_ids']));
                $movie->setOverview($movies['results'][$i]['overview']);
                $movie->setReleaseDate($movies['results'][$i]['release_date']);
                $movie->setPosterPath($movies['results'][$i]['poster_path']);

                array_push($moviesArray, $movie);
            }
            require_once(VIEWS_PATH."ShowBillboard.php");
        }

        public function setGenres($genreIds)
        {
            $genre = json_decode(file_get_contents(API_PATH . "genre/movie/list" . API_KEY . "&language=en-US"), true);

            $genreArrayAPI = $genre['genres'];
            $arrayToString = array();

            //Recorremos el arreglo que nos viene de la API con los id's del o los géneros de una película
            foreach($genreIds as $genreIds)
            {
                //Recorremos todo el arreglo de generos que tambén pedimos a la API para poder saber a que género pertenece esa 
                foreach($genreArrayAPI as $values)
                {
                    if($genreIds == $values['id'])
                    {
                        array_push($arrayToString, $values['name']);
                    }
                }
            }
            return implode(", ", $arrayToString);
        }
    }
?>