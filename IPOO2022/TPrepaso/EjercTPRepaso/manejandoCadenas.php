<?php
//1. Dada una cadena de caracteres terminada en punto retornar la cantidad de letras que contiene la cadena.
/** Módulo 1: cantLetras - 
 * Retorna la cantidad de letras que contiene una cadena.
 * @param string $cadena
 * @return int
 */
function cantLetras($cadena) {
    //int $i, $contador
    $contador = 0;
    for ($i=0; $i<strlen($cadena); $i++) {
            $contador = $contador + 1;
            if ($cadena[$i] == " " || $cadena[$i] == "." || $cadena[$i] == ",") {
                $contador = $contador - 1;
            }
    }
    return $contador;
}
echo "a.| Ingrese una cadena de caracteres (. para terminar): ";
$cadenaCaracteres = trim(fgets(STDIN));
$resultado = cantLetras($cadenaCaracteres);
echo "| Su cadena contiene: ".$resultado." letras.\n";

//2. Dado un texto terminado en / y un caracter, determinar cuántas veces aparece ese caracter en la cadena.
/** Módulo 2: cantApariciones - 
 * Retorna la cant. de veces que aparece un X caracter en un texto.
 * @param string $texto
 * @return int
 */
function cantApariciones($texto, $caracter) {
    //int 
    for ($i=0; $i<strlen($texto); $i++) {
        $contador = 0;
        if ($texto[$i] == "$caracter") {
            $contador = $contador + 1;
        }
    }
    return $contador;
}

echo "b.| Ingrese el texto que desee analizar (terminado en /): ";
$texto = trim(fgets(STDIN));
echo "| ¿Cuál caracter desea analizar: ";
$caracter = trim(fgets(STDIN));
$resultado = cantApariciones($texto, $caracter);
echo "| El caracter -".$caracter."- aparece ".$resultado." vez/veces en el texto ingresado.\n";

//3. Dada 2 cadenas cadena1 y cadena2 retornar verdadero si cadena2 se encuentra en cadena1 y falso en caso contrario.

//4. Dada una cadena retornar su longitud sin utilizar la función count de PHP.
/** Módulo 4: longitudCadena - 
 * Retorna la cantidad de caracteres que contiene una cadena.
 * @param string $cadena
 * @return int
 */
function longitudCadena($cadena) {
    //int $i, $contador
    $contador = 0;
    for ($i=0; $i<strlen($cadena); $i++) {
        $contador = $contador + 1;
    }
    return $contador;
}
echo "d.| Ingrese una cadena de caracteres: ";
$cadenaCaracteres = trim(fgets(STDIN));
$resultado = longitudCadena($cadenaCaracteres);
echo "| Su cadena contiene: ".$resultado." caracteres.\n";

//5. Dada 2 cadenas cadena1 y cadena2 retornar la cadena de mayor longitud, invocar al método implementado para el inciso anterior.
/** Módulo 5: longitudCadena - 
 * Compara y retorna la cadena más larga.
 * @param string $cadena
 * @return string
 */
function longitudCadenas($cadenaA, $cadenaB) {
    //int $i, $contadorA, $contadorB, string $cadenaLarga
    $contadorA = 0;
    $contadorB = 0;
    $cadenaLarga = "";

    $contadorA = $contadorA + strlen($cadenaA);
    $contadorB = $contadorB + strlen($cadenaB);

    if ($contadorA < $contadorB) {
        $cadenaLarga = $cadenaB;
    } else {
        $cadenaLarga = $cadenaA;
    }
    return $cadenaLarga;
}

echo "e.| Ingrese la 1era cadena de caracteres: ";
$cadena1 = trim(fgets(STDIN));
echo "| Ingrese la 2da cadena de caracteres: ";
$cadena2 = trim(fgets(STDIN));
$resultado = longitudCadena($cadena1, $cadena2);
echo "| La cadena más larga es: ".$resultado;