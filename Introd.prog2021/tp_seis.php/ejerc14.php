<?php
//ALGORITMO porcentajeSecuencia
//int
echo "Ingrese un número para calcular sus múltiplos: ";
$numero = trim(fgets(STDIN));
$secuencia = 0;
echo "¿Desea ingresar un número de la secuencia? (s/n): ";
    $ingreso = trim(fgets(STDIN));
do {    
    if ($ingreso == "s") {
        echo "Número de la secuencia: ";
        $nroSecuencia = trim(fgets(STDIN));
        if ($nroSecuencia % $numero == 0) {
            $secuencia = $secuencia + $nroSecuencia;
        }
        echo "Múltiplos (valor de secuencia): ".$secuencia."\n";
    } else {
        echo "No se ingresaron números en la secuencia.";
    }
    $porcentaje = ($secuencia * $numero)/100;
    echo "¿Desea ingresar otro número de la secuencia? (s/n): ";
    $hayIngreso = trim(fgets(STDIN));
} while ($hayIngreso == "s");
echo "El porcentaje de los múltiplos de ".$numero." es: ".$porcentaje."%";