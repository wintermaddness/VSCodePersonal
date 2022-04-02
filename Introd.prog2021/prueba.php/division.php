<?php
/* División de dos variables. */
/* numA, numB, result1, result2 */

$numA = 30;
$numB = 5;

$result1 = $numB/$numA;
$result2 = (int)($numB/$numA);
/* En la línea anterior se usa int para especificar el tipo
de valor que se obtendrá de la división: números enteros.*/
echo $result1. "\n";
echo $result2. "\n";