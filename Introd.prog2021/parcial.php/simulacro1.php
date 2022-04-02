<?php
/** Módulo 1: tipoDeLlamada - 
 * Dados dos datos de entrada, determina el tipo de llamada.
 * @param int $codInternacional, $codArea
 * @return string
 */
function tipoDeLlamada($codInternacional, $codArea) {
    /* string $tipo */
    if ($codInternacional == 54) {
        if ($codArea == 299) {
            $tipo = "corta";
        } else {
            $tipo = "larga";
        }
    } else {
        $tipo = "internacional";
    }
    return $tipo;
}

/** Módulo 2: valorLlamada - 
 * Dado el tipo de llamada, retorna el valor de la misma por segundo.
 * @param string $tipoLlamada
 * @return float
 */
function valorLlamada($tipoLlamada) {
    /* float $valorSegundo */
    if ($tipoLlamada == "internacional") {
        $valorSegundo = 2;
    } elseif ($tipoLlamada == "larga") {
        $valorSegundo = 0.75;
    } else {
        $valorSegundo = 0.2;
    }
    return $valorSegundo;
}

/* PROGRAMA principal */
/* Solicita el cód. internacional, el cód. de área y la duración de la llamada (en segundos).
 * Muestra el tipo y valor de llamada.
 * int $codigoInt, $codigoArea
 * float $duracion, $tarifa, $tarifaTotal
 * string $llamada
 */
echo "Ingrese el código internacional: ";
$codigoInt = trim(fgets(STDIN));
echo "Ingrese el código de área: ";
$codigoArea = trim(fgets(STDIN));
echo "Ingrese la duración de la llamada (en segundos): ";
$duracion = trim(fgets(STDIN));
    $llamada = tipoDeLlamada($codigoInt, $codigoArea);
    $tarifa = valorLlamada($llamada);
    $tarifaTotal = $duracion * $tarifa;
if ($llamada == "internacional") {
    echo "Como se trata de una llamada ".$llamada.", su tarifa es de $".$tarifaTotal;
} elseif ($llamada == "larga") {
    echo "Como se trata de una llamada nacional de ".$llamada." distancia, su tarifa es de $".$tarifaTotal;
} elseif ($llamada == "corta") {
    echo "Como se trata de una llamada nacional de ".$llamada." distancia, su tarifa es de $".$tarifaTotal;
}