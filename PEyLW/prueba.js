let top = document.getElementById("top");
let left = document.getElementById("left"); 
let btnMover = document.getElementById("mover"); 
let salida = document.getElementById("capaRoja");

function validarRango() {
    var rangoUno = document.getElementById("top");
    var rangoDos = document.getElementById("left");
    let salida = document.getElementById("capaRoja");
    var errors = "";
    //El valor de rangoUno debe ser entre 0 y 100 y el de rangoDos debe ser entre 0 y 400:
    if (rangoUno < 0 || rangoUno > 100 && rangoDos < 0 || rangoDos > 400) {
        //salida.value += '(1) Indices fuera de rango.\n';
        salida.innerHTML += "Los índices " + rangoUno + "y " + rangoDos + "se encuentran fuera de rango.<br>";
    } else {
        var valorTop = rangoDos;
        var valorLeft = rangoUno;
        salida.innerHTML += "Posición del div - Top: " + valorTop + " / Left: " + valorLeft + "<br>";
    }

    if (!esCuit) {
        //alert( "CUIT Invalido" );
        salida.value += "CUIT invalido.\n";
        document.form.cuit.focus();
        errors = 'Cuit Invalido ';
    } else {
        //alert( "CUIT validado" );
        salida.value += "CUIT validado.\n";
        document.form.cuit.focus();
    }
    document.MM_returnValue1 = (errors == '');
}

function valorSeleccionado(Valor) {
    var rta;
    if (Valor < 0) {
        rta = -1;
    } else if (Valor >= 0 && Valor < 10) {
        rta = 0;
    } else if (Valor >= 10 && Valor < 50) {
        rta = 1;
    } else if (Valor >= 50 && Valor < 100) {
        rta = 2;
    } else if (Valor >= 100) {
        rta = 3;
    }
    return rta;
}

function mayor(x, y) {
    salida = document.getElementById("capaRoja");
    if (x > y) {
        salida.innerHTML += x.value + " es mayor que " + y.value + "<br>";
    } else if (x < y) {
        salida.innerHTML += y.value + " es mayor que " + x.value + "<br>";
    }
}

function nroMayor() {
    let botonEvaluador = document.getElementById('mayor');
    let num1 = document.getElementById('num1');
    let num2 = document.getElementById('num2');
    salida = document.getElementById("capaRoja");
  
    botonEvaluador.addEventListener('click', (event) => {
        event.preventDefault();
        if (parseInt(num1.value) > parseInt(num2.value) && parseInt(num1.value) > parseInt(num2.value)) {
            console.log('El mayor es :'+num1.value);
        } else if(parseInt(num2.value) > parseInt(num1.value) && parseInt(num2.value) > parseInt(num3.value)) {
            console.log('El mayor es :'+num2.value);
        }
    });
}