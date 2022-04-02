<?php
/** sort: Ordena los elementos de menor a mayor.
 * Elimina cualquier clave existente y asigna nuevos índices a partir del 0.
*/
echo ">>> Ejemplo 1: \n";
$frutas = ["l"=>"limon", "n"=>"naranja", "m"=>"manzana", "d"=>"durazno"];
    sort($frutas);
    foreach ($frutas as $indice => $unafruta) {
        echo "$indice = $unafruta\n";
    }
/** rsort: Similar al "sort", pero ordena los elementos de mayor a menor.*/
echo ">>> Ejemplo 2: \n";
$frutas = ["l"=>"limon", "n"=>"naranja", "m"=>"manzana", "d"=>"durazno"];
    rsort($frutas);
    foreach ($frutas as $indice => $unafruta) {
        echo "$indice = $unafruta\n";
    }
/** asort: Ordena los elementos de menor a mayor.
 * Mantiene la correlación de los índices con los elementos con los que está asociado.
*/
echo ">>> Ejemplo 3: \n";
$frutas = ["l"=>"limon", "n"=>"naranja", "m"=>"manzana", "d"=>"durazno"];
    asort($frutas);
    foreach ($frutas as $indice => $unafruta) {
        echo "$indice = $unafruta\n";
    }
/** arsort: Similar al "asort", pero ordena los elementos de mayor a menor.*/
echo ">>> Ejemplo 4: \n";
$frutas = ["l"=>"limon", "n"=>"naranja", "m"=>"manzana", "d"=>"durazno"];
    arsort($frutas);
    foreach ($frutas as $indice => $unafruta) {
        echo "$indice = $unafruta\n";
    }
/** ksort: Ordena por clave de menor a mayor.
 * Mantiene la correlación de la clave con el elemento con los que está asociado.
 */
echo ">>> Ejemplo 5: \n";
$frutas = ["o"=>"limon", "n"=>"naranja", "m"=>"manzana", "d"=>"durazno"];
    ksort($frutas);
    foreach ($frutas as $indice => $unafruta) {
        echo "$indice = $unafruta\n";
    }
/** krsort: Similar al "ksort", pero ordena las claves de mayor a menor.*/
echo ">>> Ejemplo 6: \n";
$frutas = ["o"=>"limon", "n"=>"naranja", "m"=>"manzana", "d"=>"durazno"];
    krsort($frutas);
    foreach ($frutas as $indice => $unafruta) {
        echo "$indice = $unafruta\n";
    }
/** ORDENAMIENTO DEFINIDO POR EL USUARIO
 * uasort: Ordena los elementos usando una función de comparación definida por el usuario.
 * Mantiene la correlación de los índices con los elementos con los que está asociado.
 */
//Función de comparación - Definida para comparar los elementos del arreglo.
function cmp($a, $b) {
    if ($a == $b) {
        $orden = 0;
    } elseif ($a < $b) {
        $orden = -1;
    } else {
        $orden = 1;
    }
    return $orden;
}
echo ">>> Ejemplo 7: \n";
$arreglo = ['a'=>4,'b'=>8, 'c'=>-1,'d'=>-9];
uasort($arreglo, 'cmp');
foreach ($arreglo as $indice => $elemento) {
    echo "$indice = $elemento\n";
}
/** Recorrer una cadena de caracteres como un arreglo. */
echo ">>> Ejemplo 8: \n";
$cadena = "Dude, Where is my pie?";
for ($i=0; $i<strlen($cadena); $i++){
    echo "Letra $i: ".$cadena[$i]."\n";
}

function ordenSimboloO($arrayColeccion) {
    $letra = "O";
    natcasesort($arrayColeccion);
    $arrayInicial = array();
    $letra = strtolower($letra);
    if (count($arrayColeccion) > 0) {
        foreach ($arrayColeccion as $k => $v) {
            $elValor = strtolower($v);
            $siLetra = strpos($elValor, $letra) == 0;
            if ($siLetra) {
                $arrayInicial[$k] = $v;
                unset($arrayColeccion[$k]);
            }
        }
        $arrayFinal = $arrayInicial + $arrayColeccion;
    }
    return $arrayFinal;
}