<?php
/** Módulo 6: elemQueNoEstanEnB - 
 * Retorna un arreglo con los elem. de A que no están en B.
 * @param array $arregloA, $arregloB
 * @return array
 */
function elemQueNoEstanEnB($arregloA, $arregloB) {
    //array $filtroA, 
    $filtroA = [];
    for ($i=0; $i<count($arregloA); $i++) {
        $n = 0;
        if ($arregloA[$i] <> $arregloB[$i]) {
                $filtroA[$n] = $arregloA[$i];
        }
        $n++;
    }
    return $filtroA;
}

$arrayA = [1, 2, 3, 4, 5, 9];
$arrayB = [1, 4, 5, 6, 7, 8];
$resultado = elemQueNoEstanEnB($arrayA, $arrayB);
echo "8. | Elementos del arreglo filtrado: \n";
foreach ($resultado as $indice => $elemento) {
    echo "  + Posición ".$indice.": ".$elemento."\n";
}