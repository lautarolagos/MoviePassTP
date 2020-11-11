<?php
    namespace DAO;

    use \Exception as Exception;
    use Interfaces\IGenreDAO as IGenreDAO;
    use DAO\Connection as Connection;
    use Models\Genre as Genre;

    class GenreDAO implements IGenreDAO
    {
        private $connection;
        private $tableName = "genres";
        
        public function GetAll()
        {
            try
            {
                $genresList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $genre = new Genre();
                    $genre->setName($row["name"]);
                    $genre->setIdGenre($row["idGenre"]);

                    array_push($genresList, $genre); 
                }
                return $genresList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>