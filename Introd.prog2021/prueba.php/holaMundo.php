<?php
echo "Ingrese los segundos:\n";
$segundos = trim(fgets(STDIN));
echo "Ingrese nuevamente los segundos:\n";
$segundos1 = trim(fgets(STDIN));

$segun = $segundos - $segundos1;
            $horas = (int)($segun/3600);
            $minutos = (int)(($segun % 3600)/60);
            $segundos = (int)(($segun % 3600) - (60 * $minutos));
        $hms = "La diferencia de hora es de: ".$horas."hs:".$minutos."min:".$segundos."seg";
echo $hms;