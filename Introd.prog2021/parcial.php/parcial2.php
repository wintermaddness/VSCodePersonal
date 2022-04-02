<?php
/** Módulo 1: dimensionPaquete - 
 * Retorna true o false según las dimensiones del paquete.
 * @param float $altura, $anchura, $largoMenor, $peso
 * @return boolean
*/
function dimensionPaquete($altura, $anchura, $largoMenor, $peso) {
    /* boolean $paquete */
    if ($altura < 150 && $anchura <= 270.25 && $largoMenor <= 350 && $peso < 6.5) {
        $paquete = true;
    } else {
        $paquete = false;
    }
    return $paquete;
}

/** PROGRAMA principal:
 * Indica si las dimensiones de un paquete lo hacen aceptable o no.
 * float $alturaPaquete, $anchoPaquete, $largoPaquete, $pesoPaquete
 * string $resultado
 */
echo "Ingrese la altura del paquete (cm): ";
$alturaPaquete = trim(fgets(STDIN));
echo "Ingrese el ancho más chico del paquete (cm): ";
$anchoPaquete = trim(fgets(STDIN));
echo "Ingrese el largo menor del paquete (cm): ";
$largoPaquete = trim(fgets(STDIN));
echo "Por último, ingrese el peso del paquete (kg): ";
$pesoPaquete = trim(fgets(STDIN));
    $resultado = dimensionPaquete($alturaPaquete, $anchoPaquete, $largoPaquete, $pesoPaquete);
    if ($resultado == true) {
        echo "Cumple con las indicaciones del transporte, su paquete es aceptado.";
    } else {
        echo "No cumple con las indicaciones del transporte, su paquete es rechazado.";
    }