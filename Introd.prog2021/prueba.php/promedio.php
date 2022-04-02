<?php
/* PROGRAMA promedio */
/* STRING $nombre, $apellido, ENTERO $nota1, $nota2, $nota3, $resultado, FLOAT $promedio */
	echo ("Ingrese nombre del alumno: ");
	$nombre = trim(fgets(STDIN));
	echo ("Ingrese apellido del alumno: ");
	$apellido = trim(fgets(STDIN));
	echo ("Ingrese nota: ");
	$nota1 = trim(fgets(STDIN));
	echo ("Ingrese nota: ");
	$nota2 = trim(fgets(STDIN));
	echo ("Ingrese nota: ");
	$nota3 = trim(fgets(STDIN));
	$resultado = $nota1 + $nota2 + $nota3;
	$promedio = $resultado / 3;
    echo ("El promedio de ".$nombre.$apellido." es: ".$promedio);