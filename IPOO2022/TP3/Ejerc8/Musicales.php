<?php
    //nombre, horario de inicio, duración, precio + director y cant. actores en escena
    class Musicales extends Funciones {
        private $director;
        private $cantidadPersonasEnEscena;
        private $porcentajeIncremento;

        //Métodos de acceso:
        public function getDirector() {
            return $this->director;
        }
        public function getCantidadPersonasEnEscena() {
            return $this->cantidadPersonasEnEscena;
        }
        public function getPorcentajeIncremento() {
            return $this->porcentajeIncremento;
        }

        public function setDirector($director) {
            $this->director = $director;
        }
        public function setCantidadPersonasEnEscena($cantidadPersonasEnEscena) {
            $this->cantidadPersonasEnEscena = $cantidadPersonasEnEscena;
        }
        public function setPorcentajeIncremento($porcentajeIncremento) {
            $this->porcentajeIncremento = $porcentajeIncremento;
        }

        //Métodos varios:
        public function __construct($nombre, $horarioInicio, $duracionObra, $precio, $director, $cantidadPersonasEnEscena) {
            parent::__construct($nombre, $horarioInicio, $duracionObra, $precio);
            $this->director = $director;
            $this->cantidadPersonasEnEscena = $cantidadPersonasEnEscena;
            $this->porcentajeIncremento = 1.12;
        }

        public function darCostos() {
            $valorPrimario = parent::darCostos();
            $valorFinal = $valorPrimario * $this->getPorcentajeIncremento();
            return $valorFinal;
        }

        public function __toString() {
            $cadena = parent::__toString()
            ."|+ Director: ".$this->getDirector()."\n"
            ."|+ Cantidad de Personas en Escena: ".$this->getCantidadPersonasEnEscena()."\n"
            ."|+ Porcentaja de Incremento: ".$this->getPorcentajeIncremento()."%\n";
            return $cadena;
        }
    }
?>