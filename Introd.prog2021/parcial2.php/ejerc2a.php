<?php
/** PROGRAMA descubridorNumérico
 * int $numeroX, $secuencia, $cantIntentos, $i, $numero 
*/
//Inicialización de variables
$secuencia = 0;
//Ingreso de datos
echo "| Ingrese el número que debe ser adivinado: ";
$numeroX = trim(fgets(STDIN));
echo "| Ingrese una cantidad (oportunidades para descubrir el número): ";
$cantIntentos = trim(fgets(STDIN));
//Proceso
if ($cantIntentos == 0) {
    echo "\nNo se ingresó una secuencia de números para analizar.";
} else {
    for ($i=1; $i<=$cantIntentos; $i++) {
        echo "Ingrese un número para la secuencia: ";
        $numero = trim(fgets(STDIN));
        if ($numero == $numeroX) {
            $secuencia = $secuencia + 1;
        }
    }
    echo "| Cantidad de veces que se encontró el número: ".$secuencia;
}