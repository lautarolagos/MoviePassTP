<?php
    namespace Interfaces;
    use Models\Cinema as Cinema;

    interface ICinemaDAO
    {
        function Add(Cinema $cinema);
        function GetAll();
        function ReadAll();
        function Search($name);
        function Delete($id);
        function Edit($name, $adress, $id);
    }
?>