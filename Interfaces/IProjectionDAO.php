<?php
    namespace Interfaces;

    use DAO\Connection as Connection;
    use Models\Projection as Projection;

    interface IProjectionDAO
    {
        function Add(Projection $projection, $idAuditorium, $idMovie);
        function Search($date, $idMovie);
        function GetProjectionsByIdAuditorium($idAuditorium);

    }
?>