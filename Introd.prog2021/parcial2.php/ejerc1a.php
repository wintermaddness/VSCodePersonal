<?php
/** PROGRAMA principal
 * Analiza los datos de cada destino turístico ingresado por el usuario.
 */
/** Declaración de variables
* string $respuesta, $nombreDestino, $sanMartin, $destinoMasVisitado
* int $cantidadTuristas, $ingresoDolares, $cantDestinos, $totalIngresos
* int $porcentajeAndes, $totalTuristas, $masTuristas
* float $promedioIngresos
*/
//Inicialización de variables
$cantDestinos = 0;
$totalTuristas = 0;
$totalIngresos = 0;
$masTuristas = 1;
$sanMartin = 0;

echo "¿Desea ingresar datos? (s/n): ";
$respuesta = trim(fgets(STDIN));
while ($respuesta == "s") {
    do {
        /* Ingreso de datos */
        echo "| Nombre del destino turístico: ";
        $nombreDestino = trim(fgets(STDIN));
        echo "| Cantidad de turistas: ";
        $cantidadTuristas = trim(fgets(STDIN));
        echo "| Ingreso (en millones de dólares): ";
        $ingresoDolares = trim(fgets(STDIN));
        
        $cantDestinos = $cantDestinos + 1;
        $totalIngresos = $totalIngresos + $ingresoDolares;
        $totalTuristas = $totalTuristas + $cantidadTuristas;
        
        if ($nombreDestino == "San Martin de los Andes") {
            $sanMartin = $cantidadTuristas;
            //$porcentajeAndes = ($sanMartin * 100)/$totalTuristas;
        }
        if ($cantDestinos >= 1 && $cantidadTuristas > $masTuristas) {
            $masTuristas = $cantidadTuristas;
            $destinoMasVisitado = $nombreDestino;
            //echo "\nDestino más visitado: ".$destinoMasVisitado;
        }

        echo "\n¿Desea ingresar otro destino? (s/n): ";
        $respuesta = trim(fgets(STDIN));
    } while ($respuesta == "s");

    /* Cálculos */
    //echo "\nCantidad de destinos: ".$cantDestinos;
    //echo "\nTotal de ingresos: ".$totalIngresos;
    $promedioIngresos = $totalIngresos/$cantDestinos;
    $porcentajeAndes = (($sanMartin * 100)/$totalTuristas);
    /* Resultados */
    echo "\n------- Resultados -------\n";
    echo "(1) Promedio de ingresos (en millones de dólares): ".$promedioIngresos."\n";
    echo "(2) Porcentaje de turistas de San Martin de los Andes: ".$porcentajeAndes."%\n";
    echo "(3) Nombre del destino con mayor cantidad de turistas: ".$destinoMasVisitado."\n";
}