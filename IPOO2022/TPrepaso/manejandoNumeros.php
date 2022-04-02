<?php
// 1. Dado un número N retornar su factorial.
/** Módulo 1: factorial - 
 * Dado un nro N, retorna su factorial.
 * @param int $n
 * @return int
 */
function factorial($n) {
    //int $aux, $i, $resta
    $aux = $n;
    for ($i=1; $i<=$n; $i++) {
        $resta = $n - 1;
        $aux = $aux * $resta;
        $n = $resta;
    }
    return $aux;
}
echo "1. | Ingrese un número para saber su factorial: ";
$numero = trim(fgets(STDIN));
$resultado = factorial($numero);
echo "| El factorial de ".$numero." es: ".$resultado."\n";

//2. Dado un número N retornar verdadero si el número es par y falso en caso contrario.
/** Módulo 2: numeroPar - 
 * Retorna true si el número es par (false caso contrario).
 * @param int $nro
 * @return boolean
 */
function esNroPar($nro) {
    //boolean $res
    if ($nro % 2 == 0) {
        $res = true;
    } else {
        $res = false;
    }
    return $res;
}
echo "2. | Ingrese un número para saber si es par o no: ";
$numero = trim(fgets(STDIN));
$resultado = esNroPar($numero);
if ($resultado == true) {
    echo "El número ".$numero." es par.\n";
} else {
    echo "El número ".$numero." no es par.\n";
}

//3. Dado dos números N y M retornar verdadero si el número N es divisible por M y falso en caso contrario.
/** Módulo 3: nroDivisible - 
 * Retorna true si el número es divisible por M nro. (false caso contrario).
 * @param int $nroN, $nroM
 * @return boolean
 */
function nroDivisible($nroN, $nroM) {
    //boolean $res
    if ($nroN % $nroM == 0) {
        $res = true;
    } else {
        $res = false;
    }
    return $res;
}
echo "3. | Ingrese un número: ";
$n = trim(fgets(STDIN));
echo "| Ingrese el número divisor: ";
$m= trim(fgets(STDIN));
$resultado = nroDivisible($n, $m);
if ($resultado == true) {
    echo "El número ".$n." es divisible por ".$m.".\n";
} else {
    echo "El número ".$n." no es divisible por ".$m.".\n";
}

//4. Dado un arreglo de números enteros, determinar los valores máximo y mínimo, y las posiciones en que éstos se
//encontraban en el arreglo.
$arrayNros = [12, 10, 14, 18, 16, 20];
$n = count($arrayNros);
$nroMayor = 0;
$nroMenor = 999;

for ($i=0; $i<$n; $i++) {
    if ($arrayNros[$i] > $nroMayor) {
        $nroMayor = $arrayNros[$i];
        $posicionMayor = $i;
    }
    if ($arrayNros[$i] < $nroMenor) {
        $nroMenor = $arrayNros[$i];
        $posicionMenor = $i;
    }
}
echo "| Contenido del Arreglo |\n";
foreach ($arrayNros as $indice => $elemento) {
    echo "  + Número ".$indice.": ".$elemento."\n";
}
echo "+---------------------\n";
echo "| La posición del valor máximo es: ".$posicionMayor." (".$nroMayor.")\n";
echo "| La posición del valor mínimo es: ".$posicionMenor." (".$nroMenor.")\n";

//5. Cree una función leerNombres, cuyo parámetro de entrada formal es una cantidad n de nombres (ciclo definido), que solicite a un usuario
//los n nombres y los almacene en un arreglo indexado. La función debe retornar el arreglo indexado.
/** Módulo 4: leerNombres - 
 * Almacena una cierta cantidad de nombres y los retorna en un arreglo.
 * @param int $cantidad
 * @return array
 */
function leerNombres($cantidad) {
    //array $arrayNombres, int $i
    $arrayNombres = [];
    for ($i=0; $i<$cantidad; $i++) {
        echo "Nombre: ";
        $arrayNombres[$i] = trim(fgets(STDIN));
    }
    return $arrayNombres;
}
echo "5. | ¿Cuántos nombres desea ingresar?: ";
$cantNombres = trim(fgets(STDIN));
$resultado = leerNombres($cantNombres);
foreach ($resultado as $indice => $elemento) {
    echo "  + Nombre (en la posición ".$indice."): ".$elemento."\n";
}

//6. Dado un número que se corresponde a un año calendario, retornar un arreglo con todos los años bisiestos menores al año ingresado.
//Nota: Un año es bisiesto cuando es múltiplo de cuatro, exceptuando los múltiplos de 100 que no lo sean de 400. 

//7. Dado 2 arreglos A y B, de N y M elementos respectivamente. Construir un algoritmo que retorne un arreglo con los elementos de A mas
//los elementos de B.
/** Módulo 5: fusionArreglos - 
 * Fusiona dos arreglos con X elementos c/u y los retorna en un único arreglo.
 * @param array $arregloA, $arregloB
 * @return array
 */
function fusionarArreglos($arregloA, $arregloB) {
    //array $fusionArreglos, 
    $fusionArreglos = [];
    $elemA = count($arregloA);
    $elemB = count($arregloB);
    
    $n = 0;
    $d = 1;
    for ($i=0; $i<$elemA; $i++) {
        $fusionArreglos[$n] = $arregloA[$i];
        $n = $n + 2;
    }
    for ($i=0; $i<$elemB; $i++) {
        $fusionArreglos[$d] = $arregloB[$i];
        $d = $d + 2;
    }
    return $fusionArreglos;
}

$arrayA = [10, 12, 14, 16, 18, 20];
$arrayB = [11, 13, 15, 17, 19];
$resultado = fusionarArreglos($arrayA, $arrayB);
echo "7. | Elementos del arreglo A: \n";
foreach ($arrayA as $indice => $elemento) {
    echo "  + Posición ".$indice.": ".$elemento."\n";
}
echo "| Elementos del arreglo B: \n";
foreach ($arrayB as $indice => $elemento) {
    echo "  + Posición ".$indice.": ".$elemento."\n";
}
echo "| Elementos del arreglo fusionado: \n";
foreach ($resultado as $indice => $elemento) {
    echo "  + Posición ".$indice.": ".$elemento."\n";
}

//8. Dado 2 arreglos A y B, de N y M elementos respectivamente. Construir un algoritmo que retorne un arreglo con los elementos de A que
//no estan en B.
/** Módulo 6: elemQueNoEstanEnB - 
 * Retorna un arreglo con los elem. de A que no están en B.
 * @param array $arregloA, $arregloB
 * @return array
 */
function elemQueNoEstanEnB($arregloA, $arregloB) {
    //array $filtroA, 
    $filtroA = [];
    for ($i=0; $i<count($arregloA); $i++) {
        if ($arregloA[$i] <> $arregloB[$i]) {
            $filtroA[$i] = $$arregloA;
        }
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