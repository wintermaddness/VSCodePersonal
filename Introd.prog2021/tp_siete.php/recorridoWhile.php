<?php
/** Retorna la posición del elemento par de $arreglo. */
//Recorrido parcial - Ejemplo 1
$arreglo = [1, 3, 8, 5];
$n = count($arreglo);
$i = 0;
echo ">>> Ejemplo 1: \n";
while ($i<$n && ($i % 2 == 0)) {
    foreach ($arreglo as $indice => $elemento) {
        if ($elemento % 2 == 0) {
            echo "El elemento ".$elemento." de la posición ".$indice." es par.\n";
        }
    }
    $i = $i + 1;
}
//Recorrido parcial - Ejemplo 2
$arreglo = [1, 11, 9, 5, 9];
$n = count($arreglo);
$i = 0;
echo ">>> Ejemplo 2: \n";
while ($i<$n && ($i % 2 == 0)) {
    foreach ($arreglo as $indice => $elemento) {
        if ($elemento % 2 == 0) {
            echo "El elemento ".$elemento." de la posición ".$indice." es par.\n";
        } else {
            echo "El elemento ".$elemento." de la posición ".$indice." no es par.\n";
        }
    }
    $i = $i + 1;
}
//Recorrido parcial - Ejemplo 3
$arreglo = [10, 20, -20, 1];
$n = count($arreglo);
$i = 0;
echo ">>> Ejemplo 3: \n";
while ($i<$n && ($i % 2 == 0)) {
    foreach ($arreglo as $indice => $elemento) {
        if ($elemento < 0) {
            echo "El elemento ".$elemento." de la posición ".$indice." es negativo.\n";
        } else {
            echo "El elemento ".$elemento." de la posición ".$indice." no es negativo.\n";
        }
    }
    $i = $i + 1;
}