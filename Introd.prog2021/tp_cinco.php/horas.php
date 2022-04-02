<?php
/** Módulo 1: aSegundos - 
 * Convierte el horario del día a segundos y retorna la cantidad de segundos.
*/
function aSegundos ($horas, $minutos, $segundos, $horario) {
    if ($horario == "PM" || $horario == "pm") {
        $horas = + 12;
        $horas = $horas * 3600;
        $minutos = $minutos * 60;
        $segundos = $horas + $minutos + $segundos;
    } elseif ($horario = "AM" || $horario = "am") {
        $horas = $horas * 3600;
        $minutos = $minutos * 60;
        $segundos = $horas + $minutos + $segundos;
    }
    return $segundos;
}

/** Módulo 2: formatoHora - 
 * Retorna el valor de los segundos ingresados en h:m:s.
*/
function formatoHora ($segundos) {
    $horas = (int) ($segundos/3600);
    $minutos = (int) (($segundos % 3600)/60);
    $segundos = (int) (($segundos % 3600) - (60 * $minutos));
    $hms = "La cantidad de segundos ingresados equivale a: ".$horas."hs:".$minutos."min:".$segundos."seg";
    return $hms;
}

/** Módulo 3: esMenor - 
 * Determina si una hora ingresada (en segundos) es menor que otra.
*/
function esMenor ($segundos, $segundos2) {
    $menor = $segundos < $segundos2;
    return $menor;
}

/** Módulo 4: difHoras - 
 * Retorna la diferencia entre dos horas ingresadas (en segundos).
*/
function difHoras ($segundos1, $segundos2) {
    if ($segundos1 >= $segundos2) {
        $segundos = $segundos1 - $segundos2;
        $horas = (int)($segundos/3600);
        $minutos = (int)(($segundos % 3600)/60);
        $segundos = (int)(($segundos % 3600) - (60 * $minutos));
        $hms = "La diferencia de hora es de: ".$horas."hs: ".$minutos."min: ".$segundos."seg";
    } else {
        $segundos = $segundos2 - $segundos1;  
        $horas = (int)($segundos/3600);
        $minutos = (int)(($segundos % 3600)/60);
        $segundos = (int)(($segundos % 3600) - (60 * $minutos));
        $hms = "La diferencia de hora es de: ".$horas."hs: ".$minutos."min: ".$segundos."seg";
    }
        return $hms;
}

/** PROGRAMA principal - 
 * A partir de dos horas (diferentes) ingresadas, el programa los muestra al usuario ordenadas de mayor a menor
 * junto con la cantidad de segundos que representa cada una y, por último, imprime un mensaje describiendo cuál
 * es la diferencia en horas, minutos y segundos entre ambas.
 */
echo "Ingrese una cantidad de horas (0 a 12): ";
$horas = trim(fgets(STDIN));
echo "Ingrese una cantidad de minutos (0 a 59): ";
$minutos = trim(fgets(STDIN));
echo "Ingrese una cantidad de segundos (0 a 59): ";
$segundos = trim(fgets(STDIN));
echo "Ingrese el tipo de horario (AM O PM): ";
$horario = trim(fgets(STDIN));

/** Ahora le pedimos al usuario que ingrese la otra hora. */
echo "Ingrese una cantidad de horas (0 a 12): ";
$horas2 = trim(fgets(STDIN));
echo "Ingrese una cantidad de minutos (0 a 59): ";
$minutos2= trim(fgets(STDIN));
echo "Ingrese una cantidad de segundos (0 a 59): ";
$segundos2 = trim(fgets(STDIN));
echo "Ingrese el tipo de horario (AM O PM): ";
$horario2 = trim(fgets(STDIN));

/** Convertimos las horas a segundos. */
    $converSeg1 = aSegundos($horas, $minutos, $segundos, $horario);
    $converSeg2 = aSegundos($horas2, $minutos2, $segundos2, $horario2);

/** Con el booleano veremos si la primera hora ingresada es menor.
 * Si lo es, retornará un true, y si no, un false.
*/
    $horaMenor = esMenor($converSeg1, $converSeg2);

/** Si el booleano es un true, retornará el primer SI, si no, el siguiente. */
    if ($horaMenor) {
        $pasajehora = formatoHora($converSeg1);
        $pasajehora2 = formatoHora($converSeg2);
        echo "La hora ordenada de mayor a menor es de: ".$pasajehora.", que son: ".$converSeg1." seg.\n";
        echo $pasajehora2." Son: ".$converSeg2." seg.\n";
    } else {
        $pasajehora = formatoHora($converSeg2);
        $pasajehora2 = formatoHora($converSeg1);
        echo "La hora ordenada de mayor a menor es de: ".$pasajehora.", que son: ".$converSeg2." seg.\n";
        echo $pasajehora2." Son: ".$converSeg1." seg.\n";
    }

/**calculamos la diferencia entre horas */
$diferencia = difHoras($converSeg1, $converSeg2);
echo "La diferencia entre horas es de: ".$diferencia;