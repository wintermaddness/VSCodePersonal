<?php
    class CuentaCorriente extends Cuenta {
        private $montoMaxDescubierto;

        //Métodos de acceso
        public function getMontoMaxDescubierto() {
            return $this->montoMaxDescubierto;
        }

        public function setMontoMaxDescubierto($montoMaxDescubierto) {
            $this->montoMaxDescubierto = $montoMaxDescubierto;
        }

        //Métodos
        public function __construct($nroCliente, $saldoCuenta, $montoMaxDescubierto) {
            parent::__construct($nroCliente, $saldoCuenta);
            $this->montoMaxDescubierto = $montoMaxDescubierto;
        }

        /**
         * Método 1: realizarRetiro - 
         * Permite realizar un retiro de la cuenta.
         */
        public function realizarRetiro($monto) {
            $validacion = false;
            $montoMaximo = $this->getMontoMaxDescubierto() + parent::getSaldoCuenta();
            if ($montoMaximo >= $monto) {
                parent::realizarRetiro($monto);
                $validacion = true;
            }
            return $validacion;
        }
        
        public function __toString() {
            return parent::__toString()
            ."  >> Monto máximo al descubierto: $".$this->getMontoMaxDescubierto()."\n";
        }
    }
?>