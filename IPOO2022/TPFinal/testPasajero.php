<?php
include_once "BaseDatos.php";
include_once 'Pasajero.php';
//echo 'Versión actual de PHP: ' . phpversion();

	//Creo un objPasajero:
	$objPasajero =  new Pasajero();
	
	//Busco todos los pasajeros almacenados en la BD:
	$colPasajeros = $objPasajero->listar();
	foreach ($colPasajeros as $unPasajero) {
		echo $unPasajero;
		echo "-------------------------------------------------------";
	}
	
	$objPasajero->cargar(27091730, "Pepe", "Suarez", "123456789");
	$respuesta = $objPasajero->insertar();
	//Inserto el OBj Pasajero en la base de datos:
	if ($respuesta == true) {
		echo "\nOP INSERCIÓN: El pasajero fue ingresado en la BD:";
		$colPasajeros =$objPasajero->listar("");
		foreach ($colPasajeros as $unPasajero) {
			echo $unPasajero;
			echo "-------------------------------------------------------";
		}
	} else  {
		echo $objPasajero->getmensajeoperacion();
	}
	
	//Modifico al pasajero:
	$objPasajero->setNombre("Nombre Modificado");
	$respuesta = $objPasajero->modificar();
	if ($respuesta == true) {
		//Busco todas las personas almacenadas en la BD y veo la modificacion realizada
		$colPasajeros = $objPasajero->listar();
		echo " \nOP MODIFICACIÓN: Los datos fueron actualizados correctamente:";
		foreach ($colPasajeros as $unPasajero) {
			echo $unPasajero;
			echo "-------------------------------------------------------";
		}	
	} else  {
		echo $objPasajero->getmensajeoperacion();
	}

	//Elimino al pasajero:
	$respuesta = $objPasajero->eliminar();
	if ($respuesta == true) {
		//Busco todas las personas almacenadas en la BD y veo la modificacion realizada
		echo " \nOP ELIMINACION: Los datos fueron eliminados correctamente";
		$colPasajeros = $objPasajero->listar();
		foreach ($colPasajeros as $unPasajero) {
			echo $unPasajero;
			echo "-------------------------------------------------------";
		}
	} else  {
		echo $objPasajero->getmensajeoperacion();
	}
?>