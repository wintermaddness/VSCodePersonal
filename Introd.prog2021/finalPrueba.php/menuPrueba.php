<?php
/** Módulo 9: juegosGanados - 
 * Recorre la colección de juegos y retorna la cant. de juegos ganados (sin contar los empates).
 * @param array $arrayJuegos
 * @return int
 */
function juegosGanados($arrayJuegos) {
    //inciso 9 - int $cantJuegosGanados, $n, $i
    $cantJuegosGanados = 0;
    $n = count($arrayJuegos);
    for ($i=0; $i<$n; $i++) {
        if ($arrayJuegos[$i]["puntosCruz"] > 1) {
            $cantJuegosGanados = $cantJuegosGanados + 1;
        } elseif ($arrayJuegos[$i]["puntosCirculo"] > 1) {
            $cantJuegosGanados = $cantJuegosGanados + 1;
        }
    }
    return $cantJuegosGanados;
}

/** Módulo 10: cantGanadasSimbolo - 
 * Contabiliza la cant. de juegos ganados por el símbolo elegido por el usuario.
 * @param string $simbolo
 * @param array $arrayColeccion
 * @return int
 */
function cantGanadasSimbolo($simbolo, $arrayColeccion) {
    //inciso 10 - int $n, $i, $cantGanados
    $n = count($arrayColeccion);
    $cantGanados = 0;
    //Se contabilizan los juegos ganados por cada símbolo:
    for ($i=0; $i<$n; $i++) {
        if ($simbolo == "O" && $arrayColeccion[$i]["puntosCirculo"] > $arrayColeccion[$i]["puntosCruz"]) {
            $cantGanados = $cantGanados + 1;
    } elseif ($simbolo == "X" && $arrayColeccion[$i]["puntosCruz"] > $arrayColeccion[$i]["puntosCirculo"]) {
            $cantGanados = $cantGanados + 1;
        }
    }
    return $cantGanados;
}

    echo "\n>> PORCENTAJE DE JUEGOS GANADOS POR SIMBOLO (X-O)\n";
    $simboloElegido = elegirSimbolo();
    $cantidadGanadas = cantGanadasSimbolo($simboloElegido, $partidasGuardadas);
    if ($cantidadGanadas > 0) {
        $porcentaje = ($cantidadGanadas * 100)/juegosGanados($partidasGuardadas);
    }
    echo "\n*************************************\n";
    echo "| Símbolo elegido: ".$simboloElegido."\n";
    echo "Porcentaje de partidas ganadas por ".$simboloElegido.": ".$porcentaje."%\n";
    echo "*************************************\n";