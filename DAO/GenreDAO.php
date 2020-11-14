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
        private $intermediateTableName = "genresXmovies";
        
        public function Add($idGenre, $name)
        {
            try
            {
                $query = "INSERT INTO " . $this->tableName . " (idGenre, name) VALUES (:idGenre, :name);";
                $parameters['idGenre'] = $idGenre;
                $parameters['name'] = $name;

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function AddGenresXmovies($idMovie, $idGenre)
        {
            try
            {
                $query = "INSERT INTO " . $this->intermediateTableName . " (idMovie, idGenre) VALUES (:idMovie, :idGenre);";
                $parameters['idMovie'] = $idMovie;
                $parameters['idGenre'] = $idGenre;

                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

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

        public function Search($idGenre)
        {
            try
            {
                $query = "SELECT * FROM " .$this->tableName. " WHERE (idGenre = :idGenre);";
                $parameters['idGenre'] = $idGenre;

                $this->connection = Connection::GetInstance();
                $resultSet = $this->connection->Execute($query, $parameters);
                foreach($resultSet as $row)
                {
                    $genre = new Genre();
                    $genre->setIdGenre($row['idGenre']);
                    $genre->setName($row['name']);
                }
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

            if(!empty($resultSet))
                return true;
            else
                return false;
        }
    }
?>