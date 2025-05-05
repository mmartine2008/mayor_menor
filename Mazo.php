<?php
    require_once('Carta.php');
    require_once('Basto.php');
    require_once('Oro.php');
    require_once('Espada.php');
    require_once('Copa.php');

    define('MIN_MAZO', 0);
    define('MAX_MAZO', 39);
    define('REPETIR_MESCLA', 10);
    
    class Mazo {

        private $cartas = [];

        public function vacio() {
            return count($this->cartas) == 0;
        }

        public function totalCartas() {
            return count($this->cartas);
        }

        function __construct()
        {
            for($i=1; $i<=12; $i++) {

                if (($i != 8) && ($i != 9)) {
                    $c1 = new Carta(new Basto(), $i);
                    $this->cartas[] = $c1;
                }
            }
            for($i=1; $i<=12; $i++) {

                if (($i != 8) && ($i != 9)) {
                    $c1 = new Carta(new Oro(), $i);
                    $this->cartas[] = $c1;
                }
            }
            for($i=1; $i<=12; $i++) {

                if (($i != 8) && ($i != 9)) {
                    $c1 = new Carta(new Espada(), $i);
                    $this->cartas[] = $c1;
                }
            }
            for($i=1; $i<=12; $i++) {

                if (($i != 8) && ($i != 9)) {
                    $c1 = new Carta(new Copa(), $i);
                    $this->cartas[] = $c1;
                }
            }
            
        }

        function mostrar() {
            
            foreach ($this->cartas as $carta) {
                $carta->mostrar();
                echo (PHP_EOL);
            }

            echo ("Total cartas:" . count($this->cartas));
        }

        // devuelve un par [a1, a2] de arreglos de cartas del mazo actual
        private function separar() {
            $mitad = random_int(MIN_MAZO, MAX_MAZO);

            $a1 = [];
            for ($i = MIN_MAZO; $i < $mitad; $i++) {
                $a1[] = $this->cartas[$i];
            }

            $a2 = [];
            for ($i = $mitad; $i <= MAX_MAZO; $i++) {
                $a2[] = $this->cartas[$i];
            }

            return [$a1, $a2];
        }

        private function unir($a1, $a2) {
            $resultado = [];

            while ((count($a1)) > 0 && (count($a2) > 0)) {
                $resultado[] = array_pop($a2);
                $resultado[] = array_pop($a1);
            }

            while (count($a2) > 0 ) {
                $resultado[] = array_pop($a2);
            }

            while (count($a1) > 0 ) {
                $resultado[] = array_pop($a1);
            }

            return $resultado;
        }

        private function separar_y_unir() {

            $par = $this->separar();
            $a1 = $par[0];
            $a2 = $par[1];
            $resultado = $this->unir($a1, $a2);
            $this->cartas = [];
            foreach ($resultado as $carta) {
                $this->cartas[] = $carta;
            }
        }

        function mezclar() {
            // 1. buscar un numero x aleatorio entre 2 y 39
            // 2. armar dos arreglos a1 y a2, con antes x y despues x
            // 3. unir a2 con a1
            // 4. Repetir una cantidad fija de veces
            
            for($i = 0; $i<REPETIR_MESCLA; $i++) {
                $this->separar_y_unir();
            }

        }

        public function sacarCarta() {

            $carta = array_pop($this->cartas);
            return $carta;
        }

    }