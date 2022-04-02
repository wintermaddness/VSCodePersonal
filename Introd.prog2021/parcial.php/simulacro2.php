<?php
/** Módulo 1: distanciaPuntos -
 * Calcula la distancia entre dos puntos de coordenada.
 * @param int $xPto1, $yPto1, $xPto2, $yPto2
 * @return float
 */
//function distanciaPuntos($xPto1, $yPto1, $xPto2, $yPto2)

/**Módulo 2: calcularRango - 
* Verifica si un punto está dentro de la circunferencia de otro punto.
* @param int $xCentro, $yCentro, $xPunto, $yPunto
* @param float $radio
* @return string
*/
function calcularRango ($xCentro, $yCentro, $xPunto, $yPunto, $radio) {
	/* float $distancia, string $resultado */
	$distancia = distanciaPuntos($xCentro, $yCentro, $xPunto, $yPunto);
	if ($distancia <= $radio) {
		$resultado = "dentro";
	} else {
		$resultado = "fuera";
	}
	return $resultado;
}

/** PROGRAMA principal */
/* Si la distancia de la casa está dentro del radio de la escuela,
* vota en esa escuela sino vota en otra escuela.
*/
    /* DECLARACIÓN DE VARIABLES
	int $puntoX1, $puntoX2, $puntoY1, $puntoY2, $radioEsc
    string $superficieC */
echo "Ingrese su ubicación (punto X): ";
$puntoX1 = trim(fgets(STDIN));
echo "Ingrese su ubicación (punto Y): ";
$puntoY1 = trim(fgets(STDIN));
echo "Ingrese la ubicación de la escuela (punto X): ";
$puntoX2 = trim(fgets(STDIN));
echo "Ingrese la ubicación de la escuela (punto Y): ";
$puntoY2 = trim(fgets(STDIN));
echo "Ingrese el radio de alcance de la escuela: ";
$radioEsc = trim(fgets(STDIN));
$superficieC = calcularRango($puntoX2, $puntoY2, $puntoX1, $puntoY1, $radioEsc);
echo "Se encuentra ".$superficieC." del rango de la escuela.";