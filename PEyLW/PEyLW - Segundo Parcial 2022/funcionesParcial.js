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
 function vaciarCampos(){
    document.getElementById("txCandidato").value = "";
    document.getElementById("txDNI").value = "";
    document.getElementById("txSexo").value = "";
}

/**
 * @param {*} input 
 * Colorea de rojo el borde del input con valor incorrecto:
 */
function colorearBorde(input){
    input.style.borderColor = "red";
}
/**
 * @param {*} input 
 * Colorea de verde el borde del input con valor correcto:
 */
 function colorearBorde2(input){
    input.style.borderColor = "green";
}

/**
 * Retorna los bordes de los inputs a su color original:
 */
function resetearColorBordes() {
    //Se obtienen los input:
    inputCandidato = document.getElementById("txCandidato");
    inputDocumento = document.getElementById("txDNI");
    unputSexo = document.getElementById("txSexo");
    
    //Retorna los bordes al color original:
    inputCandidato.style.borderColor = "";
    inputDocumento.style.borderColor = "";
    unputSexo.style.borderColor = "";
}

/**
 * @return formValido - 
 * Verifica que el formulario esté cargado con datos correctos.
 */
function verificarFormulario() {
    //Inicialización de variables:
    var valorIngresado, formValido;
    formValido = true;

    /* -------------------------------------------------------------------------------------------------------------------- */
    //Se almacena el valor del input "txCandidato":
    valorIngresado = document.getElementById("txCandidato");
    
    //Si el campo está vacio, el borde del input se vuelve de color rojo y el formulario no es válido:
    if (valorIngresado.value == "" || isNaN(valorIngresado.value)) {
        colorearBorde(valorIngresado);
        formValido = false;
    } else if (valorIngresado.value != "kodos" || valorIngresado.value != "kang" || valorIngresado.value != "blanco") {
        colorearBorde(valorIngresado);
        formValido = false;
    } else {
        colorearBorde2(valorIngresado);
    }

    /* -------------------------------------------------------------------------------------------------------------------- */
    //Se almacena el valor del input "txSexo"
    valorIngresado = document.getElementById("txSexo");
    
    //Si el campo está vacio, el borde del input se vuelve de color rojo y el formulario no es válido:
    if (valorIngresado.value == "" || isNaN(valorIngresado.value)) {
        colorearBorde(valorIngresado);
        formValido = false;
    } else if (valorIngresado.toUpperCase() != "M" || valorIngresado.toUpperCase() != "F") {
        colorearBorde(valorIngresado);
        formValido = false;
    } else {
        colorearBorde2(valorIngresado);
    }

    /* -------------------------------------------------------------------------------------------------------------------- */
    //Se almacena el valor del input "txDNI" y se "parsea" su valor a int:
    valorIngresado = document.getElementById("txDNI");
    var num = parseInt(valorIngresado.value);
    
    //Si el campo está vacio, el borde del input se vuelve de color rojo y el formulario no es válido:
    if (valorIngresado.value == "" || !isNaN(valorIngresado.value)) {
        colorearBorde(valorIngresado);
        formValido = false;
    } else {
        //Dado dos rangos, se verifica que el valor del DNI se encuentre entre ellos:
        var rangoUno = 1000000;
        var rangoDos = 999999999;
        
        // Si el dni ingresado no está entre rangoUno y rangoDos, el borde del input se vuelve de color rojo y el formulario no es válido:
        if (rangoUno > num || num > rangoDos) {
            colorearBorde(valorIngresado);
            formValido = false;
        } else {
            colorearBorde2(valorIngresado);
        }
    }
    return formValido;
}

function organizarFormulario() {
    //Declaración e inicialización de variables:
    var formularioValido, stringDatosVoto, salida;

    //Se verifica y almacena el valor true/false (si el formulario es válido o no);
    formularioValido = verificarFormulario();
    salida = document.getElementById("Votantes");
    
    //Se crea un string con los valores del voto:
    stringDatosVoto = "Candidato: " + document.getElementById("txCandidato").value +
                       "<br/>DNI: " + document.getElementById("txDNI").value +
                        "<br/>Sexo: " + document.getElementById("txSexo").value + "<hr/>";
    
    //stringDatosVoto = ['candidato' = document.getElementById("txCandidato").value,
    //                    'documento' = document.getElementById("txDNI").value,
    //                    'sexo' = document.getElementById("txSexo").value];

    stringDatosVoto = [document.getElementById("txCandidato").value, document.getElementById("txDNI").value, document.getElementById("txSexo").value];

    //Si el formulario es válido, se ingresan los datos en el div "Votantes":
    if (formularioValido) {
        //Se registra el string en el div:
        //salida.innerHTML += stringDatosVoto + "\r\n";
        //Se registra un voto al candidato elegido:
        ResultadosKang = document.getElementById("ResultadosKang");
        ResultadosKodos = document.getElementById("ResultadosKodos");
        ResultadosBlanco = document.getElementById("ResultadosBlanco");

        var x = 1;
        var y = 1;
        var z = 1;
        if (document.getElementById("txCandidato").value.toUpperCase() == "KODOS") {
            ResultadosKang.innerHTML += replace('0', x);
            x++;
        } else if (document.getElementById("txCandidato").value.toUpperCase() == "KANG") {
            ResultadosKodos.innerHTML += replace('0', y);
            y++;
        } else if (document.getElementById("txCandidato").value.toUpperCase() == "BLANCO") {
            ResultadosBlanco.innerHTML += replace('0', z);
            z++;
        }
        //Se vacían los input:
        vaciarCampos();    
        //Se resetean los colores de los bordes:
        resetearColorBordes();
    }

    let btnRegistrar = document.getElementById('registar');
    let votos = [];
    function agregarVoto() {
        votos.push(stringDatosVoto)
        btnRegistrar.addEventListener("click", () => {
            votos.forEach((elemento) => {
                salida.innerHTML += `<p>${elemento.value}</p>`
            })
        })
    }
    agregarVoto();
}