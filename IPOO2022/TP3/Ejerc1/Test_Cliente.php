<?php
    include "Persona.php";
    include "Cliente.php";
    function Test_CrearCliente() {
        $objCliente = new Cliente("Celeste", "Aliaga", "44014172", "7");
        echo $objCliente;
    }
    function main() {
        Test_CrearCliente();
    }
    main();
?>