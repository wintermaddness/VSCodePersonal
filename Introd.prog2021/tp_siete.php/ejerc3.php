<?php
/** Módulo 1: cargarMascotas - 
 * Retorna un arreglo con la información de las mascotas.
 */
//function cargarMascotas() {
    
//}
/** Módulo 2: datosMascotas - 
 * Muestra en pantalla un arreglo con la información de las mascotas.
 */
function datosMascotas($misMascotas) {
    if (count($misMascotas) > 0) {
        foreach ($misMascotas as $indice) {
            echo "Mascota ".$indice.": ".$misMascotas["nombre"]." es ".$misMascotas["especie"]." de ".$misMascotas["edad"]." años.\n";
        }
    }
}
/** Módulo 3: buscarPrimerMenorA - 
 * Dada una edad, retorna la primer mascota menor a esa edad.
 */
/** function buscarPrimerMenorA($arregloMascotas, $limiteEdad) {
 *   $edadMenor = 0;
 *   foreach ($arregloMascotas as $indice => ["edad"]) {
 *       if ($edadMenor < $elemento) {
 *           $tempMenor = ["edad"];
 *           if ($elemento < $tempMenor) {
 *               $indice;
 *           }
 *       }
 *   }
 *   return $indice;
*}*/

/** PROGRAMA principal
 * Dadas las funciones anteriores, carga, busca y muestra la mascota de menor edad.
 */
echo "¿Desea ingresar datos de una mascota? (s/n): ";
$respuesta = trim(fgets(STDIN));
if ($respuesta == "s") {
    $mascotas = [];
    do {
        echo "| Ingrese los datos de la mascota (nombre, especie, edad): ";
        $mascotas["nombre"]["especie"]["edad"] = trim(fgets(STDIN));
        echo "\nCantidad de elementos: ".count($mascotas);
        echo "\n¿Desea ingresar datos de otra mascota? (s/n): ";
        $respuesta = trim(fgets(STDIN));
    } while ($respuesta == "s");
    function cargarMascotas($mascotas) {
        $arregloMascotas = [$mascotas];
        foreach ($arregloMascotas as $indice => $elemento) {
            $arregloMascotas[$indice][$elemento];
        }
        return $arregloMascotas;
    }
    $arregloMascotas = cargarMascotas($mascotas);
    print_r($mascotas);
} else {
    echo "No se ingresaron datos.";
}