<?php

/**
* Módulo 1: cuadrado de un número.
* El módulo calcula el cuadrado de un número.
* @param float $numero
* @return float
*/
function cuadrado($numero)
{
	/* float $resultado */
	$resultado = $numero * $numero;
	return $resultado;
}

/**
*Módulo 2: hipotenusa de un triángulo cuadrado.
* El módulo calcula el valor de la hipotenusa.
* @param float $cateto1, $cateto2, $hipotenusa
* @return float
*/
function calcularHipotenusa($cateto1, $cateto2)
{
	/* float $hipotenusa, $v1, $v2 */
	$v1 = cuadrado($cateto1);
	$v2 = cuadrado($cateto2);
	$hipotenusa = sqrt($v1 + $v2);
	return($hipotenusa);
}

/** PROGRAMA principal */
/*float $distanciaX, $distanciaY, $diagonal */
	echo "Ingrese distancia Y: ";
	$distanciaY = trim(fgets(STDIN));
	echo "Ingrese distancia X: ";
	$distanciaX = trim(fgets(STDIN));
	$diagonal = calcularHipotenusa($distanciaY, $distanciaX);
	echo "Caminarías ".$diagonal." metros si fueras en línea recta.";