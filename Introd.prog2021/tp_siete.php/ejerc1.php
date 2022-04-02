<?php
//ARREGLO INDEXADO
/** Libreria de funciones de temperatura:
 * a. leerTemperaturas
 * b. listarTemperaturas
 * c. promTemperaturas
 * d. porcTemperaturasSuperiores
 * e. minTemperatura
 * f. maxTemperatura
 * g. extremosTemperatura
 * h. PROGRAMA principal
 */

/** Módulo 1: leerTemperaturas - 
 * Almacena las temperaturas ingresadas por el usuario.
 * @param int
 * @return int
 */
function leerTemperaturas($temp, $cont) {
    $temperatura = $temp;
    $arreglo = [];
    for ($j=1; $j<=$cont; $j++) {
        $arreglo = [$temperatura];
    }
    //print_r($arreglo);
    return $arreglo;
}
/** Módulo 2: listarTemperaturas - 
 * Muestra todas las temperaturas en pantalla.
 * @param int
 */
function listarTemperaturas($temp) {
    for ($j=0; $j<count($temp); $j++) {
        //$retorno = [$temp];
        foreach ($temp as $elemento) {
            return [$elemento];
        }
    }
    //print_r($retorno);
}
/** Módulo 3: promTemperaturas - 
 * Retorna el promedio de temperaturas.
 * @param int
 * @return int
 */
function promTemperaturas($arregloTemp) {
    $cantTemp = count($arregloTemp);
    $suma = 0;
    foreach ($arregloTemp as $elemento) {
        $suma = $suma + $elemento;
    }
    $promedio = $suma/$cantTemp;
    return $promedio;
}
/** Módulo 4: porcTemperaturasSuperiores - 
 * Retorna el porcentaje de temp. que superan una temp. determinada.
 * @param int
 * @param int
 */
function porcTemperaturasSuperiores($arregloTemp, $tempLimite) {
    $superior = 0;
    $cantTemp = count($arregloTemp);
    foreach ($arregloTemp as $elemento) {
        if ($elemento > $tempLimite) {
            $superior = $superior + 1;
        }
    }
    $porcentajeTemp = ($superior * 100)/$cantTemp;
    return $porcentajeTemp;
}
/** Módulo 5: minTemperatura - 
 * Retorna el índice de la menor temperatura.
 * @param int
 * @return int
 */
function minTemperatura($arregloTemp) {
    $tempMenor = 1;
    //print_r($arregloTemp);
    foreach ($arregloTemp as $indice => $elemento) {
        if ($tempMenor < $elemento) {
            $tempMenor = $elemento;
            if ($elemento < $tempMenor) {
                $indice;
            }
        }
    }
    return $indice;
}

//PROGRAMA PRINCIPAL
echo "¿Cuántas temperaturas desea ingresar?: ";
$ingresos = trim(fgets(STDIN));
$temperaturas = [];
for ($i=0; $i<$ingresos; $i++){
    echo "Conteo: ".count($temperaturas)."\n";
    echo "| Ingrese una temperatura: ";
    $temperaturas[$i] = trim(fgets(STDIN));
}
$calculo = leerTemperaturas($temperaturas, $ingresos);
//echo ">> Resultados Módulo 1: \n";
//foreach ($temperaturas as $indice => $temperatura) {
    //echo "Posición ".$indice.": ".$temperatura." grados\n";
//}
//$impresion = listarTemperaturas($calculo);
echo ">> Resultados Módulo 2: \n";
//for ($i=1; $i<=$ingresos; $i++) {
//    echo "(".$i.") ".$impresion."\n";
//}
$promedioTemp = promTemperaturas($temperaturas);
echo ">> Resultados Módulo 3: \n";
echo "| El promedio de temperaturas es de: ".$promedioTemp." grados.\n";
echo "Ingrese una temperatura límite para analizar: ";
$limite = trim(fgets(STDIN));
$porcentajeTemp = promTemperaturas($temperaturas, $limite);
echo ">> Resultados Módulo 4: \n";
echo "| El porcentaje de temperaturas superiores a ".$limite." es de: ".$porcentajeTemp."%\n";
$tempMenor = minTemperatura($temperaturas);
echo ">> Resultados Módulo 5: \n";
echo "| ".$tempMenor." es el índice de la temperatura menor.\n";