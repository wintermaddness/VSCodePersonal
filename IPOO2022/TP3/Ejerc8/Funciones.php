<?php
    //nombre, horario de inicio, duración y precio
    class Funciones {
        private $nombre;
        private $horarioInicio;
        private $duracion;
        private $precio;

        //Métodos de acceso:
        public function getNombre() {
            return $this->nombre;
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

        public function setNombre($nombre) {
            $this->nombre = $nombre;
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

        //Métodos varios:
        public function __construct($nombre, $horarioInicio, $duracion, $precio) {
            $this->nombre = $nombre;
            $this->horarioInicio = $horarioInicio;
            $this->duracion = $duracion;
            $this->precio = $precio;
        }

        public function darCostos() {
            $valorTotal = $this->getPrecio();
            return $valorTotal;
        }

        public function __toString() {
            $cadena = "|+ Nombre Función: ".$this->getNombre()."\n"
                ."|+ Horario de Inicio: ".$this->getHorarioInicio()."\n"
                ."|+ Duración: ".$this->getDuracion()."\n"
                ."|+ Precio: ".$this->getPrecio()."\n";
            return $cadena;
        }
    }
?>