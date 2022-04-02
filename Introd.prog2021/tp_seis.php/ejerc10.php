<?php
//ALGORITMO sumatoria - Dado un número, calcula la sumatoria.
// int $numero, $sumatoria, $contador
echo "Ingrese un número para obtener la sumatoria: ";
$numero = trim(fgets(STDIN));
$contador = 1;
    while ($contador <= $numero) {
    $sumatoria = (($numero) * ($numero + 1))/2;
    echo $contador." + ";
    $contador = $contador + 1;
}
echo "\nEl resultado es: ".$sumatoria;