function validarNombreEquipo() {
    var equipo = document.getElementById("equipo").value;

    if(equipo.length == 0) {
        alert("La seccion de nombre de equipo esta incompleta, por favor ingresar NOMBRE DE EQUIPO");
        return false;
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
        alert("Una de las secciones de nombre esta incompleta, por favor ingresar un NOMBRE");
        return false;
    }
    else if (nombre2.length == 0) {
        alert("Una de las secciones de nombre esta incompleta, por favor ingresar un NOMBRE");
        return false;
    }
    else if (nombre3.length == 0) {
        alert("Una de las secciones de nombre esta incompleta, por favor ingresar un NOMBRE");
        return false;
    }
    else if (nombre4.length == 0) {
        alert("Una de las secciones de nombre esta incompleta, por favor ingresar un NOMBRE");
        return false;
    }
    else if (nombre5.length == 0) {
        alert("Una de las secciones de nombre esta incompleta, por favor ingresar un NOMBRE");
        return false;
    }

    else if (nombre6.length == 0) {
        alert("Una de las secciones de nombre esta incompleta, por favor ingresar un NOMBRE");
        return false;
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
        alert("Una de las secciones de apellido esta incompleta, por favor ingresar un APELLIDO");
        return false;
    }
    else if (ap2.length == 0) {
        alert("Una de las secciones de apellido esta incompleta, por favor ingresar un APELLIDO");    
        return false;
    }
    else if (ap3.length == 0) {
        alert("Una de las secciones de apellido esta incompleta, por favor ingresar un APELLIDO");    
        return false;
    }
    else if (ap4.length == 0) {
        alert("Una de las secciones de apellido esta incompleta, por favor ingresar un APELLIDO");    
        return false;
    }
    else if (ap5.length == 0) {
        alert("Una de las secciones de apellido esta incompleta, por favor ingresar un APELLIDO");    
        return false; 
    }
    else if (ap6.length == 0) {
        alert("Una de las secciones de apellido esta incompleta, por favor ingresar un APELLIDO");    
        return false;
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
        return false;
    }
    else if (dni2.length == 0) {
        alert("Una de las secciones de dni esta incompleta, por favor ingresar un DNI");
        return false;
    }
    else if (dni3.length == 0) {
        alert("Una de las secciones de dni esta incompleta, por favor ingresar un DNI");
        return false;
    }
    else if (dni4.length == 0) {
        alert("Una de las secciones de dni esta incompleta, por favor ingresar un DNI");
        return false;
    }
    else if (dni5.length == 0) {
        alert("Una de las secciones de dni esta incompleta, por favor ingresar un DNI");
        return false;
    }
}