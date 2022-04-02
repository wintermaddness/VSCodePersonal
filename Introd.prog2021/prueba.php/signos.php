<?php
/**
* Módulo 1: esLibriano - 
* Determina si una persona es de Libra (entre el 23/9 y el 22/10).
* @param int diaNac
* @param int mesNac
* @return boolean
*/
function esLibriano($diaNac, $mesNac){
	//variables internas del módulo: boolean $libra
	$libra = (($mesNac == 9 && $diaNac >= 23 && $diaNac <= 30) || ($mesNac == 10 && $diaNac >= 1 && $diaNac <= 22));
	return $libra;
}

/*Programa Principal*/
/*Para ejecutar y comprobar si funciona el módulo.*/
	// variables del programa Principal: int $mes, $dia, string $rta
	echo "Dia de Nacimiento: ";
	$dia = trim(fgets(STDIN));
	echo "Mes de Nacimiento: ";
	$mes = trim(fgets(STDIN));
	$rta = esLibriano($dia,$mes) ? "Es de Libra." : "Corresponde a otro signo.";
	echo $rta;