<?php
/* PRINCIPAL */
/* Determina la dosis en gotas para una mascota. */
/* string $tipoMascota, float $pesoMascota, int $edadMascota, $dosisPerro,
$dosisGato*/
echo "Ingrese el tipo de mascota (perro/gato): ";
$tipoMascota = trim(fgets(STDIN));
if ($tipoMascota == "perro") {
    echo "Ingrese el peso: ";
    $pesoMascota = trim(fgets(STDIN));
    if ($pesoMascota < 10) {
        $dosisPerro = (int)($pesoMascota * 1);
    } else {
        $dosisPerro = (int)($pesoMascota / 2 * 1);
}
    echo "La dosis del perro es: " . $dosisPerro;
} elseif ($tipoMascota == "gato") {
    echo "Ingrese la edad: ";
    $edadMascota = trim(fgets(STDIN));
    if ($edadMascota < 2) {
        $dosisGato = 2;
    } else {
        $dosisGato = 5;
    }
    echo "La dosis del gato es: " . $dosisGato;
} else {
    echo "El tipo de mascota no es ni perro, ni gato. ";
}
    echo "\nFin";