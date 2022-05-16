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
		"\n| Opción 2: Agregar pasajeros".
		"\n| Opción 3: Modificar pasajeros".
		"\n| Opción 4: Eliminar pasajeros".
		"\n| Opción 5: Modificar datos del viaje".
		"\n| Opción 6: Modificar datos del responsable".
		"\n| Opción 7: Ver datos de la empresa".
		"\n| Opción 8: Ver datos del pasajero".
		"\n| Opción 9: Salir del programa\n";
		return $menu;
	}

	function viajeTerrestre() {
		//Se piden los datos del viaje:
		echo "\n>>> Por favor, ingrese los datos del viaje terrestre <<<\n";
		echo "| Ingrese el código del viaje: ";
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
		//$objViaje = new Viaje($codViaje, $destino, $capacidadMaxima, $objResponsable);
		$objViajeTerrestre = new ViajesTerrestres($codViaje, $destino, $capacidadMaxima, $objResponsable, $tipoAsiento, $precioTerrestre, $trayectoriaViaje);
		//echo $objViajeTerrestre;
		return $objViajeTerrestre;
	}

	function viajeAereo() {
		//Se piden los datos del viaje:
		echo "\n>>> Por favor, ingrese los datos del viaje aéreo <<<\n";
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
		//$nroVuelo, $categoriaAsiento, $nombreAerolinea, $cantEscalas, $importeAereo, $idaVuelta
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
		//$objViaje = new Viaje($codViaje, $destino, $capacidadMaxima, $objResponsable);
		$objViajeAereo = new ViajesAereos($codViaje, $destino, $capacidadMaxima, $objResponsable, $nroVuelo, $categoriaAsiento, $nombreAerolinea, $cantEscalas, $precioAereo, $trayectoriaViaje);
		//echo $objViajeAereo;
		return $objViajeAereo;
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

	function buscarViaje($arrayViajes, $codigoViaje) {
		$cantViajes = count($arrayViajes);
		$codigoEncontrado = true;
		$viajeEncontrado = null;
		$i = 0;
		while ($viajeEncontrado && $i<$cantViajes) {
			if ($arrayViajes[$i]->getCodigoViaje() == $codigoViaje) {
				$codigoEncontrado = false;
				$viajeEncontrado = $arrayViajes[$i];
			}
			$i++;
		}
		return $viajeEncontrado;
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
					$viajeTerrestre = viajeTerrestre();
					//array_push($arrayViajes, $viajeTerrestre);
					$objEmpresaTransportes->agregarViaje($viajeTerrestre);
					echo $viajeTerrestre."\n";
					echo ">>> Se gregó el viaje terrestre con éxito.\n";
				} elseif ($opcionViaje == 2) {
					$viajeAereo = viajeAereo();
					//array_push($arrayViajes, $viajeAereo);
					$objEmpresaTransportes->agregarViaje($viajeAereo);
					echo $viajeAereo."\n";
					echo ">>> Se gregó el viaje aéreo con éxito.\n";
				}
				break;
			case 2:
				echo  "\n--------- Cargar pasajero ---------\n";
					$pasajero = datosPasajero();
					//$agregarPasajero = $objViaje->agregarPasajeros($pasajero);
					$agregarPasajero = $objEmpresaTransportes->venderPasaje($pasajero);
					/*if ($agregarPasajero = true) {
						echo "\n>>> Se agregó el pasajero con éxito.\n";
					} else {
						echo "\n>>> ERROR. El pasajero ya se encuentra en el viaje.\n";
					}*/
					if ($agregarPasajero != 0) {
						echo "\n>>> Se agregó el pasajero con éxito.\n".
							"	--> Importe del viaje: $".$agregarPasajero."\n";
					} else {
						echo "\n>>> ERROR. No se pudo vender un pasaje al pasajero.\n"; //REVISAR: no se debe repetir el documento
					}
				break;
			case 3:
				echo "----- Modificar pasajero -----\n";
				echo "| Ingrese el número de documento del pasajero a modificar: ";
				$dniPasajero = trim(fgets(STDIN));
				$validacion = $objViaje->validarDocumento($dniPasajero);
				if ($validacion == true) {
					echo "\n	+ Ingrese el nuevo nombre del pasajero: ";
					$nuevoNombre = trim(fgets(STDIN));
					echo "	+ Ingrese el nuevo apellido del pasajero: ";
					$nuevoApellido = trim(fgets(STDIN));
					echo "	+ Ingrese el nuevo número de telefono del pasajero: ";
					$nuevoTelefono = trim(fgets(STDIN));
					$modificacion = $objViaje->modificarPasajeros($dniPasajero, $nuevoNombre, $nuevoApellido, $nuevoTelefono);
					echo "\n>>> Pasajero modificado exitosamente.\n";
				} else {
					echo "\n>>> ERROR. El documento ingresado no se corresponde con ningún pasajero.\n";
				}
				break;
			case 4:
				echo "----- Eliminar pasajero -----\n" ;
				echo "| Ingrese el número de documento del pasajero que desea eliminar: ";
				$documentoPasajero = trim(fgets(STDIN));
				$eliminar = $objViaje->eliminarPasajeros($documentoPasajero);
				if ($eliminar == false) {
					echo "\n>>> ERROR. El documento ingresado no se corresponde con ningún pasajero.\n";
				} else {
					echo "\n>>> Pasajero eliminado exitosamente.\n";
				}
				break;
			case 5:
				echo "----- Modificar viaje -----\n";
				echo "| Viajes de la empresa: ".$objEmpresaTransportes->mostrarViajes();
				echo "|+ Ingrese el código del viaje a modificar: ";
				$codigoViajeAModificar = trim(fgets(STDIN));
				$encontrarViaje = buscarViaje($arrayViajes, $codigoViajeAModificar);
				if ($encontrarViaje == null) {
					echo "	>>> ERROR. El código ingresado no se corresponde con ningún viaje almacenado.";
				} else {
					$posicionViajeEncontrado = $encontrarViaje;
					echo "  + Ingrese el nuevo código del viaje: ";
					$nuevoCodigo = trim(fgets(STDIN));
					echo "  + Ingrese el nuevo destino del viaje: ";
					$nuevoDestino = trim(fgets(STDIN));
					echo "  + Ingrese la nueva capacidad máxima de pasajeros del viaje: ";
					$nuevaCapacidad = trim(fgets(STDIN));
					$modificacion = $objViaje->modificarDatosViaje($posicionViajeEncontrado, $nuevoCodigo, $nuevoDestino, $nuevaCapacidad);
					//Se muestra un msj según el resultado de las modificaciones:
					$resultado = ($modificacion?"Se modificaron los datos exitosamente. ":"Los datos no se pudieron modificar.");
					echo "\n    >>> ".$resultado."\n";
				}
				break;
			case 6:
				echo "----- Modificar responsable -----\n";
				echo "  + Ingrese el nuevo nombre del responsable: ";
				$nuevoNombre = trim(fgets(STDIN));
				echo "  + Ingrese el nuevo apellido del responsable: ";
				$nuevoApellido = trim(fgets(STDIN));
				echo "  + Ingrese el nuevo N° de empleado: ";
				$nroEmpleado = trim(fgets(STDIN));
				echo "  + Ingrese el nuevo N° de licencia: ";
				$nroLicencia = trim(fgets(STDIN));
				$modificacion = $objViaje->modificarDatosResponsable($nuevoNombre, $nuevoApellido, $nroEmpleado, $nroLicencia);
				//Se muestra un msj según el resultado de las modificaciones:
				$resultado = ($modificacion?"Se modificaron los datos exitosamente. ":"Los datos no se pudieron modificar.");
				echo "\n    >>> ".$resultado."\n";
				break;
			case 7:
				echo "----- Ver datos de la empresa -----\n";
				$cadena = $objEmpresaTransportes->__toString(); // es igual a: echo $objViaje;
				echo $cadena;
				break;
			case 8:
				echo "----- Mostrar pasajero -----\n";
				echo "| Ingrese el número de documento del pasajero que desea ver: ";
				$documentoPasajero = trim(fgets(STDIN));
				$validacion = $objViaje->validarDocumento($documentoPasajero);
				if ($validacion == false) {
					echo "\n>>> ERROR. El documento ingresado no se corresponde con ningún pasajero.\n";
				} else {
					$datosPasajero = $objViaje->mostrarPasajeros($documentoPasajero);
					echo $datosPasajero;
				}
				break;
			case 9:
				echo ">>> Ha salido del programa.";
				break;
			}
	} while($opcion != 9);

	/*
	$cantViajes = count($arrayViajes);
				do {
					echo "+| Seleccione el viaje (1-$cantViajes): ";
					$nroViaje = trim(fgets(STDIN));
					$nroValidado = $nroViaje - 1;
					if ($nroValidado > $cantViajes || $nroValidado < 0) {
						echo "	>>> ERROR. Ingrese una opción válida (1-$cantViajes).\n";
					}
				} while($nroViaje > $cantViajes || $nroViaje < 0);
				
				if ($objViaje->hayPasajesDisponibles() == true) { 
					$pasajero = datosPasajero();
					$agregarPasajero = $objViaje->agregarPasajeros($pasajero);
					if ($agregarPasajero == true) {
						echo "\n>>> Se agregó el pasajero con éxito.\n";
					} else {
						echo "\n>>> ERROR. El pasajero ya se encuentra en el viaje.\n";
					}
				} else {
					echo "\n>>> No quedan asientos disponibles en el viaje.\n";
				}
	 */
?>