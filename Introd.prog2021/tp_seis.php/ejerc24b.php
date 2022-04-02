<?php
/** PROGRAMA principal
 * int $i, $j, $digito
 */
echo "| Ingrese cantidad: ";
$numero = trim(fgets(STDIN));
$digito = $numero;
for ($i=1; $i<=$numero; $i++) {
    for ($j=1; $j<=$digito; $j++) {
        echo $digito;
    }
    $digito = $digito - 1;
    echo "\n";
}
echo "-----------";

/** El programa imprime los siguientes resultados (3): 
 * 333
 * 22
 * 1
*/