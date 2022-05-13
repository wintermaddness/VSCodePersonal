<?php
	include "Pasajero.php";
    include "ResponsableV.php";
	include "Viaje.php";
	include "ViajesTerrestres.php";
	include "ViajesAereos.php";
	include "EmpresaTransporte.php";

	function menuDeOpciones() {
		$menu = "\n---------------Menú de opciones---------------".
		"\n| Opción 1: Agregar un viaje".
		"\n| Opción 2: Agregar pasajeros".
		"\n| Opción 3: Modificar pasajeros".
		"\n| Opción 4: Eliminar pasajeros".
		"\n| Opción 5: Modificar datos del viaje".
		"\n| Opción 6: Modificar datos del responsable".
		"\n| Opción 7: Ver datos del viaje".
		"\n| Opción 8: Ver datos del pasajero".
		"\n| Opción 9: Salir del programa\n";
		return $menu;
	}

	function viajeTerrestre() {
		//Se piden los datos del viaje:
		echo ">>> Por favor, ingrese los datos del viaje terrestre <<<\n";
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
		echo "| Seleccione el tipo de asiento (Semicama-Cama): ";
		$tipoAsiento = trim(fgets(STDIN));
		echo "| Ingrese el precio: ";
		$precioTerrestre = trim(fgets(STDIN));
		echo "| Seleccione la trayectoria:\n";
		echo "	1. Ida\n";
		echo "	2. Vuelta\n";
		echo "	3. Ida y Vuelta\n";
		echo ">>> ".$trayectoriaViaje = trim(fgets(STDIN));
		//Se crean los objetos:
		$objResponsable = new ResponsableV($nombreResponsable, $apellidoResponsable, $nroEmpleado, $nroLicencia);
		//$objViaje = new Viaje($codViaje, $destino, $capacidadMaxima, $objResponsable);
		$objViajeTerrestre = new ViajesTerrestres($codViaje, $destino, $capacidadMaxima, $objResponsable, $tipoAsiento, $precioTerrestre, $trayectoriaViaje);
		//echo $objViajeTerrestre;
		return $objViajeTerrestre;
	}

	function viajeAereo() {
		//Se piden los datos del viaje:
		echo ">>> Por favor, ingrese los datos del viaje terrestre <<<\n";
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
		echo "| Seleccione la categoría de asiento (Común-Primera clase): ";
		$categoriaAsiento = trim(fgets(STDIN));
		echo "| Ingrese el nombre de la aerolínea: ";
		$nombreAerolinea = trim(fgets(STDIN));
		echo "| Ingrese la cantidad de escalas: ";
		$cantEscalas = trim(fgets(STDIN));
		echo "| Ingrese el precio: ";
		$precioAereo = trim(fgets(STDIN));
		echo "| Seleccione la trayectoria:\n";
		echo "1. Ida\n";
		echo "2. Vuelta\n";
		echo "3. Ida y Vuelta\n";
		echo ">>> ".$trayectoriaViaje = trim(fgets(STDIN));
		$trayectoriaViaje = trim(fgets(STDIN));
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

	//Se crean los objetos principales:
	$arrayViajes = [];
	$objEmpresaTransportes = new EmpresaTransporte("Shatterdome", $arrayViajes);

	//Se inicializa el menú de opciones:
	do {
		$menu = menuDeOpciones();
		echo $menu;
		$opcion = trim(fgets(STDIN));
		switch ($opcion) {
			case 1:
				echo  "\n--------- Agregar un viaje ---------\n";
				echo "| Seleccione el tipo de viaje (1 ó 2): \n";
				echo "Opción 1: TERRESTRE\n";
				echo "Opción 2: AÉREO\n";
				echo ">>> ".$opcionViaje = trim(fgets(STDIN));
				if ($opcionViaje == 1) {
					$viajeTerrestre = viajeTerrestre();
					array_push($arrayViajes, $viajeTerrestre);
				} elseif ($opcionViaje == 2) {
					$viajeAereo = viajeAereo();
					array_push($arrayViajes, $viajeAereo);
				}
				break;
			case 2:
				echo  "\n--------- Cargar pasajero ---------\n";
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
				echo "  + Ingrese el nuevo código del viaje: ";
				$nuevoCodigo = trim(fgets(STDIN));
				echo "  + Ingrese el nuevo destino del viaje: ";
				$nuevoDestino = trim(fgets(STDIN));
				echo "  + Ingrese la nueva capacidad máxima de pasajeros del viaje: ";
				$nuevaCapacidad = trim(fgets(STDIN));
				$modificacion = $objViaje->modificarDatosViaje($nuevoCodigo, $nuevoDestino, $nuevaCapacidad);
				//Se muestra un msj según el resultado de las modificaciones:
				$resultado = ($modificacion?"Se modificaron los datos exitosamente. ":"Los datos no se pudieron modificar.");
				echo "\n    >>> ".$resultado."\n";
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
				echo "----- Ver datos del viaje -----\n";
				$cadena = $objViaje->__toString(); // es igual a: echo $objViaje;
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
?>