<?php
/**Cargar los datos de una matriz cuadrada*/
$matrizCuadrada = [];
for ($i=0; $i<3; $i++) {
    for ($j=0; $j<3; $j++) {
        echo "Ingrese el valor $i, $j: ";
        $matrizCuadrada[$i][$j] = trim(fgets(STDIN));
    }
}
print_r($matrizCuadrada);