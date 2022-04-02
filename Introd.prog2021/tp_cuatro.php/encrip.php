<?php
/**
 * Módulo 1: Encriptación - 
 * Recibe por parámetro formal un número y devuelve un número encriptado.
 * @param int $num, $n1, $n2, $n3, $n4
 * @return int
*/
function encriptado ($num){
/* 
/** * Obtenemos cada número del número ingresado.*/
    $n1 = (int)($num / 1000);
    $n2 = (int)($num / 100);
    $n3 = (int)($num / 10);
    $n4 = (int)($num / 1);
 
/**
 * Para encriptarlos, les sumamos 7 a cada número y obtenemos el resto entre ese número y 10.*/
    $n1 = (int) ($n1 + 7) % 10;
    $n2 = (int) ($n2 + 7) % 10;
    $n1 = (int) ($n3 + 7) % 10;
    $n2 = (int) ($n4 + 7) % 10;
    
/**
 * Ahora cambiamos de lugar el primer dígito con el tercero y luego el segundo con el cuarto.*/
    $n1 = $n3 + $n1;
    $n3 = $n1 - $n3;
    $n1 = $n1 - $n3;
 
    $n2 = $n4 + $n2;
    $n4 = $n2 - $n4;
    $n2 = $n2 - $n4;
    
/**
 * Una vez realizada la encriptación, ahora lo pasaremos a un número entero.*/
    $n1 = (int)($n1 * 1000);
    $n2 = (int)($n2 * 100);
    $n3 = (int)($n3 * 10);
    $n4 = (int)($n4 * 1);
    $num = $n1 + $n2 + $n3 + $n4;
/**
 * Retornamos el número entero encriptado.*/
    return $num;
}
 
/**
 * Módulo 2: Desencriptación - 
 * Recibe por parámetro formal un número entero encriptado y realiza la desencriptación del mismo.
 * @param int $numE, $de1, $de2, $de3 , $de4, $numD
 * @return int
*/
function desencriptado ($numE){
/**
 * Obtenemos cada dígito del número ingresado.
*/
    $de1 = (int)($numE / 1000);
    $de2 = (int)($numE / 100);
    $de3 = (int)($numE / 10);
    $de4 = (int)($numE / 1);
 
/**
 * Una vez obtenidos los números, se procede a volverlos a su posición inicial,
 * cambiando de lugar el 1° dígito con el 3° dígito y el 2° dígito con el 4°dígito.*/
 
    $de1 = $de3 + $de1;
    $de3 = $de1 - $de3;
    $de1 = $de1 - $de3;
 
    $de2 = $de4 + $de2;
    $de4 = $de2 - $de4;
    $de2 = $de2 - $de4;
/**
 * Ahora desencriptamos los números.
*/
    $de1 = ($de1 + 3) % 10;
    $de2 = ($de2 + 3) % 10;
    $de3 = ($de3 + 3) % 10;
    $de4 = ($de4 + 3) % 10;

/**
 * Ahora se obtiene el número entero.
*/
    $de1 = (int) ($de1 * 1000);
    $de2 = (int) ($de2 * 100);
    $de3 = (int) ($de3 * 10);
    $de4 = (int) ($de4 * 1);
    $numD = $de1 + $de2 + $de3 + $de4;
 
/**
 * Retorna el número desencriptado.
*/
    return $numD;
}
 
/**
 * PROGRAMA encriptacion
 * @param int $numero, $numEncriptado, $numDesencriptado
*/
    echo "Ingrese un número de 4 dígitos para encriptarlo: ";
    $numero = trim(fgets(STDIN));
    $numEncriptado = encriptado($numero);
    echo "Su número encriptado es el siguiente: ".$numEncriptado."\n";
    $numDesencriptado = desencriptado($numEncriptado);
    echo "Su número desencriptado es el siguiente: ".$numDesencriptado;