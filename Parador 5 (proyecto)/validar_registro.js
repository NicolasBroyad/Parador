function validarRegistro(){
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var email = document.getElementById("email").value;
    var contra = document.getElementById("contra").value;

    //VALIDACION NOMBRE
    if(nombre.length == 0) {
        alert("La seccion del nombre no esta completa");
        return false;
    }

    //VALIDACION CONTRASEÑA
    else if (contra.length == 0) {
        alert('La contraseña no es válida, por favor completar la caja de contraseña');
        return false;
    }
    else if (contra.length < 6) {
        alert("La contraseña tiene que tener al menos 6 caracteres"); 
        return false;
    }

    //VALIDACION APELLIDO
    else if (apellido.length == 0) {
        alert("El apellido no es válido, por favor volver a ingresar");
        return false;
    }

    //VALIDACION MAIL
    else if(email.length == 0) {
        // Si el campo está vacío
        alert("Falta completar la caja del mail, por favor ingresar un mail.");
        return false;
    } 
    else if(email.validity.typeMismatch) {
        // Si el campo no contiene una dirección de correo electrónico
        alert("La dirección de correo electrónico ingresada no es valida");
        return false;
    }
}