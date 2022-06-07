/*var current = null;
document.querySelector('#email').addEventListener('focus', function(e) {
    if (current) current.pause();
    current = anime({
        targets: 'path',
        strokeDashoffset: {
        value: 0,
        duration: 700,
        easing: 'easeOutQuart'
        },
        strokeDasharray: {
        value: '240 1386',
        duration: 700,
        easing: 'easeOutQuart'
        }
    });
});
document.querySelector('#password').addEventListener('focus', function(e) {
    if (current) current.pause();
    current = anime({
        targets: 'path',
        strokeDashoffset: {
        value: -336,
        duration: 700,
        easing: 'easeOutQuart'
        },
        strokeDasharray: {
        value: '240 1386',
        duration: 700,
        easing: 'easeOutQuart'
        }
    });
});
document.querySelector('#submit').addEventListener('focus', function(e) {
    if (current) current.pause();
    current = anime({
        targets: 'path',
        strokeDashoffset: {
        value: -730,
        duration: 700,
        easing: 'easeOutQuart'
        },
        strokeDasharray: {
        value: '530 1386',
        duration: 700,
        easing: 'easeOutQuart'
        }
    });
});*/

/*function valida_envia(){
    //Valido el correo:
    if (document.form.email.value.length == 0){
           alert("Debe ingresar su correo.")
           document.form.email.focus()
           return 0;
    }

    if (document.querySelector('#email') === 0) {
        alert("Debe ingresar su correo.")
        document.querySelector('#email').focus()
        return 0;
    }
 
    //valido la edad. tiene que ser entero mayor que 18
    edad = document.fvalida.edad.value
    edad = validarEntero(edad)
    document.fvalida.edad.value=edad
    if (edad==""){
           alert("Tiene que introducir un número entero en su edad.")
           document.fvalida.edad.focus()
           return 0;
    }else{
           if (edad<18){
                  alert("Debe ser mayor de 18 años.")
                  document.fvalida.edad.focus()
                  return 0;
           }
    }
 
    //Valido la contraseña:
    if (document.form.password.length == 0){
           alert("Debe ingresar su contraseña.")
           document.form.password.focus()
           return 0;
    }
 
    //Mensaje cuando el formulario se envía:
    alert("Gracias por registrarse.");
    document.form.submit();
}*/

// Obtener referencias 
const $formulario = document.querySelector(".form"),
$correo = document.querySelector("#email"),
$contrasenia = document.querySelector("#password");
    $formulario.onsubmit = evento => {
        evento.preventDefault();
        const correo = $correo.value,
        contrasenia = $contrasenia.value;
        // Validar
        if (count(correo) === 0) {
            alert("Debe ingresar su correo.");
            return;
        }
        if (correo.endsWith("@hotmail.com")) {
            alert("No puede ser de hotmail.");
            return;
        }
        if (count(contrasenia) === 0) {
            alert("Debe ingresar su contraseña.");
            return;
        }
        $formulario.submit();
    };