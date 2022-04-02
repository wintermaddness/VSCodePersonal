<?php
/** Módulo 1: ordenInverso - 
 * Recibe un número entero y retorna su orden inverso.
 * @param int $numero
 * @return int
 */
function ordenInverso($numero) {
    /* int $resto, $auxiliar, $acum, $inverso */
    $acum = 0;
        do {
            if ($numero > 0) {
                $resto = $numero % 10;
                $numero = (int)($numero/10);
                $auxiliar = $resto;
                $acum = $acum * 10 + $auxiliar;
            }
        } while ($numero <> 0);
    return $acum;
}

/** Módulo 2: sumaDigitos - 
 * Recibe un número entero y retorna la suma de sus dígitos.
 * @param int $numero
 * @return int
 */
function sumaDigitos($numero) {
    /* int $resto, $auxiliar, $suma */
    $suma = 0;
    do {
        $resto = $numero % 10;
        $numero = (int)($numero/10);
        $auxiliar = $resto;
        $suma = $suma + $auxiliar;
    } while ($numero <> 0);
    return $suma;
}

/** Módulo 3: cantidadDivisores - 
 * Recibe un número entero y retorna la cantidad de divisores.
 * @param int $numero
 * @return string
 */
function cantidadDivisores($numero) {
    /* string $resultado, int $i, $divisor */
    $resultado = "";
    for ($i=1; $i<$numero; $i++) {
        if ($numero % $i == 0) {
            $divisor = $i;
            $resultado = $resultado.$divisor.", ";
        }
    }
    return $resultado;
}

/** Módulo 4: esPrimo - 
 * Recibe un número entero y retorna TRUE si es primo.
 * @param int $numero
 * @return boolean
 */
function esPrimo($numero) {
    /* boolean $resultado */
    if ($numero % 2 == 0) { 
        $resultado = false;
    } elseif ($numero % 2 == 1) {
        $resultado = true;
    }
    return $resultado;
}

do {
    echo "----------------------------\n";
    echo "1. Número inverso\n";
    echo "2. Suma de dígitos\n";
    echo "3. Cantidad de divisores\n";
    echo "4. ¿Es primo?\n";
    echo "5. Salir\n";
    echo "| Elija una opción: ";
    $opcion = trim(fgets(STDIN));

    if ($opcion == 1) {
        echo "\n+ OPCIÓN 1";
        echo "\nIngrese un número para obtener el inverso: ";
        $numero1 = trim(fgets(STDIN));
        $resultado = ordenInverso($numero1);
        echo "| El inverso es: ".$resultado."\n";
    } elseif ($opcion == 2) {
        echo "\n+ OPCIÓN 2";
        echo "\nIngrese un número para obtener la suma de sus dígitos: ";
        $numero2 = trim(fgets(STDIN));
        $resultado = sumaDigitos($numero2);
        echo "| La suma de los dígitos es: ".$resultado."\n";
    } elseif ($opcion == 3) {
        echo "\n+ OPCIÓN 3";
        echo "\nIngrese un número para obtener sus divisores: ";
        $numero3 = trim(fgets(STDIN));
        $resultado = cantidadDivisores($numero3);
        echo "| Los divisores de ".$numero3." son: ".$resultado."\n";
    } elseif ($opcion == 4) {
        echo "\n+ OPCIÓN 4";
        echo "\nIngrese un número para saber si es primo: ";
        $numero4 = trim(fgets(STDIN));
        $resultado = esPrimo($numero4);
        if ($resultado == false) {
            echo "| ".$numero4." no es primo."."\n";
        } else {
            echo "| ".$numero4." es primo."."\n";
        }
    }
} while ($opcion <> 5);