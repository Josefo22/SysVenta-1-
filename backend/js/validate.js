  function validacion() {
    valor = document.getElementById("contra").value;
    if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
    return false;
    }


    valor1 = document.getElementById("usuario").value;
    if( valor1 == null || valor1.length == 0 || /^\s+$/.test(valor1) ) {
    return false;
    }

}