<?php
    namespace DAO;
    use Models\Auditorium as Auditorium;

    interface IAuditoriumDAO
    {
        function Add(Auditorium $auditorium);
        function GetAll();
        function GetAuditoriumByCinema($cinemaID);
        //function Delete($id);
    }

?>