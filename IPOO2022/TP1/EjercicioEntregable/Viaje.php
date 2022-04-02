<?php
    /*
    IMPORTANTE: Deben enviar el link a la resolución en su repositorio en GitHub del ejercicio.
    1. La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes.
        a. De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
        b. Realice la implementación de la clase Viaje
        c. Implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros).
        d. Utilice un array que almacene la información correspondiente a los pasajeros.
            NOTA: Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
        e. Implementar un script testViaje.php que cree una instancia de la clase Viaje:
            - Presente un menú que permita cargar la información del viaje, modificar y ver sus datos.
    */

    class Viaje {
        //Atributos del viaje
        private $codigoViaje;
        private $destino;
        private $capacidadPasajeros;
        private $cantidadPasajeros;
        //Atributos del pasajero
        private $nombrePasajero;
        private $apellidoPasajero;
        private $documentoPasajero;

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
        public function getCantidadPasajeros() {
            return $this->cantidadPasajeros;
        }
        public function getNombrePasajero() {
            return $this->nombrePasajero;
        }
        public function getApellidoPasajero() {
            return $this->apellidoPasajero;
        }
        public function getDocumentoPasajero() {
            return $this->documentoPasajero;
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
        public function setCantidadPasajeros($cantidadPasajeros) {
            $this->cantidadPasajeros = $cantidadPasajeros;
        }
        public function setNombrePasajero($nombrePasajero) {
            $this->nombrePasajero = $nombrePasajero;
        }
        public function setApellidoPasajero($apellidoPasajero) {
            $this->apellidoPasajero = $apellidoPasajero;
        }
        public function setDocumentoPasajero($documentoPasajero) {
            $this->documentoPasajero = $documentoPasajero;
        }
        
        //Métodos
        public function __construct($codigoViaje, $destino, $capacidadPasajeros, $cantidadPasajeros, $nombrePasajero, $apellidoPasajero, $documentoPasajero) {
            $this->codigoViaje = $codigoViaje;
            $this->destino = $destino;
            $this->capacidadPasajeros = $capacidadPasajeros;
            $this->cantidadPasajeros = $cantidadPasajeros;
            $this->nombrePasajero = $nombrePasajero;
            $this->apellidoPasajero = $apellidoPasajero;
            $this->documentoPasajero = $documentoPasajero;
        }

        /**
         * Método 1: datosViaje - 
         * Retorna un arreglo con los datos de los viajes.
         * @return array
         */
        public function datosViaje() {
            $contador = 0;
            $arrayViajes[$contador] = array("Codigo"=>$this->getCodigoViaje(),
                                    "Destino"=>$this->getDestino(),
                                    "Capacidad"=>$this->getCapacidadPasajeros(),
                                    "Cantidad"=>$this->getCantidadPasajeros());
            $contador++;
            return $arrayViajes;
        }

        /**
         * Método 2: datosPasajeros - 
         * Retorna un arreglo con los datos de los pasajeros.
         * @return array
         */
        public function datosPasajero() {
            $contador = 0;
            $arrayPasajeros[$contador] = array("Nombre"=>$this->getNombrePasajero(),
                                        "Apellido"=>$this->getApellidoPasajero(),
                                        "Documento"=>$this->getDocumentoPasajero());
            $contador++;
            return $arrayPasajeros;
        }

        public function validarCodigo($codigo) {
            $i = 0;
            $bandera = false;
            $viajesArreglo = $this->datosViaje();
            while($i<count($viajesArreglo) && !$bandera) {
                $unViaje = $viajesArreglo[$i];
                if ($unViaje["Codigo"] == $codigo) {
                    $bandera = true;
                } elseif ($unViaje["Codigo"] <> $codigo) {
                    $bandera;
                }
                $i++;
            }
            //print_r($unViaje);
            return $bandera;
        }

        public function validarDocumento($documento) {
            $i = 0;
            $bandera = false;
            $pasajerosArreglo = $this->datosPasajero();
            while($i<count($pasajerosArreglo) && !$bandera) {
                $unPasajero = $pasajerosArreglo[$i];
                if ($unPasajero["Documento"] == $documento) {
                    $bandera = true;
                } elseif ($unPasajero["Documento"] <> $documento) {
                    $bandera;
                }
                $i++;
            }
            //print_r($unPasajero);
            return $bandera;
        }

        //Dado el código de un viaje, modifica el destino, la capacidad máxima de pasajeros y la cantidad de pasajeros.
        public function modificarDatosViaje($codigo, $nuevoCodigo, $nuevoDestino, $nuevaCapacidadPasajeros, $nuevaCantPasajeros) {
            $i = 0;
            $bandera = false;
            $viajesArreglo = $this->datosViaje();
            while($i<count($viajesArreglo) && !$bandera) {
                $unViaje = $viajesArreglo[$i];
                if ($unViaje["Codigo"] == $codigo) {
                    $unViaje["Codigo"] = $this->setCodigoViaje($nuevoCodigo);
                    $unViaje["Destino"] = $this->setDestino($nuevoDestino);
                    $unViaje["Capacidad"] = $this->setCapacidadPasajeros($nuevaCapacidadPasajeros);
                    $unViaje["Cantidad"] = $this->setCantidadPasajeros($nuevaCantPasajeros);
                    //$viajesArreglo[$i] = $unViaje;
                    array_push($viajesArreglo($i), $unViaje); //REVISAR!!!
                    $bandera = true;
                } elseif ($unViaje["Codigo"] <> $codigo) {
                    $bandera;
                }
                $i++;
            }
            //print_r($unViaje);
            return $bandera;
        }

        //Dado el documento de un pasajero, se modifica el nombre, apellido y dni.
        public function modificarDatosPasajero($documento, $nuevoNombre, $nuevoApellido, $nuevoDni) {
            $i = 0;
            $bandera = false;
            $pasajerosArreglo = $this->datosPasajero();
            while($i<count($pasajerosArreglo) && !$bandera) {
                $unPasajero = $pasajerosArreglo[$i];
                if ($unPasajero["Documento"] == $documento) {
                    $unPasajero["Nombre"] = $this->setNombrePasajero($nuevoNombre);
                    $unPasajero["Apellido"] = $this->setApellidoPasajero($nuevoApellido);
                    $unPasajero["Documento"] = $this->setDocumentoPasajero($nuevoDni);
                    //$pasajerosArreglo[$i] = $unPasajero;
                    array_push($pasajerosArreglo[$i], $unPasajero);
                    $bandera = true;
                } elseif ($unPasajero["Documento"] <> $documento) {
                    $bandera;
                }
                $i++;
            }
            //print_r($unPasajero);
            return $bandera;
        }

        public function __toString() {
            $cadena = "\n| Codigo de viaje: ".$this->getCodigoViaje()."\n"
                        ."| Destino: ".$this->getDestino()."\n"
                        ."| Capacidad de pasajeros: ".$this->getCapacidadPasajeros()."\n"
                        ."| Cantidad de pasajeros: " .$this->getCantidadPasajeros()."\n"; 
            return $cadena;
        }
    }
?>