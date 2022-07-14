<?php
    class Obras extends Funciones {
        private $porcentajeIncremento;

        //Métodos de acceso:
        public function getPorcentajeIncremento() {
            return $this->porcentajeIncremento;
        }
        public function setPorcentajeIncremento($porcentajeIncremento) {
            $this->porcentajeIncremento = $porcentajeIncremento;
        }

        //Métodos varios:
        public function __construct($nombre, $horarioInicio, $duracionObra, $precio) {
            parent::__construct($nombre, $horarioInicio, $duracionObra, $precio);
            $this->porcentajeIncremento = 1.45;
        }

        public function darCostos() {
            $valorPrimario = parent::darCostos();
            $valorFinal = $valorPrimario * $this->getPorcentajeIncremento();
            return $valorFinal;
        }

        public function __toString() {
            $cadena = parent::__toString()."\n"
            ."|+ Porcentaje de Incremento: ".$this->getPorcentajeIncremento()."%\n";
            return $cadena;
        }
    }
?>