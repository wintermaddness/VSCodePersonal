<?php
    class Futbol extends Partido {
        // Métodos
        public function __construct($idPartido, $fecha, $objEquipo1, $objEquipo2, $cantGolesE1, $cantGolesE2) {
            parent::__construct($idPartido, $fecha, $objEquipo1, $objEquipo2, $cantGolesE1, $cantGolesE2);
        }
        
        /**
         * Método 1: coeficientePartido - 
         * Retorna el valor del coeficiente base * cant. goles * cant. jugadores.
         */
        public function coeficientePartido() {
            $coeficiente = parent::coeficienteBase();
            switch ($this->getObjEquipo1()->getCategoria()->getIdCategoria()) {
                case "Menores":
                    $coeficiente += $coeficiente * 0.11;
                    break;
                case "Juveniles";
                    $coeficiente += $coeficiente * 0.17;
                    break;
                case "Mayores";
                    $coeficiente += $coeficiente * 0.23;
                    break;
            }
            return $coeficiente;
        }
}