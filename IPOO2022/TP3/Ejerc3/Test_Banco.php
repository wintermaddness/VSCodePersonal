<?php
    include "Persona.php";
    include "Cliente.php";
    include "Cuenta.php";
    include "CuentaCorriente.php";
    include "CajaAhorro.php";
    include "Banco.php";

    //Se crean los objPersona:
    $persona1 = new Persona("Raleigh", "Becket", "44014172");
    $persona2 = new Persona("Chuck", "Hansen", "92476572");

    //Se crean los objCliente:
    $objCliente1 = new Cliente("Dean", "Winchester", 123456789, 12);
    $objCliente2 = new Cliente("Sam", "Winchester", 112233445, 22);
    $coleccionClientes = [$objCliente1, $objCliente2];

    //Se crean los objCajaDeAhorro:
    $objCajaDeAhorro1 = new CajaAhorro($objCliente1, 10000, "12345678909876554321");
    $objCajaDeAhorro2 = new CajaAhorro($objCliente2, 20000, "09876543211234567890");
    $coleccionCajaAhorro = [$objCajaDeAhorro1, $objCajaDeAhorro2];

    //Se crean los objCuentaCorriente:
    $objCuentaCorriente1 = new CuentaCorriente($objCliente1, 15000, "12345678909876554321", 10000);
    $objCuentaCorriente2 = new CuentaCorriente($objCliente2, 25000, "09876543211234567890", 20000);
    $coleccionCuentasCorrientes = [$objCuentaCorriente1, $objCuentaCorriente2];

    //Se crea el objBanco:
    $nroCuentas = 1234;
    $objBanco = new Banco($coleccionCuentasCorrientes, $coleccionCajaAhorro, $nroCuentas, $coleccionClientes);
    //echo $objBanco;

    //Se agrega dos nuevos clientes al banco:
    $nroNuevoCliente1 = $objBanco->incorporarCliente($persona1);
    echo "+| N° de cliente: ".$nroNuevoCliente1."\n";
    $nroNuevoCliente2 = $objBanco->incorporarCliente($persona2);
    echo "+| N° de cliente: ".$nroNuevoCliente2."\n";

    //Se crean dos cuentas corrientes:
    $nuevaCuentaCorriente1 = $objBanco->incorporarCuentaCorriente($nroNuevoCliente1);
    if ($nuevaCuentaCorriente1 == null) {
        echo ">>> ERROR. El cliente ingresado no existe.\n";
    } else {
        echo ">>> El N° de la cuenta corriente es ".$nuevaCuentaCorriente1."\n";
    }
    $nuevaCuentaCorriente2 = $objBanco->incorporarCuentaCorriente($nroNuevoCliente2);
    if ($nuevaCuentaCorriente2 == null) {
        echo ">>> ERROR. El cliente ingresado no existe.\n";
    } else {
        echo ">>> El N° de la cuenta corriente es ".$nuevaCuentaCorriente2."\n";
    }

    //Se crean tres cuentas caja de ahorro:
    $nuevaCajaAhorro1 = $objBanco->incorporarCajaAhorro($nroNuevoCliente1);
    if ($nuevaCajaAhorro1 == null) {
        echo ">>> ERROR. El cliente ingresado no existe.\n";
    } else {
        echo ">>> El N° de la cuenta caja de ahorro es ".$nuevaCajaAhorro1."\n";
    }
    $nuevaCajaAhorro2 = $objBanco->incorporarCajaAhorro($nroNuevoCliente1);
    if ($nuevaCajaAhorro2 == null) {
        echo ">>> ERROR. El cliente ingresado no existe.\n";
    } else {
        echo ">>> El N° de la cuenta caja de ahorro es ".$nuevaCajaAhorro2."\n";
    }
    $nuevaCajaAhorro3 = $objBanco->incorporarCajaAhorro($nroNuevoCliente2);
    if ($nuevaCajaAhorro3 == null) {
        echo ">>> ERROR. El cliente ingresado no existe.\n";
    } else {
        echo ">>> El N° de la cuenta caja de ahorro es ".$nuevaCajaAhorro3."\n";
    }

    //Se deposita un monto a cada caja de ahorro:
    $objBanco->realizarDeposito($nuevaCajaAhorro1, 300);
    $objBanco->realizarDeposito($nuevaCajaAhorro2, 300);
    $objBanco->realizarDeposito($nuevaCajaAhorro3, 300);

    //Se transfieren $150 de la Cuenta Corriente de Cliente1 a la Caja de Ahorro de Cliente2

    //Se muestran los datos de todas las cuentas:
    echo $objBanco;
?>