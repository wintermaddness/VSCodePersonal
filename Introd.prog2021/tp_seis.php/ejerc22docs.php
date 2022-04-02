<?php
/** PROGRAMA encuesta
 * int $encuestas, $vivConMenores, $masMenores,
 * int $cantHabitantes, $habitantes, $menores
 * string $jefe, $jefeDeMenores
 */
$vivConMenores = 0;
$masMenores = 0;
$cantHabitantes = 0;
// Se empieza el programa y se verifica que la cantidad de encuestas sea mayor a 0.
echo "¿Cuántas encuestas desea ingresar al programa?: \n";
$cantidad = trim(fgets(STDIN));
if ($cantidad > 0 && $cantidad <= 99999) { 
    for ($encuestas = 0; $encuestas < $cantidad; $encuestas++) {
        echo "Ingrese el nombre del jefe del hogar: \n";
        $jefe = trim(fgets(STDIN));
        //Se verifica que sea un nombre válido (no pueden ser números).
        if ($jefe > 99999 || $jefe < -99999) {
            echo "Ingrese la cantidad de habitantes que viven en la vivienda: \n";
            $habitantes = intval(trim(fgets(STDIN)));
            //Se verifica que la cantidad de habitantes en la vivienda sea mayor a 1.
            if ($habitantes < 1 || $habitantes > 99999) {
                do {
                    echo "Por favor, ingrese un número válido: \n";
                    $habitantes = intval(trim(fgets(STDIN)));
                } while ($habitantes < 1 || $habitantes > 99999);
            }
 
            echo "Ingrese la cantidad de niños menores a 18 años: \n";
            $menores = trim(fgets(STDIN));
            /* Se verifica que la cantidad de menores sea menor a la cantidad
            * de habitantes en la vivienda (tiene que haber una persona mayor si o si)
            */
            if($menores == 0) {
 
            } else {
                do {
                    if ($menores > 0 && $menores < 99999) {
                        if ($menores >= $habitantes) {
                            do {
                                echo "Por favor, ingrese un número válido: \n";
                                $menores = trim(fgets(STDIN));
                            } while ($menores >= 0 && $menores < 99999 && $menores >= $habitantes);
                        }
                    }
                    if ($menores < 0 || $menores > 99999) {
                        do {
                            echo "Por favor, ingrese un número válido: \n";
                            $menores = trim(fgets(STDIN));
                        } while ($menores >= $habitantes && $menores < 0);
                    }
                    if ($menores >= 0 && $menores < 99999) {
                        if ($menores >= $habitantes) {
                            do {
                                echo "Por favor, ingrese un número válido: \n";
                                $menores = trim(fgets(STDIN));
                            } while ($menores >= 0 && $menores < 99999 && $menores >= $habitantes);
                        }
                    }
                } while ($menores < 0 || $menores > 99999);
            }
            $menores = intval($menores);
            //Se cuenta la cantidad de viviendas con menores que hay en total.
            if ($menores >= 1) {
                $vivConMenores++;
            }
            //Se verifica cuál jefe es el que posee la mayor cantidad de menores a su cargo.
            if ($menores >= $masMenores) {
                $masMenores = $menores;
                $jefeDeMenores = $jefe;
            }
            //Se suma la cantidad de habitantes que hay en total.
            $cantHabitantes = $cantHabitantes + $habitantes;
        } else {
            echo "Por favor, ingrese un nombre válido. \n";
            $encuestas = $encuestas - 1;
        }
    }
   
    //Se calcula el promedio.
    $promedio = intval($cantHabitantes/$encuestas);
    //Se imprimen en pantalla los resultados.
    echo "Cantidad de encuestas formuladas: ".$encuestas;
    echo "\n"."Cantidad de viviendas que tienen integrantes menores a 18 años: ".$vivConMenores;
    echo "\n"."El nombre del jefe de familia con mayor cantidad de menores en la vivienda: ".$jefeDeMenores.", con un total de: ".$masMenores." menores";
    echo "\n"."Promedio de la cantidad de personas por vivienda: ".$promedio;
} elseif ($cantidad == 0) {
    echo "No se realizaron encuestas.";
} else {
    /**En caso de que se ingrese un número menor a 0, se pedirá que se ejecute
     * nuevamente el programa e ingrese una cantidad válida.*/
    echo "Por favor, vuelva a ejecutar el programa e ingrese una cantidad válida.";
}