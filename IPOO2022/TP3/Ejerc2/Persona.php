<?php
    class Persona {
        private $nombre;
        private $apellido;
        private $documento;

        //Métodos de acceso
        public function getNombre() {
            return $this->nombre;
        }
        public function getApellido() {
            return $this->apellido;
        }
        public function getDocumento() {
            return $this->documento;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }
        public function setDocumento($documento) {
            $this->documento = $documento;
        }

        //Métodos
        public function __construct($nombre, $apellido, $documento) {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->documento = $documento;
        }

        public function __toString() {
            $cadena = "\n+ Nombre: ".$this->getApellido()."\n".
                    "+ Apellido: ".$this->getNombre()."\n".
                    "+ N° de Documento: ".$this->getDocumento()."\n";
            return $cadena;
        }
    }
?>