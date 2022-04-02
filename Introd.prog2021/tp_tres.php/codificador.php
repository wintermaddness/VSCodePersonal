<?php
echo "Ingrese un número de 4 dígitos: ";
$num = trim(fgets(STDIN));
	$d1 = (int)($num/1000);
	$d2 = (int)($num/100);
	$d3 = (int)($num/10);
	$d4 = (int)($num/1);
 
	$d1 = ($d1+7) % 10;
	$d2 = ($d2+7) % 10;
	$d3 = ($d3+7) % 10;
	$d4 = ($d4+7) % 10;
 
	$d1 = $d3 + $d1 ;
	$d3 = $d1 - $d3;
	$d1 = $d1 - $d3;
 
	$d2 = $d4 + $d2;
	$d4 = $d2 - $d4;
	$d2 = $d2 - $d4;
echo "Su número encriptado es: ".$d1.$d2.$d3.$d4;