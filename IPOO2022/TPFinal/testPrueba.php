<?php
    include "BaseDatos.php";
    include "Viaje.php";
	include "ResponsableV.php";
	include "Pasajero.php";
    include "Empresa.php";

	function menuDeOpciones() {
		$menu = "\n---------------Menú de opciones---------------".
		"\n| Opción 1: Agregar pasajeros".
		"\n| Opción 2: Modificar pasajeros".
		"\n| Opción 3: Eliminar pasajeros".
		"\n| Opción 4: Modificar datos del viaje".
		"\n| Opción 5: Modificar datos del responsable".
		"\n| Opción 6: Ver datos del viaje".
		"\n| Opción 7: Ver datos del pasajero".
		"\n| Opción 8: Salir del programa\n";
		return $menu;
	}

	/**
	 * Parámetros del viaje: cargar($codigoViaje, $destino, $capacidadPasajeros, $idEmpresa, $objResponsable, $importe, $tipoAsiento, $idayvuelta)
	 */

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