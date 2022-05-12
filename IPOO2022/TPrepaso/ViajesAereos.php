<?php
    //número del vuelo, la categoría del asiento (primera clase o no), nombre de la aerolínea, y la cantidad de escalas del vuelo (en caso de tenerlas).
    class ViajesAereos extends Viaje {
        private $nroVuelo;
        private $categoriaAsiento;
        private $nombreAerolinea;
        private $cantEscalas;
        private $importeAereo;
        private $idaVuelta;

        //Métodos de acceso        
        public function getNroVuelo() {
            return $this->nroVuelo;
        }
        public function getCategoriaAsiento() {
            return $this->categoriaAsiento;
        }
        public function getNombreAerolinea() {
            return $this->nombreAerolinea;
        }
        public function getCantEscalas() {
            return $this->cantEscalas;
        }
        public function getImporteAereo() {
            return $this->importeAereo;
        }
        public function getIdaVuelta() {
            return $this->idaVuelta;
        }

        public function setNroVuelo($nroVuelo) {
            $this->nroVuelo = $nroVuelo;
        }
        public function setCategoriaAsiento($categoriaAsiento) {
            $this->categoriaAsiento = $categoriaAsiento;
        }
        public function setNombreAerolinea($nombreAerolinea) {
            $this->nombreAerolinea = $nombreAerolinea;
        }
        public function setCantEscalas($cantEscalas) {
            $this->cantEscalas = $cantEscalas;
        }
        public function setImporteAereo($importeAereo) {
            $this->importeAereo = $importeAereo;
        }
        public function setIdaVuelta($idaVuelta) {
            $this->idaVuelta = $idaVuelta;
        }

        //Métodos
        public function __construct($codigoViaje, $destino, $capacidadPasajeros, $objResponsable, $nroVuelo, $categoriaAsiento, $nombreAerolinea, $cantEscalas, $importeAereo, $idaVuelta) {
            parent::__construct($codigoViaje, $destino, $capacidadPasajeros, $objResponsable);
            $this->nroVuelo = $nroVuelo;
            $this->categoriaAsiento = $categoriaAsiento;
            $this->nombreAerolinea = $nombreAerolinea;
            $this->cantEscalas = $cantEscalas;
            $this->importeAereo = $importeAereo;
            $this->idaVuelta = $idaVuelta;
        }

        /**
         * Método 1: calcularImporte - 
         * Retorna el importe del pasaje según el tipo de asiento y trayectoria.
         */
        public function calcularImporte() {
            $categoriaAsiento = $this->getCategoriaAsiento();
            $cantEscalas = $this->getCantEscalas();
            $importeAereo = $this->getImporteAereo();
            $trayectoViaje = $this->getIdaVuelta();
            //Si el tipo de asiento es de primera clase y el viaje no tiene escalas:
            if ($categoriaAsiento == "Primera clase" && $cantEscalas == 0) {
                $importeViaje = $importeAereo * 1.40;
            } elseif ($categoriaAsiento == "Primera clase" && $cantEscalas > 0) {
                $importeViaje = $importeAereo * 1.6;
            }
            //Si el tipo de viaje es de ida y vuelta:
            if ($trayectoViaje == "Ida y Vuelta") {
                $importeViaje = $importeAereo * 1.5;
            }
            return $importeViaje;
        }

        public function __toString() {
            $viajes = parent::__toString();
            $cadena = $viajes."\n" 
                    ."--- VIAJE AÉREO ---\n" 
                    ." + N° de Vuelo: ".$this->getNroVuelo()."\n"
                    ." + Categoría de Asiento: ".$this->getCategoriaAsiento()."\n"
                    ." + Nombre Aerolínea: ".$this->getNombreAerolinea()."\n"
                    ." + Cantidad de Escalas: ".$this->getCantEscalas()."\n"
                    ." + Importe del viaje: ".$this->getImporteAereo()."\n"
                    ." + Itinerario: ".$this->getIdaVuelta()."\n"; 
            return $cadena;
        }
    }
?>