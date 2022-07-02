/*let id = (id) => document.getElementById(id);
let classes = (classes) => document.getElementsByClassName(classes);*/

/* Elementos con ID */
const nombre = document.getElementById("Nombre-de-Usuario")
const email = document.getElementById("correo-electrónico")
const date = document.getElementById("fecha-nac")
const pass = document.getElementById("contrasena")
const form = document.getElementById("formulario")
const parrafo = document.getElementById("warnings")

const calcularAnio = (e) => {
    let esBisiesto = null;
    if (e % 4 == 0) {
        if (e % 100 == 0) {
            if (e % 400 == 0) {
                //El año ingresado es bisiesto:
                esBisiesto = true;
            } else {
                //El año ingresado no es bisiesto:
                esBisiesto = false;
            }
        } else {
            //El año ingresado es bisiesto:
            esBisiesto = true;
        }
    } else {
       //El año ingresado no es bisiesto:
        esBisiesto = false;
    }
    return esBisiesto;
}

const arrayMeses = [[31], [28], [31], [30], [31], [30], [31], [31], [30], [31], [30], [31]];
    
form.addEventListener("submit", e => {
    e.preventDefault()
    let warnings = "";
    let entrar = false;
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    let regexName = new RegExp('^[A-Z]+$','i');
    let regexPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
    let regexPassword = /^[0-9]*$/;
    parrafo.innerHTML = "";

    /* Validación del usuario */
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

    /* Validación del email */
    if (!regexEmail.test(email.value)) {
        warnings += 'El email no es válido.<br>';
        email.style.borderColor = 'red';
        email.focus();
        entrar = true;
    } else {
        email.style.borderColor = 'palegreen';
    }

    /* Validación de la fecha de nacimiento */
    if (!regexPattern.test(date.value)) {
        //La fecha debe ser d/m/a:
        warnings += 'La fecha no es válida<br>(ingrese d/m/a)<br>';
        date.style.borderColor = 'red';
        //date.focus();
        entrar = true;
    } else {
        date.style.borderColor = 'palegreen';
    }

    /*let arrayFecha = date.split('/');
    let anio = parseInt(arrayFecha[2]);
    let mes = parseInt(arrayFecha[1]) - 1;
    let dia = parseInt(arrayFecha[0]);
    //Se comprueba si es año bisiesto:
    if (calcularAnio(anio)) {
        //Si es año bisiesto:
        arrayMeses[1] = 29;
    } else {
        arrayMeses[1] = 28;
    }

    //Se comprueba el mes:
    if (mes <= 11 && mes >= 0) {
        //Se comprueba la cantidad de días del mes:
        let cantidadDias = parseInt(arrayMeses[mes]);
        if (cantidadDias >= dia) {
            date.style.borderColor = 'palegreen';
        } else {
            warnings += 'La fecha no es válida<br>(ingrese datos correctos)<br>';
            date.style.borderColor = 'red';
            date.focus();
            entrar = true;
        }
    } else {
        warnings += 'La fecha no es válida <br>(ingrese datos correctos)<br>';
        date.style.borderColor = 'red';
        date.focus();
        entrar = true;
    }*/

    /* Validación de la contraseña */
    if (!regexPassword.test(pass.value)) {
        //La contraseña debe ser sólo numérica:
        warnings += 'Contraseña inválida<br>(ingrese sólo números)<br>';
        pass.style.borderColor = 'red';
        pass.focus();
        entrar = true;
    } else if (pass.value.length < 8) {
        //La contraseña debe tener al menos 8 caracteres:
        warnings += 'La contraseña no es válida.<br>';
        pass.style.borderColor = 'red';
        pass.focus();
        entrar = true;
    } else {
        pass.style.borderColor = 'palegreen';
    }
    
    /* Validación del formulario */
    if (entrar) {
        parrafo.innerHTML = warnings /* Msj de error */
    } else {
        parrafo.innerHTML = "Registro exitoso"
        nombre.style.borderColor = '';
        email.style.borderColor = '';
        date.style.borderColor = '';
        pass.style.borderColor = '';
    }
})
/**
 * regexEmail: colección de expresiones regulares (regex) útiles para validar direcciónes de correo electrónico.
 * ^ indica que el patrón debe iniciar con los caracteres dentro de los corchetes
 * [A-Z] indica que los caracteres admitidos son letras del alfabeto
 * + indica que los caracteres dentro de los corchetes se pueden repetir
 * $ indica que el patrón finaliza con los caracteres que están dentro de los corchetes.
 * i indica que validaremos letras mayúsculas y minúsculas (case-insensitive)
 */