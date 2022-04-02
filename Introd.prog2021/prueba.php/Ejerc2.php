<?php
//Ejercicio de Repaso vinotecaNqn.php

function vinotecaNqn() {
    $arregloVinoteca = [];
    $arregloVinoteca[0] = ["variedad"=> "malbec", "cantBotellas" => "", "anioProduccion"=> "", "precioUnidad"=> ];
    $arregloVinoteca[1] = ["variedad"=> "cabernet", "cantBotellas" => "", "anioProduccion"=> "", "precioUnidad"=> ];
    $arregloVinoteca[2] = ["variedad"=> "merlot", "cantBotellas" => "", "anioProduccion"=> "", "precioUnidad"=> ];
    return $arregloVinoteca;
}

//a. Recibe un arreglo por parámetro formal ($arregloVinoteca) y retorna otro arreglo (cant. total de botellas y el precio promedio)
/** Módulo 1: valoresVinoteca - 
 * Retorna un arreglo con la cant. de botellas y el precio promedio de cada tipo de vino.
 * @param array $arregloVinoteca
 * @return array
 */
function valoresVinoteca($arregloVinoteca) {
    //Declaración de variables:
    $arregloValores = [];
    for ($i=0; $i<3; $i++) {
        $arregloValores = ["variedadVino"=> $arregloVinoteca["variedad"], "totalBotellas"=> $arregloVinoteca["cantBotellas"]];
        $precioPromedio = ($arregloValores["totalBotellas"]/$arregloVinoteca["variedad"]["precioUnidad"]);
        $arregloValores = ["variedadVino"=> $arregloVinoteca["variedad"], "totalBotellas"=> $arregloVinoteca["cantBotellas"], "precioPromedio"=> $precioPromedio];
    }
    return $arregloValores;
}

function promTemperaturas($arregloTemp) {
    $cantTemp = count($arregloTemp);
    $suma = 0;
    foreach ($arregloTemp as $elemento) {
        $suma = $suma + $elemento;
    }
    $promedio = $suma/$cantTemp;
    return $promedio;
}

//Leer la variedad de vino para acceder al inciso correspondiente del arregloVinoteca.
//1 unidad ____ $x --> ["precioUnidad"]
//x cantBotellas ____ $x --> ["cantBotellas"]
/**
 * $arregloValores = [];
 * $arregloValores[$arregloVinoteca["variedad"]] = $arregloVinoteca["cantBotellas"], $arregloVinoteca["precioUnidad"];
 */
//para cada variedad de vino, se accede a la cantidad de botellas y el precio unitario para calcular el promedio.
$arregloValores = [];
$unidadesBotellas = 0;
    {
        $unidadesBotellas = $unidadesBotellas + $arregloVinoteca["variedad"]["cantBotellas"];
        $precioPromedio = ($unidadesBotellas / $arregloVinoteca["variedad"]["precioUnidad"]); //¡REVISAR!
        $arregloValores[$arregloVinoteca["variedad"]] = ["cantBotellas"=> $unidadesBotellas, "precioPromedio"=> $precioPromedio];
    }