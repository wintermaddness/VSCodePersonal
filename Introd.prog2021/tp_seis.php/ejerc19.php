<?php
//ALGORITMO contadorPalabras
// string $palabra, int $cantidad, contador($i)
echo "¿Cuántas palabras desea ingresar?: ";
$cantidad = trim(fgets(STDIN));
$i = 1;
while ($i <= $cantidad) {
    echo "Ingrese palabra: ";
    $palabra = trim(fgets(STDIN));
    echo "Su palabra número ".$i." es: ".$palabra."\n";
    $i = $i + 1;
}