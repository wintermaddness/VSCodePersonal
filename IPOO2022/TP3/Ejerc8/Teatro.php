<?php
    //nombreTeatro, direccionTeatro y arrayActividades
    class Teatro {
        private $nombreTeatro;
        private $direccionTeatro;
        private $arrayActividades;

        //Métodos de acceso:
        public function getNombreTeatro() {
            return $this->nombreTeatro;
        }
        public function getDireccionTeatro() {
            return $this->direccionTeatro;
        }
        public function getArrayActividades() {
            return $this->arrayActividades;
        }

        public function setNombreTeatro($nombreTeatro) {
            $this->nombreTeatro = $nombreTeatro;
        }
        public function setDireccionTeatro($direccionTeatro) {
            $this->direccionTeatro = $direccionTeatro;
        }
        public function setArrayActividades($arrayActividades) {
            $this->arrayActividades = $arrayActividades;
        }

        //Métodos varios:
        public function __construct($nombreTeatro, $direccionTeatro) {
            $this->nombreTeatro = $nombreTeatro;
            $this->direccionTeatro = $direccionTeatro;
            $this->arrayActividades = [];
        }

        /**
         * Método x: darCostos - 
         * Determina (según las actividades del teatro) cuál debería ser el cobro obtenido.
         */
        public function darCostos() {
            $arrayActividades = $this->getArrayActividades();
            $totalCosto = 0;
            foreach ($arrayActividades as $unaActividad) {
                $precioActividad = $unaActividad->getPrecio();
                $precioActividad += $precioActividad * ($unaActividad->getPorcentajeIncremento() / 100);
                $totalCosto += $precioActividad;
            }
            return $totalCosto;
        }

        /**
         * Método x: mostrarArreglo - 
         * Dado un arreglo, retorna un string de cada elemento.
         * @return string
         */
        public function mostrarArreglo($arreglo) {
            $cadena = "";
            $i = 1;
            foreach ($arreglo as $unElemento) {
                $cadena .= "|+ ACTIVIDAD ($i)------------\n".$unElemento."\n";
                $i++;
            }
        }

        public function __toString() {
            $cadena = "| TEATRO: ".$this->getNombreTeatro()."\n"
                    ."DIRECCIÓN: ".$this->getDireccionTeatro()."\n"
                    ."ACTIVIDADES: \n".$this->mostrarArreglo($this->getArrayActividades())."\n";
            return $cadena;
        }
    }
?>