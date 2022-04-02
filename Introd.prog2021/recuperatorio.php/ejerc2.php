<?php
/** PROGRAMA registroRescates
 * Devuelve el promedio de edad de las mujeres rescatadas.
 * Devuelve el sexo y la edad de la persona de menor edad.
 */

/* Declaración de variables
 * int $edadPersona, $cantMujeres, $edadMujeres, $edadMenor
 * float $promedioEdadMujeres
 * string $respuesta, $sexoPersona, $sexoEdadMenor
 */

/* Inicialización de variables */
$cantMujeres = 0;
$edadMujeres = 0;
$edadMenor = 999;
/* Proceso */
echo ">> ¿Desea ingresar datos? (s/n): ";
$respuesta = trim(fgets(STDIN));
if ($respuesta == "s") {
    do {
        /* Ingreso de datos */
        echo "Edad de la persona: ";
        $edadPersona = trim(fgets(STDIN));
        echo "Sexo (f/m): ";
        $sexoPersona = trim(fgets(STDIN));
        /* Verificaciones */
        if ($sexoPersona == "f") {
            $cantMujeres = $cantMujeres + 1;
            $edadMujeres = $edadMujeres + $edadPersona;
        }
        if ($edadPersona < $edadMenor) {
            $edadMenor = $edadPersona;
            $sexoEdadMenor = $sexoPersona;
        }
        /* Ciclo indefinido - interactivo */
        echo "¿Desea registrar otro rescate? (s/n): ";
        $respuesta = trim(fgets(STDIN));
    } while ($respuesta == "s");
    /* Cálculo final */
    $promedioEdadMujeres = $edadMujeres/$cantMujeres;
    /* Resultados */
    echo "| Promedio de edad de mujeres rescatadas: ".$promedioEdadMujeres."\n";
    echo "| Sexo (".$sexoEdadMenor.") y edad (".$edadMenor.") de la persona de menor edad.\n";
} else {
    echo "No se registraron rescates.";
}