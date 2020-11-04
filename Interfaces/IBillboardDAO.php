<?php
    namespace Interfaces;

    use Models\Billboard as Billboard;
    use DAO\Connection as Connection;

    interface IBillboardDAO
    {
        public function Add($movieId);
        public function SearchById($movieId);
    }
?>