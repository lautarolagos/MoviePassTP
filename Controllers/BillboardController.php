<?php
    namespace Controllers;

    use DAO\ProjectionDAO as ProjectionDAO;
    use DAO\MovieDAO as MovieDAO;
    use Models\Projection as Projection;
    use Models\Movie as Movie;

    class BillboardController 
    {
        
        public function __construct()
        {
            $this->projectionDAO = new ProjectionDAO();
            $this->movieDAO = new MovieDAO();
        }

        public function ShowBillboard($moviesOnBillboard)
        {
            require_once(VIEWS_PATH."Billboard.php");
        }

        public function LoadProjections()
        {
            $activeProjections = $this->projectionDAO->GetActiveProjections(); // Array de las projections activas
            // Ahora cada projection del array tiene un obj adentro de tipo movie que solo contiene la ID de la movie
            // Tengo que ir a la tabla de movies y obtener los demas datos de esa pelicula y setearselos
            foreach($activeProjections as $projection)
            {
                $idMovie = $projection->getMovie()->getIdMovie(); 
            
                $movie = $this->movieDAO->Search($idMovie);
                $projection->setMovie($movie); // le asigno a la projection la movie completamente cargada
            }

            $moviesOnBillboard = array();
            foreach($activeProjections as $projections) // creo un array de las peliculas unicamente con projections
            {
                $movieProjection = new Movie();
                $movieProjection = $projections->getMovie();
                array_push($moviesOnBillboard, $movieProjection);
            }
            $moviesOnBillboard = $this->DeleteDuplicates($moviesOnBillboard);

            $this->ShowBillboard($moviesOnBillboard); // En vez de mandar un array de projections, mando un array de las peliculas que estan en projections
        }

        public function DeleteDuplicates($moviesOnBillboard, $keep_key_assoc = false)
        {    
            $duplicates = array(); // array donde van a ir las peliculas duplicadas
            $aux = array(); // array auxiliar donde van a ir las NO repetidas
        
            foreach ($moviesOnBillboard as $key => $val) 
            {
                if (is_object($val)) // Como la funcion "in_array" no deja usar objetos, lo convierto a un array
                {
                    $val = (array)$val;
                }
                if (!in_array($val, $aux)) // con in_array busco si un elemento esta en el array, en el primer caso obviamente no va a estar repetido
                {
                    $aux[] = $val; // lo meto en un array auxiliar de peliculas NO repetidas
                }
                else
                {
                    $duplicates[] = $key; // Luego si la proxima pelicula esta repetida, va a ir aca
                }
            }
        
            foreach ($duplicates as $key) // Recorro el array de duplicados y a cada valor, lo saco del array de peliculas
            {
                unset($moviesOnBillboard[$key]);
            }   
        
            return $keep_key_assoc ? $moviesOnBillboard : array_values($moviesOnBillboard);
        }
    }
?>