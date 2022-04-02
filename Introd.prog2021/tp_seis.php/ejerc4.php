<?php
/** PROGRAMA principal
* string $hayFruta, fruta
* int $cantBananas, $cantOtras 
*/
$cantBananas = 0;
$cantOtras = 0;
do {
    echo "¿Qué fruta comió? (b=banana, o=otra): ";
    $fruta = trim(fgets(STDIN));
    if ($fruta == "b") {
        $cantBananas = $cantBananas + 1;
    } else {
        $cantOtras = $cantOtras + 1;
    }
    echo "¿Hay más fruta? (si/no): ";
    $hayFruta = trim(fgets(STDIN));
} while ($hayFruta == "si");
echo "El mono comió ".$cantBananas." bananas y ".$cantOtras." de otras frutas.";