<?php
    namespace Models;

    class Genre
    {
        private $idGenre;
        private $name;

        function __construct($idGenre, $name)
        {
            $this->idGenre = $idGenre;
            $this->name = $name;
        }

        public function getIdGenre()
        {
            return $this->idGenre;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setIdGenre($idGenre)
        {
            $this->idGenre = $idGenre;
        }

        public function setName($name)
        {
            $this->name = $name;
        }
    }
?>