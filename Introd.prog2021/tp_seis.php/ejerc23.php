<?php
/** PROGRAMA principal
 * int $i, $j, $digito
 */
echo "| Ingrese cantidad: ";
$numero = trim(fgets(STDIN));
for ($i=1; $i<=$numero; $i++) {
    $digito = $i % 2;
    for ($j=1; $j<=$i; $j++) {
        echo $digito;
    }
    echo "\n";
}
echo "-----------";

/** El programa imprime los siguientes resultados (3):
 * 1
 * 00
 * 111
 */