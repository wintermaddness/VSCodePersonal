<?php
/** PROGRAMA adivinaAdivinador
 * string $palabraX, $palabra
 * int $secuencia, $cantPalabras, $i, 
*/
//Inicialización de variables
$secuencia = 0;
//Ingreso de datos
echo "| Ingrese la palabra que debe ser adivinada: ";
$palabraX = trim(fgets(STDIN));
echo "| Ingrese una cantidad (oportunidades para descubrir la palabra): ";
$cantPalabras = trim(fgets(STDIN));
//Proceso
if ($cantPalabras == 0) {
    echo "\nNo se ingresó una secuencia para analizar.";
} elseif ($cantPalabras >= 1) {
    for ($i=1; $i<=$cantPalabras; $i++) {
        echo "Ingrese una palabra para la secuencia: ";
        $palabra = trim(fgets(STDIN));
        if ($palabra == $palabraX) {
            $secuencia = $secuencia + 1;
        }
    }
    echo "| Cantidad de veces que se encontró '".$palabraX."': ".$secuencia;
}