var selectEconomico1;
function arranque_hojaDeViajeRegistro(){
    ajaxRetorno({"validacion":1,"operadorId":$("#operadorId").val()}); 
    ajaxRetorno({"validacion":2,"tractorId":$("#hojaDeViajeTractorEconomico").val()});  
    ajaxRetorno({"validacion":3,"remolqueID":$("#hojaDeViajeRemolqueEconomico1").val()});  
    ajaxRetorno({"validacion":4,"remolqueID":$("#hojaDeViajeRemolqueEconomico2").val()});  
}
arranque_hojaDeViajeRegistro();
$("#agregarTalonNuevo").click(function(){
    
    if (
        $("#hojaDeViajeOrigen").val() === "" || $("#hojaDeViajeOrigen").val() === "<empty string>" &&
        $("#hojaDeViajeCantidadCarga").val() === "0" || $("#hojaDeViajeCantidadCarga").val() === "<empty string>"  &&
        $("#hojaDeViajeCantidadCargaProporcion").val() === "0" || $("#hojaDeViajeCantidadCargaProporcion").val() === "<empty string>"  && 
        $("#hojaDeViajeTalon1").val() === "" || $("#hojaDeViajeTalon1").val() === "<empty string>"  && 
        $("#hojaDeViajeTalon2").val() === "" || $("#hojaDeViajeTalon2").val() === "<empty string>"
    )
    {
        alert("datos ausentes");
    } else 
    {
     $array = 
     {
        "empresaEmisoraId":$("#empresaEmisoraId").val(),
        "empresaReceptoraId":$("#empresaReceptoraId").val(),
        "operadorId":$("#operadorId").val(),
        "hojaDeViajeOrigen":$("#hojaDeViajeOrigen").val(),
        "hojaDeViajeCantidadCarga":$("#hojaDeViajeCantidadCarga").val(),
        "hojaDeViajeCantidadCargaProporcion":$("#hojaDeViajeCantidadCargaProporcion").val(),
        "hojaDeViajeComentario":$("#hojaDeViajeComentario").val(),
        "cargaId":$("#cargaId").val(),
        "cargaUnidadDeMedidaID":$("#cargaUnidadDeMedidaID").val(),
        "tractorId":$("#hojaDeViajeTractorEconomico").val(),
        "remolqueCargaId1":$("#remolqueCargaId1").val(),
        "remolqueCargaId2":$("#remolqueCargaId2").val(),
        "remolqueID1":$("#hojaDeViajeRemolqueEconomico1").val(),
        "remolqueID2":$("#hojaDeViajeRemolqueEconomico2").val(),
        "hojaDeViajeTalon1":$("#hojaDeViajeTalon1").val(),
        "hojaDeViajeTalon2":$("#hojaDeViajeTalon2").val(),
        "fechaActual":obtenerFechaActual()
     }   
     var hojaDeViaje= {
        "validacion":5,
        "hojaDeViaje":$array
    }
    ajaxRetorno(hojaDeViaje);
    }
})

$('#hojaDeViajeCantidadCargaProporcion').keypress(function() {
    console.log($('#hojaDeViajeCantidadCargaProporcion').val());
    $res=validateDecimal($('#hojaDeViajeCantidadCargaProporcion').val());
    if ($res=== true) {
        $('#resultadoCarga').val(Number($('#hojaDeViajeCantidadCarga').val())*Number($('#hojaDeViajeCantidadCargaProporcion').val()));
    }else{
        $('#hojaDeViajeCantidadCargaProporcion').val(0)
    }
});
$('#hojaDeViajeCantidadCarga').keypress(function() {
    console.log($('#hojaDeViajeCantidadCarga').val());
    $res=validateDecimal($('#hojaDeViajeCantidadCarga').val());
    if ($res=== true) {
        $('#resultadoCarga').val(Number($('#hojaDeViajeCantidadCarga').val())*Number($('#hojaDeViajeCantidadCargaProporcion').val()));
    }else{
        $('#hojaDeViajeCantidadCarga').val(0);
    }
});

$("#operadorId").on('change', function () {
    var operador= {
        "validacion":1,
        "operadorId":$("#operadorId").val()
    }
    ajaxRetorno(operador);    
});
$("#hojaDeViajeTractorEconomico").on('change', function () {
    var tractor= {
        "validacion":2,
        "tractorId":$("#hojaDeViajeTractorEconomico").val()
    }
    ajaxRetorno(tractor);    
});
$("#hojaDeViajeRemolqueEconomico1").on('change', function () {    
    var remolque= {
        "validacion":3,
        "remolqueID":$("#hojaDeViajeRemolqueEconomico1").val()
    }
    ajaxRetorno(remolque);    
});
$("#hojaDeViajeRemolqueEconomico2").on('change', function () {    
    var remolque= {
        "validacion":4,
        "remolqueID":$("#hojaDeViajeRemolqueEconomico2").val()
    }
    ajaxRetorno(remolque);    
});
function placaTractor(tractor,placa){
    //console.log(placa);
    switch (tractor) {
        case 1:
            
            break;
        case 2:
             break;
    }
}
function selectEconomicoM1(id){
    //console.log(id);
    if (selectEconomico1.length>0) {
        for (let i = 0; i < selectEconomico1.length; i++) {
            if (selectEconomico1[i].remolqueID ==id ||selectEconomico1[i].remolqueID == String(id) ) {
                console.log("si se pudo");
            }
        }
    }   
}
//hojaDeViajeRemolqueEconomico1


function ajaxRetorno(variables){
    $.ajax({
        type: "POST",
        url: "../controlador/modulos/hojaDeViaje/hojaDeViajeRegistroValidacion.php",
        data: variables, //capturo array     
        success: function (data) {
            console.log(JSON.parse(data));
            selectValidacion(JSON.parse(data));            
        }
    });
}
function selectValidacion(data){
    switch (data[0].validacion) 
    {
        case '1':
            $("#operadorLisencia").val(data[1].operadorLisencia);        
            break;
        case '2':
            $("#tractorPlaca").val(data[1].tractorPlaca);  
        case '3':
            $("#remolquePlaca1").val(data[1].remolquePlaca);  
            break;
        case '4':
            $("#remolquePlaca2").val(data[1].remolquePlaca);  
            break;
        case '5':
                if (data[1].insercion===1) {
                    alert("insercion exitosa");
                } else {
                    alert("insercion fallida");
                }
                //$("#remolquePlaca2").val(data[1].insercion);  
            break;
        default:
            break;
    }
}

function selectEconomicoRemolque(data)
{   
        //$("#hojaDeViajeRemolqueEconomico1").html(select);
}

function validateDecimal(valor) {
    var RE = /^\d*\.?\d*$/;
    if (RE.test(valor)) {
        return true;
    } else {
        return false;
    }
}
function obtenerFechaActual() {
    var f = new Date();
    //obtener fecha datatime
    var year = f.getFullYear();
    var month=      dosDigitosFecha(Number(f.getMonth())+1);
    var day=        dosDigitosFecha(Number(f.getDate()));
    var hours=      dosDigitosFecha(Number(f.getHours()));
    var minutes=    dosDigitosFecha(Number(f.getMinutes()));
    return year + ":" + month + ":" + day + " " + hours + ":" + minutes + ":00.000000";
}
function dosDigitosFecha(dato){
    if (dato < 10) {
        dato = "0" + dato;
    }
    return dato;
}