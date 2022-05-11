<?php 
//Funciona.
    include "Funcion.php";
    include "Teatro.php";

    //$objFuncion: nombre, horario de inicio, duración de la obra y precio.
    $objFuncion1 = new Funcion("Hanzel y Gretel", "12:30", "1:30", 300);
    $objFuncion2 = new Funcion("Romeo y Julieta", "16:00", "2:00", 500);
    $objFuncion3 = new Funcion("Hamlet", "10:45", "1:00", 400);
    $arrayFunciones = [$objFuncion1, $objFuncion2, $objFuncion3];

    //creo un objeto Teatro
    $objTeatro = new Teatro("Teatro FaI", "Buenos Aires 1400", $arrayFunciones);
    //echo $objTeatro;

    //Modificar el nombre del teatro
    echo "--(1)-- Modificar datos del teatro ----\n";
    echo "| Ingrese el nuevo nombre del teatro: ";
    $nuevoNombre = trim(fgets(STDIN));
    $objTeatro->set_NombreTeatro($nuevoNombre);
    //Modificar dirección del teatro
    echo "| Ingrese la nueva dirección del teatro: ";
    $nuevaDireccion = trim(fgets(STDIN));
    $objTeatro->set_DireccionTeatro($nuevaDireccion);
    $DatosTeatro = $objTeatro->__toString();
    echo "\n".$DatosTeatro;

    //agregar una función
    echo "\n--(2)-- Agregar una función ----\n";
    echo "| Ingrese el nombre de la función: ";
    $nombre_funcion = strtolower(trim(fgets(STDIN)));
    echo "| Horario de inicio: ";
    $horario_inicio = strtolower(trim(fgets(STDIN)));
    echo "| Duración (en hs): ";
    $obra_duracion = strtolower(trim(fgets(STDIN)));
    echo "| Precio: ";
    $obra_precio = strtolower(trim(fgets(STDIN)));
    $objFuncion = new Funcion($nombre_funcion, $horario_inicio, $obra_duracion, $obra_precio);
    $crearFuncion1 = $objTeatro->crearFuncion($objFuncion, $horario_inicio);
    echo $crearFuncion1;

    //Modificar nombre/precio del arreglo función
    echo "\n--(3)-- Modificar datos de una función ----\n";
    echo "| Ingrese el nombre de la función que desea modificar: ";
    $nombreFuncion = trim(fgets(STDIN));
    $validacion = $objTeatro->validarFuncion($nombreFuncion);
    if ($validacion == null) {
        echo "  >> ERROR. El nombre ingresado no se corresponde con ninguna función.\n";
    } else {
        echo "+| Ingrese el nuevo nombre de la función: ";
        $nuevoNombre = trim(fgets(STDIN));
        echo "+| Ingrese el nuevo precio de la función: ";
        $nuevoPrecio = trim(fgets(STDIN));
        $modifico = $objTeatro->modificar_NombrePrecioFuncionconId($nombreFuncion, $nuevoNombre, $nuevoPrecio);
        $resultado = ($modifico?"   >> Se modificaron los datos exitosamente.":"   >> Los datos no se puedieron modificar.");
        echo $resultado."\n";
    }

    //mostrar los datos de una función
    echo "\n--(4)-- Mostrar los datos de una función ----\n";
    echo "| Ingrese el nombre de la función que desea ver: ";
	$nombreFuncion = trim(fgets(STDIN));
	$validacion = $objTeatro->validarFuncion($nombreFuncion);
	if ($validacion == false) {
	    echo "  >>> ERROR. El nombre ingresado no se corresponde con ninguna función.\n";
	} else {
        $datosFuncion = $objTeatro->mostrarFuncionesTeatro($nombreFuncion);
		echo $datosFuncion;
	}

    echo "\n".$objTeatro;
?>