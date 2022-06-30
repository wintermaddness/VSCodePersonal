<?php
    include "BaseDatos.php";
    include "Viaje.php";
	include "ResponsableV.php";
	include "Pasajero.php";
    include "Empresa.php";

	//-----------------------------------------------------------------------------------------------------------------
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
		"\n5) Modificar lista de pasajeros".
		"\n6) Mostrar lista de pasajeros".
		"\n7) Modificar lista de empresas".
		"\n8) Mostrar datos de la empresa".
		"\n9) Modificar lista de responsables".
		"\n10) Mostrar datos del responsable".
		"\n11) Salir del programa";
		return $menu;
	}

	/**
	 * Método 2: mostrar - 
	 * Dado un arreglo, la función devuelve una cadena
	 * con los datos de cada uno de sus elementos.
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

	/**
	 * Método 3: cambiarViajePasajero - 
	 * Método que se encarga de cambiar al pasajero recibido de viaje.
	 */
	function cambiarViajePasajero($objPasajero) {
		$viaje = new Viaje();
		//Se verifica que hayan viajes creados:
		$cantViajes = count($viaje->listar());
		if ($cantViajes == 0) {
			echo "\n	>>> ERROR. Aún no se han creado viajes.\n";
		} else {
			//Se listan en pantalla todas los viajes almacenados:
			echo "\n".mostrar($viaje->listar());
			do {
				echo "| Seleccione un viaje (por el ID): ";
				$nroViaje = trim(fgets(STDIN));
				$viajeEncontrado = $viaje->buscar($nroViaje);
				if ($viajeEncontrado == false) {
					echo "	>>> ERROR. El número de viaje seleccionado es incorrecto.\n";
				}
			} while($viajeEncontrado != true);
		}
		$objPasajero->setIdViaje($viaje->getCodigoViaje());
		if ($objPasajero->modificar()) {
			echo "	>>> Pasajero agregado con éxito al viaje elegido.\n";
		} else {
			echo "	>>> ERROR. El pasajero no pudo ser agregado al viaje elegido.\n";
			echo $objPasajero->getmensajeoperacion();
		}
	}
	//-----------------------------------------------------------------------------------------------------------------

	/**
	 * Parámetros del viaje: cargar($codigoViaje, $destino, $capacidadPasajeros, $idEmpresa, $objResponsable, $importe, $tipoAsiento, $idayvuelta)
	 */

	do {
		$menu = menuDeOpciones();
		echo $menu."\n";
		echo ">> ";
		$opcion = trim(fgets(STDIN));
		switch ($opcion) {
			//-----------------------------------------------------------------------------------------------------------------
			case 1:
				echo "\n--------- Crear un viaje ---------\n";
				$viaje = new Viaje;
				//Se piden los datos del viaje:
				echo "\n>>> Por favor, ingrese los datos del viaje <<<\n";
				echo "| Ingrese el destino: ";
				$destino = trim(fgets(STDIN));
				//$viaje->setDestino($destino);
				$hayViajeMismoDestino = $viaje->listar('vdestino', $destino);

				if ($hayViajeMismoDestino == []) {
					echo "	>>> ERROR. Ya hay un viaje almacenado con el mismo destino.\n";
					do {
						echo "| ¿Desea continuar cargando el viaje? (1 ó 2):\n";
						echo "1. Si\n";
						echo "2. No\n";
						echo ">> ";
						$respuesta = trim(fgets(STDIN));
						if ($respuesta > 2 || $respuesta < 1) {
							echo "	>>> ERROR. Ingrese una opción válida (1 ó 2).\n";
						}
					} while($respuesta > 2 || $respuesta < 1);
					if ($respuesta == 1) {
						//Se setea el destino del viaje:
						$viaje->setDestino($destino);
						//Se setea la capacidad máxima del viaje:
						echo "| Ingrese la capacidad máxima de pasajeros: ";
						$capacidadMaxima = trim(fgets(STDIN));
						$viaje->setCapacidadPasajeros($capacidadMaxima);

						//Se piden los datos de la empresa de transporte:
						//Se verifica que hayan empresas creadas:
						$cantEmpresas = count($empresa->listar());
						if ($cantEmpresas == 0) {
							echo "\n	>>> ERROR. Aún no se han agregado empresas.\n";
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
							//Se listan en pantalla todas las empresas almacenadas:
							echo mostrar($empresa->listar());
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
						//Se verifica que hayan responsables creados:
						$cantResponsables = count($responsable->listar());
						if ($cantResponsables == 0) {
							echo "\n	>>> ERROR. Aún no se han agregado responsables.\n";
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
						} else {
							//Se listan en pantalla todas las responsables almacenados:
							echo "\n".mostrar($responsable->listar());
							do {
								echo "| Seleccione un responsable: ";
								$nroResponsable = trim(fgets(STDIN));
								$responsableEncontrado = $responsable->buscar($nroResponsable);
								if ($responsableEncontrado == false) {
									echo "	>>> ERROR. El número de responsable seleccionado es incorrecto.\n";
								} else {
									$viaje->setObjResponsable($responsable->getNroEmpleado());
									echo "	>>> Responsable agregado con éxito.\n";
								}
							} while($responsableEncontrado != true);
						}

						//Se pide el precio del viaje:
						echo "| Ingrese el precio: ";
						$precio = trim(fgets(STDIN));
						$viaje->setImporte($precio);

						//Se especifican las características del viaje:
						do {
							echo "| Seleccione el tipo de viaje (1 ó 2):\n";
							echo "1. Primera Clase\n";
							echo "2. Común\n";
							echo ">> ";
							$tipoViaje = trim(fgets(STDIN));
							if ($tipoViaje > 2 || $tipoViaje < 1) {
								echo "	>>> ERROR. Ingrese una opción válida (1 ó 2).\n";
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

						echo $viaje->Insertar()?"":$viaje->getMensajeOperacion();

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
								echo "  >>> ERROR. El pasajero ingresado ya se encuentra en el viaje.\n";
								$i = $i - 1;
							} else {
								echo "+ Ingrese el nombre del pasajero: ";
								$nombre = trim(fgets(STDIN));
								echo "+ Ingrese el apellido del pasajero: ";
								$apellido = trim(fgets(STDIN));
								echo "+ Ingrese el número de teléfono del pasajero: ";
								$telefono = trim(fgets(STDIN));
								//Se obtiene el último ID asignado a un viaje:
								//$ultimoIdAsignado = $viaje->obtenerUltimoId();	<--------- obtenerUltimoId()
								$ultimoIdAsignado = $viaje->getCodigoViaje();
								$nuevoPasajero = new Pasajero();
								$nuevoPasajero->cargar($dni, $nombre, $apellido, $telefono, $ultimoIdAsignado);
								array_push($coleccionPasajeros, $nuevoPasajero);
								echo "+| Pasajero agregado: \n".$nuevoPasajero;

								//Se insertan los pasajeros en la BD:
								foreach ($coleccionPasajeros as $unPasajero) {
									if ($unPasajero->insertar()) {
										echo "	>>> Pasajero agregado con éxito\n";
									} else {
										echo $unPasajero->getmensajeoperacion();
									}
								}
								$viaje->setObjArrayPasajeros($coleccionPasajeros);
							}
						}
						echo "	\n>>> Viaje agregado con éxito. <<<\n";
					} else {
						echo "	>>> Operación cancelada. El viaje no se ha creado.\n";
					}
				}
			break;
			//-----------------------------------------------------------------------------------------------------------------
			case 2:
				echo "\n----- Modificar viaje -----\n";
				//Se verifica que hayan viajes creados:
				$cantViajes = count($viaje->listar());
				if ($cantViajes == 0) {
					echo "\n	>>> ERROR. Aún no se han creado viajes.\n";
				} else {
					//Se listan en pantalla todas los viajes almacenados:
					echo "\n".mostrar($viaje->listar());
					do {
						echo "| Seleccione un viaje: ";
						$nroViaje = trim(fgets(STDIN));
						$viajeEncontrado = $viaje->buscar($nroViaje);
						if ($viajeEncontrado == false) {
							echo "	>>> ERROR. El número de viaje seleccionado es incorrecto.\n";
						}
					} while($viajeEncontrado != true);
					//Se piden los nuevos datos del viaje:
					echo "  + Ingrese el nuevo destino del viaje: ";
					$nuevoDestino = trim(fgets(STDIN));
					$viaje->setDestino($nuevoDestino);
					echo "  + Ingrese la nueva capacidad máxima de pasajeros del viaje: ";
					$nuevaCapacidad = trim(fgets(STDIN));
					$viaje->setCapacidadPasajeros($nuevaCapacidad);
					echo "  + Ingrese el nuevo precio del viaje: ";
					$nuevoPrecio = trim(fgets(STDIN));
					$viaje->setImporte($nuevoPrecio);

					//Modificar la empresa:
					do {
						echo "| ¿Desea modificar la empresa responsable del viaje? (1 ó 2):\n";
						echo "1. Si\n";
						echo "2. No\n";
						echo ">> ";
						$respuesta = trim(fgets(STDIN));
						if ($respuesta > 2 || $respuesta < 1) {
							echo "	>>> ERROR. Ingrese una opción válida (1 ó 2).\n";
						}
					} while($respuesta > 2 || $respuesta < 1);
					if ($respuesta == 1) {
						//Se le pide al usuario que elija una nueva empresa para el viaje:
						//Se verifica que hayan empresas creadas:
						$cantEmpresas = count($empresa->listar());
						if ($cantEmpresas == 0) {
							echo "\n	>>> ERROR. Aún no se han agregado empresas.\n";
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
							//Se listan en pantalla todas las empresas almacenadas:
							echo mostrar($empresa->listar());
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
					}

					//Modificar el responsable:
					do {
						echo "| ¿Desea modificar el responsable del viaje? (1 ó 2):\n";
						echo "1. Si\n";
						echo "2. No\n";
						echo ">> ";
						$respuesta = trim(fgets(STDIN));
						if ($respuesta > 2 || $respuesta < 1) {
							echo "	>>> ERROR. Ingrese una opción válida (1 ó 2).\n";
						}
					} while($respuesta > 2 || $respuesta < 1);
					if ($respuesta == 1) {
						//Se le pide al usuario que elija un nuevo responsable para el viaje:
						//Se verifica que hayan responsables creados:
						$cantResponsables = count($responsable->listar());
						if ($cantResponsables == 0) {
							echo "\n	>>> ERROR. Aún no se han agregado responsables.\n";
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
						} else {
							//Se listan en pantalla todas las responsables almacenados:
							echo "\n".mostrar($responsable->listar());
							do {
								echo "| Seleccione un responsable: ";
								$nroResponsable = trim(fgets(STDIN));
								$responsableEncontrado = $responsable->buscar($nroResponsable);
								if ($responsableEncontrado == false) {
									echo "	>>> ERROR. El número de responsable seleccionado es incorrecto.\n";
								} else {
									$viaje->setObjResponsable($responsable->getNroEmpleado());
									echo "	>>> Responsable agregado con éxito.\n";
								}
							} while($responsableEncontrado != true);
						}
					}
					
					//Modificar características del viaje:
					do {
						echo "| ¿Desea modificar las especificaciones del viaje? (1 ó 2):\n";
						echo "1. Si\n";
						echo "2. No\n";
						echo ">> ";
						$respuesta = trim(fgets(STDIN));
						if ($respuesta > 2 || $respuesta < 1) {
							echo "	>>> ERROR. Ingrese una opción válida (1 ó 2).\n";
						}
					} while($respuesta > 2 || $respuesta < 1);
					if ($respuesta == 1) {
						//Se piden los datos con las nuevas especificaciones:
						do {
							echo "| Seleccione el nuevo tipo de viaje (1 ó 2):\n";
							echo "1. Primera Clase\n";
							echo "2. Común\n";
							echo ">> ";
							$tipoViaje = trim(fgets(STDIN));
							if ($tipoViaje > 2 || $tipoViaje < 1) {
								echo "	>>> ERROR. Ingrese una opción válida (1 ó 2).\n";
							}
						} while($tipoViaje > 2 || $tipoViaje < 1);
						do {
							echo "| Seleccione el nuevo tipo de asiento (1 ó 2):\n";
							echo "1. Cama\n";
							echo "2. Semi-Cama\n";
							echo ">> ";
							$tipoAsiento = trim(fgets(STDIN));
							if ($tipoAsiento > 2 || $tipoAsiento < 1) {
								echo "	>>> ERROR. Ingrese una opción válida (1 ó 2).\n";
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
	
						//Se especifica la nueva trayectoria del viaje:
						do {
							echo "| Seleccione la nueva trayectoria (1, 2 ó 3):\n";
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
					}

					echo $viaje->modificar()?"":$viaje->getMensajeOperacion();

					//Modificar la lista de pasajeros:
					do {
						echo "| ¿Desea modificar la lista de pasajeros del viaje? (1 ó 2):\n";
						echo "1. Si\n";
						echo "2. No\n";
						echo ">> ";
						$respuesta = trim(fgets(STDIN));
						if ($respuesta > 2 || $respuesta < 1) {
							echo "	>>> ERROR. Ingrese una opción válida (1 ó 2).\n";
						}
					} while($respuesta > 2 || $respuesta < 1);
					if ($respuesta == 1) {
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
							//Se ingresan pasajeros al viaje:
							do {
								echo "| Ingrese la cantidad de pasajeros a agregar: ";
								$cantPasajerosIngresados = trim(fgets(STDIN));
								//Se verifica que la cant. de pasajeros ingresada no supere la capacidad del viaje o sea negativa:
								if ($cantPasajerosIngresados > $nuevaCapacidad) {
									echo "  >>> ERROR. La cantidad de pasajeros supera la capacidad máxima del viaje.\n";
								} elseif ($cantPasajerosIngresados < 0) {
									echo "  >>> ERROR. La cantidad de pasajeros agregados no puede ser negativa.\n";
								} elseif ($cantPasajerosIngresados == 0) {
									echo "	>>> ERROR. La cantidad de pasajeros agregados no puede ser igual a cero (0).\n";
								}
							} while($cantPasajerosIngresados > $nuevaCapacidad || $cantPasajerosIngresados < 0 || $cantPasajerosIngresados == 0);
							//Se toman los datos de los pasajeros, verificando que no se repitan:
							for ($i=0; $i<$cantPasajerosIngresados; $i++) {
								echo  ">>> Ingrese los datos de un pasajero <<<";
								echo "\n+ Ingrese el número de documento del pasajero: ";
								$dni = trim(fgets(STDIN));
								$pasajeroRepetido = $pasajero->buscar($dni);
								if ($pasajeroRepetido == true) {
									echo "  >>> ERROR. El pasajero ingresado ya se encuentra en el viaje.\n";
									$i = $i - 1;
								} else {
									echo "+ Ingrese el nombre del pasajero: ";
									$nombre = trim(fgets(STDIN));
									echo "+ Ingrese el apellido del pasajero: ";
									$apellido = trim(fgets(STDIN));
									echo "+ Ingrese el número de teléfono del pasajero: ";
									$telefono = trim(fgets(STDIN));
									//Se obtiene el último ID asignado a un viaje:
									//$ultimoIdAsignado = $viaje->obtenerUltimoId();	<--------- obtenerUltimoId()
									$ultimoIdAsignado = $viaje->getCodigoViaje();
									$nuevoPasajero = new Pasajero();
									$nuevoPasajero->cargar($dni, $nombre, $apellido, $telefono, $ultimoIdAsignado);
									$nuevaColeccionPasajeros = [];
									array_push($nuevaColeccionPasajeros, $nuevoPasajero);
									echo "+| Pasajero agregado: \n".$nuevoPasajero;

									//Se inserta el viaje y los pasajeros en la BD:
									foreach ($nuevaColeccionPasajeros as $unPasajero) {
										if ($unPasajero->insertar()) {
											echo "	>>> Pasajero agregado con éxito\n";
										} else {
											echo $unPasajero->getmensajeoperacion();
										}
									}
									$viaje->setObjArrayPasajeros($nuevaColeccionPasajeros);
								}
							}
						} elseif ($opcionPasajero == 2) {//Se modifican pasajeros del viaje:
							//Se verifica que hayan pasajeros agregados:
							$cantPasajeros = count($viaje->listarPasajeros());
							if ($cantPasajeros == 0) {
								echo "\n	>>> ERROR. Aún no se han agregado pasajeros.\n";
							} else {
								//Se listan en pantalla todos los pasajeros almacenados:
								echo mostrar($viaje->listarPasajeros());
								do {
									echo "| Seleccione un pasajero (por el número de documento): ";
									$nroPasajero = trim(fgets(STDIN));
									$pasajeroEncontrado = $pasajero->buscar($nroPasajero);
									if ($pasajeroEncontrado == false) {
										echo "	>>> ERROR. El número de pasajero seleccionado es incorrecto.\n";
									}
								} while($pasajeroEncontrado != true);
								//Se piden los nuevos datos del pasajero:
								echo "  + Ingrese el nuevo nombre del pasajero: ";
								$nuevoNombre = trim(fgets(STDIN));
								echo "  + Ingrese el nuevo apellido del pasajero: ";
								$nuevoApellido = trim(fgets(STDIN));
								echo "  + Ingrese el nuevo N° de teléfono: ";
								$nroTelefono = trim(fgets(STDIN));
								//Se setean los nuevos datos del pasajero:
								$pasajero->setNombre($nuevoNombre);
								$pasajero->setApellido($nuevoApellido);
								$pasajero->setTelefono($nroTelefono);
								$modificacionPasajero = $pasajero->modificar();
								if ($modificacionPasajero) {
									echo "\n	>>> Pasajero modificado con éxito.\n";
								} else {
									echo $pasajero->getMensajeOperacion();
								}
							}
						} else {//Se eliminan pasajeros del viaje:	
							//Se verifica que hayan pasajeros agregados:
							$cantPasajeros = count($viaje->listarPasajeros());
							if ($cantPasajeros == 0) {
								echo "\n	>>> ERROR. Aún no se han agregado pasajeros.\n";
							} else {
								//Se listan en pantalla todos los pasajeros almacenados:
								echo mostrar($viaje->listarPasajeros());
								do {
									echo "| Seleccione un pasajero: ";
									$nroPasajero = trim(fgets(STDIN));
									$pasajeroEncontrado = $pasajero->buscar($nroPasajero);
									if ($pasajeroEncontrado == false) {
										echo "	>>> ERROR. El número de pasajero seleccionado es incorrecto.\n";
									}
								} while($pasajeroEncontrado != true);
								//Se elimina el pasajero:
								$eliminarPasajero = $pasajero->eliminar();
								if ($eliminarPasajero == false) {
									echo "\n	>>> Pasajero eliminado con éxito.\n";
								} else {
									echo $pasajero->getMensajeOperacion();
								}
							}
						}
					}

					$modificacionViaje = $viaje->modificar();
					if ($modificacionViaje) {
						echo "\n	>>> Viaje modificado con éxito.\n";
					} else {
						echo $viaje->getMensajeOperacion();
					}
				}
			break;
			//-----------------------------------------------------------------------------------------------------------------
			case 3:
				echo "\n----- Eliminar viaje -----\n";
				//Se verifica que hayan viajes creados:
				$cantViajes = count($viaje->listar());
				if ($cantViajes == 0) {
					echo "\n	>>> ERROR. Aún no se han creado viajes.\n";
				} else {
					//Se listan en pantalla todas los viajes almacenados:
					echo "\n".mostrar($viaje->listar());
					do {
						echo "| Seleccione un viaje (por el ID): ";
						$nroViaje = trim(fgets(STDIN));
						$viajeEncontrado = $viaje->buscar($nroViaje);
						if ($viajeEncontrado == false) {
							echo "\n	>>> ERROR. El número de viaje seleccionado es incorrecto.\n";
						}
					} while($viajeEncontrado != true);
					
					$listaDePasajeros = $viaje->listarPasajeros();
					//Si el viaje tiene pasajeros, no se eliminan los pasajeros ni el viaje:
					if (count($listaDePasajeros) != 0 ) {
						echo "\n	>>> ERROR. No se puede eliminar el viaje porque tiene pasajeros.\n";
						do {
							echo "| ¿Desea eliminar también los pasajeros? (1 ó 2):\n";
							echo "1. Si\n";
							echo "2. No\n";
							echo ">> ";
							$respuesta = trim(fgets(STDIN));
							if ($respuesta > 2 || $respuesta < 1) {
								echo "	>>> ERROR. Ingrese una opción válida (1 ó 2).\n";
							}
						} while($respuesta > 2 || $respuesta < 1);
						if ($respuesta == 1) {
							foreach ($listaDePasajeros as $unPasajero) {
								$unPasajero->Eliminar();
							}
							echo "	>>> Pasajeros eliminados del viaje exitosamente.\n";
							$viaje->Eliminar();
							echo "\n	>>> Viaje eliminado exitosamente.\n";
						} else {
							echo "\n	>>> El viaje no se ha eliminado.\n";
						}
					} else {
						$viaje->Eliminar();
						echo "\n	>>> Viaje eliminado exitosamente.\n";
					} 
					
					/*else {
						foreach ($listaDePasajeros as $unPasajero) {
							$unPasajero->Eliminar();
						}
						$viaje->Eliminar();
					}*/
					
					//Finalmente, se elimina el viaje:
					//$viaje->eliminar();
					//echo "\n	>>> Viaje eliminado exitosamente.\n";
				}
			break;
			//-----------------------------------------------------------------------------------------------------------------
			case 4:
				echo "\n----- Mostrar datos del viaje -----\n";
				//Se verifica que hayan viajes creados:
				$cantViajes = count($viaje->listar());
				if ($cantViajes == 0) {
					echo "\n	>>> ERROR. Aún no se han creado viajes.\n";
				} else {
					//Se listan en pantalla todas los viajes almacenados:
					echo "\n".mostrar($viaje->listar());
					do {
						echo "| Seleccione un viaje (por el ID): ";
						$nroViaje = trim(fgets(STDIN));
						$viajeEncontrado = $viaje->buscar($nroViaje);
						if ($viajeEncontrado == false) {
							echo "\n	>>> ERROR. El número de viaje seleccionado es incorrecto.\n";
						}
					} while($viajeEncontrado != true);
					echo "\n----------------------------------------------\n";
					//$cadena = $viaje->__toString();  es igual a: echo $viaje;
					$cadena = $viaje->listarDatosViajes();
					echo "\n".$cadena;
					echo "----------------------------------------------\n";
				}
			break;
			//-----------------------------------------------------------------------------------------------------------------
			case 5:
				echo "\n----- Modificar lista de pasajeros -----\n";
				//Se verifica que hayan viajes creados:
				$cantViajes = count($viaje->listar());
				if ($cantViajes == 0) {
					echo "\n	>>> ERROR. Aún no se han creado viajes.\n";
				} else {
					//Se listan en pantalla todas los viajes almacenados:
					echo "\n".mostrar($viaje->listar());
					do {
						echo "| Seleccione un viaje (por el ID): ";
						$nroViaje = trim(fgets(STDIN));
						$viajeEncontrado = $viaje->buscar($nroViaje);
						if ($viajeEncontrado == false) {
							echo "	>>> ERROR. El número de viaje seleccionado es incorrecto.\n";
						}
					} while($viajeEncontrado != true);
					
					do {
						echo "| Seleccione una opción (1-3):\n";
						echo "1. Agregar pasajeros\n";
						echo "2. Modificar pasajeros\n";
						echo "3. Eliminar pasajeros\n";
						//echo "4. Mostrar lista de pasajeros\n";
						echo ">>> ";
						$opcionPasajero = trim(fgets(STDIN));
						if ($opcionPasajero < 1 || $opcionPasajero > 3) {
							echo "  >>> ERROR. Ingrese una opción válida (1-3).\n";
						}
					} while($opcionPasajero < 1 || $opcionPasajero > 3);

					if ($opcionPasajero == 1) {
						//Se ingresan pasajeros al viaje:
						do {
							echo "| Ingrese la cantidad de pasajeros a agregar: ";
							$cantPasajerosIngresados = trim(fgets(STDIN));
							//Se verifica que la cant. de pasajeros ingresada no supere la capacidad del viaje o sea negativa:
							if ($cantPasajerosIngresados > $viaje->getCapacidadPasajeros()) {
								echo "  >>> ERROR. La cantidad de pasajeros supera la capacidad máxima del viaje.\n";
							} elseif ($cantPasajerosIngresados < 0) {
								echo "  >>> ERROR. La cantidad de pasajeros agregados no puede ser negativa.\n";
							} elseif ($cantPasajerosIngresados == 0) {
								echo "	>>> ERROR. La cantidad de pasajeros agregados no puede ser igual a cero (0).\n";
							}
						} while($cantPasajerosIngresados > $viaje->getCapacidadPasajeros() || $cantPasajerosIngresados < 0 || $cantPasajerosIngresados == 0);
						//Se toman los datos de los pasajeros, verificando que no se repitan:
						for ($i=0; $i<$cantPasajerosIngresados; $i++) {
							echo  ">>> Ingrese los datos de un pasajero <<<";
							echo "\n+ Ingrese el número de documento del pasajero: ";
							$dni = trim(fgets(STDIN));
							//$pasajeroRepetido = $pasajero->buscar($dni);
							$listaDePasajeros = $viaje->listarPasajeros();
							foreach ($listaDePasajeros as $unPasajero) {
								$pasajeroRepetido = $unPasajero->buscar($dni);
							}
							if ($pasajeroRepetido == true) {
								echo "  >>> ERROR. El pasajero ingresado ya se encuentra en el viaje.\n";
								$i = $i - 1;
							} else {
								echo "+ Ingrese el nombre del pasajero: ";
								$nombre = trim(fgets(STDIN));
								echo "+ Ingrese el apellido del pasajero: ";
								$apellido = trim(fgets(STDIN));
								echo "+ Ingrese el número de teléfono del pasajero: ";
								$telefono = trim(fgets(STDIN));
								//Se obtiene el último ID asignado a un viaje:
								//$ultimoIdAsignado = $viaje->obtenerUltimoId();	<--------- obtenerUltimoId()
								$ultimoIdAsignado = $viaje->getCodigoViaje();
								$nuevoPasajero = new Pasajero();
								$nuevoPasajero->cargar($dni, $nombre, $apellido, $telefono, $ultimoIdAsignado);
								$nuevaColeccionPasajeros = [];
								array_push($nuevaColeccionPasajeros, $nuevoPasajero);
								echo "+| Pasajero agregado: \n".$nuevoPasajero;

								//Se inserta el viaje y los pasajeros en la BD:
								foreach ($nuevaColeccionPasajeros as $unPasajero) {
									if ($unPasajero->insertar()) {
										echo "	>>> Pasajero agregado con éxito\n";
									} else {
										echo $unPasajero->getmensajeoperacion();
									}
								}
								$viaje->setObjArrayPasajeros($nuevaColeccionPasajeros);
							}
						}
					} elseif ($opcionPasajero == 2) {//Se modifican pasajeros del viaje:
						//Se verifica que hayan pasajeros agregados:
						$cantPasajeros = count($viaje->listarPasajeros());
						if ($cantPasajeros == 0) {
							echo "\n	>>> ERROR. Aún no se han agregado pasajeros.\n";
						} else {
							//Se listan en pantalla todos los pasajeros almacenados:
							echo mostrar($viaje->listarPasajeros());
							do {
								echo "| Seleccione un pasajero (por el número de documento): ";
								$nroPasajero = trim(fgets(STDIN));
								//$pasajeroEncontrado = $pasajero->buscar($nroPasajero);
								$listaDePasajeros = $viaje->listarPasajeros();
								foreach ($listaDePasajeros as $unPasajero) {
									$pasajeroEncontrado = $unPasajero->buscar($nroPasajero);
								}
								if ($pasajeroEncontrado == false) {
									echo "	>>> ERROR. El número de pasajero seleccionado es incorrecto.\n";
								}
							} while($pasajeroEncontrado != true);
							//Se piden los nuevos datos del pasajero:
							echo "  + Ingrese el nuevo nombre del pasajero: ";
							$nuevoNombre = trim(fgets(STDIN));
							echo "  + Ingrese el nuevo apellido del pasajero: ";
							$nuevoApellido = trim(fgets(STDIN));
							echo "  + Ingrese el nuevo N° de teléfono: ";
							$nroTelefono = trim(fgets(STDIN));
							//Se setean los nuevos datos del pasajero:
							$unPasajero->setNombre($nuevoNombre);
							$unPasajero->setApellido($nuevoApellido);
							$unPasajero->setTelefono($nroTelefono);
							//$modificacionPasajero = $pasajero->modificar();
							$modificacionPasajero = $unPasajero->modificar();
							if ($modificacionPasajero) {
								echo "\n	>>> Pasajero modificado con éxito.\n";
							} else {
								//echo $pasajero->getMensajeOperacion();
								$unPasajero->getMensajeOperacion();
							}
						}
					} else {//Se eliminan pasajeros del viaje:	
						//Se verifica que hayan pasajeros agregados:
						$cantPasajeros = count($viaje->listarPasajeros());
						if ($cantPasajeros == 0) {
							echo "\n	>>> ERROR. Aún no se han agregado pasajeros.\n";
						} else {
							//Se listan en pantalla todos los pasajeros almacenados:
							echo mostrar($viaje->listarPasajeros());
							do {
								echo "| Seleccione un pasajero (por el número de documento): ";
								$nroPasajero = trim(fgets(STDIN));
								//$pasajeroEncontrado = $pasajero->buscar($nroPasajero);
								$listaDePasajeros = $viaje->listarPasajeros();
								foreach ($listaDePasajeros as $unPasajero) {
									$pasajeroEncontrado = $unPasajero->buscar($nroPasajero);
								}
								if ($pasajeroEncontrado == false) {
									echo "	>>> ERROR. El número de pasajero seleccionado es incorrecto.\n";
								}
							} while($pasajeroEncontrado != true);

							do {
								echo "| Seleccione una opción (1 ó 2):\n";
								echo "1. Cambiar pasajero a otro viaje\n";
								echo "2. Eliminar pasajero del viaje\n";
								echo ">>> ";
								$opcionPasajero = trim(fgets(STDIN));
								if ($opcionPasajero < 1 || $opcionPasajero > 2) {
									echo "  >>> ERROR. Ingrese una opción válida (1 ó 2).\n";
								}
							} while($opcionPasajero < 1 || $opcionPasajero > 2);
							if ($opcionPasajero == 1) {//Se cambia al pasajero de viaje:
								cambiarViajePasajero($unPasajero);
							} else {//Se elimina el pasajero:
								$eliminarPasajero = $unPasajero->eliminar();
								if ($eliminarPasajero != false) {
									echo "\n	>>> Pasajero eliminado con éxito.\n";
								} else {
									echo $unPasajero->getMensajeOperacion();
								}
							}
						}
					}
				}
			break;
			//-----------------------------------------------------------------------------------------------------------------
			case 6:
				echo "\n----- Mostrar lista de pasajeros -----\n";
				//Se verifica que hayan viajes creados:
				$cantViajes = count($viaje->listar());
				if ($cantViajes == 0) {
					echo "\n	>>> ERROR. Aún no se han creado viajes.\n";
				} else {
					//Se listan en pantalla todas los viajes almacenados:
					echo "\n".mostrar($viaje->listar());
					do {
						echo "| Seleccione un viaje (por el ID): ";
						$nroViaje = trim(fgets(STDIN));
						$viajeEncontrado = $viaje->buscar($nroViaje);
						if ($viajeEncontrado == false) {
							echo "	>>> ERROR. El número de viaje seleccionado es incorrecto.\n";
						}
					} while($viajeEncontrado != true);

					//Se verifica que el viaje tenga pasajeros:
					if (count($viaje->listarPasajeros()) != 0) {
						echo "\n----------------------------------------------\n";
						$cadena = $viaje->mostrarDatosPasajeros($viaje->listarPasajeros());
						echo $cadena;
						echo "\n----------------------------------------------\n";
					} else {
						echo " >>> El viaje no tiene pasajeros.\n";
					}
				}
			break;
			//-----------------------------------------------------------------------------------------------------------------
			case 7:
				echo "\n----- Modificar lista de empresas -----\n";
				do {
                    echo "| Seleccione una opción (1-3):\n";
                    echo "1. Agregar empresas\n";
                    echo "2. Modificar empresas\n";
                    echo "3. Eliminar empresas\n";
                    echo ">>> ";
                    $opcionEmpresa = trim(fgets(STDIN));
                    if ($opcionEmpresa < 1 || $opcionEmpresa > 3) {
                        echo "  >>> ERROR. Ingrese una opción válida (1-3).\n";
                    }
                } while($opcionEmpresa < 1 || $opcionEmpresa > 3);

				if ($opcionEmpresa == 1) {//Agregar empresas:
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
						echo "\n	>>> Empresa agregada con éxito.\n";
					} else {
						echo $empresa->getMensajeOperacion();
					}
				} elseif ($opcionEmpresa == 2) {//Modificar empresas:
					//Se verifica que hayan empresas agregadas:
					$cantEmpresas = count($empresa->listar());
					if ($cantEmpresas == 0) {
						echo "\n	>>> ERROR. Aún no se han agregado empresas.\n";
					} else {
						//Se listan en pantalla todas las empresas almacenadas:
						echo mostrar($empresa->listar());
						do {
							echo "| Seleccione una empresa (por el ID): ";
							$nroEmpresa = trim(fgets(STDIN));
							$empresaEncontrada = $empresa->buscar($nroEmpresa);
							if ($empresaEncontrada == false) {
								echo "	>>> ERROR. El número de empresa seleccionado es incorrecto.\n";
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
							echo "\n	>>> Empresa modificada con éxito.\n";
						} else {
							echo $empresa->getMensajeOperacion();
						}
					}
				} else {//Eliminar empresas:
					//Se verifica que hayan empresas agregadas:
					$cantEmpresas = count($empresa->listar());
					if ($cantEmpresas == 0) {
						echo "\n	>>> ERROR. Aún no se han agregado empresas.\n";
					} else {
						//Se listan en pantalla todas las empresas almacenadas:
						echo mostrar($empresa->listar());
						do {
							echo "| Seleccione una empresa (por el ID): ";
							$nroEmpresa = trim(fgets(STDIN));
							$empresaEncontrada = $empresa->buscar($nroEmpresa);
							if ($empresaEncontrada == false) {
								echo "	>>> ERROR. El número de empresa seleccionado es incorrecto.\n";
							}
						} while($empresaEncontrada != true);
						//Se eliminan todos los viajes relacionados a la empresa elegida y la empresa:
						$eliminarViajesEmpresa = $empresa->EliminarViajesEmpresa();
						$eliminarEmpresa = $empresa->eliminar();
						if ($eliminarViajesEmpresa == false) {
							echo "\n	>>> Empresa eliminada con éxito.\n";
						} else {
							echo $empresa->getMensajeOperacion();
						}
					}
				}
			break;
			//-----------------------------------------------------------------------------------------------------------------
			case 8:
				echo "\n----- Mostrar datos de la empresa -----\n" ;
				//Se verifica que hayan empresas agregadas:
				$cantEmpresas = count($empresa->listar());
				if ($cantEmpresas == 0) {
					echo "\n	>>> ERROR. Aún no se han agregado empresas.\n";
				} else {
					//Se listan en pantalla todas las empresas almacenadas:
					echo mostrar($empresa->listar());
					do {
						echo "| Seleccione una empresa (por el ID): ";
						$nroEmpresa = trim(fgets(STDIN));
						$empresaEncontrada = $empresa->buscar($nroEmpresa);
						if ($empresaEncontrada == false) {
							echo "\n	>>> ERROR. El número de empresa seleccionado es incorrecto.\n";
						}
					} while($empresaEncontrada != true);
					echo "\n----------------------------------------------\n";
					$cadena = $empresa->__toString(); // es igual a: echo $empresa;
					$cadena .= $empresa->mostrarViajesEmpresa();
					echo $cadena;
					echo "\n----------------------------------------------\n";
				}
			break;
			//-----------------------------------------------------------------------------------------------------------------
			case 9:
				echo "\n----- Modificar lista de responsables -----\n";
				do {
                    echo "| Seleccione una opción (1-3):\n";
                    echo "1. Agregar responsables\n";
                    echo "2. Modificar responsables\n";
                    echo "3. Eliminar responsables\n";
                    echo ">>> ";
                    $opcionResponsable = trim(fgets(STDIN));
                    if ($opcionResponsable < 1 || $opcionResponsable > 3) {
                        echo "  >>> ERROR. Ingrese una opción válida (1-3).\n";
                    }
                } while($opcionResponsable < 1 || $opcionResponsable > 3);

				if ($opcionResponsable == 1) {//Agregar responsables:
					//Se piden los datos del responsable:
					echo "\n>>> Por favor, ingrese los datos del Responsable <<<\n";
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
						echo "\n	>>> Responsable agregado con éxito.\n";
						$viaje->setObjResponsable($responsable->getNroEmpleado());
					} else {
						echo $responsable->getMensajeOperacion();
					}
				} elseif ($opcionResponsable == 2) {//Modificar responsables:
					//Se verifica que hayan responsables agregados:
					$cantResponsables = count($responsable->listar());
					if ($cantResponsables == 0) {
						echo "\n	>>> ERROR. Aún no se han agregado responsables.\n";
					} else {
						//Se listan en pantalla todos los responsables almacenados:
						echo mostrar($responsable->listar());
						do {
							echo "| Seleccione un responsable: ";
							$nroResponsable = trim(fgets(STDIN));
							$responsableEncontrado = $responsable->buscar($nroResponsable);
							if ($responsableEncontrado == false) {
								echo "	>>> ERROR. El número de responsable seleccionado es incorrecto.\n";
							}
						} while($responsableEncontrado != true);
						//Se piden los nuevos datos del responsable:
						echo "  + Ingrese el nuevo nombre del responsable: ";
						$nuevoNombre = trim(fgets(STDIN));
						echo "  + Ingrese el nuevo apellido del responsable: ";
						$nuevoApellido = trim(fgets(STDIN));
						echo "  + Ingrese el nuevo N° de licencia: ";
						$nroLicencia = trim(fgets(STDIN));
						//Se setean los nuevos datos del responsable:
						$responsable->setNombre($nuevoNombre);
						$responsable->setApellido($nuevoApellido);
						$responsable->setNroLicencia($nroLicencia);
						$modificacionResponsable = $responsable->modificar();
						if ($modificacionResponsable) {
							echo "\n	>>> Responsable modificado con éxito.\n";
						} else {
							echo $responsable->getMensajeOperacion();
						}
					}
				} else {//Eliminar responsables:
					//Se verifica que hayan responsables agregados:
					$cantResponsables = count($responsable->listar());
					if ($cantResponsables == 0) {
						echo "\n	>>> ERROR. Aún no se han agregado responsables.\n";
					} else {
						//Se listan en pantalla todos los responsables almacenados:
						echo mostrar($responsable->listar());
						do {
							echo "| Seleccione un responsable: ";
							$nroResponsable = trim(fgets(STDIN));
							$responsableEncontrado = $responsable->buscar($nroResponsable);
							if ($responsableEncontrado == false) {
								echo "	>>> ERROR. El número de responsable seleccionado es incorrecto.\n";
							}
						} while($responsableEncontrado != true);
						//Se eliminan todos los viajes relacionados al responsable elegido y el responsable:
						$eliminarViajesResponsable = $responsable->eliminarViajesResponsable();
						$eliminarResponsable = $responsable->eliminar();
						echo "\n	>>> Responsable eliminado con éxito.\n";
					}
				}
			break;
			//-----------------------------------------------------------------------------------------------------------------
			case 10:
				echo "\n----- Mostrar datos del responsable -----\n" ;
				//Se verifica que hayan responsables agregados:
				$cantResponsables = count($responsable->listar());
				if ($cantResponsables == 0) {
					echo "\n	>>> ERROR. Aún no se han agregado responsables.\n";
				} else {
					//Se listan en pantalla todos los responsables almacenados:
					echo mostrar($responsable->listar());
					do {
						echo "| Seleccione un responsable (por el Nro. de empleado): ";
						$nroResponsable = trim(fgets(STDIN));
						$responsableEncontrado = $responsable->buscar($nroResponsable);
						if ($responsableEncontrado == false) {
							echo "	>>> ERROR. El número de responsable seleccionado es incorrecto.\n";
						}
					} while($responsableEncontrado != true);
					echo "\n----------------------------------------------\n";
					$cadena = $responsable->__toString(); // es igual a: echo $responsable;
					$cadena .= $responsable->mostrarViajesResponsable();
					echo "\n".$cadena;
					echo "\n----------------------------------------------\n";
				}
			break;
			//-----------------------------------------------------------------------------------------------------------------
			case 11:
				echo ">>> Ha salido del programa.";
				break;
			}
	} while($opcion != 11);
?>