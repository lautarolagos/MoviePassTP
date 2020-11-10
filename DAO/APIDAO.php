<?php
    namespace DAO;

    use Models\Movie as Movie;

    class APIDAO 
    {
        public function ShowMovies()
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
                    $movie->SetRuntime($this->SetRuntimeMovie($movie->getIdMovie()));
                    $movie->setGenreIds($movies['results'][$i]['genre_ids']);
                    $movie->setOverview($movies['results'][$i]['overview']);
                    $movie->setReleaseDate($movies['results'][$i]['release_date']);
                    $movie->setPosterPath($movies['results'][$i]['poster_path']);

                    array_push($moviesArray, $movie);
                }

                return $moviesArray;
            }
            else
            {
                return $message = "Ups, an error has occurred";
            }
        }

        //Invocamos de nuevo a la API para acceder a la duracion de cada película, pasandole el id de la misma en el llamado de la API
        public function SetRuntimeMovie($idMovie)
        {
            $movieDetails = json_decode(file_get_contents(API_PATH."movie/".$idMovie.API_KEY."&language=en-US"), true);
            return $movieDetails['runtime'];
        }
    }
?>