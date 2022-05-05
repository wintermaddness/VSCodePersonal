<?php
    include "PersonaHerencia.php";
    include "AlumnoFaiHerencia.php";
    function Test_CrearAlumno() {
        $objAlumno = new AlumnoFai("Celeste", "Aliaga", "44014172", "FAI-3757");
        echo $objAlumno;
    }
    function main() {
        Test_CrearAlumno();
    }
    main();
?>