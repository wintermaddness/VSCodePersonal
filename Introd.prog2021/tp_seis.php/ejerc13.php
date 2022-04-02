<?php
//PROGRAMA fibonacci
//Genera los primeros términos de la sucesion de fibonacci
// int $n, $i, $terminoNuevo, $terminoAnterior, $aux
 
echo "Ingrese la cantidad de términos de la sucesión: ";
$n = trim(fgets(STDIN));
$terminoAnterior = 0;
$terminoNuevo = 1;
echo ">> Resultados: \n";
for ($i=1; $i<=$n; $i++) {
    echo $terminoNuevo;
    $aux = $terminoNuevo;
    $terminoNuevo = $terminoNuevo + $terminoAnterior;
    $terminoAnterior = $aux;
}