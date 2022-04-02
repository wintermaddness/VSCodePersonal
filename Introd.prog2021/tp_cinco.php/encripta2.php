<?php
/** Módulo 1: Encriptación - 
 * Recibe por parámetro formal un número y devuelve un número encriptado.
*/
function encriptado ($num){
 
    $n1 = (int)($num/1000);
    $n2 = (int)($num/100);
    $n3 = (int)($num/10);
    $n4 = (int)($num/1);

    $n1 = ($n1 + 7) % 10;
    $n2 = ($n2 + 7) % 10;
    $n3 = ($n3 + 7) % 10;
    $n4 = ($n4 + 7) % 10;

    $n1 = $n3 + $n1;
    $n3 = $n1 - $n3;
    $n1 = $n1 - $n3;

    $n2 = $n4 + $n2;
    $n4 = $n2 - $n4;
    $n2 = $n2 - $n4;

    $n1 = (int)($n1 * 1000);
    $n2 = (int)($n2 * 100);
    $n3 = (int)($n3 * 10);
    $n4 = (int)($n4 * 1);
    $numE = $n1 + $n2 + $n3 + $n4;
    return $numE;
}

/**
 * Módulo 2: Desencriptación - 
 * Recibe por parámetro formal un número entero encriptado y realiza la desencriptación del mismo.
 * @param int $numE, $de1, $de2, $de3, $de4, $numD
 * @return int
*/
function desencriptado ($numE)
{
    $d1 = (int)($numE/1000);
    $d2 = (int)($numE/100);
    $d3 = (int)($numE/10);
    $d4 = (int)($numE/1);
 
    $d1 = $d3 + $d1;
    $d3 = $d1 - $d3;
    $d1 = $d1 - $d3;
 
    $d2 = $d4 + $d2;
    $d4 = $d2 - $d4;
    $d2 = $d2 - $d4;
 
    $d1 = ($d1 + 3) % 10;
    $d2 = ($d2 + 3) % 10;
    $d3 = ($d3 + 3) % 10;
    $d4 = ($d4 + 3) % 10;
 
    $d1 = (int)($d1 * 1000);
    $d2 = (int)($d2 * 100);
    $d3 = (int)($d3 * 10);
    $d4 = (int)($d4 * 1);
    $numD = $d1 + $d2 + $d3 + $d4;
    return $numD;
}

/**
 * PROGRAMA encriptacion
 * @param int $numero, $numEncriptado, $numDesencriptado
*/
echo "Ingrese un número de 4 dígitos para encriptarlo: ";
$numero = trim(fgets(STDIN));
if($numero >= 1000 && $numero <= 9999) {
    $numEncriptado = encriptado($numero);
    echo "+---------------------------------+\n";
    echo "| Su número encriptado es el siguiente: ".$numEncriptado."\n";
    $numDesencriptado = desencriptado($numEncriptado);
    echo "| Su número desencriptado es el siguiente: ".$numDesencriptado;
    echo "\n+---------------------------------+";
} else {
    echo "+---------------------------------+\n";
    echo "| Error. El número ingresado no está entre los parámetros aceptables.\n";
    echo "  + Por favor, ingrese un número entre 1000 y 9999.";
    echo "\n+---------------------------------+";
}