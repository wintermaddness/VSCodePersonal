<?php
    class Tramite {
        private $horarioCreacion;
        private $horarioResolucion;

        //Métodos de acceso
        public function getHorarioCreacion() {
            return $this->horarioCreacion;
        }
        public function getHorarioResolucion() {
            return $this->horarioResolucion;
        }

        public function setHorarioCreacion($horarioCreacion) {
            $this->horarioCreacion = $horarioCreacion;
        }
        public function setHorarioResolucion($horarioResolucion) {
            $this->horarioResolucion = $horarioResolucion;
        }

        //Métodos
        public function __construct($horarioCreacion, $horarioResolucion) {
            $this->horarioCreacion = $horarioCreacion;
            $this->horarioResolucion = $horarioResolucion;
        }

        public function __toString() {
            $cadena = " +| Horario de creación: ".$this->getHorarioCreacion().
                    "\n +| Horario de resolución: ".$this->getHorarioResolucion()."\n";
            return $cadena;
        }
    }
?>