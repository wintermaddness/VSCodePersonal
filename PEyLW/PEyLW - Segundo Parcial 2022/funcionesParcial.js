/**
 * Items sin resolver:
 * Verificar que esa persona (DNI) no haya votado previamente.
 * Debe sumarse el voto al candidato que corresponde. Para ello estan creados los siguientes spans que inicialmente tiene el numero "0".
 * El DNI debe adicionarse al div "Votantes", separado por "-".
 * En el caso de que un DNI ya haya sido registrado el sistema debe emitir una alerta con el mensaje "Esta persona ya emitió su voto. El fraude está mal claro que sí" (no debe permitir continuar). 
 */

/**
 * Vacía los campos ingresados:
 */
function vaciarCampos() {
    document.getElementById("txCandidato").value = "";
    document.getElementById("txDNI").value = "";
    document.getElementById("txSexo").value = "";
}

/**
 * Retorna los bordes de los inputs a su color original:
 */
function resetearColorBordes() {
    //Se obtienen los input:
    inputCandidato = document.getElementById("txCandidato");
    inputDocumento = document.getElementById("txDNI");
    inputSexo = document.getElementById("txSexo");
    
    //Retorna los bordes al color original:
    inputCandidato.style.borderColor = '';
    inputDocumento.style.borderColor = '';
    inputSexo.style.borderColor = '';
}

/**
 * @return formValido - 
 * Verifica que el formulario esté cargado con datos correctos.
 */
function verificarFormulario() {
    //Inicialización de variables:
    var valorIngresado, formValido, alertaCandidato, alertaDni, alertaSexo;
    alertaCandidato = document.getElementById("alertaCandidato");
    alertaDni = document.getElementById("alertaDocumento");
    alertaSexo = document.getElementById("alertaSexo");
    formValido = true;

    /* -------------------------------------------------------------------------------------------------------------------- */
    //Se verifica el valor del input "txCandidato":
    valorIngresado = document.getElementById("txCandidato").value.toUpperCase();
    if (valorIngresado == "KODOS") {
        alertaCandidato.innerHTML = "";
        document.getElementById("txCandidato").style.borderColor = 'palegreen';
    } else if (valorIngresado == "KANG") {
        alertaCandidato.innerHTML = "";
        document.getElementById("txCandidato").style.borderColor = 'palegreen';
    } else if (valorIngresado == "BLANCO") {
        alertaCandidato.innerHTML = "";
        document.getElementById("txCandidato").style.borderColor = 'palegreen';
    } else {
        //alert("(1) ERROR EN CANDIDATO: Ingrese Kodos, Kang o Blanco");
        alertaCandidato.innerHTML = "(1) ERROR EN CANDIDATO: Ingrese Kodos, Kang o Blanco";
        document.getElementById("txCandidato").style.borderColor = 'red';
        formValido = false;
    }

    /* -------------------------------------------------------------------------------------------------------------------- */
    //Se almacena el valor del input "txDNI" y se "parsea" su valor a int:
    valorIngresado = parseInt(document.getElementById("txDNI").value);
    if (valorIngresado >= 1000000 && valorIngresado <= 999999999) {
        alertaDni.innerHTML = "";
        document.getElementById("txDNI").style.borderColor = 'palegreen';
    } else {
        //alert("(2) ERROR EN DNI: Ingrese un documento entre 1.000.000 y 999.999.999");
        alertaDni.innerHTML = "(2) ERROR EN DNI: Ingrese un documento entre 1.000.000 y 999.999.999";
        document.getElementById("txDNI").style.borderColor = 'red';
        formValido = false;
    }

    /* -------------------------------------------------------------------------------------------------------------------- */
    //Se verifica el valor del input "txSexo":
    valorIngresado = document.getElementById("txSexo").value.toUpperCase();
    if (valorIngresado == "M" || valorIngresado == "F") {
        alertaSexo.innerHTML = "";
        document.getElementById("txSexo").style.borderColor = 'palegreen';
    } else {
        //alert("(3) ERROR EN SEXO: Ingrese M o F");
        alertaSexo.innerHTML = "(3) ERROR EN SEXO: Ingrese M o F";
        document.getElementById("txSexo").style.borderColor = 'red';
        formValido = false;
    }
    
    //Se retorna la validación del formulario:
    return formValido;
}

var votosKodos = 0;
var votosKang = 0;
var votosBlanco = 0;
function sumarVotoCandidato(candidatoIngresado) {
    if (candidatoIngresado.toUpperCase() == "KODOS") {
        votosKodos++;
        document.getElementById("ResultadosKodos").innerHTML = votosKodos;
    } else if (candidatoIngresado.toUpperCase() == "KANG") {
        votosKang++;
        document.getElementById("ResultadosKang").innerHTML = votosKang;
    } else {
        votosBlanco++;
        document.getElementById("ResultadosBlanco").innerHTML = votosBlanco;
    }
}

var registrarVotante = new Array();

function dniRepetido(dniIngresado) {
    var existeDni = false;
    for (var i in registrarVotante) {
        if (registrarVotante[i] == dniIngresado) {
            existeDni = true;
        }
    }
    return existeDni;
}

function organizarFormulario() {
    //Declaración e inicialización de variables:
    var formularioValido, salida;

    //Se verifica y almacena el valor true/false (si el formulario es válido o no);
    formularioValido = verificarFormulario();
    salida = document.getElementById("Votantes");
    var candidato = document.getElementById("txCandidato").value;
    var dni = parseInt(document.getElementById("txDNI").value);
    var sexo = document.getElementById("txSexo").value;
    
    if (formularioValido) {
        //Se verifica que el DNI no se repita:
        if (dniRepetido(dni)) {
            alert("Esta persona ya emitió su voto. El fraude está mal claro que sí");
            document.getElementById("txDNI").style.borderColor = 'red';
        } else {
            sumarVotoCandidato(candidato);
            registrarVotante.push(dni);
            salida.innerHTML += "DNI: " + dni + " (" + sexo + ") - ";
            //Se vacían los input:
            vaciarCampos();    
            //Se resetean los colores de los bordes:
            resetearColorBordes();
        }
    } else {
        alert("ERROR: Formulario inválido.");
    }
}