<?php
/** Almacenar en un arreglo Asociativo los datos de un libro (nombre, autor,
* anioEdicion). Los datos deben ser solicitados a un usuario.*/
/* Programa principal */
$libro = []; //inicializo en vacio el arreglo
echo "| Nombre del libro: ";
$libro["nombre"] = trim(fgets(STDIN));
echo "| Autor del libro: ";
$libro["autor"] = trim(fgets(STDIN));
echo "| Año de edición: ";
$libro["anioEdicion"] = trim(fgets(STDIN));
echo ">> Cantidad de elementos ingresados: ".count($libro)."\n";
//print_r($libro);
if (count($libro) > 0) {
    foreach ($libro as $indice => $elemento) {
        echo "Dato ".$indice.": ".$elemento."\n";
    }
}
echo "¿Desea modificar algún dato del libro ingresado? (s/n): ";
$respuesta = trim(fgets(STDIN));
if ($respuesta == "s") {
    do {
        echo "¿Qué dato del libro desea modificar?: ";
        $clave = trim(fgets(STDIN));
        echo "| Ingrese el nuevo valor de ".$clave.": ";
        $nuevoValor = trim(fgets(STDIN));
        $libro[$clave] = $nuevoValor;
        echo "¿Desea modificar otro dato? (s/n): ";
        $respuesta = trim(fgets(STDIN));
    } while ($respuesta == "s");
    if (count($libro) > 0) {
        foreach ($libro as $indice => $elemento) {
            echo "Dato ".$indice.": ".$elemento."\n";
        }
    }
}
//print_r($libro);