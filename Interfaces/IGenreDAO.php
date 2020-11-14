<?php
    namespace Interfaces;
    
    use DAO\Connection as Connection;

    interface IGenreDAO
    {
        function Add($idGenre, $name);
        function GetAll();
        function Search($idGenre);
    }
?>