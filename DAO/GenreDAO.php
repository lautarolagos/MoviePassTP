<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\Connection as Connection;
    use Models\Genre as Genre;

    class GenreDAO
    {
        private $conecction;
        private $movieTableName = "genres";
    }
?>