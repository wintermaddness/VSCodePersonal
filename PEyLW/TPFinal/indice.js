/*let id = (id) => document.getElementById(id);
let classes = (classes) => document.getElementsByClassName(classes);*/

/* Elementos con ID */
let nombreDeUsuario = id("Nombre-de-Usuario"),
    email = id("correo-electrónico"),
    contrasena = id("contrasena"),
    formulario = id("formulario"),
/* Elementos con CLASS */
    msjError = classes("error"),
    iconoExito = classes("success-icon"),
    failureIcon = classes("failure-icon");
/* Función para validar los campos del formulario */
let motor = (id, serial, mensaje) => {
    if (id.value.trim() === "") {
        msjError[serial].innerHTML = mensaje;
        id.style.border = "2px solid red";
        
        // iconos
        failureIcon[serial].style.opacity = "1";
        successIcon[serial].style.opacity = "0";
    } else {
        msjError[serial].innerHTML = "";
        id.style.border = "2px solid green";
        
        // iconos
        failureIcon[serial].style.opacity = "0";
        successIcon[serial].style.opacity = "1";
    }
}
/* EventListener al botón de envío */
    form.addEventListener("enviar", (e) => {
        e.preventDefault();
        /* Msj de error para cada campo del formulario */
        motor(nombreDeUsuario, 0, "El nombre de usuario no puede estar en blanco");
        motor(correoElectronico, 1, "El correo electrónico no puede estar en blanco");
        motor(contrasena, 2, "La contraseña no puede estar en blanco");
    });
/**
 * ID: Apunta a cada identificador de los elementos.
 * SERIAL: Apunta a todas las clases[error class, success and failure icons].
 * MENSAJE: Imprime el mensaje dentro de la clase.error.
 * msjError[serial].innerHTML = mensaje -> Msj de error si el usuario envía un formulario vacío.
 * id.value.trim(): Remueve todos los espacios extra del valor que el usuario ingresa.
 */