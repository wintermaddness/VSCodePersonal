<?php
/** Módulo 1: esNroElegido1 -
 * Elige ciertos números y los retorna en pantalla.
 * @param int $num
 * @return boolean 
 */
function esNroElegido1($num) {
    /* int $umbral, $i, boolean $bandera */
    $umbral = ((int)($num/2)) + 1;
    $bandera = true;
    for ($i=2; $i<$umbral; $i++) {
        if ($num % $i == 0) {
            $bandera = false;
        }
    }
    return $bandera;
}

/** Módulo 2: esNroElegido2 - 
 * Elige ciertos números y los retorna en pantalla.
 * @param int $num
 * @return boolean
*/
function esNroElegido2($num) {
    /* int $umbral, $i, boolean $bandera */
    $umbral = ((int)($num/2)) + 1;
    $bandera = true;
    $i = 2;
    while ($bandera && $i < $umbral) {
        $bandera = !($num % $i == 0);
        $i = $i + 1;
    }
    return $bandera;
}

/** Módulo 3: sumaElegidosMenores -
 * Suma los números naturales Elegidos menor o iguales al ingresado.
 * @param int $num
 * @return int
 */
function sumaElegidosMenores($num) {
    /* int $contador, $sumaNumeros */
    $sumaNumeros = 0;
    for ($contador=2; $contador<=$num; $contador++) {
        if (esNroElegido2($contador)) {
            $sumaNumeros = $sumaNumeros + $contador;
        }
    }
    return $sumaNumeros;
}

echo "Ingrese número: ";
$numero = trim(fgets(STDIN));
//Se invoca al módulo 1.
$resultado1 = esNroElegido1($numero);
if ($resultado1 = false) {
    echo "----------- Resultado 1: -----------\n";
    echo "false\n";
} else {
    echo "----------- Resultado 1: -----------\n";
    echo "true\n";
}
//Se invoca al módulo 2.
$resultado2 = esNroElegido2($numero);
if ($resultado2 = true) {
    echo "----------- Resultado 2: -----------\n";
    echo "true\n";
} else {
    echo "----------- Resultado 2: -----------\n";
    echo "false\n";
}
//Se invoca al módulo 3.
$resultado3 = sumaElegidosMenores($numero);
echo "\nResultado: ".$resultado3;