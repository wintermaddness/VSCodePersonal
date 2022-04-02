<?php
/** Módulo 2: formatoHora - 
 * Retorna el valor de los segundos ingresados en h:m:s.
*/
function formatoHora ($segundos) {
    $horas = (int) ($segundos/3600);
    $minutos = (int) ($segundos % 3600)/60;
    $segundos = (int) ($segundos % 3600) - (60 * $minutos);
    $hms = "La cantidad de segundos ingresados equivale a: ".$horas."hs:".$minutos."min:".$segundos." seg \n";
    return $hms;
}

echo "Ingrese una cantidad de horas (0 a 12): ";
$horas = trim(fgets(STDIN));
echo "Ingrese una cantidad de minutos (0 a 59): ";
$minutos = trim(fgets(STDIN));
echo "Ingrese una cantidad de segundos (0 a 59): ";
$segundos = trim(fgets(STDIN));
echo "Ingrese el tipo de horario (AM O PM): ";
$horario = trim(fgets(STDIN));
$pasajehora = formatoHora($horas, $minutos, $horario);
echo $pasajehora;

//echo "La diferencia entre horas es de: ".$diferencia;

function esMenor ($segundos, $segundos2) {
    if ($segundos < $segundos2) {
        echo "Como ".$segundos." es menor que ".$segundos2.", ";
        $menor = "la hora ordenada de mayor a menor es de: "."\n".$segundos2."\n".$segundos;
    } else {
        echo "Como ".$segundos2." es menor que ".$segundos.", ";
        $menor = "la hora ordenada de mayor a menor es de: "."\n".$segundos."\n".$segundos2;
    }
    return $menor;
}

/** Retornamos las horas ordenadas de mayor a menor. */
$orden = esMenor($converSeg1, $converSeg2);
    echo $orden."\n";
/** Calculamos la diferencia entre horas */
$diferencia = difHoras($converSeg1, $converSeg2);
    echo $diferencia;