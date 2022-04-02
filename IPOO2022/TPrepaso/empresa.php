<?php
//Dada una estructura de arreglos asociativos, donde cada posición almacena un
//arreglo con la cantidad recaudada (en pesos) y costo total (en pesos), en el
//que cada mes del año se corresponde con la posición del arreglo dentro del otro
//arreglo; implementar un algoritmo que calcule cuál fue el mes que arrojó mayor
//ganancia.

//$arrayRecaudacion = [_______________-______________];
//                    $cantRecaudada  $costoTotal;

$cantRecaudada = ["Enero"=>1000, "Febrero"=>2000, "Marzo"=>3000, "Abril"=>4000, "Mayo"=>5000, "Junio"=>6000,
                "Julio"=>600, "Agosto"=>500, "Septiembre"=>400, "Octubre"=>300, "Noviembre"=>200, "Diciembre"=>100];
$costoTotal = ["Enero"=>1100, "Febrero"=>1200, "Marzo"=>1300, "Abril"=>1400, "Mayo"=>1500, "Junio"=>1600,
                "Julio"=>2100, "Agosto"=>2200, "Septiembre"=>2300, "Octubre"=>2400, "Noviembre"=>2500, "Diciembre"=>2600];

function arreglosFusionados($recaudacion, $costo) {
    $arrayRecaudacion = [];
    $arrayRecaudacion = ["Recaudacion"=>$recaudacion, "Costo"=>$costo];
    return $arrayRecaudacion;
}

function totalRecaudado($recaudacion) {
    $totalRecaudado = 0;
    foreach ($recaudacion as $elemento) {
        $totalRecaudado = $totalRecaudado + $elemento;
    }
    return $totalRecaudado;
}

function costoFinal($costo) {
    $costoFinal = 0;
    foreach ($costo as $elemento) {
        $costoFinal = $costoFinal + $elemento;
    }
    return $costoFinal;
}

$resultado1 = totalRecaudado($cantRecaudada);
echo "| Total recaudado (en pesos): $".$resultado1."\n";
$resultado2 = costoFinal($costoTotal);
echo "| Costo total (en pesos): $".$resultado2."\n";
$vistaArreglos = arreglosFusionados($cantRecaudada, $costoTotal);
foreach ($vistaArreglos as $indice => $elemento) {
    echo "Dato ".$indice.": ".$elemento."\n";
}



$arrayFusionado = [
    "Recaudación" => $recaudacion,
    "Costo" => $costo
];