<?php
/** PROGRAMA cancion
 * int $numero, $cantidad
 */
echo "Ingrese la cantidad: ";
$numero = trim(fgets(STDIN));
for ($cantidad=0; $cantidad < $numero; $cantidad++) { 
    echo ($cantidad + 1)." elefante/s \n";
}
echo "se columpiaron sobre la tela de una araña";