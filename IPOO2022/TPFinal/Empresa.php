<?php
    class Empresa {
        private $idEmpresa;
        private $enombre;
        private $edireccion;
        private $mensajeoperacion;

        //Métodos de acceso:
        public function getIdEmpresa() {
            return $this->idEmpresa;
        }
        public function getEnombre() {
            return $this->enombre;
        }
        public function getEdireccion() {
            return $this->edireccion;
        }
        public function getMensajeOperacion() {
            return $this->mensajeoperacion;
        }
 
        public function setIdEmpresa($idEmpresa) {
            $this->idEmpresa = $idEmpresa;
        }
        public function setEnombre($enombre) {
            $this->enombre = $enombre;
        }
        public function setEdireccion($edireccion) {
            $this->edireccion = $edireccion;
        }
        public function setMensajeOperacion($mensajeoperacion){
            $this->mensajeoperacion = $mensajeoperacion;
        }

        //Métodos varios:
        public function __construct() {
            $this->idEmpresa = 0;
            $this->enombre = "";
            $this->edireccion = "";
        }

        public function cargar($idEmpresa, $nombreEmpresa, $direccionEmpresa) {
            $this->setIdEmpresa($idEmpresa);
            $this->setEnombre($nombreEmpresa);
            $this->setEdireccion($direccionEmpresa);
        }

        public function __toString() {
            $cadena = "\n-- -- -- DATOS DE LA EMPRESA -- -- --\n"
                    ."| ID EMPRESA: ".$this->getIdEmpresa()."\n"
                    ."| NOMBRE EMPRESA: ".$this->getEnombre()."\n"
                    ."| DIRECCIÓN EMPRESA: ".$this->getEdireccion()."\n";
            return $cadena;
        }

        /**
         * Método 1: buscar - 
         * Busca y recupera los datos de la empresa (por el idEmpresa).
         * @param int $idEmpresa
         * @return boolean $resp
         */
        public function buscar($idEmpresa) {
            $baseDatos = new BaseDatos();
            $consulta = "SELECT * FROM empresa WHERE idempresa = ".$idEmpresa;
            $resp = false;

            if ($baseDatos->iniciar()) {
                if ($baseDatos->ejecutar($consulta)) {
                    if ($row2 = $baseDatos->registro()) {
                        $this->setIdEmpresa($idEmpresa);
                        $this->setEnombre($row2['enombre']);
                        $this->setEdireccion($row2['edireccion']);
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
         * Lista todas las empresas que cumplan con la condición recibida por parámetro.
         * Retorna un arreglo con todos los datos de las empresas de viaje.
         * @param string $condicion
         * @return array $arrayEmpresas
         */
        public function listar($condicion = "") {
            $arrayEmpresas = null;
            $base = new BaseDatos();
            $consultaEmpresa = "Select * from empresa ";
            //Si la condición recibida por parámetro no está vacia, se arma un nuevo string para la consulta en la BD:
            if ($condicion != "") {
                $consultaEmpresa = $consultaEmpresa.' where '.$condicion;
            }

            $consultaEmpresa .= " order by idempresa ";
            //echo $consultaEmpresa;
            if ($base->Iniciar()) {
                if ($base->Ejecutar($consultaEmpresa)) {				
                    $arrayEmpresas = array();
                    while ($row2 = $base->Registro()) {
                        $idEmpresa = $row2['idempresa'];
                        $nombre = $row2['enombre'];
                        $direccion = $row2['edireccion'];
                    
                        $nuevaEmpresa = new Empresa();
                        $nuevaEmpresa->cargar($idEmpresa, $nombre, $direccion);
                        array_push($arrayEmpresas, $nuevaEmpresa);
                    }
                 } else {
                    $this->setmensajeoperacion($base->getError());
                }
            } else {
                 $this->setmensajeoperacion($base->getError());
            }	
            return $arrayEmpresas;
        }

        /**
         * Método 3: insertar - 
         * Inserta una nueva tupla en la tabla "empresa".
         * @return boolean $resp
         */
        public function insertar() {
            $base = new BaseDatos();
            $resp = false;
            $consultaInsertar = "INSERT INTO empresa(idempresa, enombre, edireccion) 
                                VALUES ('".$this->getIdEmpresa()."', 
                                        '".$this->getEnombre()."',
                                        '".$this->getEdireccion()."')";
            if ($base->Iniciar()) {
                if ($base->Ejecutar($consultaInsertar)) {
                    //$this->setIdEmpresa($base->DevolverID()); (!)
                    $this->setIdEmpresa($base->devuelveIDInsercion($consultaInsertar));
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
         * Modifica los valores de una tupla en la tabla "empresa".
         * @return boolean $resp
         */
        public function modificar() {
            $resp = false; 
            $baseDatos = new BaseDatos();
            $consultaModifica = "UPDATE empresa SET enombre = '".$this->getEnombre()."',
                                                edireccion = '".$this->getEdireccion()."'
                                                WHERE idempresa = ". $this->getIdEmpresa();
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
         * Elimina una tupla en la tabla "empresa".
         * @return boolean $resp
         */
        public function eliminar() {
            $baseDatos = new BaseDatos();
            $resp = false;
            if ($baseDatos->Iniciar()) {
                $consultaBorra = "DELETE FROM empresa WHERE idempresa = ".$this->getIdEmpresa();
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

        /**
         * Método 6: listarViajesEmpresa - 
         * Función que retorna un arreglo con todos los viajes asociados a una empresa específica.
         * @return array
         */
        public function listarViajesEmpresa() {
            $arrayViajes = null;
            $base = new BaseDatos();
            $consulta = "SELECT * FROM viaje WHERE idempresa = ".$this->getIdEmpresa();    
            if ($base->Iniciar()) {
                if ($base->Ejecutar($consulta)) {
                    $arrayViajes = array();
                    while ($row2 = $base->Registro()) {
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
         * Método 7: eliminarViajesEmpresa - 
         * Función que elimina todos los viajes asociados a una empresa específica.
         * @return boolean
         */
        function EliminarViajesEmpresa() {
            $resp = false;
            $listaDeViajes = $this->listarViajesEmpresa();
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