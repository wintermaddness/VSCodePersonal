<?php
/** E J E R C I C I O
 * a. Dados 5 números (ingresados por el usuario), crear una función que reciba 
 * todos los números (dentro de un arreglo), los sume y luego divida el resultado de dicha sumatoria
 * por 5 antes de retornarlo al usuario.
 * b. En el programa principal incluir la opción de modificar uno/algunos de los números ingresados.
 * c. Dentro del programa, recorrer el arreglo y mostrar los datos almacenados en modo lista (ej.: "Nro X: ...").
 */

/** Módulo 1: sumarNros - 
 * Recibe los 5 números ingresados y los suma para retornar el resultado.
 * @param array $nrosarreglo
 * @return int
 */
function sumarNros($nrosarreglo) {
    /* $i, $sumatoria, $resultado */
    $sumatoria = 0;
    for ($i=1; $i<=5; $i++) {
        $sumatoria = $sumatoria + $nrosarreglo[$i]["numero"];
    }
    $resultado = $sumatoria / 5;
    return $resultado;
}

/** PROGRAMA principal
 * Se encarga de solicitarle al usuario los 5 nros necesarios para las operaciones de suma y división.
 * Muestra el listado de números ingresados y el resultado de las operaciones.
 * array $nros
 * string $respuesta
 * int $i, $clave, $nuevoValor
 * float $division
 */

//Se inicializa el arreglo:
$nros = [];
//Se le solicitan al usuario los números:
echo "| Por favor, ingrese 5 números: \n";
$i = 1;
while ($i <= 5) {
    echo "  + Ingrese el número $i: ";
    $nros[$i]["numero"] = trim(fgets(STDIN));
    $i = $i + 1;
}
//b. Le permite al usuario modificar algún número ingresado:
echo "| ¿Desea modificar alguno de los números ingresados? (s/n): ";
$respuesta = trim(fgets(STDIN));
if ($respuesta == "s") {
    do {
        echo "| ¿Qué número (del 1 al 5) desea modificar?: ";
        $clave = trim(fgets(STDIN));
        if (is_numeric($clave) && ($clave <= 5 && $clave <> 0)) {
            echo "  + Ingrese el nuevo valor del número ".$clave.": ";
            $nuevoValor = trim(fgets(STDIN));
            $nros[$clave]["numero"] = $nuevoValor;
            echo "  + ¿Desea modificar otro dato? (s/n): ";
            $respuesta = trim(fgets(STDIN));
            //if ($respuesta <> "s" || $respuesta <> "n") {
                while ($respuesta <> "s" && $respuesta <> "n") {
                    echo "(!) ERROR. Ingrese una respuesta válida (s/n).\n";
                    echo "  + ¿Desea modificar otro dato? (s/n): ";
                    $respuesta = trim(fgets(STDIN));
                }
        } else {
            echo "(!) ERROR. Ingrese un índice válido (del 1 al 5).\n";
        }
    } while ($respuesta == "s");
    if (count($nros) > 0) {
        //c. Se muestran en pantalla los números ingresados:
        echo "| Números ingresados: \n";
        for ($i=1; $i<=5; $i++) {
            echo "  + Número ".$i.": ".$nros[$i]["numero"]."\n";
        }
    }
}
//a. Se invoca a la función y se muestra el resultado:
$division = sumarNros($nros);
echo "| Resultado: ".$division;