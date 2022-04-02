<?php
/** Imprime en pantalla el nombre elegido por el usuario.
 * La elección es por número de nombre.*/
$misNombres = ["Dean", "Dimitri", "Samuel", "Garth", "Alfie"];
echo "Ingrese el número de nombre a imprimir: ";
$nro = trim(fgets(STDIN));
if ($nro >= 0 && $nro < count($misNombres)) {
    echo "nombre es: ".$misNombres[$nro];
} else {
    echo "No existe un nombre para el numero ".$nro;
}

/** Almacenar en un arreglo Indexado nombres de países,
* solicitando a un usuario primero la cantidad de países,
* y segundo el nombre de cada país. (utilizar ciclo definido) */
/* Programa principal */
echo "\nIngrese la cantidad de países: ";
$cantPaises = trim(fgets(STDIN));
$paises = [];
echo count($paises)."\n";
for ($i=0; $i<$cantPaises; $i++) {
    echo "Pais: ";
    $paises[$i] = trim(fgets(STDIN));
}
echo count($paises)."\n";