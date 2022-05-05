<?php
    class CuentaCorriente extends Cuenta {
        private $cbu;
        private $montoMaxDescubierto;

        //Métodos de acceso
        public function getCbu() {
            return $this->cbu;
        }
        public function getMontoMaxDescubierto() {
            return $this->montoMaxDescubierto;
        }

        public function setCbu($cbu) {
            $this->cbu = $cbu;
        }
        public function setMontoMaxDescubierto($montoMaxDescubierto) {
            $this->montoMaxDescubierto = $montoMaxDescubierto;
        }

        //Métodos
        public function __construct($nroCliente, $saldoCuenta, $cbu, $montoMaxDescubierto) {
            parent::__construct($nroCliente, $saldoCuenta);
            $this->cbu = $cbu;
            $this->montoMaxDescubierto = $montoMaxDescubierto;
        }

        /**
         * Método 1: realizarRetiro - 
         * Permite realizar un retiro de la cuenta.
         */
        /*
        public function realizarRetiro($monto) {
            $saldoCuenta = $this->getSaldoCuenta();
            //Si el saldo de la cuenta es mayor o igual al del monto a retirar:
            if ($saldoCuenta >= $monto) {
                $this->setSaldoCuenta($saldoCuenta - $monto);
                $nuevoSaldo = "\nSe retiró correctamente el monto de $".$monto." de la cuenta corriente.";
            } else {
                $montoRevision = $monto-parent::getSaldoCuenta();
                //Si el giro al descubierto no supera el máximo:
                if ($montoRevision <= $this->getMontoMaxDescubierto()) {
                    parent::setSaldoCuenta(parent::getSaldoCuenta() - $monto);
                    $nuevoSaldo = "\nSe realizó correctamente el giro al descubierto (Saldo de la cuenta corriente en negativo).";
                } else {
                    $nuevoSaldo = null; //fondo insuficiente
                }
            }
            return $nuevoSaldo;
        }*/

        public function __toString() {
            return "\n+| CBU Cuenta Corriente: ".$this->getCbu()."\n"
                    .parent::__toString()
                    ."  >> Monto máximo al descubierto: $".$this->getMontoMaxDescubierto()."\n";
        }
    }
?>