<?php
/** PROGRAMA principal
 * Factoriza un número ingresado por el usuario.
 * int $numero, $resultado, $i
 */
echo "Ingrese un número para obtener el factorial: ";
$numero = trim(fgets(STDIN));
$resultado = 1;
for ($i=1; $i <= $numero; $i++) {
    $resultado *= $i;
}
echo "El factorial es: ".$resultado;