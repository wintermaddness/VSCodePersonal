/*let id = (id) => document.getElementById(id);
let classes = (classes) => document.getElementsByClassName(classes);*/

/* Elementos con ID */
const nombre = document.getElementById("Nombre-de-Usuario")
const email = document.getElementById("correo-electrónico")
const date = document.getElementById("fecha-nac")
const pass = document.getElementById("contrasena")
const form = document.getElementById("formulario")
const parrafo = document.getElementById("warnings")

let inputMonth = document.querySelector('#fecha-mes');
let inputDate = document.querySelector('#fecha-dia');
let inputYear = document.querySelector('#fecha-anio');
let btnCheck = document.querySelector('#btn');
    
form.addEventListener("submit", e => {
    e.preventDefault()
    let warnings = "";
    let entrar = false;
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    let regexName = new RegExp('^[A-Z]+$','i');
    let regexDate = /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(0[1-9]|1[1-9]|2[1-9])$/;
    let regexPassword = /^[0-9]*$/;
    parrafo.innerHTML = "";
    let mes = inputMonth.value;
    let anio = inputYear.value;
    let dia = inputDate.value;

    if (nombre.length == 0 && email.length == 0 && date.length == 0 && pass.length == 0) {
        warnings += 'Los campos deben estar completos.<br>';
        entrar = true;
    } else {
        /* Validación del usuario -----------------------------------------------------------------------------------------------------------*/
        if (nombre.value.length < 6) {
            //El nombre debe tener al menos 6 caracteres: 
            warnings += 'El nombre no es válido.<br>';
            nombre.style.borderColor = 'red';
            nombre.focus();
            entrar = true;
        } else if (!regexName.test(nombre.value)) {
            //El nombre debe tener sólo letras:
            warnings += 'Nombre inválido <br>(ingrese sólo letras)<br>';
            nombre.style.borderColor = 'red';
            nombre.focus();
            entrar = true;
        } else {
            nombre.style.borderColor = 'palegreen';
        }

        /* Validación del email -------------------------------------------------------------------------------------------------------------*/
        if (!regexEmail.test(email.value)) {
            warnings += 'El email no es válido.<br>';
            email.style.borderColor = 'red';
            //email.focus();
            entrar = true;
        } else {
            email.style.borderColor = 'palegreen';
        }

        /* Validación de la fecha de nacimiento ---------------------------------------------------------------------------------------------*/
        if (dia.length < 2 && mes.length < 2 && anio < 4) {
            //La fecha debe tener al menos 6 caracteres (+ las barras separadoras): 
            warnings += 'La fecha no es válida.<br>';
            /*date.style.borderColor = 'red';
            date.focus();*/
            //Si los campos de la fecha están incompletos:
            inputDate.style.borderColor = 'red';
            inputMonth.style.borderColor = 'red';
            inputYear.style.borderColor = 'red';
            entrar = true;
        } else if (dia.length == "" || mes.length == "" || anio.length == "") {//Se verifican c/u de los campos de fecha:
            warnings += 'La fecha no es válida<br>(Ingrese día, mes y año)<br>';
            if (dia.length != "") {
                inputDate.style.borderColor = 'palegreen';
                entrar = true;
            } else if (mes.length != "") {
                inputMonth.style.borderColor = 'palegreen';
                entrar = true;
            } else if (anio.length != "") {
                inputYear.style.borderColor = 'palegreen';
                entrar = true;
            } else {
                inputDate.style.borderColor = 'red';
                inputMonth.style.borderColor = 'red';
                inputYear.style.borderColor = 'red';
                entrar = true;
            }
            /*inputDate.style.borderColor = 'red';
            inputMonth.style.borderColor = 'red';
            inputYear.style.borderColor = 'red';
            entrar = true;*/
        } else if (dia.length != "" && mes.length != "" && anio.length != "") {
            //Si los días son menores a 1:
            if (dia < 1) {
                warnings += 'La fecha no es válida<br>(ERROR: Días inferiores a 1)<br>';
                inputDate.style.borderColor = 'red';
                //inputMonth.style.borderColor = 'palegreen';
                inputYear.style.borderColor = 'palegreen';
                entrar = true;
            } else if (dia > 31) {//Si los días son mayores a 31:
                warnings += 'La fecha no es válida<br>(ERROR: Ingrese 28, 29, 30 o 31 días)<br>';
                inputDate.style.borderColor = 'red';
                entrar = true;
            } else {
                //Se comprueba si el mes se corresponde con los días:
                if ((mes) <= 12 && (mes) >= 1) {
                    mes = mes - 1;
                    //Si el mes es "febrero":
                    if ((mes) == 1) {
                        //Si los días son mayores que 29 (sólo si el año es bisiesto):
                        if (this.calcularAnio(anio) == true) {
                            if (dia > 29) {
                                warnings += 'La fecha no es válida<br>(ERROR: Días superiores al año bisiesto)<br>';
                                inputDate.style.borderColor = 'red';
                                inputMonth.style.borderColor = 'palegreen';
                                inputYear.style.borderColor = 'palegreen';
                                entrar = true;

                            } else {
                                inputDate.style.borderColor = 'palegreen';
                                inputMonth.style.borderColor = 'palegreen';
                                inputYear.style.borderColor = 'palegreen';
                            }
                        } else {
                            //Si los días son mayores que 28 (sólo si el año no es bisiesto):
                            if (dia > 28) {
                                warnings += 'La fecha no es válida<br>(ERROR: Ingrese hasta 28 días)<br>';
                                inputDate.style.borderColor = 'red';
                                inputMonth.style.borderColor = 'palegreen';
                                inputYear.style.borderColor = 'palegreen';
                                entrar = true;
                            } else {
                                inputDate.style.borderColor = 'palegreen';
                                inputMonth.style.borderColor = 'palegreen';
                                inputYear.style.borderColor = 'palegreen';
                            }
                        }
                    } else {
                        //Si el mes no se corresponde con la cantidad de días (31 días):
                        if ((mes == 0 || mes == 2 || mes == 4 || mes == 6 || mes == 7 || mes == 9 || mes == 11) && (dia > 31 || dia < 1)) {
                            warnings += 'La fecha no es válida<br>(ERROR: Ingrese hasta 31 días)<br>';
                            inputDate.style.borderColor = 'red';
                            inputMonth.style.borderColor = 'palegreen';
                            inputYear.style.borderColor = 'palegreen';
                            entrar = true;
                        } else {
                            inputDate.style.borderColor = 'palegreen';
                            inputMonth.style.borderColor = 'palegreen';
                            inputYear.style.borderColor = 'palegreen';
                        }
                        //Si el mes no se corresponde con la cantidad de días (30 días):
                        if ((mes == 3 || mes == 5 || mes == 8 || mes == 10) && (dia > 30 || dia < 1)) {
                            warnings += 'La fecha no es válida<br>(ERROR: Ingrese hasta 30 días)<br>';
                            inputDate.style.borderColor = 'red';
                            inputMonth.style.borderColor = 'palegreen';
                            inputYear.style.borderColor = 'palegreen';
                            entrar = true;
                        } else {
                            inputDate.style.borderColor = 'palegreen';
                            inputMonth.style.borderColor = 'palegreen';
                            inputYear.style.borderColor = 'palegreen';
                        }
                        /*comprobar si la cantidad de dias esta bien:
                        let cantidadDias = parseInt(arrayMeses[mes-1]);
                        if (cantidadDias >= dia) {
                            //date.style.borderColor = 'palegreen';
                            inputDate.style.borderColor = 'palegreen';
                            inputMonth.style.borderColor = 'palegreen';
                            inputYear.style.borderColor = 'palegreen';
                        } else {
                            warnings += 'La fecha no es válida<br>(ERROR en días)<br>';
                            //date.style.borderColor = 'red';
                            inputDate.style.borderColor = 'red';
                            inputMonth.style.borderColor = 'palegreen';
                            inputYear.style.borderColor = 'palegreen';
                            entrar = true;
                        }*/
                    }
                } else {
                    warnings += 'La fecha no es válida<br>(ERROR en meses)<br>';
                    //date.style.borderColor = 'red';
                    inputDate.style.borderColor = 'red';
                    inputMonth.style.borderColor = 'red';
                    inputYear.style.borderColor = 'palegreen';
                    entrar = true;
                }
            }
        } else {
            //date.style.borderColor = 'palegreen';
            inputDate.style.borderColor = 'palegreen';
            inputMonth.style.borderColor = 'palegreen';
            inputYear.style.borderColor = 'palegreen';
        }

        /* Validación de la contraseña ---------------------------------------------------------------------------------------------*/
        if (!regexPassword.test(pass.value)) {
            //La contraseña debe ser sólo numérica:
            warnings += 'Contraseña inválida<br>(ingrese sólo números)<br>';
            pass.style.borderColor = 'red';
            //pass.focus();
            entrar = true;
        } else if (pass.value.length < 8) {
            //La contraseña debe tener al menos 8 caracteres:
            warnings += 'La contraseña no es válida.<br>';
            pass.style.borderColor = 'red';
            //pass.focus();
            entrar = true;
        } else {
            pass.style.borderColor = 'palegreen';
        }
    }

    /* Validación del formulario --------------------------------------------------------------------------------------------------*/
    if (entrar) {
        parrafo.innerHTML = warnings /* Msj de error */
        parrafo.stop(true).fadeIn('normal', function() {
            setTimeout(function() {
            parrafo.stop(true).fadeOut('normal');
            }, 3000);
        });
    } else {
        //Se vacían los campos:
        vaciarCampos();
        //Mensaje de registro:
        parrafo.innerHTML = "Registro exitoso"
        //Se quita el borde de color a los campos:
        nombre.style.borderColor = '';
        email.style.borderColor = '';
        inputDate.style.borderColor = '';
        inputMonth.style.borderColor = '';
        inputYear.style.borderColor = '';
        pass.style.borderColor = '';
    }
})

/* Retorna TRUE si el año ingresado es bisiesto */
function calcularAnio(anio) {
    let esBisiesto = false;
    if (anio % 100 == 0) {
        if (anio % 400 == 0) {
            esBisiesto = true;
        }
    } else {
        if ((anio % 4) == 0) {
            esBisiesto = true;
        }
    }
    return esBisiesto;
}
/* Establece los días de cada mes */
const arrayMeses = [[31], [28], [31], [30], [31], [30], [31], [31], [30], [31], [30], [31]];
/*  Vacía los campos ingresados */
function vaciarCampos() {
    nombre.value = "";
    email.value = "";
    inputDate.value = "";
    inputMonth.value = "";
    inputYear.value = "";
    pass.value = "";
}

/**
 * regexEmail: colección de expresiones regulares (regex) útiles para validar direcciónes de correo electrónico.
 * ^ indica que el patrón debe iniciar con los caracteres dentro de los corchetes
 * [A-Z] indica que los caracteres admitidos son letras del alfabeto
 * + indica que los caracteres dentro de los corchetes se pueden repetir
 * $ indica que el patrón finaliza con los caracteres que están dentro de los corchetes.
 * i indica que validaremos letras mayúsculas y minúsculas (case-insensitive)
 */