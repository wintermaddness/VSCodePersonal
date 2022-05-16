<?php
	include "Pasajero.php";
    include "ResponsableV.php";
	include "Viaje.php";
	include "ViajesTerrestres.php";
	include "ViajesAereos.php";
	include "EmpresaTransporte.php";

	//Se crea un Viaje Inicial:
	$arrayViajes = [];
	$objPasajero1 = new Pasajero("Raleigh", "Becket", 44014172, 2984141747);
	$objPasajero2 = new Pasajero("Charles", "Hansen", 92476572, 2984220118);
	$arrayPasajeros = [$objPasajero1, $objPasajero2];
	$objResponsable1 = new ResponsableV("Michael", "Morbius", 2984, "LSD-1234");
	$objResponsable2 = new ResponsableV("Steve", "Grant", 4321, "ASD-5678");
	//$codigoViaje, $destino, $capacidadPasajeros, $objResponsable, $tipoAsiento, $importeTerrestre, $idaVuelta
	$objViajeTerrestre = new ViajesTerrestres("00F16", "Nirvana", 15, $objResponsable1, 1, 120, 3);
	//$codigoViaje, $destino, $capacidadPasajeros, $objResponsable, $nroVuelo, $categoriaAsiento, $nombreAerolinea, $cantEscalas, $importeAereo, $idaVuelta
	$objViajeAereo = new ViajesAereos("000F14", "Kriptón", 10, $objResponsable2, 1, 2, "Aerosmith", 3, 125, 1);
	$arrayViajes = [$objViajeTerrestre, $objViajeAereo];
	$objEmpresaTransportes = new EmpresaTransporte("Shatterdome", $arrayViajes);

    function menuDeOpciones() {
		$menu = "\n---------------Menú de opciones---------------".
		"\n| Opción 1: Agregar un viaje".
		"\n| Opción 2: Modificar un viaje".
		"\n| Opción 3: Modificar lista de pasajeros".
		"\n| Opción 4: Modificar lista de responsables".
		"\n| Opción 5: Ver datos de la empresa".
		"\n| Opción 6: Salir del programa\n";
		return $menu;
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
		$objPasajero = new Pasajero($nombre, $apellido, $dni, $telefono);
		return $objPasajero;
	}

	function buscarViaje($arrayViajes, $nroViaje) {
		$cantViajes = count($arrayViajes);
		$codigoEncontrado = true;
		$viajeEncontrado = null;
		$i = 0;
		while ($viajeEncontrado && $i<$cantViajes) {
			if ($arrayViajes[$i] == $nroViaje) {
				$codigoEncontrado = false;
				$viajeEncontrado = $arrayViajes[$i];
			}
			$i++;
		}
		return $viajeEncontrado;
	}

    function crearViaje($tipoViaje) {
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
		echo ">>> Ingrese las características del viaje <<\n";
        if ($tipoViaje == 1) {
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
            $precioTerrestre = trim(fgets(STDIN));
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
            //Se crean los objetos:
		    $objResponsable = new ResponsableV($nombreResponsable, $apellidoResponsable, $nroEmpleado, $nroLicencia);
            $viajeCreado = new ViajesTerrestres($codViaje, $destino, $capacidadMaxima, $objResponsable, $tipoAsiento, $precioTerrestre, $trayectoriaViaje);
        } else {
            echo "| Ingrese el N° de vuelo: ";
            $nroVuelo = trim(fgets(STDIN));
            do {
                echo "| Seleccione la categoría de asiento (1 ó 2):\n";
                echo "1. Común\n";
                echo "2. Primera clase\n";
                echo ">> ";
                $categoriaAsiento = trim(fgets(STDIN));
                if ($categoriaAsiento > 2 || $categoriaAsiento < 1) {
                    echo "	>>> ERROR. Ingrese una opción válida (1 ó 2).\n";
                }
            } while($categoriaAsiento > 2 || $categoriaAsiento < 1);
            echo "| Ingrese el nombre de la aerolínea: ";
            $nombreAerolinea = trim(fgets(STDIN));
            echo "| Ingrese la cantidad de escalas: ";
            $cantEscalas = trim(fgets(STDIN));
            echo "| Ingrese el precio: ";
            $precioAereo = trim(fgets(STDIN));
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

            //Se crean los objetos:
            $objResponsable = new ResponsableV($nombreResponsable, $apellidoResponsable, $nroEmpleado, $nroLicencia);
            $viajeCreado = new ViajesAereos($codViaje, $destino, $capacidadMaxima, $objResponsable, $nroVuelo, $categoriaAsiento, $nombreAerolinea, $cantEscalas, $precioAereo, $trayectoriaViaje);
        }

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
                $nuevoPasajero = new Pasajero($datosPasajeroNuevo->getNombre(), $datosPasajeroNuevo->getApellido(), $datosPasajeroNuevo->getDni(), $datosPasajeroNuevo->getTelefono());
                $viajeCreado->venderPasaje($nuevoPasajero);
                echo "+| Pasajero agregado: \n".$nuevoPasajero;
            }
        }
        return $viajeCreado;
    }

    //Se inicializa el menú de opciones:
	do {
		$menu = menuDeOpciones();
		echo $menu;
		$opcion = trim(fgets(STDIN));
		switch ($opcion) {
			case 1:
				echo "\n--------- Agregar un viaje ---------\n";
				do {
					echo "| Seleccione el tipo de viaje (1 ó 2): \n";
					echo "Opción 1: TERRESTRE\n";
					echo "Opción 2: AÉREO\n";
					echo ">> ";
					$opcionViaje = trim(fgets(STDIN));
					if ($opcionViaje > 2 || $opcionViaje < 1) {
						echo "	>>> ERROR. Ingrese una opción válida (1 ó 2).\n";
					}
				} while($opcionViaje > 2 || $opcionViaje < 1);
				if ($opcionViaje == 1) {
					$viajeTerrestre = crearViaje($opcionViaje);
					//array_push($arrayViajes, $viajeTerrestre);
					//$objEmpresaTransportes->agregarViaje($viajeTerrestre);
                    $arrayViajes[count($arrayViajes)] = $viajeTerrestre;
					echo $viajeTerrestre."\n";
					echo ">>> Se gregó el viaje terrestre con éxito.\n";
				} elseif ($opcionViaje == 2) {
					$viajeAereo = crearViaje($opcionViaje);
					//array_push($arrayViajes, $viajeAereo);
					//$objEmpresaTransportes->agregarViaje($viajeAereo);
                    $arrayViajes[count($arrayViajes)] = $viajeAereo;
					echo $viajeAereo."\n";
					echo ">>> Se gregó el viaje aéreo con éxito.\n";
				}
            break;
            case 2:
				echo  "\n--------- Modificar un viaje ---------\n";
                do {
                    echo "| ¿Cuál viaje desea modificar?:\n";
                    for ($i=0; $i<count($arrayViajes); $i++) {
                        $unViaje = $arrayViajes[$i];
                        echo $i+1 .") Código del viaje: ".$unViaje->getCodigoViaje()." - Destino: ".$unViaje->getDestino()."\n";
                    }
                    echo ">>> ";
                    $viajeAModificar = trim(fgets(STDIN));
                    //Se verifica que el usuario ingrese una opción válida:
                    if ($viajeAModificar > count($arrayViajes) || $viajeAModificar < 1) {
                        echo "  >>> ERROR. El número ingresado no se corresponde con ningún viaje.\n";
                    }
                } while($viajeAModificar > count($arrayViajes) || $viajeAModificar < 1);

                $posicionViaje = $viajeAModificar - 1;
                echo "  + Ingrese el nuevo código del viaje: ";
                $nuevoCodigo = trim(fgets(STDIN));
                echo "  + Ingrese el nuevo destino del viaje: ";
                $nuevoDestino = trim(fgets(STDIN));
                echo "  + Ingrese la nueva capacidad máxima de pasajeros del viaje: ";
                $nuevaCapacidad = trim(fgets(STDIN));
                //$modificacion = $arrayViajes[$posicionViaje]->modificarDatosViaje($arrayViajes, $posicionViaje, $nuevoCodigo, $nuevoDestino, $nuevaCapacidad);
                $modificacion = $arrayViajes[$posicionViaje]->modificarDatosViaje($nuevoCodigo, $nuevoDestino, $nuevaCapacidad);
                //Se muestra un msj según el resultado de las modificaciones:
                $resultado = ($modificacion?"Se modificaron los datos exitosamente. ":"ERROR. Los datos no se pudieron modificar.");
                echo "\n    >>> ".$resultado."\n";
			break;
            case 3:
                echo "\n----- Modificar lista de pasajeros -----\n";
                //Se elige un viaje a modificar:
                do {
                    echo "| ¿Cuál viaje desea modificar?:\n";
                    for ($i=0; $i<count($arrayViajes); $i++) {
                        $unViaje = $arrayViajes[$i];
                        echo $i+1 .") Código del viaje: ".$unViaje->getCodigoViaje()." - Destino: ".$unViaje->getDestino()." - Cant. de pasajeros: ".count($unViaje->getObjArrayPasajeros())."\n";
                    }
                    echo ">>> ";
                    $viajeAModificar = trim(fgets(STDIN));
                    //Se verifica que el usuario ingrese una opción válida:
                    if ($viajeAModificar > count($arrayViajes) || $viajeAModificar < 1) {
                        echo "  >>> ERROR. El número ingresado no se corresponde con ningún viaje.\n";
                    }
                } while($viajeAModificar > count($arrayViajes) || $viajeAModificar < 1);

                $posicionViajeElegido = $viajeAModificar - 1;
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
                    if ($arrayViajes[$posicionViajeElegido]->hayPasajesDisponibles() == true) {
                        do {
                            $nuevoPasajero = datosPasajero();
                            //Se verifica que el pasajero no se repita:
                            $pasajeroRepetido = $arrayViajes[$posicionViajeElegido]->validarDocumento($nuevoPasajero->getDni());
                            if ($pasajeroRepetido == true) {
                                echo "  >>> ERROR. El pasajero ya se encuentra en el viaje.\n";
                            }
                        } while ($pasajeroRepetido == true);

                        $nuevoPasajero = new Pasajero($nuevoPasajero->getNombre(), $nuevoPasajero->getApellido(), $nuevoPasajero->getDni(), $nuevoPasajero->getTelefono());
                        $arrayViajes[$posicionViajeElegido]->venderPasaje($nuevoPasajero);
                        echo "+| Pasajero agregado: \n".$nuevoPasajero;
                    } else {
                        echo "  >>> ERROR. El viaje elegido ya no tiene asientos disponibles.\n";
                    }
                } elseif ($opcionPasajero == 2) {
                    if (count($arrayViajes[$posicionViajeElegido]->getObjArrayPasajeros()) > 0) {
                        //Modificar un pasajero:
                        do {
                            echo "| ¿Cuál pasajero desea modificar?:\n";
                            echo $arrayViajes[$posicionViajeElegido]->mostrarListaPasajeros();
                            $cantPasajerosViaje = count($arrayViajes[$posicionViajeElegido]->getObjArrayPasajeros());
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
                        $modificacion = $arrayViajes[$posicionViajeElegido]->modificarPasajeros($arrayViajes, $pasajeroElegido, $nuevoNombre, $nuevoApellido, $nuevoTelefono);
                        echo "\n>>> Pasajero modificado exitosamente.\n";
                    } else {
                        echo "  >>> ERROR. El viaje elegido no tiene pasajeros.\n";
                    }
                } elseif ($opcionPasajero == 3) {
                    if (count($arrayViajes[$posicionViajeElegido]->getObjArrayPasajeros()) > 0) {
                        //Eliminar un pasajero:
                        do {
                            echo "| ¿Cuál pasajero desea eliminar?:\n";
                            echo $arrayViajes[$posicionViajeElegido]->mostrarListaPasajeros();
                            $cantPasajerosViaje = count($arrayViajes[$posicionViajeElegido]->getObjArrayPasajeros());
                            echo ">>> ";
                            $pasajeroAEliminar = trim(fgets(STDIN));
                            //Se verifica que el usuario ingrese una opción válida:
                            if ($pasajeroAEliminar < 1 || $pasajeroAEliminar > $cantPasajerosViaje) {
                                echo "  >>> ERROR. El número ingresado no se corresponde con ningún pasajero.\n";
                            }
                        } while($pasajeroAEliminar < 1 || $pasajeroAEliminar > $cantPasajerosViaje);

                        $pasajeroElegido = $pasajeroAEliminar - 1;
                        $eliminarPasajero = $arrayViajes[$posicionViajeElegido]->eliminarPasajeros($pasajeroElegido);
                        if ($eliminarPasajero == false) {
                            echo "  >>> ERROR. No se ha podido eliminar el pasajero.\n";
                        } else {
                            echo "  >>> Pasajero eliminado exitosamente.\n";
                        }
                    } else {
                        echo "  >>> ERROR. El viaje elegido no tiene pasajeros.\n";
                    }
                }
            break;
            case 4:
                echo "\n----- Modificar lista de responsables -----\n";
                do {
                    echo "| ¿Cuál responsable desea modificar?:\n";
                    for ($i=0; $i<count($arrayViajes); $i++) {
                        $unViaje = $arrayViajes[$i];
                        $responsableViaje = $unViaje->getObjResponsable();
                        echo $i+1 .") Nombre: ".$responsableViaje->getNombre()." - Apellido: ".$responsableViaje->getApellido()."\n";
                    }
                    echo ">>> ";
                    $responsableAModificar = trim(fgets(STDIN));
                    //Se verifica que el usuario ingrese una opción válida:
                    if ($responsableAModificar > count($arrayViajes) || $responsableAModificar < 1) {
                        echo "  >>> ERROR. El número ingresado no se corresponde con ningún reponsable.\n";
                    }
                } while($responsableAModificar > count($arrayViajes) || $responsableAModificar < 1);

                $posicionResponsable = $responsableAModificar - 1;
				echo "  + Ingrese el nuevo nombre del responsable: ";
				$nuevoNombre = trim(fgets(STDIN));
				echo "  + Ingrese el nuevo apellido del responsable: ";
				$nuevoApellido = trim(fgets(STDIN));
				echo "  + Ingrese el nuevo N° de empleado: ";
				$nroEmpleado = trim(fgets(STDIN));
				echo "  + Ingrese el nuevo N° de licencia: ";
				$nroLicencia = trim(fgets(STDIN));
				$modificacion = $arrayViajes[$posicionResponsable]->modificarDatosResponsable($arrayViajes, $posicionResponsable, $nuevoNombre, $nuevoApellido, $nroEmpleado, $nroLicencia);
				//Se muestra un msj según el resultado de las modificaciones:
				$resultado = ($modificacion?"Se modificaron los datos exitosamente. ":"ERROR. Los datos no se pudieron modificar.");
				echo "\n    >>> ".$resultado."\n";
            break;
            case 5:
                echo "\n----- Ver datos de la empresa -----\n";
                $objEmpresaTransportes->setArrayViajes($arrayViajes);
                $cadena = $objEmpresaTransportes->__toString(); // es igual a: echo $objViaje;
                echo $cadena;
            break;
            case 6:
                echo ">>> Ha salido del programa.";
            break;
        }
    } while($opcion != 6);
?>