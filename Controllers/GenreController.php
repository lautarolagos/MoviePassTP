<?php
    namespace Controllers;

    use DAO\GenreDAO as GenreDAO;
    use DAO\APIDAO as APIDAO;
    use Models\Genre as Genre;
    use Models\Movie as Movie;

    class GenreController
    {
        private $genreDAO;
        private $APIDAO;

        public function __construct()
        {
            $this->genreDAO = new GenreDAO();
            $this->APIDAO = new APIDAO();
        }

        public function MoviesByGenre($genreName, $idAuditorium)
        {
           //$genresList = $this->genreDAO->GetAll();
            $genreListAPI = $this->APIDAO->GetGenres(); // Obtengo la lista completa de generos de la api
            $movieListAPI = $this->APIDAO->ShowMovies(); // Obtengo la lista de peliculas de la api
            
            foreach($genreListAPI as $genre) // Obtengo la ID del genero que me pasaron el nombre
            {
                if($genre->getName() == $genreName)
                {
                    $idGenre = $genre->getIdGenre();
                }
            }

            $moviesGenreFilter = array();


            foreach($movieListAPI as $movie) // recorro la lista de peliculas
            {
                //$genresMovie = $movie->getGenreIds(); // obtengo el array de generos de una pelicula
                $genresArray = array();
                foreach($movie->getGenreIds() as $value)
                {   
                    array_push($genresArray, $value); // Lista de los id de generos de una pelicula
                }
                // Recorro la lista esa
                foreach($genresArray as $value)
                {
                    if($value == $idGenre) // Si coincide es porque el genero esta en la pelicula. La agrego a una lista de pelis filtradas
                    {
                        $movieFilter = new Movie();
                        $movieFilter->setIdMovie($movie->getIdMovie());
                        $movieFilter->setAdult($movie->getAdult());
                        $movieFilter->setLanguage($movie->getLanguage());
                        $movieFilter->setTitle($movie->getTitle());
                        $movieFilter->SetRuntime($this->APIDAO->SetRuntimeMovie($movie->getIdMovie()));
                        $movieFilter->setGenreIds($movie->getGenreIds());
                        $movieFilter->setOverview($movie->getOverview());
                        $movieFilter->setReleaseDate($movie->getReleaseDate());
                        $movieFilter->setPosterPath($movie->getPosterPath());

                        array_push($moviesGenreFilter, $movieFilter);
                    break;
                    }
                }
            }
            require_once(VIEWS_PATH."ShowMoviesGenre.php");
        }
    }
?>