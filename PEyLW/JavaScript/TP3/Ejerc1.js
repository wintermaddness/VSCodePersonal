function calcular_edad(fecha) {
    //Fecha actual:
    hoy = new Date()
    //alert(hoy)

    //Se descompone en un arreglo la fecha recibida:
    var array_fecha = fecha.split("/")
    //si el array no tiene tres partes, la fecha es incorrecta
    if (array_fecha.length != 3)
    return false

    //Se comprueba que los años, meses y días sean correctos:
    var ano
    ano = parseInt(array_fecha[2]);
    if (isNaN(ano))
    return false

    var mes
    mes = parseInt(array_fecha[1]);
    if (isNaN(mes))
    return false

    var dia
    dia = parseInt(array_fecha[0]);
    if (isNaN(dia))
    return false


    //Si el año de la fecha ingresada sólo tiene 2 cifras, se cambia a 4 cifras:
    if (ano <= 99)
    ano += 1900

    //Se restan los años de las dos fechas:
    edad = hoy.getYear() - ano - 1; //-1 debido a que no se sabe si ya ha cumplido años en ese año

    //Si al restar los meses da menor que 0, entonces no ha cumplido años. Si da mayor si ha cumplido años.
    if (hoy.getMonth() + 1 - mes < 0) //+ 1 porque los meses empiezan en 0
    return edad
    if (hoy.getMonth() + 1 - mes > 0)
    return edad + 1

    //Si al restar los dias da menor que 0, entonces no ha cumplido años. Si da mayor o igual si ha cumplido años.
    if (hoy.getUTCDate() - dia >= 0)
    return edad + 1

    return edad;
}