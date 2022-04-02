<?php
//REVISAR.
    include "borradorEE.php";
    //Se crea un objeto Viaje
    //$objViaje = new Viaje("000F14", "Bs.As, Capital", 150, 25);
    //Se muestran en pantalla los datos del viaje
    //$cadena = $objViaje->__toString();
    //echo $cadena."\n";

	function main() {
		$objViaje = new Viaje("", "", 0, 0, "", "", 0);
		$opcion = 1;
		$contPasajeros= 0;
		while ($opcion != 0) {
			$opcion = menuDeOpciones();
			if ($opcion == 1) {
				//Se le pide al usuario que ingrese los datos del viaje:
				echo "\n***********************************\n";
				echo "| Ingrese el código del viaje: ";
				$codViaje = trim(fgets(STDIN));
				$objViaje->setCodigoViaje($codViaje);
				echo "| Ingrese el destino: ";
				$destino = trim(fgets(STDIN));
				$objViaje->setDestino($destino);
				echo "| Ingrese la capacidad máxima de pasajeros: ";
				$capMáxima = trim(fgets(STDIN));
				$objViaje->setCapacidadPasajeros($capMáxima);
				echo "| Ingrese la cantidad de pasajeros: ";
				$cantPasajeros = trim(fgets(STDIN));
				$objViaje->setCantidadPasajeros($cantPasajeros);
				//Se muestran en pantalla los datos ingresados:
				$cadena = $objViaje->__toString();
    			echo $cadena."\n";
			} elseif ($opcion == 2) {
				echo "\n***********************************\n";
				//Se modifican el código-destino-capacidad-cantidad del arreglo de Viajes:
                echo "| Ingrese el código del viaje que desea modificar: ";
                $codViaje = trim(fgets(STDIN));
				$validacion = $objViaje->validarCodigo($codViaje);
				if ($validacion == true) {
					echo "  + Ingrese el nuevo código del viaje: ";
					$nuevoCodigo = trim(fgets(STDIN));
					echo "  + Ingrese el nuevo destino del viaje: ";
					$nuevoDestino = trim(fgets(STDIN));
					echo "  + Ingrese la nueva capacidad de pasajeros del viaje: ";
					$nuevaCapacidad = trim(fgets(STDIN));
					echo "  + Ingrese la nueva cantidad de pasajeros del viaje: ";
					$nuevaCantidad = trim(fgets(STDIN));
					$modificacion = $objViaje->modificarDatosViaje($codViaje, $nuevoCodigo, $nuevoDestino, $nuevaCapacidad, $nuevaCantidad);
					//Se muestra un msj según el reultado de las modificaciones:
					$resultado = ($modificacion?"Se modificaron los datos exitosamente. ":"Los datos no se puedieron modificar.");
					echo "\n    >>> ".$resultado."\n";
					$cadena = $objViaje->__toString();
					echo $cadena."\n";
				} else {
					echo "\n  >>> ERROR. El código ingresado no corresponde a ningún viaje.\n";
				}
			} elseif ($opcion == 3) {
				//Se le pide al usuario que ingrese los datos del pasajero:
				echo "\n***********************************\n";
				echo "| Ingrese el nombre del pasajero: ";
				$nombre = trim(fgets(STDIN));
				$objViaje->setNombrePasajero($nombre);
				echo "| Ingrese el apellido del pasajero: ";
				$apellido = trim(fgets(STDIN));
				$objViaje->setApellidoPasajero($apellido);
				echo "| Ingrese el documento del pasajero: ";
				$documento = trim(fgets(STDIN));
				$objViaje->setDocumentoPasajero($documento);
				$objViaje->datosPasajero($contPasajeros);
				$contPasajeros = $contPasajeros + 1;
			} elseif ($opcion == 4) {
				echo "\n***********************************\n";
				//Se modifican el nombre-apellido-dni del arreglo de Pasajeros:
                echo "| Ingrese el documento del pasajero que desea modificar: ";
                $documento = trim(fgets(STDIN));
				$validacion = $objViaje->validarDocumento($documento);
				if ($validacion == true) {
					echo "  + Ingrese el nuevo nombre del pasajero: ";
					$nuevoNombre = trim(fgets(STDIN));
					echo "  + Ingrese el nuevo apellido del pasajero: ";
					$nuevoApellido = trim(fgets(STDIN));
					echo "  + Ingrese el nuevo documento del pasajero: ";
					$nuevoDni = trim(fgets(STDIN));
					$modificacion = $objViaje->modificarDatosPasajero($documento, $nuevoNombre, $nuevoApellido, $nuevoDni);
					//Se muestra un msj según el reultado de las modificaciones:
					$resultado = ($modificacion?"Se modificaron los datos exitosamente. ":"Los datos no se puedieron modificar.");
					echo "\n    >>> ".$resultado."\n";
				} else {
					echo "\n  >>> ERROR. El documento ingresado no corresponde a ningún pasajero.\n";
				}
			} else {
				if ($opcion != 0) {
					echo "	>>> ERROR. Opción incorrecta.\n";
				}
			}
		}
	}

	function menuDeOpciones() {
		echo "\n---------------Menú de opciones---------------";
		echo "\n| Opción 1: Ingresar datos del viaje";
		echo "\n| Opción 2: Modificar datos del viaje";
		echo "\n| Opción 3: Ingresar datos del pasajero";
		echo "\n| Opción 4: Modificar datos del pasajero";
		echo "\n| Precione 0 para finalizar.\n";
		$opcion = trim(fgets(STDIN))."\n";
		return $opcion;
	} main();
?>