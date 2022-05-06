<?php
    //almacena la descripción y el porcentaje de ganancia aplicado a los productos vinculados a ese rubro
    class Rubro {
        private $descripcion;
        private $porcentajeGanancia;

        //Métodos de acceso
        public function getDescripcion() {
            return $this->descripcion;
        }
        public function getPorcentajeGanancia() {
            return $this->porcentajeGanancia;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        public function setPorcentajeGanancia($porcentajeGanancia) {
            $this->porcentajeGanancia = $porcentajeGanancia;
        }

        //Métodos
        public function __construct($descripcion, $porcentajeGanancia) {
            $this->descripcion = $descripcion;
            $this->porcentajeGanancia = $porcentajeGanancia;
        }

        public function __toString() {
            return "    + Descripción: ".$this->getDescripcion()."\n".
            "   + Porcentaje de ganancias: ".$this->getPorcentajeGanancia()."\n";
        }
    }
?>