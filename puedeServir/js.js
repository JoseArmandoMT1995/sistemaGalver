function procesarfecha() {
    //fecha 1 - fecha de inicio
    var fechaInicial = new Date(2021, ((05) - 1), 03, 00, 00, 00);
    //fecha 2 - fecha de enmedio
    var fecha = document.getElementById("data").value;
    var hora = document.getElementById("hora").value;
    fecha = {
        "ano": fecha.substring(0, 4),
        "mes": ((fecha.substring(5, 7)) - 1),
        "dia": fecha.substring(8, 10),
        "hora": hora.substring(0, 2),
        "minuto": hora.substring(3, 5),
        "segundo": "00"
    };
    fecha = new Date(fecha.ano, fecha.mes, fecha.dia, fecha.hora, fecha.minuto, fecha.segundo);
    // acceso de fecha ingresada
    if (retornaFechaAcceso(fechaInicial, fecha) === true) {
        alert("si se puede ingresar la fecha");
    } else {
        alert(
            "no se puede ingresar fechas menores a la fecha de liberacion ," +
            " mayores a la fecha actual ó" +
            "ingrese los datos correctos."
        );
    }
}

function retornaFechaAcceso(fechaInicial, fechaEnmedio) {
    var permiso = false;
    var fechaActual = new Date();
    //console.log("<------------>");
    //console.log("fechaInicial");
    //console.log(fechaInicial);
    //console.log("fechaEnmedio");
    //console.log(fechaEnmedio); 
    //console.log("fechaActual");
    //console.log(fechaActual);  
    //console.log("<------------>");
    if (fechaEnmedio >= fechaInicial && fechaEnmedio <= fechaActual) {
        permiso = true;
    } else {
        permiso = false;
    }
    return permiso;
}