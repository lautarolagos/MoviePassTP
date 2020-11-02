<?php
    namespace Interfaces;
    
    use Models\User as User;
    use DAO\Connection as Connection;
    use Models\Auditorium as Auditorium;

    interface IAuditoriumDAO
    {
        function Add(Auditorium $auditorium, $idCinema);
        function GetById($idCinema);
        function Delete($idAuditorium);
        function Search($nameAuditorium, $idCinema);
        function Edit($nameAuditorium, $amountOfSeats, $adress, $idAuditorium);
    }
?>