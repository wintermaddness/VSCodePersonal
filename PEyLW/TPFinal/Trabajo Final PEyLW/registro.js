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
    let warnings = ""
    let entrar = false
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
    parrafo.innerHTML = ""

    /* Validación del usuario */
    if (nombre.value.length < 6) {
        warnings += `El nombre no es válido <br>`
        entrar = true
    }
    /* Validación del email */
    if (!regexEmail.test(email.value)) {
        warnings += `El email no es válido <br>`
        entrar = true
    }
    /* Validación de la contraseña */
    if (pass.value.length < 8) {
        warnings += `La contraseña no es válida <br>`
        entrar = true
    }
    
    /* Validación del formulario */
    if (entrar) {
        parrafo.innerHTML = warnings /* Msj de error */
    } else {
        parrafo.innerHTML = "Registro exitoso"
    }
})
/**
 * regexEmail: colección de expresiones regulares (regex) útiles para validar direcciónes de correo electrónico.
 */