<?php
    namespace Interfaces;
    use Models\Cinema as Cinema;

    interface ICinemaDAO
    {
        function Add(Cinema $cinema);
        function GetAll();
        function ReadAll();
        function Search($adress);
        function Delete($id);
    }
?>