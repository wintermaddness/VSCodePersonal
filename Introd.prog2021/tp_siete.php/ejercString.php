<?php
/** Implementar una función cuyos parámetros son:
* 1. Una Cadena de caracteres y una letra.
* 2. Retorna la primera posición del "string" en la que se encuentra La letra.
* 3. Si la letra no coincide, la función debe retornar: -1.
*/
function cmp($a, $b) {
    if ($a == $b) {
        $orden = 0;
    } else {
        $orden = -1;
    }
    return $orden;
}
echo ">>> Ejemplo 1: \n";
echo "Ingrese una cadena para analizar: ";
$cadena = trim(fgets(STDIN));
echo "Ingrese la letra que desea analizar: ";
$letra = trim(fgets(STDIN));
echo "| ".$cadena."\n";
echo "\n------ Resultados ------\n";
for ($i=0; $i<strlen($cadena); $i++){ //Retorna -1 por cada posición que no sea = a la letra
    $analisis = cmp($cadena[$i], $letra);
    if ($analisis == 0) {
        echo "Posición ".$i.": $letra\n";
    } else {
        echo "Posicion ".$i." = -1\n";
    }
}

/** Implementar una función cuyos parámetros son:
* 1. Una Cadena de caracteres y una letra.
* 2. Retorna la primera posición del "string" en la que se encuentra La letra.
* 3. Si la letra no existe, la función debe retornar: -1.
*/
function psc($a, $b) {
    if ($a == $b) {
        $orden = 0;
    } elseif ($a <> $b) {
        $orden = -1;
    }
    return $orden;
}
echo "\n>>> Ejemplo 2: \n";
echo "Ingrese una cadena para analizar: ";
$cadena = strtolower(trim(fgets(STDIN))); //convierte todas las mayúsculas a minúsculas
echo "Ingrese la letra que desea analizar: ";
$letra = trim(fgets(STDIN));
echo "| ".$cadena."\n";
echo "------ Resultados ------\n";
for ($i=0; $i<strlen($cadena); $i++){
    $analisis = psc($cadena[$i], $letra);
}
if ($analisis == 0) {
    echo "Posición ".$i.": $letra\n";
} else {
    echo "No se encontró la letra ".$letra." en la cadena ingresada.";
}