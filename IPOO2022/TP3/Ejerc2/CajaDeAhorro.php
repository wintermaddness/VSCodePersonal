<?php
    class CajaDeAhorro extends Cuenta {
        public function __construct($nroCliente, $saldoCuenta) {
            parent::__construct($nroCliente, $saldoCuenta);
        }

        /**
         * Método 1: realizarRetiro - 
         * Permite realizar un retiro de la cuenta.
         */
        public function realizarRetiro($monto) {
            $validacion = false;
            if (parent::saldoCuenta() >= $monto) {
                parent::realizarRetiro($monto);
                $validacion = true;
            }
            return $validacion;
        }
    }
?>