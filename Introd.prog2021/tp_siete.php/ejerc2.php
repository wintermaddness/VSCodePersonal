<?php
/** Módulo 1: valorTotalCelulares - 
 * Recibe un arreglo de valores y retorna el total del costo de celulares.
 * @param float array
 * @return float
 */
function valorTotalCelulares($arregloValor) {
    /** float $suma, int $n, $i */
    $suma = 0;
    $n = count($arregloValor);
    for ($i=0; $i<$n; $i++) {
        $suma = $suma + $arregloValor[$i];
    }
    return $suma;
}

//Arreglo 1: Celulares
$celulares = [];
$celulares[0] = "Moto G6";
$celulares[1] = "Samsumg J7";
$celulares[2] = "LG K9";
$celulares[3] = "iPhone SE";
$celulares[4] = "Galaxy A9";
//Arreglo 2: Valores
$valor = [];
$valor[0] = 22030.90;
$valor[1] = 10500.00;
$valor[2] = 27999.00;
$valor[3] = 38105.00;
$valor[4] = 17000.80;

//PROGRAMA principal
/** Declaración de variables
 * int $limite, $nro
 * float $costoTotal
 * boolean $bandera
 */
//Inicialización de variables:
$limite = count($celulares);
$bandera = false;
//Proceso:
echo "¿Qué celular desea mostrar? (0-4): ";
$nro = trim(fgets(STDIN));
//Se valida que el usuario ingrese una opción válida:
do {
    if (!(is_numeric($nro)) || ($nro >= $limite || $nro < 0)) {
        echo "Opción inválida. Ingrese un número válido (0-4): ";
        $nro = trim(fgets(STDIN));
    } else {
        echo "| El celular ".$nro." es un ".$celulares[$nro]." ($".$valor[$nro].")\n";
        $costoTotal = valorTotalCelulares($valor);
        echo "| Valor total de todos los celulares: $".$costoTotal;
        $bandera = true;
    }
} while ($bandera == false);