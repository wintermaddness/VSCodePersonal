<?php
    //$objFunciones: nombre, horario de inicio, duración de la obra y precio.
    class Funcion {
        private $nombreFuncion;
        private $horarioInicio;
        private $duracion;
        private $precio;

        //Métodos de acceso
        public function getNombreFuncion() {
            return $this->nombreFuncion;
        }
        public function getHorarioInicio() {
            return $this->horarioInicio;
        }
        public function getDuracion() {
            return $this->duracion;
        }
        public function getPrecio() {
            return $this->precio;
        }

        public function setNombreFuncion($nombreFuncion) {
            $this->nombreFuncion = $nombreFuncion;
        }
        public function setHorarioInicio($horarioInicio) {
            $this->horarioInicio = $horarioInicio;
        }
        public function setDuracion($duracion) {
            $this->duracion = $duracion;
        }
        public function setPrecio($precio) {
            $this->precio = $precio;
        }

        //Métodos
        public function __construct($nombreFuncion, $horarioInicio, $duracion, $precio) {
            $this->nombreFuncion = $nombreFuncion;
            $this->horarioInicio = $horarioInicio;
            $this->duracion = $duracion;
            $this->precio = $precio;
        }

        public function __toString() {
            $cadena = "+ Nombre de la función: ".$this->getNombreFuncion()."\n"
                    ."+ Horario de inicio: ".$this->getHorarioInicio()."\n"
                    ."+ Duración: ".$this->getDuracion()."\n"
                    ."+ Precio: $".$this->getPrecio()."\n";
            return $cadena;
        }
    }
?>