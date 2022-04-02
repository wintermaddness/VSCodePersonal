<?php
/** ALGORITMO sumatoria
 * int $numero, $divisor, $i, $operacion
 */
echo "Ingrese un número entero: ";
$numero = trim(fgets(STDIN));
$numerador = 2;
$denominador = 1;
$sumatoria = 0;
$auxiliar = 0;
for ($i=1; $i<=$numero; $i++) {
    echo "\n".$numerador."/".$denominador;
    $sumatoria = $sumatoria + ($numerador/$denominador);
    $auxiliar = $numerador + $denominador;
    $denominador = $numerador;
    $numerador = $auxiliar;
}
echo "\nLa sumatoria es: ".$sumatoria;