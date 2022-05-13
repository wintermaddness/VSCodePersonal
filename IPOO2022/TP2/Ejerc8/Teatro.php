<?php 
    /**
     * 1) Modificar la clase Teatro (Ejercicio 15 TP 1) para que ahora las funciones sean un objeto que tenga las variables:
     * $objFunciones: nombre, horario de inicio, duración de la obra y precio.
     * 2) El teatro ahora, contiene una referencia a una colección de funciones; las cuales pueden variar en cantidad y en horario.
     * 3) Volver a implementar las operaciones que permiten modificar el nombre y el precio de una función.
     * 4) Luego implementar la operación que carga las funciones en un teatro especifico, solicitando por consola la información de las mismas.
     * 5) También se debe verificar que el horario de las funciones, no se solapen para un mismo teatro.
     */
    class Teatro {
        private $nombreTeatro;
        private $direccionTeatro;
        private $funcionesTeatro;
    
        public function __construct($nomTeatro, $dirTeatro, $aFuncionesTeatro) {
            $this->nombreTeatro = $nomTeatro;
            $this->direccionTeatro = $dirTeatro;
            $this->funcionesTeatro = $aFuncionesTeatro;
        }
        
        public function get_NombreTeatro() {
            return $this->nombreTeatro;
        }
        public function get_DireccionTeatro() {
            return $this->direccionTeatro;
        }
        public function get_FuncionesTeatro() {
            return $this->funcionesTeatro;
        }
        
        public function set_NombreTeatro($nombreTeatro) {
            $this->nombreTeatro = $nombreTeatro;
        }
        public function set_DireccionTeatro($dirTeatro) {
            $this->direccionTeatro = $dirTeatro;
        }
        public function set_FuncionesTeatro($funcionesTeatro) {
            $this->funcionesTeatro = $funcionesTeatro;
        }

        /**
         * Método 1: buscarFuncion - 
         * Busca un nombre de Función determinado y retorna su posición.
         */
        public function buscarFuncion($nombreFuncion) {
            $i = 0;
            $bandera = false;
            $funcionEncontrada = null;
            $arrayFunciones = $this->get_FuncionesTeatro();
            $cantFunciones = count($arrayFunciones);
            while ($bandera && $i<$cantFunciones) {
                $unaFuncion = $arrayFunciones[$i];
                $nombreUnaFuncion = $unaFuncion->getNombreFuncion();
                if ($nombreUnaFuncion == $nombreFuncion) {
                    $funcionEncontrada = $i;
                    $bandera = true;
                } else {
                    $i++;
                }
            }
            return $funcionEncontrada;
        }

        /**
         * Método 2: validarFuncion - 
         * Valida el nombre de una Función ingresada por parámetro.
         * Retorna TRUE si se encuentra dentro del arreglo de Funciones.
         * @return boolean
         */
        public function validarFuncion($nombreFuncion) {
            $arrayFunciones = $this->get_FuncionesTeatro();
            $cantFunciones = count($arrayFunciones);
            //Valido que el nombre ingresado esté en el arreglo del Teatro:
            $funcionRepetida = false;
            $i = 0;
            if ($cantFunciones > 0) {
                /*do {
                    $nombreUnaFuncion = $arrayFunciones[$i]->getNombreFuncion();
                    if ($nombreUnaFuncion == $nombreFuncion) {
                        $funcionRepetida = true;
                    }
                    $i++;
                } while($funcionRepetida == false && $i<$cantFunciones);*/
                while (!$funcionRepetida && $i<$cantFunciones) {
                    $nombreUnaFuncion = $arrayFunciones[$i]->getNombreFuncion();
                    if ($nombreUnaFuncion == $nombreFuncion) {
                        $funcionRepetida = true;
                    }
                    $i++;
                }
            }
            if ($funcionRepetida == true) {
                $validacion = true;
            } else {
                $validacion = false;
            }
            return $validacion;
        }

        /**
         * Módulo 3: modificar_NombrePrecioFuncion - 
         * Dado el nombre de una funcion, modifica el nombre/precio por uno nuevo.
         */
        public function modificar_NombrePrecioFuncion($nombreFuncion, $nombreNuevo, $precioNuevo) {
            $i = 0;
            $bandera = false;
            $arrayFunciones = $this->get_FuncionesTeatro();
            while ($bandera && $i < count($arrayFunciones)) {
                $unaFuncion = $arrayFunciones[$i];
                if ($unaFuncion->getNombreFuncion() == $nombreFuncion) {
                    $unaFuncion->setNombreFuncion($nombreNuevo);
                    $unaFuncion->setPrecio($precioNuevo);
                    $arrayFunciones[$i] = $unaFuncion;
                    $bandera = true;
                }
                $i++;
            }
            $this->set_FuncionesTeatro($arrayFunciones);
            return $bandera;
        }

        public function modificar_NombrePrecioFuncionconId($nombreFuncion, $nombreNuevo, $precioNuevo) {
            $i = 0;
            $modificacion = false;
            $arrayFunciones = $this->get_FuncionesTeatro();
            /*$esFuncion = $this->buscarFuncion($nombreFuncion);
            if ($esFuncion == null) {
                $modificacion = false;
            } else {
                $esFuncion->setNombreFuncion($nombreNuevo);
                $esFuncion->setPrecio($precioNuevo);
                $arrayFunciones = $esFuncion;
                $this->set_FuncionesTeatro($arrayFunciones);
            }*/
            while (!$modificacion && $i<count($arrayFunciones)) {
                $unaFuncion = $arrayFunciones[$i];
                if ($unaFuncion->getNombreFuncion() == $nombreFuncion) {
                    $unaFuncion->setNombreFuncion($nombreNuevo);
                    $unaFuncion->setPrecio($precioNuevo);
                    $arrayFunciones = $unaFuncion;
                    $this->set_FuncionesTeatro($arrayFunciones);
                    $modificacion = true;
                }
                $i++;
            }
            return $modificacion;
        }

        /**
         * Método X: crearFuncion - 
         * Crea una Función y la agrega al teatro.
         * Verifica que su horario no se solape con ninguna otra función.
         * @return boolean
         */
        public function crearFuncion($funcion, $horainicio) {
            $arrayFunciones = $this->get_FuncionesTeatro();
            if (empty($arrayFunciones)) {
                $arrayFunciones[] = $funcion;
                $this->set_FuncionesTeatro($arrayFunciones);
                $creacion = "    >> Función añadida correctamente.\n";
            } elseif (!empty($arrayFunciones)) {
                foreach ($arrayFunciones as $funcion) {
                    if ($funcion->getHorarioInicio() != $horainicio) {
                        $arrayFunciones[] = $funcion;
                        $this->set_FuncionesTeatro($arrayFunciones);
                        $creacion = "    >> Función añadida correctamente.\n";
                    } else {
                        $creacion = "   >> ERROR. No se ha añadido la función.\n";
                    }
                }
            }
            return $creacion;
        }

        /**
         * Método 4: mostrarFuncionesTeatro - 
         * Muestra por pantalla una función determinada.
         */
        public function mostrarFuncionesTeatro($nombreFuncion) {
            $arrayFunciones = $this->get_FuncionesTeatro();
            $cantFunciones = count($arrayFunciones);
            $mostrarFuncion = "";
            $encontrada = false;
            $i = 0;
            while (!$encontrada && $i<$cantFunciones) {
                $unaFuncion = $arrayFunciones[$i];
                if ($unaFuncion->getNombreFuncion() == $nombreFuncion) {
                    $mostrarFuncion = $unaFuncion->__toString();
                    $encontrada = true;
                }
                $i++;
            }
            return $mostrarFuncion;
        }

        /**
         * Método 5: armarCadenaArrayFunciones - 
         * Retorna una cadena de strings con las funciones de un Teatro.
         */
        private function armarCadenaArrayFunciones() {
            $arrayFunciones = $this->get_FuncionesTeatro();
            $funciones = "";
            foreach ($arrayFunciones as $unaFuncion) {
                $funciones .= $unaFuncion."\n";
            }
            return $funciones;
        }
        
        public function __toString() {
            $cadena = $this->armarCadenaArrayFunciones();
            $datoTeatro = "| Teatro: ".$this->get_NombreTeatro().
                        "\n| Dirección: ".$this->get_DireccionTeatro().
                        "\n| Cantidad de funciones: ".count($this->get_FuncionesTeatro()).
                        "\n".($cadena==""?"| No hay funciones. ": "| Funciones:\n".$cadena); 
            return $datoTeatro;
        }
    }
?>