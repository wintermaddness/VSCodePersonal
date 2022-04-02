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
/* Solicita la cant. de llamadas, el código internacional/de área y la duración (en segundos).
 * Muestra el tipo de llamada, el costo total de las llamadas y la cant. de llamadas de larga distancia.
 * int $cantLlamadas, $cantLargas, $valorTotalLlamadas, $codigoInt, $codigoArea, $cantLargas
 * float $duracion, $tarifa, $tarifaTotal
 * string $llamada
 */
$acumTiposLlamadas = "";
echo "¿Cuántas llamadas realizó?: ";
$cantLlamadas = trim(fgets(STDIN));
$cantLargas = 0;
$valorTotalLlamadas = 0;
for ($i=1; $i<=$cantLlamadas; $i++) {
    echo "Ingrese el código internacional: ";
    $codigoInt = trim(fgets(STDIN));
    echo "Ingrese el código de área: ";
    $codigoArea = trim(fgets(STDIN));
    echo "Ingrese la duración de la llamada (en segundos): ";
    $duracion = trim(fgets(STDIN));

    $llamada = tipoDeLlamada($codigoInt, $codigoArea);
    if ($llamada == "larga") {
        $cantLargas = $cantLargas + 1;
    }
    $tarifa = valorLlamada($llamada);
    $tarifaTotal = $duracion * $tarifa;
    //echo "| La llamada ".$i." es ".$llamada." ($".$tarifaTotal.")\n";
    $acumTiposLlamadas = $acumTiposLlamadas."| La llamada ".$i." es ".$llamada." ($".$tarifaTotal.")\n";
    $valorTotalLlamadas = $valorTotalLlamadas + $tarifaTotal;
}
echo $acumTiposLlamadas;
echo "El valor total de las ".$cantLlamadas." llamadas es de: $".$valorTotalLlamadas."\n";
echo "Cant. de llamadas de larga distancia: ".$cantLargas;