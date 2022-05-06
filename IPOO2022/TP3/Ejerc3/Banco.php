<?php
    class Banco {
        private $arrayCuentaCorriente;
        private $arrayCajaAhorro;
        private $ultimoValorCuenta;
        private $arrayCliente;

        //Métodos de acceso
        public function getArrayCuentaCorriente() {
            return $this->arrayCuentaCorriente;
        }
        public function getArrayCajaAhorro() {
            return $this->arrayCajaAhorro;
        }
        public function getUltimoValorCuenta() {
            return $this->ultimoValorCuenta;
        }
        public function getArrayCliente() {
            return $this->arrayCliente;
        }

        public function setArrayCuentaCorriente($arrayCuentaCorriente) {
            $this->arrayCuentaCorriente = $arrayCuentaCorriente;
        }
        public function setArrayCajaAhorro($arrayCajaAhorro) {
            $this->arrayCajaAhorro = $arrayCajaAhorro;
        }
        public function setUltimoValorCuenta($ultimoValorCuenta) {
            $this->ultimoValorCuenta = $ultimoValorCuenta;
        }
        public function setArrayCliente($arrayCliente) {
            $this->arrayCliente = $arrayCliente;
        }

        //Métodos varios
        public function __construct($arrayCuentaCorriente, $arrayCajaAhorro, $ultimoValorCuenta, $arrayCliente) {
            $this->arrayCuentaCorriente = $arrayCuentaCorriente;
            $this->arrayCajaAhorro = $arrayCajaAhorro;
            $this->ultimoValorCuenta = $ultimoValorCuenta;
            $this->arrayCliente = $arrayCliente;
        }

        /**
         * Método 1: incorporarCliente - 
         * Permite agregar un nuevo cliente al Banco.
         */
        public function incorporarCliente($nuevoCliente) {
            $arrayCliente = $this->getArrayCliente();
            $cantClientes = count($arrayCliente);
            if ($cantClientes == 0) {
                $arrayCliente[0] = $nuevoCliente;
            } else {
                $arrayCliente[$cantClientes] = $nuevoCliente;
            }
            $this->setArrayCliente($arrayCliente);
        }

        /**
         * Método 2: buscarCliente - 
         * Busca un nro de cliente determinado y retorna su posición.
         */
        private function buscarCliente($nroCliente) {
            $i = 0;
            $clienteEncontrado = null;
            $arrayCliente = $this->getArrayCliente();
            $cantClientes = count($arrayCliente);
            while ($clienteEncontrado && $i<$cantClientes) {
                if ($arrayCliente[$i]->getNumCliente() == $nroCliente) {
                    $clienteEncontrado = $arrayCliente[$i];
                }
                $i++;
            }
            return $clienteEncontrado;
        }

        /**
         * Método 3: incorporarCuentaCorriente - 
         * Agregar una nueva Cuenta a la colección de cuentas.
         * Se verifica que el cliente dueño de la cuenta es cliente del Banco.
         */
        public function incorporarCuentaCorriente($nroCliente) {
            $arrayCuentaCorriente = $this->getArrayCuentaCorriente();
            $esCliente = $this->buscarCliente($nroCliente);
            if ($esCliente == null) {
                //Si no se encuentra el cliente, se le asigna una cuenta corriente:
                $ultimoValorCuenta = $this->setUltimoValorCuenta($this->getUltimoValorCuenta() + 1);
                $nuevaCuentaCorriente = new CuentaCorriente(0, $esCliente, $ultimoValorCuenta, 5000);
                array_push($arrayCuentaCorriente, $nuevaCuentaCorriente);
                $this->setArrayCuentaCorriente($arrayCuentaCorriente);
            }
            return $ultimoValorCuenta;
        }

        /**
         * Método 4: incorporarCajaAhorro - 
         * Agregar una nueva Caja de Ahorro a la colección de cajas de ahorro.
         * Se verifica que el cliente dueño de la cuenta es cliente del Banco.
         */
        public function incorporarCajaAhorro($nroCliente) {
            $arrayCajaAhorro = $this->getArrayCajaAhorro();
            $esCliente = $this->buscarCliente($nroCliente);
            if ($esCliente == null) {
                //Si no se encuentra el cliente, se le asigna una cuenta caja de ahorro:
                $ultimoValorCuenta = $this->setUltimoValorCuenta($this->getUltimoValorCuenta() + 1);
                $nuevaCajaAhorro = new CajaAhorro(0, $esCliente, $ultimoValorCuenta);
                array_push($arrayCajaAhorro, $nuevaCajaAhorro);
                $this->setArrayCajaAhorro($arrayCajaAhorro);
            }
            return $ultimoValorCuenta;
        }

        /**
         * Método 5: buscarCuenta - 
         * Busca un nro de cuenta determinado y retorna su posición.
         */
        public function buscarCuenta($nroCuenta) {
            $i = 0;
            $cuentaEncontrada = null;
            $arrayCuentaCorriente = $this->getArrayCuentaCorriente();
            $arrayCajaAhorro = $this->getArrayCajaAhorro();
            $cantCuentasCorrientes = count($arrayCuentaCorriente);
            $cantCajaAhorro = count($arrayCajaAhorro);
            while ($cuentaEncontrada && $i<$cantCuentasCorrientes) {
                if ($arrayCuentaCorriente[$i]->getNroCliente() == $nroCuenta) {
                    $cuentaEncontrada = $arrayCuentaCorriente[$i];
                }
                $i++;
            }
            if ($cuentaEncontrada == null) {
                //Se reinicia el contador:
                $i = 0;
                while ($cuentaEncontrada && $i<$cantCajaAhorro) {
                    if ($arrayCajaAhorro[$i]->getNroCliente() == $nroCuenta) {
                        $cuentaEncontrada = $arrayCajaAhorro[$i];
                    }
                    $i++;
                }
            }
            return $cuentaEncontrada;
        }

        /**
         * Método 6: realizarDeposito - 
         * Dado un número de Cuenta y un monto, realiza un depósito.
         */
        /*public function realizarDeposito($nroCuenta, $monto) {
            //Se verifica que el nro de cuenta esté en la colección:
            $esCuenta = $this->buscarCuenta($nroCuenta);
            if ($esCuenta == null) {
                $deposito = $this->depositar($esCuenta, $monto);
            } else {
                $deposito = ">>> ERROR. Cuenta inexistente. No se pudo realizar el depósito.\n";
            }
            return $deposito;
        }*/

        /**
         * Método 7: depositar - 
         * Realiza el depósito de cierto monto.
         */
        public function depositar($nroCuenta, $monto) {
            /*$deposito = $nroCuenta->realizarDeposito($monto);
		    return $deposito;*/
            //Se verifica que el nro de cuenta esté en la colección:
            $esCuenta = $this->buscarCuenta($nroCuenta);
            if ($esCuenta == null) {
                $deposito = $this->depositar($esCuenta, $monto);
            } else {
                $deposito = ">>> ERROR. Cuenta inexistente. No se pudo realizar el depósito.\n";
            }
            return $deposito;
        }

        /**
         * Método 8: realizarRetiro - 
         * Dado un número de Cuenta y un monto, realiza un retiro.
         */
        /*public function realizarRetiro($nroCuenta, $monto) {
            //Se verifica que el nro de cuenta esté en la colección:
            $esCuenta = $this->buscarCuenta($nroCuenta);
            if ($esCuenta == null) {
                $retiro = $this->retirar($esCuenta, $monto);
            } else {
                $retiro = ">>> ERROR. Cuenta inexistente. No se pudo realizar el retiro.\n";
            }
            return $retiro;
        }*/

        /**
         * Método 9: retirar - 
         * Realiza el retiro de cierto monto.
         */
        public function retirar($nroCuenta, $monto) {
            /*$retirar = $nroCuenta->realizarRetiro($monto);
		    return $retirar;*/
            $esCuenta = $this->buscarCuenta($nroCuenta);
            if ($esCuenta == null) {
                $retiro = $nroCuenta->realizarRetiro($monto);
            } else {
                $retiro = ">>> ERROR. Cuenta inexistente. No se pudo realizar el retiro.\n";
            }
            return $retiro;
        }

        /**
         * Método 10: realizarTransferencia - 
         * Realiza la transferencia de determinado monto de una cuenta a otra.
         * Son necesarios: cuenta1, cuenta2 y un monto a transferir.
         */
        public function realizarTransferencia($nroCuenta1, $nroCuenta2, $monto) {
            //Se verifica que la cuenta que transfiere dinero esté dentro de la colección:
            $cuenta1Existe = $this->buscarCuenta($nroCuenta1);
            if ($cuenta1Existe == null) {
                $transferencia = ">>> ERROR. La cuenta a debitar no existe.\n";
            } else {
                //Se verifica que la cuenta que recibe el dinero esté dentro de la colección:
                $cuenta2Existe = $this->buscarCuenta($nroCuenta2);
                if ($cuenta2Existe == null) {
                    $transferencia = ">>> ERROR. La cuenta a acreditar no existe.\n";
                } else {
                    //Se retira el monto de la cuenta que transfiere:
                    $transferencia = $this->retirar($cuenta1Existe, $monto);
                    if ($transferencia == null) {
                        $transferencia = ">> ERROR. Saldo insuficiente. No es posible realizar la extracción.\n";
                    } else {
                        $transferencia = $this->depositar($nroCuenta2, $monto);
                    }
                }
            }
            return $transferencia;
        }

        /**
         * Método 11: mostrarClientes - 
         * Retorna cada uno de los clientes almacenados en la colección.
         * @return string
         */
        public function mostrarClientes() {
            $cadena = "";
            $arrayCliente = $this->getArrayCliente();
            foreach ($arrayCliente as $unCliente) {
                $cadena .= $unCliente."\n";
            }
            return $cadena;
        }

        /**
         * Método 12: mostrarCajaAhorro - 
         * Retorna cada uno de las caja ahorro almacenadas en la colección.
         * @return string
         */
        public function mostrarCajaAhorro() {
            $cadena = "";
            $arrayCajaAhorro = $this->getArrayCajaAhorro();
            foreach ($arrayCajaAhorro as $unaCajaAhorro) {
                $cadena .= $unaCajaAhorro."\n";
            }
            return $cadena;
        }

        /**
         * Método 13: mostrarCuentaCorriente - 
         * Retorna cada uno de las caja ahorro almacenadas en la colección.
         * @return string
         */
        public function mostrarCuentaCorriente() {
            $cadena = "";
            $arrayCuentaCorriente = $this->getArrayCuentaCorriente();
            foreach ($arrayCuentaCorriente as $unaCuentaCorriente) {
                $cadena .= $unaCuentaCorriente."\n";
            }
            return $cadena;
        }

        /**
         * Método 14: ultimoValorCuentaAsignado - 
         * Retorna el último número de cuenta asignado.
         */
        private function ultimoValorCuentaAsignado() {
            $asigCuenta = $this->getUltimoValorCuenta() + 1;
            $this->setUltimoValorCuenta($asigCuenta);
            return $asigCuenta;
        }

        public function __toString() {
            $cadena =
                    "1) CLIENTES\n".$this->mostrarClientes()."\n".
                    "2) CUENTAS CAJA DE AHORRO\n".$this->mostrarCajaAhorro()."\n".
                    "3) CUENTAS CORRIENTES\n".$this->mostrarCuentaCorriente().
                    "+| Último valor de cuenta asignado: \n".
                    "  >> ".$this->ultimoValorCuentaAsignado()."\n";
            return $cadena;
        }
    }
?>