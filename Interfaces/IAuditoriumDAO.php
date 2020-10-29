<?php
    namespace Interfaces;
    
    use Models\User as User;
    use DAO\Connection as Connection;
    use Models\Auditorium as Auditorium;

    interface IAuditoriumDAO
    {
        function Add(Auditorium $auditorium, $idCinema);
        function GetById($idCinema);
        function Delete($idCinema, $idAuditorium);
        function Search($nameAuditorium, $idCinema);
    }
?>