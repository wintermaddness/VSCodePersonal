<?php
/** Módulo 1: secuencia - 
 * Mostrar secuencia.
 * @param int $num
 * @return void
 */
function secuencia($num) {
    /** int $numAnterior, $numMostrar, $auxiliar */
    $numAnterior = 0;
    $numMostrar = 1;
    while ($numMostrar <= $num) {
        echo $numMostrar."\n";
        $auxiliar = $numMostrar;
        $numMostrar = $numMostrar + $numAnterior;
        $numAnterior = $auxiliar;
    }
    echo "FIN";
}

echo "Ingrese un número: ";
$nro = trim(fgets(STDIN));
$secuencia = secuencia($nro);