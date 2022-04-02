<?php
/** Retorna el nro de la posición del elemento. */
//Sintaxis 1
echo ">>> Ejemplo 1: \n";
$arreglo = [31, 21, 12, 1, 5];
foreach ($arreglo as $indice => $elemento) {
    echo "El elemento de la posición ".$indice." es ".$elemento."\n";
}
//Sintaxis 2
echo ">>> Ejemplo 2: \n";
foreach ($arreglo as $elemento) {
    echo "El elemento es ".$elemento."\n";
}
/** Imprime los siguientes resultados:
 * SINTAXIS 1:
 * El elemento de la posición 0 es 31
 * El elemento de la posición 1 es 21
 * El elemento de la posición 2 es 12
 * El elemento de la posición 3 es 1 
 * El elemento de la posición 4 es 5
 * SINTAXIS 2:
 * El elemento es 31
 * El elemento es 21
 * El elemento es 12
 * El elemento es 1
 * El elemento es 5 */
/** Retorna la suma de todos los elementos enteros de $arreglo. */
echo ">>> Ejemplo 3: \n";
$arreglo = [10, 20, -20, 1];
$n = count($arreglo);
$suma = 0;
for ($i=0; $i<$n; $i++) {
    $suma = $suma + $arreglo[$i];
    echo "".$arreglo[$i]." + ";
}
echo "\nResultado: ".$suma;