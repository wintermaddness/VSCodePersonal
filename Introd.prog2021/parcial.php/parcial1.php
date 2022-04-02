<?php
/** Módulo 1: puntajePrueba - 
 * Retorna el puntaje según el tipo y número de prueba.
 * @param int $numPrueba,
 * @param string $tipoPrueba
 * @return int
 */
function puntajePrueba($numPrueba, $tipoPrueba) {
    /* int $puntaje */
    if ($tipoPrueba == "tecnica") {
        $puntaje = ($numPrueba % 8) + 54;
    } else {
        $puntaje = ($numPrueba % 8) + 45;
    }
    return $puntaje;
}

/** Módulo 2: minutosExtras - 
 * Retorna la cantidad de minutos extras según el puntaje.
 * @param int $puntajePrueba
 * @return int
 */
function minutosExtras($puntajePrueba) {
    /* int $minExtras */
    if ($puntajePrueba < 46) {
        $minExtras = 3;
    } elseif ($puntajePrueba >= 46 && $puntajePrueba < 50) {
        $minExtras = 4;
    } elseif ($puntajePrueba >= 50 && $puntajePrueba < 55) {
        $minExtras = 5;
    } elseif ($puntajePrueba >= 55) {
        $minExtras = 6;
    }
    return $minExtras;
}

/** PROGRAMA principal:
 * Solicita el número de prueba, el tipo de prueba y muestra
 * en pantalla los minutos extras adquiridos.
 * string $tipodePrueba
 * entero $numerodePrueba, $puntaje, $minutos
*/
echo "Por favor, ingrese el número de prueba: ";
$numerodePrueba = trim(fgets(STDIN));
echo "Ingrese el tipo de prueba (tecnica o expresiva): ";
$tipodePrueba = trim(fgets(STDIN));
    $puntaje = puntajePrueba($numerodePrueba, $tipodePrueba);
    $minutos = minutosExtras($puntaje);
echo "Dado el número de prueba (".$numerodePrueba.") y su clasificación (".
$tipodePrueba."), obtiene: ".$minutos." minutos extras.";