/*let id = (id) => document.getElementById(id);
let classes = (classes) => document.getElementsByClassName(classes);*/

/* Elementos con ID */
const nombre = document.getElementById("Nombre-de-Usuario")
const email = document.getElementById("correo-electrónico")
const pass = document.getElementById("contrasena")
const form = document.getElementById("formulario")
const parrafo = document.getElementById("warnings")
    
form.addEventListener("submit", e => {
    e.preventDefault()
    let warnings = "";
    let entrar = false;
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    let regexName = new RegExp('^[A-Z]+$','i');
    let regexPassword = /^[0-9]*$/;
    parrafo.innerHTML = "";

    /* Validación del usuario */
    if (nombre.value.length < 6) {
        //El nombre debe tener al menos 6 caracteres: 
        warnings += 'El nombre no es válido.<br>';
        nombre.style.borderColor = 'red';
        entrar = true;
    } else if (!regexName.test(nombre.value)) {
        //El nombre debe tener sólo letras:
        warnings += 'Nombre inválido <br>(ingrese sólo letras)<br>';
        nombre.style.borderColor = 'red';
        entrar = true;
    } else {
        nombre.style.borderColor = 'palegreen';
    }

    /* Validación del email */
    if (!regexEmail.test(email.value)) {
        warnings += 'El email no es válido.<br>';
        email.style.borderColor = 'red';
        entrar = true;
    } else {
        email.style.borderColor = 'palegreen';
    }

    /* Validación de la contraseña */
    if (!regexPassword.test(pass.value)) {
        //La contraseña debe ser sólo numérica:
        warnings += 'Contraseña inválida<br>(ingrese sólo números)<br>';
        pass.style.borderColor = 'red';
        entrar = true;
    } else if (pass.value.length < 8) {
        //La contraseña debe tener al menos 8 caracteres:
        warnings += 'La contraseña no es válida.<br>';
        pass.style.borderColor = 'red';
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