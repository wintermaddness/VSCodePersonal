<?php
    include "Viaje.php";
	include "ResponsableV.php";
	include "Pasajero.php";

	function menuDeOpciones() {
		$menu = "\n---------------Menú de opciones---------------".
		"\n| Opción 1: Agregar pasajeros".
		"\n| Opción 2: Modificar pasajeros".
		"\n| Opción 3: Eliminar pasajeros".
		"\n| Opción 4: Modificar datos del viaje".
		"\n| Opción 5: Ver datos del viaje".
		"\n| Opción 6: Ver datos del pasajero".
		"\n| Opción 7: Salir del programa\n";
		return $menu;
	}

	//Se piden los datos del viaje inicial:
	echo ">>> Por favor, ingrese los datos del viaje <<<\n";
	echo "| Ingrese el código de viaje: ";
	$codViaje = trim(fgets(STDIN));
	echo "| Ingrese el destino: ";
	$destino = trim(fgets(STDIN));
	echo "| Ingrese la capacidad máxima de pasajeros: ";
	$capacidadMaxima = trim(fgets(STDIN));
	$arrayPasajeros = [];
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

	//Se crean los objetos:
	$objResponsable = new ResponsableV($nombreResponsable, $apellidoResponsable, $nroEmpleado, $nroLicencia);
	$objViaje = new Viaje($codViaje, $destino, $capacidadMaxima, $arrayPasajeros, $objResponsable);
	echo $objViaje;

	//Se inicializa el menú de opciones:
	do {
		$menu = menuDeOpciones();
		echo $menu;
		$opcion = trim(fgets(STDIN));
		switch ($opcion) {
			case 1:
				echo  "\n--------- Cargar pasajero ---------\n" ;
				echo  "| Ingrese los datos de un pasajero: ";
				/*$limitePasajeros = trim(fgets(STDIN));
				for ($i=0; $i<$limitePasajeros; $i++) {
					echo "\n	+ Ingrese el nombre del pasajero: ";
					$arregloPasajeros[$i]["nombre"] = trim(fgets(STDIN));
					echo "	+ Ingrese el apellido del pasajero: ";
					$arregloPasajeros[$i]["apellido"] = trim(fgets(STDIN));
					echo "	+ Ingrese el número de documento del pasajero: ";
					$arregloPasajeros[$i]["dni"] = trim(fgets(STDIN));
					echo "	+ Ingrese el número de teléfono del pasajero: ";
					$arregloPasajeros[$i]["telefono"] = trim(fgets(STDIN));
				}*/
					echo "\n	+ Ingrese el nombre del pasajero: ";
					$nombre = trim(fgets(STDIN));
					echo "	+ Ingrese el apellido del pasajero: ";
					$apellido = trim(fgets(STDIN));
					echo "	+ Ingrese el número de documento del pasajero: ";
					$dni = trim(fgets(STDIN));
					echo "	+ Ingrese el número de teléfono del pasajero: ";
					$telefono = trim(fgets(STDIN));
					$objPasajero = new Pasajero($nombre, $apellido, $dni, $telefono);
					$agregarPasajero = $objViaje->agregarPasajeros($objPasajero);
					if ($agregarPasajero == false) {
						echo "\n>>> ERROR. El pasajero ya se encuentra en el viaje.\n";
					} else {
						echo "\n>>> Se agregó el pasajero con éxito.\n";
					}
				break;
			case 2:
				echo "----- Modificar pasajero -----\n";
				echo "| Ingrese el número del pasajero a modificar: ";
				$indPasajero = trim(fgets(STDIN));
				echo "\n	+ Ingrese el nuevo nombre del pasajero: ";
				$nuevoNombre = trim(fgets(STDIN));
				echo "	+ Ingrese el nuevo apellido del pasajero: ";
				$nuevoApellido = trim(fgets(STDIN));
				echo "	+ Ingrese el nuevo número de telefono del pasajero: ";
				$nuevoTelefono = trim(fgets(STDIN));
				$objViaje->modificarPasajeros($indPasajero, $nuevoNombre, $nuevoApellido, $nuevoTelefono);
				echo "\n>>> Pasajero modificado exitosamente.\n";
				break;
			case 3:
				echo "----- Eliminar pasajero -----\n" ;
				echo "| Ingrese el número del pasajero que desea eliminar: ";
				$eliminarPasajero = trim(fgets(STDIN));
				$objViaje->eliminarPasajeros($eliminarPasajero);
				echo "\n>>> Pasajero eliminado exitosamente.\n";
				break;
			case 4:
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
			case 5:
				echo "----- Ver datos del viaje -----";
				$cadena = $objViaje->__toString();
				echo $cadena;
				break;
			case 6:
				echo "----- Mostrar pasajero -----\n" ;
				echo "| Ingrese el número del pasajero que desea ver: ";
				$verPasajero = trim(fgets(STDIN));
				$datos = $objViaje->mostrarPasajeros($verPasajero);
				echo $datos;
				break;
			case 7:
				echo "\n>>> Ha salido del programa.";
				break;
			}
	} while($opcion != 7);
?>