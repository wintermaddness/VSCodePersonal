<?php
    include "BaseDatos.php";
    include "Viaje.php";
	include "ResponsableV.php";
	include "Pasajero.php";
    include "Empresa.php";

	$objPasajero = new Pasajero();
	$objViaje = new Viaje();
	$objEmpresaTransportes = new Empresa();
	$objEmpresaTransportes->cargar(1, "Shatterdome", "Tsing Yi, Hong Kong");
	$respEmpresa = $objEmpresaTransportes->insertar();
	//Se inserta el objEmpresaTransportes en la BD:
	if ($respEmpresa == true) {
		echo "\nOP INSERCIÓN: La Empresa fue ingresada en la BD:\n";
		$coleccionEmpresa = $objEmpresaTransportes->listar("");
		foreach ($coleccionEmpresa as $unaEmpresa) {
			echo $unaEmpresa;
			echo "------------------------------------------------------\n";
		}
	} else {
		echo $unaEmpresa->getmensajeoperacion();
	}

	function menuDeOpciones() {
		$menu = "\n---------------Menú de opciones---------------";
		echo "\n1) Crear Viaje";
		echo "\n2) Modificar nombre de un teatro";
		echo "\n3) Modificar direccion de un teatro";
		echo "\n4) Modificar ciudad de un teatro";
		echo "\n5) Agregar funcion";
		echo "\n6) Modificar nombre de una funcion";
		echo "\n7) Modificar precio de una funcion";
		echo "\n8) Obtener costo total del teatro";
		echo "\n9) Mostrar datos del teatro";
		echo "\n10) Mostrar datos de las funciones";
		echo "\n11) Borrar una funcion";
		echo "\n12) Borrar un teatro";
		echo "\n13) Salir del programa";
		return $menu;
	}

	/**
	 * Opción 6: ver datos del viaje - 
	 * Lista la información de todos los viajes.
	 */
	function mostrarDatosViaje() {
		$viaje = new Viaje();
		echo $viaje->listar();
	}

	function datosPasajero() {
		echo  "| Ingrese los datos de un pasajero: ";
		echo "\n	+ Ingrese el nombre del pasajero: ";
		$nombre = trim(fgets(STDIN));
		echo "	+ Ingrese el apellido del pasajero: ";
		$apellido = trim(fgets(STDIN));
		echo "	+ Ingrese el número de documento del pasajero: ";
		$dni = trim(fgets(STDIN));
		echo "	+ Ingrese el número de teléfono del pasajero: ";
		$telefono = trim(fgets(STDIN));
		$objPasajero = new Pasajero();
		$objPasajero->cargar($nombre, $apellido, $dni, $telefono);
		return $objPasajero;
	}

	function agregarEmpresa($idEmpresa, $nombreEmpresa, $direccionEmpresa) {
		$empresaAgregada = false;
        $empresa = new Empresa();
		$empresa->cargar($idEmpresa, $nombreEmpresa, $direccionEmpresa);
		if ($empresa->insertar()) {
			$empresaAgregada = $empresa->listar();
		}
		return $empresaAgregada;
	}

	function agregarViaje($codViaje, $destino, $capacidadMaxima, $idEmpresa, $objResponsable, $precio, $tipoAsiento, $trayectoriaViaje) {
		$viajeAgregado = false;
        $viaje = new Viaje();
		$viaje->cargar($codViaje, $destino, $capacidadMaxima, $idEmpresa, $objResponsable, $precio, $tipoAsiento, $trayectoriaViaje);
		if ($viaje->insertar()) {
			//$viajeAgregado = true;
			$viajeAgregado = $viaje->listar();
		}
		return $viajeAgregado;
	}

	function crearViaje() {
		//Se piden los datos de la empresa:
		echo "\n>>> Por favor, ingrese los datos de la Empresa <<<\n";
		echo "| Ingrese el ID de la empresa: ";
		$idEmpresa = trim(fgets(STDIN));
		echo "| Ingrese el nombre de la empresa: ";
		$nombreEmpresa = trim(fgets(STDIN));
		echo "| Ingrese la dirección de la empresa: ";
		$direccionEmpresa = trim(fgets(STDIN));
		//Se piden los datos del viaje:
		echo "\n>>> Por favor, ingrese los datos del viaje <<<\n";
		echo "| Ingrese el código de viaje: ";
		$codViaje = trim(fgets(STDIN));
		echo "| Ingrese el destino: ";
		$destino = trim(fgets(STDIN));
		echo "| Ingrese la capacidad máxima de pasajeros: ";
		$capacidadMaxima = trim(fgets(STDIN));
		//Se piden los datos del responsable del viaje:
		echo ">>> Ingrese Los datos del responsable del viaje <<\n";
		echo "| Ingrese el nombre: ";
		$nombreResponsable = trim(fgets(STDIN));
		echo "| Ingrese el apellido: ";
		$apellidoResponsable = trim(fgets(STDIN));
		echo "| Ingrese el N° de empleado: ";
		$nroEmpleado = trim(fgets(STDIN));
		echo "| Ingrese el N° de licencia: ";
		$nroLicencia = trim(fgets(STDIN));

		//Se especifican las características del viaje:
		do {
			echo "| Seleccione el tipo de viaje (1 ó 2):\n";
			echo "1. Aéreo\n";
			echo "2. Terrestre\n";
			echo ">> ";
			$tipoViaje = trim(fgets(STDIN));
			if ($tipoViaje > 2 || $tipoViaje < 1) {
				echo "	>>> ERROR. Ingrese una opción válida (1 ó 2).\n";
			}
		} while($tipoViaje > 2 || $tipoViaje < 1);

		if ($tipoViaje == 1) {
			echo ">>> Ingrese las características del viaje AÉREO<<\n";
			do {
                echo "| Seleccione el tipo de asiento (1 ó 2):\n";
                echo "1. Común\n";
                echo "2. Primera clase\n";
                echo ">> ";
                $tipoAsiento = trim(fgets(STDIN));
                if ($tipoAsiento > 2 || $tipoAsiento < 1) {
                    echo "	>>> ERROR. Ingrese una opción válida (1 ó 2).\n";
                }
            } while($tipoAsiento > 2 || $tipoAsiento < 1);
            echo "| Ingrese el precio: ";
            $precio = trim(fgets(STDIN));
            do {
                echo "| Seleccione la trayectoria (1, 2 ó 3):\n";
                echo "1. Ida\n";
                echo "2. Vuelta\n";
                echo "3. Ida y Vuelta\n";
                echo ">> ";
                $trayectoriaViaje = trim(fgets(STDIN));
                if ($trayectoriaViaje > 3 || $trayectoriaViaje < 1) {
                    echo "	>>> ERROR. Ingrese una opción válida (1, 2 ó 3).\n";
                }
            } while($trayectoriaViaje > 3 || $trayectoriaViaje < 1);
		} else {
			echo ">>> Ingrese las características del viaje TERRESTRE<<\n";
			do {
				echo "| Seleccione el tipo de asiento (1 ó 2):\n";
				echo "1. Cama\n";
				echo "2. Semi-cama\n";
				echo ">> ";
				$tipoAsiento = trim(fgets(STDIN));
				if ($tipoAsiento > 2 || $tipoAsiento < 1) {
					echo "	>>> ERROR. Ingrese una opción válida (1 ó 2).\n";
				}
			} while($tipoAsiento > 2 || $tipoAsiento < 1);
			echo "| Ingrese el precio: ";
			$precio = trim(fgets(STDIN));
			do {
				echo "| Seleccione la trayectoria (1, 2 ó 3):\n";
				echo "1. Ida\n";
				echo "2. Vuelta\n";
				echo "3. Ida y Vuelta\n";
				echo ">> ";
				$trayectoriaViaje = trim(fgets(STDIN));
				if ($trayectoriaViaje > 3 || $trayectoriaViaje < 1) {
					echo "	>>> ERROR. Ingrese una opción válida (1, 2 ó 3).\n";
				}
			} while($trayectoriaViaje > 3 || $trayectoriaViaje < 1);
		}
		//Se crean los objetos:
		$objResponsable = new ResponsableV();
		$objResponsable->cargar($nombreResponsable, $apellidoResponsable, $nroEmpleado, $nroLicencia);
		$empresaAgregada = agregarEmpresa($idEmpresa, $nombreEmpresa, $direccionEmpresa);
		if ($empresaAgregada == false) {
			$idEmpresa = 0;
		} else {
			$idEmpresa = $empresaAgregada['idempresa']->getIdEmpresa();
		}
		$viajeCreado = agregarViaje($codViaje, $destino, $capacidadMaxima, $idEmpresa, $objResponsable, $precio, $tipoAsiento, $trayectoriaViaje);
		if ($viajeCreado) {
			do {
				echo "| Ingrese la cantidad de pasajeros: "; //cant. de pasajeros que compran pasajes.
				$cantPasajerosIngresados = trim(fgets(STDIN));
				//Se verifica que la cant. de pasajeros ingresada no supere la capacidad del viaje o sea negativa:
				if ($cantPasajerosIngresados > $capacidadMaxima) {
					echo "  >>> ERROR. La cantidad de pasajeros supera la capacidad máxima del viaje.\n";
				} elseif ($cantPasajerosIngresados < 0) {
					echo "  >>> ERROR. La cantidad de pasajeros agregados no puede ser negativa.\n";
				}
			} while($cantPasajerosIngresados > $capacidadMaxima || $cantPasajerosIngresados < 0);
	
			//Se toman los datos de los pasajeros, verificando que no se repitan:
			for ($i=0; $i<$cantPasajerosIngresados; $i++) {
				$datosPasajeroNuevo = datosPasajero();
				$pasajeroRepetido = $viajeCreado->validarDocumento($datosPasajeroNuevo->getDni());
				if ($pasajeroRepetido == true) {
					echo "  >>> El pasajero ingresado ya se encuentra en el viaje.\n";
					$i = $i - 1;
				} else {
					$nuevoPasajero = new Pasajero();
					$nuevoPasajero->cargar($datosPasajeroNuevo->getNombre(), $datosPasajeroNuevo->getApellido(), $datosPasajeroNuevo->getDni(), $datosPasajeroNuevo->getTelefono());
					$viajeCreado->agregarPasajeros($nuevoPasajero);
					//$respuesta = $objPasajero->insertar();
					echo "+| Pasajero agregado: \n".$nuevoPasajero;
				}
			}
		} else {
			echo "	>>> ERROR. El viaje no se ha podido agregar.\n";
		}
		return $viajeCreado;
	}

	/**
	 * Parámetros del viaje: cargar($codigoViaje, $destino, $capacidadPasajeros, $idEmpresa, $objResponsable, $importe, $tipoAsiento, $idayvuelta)
	 */

	do {
		$menu = menuDeOpciones();
		echo $menu;
		$opcion = trim(fgets(STDIN));
		switch ($opcion) {
			case 1:
				echo "\n--------- Crear un viaje ---------\n";
				$nuevoViaje = crearViaje();
				echo $nuevoViaje."\n";
				echo ">>> Se creó el viaje con éxito.\n";
			break;
			case 2:
				echo "----- Modificar el viaje -----\n";
				echo "  + Ingrese el nuevo código del viaje: ";
                $nuevoCodigo = trim(fgets(STDIN));
                echo "  + Ingrese el nuevo destino del viaje: ";
                $nuevoDestino = trim(fgets(STDIN));
                echo "  + Ingrese la nueva capacidad máxima de pasajeros del viaje: ";
                $nuevaCapacidad = trim(fgets(STDIN));
				$modificacion = $objViaje->modificar($nuevoCodigo, $nuevoDestino, $nuevaCapacidad);
                //Se muestra un msj según el resultado de las modificaciones:
                $resultado = ($modificacion?"Se modificaron los datos exitosamente. ":"ERROR. Los datos no se pudieron modificar.");
                echo "\n    >>> ".$resultado."\n";
			break;
			case 3:
				echo "\n----- Modificar lista de pasajeros -----\n";
				do {
                    echo "| Seleccione una opción (1-3):\n";
                    echo "1. Agregar pasajeros\n";
                    echo "2. Modificar pasajeros\n";
                    echo "3. Eliminar pasajeros\n";
                    echo ">>> ";
                    $opcionPasajero = trim(fgets(STDIN));
                    if ($opcionPasajero < 1 || $opcionPasajero > 3) {
                        echo "  >>> ERROR. Ingrese una opción válida (1-3).\n";
                    }
                } while($opcionPasajero < 1 || $opcionPasajero > 3);
                    
                if ($opcionPasajero == 1) {
                    //Agregar un pasajero:
					if ($objViaje->hayPasajesDisponibles() == true) {
                        do {
                            $nuevoPasajero = datosPasajero();
                            //Se verifica que el pasajero no se repita:
                            $pasajeroRepetido = $objViaje->validarDocumento($nuevoPasajero->getDni());
                            if ($pasajeroRepetido == true) {
                                echo "  >>> ERROR. El pasajero ya se encuentra en el viaje.\n";
                            }
                        } while ($pasajeroRepetido == true);

                        $nuevoPasajero = new Pasajero();
						$nuevoPasajero->cargar($nuevoPasajero->getNombre(), $nuevoPasajero->getApellido(), $nuevoPasajero->getDni(), $nuevoPasajero->getTelefono());
						$respPasajero = $nuevoPasajero->insertar();
                        if ($respPasajero == true) {
							echo "+| Pasajero agregado: \n".$nuevoPasajero;
						} else {
							echo $nuevoPasajero->getmensajeoperacion();
						}
                    } else {
                        echo "  >>> ERROR. El viaje elegido ya no tiene asientos disponibles.\n";
                    }
				} elseif ($opcionPasajero == 2) {
					//Modificar un pasajero:
					if (count($objViaje->getObjArrayPasajeros()) > 0) {
                        do {
                            echo "| ¿Cuál pasajero desea modificar?:\n";
                            echo $objViaje->mostrarListaPasajeros();
                            $cantPasajerosViaje = count($objViaje->getObjArrayPasajeros());
                            echo ">>> ";
                            $pasajeroAModificar = trim(fgets(STDIN));
                            //Se verifica que el usuario ingrese una opción válida:
                            if ($pasajeroAModificar < 1 || $pasajeroAModificar > $cantPasajerosViaje) {
                                echo "  >>> ERROR. El número ingresado no se corresponde con ningún pasajero.\n";
                            }
                        } while($pasajeroAModificar < 1 || $pasajeroAModificar > $cantPasajerosViaje);

                        $pasajeroElegido = $pasajeroAModificar - 1;
                        echo "\n	+ Ingrese el nuevo nombre del pasajero: ";
                        $nuevoNombre = trim(fgets(STDIN));
                        echo "	+ Ingrese el nuevo apellido del pasajero: ";
                        $nuevoApellido = trim(fgets(STDIN));
                        echo "	+ Ingrese el nuevo número de telefono del pasajero: ";
                        $nuevoTelefono = trim(fgets(STDIN));
                        $modificacion = $objViaje->modificarPasajeros($arrayViajes, $pasajeroElegido, $nuevoNombre, $nuevoApellido, $nuevoTelefono);
                        echo "\n>>> Pasajero modificado exitosamente.\n";
                    } else {
                        echo "  >>> ERROR. El viaje elegido no tiene pasajeros.\n";
                    }
				} elseif ($opcionPasajero == 3) {
					//Eliminar un pasajero:
				}
			break;
			case 4:
				echo "----- Modificar viaje -----\n";
			break;
			case 5:
				echo "----- Modificar responsable -----\n";
			break;
			case 6:
				echo "----- Ver datos del viaje -----\n";
				mostrarDatosViaje();
			break;
			case 7:
				echo "----- Ver datos del pasajero -----\n" ;
			break;
			case 8:
				echo "----- Ver datos de la empresa -----\n" ;
			break;
			case 9:
				echo ">>> Ha salido del programa.";
				break;
			}
	} while($opcion != 9);

	
    //Creación de objetos iniciales:
    $objPasajero = new Pasajero();
	//$objPasajero1 = new Pasajero("Raleigh", "Becket", 44014172, 2984141747);
	//$objPasajero2 = new Pasajero("Charles", "Hansen", 92476572, 2984220118);
    $objEmpresaTransportes = new Empresa(1, "Shatterdome", "Tsing Yi, Hong Kong");
	
	//Busco todas las personas almacenadas en la BD
	$coleccionPasajeros = $objPasajero->listar();
	foreach ($coleccionPasajeros as $unPasajero) {
		echo $unPasajero;
		echo "-------------------------------------------------------\n";
	}
	
	$objPasajero->cargar("Raleigh", "Becket", 44014172, 2984141747);
	$respuesta = $objPasajero->insertar();
	//Se inserta el objPasajero en la BD:
	if ($respuesta == true) {
		echo "\nOP INSERCIÓN: El pasajero fue ingresado en la BD:\n";
		$coleccionPasajeros = $objPasajero->listar("");
		foreach ($coleccionPasajeros as $unPasajero) {
			echo $unPasajero;
			echo "------------------------------------------------------\n";
		}
	} else {
		echo $unPasajero->getmensajeoperacion();
	}
	
	//Se modifica el objPasajero:
	$objPasajero->setNombre("Rahleigh");
	$respuesta = $objPasajero->modificar();
	if ($respuesta == true) {
		//Se buscan todas las personas almacenadas en la BD y se visualiza la modificación realizada:
		$coleccionPasajeros = $objPasajero->listar();
		echo "\nOP MODIFICACIÓN: Los datos fueron actualizados correctamente:\n";
		foreach ($coleccionPasajeros as $unPasajero) {
			echo $unPasajero;
			echo "-------------------------------------------------------\n";
		}	
	} else {
		echo $objPasajero->getmensajeoperacion();
	}

	//Se elimina el objPasajero:
	$respuesta = $objPasajero->eliminar();
	if ($respuesta == true) {
		//Se buscan todas las personas almacenadas en la BD y se visualiza la modificación realizada:
		echo "\nOP ELIMINACIÓN: Los datos fueron eliminados correctamente.\n";
		$coleccionPasajeros = $objPasajero->listar();
		foreach ($coleccionPasajeros as $unPasajero) {
			echo $unPasajero;
			echo "-------------------------------------------------------\n";
		}
	} else  {
		echo $objPasajero->getmensajeoperacion();
	}
?>