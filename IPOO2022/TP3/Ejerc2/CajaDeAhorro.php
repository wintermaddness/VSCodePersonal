<?php
    class CajaDeAhorro extends Cuenta {
        private $cbu;

        //Métodos de acceso
        public function getCbu() {
            return $this->cbu;
        }
        public function setCbu($cbu) {
            $this->cbu = $cbu;

        }

        //Métodos
        public function __construct($nroCliente, $saldoCuenta, $cbu) {
            parent::__construct($nroCliente, $saldoCuenta);
            $this->cbu = $cbu;
        }

        /**
         * Método 1: realizarRetiro - 
         * Permite realizar un retiro de la cuenta.
         */
        /*public function realizarRetiro($monto) {
            $saldoCuenta = $this->getSaldoCuenta();
            //Si el saldo de la cuenta es mayor o igual al del monto a retirar:
            if ($saldoCuenta >= $monto) {
                $this->setSaldoCuenta($saldoCuenta - $monto);
                $nuevoSaldo = "\nSe retiró correctamente el monto de $".$monto;
            } else {
                $nuevoSaldo = null;
            }
            return $nuevoSaldo;
        }*/

        public function __toString() {
            return "\n+| CBU Caja Ahorro: ".$this->getCbu()."\n".parent::__toString();
        }
    }
?>