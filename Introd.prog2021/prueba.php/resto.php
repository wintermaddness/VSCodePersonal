<?php

/* PROGRAMA resto */
/* Calcula el resto de una división. */
/* int $dividendo, $divisor, $cociente, $resto */

echo "Ingrese un número: ";
$dividendo = trim(fgets(STDIN));
echo "Ingrese un número divisor: ";
$divisor = trim(fgets(STDIN));
$cociente = (int) ($dividendo / $divisor);
//echo "El cociente es: ".$cociente."\n";
$resto = $dividendo - ($divisor * $cociente);
echo "El resto de dividir ".$dividendo." por ".$divisor." es: ".$resto;