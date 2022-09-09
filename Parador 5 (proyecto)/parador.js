function print (txt,end="<br>") {
    document.body.innerHTML+=txt+end;
}

function input(cad){
    var res= prompt(cad);
    return res;
}

//hijo de re mil puta

function operNum(a,b){
    suma= a+b
    resta= a-b
    division= a/b 
    producto= a*b 
    potencia= a**b
    resto= a%b
    print("suma: "+ suma)
    print("resta: "+ resta)
}