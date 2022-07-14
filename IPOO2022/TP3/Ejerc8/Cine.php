<?php
    //nombre, horario de inicio, duración, precio + género y origen
    class Cine extends Funciones {
        private $genero;
        private $paisOrigen;
        private $porcentajeIncremento;

        //Métodos de acceso:
        public function getGenero() {
            return $this->genero;
        }
        public function getPaisOrigen() {
            return $this->paisOrigen;
        }
        public function getPorcentajeIncremento() {
            return $this->porcentajeIncremento;
        }

        public function setGenero($genero) {
            $this->genero = $genero;
        }
        public function setPaisOrigen($paisOrigen) {
            $this->paisOrigen = $paisOrigen;
        }
        public function setPorcentajeIncremento($porcentajeIncremento) {
            $this->porcentajeIncremento = $porcentajeIncremento;
        }

        //Métodos varios:
        public function __construct($nombre, $horarioInicio, $duracionObra, $precio, $genero, $paisOrigen) {
            parent::__construct($nombre, $horarioInicio, $duracionObra, $precio);
            $this->genero = $genero;
            $this->paisOrigen = $paisOrigen;
            $this->porcentajeIncremento = 1.65;
        }

        public function darCostos() {
            $valorPrimario = parent::darCostos();
            $valorFinal = $valorPrimario * $this->getPorcentajeIncremento();
            return $valorFinal;
        }

        public function __toString() {
            $cadena = parent::__toString()
            ."|+ Género: ".$this->getGenero()."\n"
            ."|+ País de Origen: ".$this->getPaisOrigen()."\n"
            ."|+ Porcentaje de Incremento: ".$this->getPorcentajeIncremento()."%\n";
            return $cadena;
        }
    }
?>