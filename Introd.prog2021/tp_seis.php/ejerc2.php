<?php
// PROGRAMA principal
// int $numero, $suma
	$suma = 0;
	do {
		echo "Ingrese número (finaliza con cero): ";
		$numero = trim(fgets(STDIN));
		$suma = $suma + $numero;
	} while ($numero  <> 0);
	if ($suma > 0) {
        echo "La suma es: ".$suma;
    } else {
        echo "La suma de sus números es 0.";
    }