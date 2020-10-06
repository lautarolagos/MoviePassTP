<?php
    namespace Models;

    class Cinema
    {
        private $name;
        private $capacity;
        private $adress;
        private $ticketPrice;
        private $id;
        // Despues habría que agregar un arreglo de Salas, porque un cine tiene salas, despues lo pensamos bien
        // al parecer en inglés "Sala" de cine se dice "Auditorium"

        function construct__($name, $capacity, $adress, $ticketPrice, $id)
        {
            $this->name = $name;
            $this->capacity = $capacity;
            $this->adress = $adress;
            $this->ticketPrice = $ticketPrice;
            $this->id = $id;
        }

        public function getName()
        {
            return $this->userName;
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

        public function __toString()
        {
            return  " | Name: $this->name "."| Capacity: $this->capatity"."| Adress: $this->adress"."| Ticket Price: $this->ticketPrice"."| ID Cinema: $this->id";
        }
    }
?>