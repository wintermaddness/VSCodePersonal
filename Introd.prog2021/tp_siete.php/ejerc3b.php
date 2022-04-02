<?php
function cargarMascotas($mascotas) {
    $misMascotas = [];
    $j = 0;
    $n = count($mascotas);
    for ($i=1; $i<$n; $i++) {
        //foreach ($mascotas as $indice) {
            while ($j < $i) {
                $misMascotas[$j] = $mascotas;
                $j = $j + 1;
            }
        //}
    }
    return $misMascotas;
}

echo "¿Desea ingresar datos de una mascota? (s/n): ";
$respuesta = trim(fgets(STDIN));
if ($respuesta == "s") {
    echo "¿Cuántas mascotas desea registrar?: ";
    $cantMascotas = trim(fgets(STDIN));
    for ($i=1; $i<=$cantMascotas; $i++) {
        echo ">> Ingrese el nombre, la especie y la edad de su mascota: \n";
        $mascotas = array(
                    "mascota" =>
                        array(
                        "nombre" => trim(fgets(STDIN)),
                        "especie" => trim(fgets(STDIN)),
                        "edad" => trim(fgets(STDIN))
                    )     
                );
        print_r($mascotas);
        $arregloMascotas = cargarMascotas($mascotas);
    }
    print_r($arregloMascotas);
} else {
    echo "No se ingresaron datos.";
}