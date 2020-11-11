<?php
    namespace Interfaces;

    use Models\Movie as Movie;

    interface IMovieDAO
    {
        function Add(Movie $movie);
    }
?>