<?php
// PROGRAMA principal
// int $numeroPar, $numeroLimite
	$numeroPar = 2;
	echo "Ingrese un número: ";
	$numeroLimite = trim(fgets(STDIN));
	while ($numeroPar <= $numeroLimite) {
		echo $numeroPar."\n";
		$numeroPar = $numeroPar + 2;
	}