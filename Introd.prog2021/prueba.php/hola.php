<?php
/**
* Escribe un saludo de bienvenida en pantalla.
* @param string $nombrePersona
*/
function saludo($nombrePersona)
{
echo "¡Hola ".$nombrePersona."!\n";
echo "Bienvenido a la programación en PHP.\n";
}

/* PROGRAMA Principal */
/*Escribe saludos*/
/*string $nombre */
saludo("Celeste");
saludo("Belén");
saludo("Josué");
echo "Ingrese el nombre de la persona a saludar: ";
$nombre = trim(fgets(STDIN));
saludo($nombre);