<?php
    //almacena la fecha, la referencia al producto o los productos y el cliente al que se le ha realizado la venta
    class Venta {
        private $fechaVenta;
        private $objProductos;
        private $objCliente;

        //Métodos de acceso
        public function getFechaVenta() {
            return $this->fechaVenta;
        }
        public function getObjProductos() {
            return $this->objProductos;
        }
        public function getObjCliente() {
            return $this->objCliente;
        }

        public function setFechaVenta($fechaVenta) {
            $this->fechaVenta = $fechaVenta;
        }
        public function setObjProductos($objProductos) {
            $this->objProductos = $objProductos;
        }
        public function setObjCliente($objCliente) {
            $this->objCliente = $objCliente;
        }

        //Métodos
        public function __construct($fechaVenta, $objProductos, $objCliente) {
            $this->fechaVenta = $fechaVenta;
            $this->objProductos = $objProductos;
            $this->objCliente = $objCliente;
        }

        public function __toString() {
            return "Fecha de venta: ".$this->getFechaVenta()."\n".
                    "Productos: ".$this->getObjProductos()."\n".
                    "Cliente: ".$this->getObjCliente()."\n";
        }
    }
?>