<?php
//ALGORITMO secuenciaDeLetras
//string $letra, $cantVocales
$cantVocales = 0;
do {
    echo "Ingrese letra (- para finalizar): ";
    $letra = trim(fgets(STDIN));
    if ($letra == "a") {
        $cantVocales = $cantVocales + 1;
    } elseif ($letra == "e") {
        $cantVocales = $cantVocales + 1;
    } elseif ($letra == "i") {
        $cantVocales = $cantVocales + 1;
    } elseif ($letra == "o") {
        $cantVocales = $cantVocales + 1;
    } elseif ($letra == "u") {
        $cantVocales = $cantVocales + 1;
    }
} while ($letra <> "-");
echo "Cant. de vocales: ".$cantVocales;