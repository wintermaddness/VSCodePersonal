<?php
//PROGRAMA principal - Lee y suma la secuencia de nros ingresados por el usuario.
echo "¿Cuántos números desea sumar?: ";
$cantidadNros = trim(fgets(STDIN));
$ingreso = 1;
$num = 0;
for ($i=0; $i<$cantidadNros; $i++) { 
    echo "Ingrese el número ".$ingreso.": ";
    $numero = trim(fgets(STDIN));
    $ingreso = $ingreso + 1;
    $num = $num + $numero;
}
$i = $num;
echo "La suma es: ".$i;