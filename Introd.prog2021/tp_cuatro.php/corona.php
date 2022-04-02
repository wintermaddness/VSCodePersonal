<?php
/**
* Módulo 1: Area circular -
* El módulo calcula el área circular.
* @param float $radio
* @return float
*/
function superficieCircular($radio)
{
    /* float $radio, $superficieC */
    $superficieC = 4 * M_PI * ($radio * $radio);
    return ($superficieC);
}

/**
* Módulo 2: Superficie corona - 
* El módulo calcula el área de la corona circular.
* @param float $radio, $radioR
* @return float
*/
function superficieCorona($radio, $radioR)
{
    /* float $r1, $r2, $areaCorona */
    $r1 = $radioR * $radioR;
    $r2 = $radio * $radio;
    $areaCorona = (M_PI * ($r1 - $r2));
    return ($areaCorona);
}
    
/**
* PROGRAMA principal
* Calcula y muestra el área circular a partir de los datos de radio menor y radio mayor.
* @param float $radio, $radioR, $corona
*/
    echo "Ingrese el radio menor: ";
    $radio = trim(fgets(STDIN));
    echo "Ingrese el radio mayor: ";
    $radioR = trim(fgets(STDIN));
    $corona = superficieCorona($radio, $radioR);
    echo " | El área de la corona circular es de: ".$corona;