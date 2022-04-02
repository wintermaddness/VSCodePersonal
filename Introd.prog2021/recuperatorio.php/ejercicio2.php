<?php
/** Módulo conversorTemp - 
 * Dados los grados y una unidad de medida, retorna una cant. en grados Celsius.
 * @param float $cantGrados
 * @param string $unidadMedida
 * @return float
 */
function conversorTemp($cantGrados, $unidadMedida) {
    /** float $gradosCelsius */
    if ($unidadMedida == "F") {
        $gradosCelsius = ($cantGrados - 32) * 5/9;
    } else {
        $gradosCelsius = $cantGrados;
    }
    return $gradosCelsius;
}

//PROGRAMA principal
/** Declaración de variables
 * int $importadas, $gradosUno, $gradosDos, $cantEstaciones, $i
 * float $totalGrados, $gradosMenor, $cantidadGrados, $conversion
 * float $promedioTemp, $porcentajeGradosUno, $porcentajeGradosDos
 * string $nombreEstacion, $unidad, $menorMedicion
 */

//Inicialización de variables
$importadas = 0;
$gradosUno = 0;
$gradosDos = 0;
$gradosMenor = 99999;
$totalGrados = 0;
$promedioTemp = 0;

//Proceso
echo "+---------------------------------+\n";
echo "¿Cuántas estaciones desea evaluar?: ";
$cantEstaciones = trim(fgets(STDIN));
if ($cantEstaciones > 0) {
    for ($i=0; $i<$cantEstaciones; $i++) {
        //Petición de datos
        echo "| Nombre de la estación: ";
        $nombreEstacion = trim(fgets(STDIN));
        echo "  + Cantidad de grados: ";
        $cantidadGrados = trim(fgets(STDIN));
        echo "  + Unidad de medida (C/F): ";
        $unidad = trim(fgets(STDIN));

        //Conversiones y validaciones
        $conversion = conversorTemp($cantidadGrados, $unidad);
        $totalGrados = $totalGrados + $conversion;
        //echo ">> Total grados: ".$totalGrados."\n";

        if ($cantEstaciones >= 1 && $conversion < $gradosMenor) {
            $gradosMenor = $cantidadGrados;
            $menorMedicion = $nombreEstacion;
        }

        if ($conversion >= -6 && $conversion < 0) {
            $gradosUno = $gradosUno + 1;
        } elseif ($conversion >= 0 && $conversion < 6) {
            $gradosDos = $gradosDos + 1;
        }

        if ($unidad == "F" || $unidad == "f") {
            $importadas = $importadas + 1;
        }
    }
    //Cálculos
    $promedioTemp = $totalGrados/$cantEstaciones;
    $porcentajeGradosUno = ($gradosUno * 100)/$cantEstaciones;
    $porcentajeGradosDos = ($gradosDos * 100)/$cantEstaciones;
    //Resultados
    echo "+---------------------------------+\n";
    echo "(1) Estación que menos grados midió: ".$menorMedicion."\n";
    echo "(2) Promedio de temperatura (grados Celsius): ".$promedioTemp."\n";
    echo "(3) Porcentaje de estaciones (entre -6 y 0 grados Celsius): ".$porcentajeGradosUno."%\n";
    echo "(4) Porcentaje de estaciones (entre 0 y 6 grados Celsius): ".$porcentajeGradosDos."%\n";
    echo "(5) Cantidad de estaciones importadas: ".$importadas."\n";
} else {
    echo "Error. No se ingresaron datos de ninguna estación.";
}