<?php
/** Calcular la edad de una persona.
* @param int $anioActual, $anioNac
* @return int
*/
function calcularEdad($anioActual, $anioNac)
{
	$edad = $anioActual - $anioNac;
    return($edad);
}

/* PROGRAMA principal */
/* A partir de año actual y de nacimiento, calcula la edad que tendrá el año
siguiente. */
/*Int $anioHoy, $anioNac, $edadPersona, $edadEnUnAnio */
	echo ("Ingrese el año actual: ");
	$anioHoy = trim(fgets(STDIN));
	echo ("Ingrese el año de nacimiento: ");
	$anioNac = trim(fgets(STDIN));
		$edadPersona = calcularEdad($anioHoy, $anioNac);
        $edadEnUnAnio = $edadPersona + 1;
	echo ("Su edad en un año es: ".$edadEnUnAnio);