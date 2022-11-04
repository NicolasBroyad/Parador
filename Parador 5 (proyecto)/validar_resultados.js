function validar_resultados(id1, id2) {
    var res = document.getElementById(id1).value;
    var res2 = document.getElementById(id2).value;

    if (res < 0 || res2 < 0 || res.length == 0 || res2.length == 0)  {
        alert("Ingresar un resultado valido.");
        return false;
    }
}