<?php
//ALGORITMO secuenciaDePalabras
//string $palabra, $secuencia
$secuencia = "";
do {
    echo "Ingrese palabra (. para finalizar): ";
    $palabra = trim(fgets(STDIN));
    $secuencia = $secuencia.$palabra." ";
} while ($palabra <> ".");
echo $secuencia;