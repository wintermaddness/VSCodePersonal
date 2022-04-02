<?php
/** Módulo 1: aSegundos - 
 * Convierte el horario del día a segundos y retorna la cantidad de segundos.
 * @param int $horas, $minutos, $segundos
 * @param string $horario
 * @return int
*/
function aSegundos ($horas, $minutos, $segundos, $horario) {
    if ($horario == "PM" || $horario == "pm") {
        $horas = $horas + 12;
        $horas = $horas * 3600;
        $minutos = $minutos * 60;
        $segundos = $horas + $minutos + $segundos;
    } else {
        $horas = $horas * 3600;
        $minutos = $minutos * 60;
        $segundos = $horas + $minutos + $segundos;
    }
    return $segundos;
}

/** Módulo 2: formatoHora - 
 * Retorna el valor de los segundos ingresados en h:m:s.
 * @param int $segundos
 * @return string
*/
function formatoHora ($segundos) {
    $horas = (int) ($segundos / 3600);
    $minutos = (int) (($segundos % 3600)/60);
    $segundos = (int) (($segundos % 3600) - (60 * $minutos));
    $hms = $horas."hs:".$minutos."min:".$segundos."seg\n";
    return $hms;
}

/** Módulo 3: esMenor - 
 * Determina si una hora ingresada (en segundos) es menor que otra.
 * @param boolean $menor
 * @return boolean
*/
function esMenor ($segundos, $segundos2) {
    $menor = $segundos < $segundos2;
    return $menor;
}

/** Módulo 4: difHoras - 
 * Retorna la diferencia entre dos horas ingresadas (en segundos).
 * @param int $segundos1, $segundos2
 * @return string
*/
function difHoras ($segundos1, $segundos2) {
    if ($segundos1 > $segundos2) {
        $segundos = $segundos1 - $segundos2;
            $horas = (int)($segundos/3600);
            $minutos = (int)(($segundos % 3600)/60);
            $segundos = (int)(($segundos % 3600) - (60 * $minutos));
        $hms = $horas."hs:".$minutos."min:".$segundos."seg";
    } else {
        $segundos = $segundos2 - $segundos1;  
            $horas = (int)($segundos/3600);
            $minutos = (int)(($segundos % 3600)/60);
            $segundos = (int)(($segundos % 3600) - (60 * $minutos));
        $hms = $horas."hs:".$minutos."min:".$segundos."seg";
    }
        return $hms;
}

/** PROGRAMA principal */
echo "Ingrese una cantidad de horas (0 a 12): ";
$horas = trim(fgets(STDIN));
echo "Ingrese una cantidad de minutos (0 a 59): ";
$minutos = trim(fgets(STDIN));
echo "Ingrese una cantidad de segundos (0 a 59): ";
$segundos = trim(fgets(STDIN));
echo "Ingrese el tipo de horario (AM O PM): ";
$horario = trim(fgets(STDIN))."\n";

$converSeg1 = aSegundos($horas, $minutos, $segundos, $horario);
    echo "Los valores ingresados equivalen a: ".$converSeg1." segundos.\n";
$pasajehora = formatoHora($converSeg1);
    echo $converSeg1." segundos son: ".$pasajehora."\n";

/** Ahora le pedimos al usuario que ingrese otra hora. */
echo "Ingrese una nueva cantidad de horas (0 a 12): ";
$horas2 = trim(fgets(STDIN));
echo "Ingrese una nueva cantidad de minutos (0 a 59): ";
$minutos2= trim(fgets(STDIN));
echo "Ingrese una nueva cantidad de segundos (0 a 59): ";
$segundos2 = trim(fgets(STDIN));
echo "Ingrese el tipo de horario (AM O PM): ";
$horario2 = trim(fgets(STDIN));

$converSeg2 = aSegundos($horas2, $minutos2, $segundos2, $horario2);
    echo "Los valores ingresados equivalen a: ".$converSeg2." segundos.\n";
$pasajehora2 = formatoHora($converSeg2);
    echo $converSeg2." segundos son: ".$pasajehora2."\n";

/** Retornamos las horas ordenadas de mayor a menor. */
if (esMenor($converSeg1, $converSeg2)) {
    echo "Como ".$converSeg1." es menor que ".$converSeg2.", la hora ordenada de mayor a menor es de: "."\n".$pasajehora2.$pasajehora;
} else {
    echo "Como ".$converSeg2." es menor que ".$converSeg1.", la hora ordenada de mayor a menor es de: "."\n".$pasajehora.$pasajehora2;
}
/** Calculamos la diferencia entre horas */
$diferencia = difHoras($converSeg1, $converSeg2);
    echo "Y la diferencia entre horas es de: ".$diferencia;