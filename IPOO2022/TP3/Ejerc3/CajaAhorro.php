<?php
    class CajaAhorro extends Cuenta {
        public function __construct($nroCliente, $saldoCuenta) {
            parent::__construct($nroCliente, $saldoCuenta);
        }

        /**
         * Método 1: realizarRetiro - 
         * Permite realizar un retiro de la cuenta.
         */
        public function realizarRetiro($monto) {
            /*$validacion = false;
            if (parent::saldoCuenta() >= $monto) {
                parent::realizarRetiro($monto);
                $validacion = true;
            }
            return $validacion;
            */
            if ($this->getSaldoCuenta()>=$monto) {
                $this->setSaldoCuenta($this->getSaldoCuenta() - $monto);
                $nuevoSaldo = "Se realizó la extracción en la cuenta Caja de Ahorro.";
            } else {
                $nuevoSaldo = null; //Fondo insuficiente, sólo se puede retirar el saldo actual.
            }
            return $nuevoSaldo;
        }
    }
?>