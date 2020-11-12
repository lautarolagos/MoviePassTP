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
            $moviesOnBillboard = $this->movieDAO->GetMoviesBillboard(); // Obtengo la lista de peliculas que estan activas en cartelera
            $moviesOnBillboard = $this->DeleteDuplicates($moviesOnBillboard); // Elimino las que esten duplicadas

            $this->ShowBillboard($moviesOnBillboard); // Mando la lista filtrada a la vista
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