let top = document.getElementById("top");
let left = document.getElementById("left"); 
let btnMover = document.getElementById("mover"); 
let salida = document.getElementById("capaRoja");

function validarRango(top, left) {
    //El valor de rangoUno debe ser entre 0 y 100 y el de rangoDos debe ser entre 0 y 400:
    if (top < 0 || top > 100 && left < 0 || left > 400) {
        //salida.value += '(1) Indices fuera de rango.\n';
        salida.innerHTML += "Los índices " + top.value + "y " + left.value + "se encuentran fuera de rango.<br>";
    }
}
validarRango();