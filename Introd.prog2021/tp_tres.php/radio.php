<?php
//Permite ingresar un radio R:
//a. Calcular y mostrar el diámetro y el perímetro de la circunferencia de radio R.
//b. La superficie del círculo de radio R.
//c. El volumen y la superficie de la esfera de radio R.

/*PROGRAMA radio */
/* float $radio, $diametro, $perimetro, $superficieC, $volumen, $superficieE */
echo "Ingrese el radio: ";
$radio = trim(fgets(STDIN));
$diametro = $radio * 2;
$perimetro = $diametro * M_PI;
$superficieC = $perimetro;
$superficieE = 4 * M_PI * ($radio * $radio);
$volumen = 4/3 * M_PI * ($radio * $radio * $radio);
echo "El diámetro de la circunferencia es: ".$diametro."\n";
echo "El perímetro de la circunferencia es: ".$perimetro."\n";
echo "La superficie de la circunferencia de ".$radio." es: ".$superficieC."\n";
echo "La superficie de la esfera es: ".$superficieE."\n";
echo "Dado el radio ".$radio." el volumen de la esfera es de: ".$volumen;