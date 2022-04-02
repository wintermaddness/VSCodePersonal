<?php
/** Módulo 1: esNroPar - 
 * Determina si un número es par o no.
 * @param int $nro
 * @return boolean
 */
function esNroPar($nro) {
    /* boolean $resp */
    if ($nro % 2 == 0) {
        $resp = true;
    } else {
        $resp = false;
    }
    return $resp;
}

/** PROGRAMA principal 
 * Declaración de variables:
 * int $cantNros, $numero, $i, $parMenor, $cantPares
 * string $secuencia
 * boolean $numPar
*/
//Inicialización de variables
$parMenor = 9999999;
$cantPares = 0;
$secuencia = "";
//Proceso
echo "¿Cuántos números desea ingresar a la secuencia?: ";
$cantNros = trim(fgets(STDIN));
if ($cantNros > 0) {
    for ($i=0; $i<$cantNros; $i++) {
        echo "Ingrese un número: ";
        $numero = trim(fgets(STDIN));
        $secuencia = $secuencia.$numero." ";
        $numPar = esNroPar($numero);
        if ($numPar == true && $numero < $parMenor) {
            $parMenor = $numero;
            $cantPares = $cantPares + 1; //Sólo toma el numero par menor
        }
    }
    echo ">> Secuencia ingresada: ".$secuencia."\n";
    if ($cantPares > 0) {
        echo "Cantidad de números pares: ".$cantPares."\n";
        echo "El número par menor es: ".$parMenor."\n";
    } else {
        echo "No hay números pares para analizar."."\n";
    }
} else {
    echo "No se ingresó una secuencia de números."."\n";
}
//---------------------------------------------------------------------+

/** Módulo 1: esPar - 
 * Determina si un número es par.
 * @param int $nro
 * @return boolean
 */
function esPar($nro) {
    /** boolean $resp */
    if ($nro % 2 == 0) {
        $resp = true;
    } else {
        $resp = false;
    }
    return $resp;
}

//PROGRAMA principal
/** Declaración de variables:
 * int $cant, $numero, $parMenor, $i, $cantPares
 * boolean $resultado
 */
//Inicializar variables especiales
$parMenor = 999999;
$cantPares = 0;
//Solicitarle al usuario la cantidad de números a leer
echo "Por favor, ingrese la cantidad de números a leer: ";
$cant = trim(fgets(STDIN));
if ($cant == 0) {
    echo "No existe secuencia de números.";
} else {
    for ($i=0; $i<$cant; $i++) {
        echo "Ingrese un número: ";
        $numero = trim(fgets(STDIN));
        $resultado = esPar($numero);
        if ($resultado == true) {
            $cantPares = $cantPares + 1;
            if ($numero < $parMenor) {
                $parMenor = $numero;
            }
        }
    }
    if ($cantPares == 0) {
        echo "No hay números pares para analizar.";
    } else {
        echo "El número par menor es: ".$parMenor;
    }
}