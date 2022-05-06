<?php
    include "Persona.php";
    include "Cliente.php";
    include "Cuenta.php";
    include "CuentaCorriente.php";
    include "CajaDeAhorro.php";

    //Se crean los objPersona/Clientes:
    $persona1 = new Persona("Raleigh", "Becket", "44014172");
    echo "1)".$persona1."\n";
    $persona2 = new Persona("Chuck", "Hansen", "92476572");
    echo "1)".$persona2."\n";

    //Se crean los objCliente:
    $objCliente1 = new Cliente("Raleigh", "Becket", "44014172", 1);
    $objCliente2 = new Cliente("Chuck", "Hansen", "92476572", 2);

    //Se crean los objCajaDeAhorro:
    $objCajaDeAhorro1 = new CajaDeAhorro(1, 10000, "12345678909876554321");
    echo "2)\n".$objCajaDeAhorro1."\n";
    $objCajaDeAhorro2 = new CajaDeAhorro(2, 20000, "09876543211234567890");
    echo "2)\n".$objCajaDeAhorro2."\n";

    //Se crean los objCuentaCorriente:
    $objCuentaCorriente1 = new CuentaCorriente(1, 15000, 10000);
    echo "3)\n".$objCuentaCorriente1."\n";
    $objCuentaCorriente2 = new CuentaCorriente(2, 25000, 20000);
    echo "3)\n".$objCuentaCorriente2."\n";

    //Se crean los objCuenta:
    $objCuenta1 = new Cuenta(1, 10000);
    echo "4)\n".$objCuenta1."\n";
    $objCuenta2 = new Cuenta(2, 20000);
    echo "4)\n".$objCuenta2."\n";

    //Se invoca al método realizarDepósito (Cuenta.php):
    $deposito1 = $objCuenta1->realizarDeposito(5000);
    echo "5)".$deposito1."\n";
    $deposito2 = $objCuenta2->realizarDeposito(1000);
    echo "5)".$deposito2."\n";
?>