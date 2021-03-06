<?php
    //$objFunciones: nombre, horario de inicio, duración de la obra y precio.
    class Funcion {
        private $nombreFuncion;
        private $horarioInicio;
        private $duracion;
        private $precio;

        //Métodos de acceso
        public function getNombreFuncion() {
            return $this->nombreFuncion;
        }
        public function getHorarioInicio() {
            return $this->horarioInicio;
        }
        public function getDuracion() {
            return $this->duracion;
        }
        public function getPrecio() {
            return $this->precio;
        }

        public function setNombreFuncion($nombreFuncion) {
            $this->nombreFuncion = $nombreFuncion;
        }
        public function setHorarioInicio($horarioInicio) {
            $this->horarioInicio = $horarioInicio;
        }
        public function setDuracion($duracion) {
            $this->duracion = $duracion;
        }
        public function setPrecio($precio) {
            $this->precio = $precio;
        }

        //Métodos
        public function __construct($nombreFuncion, $horarioInicio, $duracion, $precio) {
            $this->nombreFuncion = $nombreFuncion;
            $this->horarioInicio = $horarioInicio;
            $this->duracion = $duracion;
            $this->precio = $precio;
        }

        /**
         * Método 1: convertirHorasAMinutos - 
         * Convierte una hora en formato hh:mm a un total de n minutos.
         * @return int
         */
        public function convertirHorasAMinutos() {
            $hora = $this->getHorarioInicio();
            $minutos = 0;

            if (strpos($hora, ':') !== false) {
                // Se separan las horas de los minutos:
                list($horas, $minutos) = explode(':', $hora);
            }
            $totalMinutos = $horas * 60 + $minutos;

            return $totalMinutos;
        }

        /**
         * Método 2: buscarFuncion - 
         * Retorna la posición de una función determinada.
         */
        public function buscarFuncion($funcion, $arrayFunciones) {
            $cantFunciones = count($arrayFunciones);
            $indiceFuncion = -1;
            $i = 0;

            while ($i < $cantFunciones && $indiceFuncion == -1) {
                if ($this->funcionesTeatro[$i]->getNombreFuncion() == $funcion) {
                    $indiceFuncion = $i;
                }
                $i++;
            }
            return $indiceFuncion;
        }
        
        public function __toString() {
            $cadena = "\n+ Nombre de la función: ".$this->getNombreFuncion()."\n"
                    ."+ Horario de inicio: ".$this->getHorarioInicio()."\n"
                    ."+ Duración: ".$this->getDuracion()."\n"
                    ."+ Precio: $".$this->getPrecio();
            return $cadena;
        }
    }
?>