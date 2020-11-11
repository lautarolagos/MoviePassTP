<?php
    namespace Interfaces;

    interface IAPIDAO
    {
        function ShowMovies();
        function SetRuntimeMovie($idMovie);
        function ReturnMovieByIdFromAPI($idMovie);
    }
?>