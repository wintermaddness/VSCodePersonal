<?php
    class Cliente extends Persona {
        private $nroCliente;

        //Métodos de acceso
        public function getNroCliente() {
            return $this->nroCliente;
        }
        public function setNroCliente($nroCliente) {
            $this->nroCliente = $nroCliente;
        }

        //Métodos
        public function __construct($nombre, $apellido, $dni, $nroCliente) {
            //-->Constructor de AlumnoFai
            parent::__construct($nombre, $apellido, $dni); //Se invoca al constructor de Persona
            $this->nroCliente = $nroCliente;
        }

        public function __toString() {
            return "| N° de cliente: ".$this->getNroCliente()."\n".
		            parent::__toString();
        }
    }
?>