<?php
/** Módulo 3: cantidadDivisores - 
 * Recibe un número entero y retorna la cantidad de divisores.
 * @param int $numero
 * @return int
 */
function cantidadDivisores($numero) {
    /* string $resultado, int $i, $divisor */
    $resultado = "";
    for ($i=1; $i<$numero; $i++) {
        if ($numero % $i == 0) {
            $divisor = $i;
            $resultado = $resultado.$divisor.", ";
        }
    }
    return $resultado;
}

echo "Ingrese un número para obtener sus divisores: ";
$numero3 = trim(fgets(STDIN));
$resultado = cantidadDivisores($numero3);
echo "| Los divisores de ".$numero3." es/son: ".$resultado;