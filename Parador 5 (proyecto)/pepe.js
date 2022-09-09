function print (txt,end="<br>") {
    document.body.innerHTML+=txt+end;
}

function input(cad){
    var res= prompt(cad);
    return res;
}