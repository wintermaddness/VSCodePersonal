<?php
echo "Ingrese un número para calcular la sumatoria: ";
$numero = trim(fgets(STDIN));
$sumatoria = 0;
$resultado = "";
for ($i=1; $i<=$numero; $i++) {
    $j = 1;
    if ($j % 2 == 1) {
        $valor = $j + 2;
        $resultado = $resultado.$valor." + ";
        $sumatoria = $sumatoria + $valor;
    }
}
echo "\nEl resultado es: ".$sumatoria;