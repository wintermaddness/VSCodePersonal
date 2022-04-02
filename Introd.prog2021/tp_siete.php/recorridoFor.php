<?php
/** Obtiene el promedio de los elementos de $arreglo. */
$arreglo = [31, 21, 12, 1, 5];
$n = count($arreglo);
$suma = 0;
for ($i=0; $i<$n; $i++) {
    $suma = $suma + $arreglo[$i];
    echo "".$arreglo[$i]." + ";
}
$promedio = (int)($suma/$n);
echo "\n| Cálculo: ".$suma."/".$n." = ".$promedio;
echo "\n| El promedio es: ".$promedio;