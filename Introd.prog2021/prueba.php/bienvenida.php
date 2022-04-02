<?php
/** Muestra un saludo de bienvenida dirigido a alguien
* @param string $alguien
* @return string
*/
function bienvenida($alguien)
{
	echo ("¡Hola ".$alguien."!\n");
	echo ("¡Bienvenido a la programación en PHP!\n");
}

/* PROGRAMA principal */
echo "Ingrese un nombre: ";
$nombre = trim(fgets(STDIN));
return bienvenida($nombre);