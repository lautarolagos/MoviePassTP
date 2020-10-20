<?php
    namespace Models;

    class Cinema
    {
        private $name;
        private $capacity;
        private $adress;
        private $ticketPrice;
        private $id;
        private $eliminated;
        // Despues habría que agregar un arreglo de Salas, porque un cine tiene salas, despues lo pensamos bien
        // al parecer en inglés "Sala" de cine se dice "Auditorium"

        function construct__($name = NULL, $capacity = NULL, $adress = NULL, $ticketPrice = NULL, $id = NULL, $eliminated = NULL)
        {
            $this->name = $name;
            $this->capacity = $capacity;
            $this->adress = $adress;
            $this->ticketPrice = $ticketPrice;
            $this->id = $id;
            $this->eliminated = $eliminated;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getCapacity()
        {
            return $this->capacity;
        }

        public function setCapacity($capacity)
        {
            $this->capacity = $capacity;
        }

        public function getAdress()
        {
            return $this->adress;
        }

        public function setAdress($adress)
        {
            $this->adress = $adress;
        }

        public function getTicketPrice()
        {
            return $this->ticketPrice;
        }

        public function setTicketPrice($ticketPrice)
        {
            $this->ticketPrice = $ticketPrice;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function setEliminated($eliminated)
        {
            $this->eliminated=$eliminated;
        }

        public function getEliminated()
        {
            return $this->eliminated;
        }

        public function __toString()
        {
            return  " | Name: $this->name "."| Capacity: $this->capatity"."| Adress: $this->adress"."| Ticket Price: $this->ticketPrice"."| ID Cinema: $this->id";
        }
    }
?>