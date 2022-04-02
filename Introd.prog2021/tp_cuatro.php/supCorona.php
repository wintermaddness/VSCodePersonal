<?php
/**
* Módulo 1: Área circular -
* Calcula la superficie de un círculo en base al radio ingresado.
* @param float $radio
* @return float
*/
function supCircular($radio){
    /* float $radio, $superficie */
    $superficie = M_PI * ($radio * $radio);
    return $superficie;
}
 
/**
* Módulo 2: Superficie corona circular - 
* Calcula el área de la corona circular.
* @param float $menor, $mayor
* @return float
*/
function supCoronaCircular($mayor, $menor){
    /* float $menor, $mayor, $supCorona */
    $supCorona = $mayor - $menor;
    return $supCorona;
}
 
/**
* PROGRAMA principal
* Calcula y muestra el área circular a partir de los datos de radio menor y radio mayor.
* @param float $radio, $radio2, $sup1, $sup2, $supCorona
*/
echo "Ingrese el radio del círculo mayor: ";
$radio = trim(fgets(STDIN));
echo "Ingrese el radio del círculo menor: ";
$radio2 = trim(fgets(STDIN));
$sup1 = supCircular($radio);
echo "La superficie circular dado el radio ".$radio." es: ".$sup1."\n";
$sup2 = supCircular($radio2);
echo "La superficie circular dado el radio ".$radio2." es: ".$sup2."\n";
$superficieCorona = supCoronaCircular($sup1,$sup2);
echo "El área de la corona circular es de: ".$superficieCorona;