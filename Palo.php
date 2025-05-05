<?php

    abstract class Palo {
        abstract function getTipo();

        function __toString()
        {
            return $this->getTipo();
        }
    }