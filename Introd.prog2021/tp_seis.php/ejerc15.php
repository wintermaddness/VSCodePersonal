<?php
//ALGORITMO encontrarNumero
/** @param int $numero, $ingreso */
echo "Ingrese el número a encontrar: ";
$numero = trim(fgets(STDIN));
do {
    echo "Ingrese número para la secuencia: ";
    $ingreso = trim(fgets(STDIN));
    if ($ingreso == $numero) {
        echo $ingreso." fue encontrado.";
    } elseif ($ingreso == -1) {
        echo $numero." no fue encontrado.";
    }
} while ($ingreso == !0);