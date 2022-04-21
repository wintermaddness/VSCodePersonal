<?php
    /**
     * Nota: Recuerden que deben enviar el link a la resolución en su repositorio en GitHub.
     * 1) Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos:
     *  a. ATRIBUTOS: nombre, apellido, numero de documento y teléfono.
     *  b. El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero.
     * 2) También se desea guardar la información de la persona responsable de realizar el viaje:
     *  a. Cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido.
     *  b. La clase Viaje debe hacer referencia al responsable de realizar el viaje. 
     * 3) Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero.
     * 4) Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos.
     *  a. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje.
     *  b. De la misma forma cargue la información del responsable del viaje.
     */
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

    /** !!!!!!!!
     * Método 1: datosViaje - 
     * Retorna un arreglo con los datos de los viajes.
     * @return array
     */
    public function datosViaje() {
        $arrayViajes = [];
        //viaje($codViaje, $destino, $capacidadMaxima, $arrayPasajeros, $objResponsable)
        $unViaje = array("codigo"=>$this->getCodigoViaje(),
                    "destino"=>$this->getDestino(),
                    "capacidadMaxima"=>$this->getCapacidadPasajeros(),
                    "arrayPasajeros"=>$this->getObjArrayPasajeros(),
                    "objResponsable"=>$this->getObjResponsable());
        array_push($arrayViajes, $unViaje);
    }

    /**
     * Método 1 - validarDocumento - 
     * Valida el número de documento ingresado por parámetro.
     * Retorna TRUE si se encuentra dentro del arreglo de pasajeros.
     * @return boolean
     */
    public function validarDocumento($documentoPasajero) {
        $arrayPasajeros = $this->getObjArrayPasajeros();
        $indMaximo = count($arrayPasajeros);
        //Valido que el documento ingresado esté en el viaje:
        $dniEncontrado = true;
        $i = 0;
        $indice = 0;
        while ($dniEncontrado && $i<$indMaximo) {
            $unPasajero = $arrayPasajeros[$i];
            $dniPasajero = $unPasajero->getDni();
            if ($dniPasajero == $documentoPasajero) {
                $dniEncontrado = false;
                $indice = $i;
            }
            $i++;
        }
        if ($dniEncontrado == false) {
            $validacion = true;
        } else {
            $validacion = false;
        }
        return $validacion;
    }

    /**
     * Método 2: agregarPasajeros - 
     * Agrega pasajeros luego de verificar que no están cargados más de una vez en el viaje.
     * @return array
     */
    public function agregarPasajeros($nuevoPasajero) {
        $arrayPasajeros = $this->getObjArrayPasajeros();
        $indMaximo = count($arrayPasajeros);
        //Valido que el pasajero ingresado no esté en el viaje inicialmente:
        $dniEncontrado = true;
        $i = 0;
        $dniComparacion = $nuevoPasajero->getDni();
        while ($dniEncontrado && $i<$indMaximo) {
            $unPasajero = $arrayPasajeros[$i];
            $dniPasajero = $unPasajero->getDni();
            if ($dniPasajero == $dniComparacion) {
                $dniEncontrado = false;
            }
            $i++;
        }
        //Dependiendo de la comparación, se agregan o no pasajeros:
        if ($dniEncontrado == true) {
            $validacion = true;
            //arrayPush
            $cantPasajeros = count($arrayPasajeros);
            if ($cantPasajeros == 0) {
                $arrayPasajeros[0] = $nuevoPasajero;
            } else {
                $arrayPasajeros[$cantPasajeros] = $nuevoPasajero;
            }
            $this->setObjArrayPasajeros($arrayPasajeros);
        } else {
            $validacion = false;
        }

        /*
        for ($i=0; $i<=$indMaximo; $i++) {
            array_push($arrayPasajeros, $nuevoPasajero[$i]);
        }        
        $this->setObjArrayPasajeros($arrayPasajeros);
        */

        return $validacion;
    }

    /**
     * Método 3: eliminarPasajeros - 
     * Elimina a un pasajero determinado.
     */
    public function eliminarPasajeros($indicePasajero) {
        $indice = $indicePasajero - 1;
        $arrayPasajeros = $this->getObjArrayPasajeros();
        array_splice($arrayPasajeros, $indice, 1);
        $this->setObjArrayPasajeros($arrayPasajeros);
    }

    /**
     * Método 4: modificarPasajeros - 
     * Modifica los datos de un pasajero.
     * NOTA: Se puede usar "*" para dejar algún dato igual/sin modificar.
     */
    public function modificarPasajeros($documentoPasajero, $nombre, $apellido, $telefono) {
        $arrayPasajeros = $this->getObjArrayPasajeros();
        $indMaximo = count($arrayPasajeros);
        //Se obtiene la posición del pasajero a modificar:
        $dniEncontrado = true;
        $i = 0;
        $indice = 0;
        while ($dniEncontrado && $i<$indMaximo) {
            $unPasajero = $arrayPasajeros[$i];
            $dniPasajero = $unPasajero->getDni();
            if ($dniPasajero == $documentoPasajero) {
                $dniEncontrado = false;
                $indice = $i;
            }
            $i++;
        }
        //Se modifican los datos del pasajero:
        if ($nombre != "*") {
            $arrayPasajeros[$indice]["nombre"] = $nombre;
        }
        if ($apellido != "*") {
            $arrayPasajeros[$indice]["apellido"] = $apellido;
        }
        if ($telefono != "*") {
            $arrayPasajeros[$indice]["telefono"] = $telefono;
        }
        $this->setObjArrayPasajeros($arrayPasajeros);
    }

    /**
     * Método 5: mostrarPasajeros - 
     * Muestra los datos de un pasajero.
     * @return string
     */
    public function mostrarPasajeros($indicePasajero) {
        $arrayPasajeros = $this->getObjArrayPasajeros();
        if ($indicePasajero > (count($arrayPasajeros) - 1)) {
            $cadena = "\n>>> ERROR. El número ingresado no tiene un pasajero asignado.\n";
        } else {
            /*
            for ($i=0; $i<(count($arrayPasajeros) - 1); $i++) {
            $cadena = "\n| Pasajero N°: ".($indicePasajero).
                        "\n| Nombre: ".$arrayPasajeros[$indicePasajero]["nombre"].
                        "\n| Apellido: ".$arrayPasajeros[$indicePasajero]["apellido"].
                        "\n| Documento: ".$arrayPasajeros[$indicePasajero]["dni"].
                        "\n| Teléfono: ".$arrayPasajeros[$indicePasajero]["telefono"]."\n";
            }*/
            foreach ($arrayPasajeros as $unPasajero) {
                $cadena = $unPasajero->__toString();
            }
        }
        return $cadena;
    }

    /**
     * Método 6: modificarDatosViaje - 
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

    public function __toString() {
        $viajes = $this->getObjArrayPasajeros();
        $objResponsable = $this->getObjResponsable();
        $cadena = "\n--- DATOS DEL VIAJE ---\n"
                    ."| Codigo de viaje: ".$this->getCodigoViaje()."\n"
                    ."| Destino: ".$this->getDestino()."\n"
                    ."| Capacidad de pasajeros: ".$this->getCapacidadPasajeros()."\n"
                    ."| Cantidad de pasajeros: " .count($viajes)."\n"
                    ."--- RESPONSABLE DEL VIAJE ---\n"
                    .$objResponsable->__toString()."\n"; 
        return $cadena;
    }
}
?>