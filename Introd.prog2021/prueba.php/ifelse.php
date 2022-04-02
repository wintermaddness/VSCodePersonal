<?php
/** PROGRAMA principal */
/* int $unNumero */
	echo "Ingrese un número: ";
	$unNumero = trim(fgets(STDIN));
	if ($unNumero >= 0) {
		echo $unNumero." es positivo";
	}
	else {
		echo $unNumero." es negativo";
	}
	echo ".fin.";