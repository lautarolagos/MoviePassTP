<?php
    namespace Interfaces;

    use DAO\Connection as Connection;
    use Models\Projection as Projection;

    interface IProjectionDAO
    {
        function Add(Projection $projection);
        function Search($date, $idMovie);
        function GetProjectionsByIdAuditorium($idAuditorium);

    }
?>