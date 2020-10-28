<?php
    namespace Interfaces;
    
    use Models\User as User;
    use DAO\Connection as Connection;

    interface IAuditoriumDAO
    {
        function Add(Auditorium $auditorium, $idCinema);
        function GetById($idCinema);
        function Delete($idCinema, $idAuditorium);
        function Search($nameAuditorium, $idCinema);
    }
?>