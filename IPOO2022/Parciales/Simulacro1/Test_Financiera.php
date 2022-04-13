<?php
    include "Persona.php";
    include "Cuota.php";
    include "Prestamo.php";
    include "Financiera.php";

    $objPersona1 = new Persona("Pepe", "Flores", "Bs.As 12", "pepeflores@gmail.com", 299-444567, 40000);
    $objPrestamo1 = new Prestamo(1, 50000, 5, 0.1, $objPersona1);
    $objFinanciera->incorporarPrestamo($objPrestamo1);
    $objPersona2 = new Persona("Luis", "Suarez", "Bs.As 123", "luissuarez@gmail.com", 299-4455, 4000);
    $objPrestamo2 = new Prestamo(2, 10000, 4, 0.1, $objPersona2);
    $objFinanciera->incorporarPrestamo($objPrestamo2);
    $objPersona3 = new Persona("Luis", "Suarez", "Bs.As 123", "luissuarez@gmail.com", 299-4455, 4000);
    $objPrestamo3 = new Prestamo(3, 10000, 2, 0.1, $objPersona3);
    $objFinanciera->incorporarPrestamo($objPrestamo3);
    
    $objFinanciera = new Financiera("Money", "Av. Arg 1234");
    echo $objFinanciera;
?>