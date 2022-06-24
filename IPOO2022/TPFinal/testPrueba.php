<?php
    include "BaseDatos.php";
    include "Viaje.php";
	include "ResponsableV.php";
	include "Pasajero.php";
    include "Empresa.php";

	//$objEmpresaTransportes->cargar(1, "Shatterdome", "Tsing Yi, Hong Kong");

	/*
	\n1. Agregar viaje
	\n2. Modificar viaje
	\n3. Eliminar viaje
	\n4. Mostrar viajes
	\n5. Agregar empresa
	\n6. Modificar empresa
	\n7. Eliminar empresa
	\n8. Mostrar empresas\n";*/

	//------------------------------------------------------
	//Se crean los objIniciales de cada clase:
	$viaje = new Viaje();
	$responsable = new ResponsableV();
	$pasajero = new Pasajero();
	$empresa = new Empresa();
	$coleccionPasajeros = [];

	/**
	 * Método 1: menuDeOpciones - 
	 * Retorna una cadena de strings con las opciones del menú.
	 * @return string
	 */
	function menuDeOpciones() {
		$menu = "\n---------------Menú de opciones---------------".
		"\n1) Crear viaje".
		"\n2) Modificar datos del viaje".
		"\n3) Eliminar viaje".
		"\n4) Mostrar datos del viaje".
		"\n5) Agregar empresa".
		"\n6) Modificar datos de la empresa".
		"\n7) Eliminar empresa".
		"\n8) Mostrar datos de la empresa".
		"\n9) Salir del programa";
		return $menu;
	}

	/**
	 * Método 2: mostrar - 
	 * Dado un arreglo, la función devuelve una cadena
	 * con los datos cada uno de sus elementos.
	 * @param array $arreglo
	 * @return string
	*/
	function mostrar($arreglo) {
		$cadena = "";
		foreach ($arreglo as $elemento) {
			$cadena .= $elemento."\n";
		}
		return $cadena;
	}

	
	//------------------------------------------------------
	
	/**
	 * Opción 6: ver datos del viaje - 
	 * Lista la información de todos los viajes.
	 */
	function mostrarDatosViaje() {
		$viaje = new Viaje();
		echo $viaje->listar();
	}

	/**
	 * Parámetros del viaje: cargar($codigoViaje, $destino, $capacidadPasajeros, $idEmpresa, $objResponsable, $importe, $tipoAsiento, $idayvuelta)
	 */

	do {
		$menu = menuDeOpciones();
		echo $menu."\n";
		echo ">> ";
		$opcion = trim(fgets(STDIN));
		switch ($opcion) {
			case 1:
				echo "\n--------- Crear un viaje ---------\n";
				//Se piden los datos del viaje:
				echo "\n>>> Por favor, ingrese los datos del viaje <<<\n";
				echo "| Ingrese el destino: ";
				$destino = trim(fgets(STDIN));
				$viaje->setDestino($destino);

				echo "| Ingrese la capacidad máxima de pasajeros: ";
				$capacidadMaxima = trim(fgets(STDIN));
				$viaje->setCapacidadPasajeros($capacidadMaxima);

				//Se piden los datos de la empresa de transporte:
				//Se verifica que hayan empresas creadas:
				$cantEmpresas = count($empresa->listar());
				if ($cantEmpresas == 0) {
					echo "	\n>>> ERROR. Aún no se han agregado empresas.\n";
					echo ">>> Ingrese los datos de la empresa <<\n";
					echo "| Ingrese el nombre de la empresa: ";
					$nombreEmpresa = trim(fgets(STDIN));
					echo "| Ingrese la dirección de la empresa: ";
					$direccionEmpresa = trim(fgets(STDIN));
					//Se setean los datos ingresados:
					$empresa->setEnombre($nombreEmpresa);
					$empresa->setEdireccion($direccionEmpresa);
					$insercionEmpresa = $empresa->insertar();
					if ($insercionEmpresa) {
						$viaje->setIdEmpresa($empresa->getIdEmpresa());
						echo "	>>> Empresa agregada con éxito.\n";
					} else {
						echo $empresa->getMensajeOperacion();
					}
				} else {
					//Se listan en pantalla todas los viajes almacenados:
					echo "\n".mostrar($empresa->listar());
					do {
						echo "| Seleccione una empresa: ";
						$nroEmpresa = trim(fgets(STDIN));
						$empresaEncontrada = $empresa->buscar($nroEmpresa);
						if ($empresaEncontrada == false) {
							echo "	>>> ERROR. El número de empresa seleccionado es incorrecto.\n";
						} else {
							$viaje->setIdEmpresa($empresa->getIdEmpresa());
							echo "	>>> Empresa agregada con éxito.\n";
						}
					} while($empresaEncontrada != true);
				}

				//Se piden los datos del responsable del viaje:
				echo ">>> Ingrese los datos del responsable del viaje <<\n";
				echo "| Ingrese el nombre: ";
				$nombreResponsable = trim(fgets(STDIN));
				echo "| Ingrese el apellido: ";
				$apellidoResponsable = trim(fgets(STDIN));
				echo "| Ingrese el N° de licencia: ";
				$nroLicencia = trim(fgets(STDIN));
				//Se setean los datos del Responsable:
				$responsable->setNombre($nombreResponsable);
				$responsable->setApellido($apellidoResponsable);
				$responsable->setNroLicencia($nroLicencia);
				$insercionResponsable = $responsable->insertar();
				if ($insercionResponsable) {
					echo "	>>> Responsable agregado con éxito.\n";
					$viaje->setObjResponsable($responsable->getNroEmpleado());
				} else {
					echo $responsable->getMensajeOperacion();
				}

				//Se pide el precio del viaje:
				echo "| Ingrese el precio: ";
				$precio = trim(fgets(STDIN));
				$viaje->setImporte($precio);
				
				//Parámetros del viaje:
				//$codViaje, $destino, $capacidadMaxima, $idEmpresa,
				//$objResponsable, $precio, $tipoAsiento, $trayectoriaViaje

				//Se especifican las características del viaje:
					do {
						echo "| Seleccione el tipo de viaje (1 ó 2):\n";
						echo "1. Primera Clase\n";
						echo "2. Común\n";
						echo ">> ";
						$tipoViaje = trim(fgets(STDIN));
						if ($tipoViaje > 2 || $tipoViaje < 1) {
							echo "	>>> ERROR. Ingrese una opción válida (1 ó 2).\n";
						} else {
							$tipoViajeCorrecto = true;
						}
					} while($tipoViaje > 2 || $tipoViaje < 1);
					do {
						echo "| Seleccione el tipo de asiento (1 ó 2):\n";
						echo "1. Cama\n";
						echo "2. Semi-Cama\n";
						echo ">> ";
						$tipoAsiento = trim(fgets(STDIN));
						if ($tipoAsiento > 2 || $tipoAsiento < 1) {
							echo "	>>> ERROR. Ingrese una opción válida (1 ó 2).\n";
						} else {
							$tipoAsientoCorrecto = true;
						}
					} while($tipoAsiento > 2 || $tipoAsiento < 1);

				if ($tipoViaje == 1) {
					$tipoViajeString = "Primera Clase";
				} elseif ($tipoViaje == 2) {
					$tipoViajeString = "Común";
				}
				if ($tipoAsiento == 1) {
					$tipoAsientoString = "Cama";
				} elseif ($tipoAsiento == 2) {
					$tipoAsientoString = "Semi-Cama";
				}
				$viaje->setTipoAsiento($tipoViajeString.", ".$tipoAsientoString);

				//Se especifica la trayectoria del viaje:
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
				if ($trayectoriaViaje == 1) {
					$trayecto = "Ida";
				} elseif ($trayectoriaViaje == 2) {
					$trayecto = "Vuelta";
				} elseif ($trayectoriaViaje == 3) {
					$trayecto = "Ida y Vuelta";
				}
				$viaje->setIdayvuelta($trayecto);

				//Se ingresan pasajeros al viaje:
				do {
					echo "| Ingrese la cantidad de pasajeros a agregar: ";
					$cantPasajerosIngresados = trim(fgets(STDIN));
					//Se verifica que la cant. de pasajeros ingresada no supere la capacidad del viaje o sea negativa:
					if ($cantPasajerosIngresados > $capacidadMaxima) {
						echo "  >>> ERROR. La cantidad de pasajeros supera la capacidad máxima del viaje.\n";
					} elseif ($cantPasajerosIngresados < 0) {
						echo "  >>> ERROR. La cantidad de pasajeros agregados no puede ser negativa.\n";
					} elseif ($cantPasajerosIngresados == 0) {
						echo "	>>> ERROR. La cantidad de pasajeros agregados no puede ser igual a cero (0).\n";
					}
				} while($cantPasajerosIngresados > $capacidadMaxima || $cantPasajerosIngresados < 0 || $cantPasajerosIngresados == 0);
				//Se toman los datos de los pasajeros, verificando que no se repitan:
				for ($i=0; $i<$cantPasajerosIngresados; $i++) {
					echo  ">>> Ingrese los datos de un pasajero <<<";
					echo "\n+ Ingrese el número de documento del pasajero: ";
					$dni = trim(fgets(STDIN));
					$pasajeroRepetido = $pasajero->buscar($dni);
					if ($pasajeroRepetido == true) {
						echo "  >>> El pasajero ingresado ya se encuentra en el viaje.\n";
						$i = $i - 1;
					} else {
						echo "+ Ingrese el nombre del pasajero: ";
						$nombre = trim(fgets(STDIN));
						echo "+ Ingrese el apellido del pasajero: ";
						$apellido = trim(fgets(STDIN));
						echo "+ Ingrese el número de teléfono del pasajero: ";
						$telefono = trim(fgets(STDIN));
						//Se obtiene el último ID asignado a un viaje:
						$ultimoIdAsignado = $viaje->obtenerUltimoId();
						$nuevoPasajero = new Pasajero();
						$nuevoPasajero->cargar($dni, $nombre, $apellido, $telefono, $ultimoIdAsignado);
						array_push($coleccionPasajeros, $nuevoPasajero);
						//$respuesta = $objPasajero->insertar();
						echo "+| Pasajero agregado: \n".$nuevoPasajero;

						//Se inserta el viaje y los pasajeros en la BD:
						//$insercionViaje = $viaje->insertar();
						//$resultado = ($insercionViaje?"Se agregó el viaje con éxito.":"ERROR. El viaje no se pudo agregar.");
						echo $viaje->Insertar()?"":$viaje->getMensajeOperacion();
						foreach ($coleccionPasajeros as $unPasajero) {
							if ($unPasajero->insertar()) {
								echo "	\n>>> Pasajero agregado con éxito\n";
							} else {
								echo $unPasajero->getmensajeoperacion();
							}
						}
					}
				}
				echo "	\n>>> Viaje agregado con éxito.\n";
			break;
			case 2:
				echo "\n----- Modificar el viaje -----\n";
				//Se verifica que hayan viajes creados:
				$cantViajes = count($viaje->listar());
				if ($cantViajes == 0) {
					echo "	\n>>> ERROR. Aún no se han creado viajes.\n";
				} else {
					//Se listan en pantalla todas los viajes almacenados:
					echo "\n".mostrar($viaje->listar());
					do {
						echo "| Seleccione un viaje: ";
						$nroViaje = trim(fgets(STDIN));
						$viajeEncontrado = $viaje->buscar($nroViaje);
						if ($viajeEncontrado == false) {
							echo "	\n>>> ERROR. El número de viaje seleccionado es incorrecto.\n";
						}
					} while($viajeEncontrado != true);
				}

				echo "  + Ingrese el nuevo código del viaje: ";
                $nuevoCodigo = trim(fgets(STDIN));
                echo "  + Ingrese el nuevo destino del viaje: ";
                $nuevoDestino = trim(fgets(STDIN));
                echo "  + Ingrese la nueva capacidad máxima de pasajeros del viaje: ";
                $nuevaCapacidad = trim(fgets(STDIN));
				$modificacion = $objViaje->modificar($nuevoCodigo, $nuevoDestino, $nuevaCapacidad);
                //Se muestra un msj según el resultado de las modificaciones:
                $resultado = ($modificacion?"Se modificaron los datos exitosamente. ":"ERROR. Los datos no se pudieron modificar.");
                echo "	\n>>> ".$resultado."\n";
			break;
			case 3:
				echo "\n----- Eliminar viaje -----\n";
				//Se verifica que hayan viajes creados:
				$cantViajes = count($viaje->listar());
				if ($cantViajes == 0) {
					echo "	\n>>> ERROR. Aún no se han creado viajes.\n";
				} else {
					//Se listan en pantalla todas los viajes almacenados:
					echo "\n".mostrar($viaje->listar());
					do {
						echo "| Seleccione un viaje: ";
						$nroViaje = trim(fgets(STDIN));
						$viajeEncontrado = $viaje->buscar($nroViaje);
						if ($viajeEncontrado == false) {
							echo "	\n>>> ERROR. El número de viaje seleccionado es incorrecto.\n";
						}
					} while($viajeEncontrado != true);
					//Si el arreglo de pasajeros no está vacío, se elimina c/u de los pasajeros del viaje elegido:
					if ($viaje->getobjArrayPasajeros() != []) {
						$arrayPasajerosViaje = $viaje->getobjArrayPasajeros();
						foreach ($arrayPasajerosViaje as $unPasajero) {
							$unPasajero->eliminar();
						}
					}
					//Finalmente, se elimina el viaje:
					$viaje->eliminar();
					echo "	\n>>> Viaje eliminado exitosamente.\n";
				}
			break;
			case 4:
				echo "\n----- Mostrar datos del viaje -----\n";
				//Se verifica que hayan viajes creados:
				$cantViajes = count($viaje->listar());
				if ($cantViajes == 0) {
					echo "	\n>>> ERROR. Aún no se han creado viajes.\n";
				} else {
					//Se listan en pantalla todas los viajes almacenados:
					echo "\n".mostrar($viaje->listar());
					do {
						echo "| Seleccione un viaje: ";
						$nroViaje = trim(fgets(STDIN));
						$viajeEncontrado = $viaje->buscar($nroViaje);
						if ($viajeEncontrado == false) {
							echo "	\n>>> ERROR. El número de viaje seleccionado es incorrecto.\n";
						}
					} while($viajeEncontrado != true);
					$cadena = $viaje->__toString(); // es igual a: echo $viaje;
					echo $cadena;
				}
			break;
			case 5:
				echo "\n----- Agregar empresa -----\n";
				//Se piden los datos de la empresa:
				echo "\n>>> Por favor, ingrese los datos de la Empresa <<<\n";
				echo "| Ingrese el nombre de la empresa: ";
				$nombreEmpresa = trim(fgets(STDIN));
				echo "| Ingrese la dirección de la empresa: ";
				$direccionEmpresa = trim(fgets(STDIN));
				//Se setean los datos ingresados:
				$empresa->setEnombre($nombreEmpresa);
				$empresa->setEdireccion($direccionEmpresa);
				$insercionEmpresa = $empresa->insertar();
				if ($insercionEmpresa) {
					echo "	\n>>> Empresa agregada con éxito.\n";
				} else {
					echo $empresa->getMensajeOperacion();
				}
			break;
			case 6:
				echo "\n----- Modificar datos de la empresa -----\n";
				//Se verifica que hayan empresas agregadas:
				$cantEmpresas = count($empresa->listar());
				if ($cantEmpresas == 0) {
					echo "	\n>>> ERROR. Aún no se han agregado empresas.\n";
				} else {
					//Se listan en pantalla todas las empresas almacenadas:
					echo mostrar($empresa->listar());
					do {
						echo "| Seleccione una empresa: ";
						$nroEmpresa = trim(fgets(STDIN));
						$empresaEncontrada = $empresa->buscar($nroEmpresa);
						if ($empresaEncontrada == false) {
							echo "	\n>>> ERROR. El número de empresa seleccionado es incorrecto.\n";
						}
					} while($empresaEncontrada != true);
					//Se piden los nuevos datos de la empresa:
					echo "| Ingrese el nuevo nombre de la empresa: ";
					$nuevoNombreEmpresa = trim(fgets(STDIN));
					echo "| Ingrese la nueva dirección de la empresa: ";
					$nuevaDireccionEmpresa = trim(fgets(STDIN));
					//Se setean los nuevos datos de la empresa:
					$empresa->setEnombre($nuevoNombreEmpresa);
					$empresa->setEdireccion($nuevaDireccionEmpresa);
					$modificacionEmpresa = $empresa->modificar();
					if ($modificacionEmpresa) {
						echo "	\n>>> Empresa modificada con éxito.\n";
					} else {
						echo $empresa->getMensajeOperacion();
					}
				}
			break;
			case 7:
				echo "\n----- Eliminar empresa -----\n" ;
				//Se verifica que hayan empresas agregadas:
				$cantEmpresas = count($empresa->listar());
				if ($cantEmpresas == 0) {
					echo "	\n>>> ERROR. Aún no se han agregado empresas.\n";
				} else {
					//Se listan en pantalla todas las empresas almacenadas:
					echo mostrar($empresa->listar());
					do {
						echo "| Seleccione una empresa: ";
						$nroEmpresa = trim(fgets(STDIN));
						$empresaEncontrada = $empresa->buscar($nroEmpresa);
						if ($empresaEncontrada == false) {
							echo "	\n>>> ERROR. El número de empresa seleccionado es incorrecto.\n";
						}
					} while($empresaEncontrada != true);
					//Se eliminan todos los viajes relacionados a la empresa elegida y la empresa:
					$eliminarViajesEmpresa = $empresa->EliminarViajesEmpresa();
					$eliminarEmpresa = $empresa->eliminar();
					if ($eliminarEmpresa == false) {
						echo "	\n>>> Empresa eliminada con éxito.\n";
					} else {
						echo $empresa->getMensajeOperacion();
					}
				}
			break;
			case 8:
				echo "\n----- Mostrar datos de la empresa -----\n" ;
				//Se verifica que hayan empresas agregadas:
				$cantEmpresas = count($empresa->listar());
				if ($cantEmpresas == 0) {
					echo "	\n>>> ERROR. Aún no se han agregado empresas.\n";
				} else {
					//Se listan en pantalla todas las empresas almacenadas:
					echo mostrar($empresa->listar());
					do {
						echo "| Seleccione una empresa: ";
						$nroEmpresa = trim(fgets(STDIN));
						$empresaEncontrada = $empresa->buscar($nroEmpresa);
						if ($empresaEncontrada == false) {
							echo "	\n>>> ERROR. El número de empresa seleccionado es incorrecto.\n";
						}
					} while($empresaEncontrada != true);
					$cadena = $empresa->__toString(); // es igual a: echo $empresa;
					echo $cadena;
				}
			break;
			case 9:
				echo ">>> Ha salido del programa.";
				break;
			}
	} while($opcion != 9);
?>