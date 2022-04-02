<?php
echo "Ingrese un número de 4 dígitos: ";
$num = trim(fgets(STDIN));
	$d1 = (int)($num/1000);
	$d2 = (int)($num/100);
	$d3 = (int)($num/10);
	$d4 = (int)($num/1);
 
	$d1 = $d3 + $d1 ;
	$d3 = $d1 - $d3;
	$d1 = $d1 - $d3;
 
	$d2 = $d4 + $d2;
	$d4 = $d2 - $d4;
	$d2 = $d2 - $d4;
 
	$d1 = ($d1+3) % 10;
	$d2 = ($d2+3) % 10;
	$d3 = ($d3+3) % 10;
	$d4 = ($d4+3) % 10;
echo "Su número desencriptado es: ".$d1.$d2.$d3.$d4;