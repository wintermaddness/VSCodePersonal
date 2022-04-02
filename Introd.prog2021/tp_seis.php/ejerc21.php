<?php
/** PROGRAMA principal
 * string $respuesta
 * int $anioActual, $anioNacimiento, $edadMayor
 * int $edadMenor, $cantAlumnos, $edad
 * float $altura, $peso, $alturaEdadMayor
 * float $pesoEdadMenor, $sumaPesos, $promedio
*/
$cantAlumnos = 0;
$edadMayor = 0;
$edadMenor = 999;
$sumaPesos = 0;
echo "| Ingrese el año actual: ";
$anioActual = trim(fgets(STDIN));
echo "--- Ingrese los datos del alumno ---\n";
do {
    //Lectura de datos.
    echo "(1) Año de nacimiento: ";
    $anioNacimiento = trim(fgets(STDIN));
    echo "(2) Altura: ";
    $altura = trim(fgets(STDIN));
    echo "(3) Peso: ";
    $peso = trim(fgets(STDIN));
    //Cálculos y verificaciones.
    $edad = $anioActual - $anioNacimiento;
    if ($edad > $edadMayor) {
        $edadMayor = $edad;
        $alturaEdadMayor = $altura;
    }
    if ($edad < $edadMenor) {
        $edadMenor = $edad;
        $pesoEdadMenor = $peso;
    }
    //Contar y sumar.
    $cantAlumnos = $cantAlumnos + 1;
    $sumaPesos = $sumaPesos + $peso;
    echo "¿Desea ingresar los datos de un nuevo alumno? (si/no): ";
    $respuesta = trim(fgets(STDIN));
} while ($respuesta == "si");
//Calcular el promedio.
$promedio = $sumaPesos/$cantAlumnos;
//Informar los resultados.
echo "\n|+ Resultados +|\n";
echo "| Altura y edad del alumno de mayor edad: ".$edadMayor." años (".$alturaEdadMayor." m)\n";
echo "| Peso y edad del alumno con menor edad: ".$pesoEdadMenor." kg (".$edadMenor." años)\n";
echo "| Peso promedio: ".$promedio;