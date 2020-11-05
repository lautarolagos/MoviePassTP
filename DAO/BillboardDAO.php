<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\Connection as Connection;
    use Interfaces\IBillboardDAO as IBillboardDAO;
    use Models\Movie as Movie;
    use Models\Genre as Genre;
    
    class BillboardDAO implements IBillboardDAO
    {
        private $conecction;
        private $movieTableName = "movies";
        private $genreTableName = "genres";

        public function AddMovie($movieId)
        {
            echo "Wea";
        }

        public function SearchById($movieId)
        {
            //Nos traemos las peliculas de la API
            $movies = json_decode(file_get_contents(API_PATH."movie/now_playing".API_KEY."&language=en-US"), true);
            $moviesArray = $movies['results'];

            if(isset($moviesArray))
            {
                foreach($moviesArray as $movie)
                {
                    
                }
            }
        }

        public function AddGenre(Genre $genreObj)
        {
            
        }
    }
?>