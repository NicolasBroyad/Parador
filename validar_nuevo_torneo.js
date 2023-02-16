 //VALIDAR NUEVO TORNEO
 function validar(){
    var jugadores = document.getElementById("input_num_jugadores").value;
    var suplentes = document.getElementById("input_num_suplentes").value;
    var precio = document.getElementById("input_num_precio").value;
    var partidos = document.getElementById("input_partidos").value;
    var dia = document.getElementById("input_dia").value;
    var cancha = document.getElementById("input_numero_cancha").value;
    var num_jugadores_cancha = document.getElementById("input_numero_jugadores_cancha").value;
    var titulo = document.getElementById("input_titulo").value;

    //SECCION JUGADORES
    if (jugadores.length == 0){
        alert("El numero de jugadores esta vacio");
        return false
        alert("El numero de jugadores esta vacio")
    }
    else if (jugadores <= 0){
        alert("El numero de jugadores es incorrecto.");
        return false
        alert("El numero de jugadores es incorrecto.")
    }   
    //SECCION SUPLENTES
    if (suplentes.length == 0){
        alert("El numero de suplentes esta vacio");
        return false
        alert("El numero de suplentes esta vacio")
    }
    else if (suplentes <=0){
        alert("El numero de suplentes es incorrecto.");
        return false
        alert("El numero de suplentes es incorrecto.")
    }
    //SECCION PRECIO
    if (precio.length == 0){
        alert("El precio esta vacio.");
        return false
    }
    else if (precio <= 0) {
        alert("El precio es incorrecto.");
        return false
        alert("El precio es incorrecto.")
    }
    //SECCION PARTIDOS MAXIMO 
    if (partidos.lenght == 0) {
        alert("El numero de partidos esta vacio");
        return false
        alert("El numero de partidos esta vacio")
    }
    else if(partidos <= 0) {
        alert("El numero de partidos es incorrecto");
        return false
        alert("El numero de partidos es incorrecto")
    }
    //SECCION DIA
    if (dia.length == 0) {
        alert("El dia esta vacio.");
        return false
    }
    //SECCION CANCHAS
    if (cancha.length == 0){
        alert("El numero de cancha esta vacio.");
        return false
        alert("El numero de cancha esta vacio.")
    }
    else if (cancha <= 0){
        alert("El numero de cancha es incorrecto.");
        return false
        alert("El numero de cancha es incorrecto.")
    }
    //NUMERO DE JUGADORES CANCHA
    if (num_jugadores_cancha.length == 0){
        alert("La cantidad de jugadores de la cancha esta vacio.");
        return false
    }
    else if (num_jugadores_cancha <= 0){
        alert("La cantidad de jugadores de la cancha es incorrecto.");
        return false
    }
    //TITULO DEL TORNEO
    if (titulo.length == 0){
        alert("La seccion de titulo esta vacia.");
        return false
    }
}