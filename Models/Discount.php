<?php
    namespace Models;

    class Discount
    {
        private $idCompra;
        
        function construct__($idCompra = NULL)
        {
            $this->idCompra = $idCompra;
        }

        public function getIdCompra()
        {
            return $this->idCompra;
        }

        public function setIdCompra($idCompra)
        {
            $this->idCompra = $idCompra;
        }

        public function __toString()
        {
            return  " | ID Compra: $this->idCompra";
        }
    }
?>