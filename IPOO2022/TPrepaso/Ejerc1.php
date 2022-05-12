<?php
    /**
     * La empresa de transporte desea gestionar la información correspondiente a los Viajes que pueden ser: Terrestres o Aéreos.
     * 1) Guardar su importe e indicar si el viaje es de ida y vuelta.
     * 2) De los viajes aéreos se conoce el:
     * $viajesAereos: número del vuelo, la categoría del asiento (primera clase o no), nombre de la aerolínea, y la cantidad de escalas del vuelo (en caso de tenerlas).
     * 3) De los viajes terrestres se conoce la:
     * $viajesTerrestres: comodidad del asiento, si es semicama o cama.
     * 4) La empresa ahora necesita implementar la venta de un pasaje, para ello debe realizar:
     * a. función venderPasaje(pasajero) que registra la venta de un viaje al pasajero que es recibido por parámetro.
     * NOTAs:
     *      - La venta se realiza solo si hayPasajesDisponible.
     *      - Si el viaje es terrestre y el asiento es cama, se incrementa el importe un 25%.
     *      - Si el viaje es aéreo y el asiento es primera clase sin escalas, se incrementa un 40%.
     *      - Si el viaje además de ser un asiento de primera clase, el vuelo tiene escalas se incrementa el importe del viaje un 60%.
     *      - Tanto para viajes terrestres o aéreos, si el viaje es ida y vuelta, se incrementa el importe del viaje un 50%.
     *      + El método retorna el importe del pasaje si se pudo realizar la venta.
     * 5) Implemente la función hayPasajesDisponible() que:
     * a. retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario.
     */
?>