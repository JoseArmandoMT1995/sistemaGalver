var selectEconomico1;
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
$("#remolqueCargaId").on('change', function () {
    var tractor= {
        "validacion":3,
        "remolqueCargaId":$("#remolqueCargaId").val()
    }
    ajaxRetorno(tractor);    
});
function selectEconomicoM1(id){
    console.log(id);
    if (selectEconomico1.length>0) {
        for (let i = 0; i < selectEconomico1.length; i++) {
            if (selectEconomico1[i].remolqueID ==id ||selectEconomico1[i].remolqueID == String(id) ) {
                console.log("si se pudo");
            }
        }
    }
}
//hojaDeViajeRemolqueEconomico1

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
            selectEconomicoRemolque(data[1]["economicoRemolque"]);   
            break;
        default:
            break;
    }
}

function selectEconomicoRemolque(data)
{   
        selectEconomico1=data;
        var select ='';
        //var select ='<label for="inputPassword4">Econoico de remolque 1</label>';

        //select += '<select id="hojaDeViajeRemolqueEconomico1" class="hojaDeViajeRemolqueEconomico1 form-control" name="hojaDeViajeRemolqueEconomico1">';
        //select += '<optgroup label="Escriba y seleccione" >';
        if(data) {
            for (let i = 0; i < data.length; i++) {
                select += '<option value="'+data[i][0]["remolqueID"]+'" onclick="selectEconomicoM1('+data[i][0]["remolqueID"]+')">'+data[i][0]["remolqueEconomico"]+'</option>';
            }
        } 
        //select += '</optgroup>';
        //select += '</select>';
        console.log(select);
        $("#hojaDeViajeRemolqueEconomico1").html(select);
        //pruebaID
}
function validateDecimal(valor) {
    var RE = /^\d*\.?\d*$/;
    if (RE.test(valor)) {
        return true;
    } else {
        return false;
    }
}