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

//Arreglo indexado (con arreglos asociativos)
echo "¿Desea ingresar datos de una mascota? (s/n): ";
$respuesta = trim(fgets(STDIN));
if ($respuesta == "s") {
    echo "¿Cuántas mascotas desea registrar?: ";
    $cantMascotas = trim(fgets(STDIN));
    $mascota = [];
    //$mascotas = [];
    //$j = 0;
    for ($i=1; $i<=$cantMascotas; $i++) {
        echo "-----------------------------------\n";
        echo "| Nombre: ";
        $mascota["nombre"] = trim(fgets(STDIN));
        echo "| Especie: ";
        $mascota["especie"] = trim(fgets(STDIN));
        echo "| Edad: ";
        $mascota["edad"] = trim(fgets(STDIN));
        $arregloMascotas = cargarMascotas($mascota);
        print_r($mascota);
        echo "Cantidad de mascotas: ".$i."\n";
        
        //while ($j<$i) {
        //    $mascotas[$j] = $mascota;
        //    $j = $j + 1;
        //}
    }
    //print_r($mascotas);
    //$arregloMasc = cargarMascotas($mascota);
    echo ">> Resultados del Módulo 1: \n";
    print_r($arregloMascotas);
    //function datosMascotas($mascotas) {
    //    for ($i=1; $i<count($mascotas); $i++) {
    //        echo "Mascota ".$i.": ".$mascotas["nombre"]." es ".$mascotas["especie"]." de ".$mascotas["edad"]." años.\n";
    //    }
    //}

    //$imprimirMascotas = datosMascotas($mascotas);
    //print_r($mascotas);
    //$arregloMascotas = cargarMascotas($mascotas);
    //print_r($imprimirMascotas);
} else {
    echo "No se ingresaron datos.";
}