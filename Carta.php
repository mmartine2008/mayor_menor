<?php

    class Carta {
        private $palo;
        private $valor;

        function __construct($palo, $valor)
        {
            $this->palo = $palo;
            $this->valor = $valor;
        }        

        /**
         * Get the value of palo
         */ 
        public function getPalo()
        {
                return $this->palo;
        }

        /**
         * Get the value of valor
         */ 
        public function getValor()
        {
                return $this->valor;
        }

        function mostrar() {
            echo "Palo:".$this->getPalo().", valor: ".$this->getValor();
        }
    }