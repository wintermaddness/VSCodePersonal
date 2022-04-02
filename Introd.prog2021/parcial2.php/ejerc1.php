<?php
/** PROGRAMA principal -
 * Analiza los datos de cada destino turístico ingresado por el usuario.
 */
//Declaración de variables

//Inicialización de variables
$cantDestinos = 0;
$totalTuristas = 0;
$totalIngresos = 0;
$masTuristas = 1;
$sanMartin = 0;
$destinoMasVisitado = "";

echo "¿Desea ingresar datos?: ";
$respuesta = trim(fgets(STDIN));
while ($respuesta == "si") {
    do {
        /* Ingreso de datos */
        echo "| Nombre del destino turístico: ";
        $nombreDestino = trim(fgets(STDIN));
        echo "| Cantidad de turistas: ";
        $cantTuristas = trim(fgets(STDIN));
        echo "| Ingreso (en millones de dólares): ";
        $ingresoDolares = trim(fgets(STDIN));
        $cantDestinos = $cantDestinos + 1;
        echo "\n¿Desea ingresar otro destino?: ";
        $respuesta = trim(fgets(STDIN));
    } while ($respuesta == "si");

        if ($respuesta == "si") {
            $cantDestinos = $cantDestinos + 1;
        } else {
            $cantDestinos = $cantDestinos - 1;
        }
        
        $totalIngresos = $totalIngresos + $ingresoDolares;
        $totalTuristas = $totalTuristas + $cantTuristas;
        
        if ($nombreDestino == "San Martin de los Andes") {
            $sanMartin = $sanMartin + 1;
            //$porcentajeAndes = ($sanMartin * 100)/$totalTuristas;
        }
        if ($cantDestinos = 1 || $cantTuristas > $masTuristas) {
            $masTuristas = $cantTuristas;
            $destinoMasVisitado = $nombreDestino;
        }

        /* Cálculos */
        $promedioIngresos = $totalIngresos/$cantDestinos;
        $porcentajeAndes = ($sanMartin * 100)/$totalTuristas;
        /* Resultados */
        echo "------- Resultados -------\n";
        echo "(1) Promedio de ingresos (en millones de dólares): ".$promedioIngresos."\n";
        echo "(2) Porcentaje de turistas de San Martin de los Andes: ".$porcentajeAndes."%\n";
        echo "(3) Nombre del destino con mayor cantidad de turistas: ".$destinoMasVisitado."\n";     
}