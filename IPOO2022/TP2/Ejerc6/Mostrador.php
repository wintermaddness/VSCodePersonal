<?php
    class Mostrador {
        private $nombreMostrador;
        private $personasEnCola = 0;
        private $maxPersonasEnCola;
        private $arrayTramitesPermitidos;
        private $arrayTramites = [];

        //Métodos de acceso
        public function getNombreMostrador() {
            return $this->nombreMostrador;
        }
        public function getPersonasEnCola() {
            return $this->personasEnCola;
        }
        public function getMaxPersonasEnCola() {
            return $this->maxPersonasEnCola;
        }
        public function getArrayTramitesPermitidos() {
            return $this->arrayTramitesPermitidos;
        }
        public function getArrayTramites() {
            return $this->arrayTramites;
        }

        public function setNombreMostrador($nombreMostrador) {
            $this->nombreMostrador = $nombreMostrador;
        }
        public function setPersonasEnCola($personasEnCola) {
            $this->personasEnCola = $personasEnCola;
        }
        public function setMaxPersonasEnCola($maxPersonasEnCola) {
            $this->maxPersonasEnCola = $maxPersonasEnCola;
        }
        public function setArrayTramitesPermitidos($arrayTramitesPermitidos) {
            $this->arrayTramitesPermitidos = $arrayTramitesPermitidos;
        }
        public function setArrayTramites($arrayTramites) {
            $this->arrayTramites = $arrayTramites;
        }

        //Métodos
        public function __construct($nombreMostrador, $maxPersonasEnCola, $arrayTramitesPermitidos) {
            $this->nombreMostrador = $nombreMostrador;
            $this->maxPersonasEnCola = $maxPersonasEnCola;
            $this->arrayTramitesPermitidos = $arrayTramitesPermitidos;
        }
        
        public function agregarTramite($nuevoTramite) {
            $arrayTramitesPermitidos = $this->getArrayTramitesPermitidos();
            $cantTramites = count($arrayTramitesPermitidos);
            if ($cantTramites == 0) {
                $arrayTramitesPermitidos[0] = $nuevoTramite;
            } else {
                $arrayTramitesPermitidos[$cantTramites] = $nuevoTramite;
            }
            $this->setArrayTramitesPermitidos($arrayTramitesPermitidos);
        }

        /**
         * Método 2: atiende($unTramite) - 
         * Devuelve true o false indicando si el tramite se puede atender o no en el mostrador.
         * @return boolean
         */
        public function atiende($unTramite) {
            $arrayTramitesPermitidos = $this->getArrayTramitesPermitidos();
            $cantTramites = count($arrayTramitesPermitidos);
            $bandera = false;
            $i = 0;
            while ($i<$cantTramites && $bandera == false) {
                if ($arrayTramitesPermitidos[$i] == $unTramite) {
                    $encontrado = true;
                    $bandera = true;
                } else {
                    $encontrado = false;
                }
                $i = $i + 1;
            }
            return $encontrado;
        }

        public function __toString() {
            
        }
    }
?>