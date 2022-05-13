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
            if ($tipoAsiento == "Cama") {
                $importeViaje = $importeTerrestre * 1.25;
            }
            //Si el tipo de viaje es de ida y vuelta:
            if ($trayectoViaje == 3) {
                $importeViaje = $importeTerrestre * 1.5;
            }
            return $importeViaje;
        }

        public function __toString() {
            $viajes = parent::__toString();
            $cadena = $viajes."\n" 
                    ."--- VIAJE TERRESTRE ---\n"
                    ." + Tipo de Asiento: ".$this->getTipoAsiento()."\n"
                    ." + Importe del viaje: ".$this->getImporteTerrestre()."\n"
                    ." + Itinerario: ".$this->getIdaVuelta()."\n";
            return $cadena;
        }
    }
?>