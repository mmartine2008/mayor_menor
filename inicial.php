<?php
    require_once('Mazo.php');
    
    $mazo = new Mazo();
    $mazo->mezclar();

    $puntaje = 10;
    $cartaM = $mazo->sacarCarta();
    while (($puntaje > 0) && (!$mazo->vacio())) {
        echo "Total de cartas restantes:".$mazo->totalCartas();
        echo PHP_EOL;
        echo "Puntaje actual:".$puntaje;
        echo PHP_EOL;

        $cartaM->mostrar();
        echo PHP_EOL;
        echo "Elija opcion:".PHP_EOL;
        echo "1. Mayor".PHP_EOL;
        echo "2. Menor".PHP_EOL;
        echo "3. Igual".PHP_EOL;
        echo ">";
        $opcion = trim(fgets(STDIN));

        $cartaN = $mazo->sacarCarta();
        $m = $cartaM->getValor();
        $n = $cartaN->getValor();

        if ((($opcion == 1) && ($m < $n)) ||
            (($opcion == 2) && ($m > $n)) ||
            (($opcion == 3) && ($m == $n))) {
            echo ("CORRECTO !!".PHP_EOL);    
            $puntaje ++;
        } else {
            echo ("MAL !!".PHP_EOL);
            $puntaje = $puntaje -5;
        }
        
        $cartaM = $cartaN;
        
    }

    if ($puntaje == 0) {
        echo ("PERDISTE :( ".PHP_EOL);
    } else {
        echo ("Ganaste !! :) ".PHP_EOL);
    }