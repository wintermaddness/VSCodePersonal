<?php
/**
 * idviaje bigint AUTO_INCREMENT
 * vdestino varchar(150),
 * vcantmaxpasajeros int,
 * rdocumento varchar(15),
 * idempresa bigint,
 * rnumeroempleado bigint,
 * vimporte float,
 * tipoAsiento varchar(150) --> primera clase o no, semicama o cama
 * idayvuelta varchar(150) --> si/no
 */
    class Viaje {
        private $codigoViaje; //idViaje
        private $destino;
        private $capacidadPasajeros; //cantMaxPasajeros
        private $idEmpresa;
        private $objResponsable;
        private $importe;
        private $tipoAsiento;
        private $idayvuelta;
        private $objArrayPasajeros;
        private $mensajeoperacion;

        //Métodos de acceso:
        public function getCodigoViaje() {
            return $this->codigoViaje;
        }
        public function getDestino() {
            return $this->destino;
        }
        public function getCapacidadPasajeros() {
            return $this->capacidadPasajeros;
        }
        public function getIdEmpresa() {
            return $this->idEmpresa;
        }
        public function getObjResponsable() {
            return $this->objResponsable;
        }
        public function getImporte() {
            return $this->importe;
        }
        public function getTipoAsiento() {
            return $this->tipoAsiento;
        }
        public function getIdayvuelta() {
            return $this->idayvuelta;
        }
        public function getObjArrayPasajeros() {
            return $this->objArrayPasajeros;
        }
        public function getmensajeoperacion() {
            return $this->mensajeoperacion;
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
        public function setIdEmpresa($idEmpresa) {
            $this->idEmpresa = $idEmpresa;
        }
        public function setObjResponsable($objResponsable) {
            $this->objResponsable = $objResponsable;
        }
        public function setImporte($importe) {
            $this->importe = $importe;
        }
        public function setTipoAsiento($tipoAsiento) {
            $this->tipoAsiento = $tipoAsiento;
        }
        public function setIdayvuelta($idayvuelta) {
            $this->idayvuelta = $idayvuelta;
        }
        public function setObjArrayPasajeros($objArrayPasajeros) {
            $this->objArrayPasajeros = $objArrayPasajeros;
        }
        public function setmensajeoperacion($mensajeoperacion){
            $this->mensajeoperacion = $mensajeoperacion;
        }
        
        //Métodos varios:
        public function __construct() {
            $this->codigoViaje = "";
            $this->destino = "";
            $this->capacidadPasajeros = "";
            $this->idEmpresa = "";
            $this->objResponsable = "";
            $this->importe = "";
            $this->tipoAsiento = "";
            $this->idayvuelta = "";
            $this->objArrayPasajeros = [];
        }

        public function cargar($codigoViaje, $destino, $capacidadPasajeros, $idEmpresa, $objResponsable, $importe, $tipoAsiento, $idayvuelta) {
            $this->setCodigoViaje($codigoViaje);
            $this->setDestino($destino);
            $this->setCapacidadPasajeros($capacidadPasajeros);
            $this->setIdEmpresa($idEmpresa);
            $this->setObjResponsable($objResponsable);
            $this->setImporte($importe);
            $this->setTipoAsiento($tipoAsiento);
            $this->setIdayvuelta($idayvuelta);
        }

        public function __toString() {
            $pasajeros = $this->getObjArrayPasajeros();
            $objResponsable = $this->getObjResponsable();
            $cadena = "-- -- -- DATOS DEL VIAJE -- -- --\n"
                    ."+| Código del viaje: ".$this->getCodigoViaje()."\n"
                    ."+| Destino: ".$this->getDestino()."\n"
                    ."+| Capacidad de pasajeros: ".$this->getCapacidadPasajeros()."\n"
                    ."+| Cantidad de pasajeros: " .count($pasajeros)."\n"
                    ."+| Tipo de asiento: ".$this->getTipoAsiento()."\n"
                    ."+| Trayectoria: ".$this->getIdayvuelta()."\n"
                    ."+| Importe del viaje: ".$this->getImporte()."\n"
                    ."+| ID Empresa: ".$this->getIdEmpresa()."\n"
                    .$objResponsable->__toString()."\n"; 
            return $cadena;
        }

        /**
         * Método 1: buscar - 
         * Busca y recupera los datos del viaje (por el idViaje).
         * @param int $id
         * @return boolean $resp
         */
        public function buscar($id) {
            $baseDatos = new BaseDatos();
            $consulta = "SELECT * FROM viaje WHERE idviaje = ".$id;
            $resp = false;

            if ($baseDatos->iniciar()) {
                if ($baseDatos->ejecutar($consulta)) {
                    if ($row2 = $baseDatos->registro()) {
                        $this->setCodigoViaje($id);
                        $this->setDestino($row2['vdestino']);
                        $this->setCapacidadPasajeros($row2['vcantmaxpasajeros']);
                        $this->setIdEmpresa($row2['idempresa']);
                        $this->setObjResponsable($row2['rnumeroempleado']);
                        $this->setImporte($row2['vimporte']);
                        $this->setTipoAsiento($row2['tipoAsiento']);
                        $this->setIdayvuelta($row2['idayvuelta']);
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
         * Lista todos los viajes que cumplan con la condición recibida por parámetro.
         * Retorna un arreglo con todos los datos del viaje.
         * @param string $condicion
         * @return array $arrayViaje
         */
        public function listar($condicion = ""){
            $arrayViaje = null;
            $base = new BaseDatos();
            $consultaViaje = "Select * from viaje ";
            //Si la condición recibida por parámetro no está vacia, se arma un nuevo string para la consulta en la BD:
            if ($condicion != "") {
                $consultaViaje = $consultaViaje.' where '.$condicion;
            }

            $consultaViaje .= " order by idviaje ";
            //echo $consultaViaje;
            if ($base->Iniciar()) {
                if ($base->Ejecutar($consultaViaje)) {				
                    $arrayViaje = array();
                    while ($row2 = $base->Registro()) {
                        $codigoViaje = $row2['idviaje'];
                        $destino = $row2['vdestino'];
                        $capacidadPasajeros = $row2['vcantmaxpasajeros'];
                        $idEmpresa = $row2['idempresa'];
                        $objResponsable = $row2['rnumeroempleado'];
                        $importe = $row2['vimporte'];
                        $tipoAsiento = $row2['tipoAsiento'];
                        $idayvuelta = $row2['idayvuelta'];
                        $nuevoViaje = new Viaje();
                        $nuevoViaje->cargar($codigoViaje, $destino, $capacidadPasajeros, $idEmpresa, $objResponsable, $importe, $tipoAsiento, $idayvuelta);
                        array_push($arrayViaje, $nuevoViaje);
                    }
                 } else {
                    $this->setmensajeoperacion($base->getError());
                }
            } else {
                 $this->setmensajeoperacion($base->getError());
            }	
            return $arrayViaje;
        }

        /**
         * Método 3: insertar - 
         * Inserta una nueva tupla en la tabla "viaje".
         * @return boolean $resp
         */
        public function insertar() {
            $base = new BaseDatos();
            $resp = false;
            $consultaInsertar = "INSERT INTO viaje(idviaje, vdestino, vcantmaxpasajeros, idempresa, rnumeroempleado, vimporte, tipoAsiento, idayvuelta)
                                VALUES ('".$this->getCodigoViaje()."',
                                        '".$this->getDestino()."',
                                        '".$this->getCapacidadPasajeros()."',
                                        '".$this->getIdEmpresa()."',
                                        '".$this->getObjResponsable()."',
                                        '".$this->getImporte()."',
                                        '".$this->getTipoAsiento()."',
                                        '".$this->getIdayvuelta()."')";
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
         * Modifica los valores de una tupla en la tabla "viaje".
         * @return boolean $resp
         */
        public function modificar() {
            $resp = false; 
            $baseDatos = new BaseDatos();
            $consultaModifica = "UPDATE viaje SET vdestino = '".$this->getDestino()."',
                                                vcantmaxpasajeros = '".$this->getCapacidadPasajeros()."',
                                                idempresa = '".$this->getIdEmpresa()."',
                                                rnumeroempleado = '".$this->getObjResponsable()."',
                                                vimporte = '".$this->getImporte()."',
                                                tipoAsiento = '".$this->getTipoAsiento()."',
                                                idayvuelta = '".$this->getIdayvuelta()."'
                                                WHERE idviaje = ". $this->getCodigoViaje();
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
         * Elimina una tupla en la tabla "viaje".
         * @return boolean $resp
         */
        public function eliminar() {
            $baseDatos = new BaseDatos();
            $resp = false;
            if ($baseDatos->Iniciar()) {
                $consultaBorra = "DELETE FROM viaje WHERE idviaje = ".$this->getCodigoViaje();
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