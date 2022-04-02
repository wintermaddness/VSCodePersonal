<?php
/** MODULO 1: Calcular el sueldo -
 * Calcula el sueldo total de un empleado.
 * @param int $categoria, $antiguedad
 * @param string $cargo
 * @return float
 */
function calcularSueldo($cargo, $antiguedad, $categoria) {
	/* $sueldo, $cargo, $antiguedad, $categoria */
	if ($cargo == "director") {
		$sueldo = 65952;
	} elseif ($cargo == "jefe") {
		$sueldo = 48000;
	} else {
		/* $sueldo, $categoria */
		if ($categoria == "1") {
			$sueldo = 35000;
		} else {
			$sueldo = 30000;
		}	
	}
	if ($antiguedad > 15) {
			$sueldo = $sueldo + (($sueldo * 10) / 100);
	}
	return $sueldo;
}

/* PROGRAMA principal */
/* Muestra el sueldo total que le corresponde a cada empleado según su cargo y antiguedad en la empresa. */
	echo "Ingrese su cargo: ";
	$cargo = trim(fgets(STDIN));
	echo "Si es empleado, ingrese su categoría (1-2): ";
	$categoria = trim(fgets(STDIN));
	echo "Ingrese sus años de antiguedad: ";
	$antiguedad = trim(fgets(STDIN));
	$total = calcularSueldo($cargo, $categoria, $antiguedad);
	echo "Su sueldo es de: $".$total;