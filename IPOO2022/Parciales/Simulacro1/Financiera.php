<?php
//denominación, dirección y la colección de prestamos otorgados.
    class Financiera {
        private $denominacion;
        private $direccion;
        private $arrayPrestamos = [];

        //Métodos de acceso
        public function getDenominacion() {
            return $this->denominacion;
        }
        public function getDireccion() {
            return $this->direccion;
        }
        public function getArrayPrestamos() {
            return $this->arrayPrestamos;
        }

        public function setDenominacion($denominacion) {
            $this->denominacion = $denominacion;
        }
        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
        public function setArrayPrestamos($arrayPrestamos) {
            $this->arrayPrestamos = $arrayPrestamos;
        }

        //Métodos
        public function __construct($denominacion, $direccion) {
            $this->denominacion = $denominacion;
            $this->direccion = $direccion;
        }

        /**
         * Método 1: incorporarPrestamo - 
         * Recibe un nuevo préstamo por parámetro.
         */
        public function incorporarPrestamo($nuevoPrestamo) {
            $arrayPrestamos = $this->getArrayPrestamos();
            array_push($arrayPrestamos, $nuevoPrestamo);
            $this->setArrayPrestamos($arrayPrestamos);
        }

        /**
         * Método 2: otorgarPrestamoSiCalifica - 
         * Recorre la lista de prestamos de los que no han sido generadas sus cuotas.
         */
        public function otorgarPrestamoSiCalifica() {
            $arrayPrestamos = $this->getArrayPrestamos();
            foreach ($arrayPrestamos as $indice => $elemento) {
                $prestamo = $elemento;
                $estadoPrestamo = $prestamo->getFechaOtorgamiento();
                if ($estadoPrestamo == "No aprobado.") {
                    $monto = $prestamo->getMonto();
                    $cantCuotas = $prestamo->getCantCuotas();
                    $montoPorCuota = $monto / $cantCuotas;
                    $ObjPersona = $prestamo->getObjPersona();
                    $montoNeto = $ObjPersona->getNeto();
                    //Se verifica que el monto / cantCuotas no supere el 40% del neto del solicitante
                    $verificacion = $montoNeto * 0.4;
                    if ($montoPorCuota <= $verificacion) {
                        $prestamo->otorgarPrestamo();
                    }
                }
            }
        }

        /**
         * Método 3: informarCuotaPagar - 
         * Dado el ID del prestamo, obtiene la sig. cuota a pagar.
         */
        public function informarCuotaPagar($idPrestamo) {
            $arrayPrestamos = $this->getArrayPrestamos();
            foreach ($arrayPrestamos as $indice => $elemento) {
                $prestamo = $elemento;
                $id = $prestamo->getId();
                if ($id == $idPrestamo) {
                    $cuotaAPagar = $prestamo->darSiguienteCuotaPagar();
                    return $cuotaAPagar;
                }
            }
        }

        /**
         * Método 4: mostrarPrestamos - 
         * Recorre el arreglo de préstamos y los retorna en pantalla
         * @return string
         */
        private function mostrarPrestamos() {
            $cadena = "";
            $arrayPrestamos = $this->getArrayPrestamos();
            foreach ($arrayPrestamos as $indice => $elemento) {
                $unPrestamo = $elemento->__toString();
                $cadena = "".$unPrestamo;
            }
            return $cadena;
        }

        public function __toString() {
            $prestamos = $this->mostrarPrestamos();
            $cadena = "| Denominación: ".$this->getDenominacion()."\n"
                    ."| Dirección: ".$this->getDireccion()."\n"
                    ."| Préstamos: ".$prestamos."\n";
            return $cadena;
        }
    }
?>