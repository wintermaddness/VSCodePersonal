//Selectores
const formulario = document.querySelector('.formulario');
const fechaDate = document.querySelector('.fechaInput');

//const errorFI = document.querySelector('.errorFI');

const edad = document.querySelector('.edadInput');
const importe = document.querySelector('.importeInput');
const email = document.querySelector('.emailInput');
const nombre = document.querySelector('.nombreInput');
const apellido = document.querySelector('.apellidoInput');
const anexo = document.querySelector('.anexo');
const submit = document.querySelector('.submit');

//eventListeners
//submit.addEventListener('click', cargarFormulario);
//Comprobacion de fecha
fechaDate.addEventListener('change', (e) => {
    let fechaStr = e.target.value;
    let arrayFecha = fechaStr.split('/');
    console.table(arrayFecha);
    let anio = parseInt(arrayFecha[2]);
    let dia = parseInt(arrayFecha[0]);
    let mes = parseInt(arrayFecha[1]) - 1;
    //Comprobar si es año bisiesto 
    if (calcularAnio(anio)) {
        //Es bisiesto
        arrayMeses[1] = 29;
        console.log('Es bisiesto');
    } else {
        arrayMeses[1] = 28;
    }

    //Comprobar si el mes esta bien
    if (mes <= 11 && mes >= 0) {
        //comprobar si la cantidad de dias esta bien
        let cantidadDias = parseInt(arrayMeses[mes]);
        if (cantidadDias >= dia) {
            //gut
            /*errorFI.classList.remove('error');
            errorFI.classList.add('correcto');
            errorFI.textContent = 'O';*/
            fechaDate.classList.remove('error');
            fechaDate.classList.add('correcto');
        } else {
            /*errorFI.classList.remove('correcto');
            errorFI.classList.add('error');
            errorFI.textContent = 'X';*/
            fechaDate.classList.remove('correcto');
            fechaDate.classList.add('error');
        }
    } else {
        /*errorFI.classList.remove('correcto');
        errorFI.classList.add('error');
        errorFI.textContent = 'X';*/
        fechaDate.classList.remove('correcto');
        fechaDate.classList.add('error');
    }


})

//Comprobacion de edad 
//Faltaria comprobar si esta bien segun la fecha de nacimiento
edad.addEventListener('change', (e) => {
    let edadValor = e.target.value;
    if ((edadValor % 1) != 0 || edadValor <= 0) {
        //bad
        edad.classList.remove('correcto');
        edad.classList.add('error');
    } else {
        //gut
        edad.classList.remove('error');
        edad.classList.add('correcto');
    }
})

//Comprobacion del importe
importe.addEventListener('change', (e) => {
    let importeValor = e.target.value;
    if (importeValor <= 0) {
        //bad
        importe.classList.remove('correcto');
        importe.classList.add('error');
    } else {
        //gut
        importe.classList.remove('error');
        importe.classList.add('correcto');
    }
})

//Comprobacion de email 
email.addEventListener('change', (e) => {
    emailValor = e.target.value;
    if (emailValor.includes('@')) {
        //gut
        if (emailValor.includes('.com')) {
            //gut
            email.classList.remove('error');
            email.classList.add('correcto');
        } else {
            //bad 
            email.classList.remove('correcto');
            email.classList.add('error');
        }
    } else {
        //bad
        email.classList.remove('correcto');
        email.classList.add('error');
    }
})

//Comprobacion nombre 
nombre.addEventListener('change', (e) => {
    let nombreValor = e.target.value;

})

function validarFecha() {
    /* Función para calcular la validez de una fecha */
    this.chkdate = function (objName,sValue) {
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
        var datefield = objName;
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

        if (datefield != null) {
            strDate = datefield.value;
        }
        if (sValue != null) {
            strDate = sValue;
        }    
        if (strDate.length < 6) {
            return false;
        }

        for (intElementNr = 0; intElementNr < strSeparatorArray.length; intElementNr++) {
            if (strDate.indexOf(strSeparatorArray[intElementNr]) != -1) {
                strDateArray = strDate.split(strSeparatorArray[intElementNr]);
                if (strDateArray.length != 3) {
                    err = 1;
                    return false;
                } else {
                    strDay = strDateArray[0];
                    strMonth = strDateArray[1];
                    strYear = strDateArray[2];
                }
                booFound = true;
            }
        }

        if (booFound == false) {
            if (strDate.length>5) {
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

        intday = parseInt(strDay, 10);
        if (isNaN(intday)) {
            err = 2;
            return false;
        }

        intMonth = parseInt(strMonth, 10);
        if (isNaN(intMonth)) {
            for (i = 0;i<12;i++) {
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

        intYear = parseInt(strYear, 10);
        if (isNaN(intYear)) {
            err = 4;
            return false;
        }

        if (intMonth>12 || intMonth<1) {
            err = 5;
            return false;
        }

        if ((intMonth == 1 || intMonth == 3 || intMonth == 5 || intMonth == 7 || intMonth == 8 || intMonth == 10 || intMonth == 12) && (intday > 31 || intday < 1)) {
            err = 6;
            return false;
        }

        if ((intMonth == 4 || intMonth == 6 || intMonth == 9 || intMonth == 11) && (intday > 30 || intday < 1)) {
            err = 7;
            return false;
        }

        if (intMonth == 2) {
            if (intday < 1) {
                err = 8;
                return false;
            }
            if (this.LeapYear(intYear) == true) {
                if (intday > 29) {
                    err = 9;
                    return false;
                }
            } else {
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