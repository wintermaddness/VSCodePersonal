<?php
    class Cuenta {
        private $nroCliente;
        private $saldoCuenta;

        //Métodos de acceso
        public function getNroCliente() {
            return $this->nroCliente;
        }
        public function getSaldoCuenta() {
            return $this->saldoCuenta;
        }

        public function setNroCliente($nroCliente) {
            $this->nroCliente = $nroCliente;
        }
        public function setSaldoCuenta($saldoCuenta) {
            $this->saldoCuenta = $saldoCuenta;
        }

        //Métodos
        public function __construct($nroCliente, $saldoCuenta) {
            $this->nroCliente = $nroCliente;
            $this->saldoCuenta = $saldoCuenta;
        }

        /**
         * Método 1: saldoCuenta - 
         * Retorna el saldo de la cuenta.
         */
        public function saldoCuenta() {
            return $this->getSaldoCuenta();
        }

        /**
         * Método 2: realizarDeposito - 
         * Permite realizar un depósito a la cuenta.
         */
        public function realizarDeposito($monto) {
            $this->setSaldoCuenta($this->getSaldoCuenta() + $monto);
            return "\nSe depositó correctamente el monto de $".$monto
                    ."\n    >> Monto actualizado: ".$this->getSaldoCuenta();
        }

        /**
         * Método 3: realizarRetiro - 
         * Permite realizar un retiro de la cuenta.
         */
        public function realizarRetiro($monto) {
            $this->setSaldoCuenta($this->getSaldoCuenta() - $monto);
            return "\nSe retiró correctamente el monto de $".$monto
                    ."\n    >> Monto actualizado: ".$this->getSaldoCuenta();
        }

        public function __toString() {
            return "+| Nro Cliente: ".$this->getNroCliente()
                    ."\n+| Saldo Actual: $".$this->getSaldoCuenta()."\n";
        }
    }
?>