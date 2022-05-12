<?php
    class Viaje {
        private $codigoViaje;
        private $destino;
        private $capacidadPasajeros;
        private $objArrayPasajeros;
        private $objResponsable;

        //Métodos de acceso
        public function getCodigoViaje() {
            return $this->codigoViaje;
        }
        public function getDestino() {
            return $this->destino;
        }
        public function getCapacidadPasajeros() {
            return $this->capacidadPasajeros;
        }
        public function getObjArrayPasajeros() {
            return $this->objArrayPasajeros;
        }
        public function getObjResponsable() {
            return $this->objResponsable;
        }

        public function setCodigoViaje($codigoViaje) {
            $this->codigoViaje = $codigoViaje;
        }
        public function setDestino($destino) {
            $this->destino = $destino;
        }
        public function setCapacidadPasajeros($capacidadPasajeros) {
            $this->capacidadPasajeros = $capacidadPasajeros;
        }
        public function setObjArrayPasajeros($objArrayPasajeros) {
            $this->objArrayPasajeros = $objArrayPasajeros;
        }
        public function setObjResponsable($objResponsable) {
            $this->objResponsable = $objResponsable;
        }
        
        //Métodos
        public function __construct($codigoViaje, $destino, $capacidadPasajeros, $objResponsable) {
            $this->codigoViaje = $codigoViaje;
            $this->destino = $destino;
            $this->capacidadPasajeros = $capacidadPasajeros;
            $this->objArrayPasajeros = [];
            $this->objResponsable = $objResponsable;
        }

        /**
         * Método 1: validarDocumento - 
         * Valida el número de documento ingresado por parámetro.
         * Retorna TRUE si se encuentra dentro del arreglo de pasajeros.
         * @return boolean
         */
        public function validarDocumento($documentoPasajero) {
            $arrayPasajeros = $this->getObjArrayPasajeros();
            $indMaximo = count($arrayPasajeros);
            //Valido que el documento ingresado esté en el viaje:
            $dniRepetido = false;
            $i = 0;
            if ($indMaximo > 0) {
                do {
                    $dniPasajero = $arrayPasajeros[$i]->getDni();
                    if ($dniPasajero == $documentoPasajero) {
                        $dniRepetido = true;
                    }
                    $i++;
                } while($dniRepetido == false && $i<$indMaximo);
            }
            if ($dniRepetido == true) {
                $validacion = true;
            } else {
                $validacion = false;
            }
            return $validacion;
        }

        /**
         * Método 2: encontrarDocumento - 
         * Retorna la posición en la que se encuentra un documento validado.
         * @return int
         */
        public function encontrarDocumento($documentoPasajero) {
            $arrayPasajeros = $this->getObjArrayPasajeros();
            $indMaximo = count($arrayPasajeros);
            $dniEncontrado = false;
            $i = 0;
            $posicion = 0;
            while ($dniEncontrado && $i<$indMaximo) {
                $unPasajero = $arrayPasajeros[$i];
                $dniPasajero = $unPasajero->getDni();
                if ($dniPasajero == $documentoPasajero) {
                    $dniEncontrado = true;
                    $posicion = $i;
                } else {
                    $posicion = null;
                    $i++;
                }
            }
            return $posicion;
        }

        /**
         * Método 3: agregarPasajeros - 
         * Agrega pasajeros luego de verificar que no están cargados más de una vez en el viaje.
         * @return boolean
         */
        public function agregarPasajeros($nuevoPasajero) {
            $arrayPasajeros = $this->getObjArrayPasajeros();
            //Valido que el pasajero ingresado no esté en el viaje inicialmente:
            $dniComparacion = $nuevoPasajero->getDni();
            $validarDocumento = $this->validarDocumento($dniComparacion);
            //Dependiendo de la comparación, se agregan o no pasajeros:
            if ($validarDocumento == false) {
                $cantPasajeros = count($arrayPasajeros);
                if ($cantPasajeros == 0) {
                    $arrayPasajeros[0] = $nuevoPasajero;
                } else {
                    $arrayPasajeros[$cantPasajeros] = $nuevoPasajero;
                }
                $this->setObjArrayPasajeros($arrayPasajeros);
                $validacion = true;
            } else {
                $validacion = false;
            }
            return $validacion;
        }

        /**
         * Método 4: eliminarPasajeros - 
         * Elimina a un determinado pasajero.
         * @return boolean
         */
        public function eliminarPasajeros($documentoPasajero) {
            $arrayPasajeros = $this->getObjArrayPasajeros();
            $indMaximo = count($arrayPasajeros);
            $modificacion = false;
            $i = 0;
            $arrayModificado = [];
            while (($i<$indMaximo) && ($arrayPasajeros[$i]->getDni() != $documentoPasajero)) {
                $i++;
            }
            if ($arrayPasajeros[$i]->getDni() == $documentoPasajero) {
                $j = 0;
                while ($j<($indMaximo-1) && ($j != $i)) {
                    $arrayModificado[$j] = $arrayPasajeros[$j];
                    $j++;
                }
                if ($j == $i) {
                    for ($k=$j; $k<($indMaximo-1); $k++) {
                        $arrayModificado[$k] = $arrayPasajeros[$k+1];
                    }
                }
                $this->setObjArrayPasajeros($arrayModificado);
                $modificacion = true;
            } else {
                $modificacion = false;
            }
            return $modificacion;
        }

        /**
         * Método 5: modificarPasajeros - 
         * Modifica los datos de un pasajero determinado.
         */
        public function modificarPasajeros($documentoPasajero, $nombre, $apellido, $telefono) {
            $arrayPasajeros = $this->getObjArrayPasajeros();
            $cantPasajeros = count($arrayPasajeros);
            $i = 0;
            $encontrado = false;
            while ($i<$cantPasajeros && !$encontrado) {
                $unPasajero = $arrayPasajeros[$i];
                if ($unPasajero->getDni() == $documentoPasajero) {
                    $unPasajero->setNombre($nombre);
                    $unPasajero->setApellido($apellido);
                    $unPasajero->setTelefono($telefono);
                    $arrayPasajeros[$i] = $unPasajero;
                    $encontrado = true;
                }
                $i++;
            }
            $this->setObjArrayPasajeros($arrayPasajeros);
        }

        /**
         * Método 6: mostrarPasajeros - 
         * Muestra los datos de un pasajero determinado.
         * @return string
         */
        public function mostrarPasajeros($documentoPasajero) {
            $arrayPasajeros = $this->getObjArrayPasajeros();
            $cantPasajeros = count($arrayPasajeros);
            $encontrado = false;
            $cadena = "";
            $i = 0;
            while ($i<$cantPasajeros && !$encontrado) {
                $unPasajero = $arrayPasajeros[$i];
                if ($unPasajero->getDni() == $documentoPasajero) {
                    $cadena = $unPasajero->__toString();
                    $encontrado = true;
                }
                $i++;
            }
            return $cadena;
        }

        /**
         * Método 7: modificarDatosViaje - 
         * Modifica los datos del viaje.
         * @return boolean
         */
        public function modificarDatosViaje($codViaje, $destino, $capacidadMaxima) {
            $bandera = true;
            if ($codViaje != "*") {
                $this->setCodigoViaje($codViaje);
            }
            if ($destino != "*") {
                $this->setDestino($destino);
            }
            if ($capacidadMaxima != "*") {
                $this->setCapacidadPasajeros($capacidadMaxima);
            }
            return $bandera;
        }

        /**
         * Método 8: modificarDatosResponsable - 
         * Modifica los datos del responsable del viaje.
         * @return boolean
         */
        public function modificarDatosResponsable($nombre, $apellido, $empleado, $licencia) {
            $objResponsable = $this->getObjResponsable();
            $bandera = true;
            if ($nombre != "*") {
                $objResponsable->setNombre($nombre);
            }
            if ($apellido != "*") {
                $objResponsable->setApellido($apellido);
            }
            if ($empleado != "*") {
                $objResponsable->setNroEmpleado($empleado);
            }
            if ($licencia != "*") {
                $objResponsable->setNroLicencia($licencia);
            }
            return $bandera;
        }

        /**
         * Método 9: hayPasajesDisponible() - 
         * Retorna TRUE si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y FALSE caso contrario.
         * @return boolean
         */
        public function hayPasajesDisponibles() {
            $arrayPasajeros = $this->getObjArrayPasajeros();
            $cantMaxPasajeros = $this->getCapacidadPasajeros();
            $cantPasajeros = count($arrayPasajeros);
            $pasajesDisponibles = false;
            if ($cantPasajeros < $cantMaxPasajeros) {
                $pasajesDisponibles = true;
            }
            return $pasajesDisponibles;
        }

        public function __toString() {
            $pasajeros = $this->getObjArrayPasajeros();
            $objResponsable = $this->getObjResponsable();
            $cadena = "\n--- DATOS DEL VIAJE ---\n"
                        ."| Codigo de viaje: ".$this->getCodigoViaje()."\n"
                        ."| Destino: ".$this->getDestino()."\n"
                        ."| Capacidad de pasajeros: ".$this->getCapacidadPasajeros()."\n"
                        ."| Cantidad de pasajeros: " .count($pasajeros)."\n"
                        ."--- RESPONSABLE DEL VIAJE ---\n"
                        .$objResponsable->__toString()."\n"; 
            return $cadena;
        }
    }
?>