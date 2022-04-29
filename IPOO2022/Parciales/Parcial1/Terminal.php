<?php
    /**
     * Se registra la siguiente información:
     * denominación, dirección y la colección empresas registradas en la terminal.
     */
    class Terminal {
        private $denominacion;
        private $direccion;
        private $arrayEmpresas;

        //Métodos de acceso:
        public function getDenominacion() {
            return $this->denominacion;
        }
        public function getDireccion() {
            return $this->direccion;
        }
        public function getArrayEmpresas() {
            return $this->arrayEmpresas;
        }

        public function setVariable($denominacion) {
            $this->denominacion = $denominacion;
        }
        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
        public function setArrayEmpresas($arrayEmpresas) {
            $this->arrayEmpresas = $arrayEmpresas;
        }

        //Métodos varios:
        public function __construct($denominacion, $direccion, $arrayEmpresas) {
            $this->denominacion = $denominacion;
            $this->direccion = $direccion;
            $this->arrayEmpresas = $arrayEmpresas;
        }

        /**
         * Método 1: ventaAutomática - 
         * Dada la cant. de asientos, una fecha, un destino y la empresa con la que se viaja,
         * se registra automáticamente la venta del viaje.
         */
        public function ventaAutomatica($cantAsientos, $fecha, $destino, $empresa) {
            $arrayEmpresas = $this->getArrayEmpresas();
            $i = 0;
            foreach ($arrayEmpresas as $unaEmpresa) {
                if ($unaEmpresa == $empresa) {
                    $unViaje = $unaEmpresa[$i];
                    $unViaje->venderViajeADestino($cantAsientos, $fecha, $destino);
                }
                $i++;
            }
        }

        /**
         * Método 2: empresaMayorRecaudacion - 
         * Retorna un obj de la empresa con mayor recaudación.
         */
        public function empresaMayorRecaudacion() {
            $mayorRecaudacion = 0;
            $arrayEmpresas = $this->getArrayEmpresas();
            foreach ($arrayEmpresas as $unaEmpresa) {
                $montoEmpresa = $unaEmpresa->montoRecaudado();
                if ($montoEmpresa > $mayorRecaudacion) {
                    $mayorRecaudacion = $montoEmpresa;
                    $objEmpresa = $unaEmpresa;
                }
            }
            return $objEmpresa;
        }

        /**
         * Método 3: responsableViaje - 
         * Dado un número de viaje, retorna su responsable.
         * @return string
         */
        public function responsableViaje($numeroViaje) {
            $i = 0;
            $arrayEmpresas = $this->getArrayEmpresas();
            foreach ($arrayEmpresas as $unaEmpresa) {
                $cantViajes = count($unaEmpresa->getArrayViajes());
                do {
                    $unViaje = $unaEmpresa[$i];
                    $nroViaje = $unViaje->getNumero();
                    if ($nroViaje == $numeroViaje) {
                        $objResponsable = $unViaje->getObjResponsable();
                    }
                } while($i < $cantViajes);
            }
            return $objResponsable;
        }

        public function __toString() {
            $cadena = "+ Denominación: ".$this->getDenominacion()."\n".
                    "+ Dirección: ".$this->getDireccion()."\n".
                    "+ Empresas Registradas: ".$this->getArrayEmpresas()."\n";
            return $cadena;
        }
    }
?>