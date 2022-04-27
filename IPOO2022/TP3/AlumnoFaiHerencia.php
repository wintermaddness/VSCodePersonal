<?php
    class AlumnoFai extends Persona {
        private $legajo;

        //Métodos de acceso
        public function getLegajo() {
            return $this->legajo;
        }

        public function setLegajo($legajo) {
            $this->legajo = $legajo;
        }

        //Métodos
        public function __construct($nombre, $apellido, $dni, $legajo) {
            //-->Constructor de AlumnoFai
            parent::__construct($nombre, $apellido, $dni); //Se invoca al constructor de Persona
            $this->legajo = $legajo;
        }

        public function __toString() {
            $cadena = parent::__toString();
            $cadena .= "+ Legajo: ".$this->getLegajo();
            return $cadena;
        }
    }
?>