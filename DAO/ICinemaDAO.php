<?php
    namespace DAO;
    use Models\Cinema as Cinema;

    interface ICinemaDAO
    {
        function Add(Cinema $cinema);
        function GetAll();
        // Funciton Delete() falta hacer
    }
?>