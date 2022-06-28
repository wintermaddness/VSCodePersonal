<?php
    //número de empleado, número de licencia, nombre y apellido
    class ResponsableV {
        private $nombre;
        private $apellido;
        private $nroEmpleado;
        private $nroLicencia;
        private $mensajeoperacion;
        
        //Métodos de acceso:
        public function getNombre() {
            return $this->nombre;
        }
        public function getApellido() {
            return $this->apellido;
        }
        public function getNroEmpleado() {
            return $this->nroEmpleado;
        }
        public function getNroLicencia() {
            return $this->nroLicencia;
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
        public function setNroEmpleado($nroEmpleado) {
            $this->nroEmpleado = $nroEmpleado;
        }
        public function setNroLicencia($nroLicencia) {
            $this->nroLicencia = $nroLicencia;
        }
        public function setmensajeoperacion($mensajeoperacion){
            $this->mensajeoperacion = $mensajeoperacion;
        }

        //Métodos varios:
        /*public function __construct($nombre, $apellido, $nroEmpleado, $nroLicencia) {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->nroEmpleado = $nroEmpleado;
            $this->nroLicencia = $nroLicencia;
        }*/
        public function __construct() {
            $this->nroEmpleado = 0;
            $this->nroLicencia = "";
            $this->nombre = "";
            $this->apellido = "";
        }

        public function cargar($nroEmpleado, $nroLicencia, $nombre, $apellido) {
            $this->setNroEmpleado($nroEmpleado);
            $this->setNroLicencia($nroLicencia);
            $this->setNombre($nombre);
            $this->setApellido($apellido);
        }

        public function __toString() {
            $cadena = "-- -- -- DATOS DEL RESPONSABLE -- -- --\n".
                    "+ Nombre: ".$this->getNombre()."\n".
                    "+ Apellido: ".$this->getApellido()."\n".
                    "+ N° de empleado: ".$this->getNroEmpleado()."\n".
                    "+ N° de licencia: ".$this->getNroLicencia()."\n";
            return $cadena;
        }

        /**
         * Método 1: buscar - 
         * Busca y recupera los datos del responsable (por el nroEmpleado).
         * @param int $id
         * @return boolean $resp
         */
        public function buscar($nroEmpleado) {
            $baseDatos = new BaseDatos();
            $consulta = "SELECT * FROM responsable WHERE rnumeroempleado = ".$nroEmpleado;
            $resp = false;

            if ($baseDatos->iniciar()) {
                if ($baseDatos->ejecutar($consulta)) {
                    if ($row2 = $baseDatos->registro()) {
                        $this->setNroEmpleado($nroEmpleado);
                        $this->setNroLicencia($row2['rnumerolicencia']);
                        $this->setNombre($row2['rnombre']);
                        $this->setApellido($row2['rapellido']);
                        $resp= true;
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
         * Lista todos los responsables de viajes que cumplan con la condicion recibida por parámetro.
         * Retorna un arreglo con todos los datos de los responsables del viaje.
         * @param string $condicion
         * @return array $arregloResponsable
         */
        public function listar($condicion = ""){
            $arregloResponsable = null;
            $base = new BaseDatos();
            $consultaResponsable = "Select * from responsable ";
            //Si la condición recibida por parámetro no está vacia, se arma un nuevo string para la consulta en la BD:
            if ($condicion != "") {
                $consultaResponsable = $consultaResponsable.' where '.$condicion;
            }

            $consultaResponsable .= " order by rapellido ";
            //echo $consultaResponsable;
            if ($base->Iniciar()) {
                if ($base->Ejecutar($consultaResponsable)) {				
                    $arregloResponsable = array();
                    while ($row2 = $base->Registro()) {
                        $nroEmpleado = $row2['rnumeroempleado'];
                        $nroLicencia = $row2['rnumerolicencia'];
                        $nombre = $row2['rnombre'];
                        $apellido = $row2['rapellido'];
                    
                        $nuevoResponsable = new ResponsableV();
                        $nuevoResponsable->cargar($nroEmpleado, $nroLicencia, $nombre, $apellido);
                        array_push($arregloResponsable, $nuevoResponsable);
                    }
                 } else {
                     $this->setmensajeoperacion($base->getError());
                     
                }
            } else {
                 $this->setmensajeoperacion($base->getError());
            }	
            return $arregloResponsable;
        }

        /**
         * Método 3: insertar - 
         * Inserta una nueva tupla en la tabla "responsable".
         * @return boolean $resp
         */
        public function insertar() {
            $base = new BaseDatos();
            $resp = false;
            $consultaInsertar = "INSERT INTO responsable(rnumeroempleado, rnumerolicencia, rnombre, rapellido) 
                                VALUES ('".$this->getNroEmpleado()."',
                                        '".$this->getNroLicencia()."', 
                                        '".$this->getNombre()."',
                                        '".$this->getApellido()."')";
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
         * Modifica los valores de una tupla en la tabla "responsable".
         * @return boolean $resp
         */
        public function modificar() {
            $resp = false; 
            $baseDatos = new BaseDatos();
            $consultaModifica = "UPDATE responsable SET rnumerolicencia = '".$this->getNroLicencia()."',
                                                rnombre = '".$this->getNombre()."',
                                                rapellido = '".$this->getApellido()."'
                                                WHERE rnumeroempleado = ". $this->getNroEmpleado();
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
         * Elimina una tupla en la tabla "responsable".
         * @return boolean $resp
         */
        public function eliminar() {
            $baseDatos = new BaseDatos();
            $resp = false;
            if ($baseDatos->Iniciar()) {
                $consultaBorra = "DELETE FROM responsable WHERE rnumeroempleado = ".$this->getNroEmpleado();
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

        public function listarViajesResponsable() {
            $arrayViajes = null;
            $base = new BaseDatos();
            $consulta = "SELECT * FROM viaje WHERE rnumeroempleado = ".$this->getNroEmpleado();    
            if ($base->Iniciar()) {
                if ($base->Ejecutar($consulta)) {
                    $arrayViajes = array();
                    while ($row2=$base->Registro()) {
                        $codigoViaje = $row2['idviaje'];
                        $destino = $row2['vdestino'];
                        $capacidadPasajeros = $row2['vcantmaxpasajeros'];
                        $idEmpresa = $row2['idempresa'];
                        $objResponsable = $row2['rnumeroempleado'];
                        $importe = $row2['vimporte'];
                        $tipoAsiento = $row2['tipoAsiento'];
                        $idayvuelta = $row2['idayvuelta'];
                        $viaje = new Viaje();
                        $viaje->cargar($codigoViaje, $destino, $capacidadPasajeros, $idEmpresa, $objResponsable, $importe, $tipoAsiento, $idayvuelta);
                        $arrayViajes[] = $viaje;
                    }
                } else {
                    $this->setmensajeoperacion($base->getError());
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
            return $arrayViajes;
        }

        /**
         * Método 7: eliminarViajesResponsable - 
         * Función que elimina todos los viajes asociados a un responsable específico.
         * @return boolean
         */
        function eliminarViajesResponsable()
        {
            $resp = false;
            $listaDeViajes = $this->listarViajesResponsable();
            foreach ($listaDeViajes as $unViaje) {
                $listaDePasajeros = $unViaje->listarPasajeros();
                foreach ($listaDePasajeros as $unPasajero) {
                    $unPasajero->Eliminar();
                }
                $unViaje->Eliminar();
            }
            return $resp;
        }
    }
?>