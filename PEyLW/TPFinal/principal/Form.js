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

/*var date_regex = /^(0[1-9]|1[0-2])\/\(0[1-9]|1d|2d|3[01])\/\(19|20)d{2}$/;
if (!(date_regex.test(date.value))) {
    return false;
}
function isValidDate(d){
    return !isNaN((new Date(d)).getTime());
}

btnCheck.addEventListener('click', (event) => {
                let month = inputMonth.value;
                let year = inputYear.value;
                let date = inputDate.value;
                // Retorna TRUE si la fecha y el formato de la fecha coincide exactamente con el análisis estricto de JS (dd/mm/aaaa):
                warnings.innerText = moment(`${month}/${date}/${year}`, 'MM/DD/YYYY', true).isValid();
            });
*/

function validarFecha() {
    /* Función para calcular la validez de una fecha */
    this.chkdate = function (date) {
        var strDatestyle = "eu";
        var strDate;
        var strDateArray;
        var strDay;
        var strMonth;
        var strYear;
        var intday;
        var intMonth;
        var intYear;
        var booFound = false;
        var datefield = date;
        var strSeparatorArray = new Array("-"," ","/",".");
        var intElementNr;
        var err = 0;
        var strMonthArray = new Array(12);

        strMonthArray[0] = "/01/";
        strMonthArray[1] = "/2/";
        strMonthArray[2] = "/3/";
        strMonthArray[3] = "/4/";
        strMonthArray[4] = "/5/";
        strMonthArray[5] = "/6/";
        strMonthArray[6] = "/7/";
        strMonthArray[7] = "/8/";
        strMonthArray[8] = "/9/";
        strMonthArray[9] = "/10/";
        strMonthArray[10] = "/11/";
        strMonthArray[11] = "/12/";

        //Si el campo de la fecha no está vacío:
        if (datefield != null) {
            strDate = datefield.value;
        }
        /*if (sValue != null) {
            strDate = sValue;
        }*/
        //Si el campo de la fecha tiene menos de 6 caracteres:
        if (strDate.length < 6) {
            return false;
        }

        //Si el nro. de elementos int es menor al nro. de separadores string:
        for (intElementNr = 0; intElementNr < strSeparatorArray.length; intElementNr++) {
            if (strDate.indexOf(strSeparatorArray[intElementNr]) != -1) { //array.INDEXOF
                strDateArray = strDate.split(strSeparatorArray[intElementNr]); //array.SPLIT
                //Si no hay tres conjuntos de números (dd/mm/aa):
                if (strDateArray.length != 3) {
                    err = 1;
                    return false;
                } else {
                    //Se obtiene el día, mes y año del arreglo de fecha:
                    strDay = strDateArray[0];
                    strMonth = strDateArray[1];
                    strYear = strDateArray[2];
                }
                booFound = true;
            }
        }

        //Si el nro. de int es mayor a 5, se separa cada grupo para formar la fecha:
        if (booFound == false) {
            if (strDate.length > 5) {
                strDay = strDate.substr(0, 2);
                strMonth = strDate.substr(2, 2);
                strYear = strDate.substr(4);
            }
        }
        if (strYear.length == 2) {
            strYear = '20' + strYear;
        }

        // US style
        if (strDatestyle == "US") {
            strTemp = strDay;
            strDay = strMonth;
            strMonth = strTemp;
        }

        //Día numérico
        intday = parseInt(strDay, 10);
        if (isNaN(intday)) {
            err = 2;
            return false;
        }

        //Mes numérico
        intMonth = parseInt(strMonth, 10);
        if (isNaN(intMonth)) {
            for (i=0; i<12; i++) {
                if (strMonth.toUpperCase() == strMonthArray[i].toUpperCase()) {
                    intMonth = i+1;
                    strMonth = strMonthArray[i];
                    i = 12;
                }
            }
            if (isNaN(intMonth)) {
                err = 3;
                return false;
            }
        }

        //Año numérico
        intYear = parseInt(strYear, 10);
        if (isNaN(intYear)) {
            err = 4;
            return false;
        }

        //Si el mes es mayor que 12 y menor que 1:
        if (intMonth > 12 || intMonth < 1) {
            err = 5;
            return false;
        }

        //Si el mes no se corresponde con la cantidad de días (31 días):
        if ((intMonth == 1 || intMonth == 3 || intMonth == 5 || intMonth == 7 || intMonth == 8 || intMonth == 10 || intMonth == 12) && (intday > 31 || intday < 1)) {
            err = 6;
            return false;
        }
        //Si el mes no se corresponde con la cantidad de días (30 días):
        if ((intMonth == 4 || intMonth == 6 || intMonth == 9 || intMonth == 11) && (intday > 30 || intday < 1)) {
            err = 7;
            return false;
        }
        //Si el mes es "febrero":
        if (intMonth == 2) {
            //Si los días son menores a 1:
            if (intday < 1) {
                err = 8;
                return false;
            }
            //Si los días son mayores que 29 (sólo si el año es bisiesto):
            if (this.LeapYear(intYear) == true) {
                if (intday > 29) {
                    err = 9;
                    return false;
                }
            } else {
                //Si los días son mayores que 28 (sólo si el año no es bisiesto):
                if (intday > 28) {
                    err = 10;
                    return false;
                }
            }
        }
        return true;
    }

    /* Año bisiesto */
    this.LeapYear = function (intYear) {
        if (intYear % 100 == 0) {
            if (intYear % 400 == 0) { return true; }
        } else {
            if ((intYear % 4) == 0) { return true; }
        }
        return false;
    }

    /* Formato de hora */
    this.chkHora = function (lahora) {
        var arrHora = (lahora.value).split(":");
        if (arrHora.length!=2) {
            return false;
        }
        if (parseInt(arrHora[0])<0 || parseInt(arrHora[0])>23) {
            return false;
        }
        if (parseInt(arrHora[1])<0 || parseInt(arrHora[1])>59) {
            return false;
        }
        return true;
    }
}