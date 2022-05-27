<?php
    class MinisterioDeporte {
        private $anioTorneo;
        private $arrayTorneos;

        //Métodos de acceso
        public function getAnioTorneo() {
            return $this->anioTorneo;
        }
        public function getarrayTorneos() {
            return $this->arrayTorneos;
        }

        public function setAnioTorneo($anioTorneo) {
            $this->anioTorneo = $anioTorneo;
        }
        public function setarrayTorneos($arrayTorneos) {
            $this->arrayTorneos = $arrayTorneos;
        }

        //Métodos
        public function __construct($anioTorneo, $arrayTorneos) {
            $this->anioTorneo = $anioTorneo;
            $this->arrayTorneos = $arrayTorneos;
        }

        /**
         * Método 1: mostrarTorneos - 
         * Retorna la lista de torneos almacenados en la colección de torneos.
         */

        public function __toString() {
            $cadena = "| AÑO TORNEO: ".$this->getAnioTorneo()."\n"
                    ."| TORNEOS: ".$this->mostrarTorneos()."\n";
            return $cadena;
        }
    }
?>