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
        private $arrayPasajeros = [];

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
        public function getArrayPasajeros() {
            return $this->cantidadPasajeros;
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
        public function setArrayPasajeros($arrayPasajeros) {
            $this->arrayPasajeros = $arrayPasajeros;
        }
        
        //Métodos
        public function __construct($codigoViaje, $destino, $capacidadPasajeros, $arrayPasajeros) {
            $this->codigoViaje = $codigoViaje;
            $this->destino = $destino;
            $this->capacidadPasajeros = $capacidadPasajeros;
            $this->arrayPasajeros = $arrayPasajeros;
        }

        public function coleccionViajes($contador) {
            $coleccionViajes[$contador] = array("Codigo"=>$this->getCodigoViaje(),
                                        "Destino"=>$this->getDestino(),
                                        "Capacidad"=>$this->getCapacidadPasajeros(),
                                        "Cantidad"=>$this->getCantidadPasajeros());
            return $coleccionViajes;
        }
        
        /**
         * Método 1: datosViaje - 
         * Retorna un arreglo con los datos de los viajes.
         * @return array
         */
        /*public function datosViaje() {
            $arrayViajes = array("Codigo"=>$this->getCodigoViaje(),
                                "Destino"=>$this->getDestino(),
                                "Capacidad"=>$this->getCapacidadPasajeros(),
                                "Cantidad"=>$this->getCantidadPasajeros());
            return $arrayViajes;
        }*/

        /*
         * Método 2: datosPasajeros - 
         * Retorna un arreglo con los datos de los pasajeros.
         * @return array
        public function datosPasajero($contadorPasajeros, $pasajero) {
            $bandera = false;
            if ($this->validarCantPasajeros($contadorPasajeros) == false) {
                $bandera = false;
            } else {
                array_push($this->arrayPasajeros, $pasajero);
                $this->getCantidadPasajerosInt++;
                $bandera = true;
            }
            return $bandera;
        }*/

        /**
         * Método 3: validarCantPasajeros - 
         * Retorna TRUE si la cant. de pasajeros agregados no supera la capacidad máxima del viaje.
         * @return boolean
         */
        public function validarCantPasajeros($contadorPasajeros, $pasajeroArray) {
            $bandera = false;
            $capMaxima = $this->getCapacidadPasajeros();
            if (($contadorPasajeros + $this->getCantidadPasajeros()) >= $capMaxima) {
                $this->setCantidadPasajeros($this->getCantidadPasajeros());
                $bandera = false;
            } else {
                array_push($this->arrayPasajeros, $pasajeroArray);
                $this->setCantidadPasajeros($this->getCantidadPasajeros() + $contadorPasajeros);
                $bandera = true;
            }
            return $bandera;
        }

        /**
         * Método 4: validarCodigo - 
         * Retorna TRUE si el código ingresado se corresponde con alguno de los guardados en datosViaje.
         * @return boolean
         */
        public function validarCodigo($codigo, $contador) {
            /*$i = 0;
            $bandera = false;
            $viajesArreglo = $this->datosViaje();
            while($i<count($viajesArreglo) && !$bandera) {
                if ($viajesArreglo[$i]["Codigo"] == $codigo) {
                    $bandera = true;
                } elseif ($viajesArreglo[$i]["Codigo"] <> $codigo) {
                    $bandera;
                }
                $i++;
            }
            //print_r($unViaje);
            return $bandera;
            */
            /*$arrayViajes = $this->datosViaje();
            $i = 0;
            $bandera = false;
            while ($i<count($arrayViajes) && !$bandera) {
                if ($arrayViajes[$i]["Codigo"] == $codigo) {
                    $bandera = true;
                } else {
                    $bandera = false;
                }
                $i++;
            }
            return $bandera;*/
            $i = 0;
            $bandera = false;
            //$arrayViajes = $this->getArrayViajes();
            while ($i<$contador && !$bandera) {
                $arrayViajes = $this->getArrayViajes()[$i];
                $unViaje = $arrayViajes[$i];
                /*foreach ($arrayViajes as $viaje) {
                    if ($viaje == $codigo) {
                        $bandera = true;
                    } else {
                        $bandera = false;
                    }
                }*/
                if ($unViaje["Codigo"] == $codigo) {
                    $bandera = true;
                } else {
                    $bandera = false;
                }
                $i++;
            }
            return $bandera;
        }

        /**
         * Método 5: validarDocumento - 
         * Retorna TRUE si el documento ingresado se corresponde con alguno de los guardados en datosPasajero.
         * @return boolean
         */
        public function validarDocumento($documento) {
            $i = 0;
            $bandera = false;
            $pasajerosArreglo = $this->getArrayPasajeros();
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

        /**
         * Método 6: modificarDatosViaje - 
         * Dado el código de un viaje, modifica el destino, la capacidad máxima de pasajeros y la cantidad de pasajeros.
         * @return boolean
         */
        public function modificarDatosViaje($contador, $codigo, $nuevoCodigo, $nuevoDestino, $nuevaCapacidadPasajeros, $nuevaCantPasajeros) {
            $i = 0;
            $bandera = false;
            //$viajesArreglo = $this->getArrayViajes();
            while($i<$contador && !$bandera) {
                $viajesArreglo = $this->getArrayViajes()[$i];
                $unViaje = $viajesArreglo[$i];
                if ($unViaje["Codigo"] == $codigo) {
                    $unViaje["Codigo"] = $this->setCodigoViaje($nuevoCodigo);
                    $unViaje["Destino"] = $this->setDestino($nuevoDestino);
                    $unViaje["Capacidad"] = $this->setCapacidadPasajeros($nuevaCapacidadPasajeros);
                    $unViaje["Cantidad"] = $this->setCantidadPasajeros($nuevaCantPasajeros);
                    $viajesArreglo[$i] = $unViaje;
                    //array_push($viajesArreglo($i), $unViaje); //REVISAR!!!
                    $bandera = true;
                } elseif ($unViaje["Codigo"] <> $codigo) {
                    $bandera;
                }
                $i++;
            }
            //print_r($unViaje);
            return $bandera;
        }

        /**
         * Método 7: modificarDatosPasajero - 
         * Dado el documento de un pasajero, se modifica el nombre, apellido y dni.
         * @return boolean
         */
        public function modificarDatosPasajero($documento, $nuevoNombre, $nuevoApellido, $nuevoDni) {
            $i = 0;
            $bandera = false;
            $arrayPasajeros = $this->getArrayPasajeros();
            while ($i<count($arrayPasajeros) && !$bandera) {
                if ($documento == $arrayPasajeros[$i]["Documento"]) {
                    $arrayPasajeros[$i]["Nombre"] = $nuevoNombre;
                    $arrayPasajeros[$i]["Apellido"] = $nuevoApellido;
                    $arrayPasajeros[$i]["Documento"] = $nuevoDni;
                    $bandera = true;
                } else {
                    $bandera = false;
                }
                $i++;
            }
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