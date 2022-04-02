<?php
/** PROGRAMA principal
 * string $ingreso, $nombreEmpleado, $puestoEmpleado
 * string $empleadoMenorEdad, $respuesta 
 * int $edadEmpleado, $edadMenor, $profesionales, $edadTecnicos
 * int $cantidadTecnicos, $cantidadEmpleados, $porcentajeProfesionales
 * int $promedioTecnicos
 */
$cantidadEmpleados = 0;
$profesionales = 0;
$edadMenor = 999;
$edadTecnicos = 0;
$cantidadTecnicos = 0;
$empleadoMenorEdad = "";
echo "¿Desea ingresar datos? (s/n): ";
$ingreso = trim(fgets(STDIN));
if ($ingreso == "n") {
    echo "No se ingresaron datos de ningún empleado.";
} else {
    do {
        echo "Nombre del empleado: ";
        $nombreEmpleado = trim(fgets(STDIN));
        echo "Edad del empleado: ";
        $edadEmpleado = trim(fgets(STDIN));
        echo "Puesto del empleado (a, p, t): ";
        $puestoEmpleado = trim(fgets(STDIN));

        if ($edadEmpleado < $edadMenor) {
            $edadMenor = $edadEmpleado;
            $empleadoMenorEdad = $nombreEmpleado;
        }

        if ($puestoEmpleado == "p") {
            $profesionales = $profesionales + 1;
        } elseif ($puestoEmpleado == "t") {
            $edadTecnicos = $edadTecnicos + $edadEmpleado;
            $cantidadTecnicos = $cantidadTecnicos + 1;
        }

        $cantidadEmpleados = $cantidadEmpleados + 1;
        echo "\n¿Desea ingresar datos de otro empleado? (s/n): ";
        $respuesta = trim(fgets(STDIN));
    } while ($respuesta == "s");

    $porcentajeProfesionales = ($profesionales * 100)/$cantidadEmpleados;
    $promedioTecnicos = (int)($edadTecnicos/$cantidadTecnicos);
    echo "--------------------- Resultados ---------------------\n";
    echo "| Nombre del empleado más joven: ".$empleadoMenorEdad."\n";
    echo "| Porcentaje de profesionales: ".$porcentajeProfesionales."%\n";
    echo "| Pormedio de edad del personal técnico: ".$promedioTecnicos." años\n";
}