//Funcion de validar informacion para los formularios

function validarFormulario() {
    //VALIDACION NOMBRE
    var mensaje = document.getElementById("error_nombre").value;
    var nombre = document.getElementById('nombre').value;
    if(nombre.length == 0) {
        alert("La seccion del nombre no esta completa");
    }

    //VALIDACION APELLIDO
    var apellido = document.getElementById('apellido').value;
    if (apellido.length == 0) {
        alert('El apellido no es válido');
    }

    //VALIDACION MAIL
    var email = document.getElementById("email").value;
    if(email.validity.valueMissing) {
        // Si el campo está vacío
        // muestra el mensaje de error siguiente.
        alert("Falta completar la caja del mail");

    } else if(email.validity.typeMismatch) {
        // Si el campo no contiene una dirección de correo electrónico
        // muestra el mensaje de error siguiente.
        alert("La dirección de correo electrónico ingresada no es valida");
    
    }

    //VALIDACION APELLIDO
    var contraseña = document.getElementById('contraseña').value;
    if (contraseña.length < 6) {
        alert('La contraseña no es válida, al menos 6 caractéres tiene que tener');
    }
}
