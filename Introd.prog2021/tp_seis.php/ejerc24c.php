<?php
/** PROGRAMA principal
 * int $i, $j, $digito
 */
echo "| Ingrese cantidad: ";
$numero = trim(fgets(STDIN));
$digito = $numero;
for ($i=1; $i<=$digito; $i++) {
    for ($j=1; $j<=$numero; $j++) {
        echo $i;
    }
    $numero = $numero - 1;
    echo "\n";
}
echo "-----------";

/** El programa imprime los siguientes resultados (3):
 * 111
 * 22
 * 3
 */