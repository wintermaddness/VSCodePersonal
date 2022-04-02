<?php
//ALGORITMO secuenciaInversa
// string $palabra, $secuencia
$secuencia = "";
do {
    echo "Ingrese palabra (. para finalizar): ";
    $palabra = trim(fgets(STDIN));
    $secuencia = $palabra." ".$secuencia;
} while ($palabra <> ".");
echo $secuencia;