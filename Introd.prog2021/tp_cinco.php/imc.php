<?php
/** Módulo 1: calculoIMC -
 * Calcula el IMC
 */
function calculoIMC($masa, $estatura){ 
    $imc = $masa / ($estatura * $estatura);
    return $imc;
}

/** Módulo 2: nutricion -
 *  Retorna clasificación del estado nutricional
 */
function nutricion($imc){
    if($imc < 18.50){
        $tipoIMC = 'Bajo Peso';
    } elseif($imc >= 18.5 && $imc <= 24.99){
        $tipoIMC = 'Normal';
    } elseif($imc >= 25.00 && $imc <= 29.99){
        $tipoIMC = 'Sobrepeso';
    } elseif($imc >= 30.00 && $imc <= 34.99){
        $tipoIMC = 'Obesidad leve';
    } elseif($imc >= 35.00 && $imc <= 39.99){
        $tipoIMC = 'Obesidad media';
    } elseif($imc >= 40){
        $tipoIMC = 'Obesidad mórbida';
    }
    return $tipoIMC;
}

/** PROGRAMA principal - Indica el estado nutricional. */
    echo "Ingrese su peso: ";
    $peso = trim(fgets(STDIN));
    echo "Ingrese su altura: ";
    $altura = trim(fgets(STDIN));
    $imc = calculoIMC($peso, $altura);
    $estadoNutricion = nutricion($imc);
    echo "Su IMC es de: ".$imc."\n";
    echo "Su estado nutricional es: ".$estadoNutricion;