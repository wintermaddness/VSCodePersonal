<?php
//REVISAR LOS DOS ÚLTIMOS MÉTODOS
    include "Lectura2.php";
    include "Libro.php";

    //Se crean los objetos Libro y Lectura:
    $sinopsis = "   Es un maravilloso poema griego que nos expone las vicisitudes vividas por el valiente Odiseo,\n"
			."  quien después de haber luchado de manera incansable en la  Guerra de Troya, lo único que quiere\n"
			."  es volver a casa pero, para su pesar, va a tener que enfrentar una serie de obstáculos por designio\n"
			."  de los dioses, que harán que tarde 10 años en regresar.";
    $objLibro = new Libro("7787", "Odisea", 1999, "Mers", "Mauro", "Mels", $sinopsis);
    $objLectura = new Lectura2($objLibro);

    //Se muestran en pantalla los datos de los objetos:
    echo "1)\n".$objLectura."\n";

    //Se verifica que el libro esté dentro de la colección de libros leídos:
    $libroLeido = $objLectura->libroLeido($objLibro->getTitulo());
    if ($libroLeido == false) {
        $agregarLectura = $objLectura->agregarLectura($objLibro);
        echo "  + Libro agragado a la lista de leídos.\n";
    } else {
        echo "  + El libro ya se leyó.\n";
    }

    //Se crean nuevos objetos Libro y Lectura:
    $sinopsis = "   Harry Potter y la piedra filosofal, publicado en 1997, es el primer libro de la exitosa saga escrita por\n"
            ."  J. K. Rowling. Trata sobre un niño huérfano que descubre que tiene poderes mágicos y es invitado a asistir a\n"
            ."  una escuela de magia y hechicería. Allí se enfrenta a numerosas pruebas y peligros, forja amistades duraderas,\n"
            ."  aprende sobre su pasado y encuentra su lugar en el mundo.";
    $objLibro2 = new Libro("1123", "Harry Potter y la piedra filosofal", 1997, "Bloombury", "J.K", "Rowling", $sinopsis);
    $objLectura2 = new Lectura2($objLibro2);
    $agregarLectura2 = $objLectura2->agregarLectura($objLibro2);

    //Se muestran en pantalla los datos de los objetos:
    echo "2)\n".$objLectura2."\n";

    //Se invoca al método leidosAnioEdicion:
    $anioEdicion = 1999;
    $anioEdicionLeidos = $objLectura->leidosAnioEdicion($anioEdicion);
    if ($anioEdicionLeidos == false) {
        echo "  + Ninguno de los libros leídos fue editado en el año ".$anioEdicion.".\n";
    } else {
        print_r($anioEdicionLeidos)."\n";
    }

    //Se invoca al método darLibrosPorAutor:
    $nombreAutor = "J.K";
    $librosPorAutor = $objLectura->darLibrosPorAutor($nombreAutor);
    if ($librosPorAutor == false) {
        echo "  + Ninguno de los libros leídos le pertenece al autor: ".$nombreAutor."\n";
    } else {
        print_r($librosPorAutor)."\n";
    }
?>