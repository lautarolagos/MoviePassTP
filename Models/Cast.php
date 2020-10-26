<?php
    namespace Models;

    class Cast
    {
        private $actorList;
        private $directorList;
    
        function __construct($actorList = NULL, $directorList = NULL)
        {
            $this->actorList = $actorList;
            $this->directorList = $directorList;
        }

        public function getActorList()
        {
            return $this->actorList;
        }

        public function setActorList($actorList)
        {
            $this->actorList = $actorList;
        }

        public function getDirectorList()
        {
            return $this->directorList;
        }

        public function setDirectorList($directorList)
        {
            $this->directorList = $directorList;
        }

        public function __toString()
        {
            return  " | Actor list: $this->actorList"."| Code: $this->code"."| Director list: $this->directorList";
        }
    }
?>