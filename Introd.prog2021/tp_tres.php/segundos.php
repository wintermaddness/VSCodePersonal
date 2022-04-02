<?php
/* PROGRAMA segundos
El programa pasará los segundos ingresados a horas, minutos y segundos.
Entero segundos, minutos, horas*/

echo "Ingrese la cantidad de segundos que desea convertir: ";
	$segundos = trim(fgets(STDIN));
	$horas = (int)($segundos/3600);
	$minutos= (int)($segundos % 3600/60);
	$segundos=(int)($segundos % 3600) - (60 * $minutos);
echo "La cantidad de segundos ingresados equivale a: ".$horas.":".$minutos.":".$segundos;