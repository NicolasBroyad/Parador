//FUNCION PARA LA CUAL SE VALIDARA LA CONTRA

function validarContra() {
    var contra_1 = document.getElementById("contra_1").value;
    var contra_2 = document.getElementById("contra_2").value;
    var email = document.getElementById("email").value;
    var espacios = false;
    var cont = 0;

     //ESTA PARTE DEL CODIGO ES PARA OBLIGAR AL USUARIO A COMPLETAR LA CAJA DE EMAIL
    if(email.length == 0) {
        // Si el campo está vacío
        alert("Falta completar la caja del mail, por favor ingresar un mail.");
        return false;
    }

    //ESTA PARTE DEL CODIGO ES PARA OBLIGAR AL USUARIO A COMPLETAR LA CAJA DE CONTRAS
    if (contra_1.length == 0 || contra_2.length == 0) {
        alert("Los campos de la contraseña no pueden quedar vacios.");
        return false;
    }

    //ESTA PARTE DEL CODIGO ES PARA QUE NO NOS HAYAN DEJADO ESPACIOS EN BLANCO
    while (!espacios && (cont < contra_1.length)) {
        if (contra_1.charAt(cont) == " "){
            espacios = true;
        }
        cont+=1;
    }
   
    if (espacios) {
        alert ("La contraseña no puede contener espacios en blanco");
        return false;
    }

    //ESTA PARTE DEL CODIGO ES PARA QUE LAS DOS CONTRAS COINCIDAN
    if (contra_1 != contra_2) {
        alert("Las contraseña deben de coincidir, por favor volver a ingresar.");
        return false;
    } 
    else {
        return true; 
    }
}