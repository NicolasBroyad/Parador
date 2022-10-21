function validarInicio(){
    var nombre = document.getElementById("nombre").value;
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
}