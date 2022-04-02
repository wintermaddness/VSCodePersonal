<?php
function cargarMascotas() {
    $arregloMascotas = [];
    $arregloMascotas[0] = ["nombre"=> "Gonzo", "edad" => 9, "tipo"=> "perro"] ;
    $arregloMascotas[1] = ["nombre"=> "Peggy", "edad" => 3, "tipo"=> "puerco"] ;
    $arregloMascotas[2] = ["nombre"=> "Harry", "edad" => 4, "tipo"=> "hamster"] ;
    $arregloMascotas[3] = ["nombre"=> "Rudolf", "edad" => 2, "tipo"=> "perro"] ;
    return $arregloMascotas;
}

function datosMascotas($misMascotas) {
    $j = 1;
    for ($i=0; $i<count($misMascotas); $i++) {
        echo "Mascota ".$j.": ".$misMascotas[$i]["nombre"]." es ".$misMascotas[$i]["tipo"]." de ".$misMascotas[$i]["edad"]." años.\n";
        $j = $j + 1;
    }
}

function buscarPrimerMenorA($misMascotas, $edad) {
    /** Recorrido parcial (while) */
    $bandera = false;
    $n = count($misMascotas);
    $i = 0;
    while ($i < $n && $bandera == false) {
        if ($misMascotas[$i]["edad"] < $edad) {
                $edadMenor = $misMascotas[$i]["nombre"];
                $bandera = true;
        } elseif ($misMascotas[$i]["edad"] > $edad) {
            $edadMenor = -1;
        }
        $i = $i + 1;
    }
    return $edadMenor;
}

//PROGRAMA principal
echo "\n>> Resultados de la consigna a: \n";
$mascotas = cargarMascotas();
print_r($mascotas);
//Resolución consigna 2: resultados en pantalla
echo "\n>> Resultados de la consigna b: \n";
$infoMascotas = datosMascotas($mascotas);
//Resolución consigna 3: mascota de menor edad
echo "\n>> Resultados de la consigna c: \n";
echo "Ingrese una edad (límite de análisis): ";
$edadLimite = trim(fgets(STDIN));
$mascotaEdadMenor = buscarPrimerMenorA($mascotas, $edadLimite);
if ($mascotaEdadMenor == -1) {
    echo "\n*************************************************\n";
    echo "No existe una mascota menor a la edad ingresada (".$edadLimite.").\n";
    echo "*************************************************\n";
} else {
    echo "\n*************************************************\n";
    echo "Primera mascota menor a ".$edadLimite." años: ".$mascotaEdadMenor."\n";
    echo "*************************************************\n";
}