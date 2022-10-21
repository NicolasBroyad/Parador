function validarNombreEquipo() {
    var equipo = document.getElementById("equipo").value;

    if(equipo.length == 0) {
        alert("La seccion de nombre de equipo esta incompleta, por favor ingresar nombre de equipo");
    }
}

function validarNombres() {
    //NOMBRES
    var nombre1 = document.getElementById("nombre1").value;
    var nombre2 = document.getElementById("nombre2").value;
    var nombre3 = document.getElementById("nombre3").value; 
    var nombre4 = document.getElementById("nombre4").value;
    var nombre5 = document.getElementById("nombre5").value;
    var nombre6 = document.getElementById("nombre6").value;

    //VALIDAMOS QUE HAYAN CARACTERES EN LA SECCION DE NOMBRES
    if(nombre1.length == 0) {
        alert("Una de las secciones de nombre esta incompleta, por favor ingresar un nombre");
    }
    else if (nombre2.length == 0) {
        alert("Una de las secciones de nombre esta incompleta, por favor ingresar un nombre");
    }
    else if (nombre3.length == 0) {
        alert("Una de las secciones de nombre esta incompleta, por favor ingresar un nombre");
    }
    else if (nombre4.length == 0) {
        alert("Una de las secciones de nombre esta incompleta, por favor ingresar un nombre");
    }
    else if (nombre5.length == 0) {
        alert("Una de las secciones de nombre esta incompleta, por favor ingresar un nombre");
    }

    else if (nombre6.length == 0) {
        alert("Una de las secciones de nombre esta incompleta, por favor ingresar un nombre");
    }
}

function validarApellido(){
    var ap1 = document.getElementById("ap1").value;
    var ap2 = document.getElementById("ap2").value;
    var ap3 = document.getElementById("ap3").value;
    var ap4 = document.getElementById("ap4").value;
    var ap5 = document.getElementById("ap5").value;
    var ap6 = document.getElementById("ap6").value;

    if(ap1.length == 0) {
        alert("Una de las secciones de apellido esta incompleta, por favor ingresar un apellido");
    }
    else if (ap2.length == 0) {
        alert("Una de las secciones de apellido esta incompleta, por favor ingresar un apellido");    
    }
    else if (ap3.length == 0) {
        alert("Una de las secciones de apellido esta incompleta, por favor ingresar un apellido");    
    }
    else if (ap4.length == 0) {
        alert("Una de las secciones de apellido esta incompleta, por favor ingresar un apellido");    
    }
    else if (ap5.length == 0) {
        alert("Una de las secciones de apellido esta incompleta, por favor ingresar un apellido");    
    }
    else if (ap6.length == 0) {
        alert("Una de las secciones de apellido esta incompleta, por favor ingresar un apellido");    
    }

}

function validarDNI() {
    //DNI
    var dni1 = document.getElementById("dni1").value;
    var dni2 = document.getElementById("dni2").value;
    var dni3 = document.getElementById("dni3").value;
    var dni4 = document.getElementById("dni4").value;
    var dni5 = document.getElementById("dni5").value;
    var dni6 = document.getElementById("dni6").value;

    //VALIDAMOS QUE HAYAN CARACTERES EN LA SECCION DE DNI
    if(dni1.length == 0) {
        alert("Una de las secciones de dni esta incompleta, por favor ingresar un DNI");
    }
    else if (dni2.length == 0) {
        alert("Una de las secciones de dni esta incompleta, por favor ingresar un DNI");
    }
    else if (dni3.length == 0) {
        alert("Una de las secciones de dni esta incompleta, por favor ingresar un DNI");
    }
    else if (dni4.length == 0) {
        alert("Una de las secciones de dni esta incompleta, por favor ingresar un DNI");
    }
    else if (dni5.length == 0) {
        alert("Una de las secciones de dni esta incompleta, por favor ingresar un DNI");
    }
}

//VALIDAMOS EL INGRESO DE ESCUDO
function validarEscudo() {
    var fileInput = document.getElementById('escudo');
    var filePath = fileInput.value;
    var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;

    if(!allowedExtensions.exec(filePath)){
        alert('Por favor ingresar una foto para el escudo .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }
    else{
        //Previa de imagen
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}