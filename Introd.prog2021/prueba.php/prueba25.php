<?php

echo "Ingrese la cantidad de encuestas a realizar: ";
$encuestas = trim(fgets(STDIN));

$jefeAlpha = "";
$cantCasa18 = 0;
$promedio = 0;
$totalHabViv = 0;
$masMenor = 0;
 
if (is_numeric($encuestas)) {
    if ($encuestas > 0) {
        for ($i=0; $i < $encuestas; $i++) {
            echo "Ingrese nombre del jefe de familia: ";
            $jefeFlia = trim(fgets(STDIN));
            echo "Ingrese cantidad de habitantes: ";
            $cantHabitantes = trim(fgets(STDIN));
            echo "Ingrese cantidad de menores de 18 años:  ";
            $menores18 = trim(fgets(STDIN));
   
            if ($menores18 > $cantHabitantes) {
                echo "\n"."Oh no... Algo no coincide!". "\n";
            }elseif ($menores18 <= $cantHabitantes) {
                $totalHabViv = $totalHabViv + $cantHabitantes;
                $promedio =  $totalHabViv/$encuestas;
                if ($menores18 > 0) {
                    $cantCasa18 = $cantCasa18 + ($menores18/$menores18);
                    if ($menores18 > $masMenor) {
                        $masMenor = $menores18;
                        $jefeAlpha = $jefeFlia;
                    }
                }
            }
        }
        echo "\n";
        echo "Cantidad de encuestadas formuladas: " .$encuestas. "\n";
        echo "Cantidad de viviendas que tienen integrantes menores a 18 años son: ". $cantCasa18. "\n";
        echo "El nombre del jefe de familia con mayor cantidad de menores en la vivienda es: ". $jefeAlpha. "\n";
        echo "Promedio de la cantidad de personas por vivienda es: ". $promedio. "\n";
        echo "\n";
    }elseif ($encuestas <= 0) {
        echo "Por favor intentelo nuevamente!". "\n";
    }
}else {
    echo "Oh no... Algo no coincide!"."\n";
}