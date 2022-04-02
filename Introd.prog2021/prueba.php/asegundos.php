<?php
/**
* Transforma en segundos una medida de tiempo expresada: en horas , minutos y segundos.
* @param int $horas, $minutos, $segundos
* @return int
*/
function asegundos ($horas, $minutos, $segundos)
{
// regla de transformación
    $segsal = 3600 * $horas + 60 * $minutos + $segundos;
    return $segsal;
}

/* PROGRAMA principal */
/* int $seg, $calculo, $conversion */
echo ("Ingrese los segundos que desea convertir: ");
$seg = trim(fgets(STDIN));
$calculo = asegundos($horas, $minutos, $segundos);
$conversion = $seg * $calculo;
echo ($seg." equivalen a ".$conversion);