<?php
/** Módulo 1: Calcular agua destilada - 
 * Recibe por parámetro la cantidad de loratadina y la cantidad de betametasona.
 * Retorna la cantidad de agua destilada obtenida.
 * @param int $loratadina, $betametasona
 * @return int
 */
function calcAguaDestilada($lora, $beta){
    /** Entero  lora, beta, agua */
    $agua = (int)($lora * 10 / 100) + ($beta * 15 / 100);
    return $agua;
}
 
/** 
 * PROGRAMA principal - 
 * Solicita la cantidad de betametasona y la cantidad de loratadina utilizados y,
 * utilizando el módulo hecho anteriormente, mostrar la cantidad de agua necesaria.
 */
    /* int Loratadina, Betametasona, aguaNecesitada */
    echo "Ingrese la cantidad de Betametasona utilizada: ";
    $betametasona = trim(fgets(STDIN));
    echo "Ingrese la cantidad de Loratadina utilizada: ";
    $loratadina = trim(fgets(STDIN));
    $aguaNecesitada = calcAguaDestilada($loratadina, $betametasona);
    echo "La cantidad de agua necesaria es de: ".$aguaNecesitada." litros.";