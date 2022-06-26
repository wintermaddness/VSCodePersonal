<?php
    //nombre, apellido, numero de documento y teléfono + idViaje
    class Pasajero {
        private $dni;
        private $nombre;
        private $apellido;
        private $telefono;
        private $idViaje;
        private $mensajeoperacion;

        //Métodos de acceso:
        public function getNombre() {
            return $this->nombre;
        }
        public function getApellido() {
            return $this->apellido;
        }
        public function getDni() {
            return $this->dni;
        }
        public function getTelefono() {
            return $this->telefono;
        }
        public function getIdViaje() {
            return $this->idViaje;
        }
        public function getmensajeoperacion() {
            return $this->mensajeoperacion;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setApellido($apellido) {
            $this->apellido = $apellido;
        }
        public function setDni($dni) {
            $this->dni = $dni;
        }
        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }
        public function setIdViaje($idViaje) {
            $this->idViaje = $idViaje;
        }
        public function setmensajeoperacion($mensajeoperacion){
            $this->mensajeoperacion = $mensajeoperacion;
        }

        //Métodos varios:
        public function __construct() {
            $this->nombre = "";
            $this->apellido = "";
            $this->dni = "";
            $this->telefono = "";
            $this->idViaje = null;
        }

        public function cargar($dni, $nombre, $apellido, $telefono, $idViaje) {		
            $this->setDni($dni);
            $this->setNombre($nombre);
            $this->setApellido($apellido);
            $this->setTelefono($telefono);
            $this->setIdViaje($idViaje);
        }

        public function __toString() {
            $cadenaViaje = "";
            $viaje = new Viaje();
            //Se obtiene el ID del viaje:
            if ($viaje->Buscar($this->getIdViaje())) {
                $cadenaViaje .= $viaje->getCodigoViaje();
            }
            $cadena = "-- -- -- DATOS DEL PASAJERO -- -- --\n".
                    "+ Nombre: ".$this->getNombre()."\n".
                    "+ Apellido: ".$this->getApellido()."\n".
                    "+ DNI: ".$this->getDni()."\n".
                    "+ Teléfono: ".$this->getTelefono()."\n".
                    //"+ ID Viaje: ".$this->getIdViaje()."\n";
                    "+ ID Viaje: ".$cadenaViaje."\n";
            return $cadena;
        }

        /**
         * Método 1: buscar - 
         * Busca y recupera los datos del pasajero (por el dni).
         * @param int $nroDocumento
         * @return boolean $resp
         */
        public function buscar($nroDocumento) {
            $baseDatos = new BaseDatos();
            $consulta = "SELECT * FROM pasajero WHERE rdocumento = ".$nroDocumento;
            $resp = false;

            if ($baseDatos->iniciar()) {
                if ($baseDatos->ejecutar($consulta)) {
                    if ($row2 = $baseDatos->registro()) {
                        $this->setDni($nroDocumento);
                        $this->setNombre($row2['pnombre']);
                        $this->setApellido($row2['papellido']);
                        $this->setTelefono($row2['ptelefono']);
                        $this->setIdViaje($row2['idviaje']);
                        $resp = true;
                    }
                } else {
                    $this->setMensajeOperacion($baseDatos->getError());
                }
            } else {
                $this->setMensajeOperacion($baseDatos->getError());
            }
            return $resp;
        }

        /**
         * Método 2: listar - 
         * Lista todos los pasajeros del viaje que cumplan con la condicion recibida por parámetro.
         * Retorna un arreglo con todos los datos de los pasajeros del viaje.
         * @param string $condicion
         * @return array $arrayPasajeros
         */
        public function listar($condicion = ""){
            $arrayPasajeros = null;
            $base = new BaseDatos();
            $consultaPasajero = "Select * from pasajero ";
            //Si la condición recibida por parámetro no está vacia, se arma un nuevo string para la consulta en la BD:
            if ($condicion != "") {
                $consultaPasajero = $consultaPasajero.' where '.$condicion;
            }

            $consultaPasajero .= " order by papellido ";
            //echo $consultaResponsable;
            if ($base->Iniciar()) {
                if ($base->Ejecutar($consultaPasajero)) {				
                    $arrayPasajeros = array();
                    while ($row2 = $base->Registro()) {
                        $dni = $row2['rdocumento'];
                        $nombre = $row2['pnombre'];
                        $apellido = $row2['papellido'];
                        $telefono = $row2['ptelefono'];
                        $idViaje = $row2['idviaje'];
                        $nuevoPasajero = new Pasajero();
                        $nuevoPasajero->cargar($dni, $nombre, $apellido, $telefono, $idViaje);
                        array_push($arrayPasajeros, $nuevoPasajero);
                    }
                 } else {
                    $this->setmensajeoperacion($base->getError());
                }
            } else {
                 $this->setmensajeoperacion($base->getError());
            }	
            return $arrayPasajeros;
        }

        /**
         * Método 3: insertar - 
         * Inserta una nueva tupla en la tabla "pasajero".
         * @return boolean $resp
         */
        public function insertar() {
            $base = new BaseDatos();
            $resp = false;
            $consultaInsertar = "INSERT INTO pasajero(rdocumento, pnombre, papellido, ptelefono, idviaje) 
                                VALUES ('".$this->getDni()."',
                                        '".$this->getNombre()."',
                                        '".$this->getApellido()."',
                                        '".$this->getTelefono()."',
                                        '".$this->getIdViaje()."')";
            if ($base->Iniciar()) {
                if ($base->Ejecutar($consultaInsertar)) {
                    $resp = true;
                } else {
                    $this->setmensajeoperacion($base->getError());	
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
            return $resp;
        }

        /**
         * Método 4: modificar - 
         * Modifica los valores de una tupla en la tabla "pasajero".
         * @return boolean $resp
         */
        public function modificar() {
            $resp = false; 
            $baseDatos = new BaseDatos();
            $consultaModifica = "UPDATE pasajero SET pnombre = '".$this->getNombre()."',
                                                papellido = '".$this->getApellido()."',
                                                ptelefono = '".$this->getTelefono()."',
                                                idviaje = '".$this->getIdViaje()."'
                                                WHERE rdocumento = ". $this->getDni();
            if ($baseDatos->Iniciar()) {
                if ($baseDatos->Ejecutar($consultaModifica)) {
                    $resp = true;
                } else {
                    $this->setmensajeoperacion($baseDatos->getError());
                }
            } else {
                $this->setmensajeoperacion($baseDatos->getError());
            }
            return $resp;
        }
        
        /**
         * Método 5: eliminar - 
         * Elimina una tupla en la tabla "pasajero".
         * @return boolean $resp
         */
        public function eliminar() {
            $baseDatos = new BaseDatos();
            $resp = false;
            if ($baseDatos->Iniciar()) {
                $consultaBorra = "DELETE FROM pasajero WHERE rdocumento = ".$this->getDni();
                if ($baseDatos->Ejecutar($consultaBorra)) {
                    $resp = true;
                } else {
                    $this->setmensajeoperacion($baseDatos->getError());	
                }
            } else {
                $this->setmensajeoperacion($baseDatos->getError());
            }
            return $resp;
        }
    }
?>