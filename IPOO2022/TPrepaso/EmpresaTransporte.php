<?php
    /**
     * La empresa de transporte desea gestionar la información correspondiente a los Viajes que pueden ser: Terrestres o Aéreos.
     * 1) Guardar su importe e indicar si el viaje es de ida y vuelta.
     * 2) De los viajes aéreos se conoce el:
     * $viajesAereos: número del vuelo, la categoría del asiento (primera clase o no), nombre de la aerolínea, y la cantidad de escalas del vuelo (en caso de tenerlas).
     * 3) De los viajes terrestres se conoce la:
     * $viajesTerrestres: comodidad del asiento, si es semicama o cama.
     * 4) La empresa ahora necesita implementar la venta de un pasaje, para ello debe realizar:
     * a. función venderPasaje(pasajero) que registra la venta de un viaje al pasajero que es recibido por parámetro.
     * NOTAS:
     *      - La venta se realiza solo si hayPasajesDisponible.
     *      - Si el viaje es terrestre y el asiento es cama, se incrementa el importe un 25%.
     *      - Si el viaje es aéreo y el asiento es primera clase sin escalas, se incrementa un 40%.
     *      - Si el viaje además de ser un asiento de primera clase, el vuelo tiene escalas se incrementa el importe del viaje un 60%.
     *      - Tanto para viajes terrestres o aéreos, si el viaje es ida y vuelta, se incrementa el importe del viaje un 50%.
     *      + El método retorna el importe del pasaje si se pudo realizar la venta.
     * 5) Implemente la función hayPasajesDisponible() que:
     * a. retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario.
     */
    class EmpresaTransporte {
        private $nombreEmpresa;
        private $arrayViajes;

        //Métodos de acceso
        public function getNombreEmpresa() {
            return $this->nombreEmpresa;
        }
        public function getArrayViajes() {
            return $this->arrayViajes;
        }

        public function setCodigoViaje($nombreEmpresa) {
            $this->nombreEmpresa = $nombreEmpresa;
        }
        public function setArrayViajes($arrayViajes) {
            $this->arrayViajes = $arrayViajes;
        }

        //Métodos
        public function __construct($nombreEmpresa, $arrayViajes) {
            $this->nombreEmpresa = $nombreEmpresa;
            $this->arrayViajes = $arrayViajes;
        }

        /**
         * Método 1: venderPasaje - 
         * Registra la venta de un viaje al pasajero que es recibido por parámetro.
         * Retorna el importe del pasaje si se pudo realizar la venta.
         * NOTA: La venta se realiza solo si hayPasajesDisponible.
         * @return float
         */
        public function venderPasaje($pasajero) {
            $arrayViajes = $this->getArrayViajes();
            $cantViajes = count($arrayViajes);
            $importeViajeFinal = 0;
            $viajeConLugar = false;
            $posicionViaje = null;
            $i = 0;
            //Busco un viaje que tenga pasajes disponibles:
            while (!$viajeConLugar && $i<$cantViajes) {
                $unViaje = $arrayViajes[$i];
                $pasajesDisponibles = $unViaje->hayPasajesDisponibles();
                if ($pasajesDisponibles == true) {
                    $viajeConLugar = true;
                    $posicionViaje = $i;
                }
                $i++;
            }
            //Si se encuentra un viaje con pasajes disponibles:
            if ($viajeConLugar == true) {
                $agregarPasajero = $unViaje->agregarPasajeros($pasajero);
                if ($agregarPasajero == true) {
                    $importeViajeFinal = $unViaje->calcularImporte();
                    $arrayViajes[$posicionViaje] = $unViaje;
                    $this->setArrayViajes($arrayViajes);
                }
            }
            return $importeViajeFinal;
        }

        /**
         * Método 2: agregarViaje - 
         * Dado un viaje ingresado por parámetro, lo agrega al arreglo de viajes de la empresa.
         */
        public function agregarViaje($nuevoViaje) {
            $arrayViajes = $this->getArrayViajes();
            array_push($arrayViajes, $nuevoViaje);
            $this->setArrayViajes($arrayViajes);
        }

        /**
         * Método 3: mostrarViajes - 
         * Retorna una cadena de strings con todos los viajes de la empresa.
         * @return string
         */
        public function mostrarViajes() {
            $arrayViajes = $this->getArrayViajes();
            $cadenaViajes = "";
            if (count($arrayViajes) == 0) {
                $cadenaViajes = "   >>> Aún no se han agregado viajes.";
            } else {
                foreach ($arrayViajes as $unViaje) {
                    $viaje = $unViaje->__toString();
                    $cadenaViajes .= $viaje; 
                }
            }
            return $cadenaViajes;
        } 

        public function __toString() {
            $cadena = "\nE M P R E S A  de  T R A N S P O R T E S\n"
                    ."| Nombre de la empresa: ".$this->getNombreEmpresa()."\n"
                    ."| Cantidad de viajes: ".count($this->getArrayViajes())."\n"
                    ."| Viajes:\n".$this->mostrarViajes()."\n";
            return $cadena;
        }
    }
?>