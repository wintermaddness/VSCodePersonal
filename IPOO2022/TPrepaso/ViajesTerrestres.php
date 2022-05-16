<?php
    //comodidad del asiento: si es semicama o cama.
    class ViajesTerrestres extends Viaje {
        private $tipoAsiento;
        private $importeTerrestre;
        private $idaVuelta;

        //Métodos de acceso        
        public function getTipoAsiento() {
            return $this->tipoAsiento;
        }
        public function getImporteTerrestre() {
            return $this->importeTerrestre;
        }
        public function getIdaVuelta() {
            return $this->idaVuelta;
        }

        public function setTipoAsiento($tipoAsiento) {
            $this->tipoAsiento = $tipoAsiento;
        }
        public function setImporteTerrestre($importeTerrestre) {
            $this->importeTerrestre = $importeTerrestre;
        }
        public function setIdaVuelta($idaVuelta) {
            $this->idaVuelta = $idaVuelta;
        }

        //Métodos
        public function __construct($codigoViaje, $destino, $capacidadPasajeros, $objResponsable, $tipoAsiento, $importeTerrestre, $idaVuelta) {
            parent::__construct($codigoViaje, $destino, $capacidadPasajeros, $objResponsable);
            $this->tipoAsiento = $tipoAsiento;
            $this->importeTerrestre = $importeTerrestre;
            $this->idaVuelta = $idaVuelta;
        }

        /**
         * Método 1: calcularImporte - 
         * Retorna el importe del pasaje según el tipo de asiento y trayectoria.
         */
        public function calcularImporte() {
            $tipoAsiento = $this->getTipoAsiento();
            $importeTerrestre = $this->getImporteTerrestre();
            $trayectoViaje = $this->getIdaVuelta();
            //Si el tipo de asiento es cama:
            if ($tipoAsiento == 1) {
                $importeViaje = $importeTerrestre * 1.25;
            } else {
                $importeViaje = $importeTerrestre;
            }
            //Si el tipo de viaje es de ida y vuelta:
            if ($trayectoViaje == 3) {
                $importeViaje = $importeTerrestre * 1.5;
            } else {
                $importeViaje = $importeTerrestre;
            }
            return $importeViaje;
        }

        /**
         * Método 2: venderPasaje - 
         * Registra la venta de un viaje al pasajero que es recibido por parámetro.
         * Retorna el importe del pasaje si se pudo realizar la venta.
         * NOTA: La venta se realiza solo si hayPasajesDisponible.
         * @return float
         */
        public function venderPasaje($pasajero) {
            if ($this->hayPasajesDisponibles() == true) {
                $importeViajeFinal = $this->calcularImporte();
                $this->agregarPasajeros($pasajero);
            }
            return $importeViajeFinal;
        }

        private function tipoAsiento() {
            $tipoAsiento = $this->getTipoAsiento();
            if ($tipoAsiento == 2) {
                $asiento = "Semi-cama";
            } else {
                $asiento = "Cama";
            }
            return $asiento;
        }

        private function tipoTrayectoria() {
            $trayectoViaje = $this->getIdaVuelta();
            if ($trayectoViaje == 3) {
                $trayecto = "Ida y Vuelta";
            } elseif ($trayectoViaje == 2) {
                $trayecto = "Vuelta";
            } else {
                $trayecto = "Ida";
            }
            return $trayecto;
        }

        public function __toString() {
            $viajes = parent::__toString();
            $cadena = $viajes."\n" 
                    ."--- VIAJE TERRESTRE ---\n"
                    ." + Tipo de Asiento: ".$this->tipoAsiento()."\n"
                    ." + Importe del viaje: $".$this->calcularImporte()."\n"
                    ." + Trayectoria: ".$this->tipoTrayectoria()."\n";
            return $cadena;
        }
    }
?>