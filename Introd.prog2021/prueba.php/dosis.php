<?php
/* PRINCIPAL */
/* Determina el precio a pagar por la dosis de tranquilizante*/
/* string $tipoMascota, $esCronico, float $precio, int $cantMiligramos*/
echo "Ingrese el tipo de mascota (perro/gato): ";
$tipoMascota = trim(fgets(STDIN));

echo "¿Tiene alguna enfermedad crónica? (si/no): ";
$esCronico = trim(fgets(STDIN));
if ($tipoMascota == "perro") {
$cantMiligramos = 20;
} elseif ($tipoMascota == "gato") {
$cantMiligramos = 8;
} else {
$cantMiligramos = 5;
}
if ($esCronico == "si") {
$precio = $cantMiligramos * 80;
} else {
$precio = $cantMiligramos * 100;
}
echo "El precio de la dosis es: $" . $precio . "\n";