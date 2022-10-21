function validarRegistro(){
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var email = document.getElementById("email").value;
    var contra = document.getElementById("contra").value;

    //VALIDACION NOMBRE
    if(nombre.length == 0) {
        alert("La seccion del nombre no esta completa");
    }

    //VALIDACION CONTRASEÑA
    else if (contra.length == 0) {
        alert('La contraseña no es válida, por favor completar la caja de contraseña');
    }
    else if (contra.length < 6) {
        alert("La contraseña tiene que tener al menos 6 caracteres"); 
    }

    //VALIDACION APELLIDO
    else if (apellido.length == 0) {
        alert("El apellido no es válido, por favor volver a ingresar");
    }

    //VALIDACION MAIL
    else if(email.length == 0) {
        // Si el campo está vacío
        alert("Falta completar la caja del mail, por favor ingresar un mail.");
    } 
    else if(email.validity.typeMismatch) {
        // Si el campo no contiene una dirección de correo electrónico
        alert("La dirección de correo electrónico ingresada no es valida");
    }
}