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

        public function ShowBillboard($activeProjections)
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
            if(!isset($activeProjections))
            {
                $activeProjections = "hola";
            }
            $this->ShowBillboard($activeProjections);
        }
    }
?>