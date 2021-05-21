arranque_hojaDeViajeRegistro();
$('#talonesCargaProporcion').on('change', function () {
    $res=validateDecimal($('#talonesCargaProporcion').val());
    if ($res=== true) {
        $('#resultadoCarga').val(Number($('#talonesCargaCantidad').val())*Number($('#talonesCargaProporcion').val()));
    }else{
        $('#talonesCargaProporcion').val(0)
    }
});
$('#talonesCargaCantidad').on('change', function () {
    $res=validateDecimal($('#talonesCargaCantidad').val());
    if ($res=== true) {
        $('#resultadoCarga').val(Number($('#talonesCargaCantidad').val())*Number($('#talonesCargaProporcion').val()));
    }else{
        $('#talonesCargaCantidad').val(0);
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
    var tractor= {
        "validacion":3,
        "remolqueCargaId":$("#hojaDeViajeRemolqueEconomico1").val()
    }
    ajaxRetorno(tractor);    
});
function arranque_hojaDeViajeRegistro(){
    var operador= {"validacion":1,"operadorId":$("#operadorId").val()}
    var tractor= {"validacion":2,"tractorId":$("#hojaDeViajeTractorEconomico").val()}
    ajaxRetorno(operador); 
    ajaxRetorno(tractor);  
}
function ajaxRetorno(variables){
    $.ajax({
        type: "POST",
        url: "../controlador/modulos/hojaDeViaje/hojaDeViajeRegistroValidacion.php",
        data: variables, //capturo array     
        success: function (data) {
            //console.log(JSON.parse(data));
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
            //$("#tractorPlaca").val(data[1].tractorPlaca);     
            console.log(data);   
            break;
        default:
            break;
    }
}

function validateDecimal(valor) {
    var RE = /^\d*\.?\d*$/;
    if (RE.test(valor)) {
        return true;
    } else {
        return false;
    }
}