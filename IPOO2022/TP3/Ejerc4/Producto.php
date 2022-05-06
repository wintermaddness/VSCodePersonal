<?php
    //almacena el código de barra, la descripción, el stock, el porcentaje de iva, el precio de compra y una referencia al rubro que pertenece
    class Producto {
        private $codigoBarra;
        private $descripcion;
        private $stock;
        private $porcentajeIva;
        private $precio;
        private $objRubro;

        //Métodos de acceso
        public function getCodigoBarra() {
            return $this->codigoBarra;
        }
        public function getDescripcion() {
            return $this->descripcion;
        }
        public function getStock() {
            return $this->stock;
        }
        public function getPorcentajeIva() {
            return $this->porcentajeIva;
        }
        public function getPrecio() {
            return $this->precio;
        }
        public function getObjRubro() {
            return $this->objRubro;
        }

        public function setCodigoBarra($codigoBarra) {
            $this->codigoBarra = $codigoBarra;
        }
        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
        public function setStock($stock) {
            $this->stock = $stock;
        }
        public function setPorcentajeIva($porcentajeIva) {
            $this->porcentajeIva = $porcentajeIva;
        }
        public function setPrecio($precio) {
            $this->precio = $precio;
        }
        public function setObjRubro($objRubro) {
            $this->objRubro = $objRubro;
        }

        //Métodos
        public function __construct($codigoBarra, $descripcion, $stock, $porcentajeIva, $precio, $objRubro) {
            $this->codigoBarra = $codigoBarra;
            $this->descripcion = $descripcion;
            $this->stock = $stock;
            $this->porcentajeIva = $porcentajeIva;
            $this->precio = $precio;
            $this->objRubro = $objRubro;
        }

        /**
         * Método 1: actualizarStock - 
         * Actualiza el stock del producto según la cant. de productos vendidos.
         */
        public function actualizarStock($cantProductos) {
            $stockProductos = $this->getStock();
            if ($cantProductos > 0) {
                $nuevaCantProductos = $stockProductos + $cantProductos;
                $this->setStock($nuevaCantProductos);
            } else {
                $nuevaCantProductos = $stockProductos - $cantProductos;
                $this->setStock($nuevaCantProductos);
            }
        }

        public function __toString() {
            return "CÓDIGO: ".$this->getCodigoBarra()."\n".
                    "Descripción: ".$this->getDescripcion()."\n".
                    "Stock: ".$this->getStock()."\n".
                    "IVA: ".$this->getPorcentajeIva()."\n".
                    "Precio: ".$this->getPrecio()."\n".
                    "Rubro: ".$this->getObjRubro()."\n";
        }
    }
?>