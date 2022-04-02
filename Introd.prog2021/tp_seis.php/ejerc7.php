<?php
/** Módulo 1: verificacionImpares - 
 * Realiza la suma de los números impares naturales.
 * @param int $primerNro, $segundoNro
 * @return int
 */
function verificacionImpares($primerNro, $segundoNro) {
//Invertimos los valores en caso de que el usuario ingrese un número mayor primero y luego uno menor.
    if ($primerNro > $segundoNro) {
        $primerNro = $primerNro + $segundoNro;
        $segundoNro = $primerNro - $segundoNro;
        $primerNro = $primerNro - $segundoNro;
    }
//Nos fijamos si el número menor es par o impar.
    if ($primerNro % 2 == 0) {
        $numsRetorno = $primerNro + 1; //En caso de ser par le sumamos 1 y contamos desde ahí
    } else { //En caso de ser impar le sumamos 2 y contamos desde ahí
        $numsRetorno = $primerNro + 2;
    }
    return $numsRetorno;
}

/** PROGRAMA principal */
echo "Ingrese un número a: "; //Solicitamos los 2 valores
$numA = trim(fgets(STDIN));
echo "Ingrese un número b: ";
$numB = trim(fgets(STDIN));
//Realizamos el llamado del módulo.
$impares = verificacionImpares($numA, $numB);
//Inicializamos la variable.
$numsRetornoSumados = 0;
for($i=$impares;$i<$numB;$i=$i + 2){
    $numsRetornoSumados = $numsRetornoSumados + $i;//i++ es equivalente a i=i+1    	
}
echo "La suma es: ".$numsRetornoSumados;