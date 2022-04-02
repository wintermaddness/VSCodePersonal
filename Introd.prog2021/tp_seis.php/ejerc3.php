<?php
/** Módulo 1: escribirPositivos - 
 * Imprime los números positiovs menores al número ingresado por el usuario.
 * @param int $numero
 */
function escribirPositivos ($numero) {
    /* int $positivo */
    echo "Los números positivos menores a ".$numero." son: ";
    for ($positivo=0; $positivo<$numero; $positivo++) { 
        echo $positivo;
    }
}