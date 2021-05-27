var masEmpresas=false;
var masRemolques=false;
arranque_hojaDeViajeRegistro();

$("#masEmpresas").click(function(){
    
    $('.masEmpresas').show();
    $('#masEmpresas').hide();
    $('#labelMasMenos').hide();
    $('#labelMenosMenos').show();
    masEmpresas=true;
    
});
$("#menosEmpresas").click(function(){
    $('.masEmpresas').hide();
    $('#masEmpresas').show();
    $('#labelMasMenos').show();
    //empresas 2 receteo
    $("#empresaEmisoraId2").val("0");
    $("#empresaReceptoraId2").val("0");
    $("#hojaDeViajeOrigen2").val("");    
    masEmpresas=false;
    //empresaReceptoraId2
});
$("#masRemolque").click(function(){
    $('.masRemolque').show();
    $('.labelMasRemolque').hide();
    $('#masRemolque').hide();
    masRemolques=true;
});
$("#menosRemolque").click(function(){
    $('.labelMasRemolque').show();
    $('#masRemolque').show();
    $('.masRemolque').hide();
    //remolque 2 recete
    $("#remolqueCargaId2").val("0");
    $("#hojaDeViajeRemolqueEconomico2").val("0");
    $("#remolquePlaca2").val("");
    $("#hojaDeViajeTalon2A").val("");
    $("#hojaDeViajeTalon2B").val("");

    $("#cargaId2").val("0");
    $("#hojaDeViajeCargaCantidad2").val(0);
    $("#cargaUnidadDeMedidaID2").val("0");
    $("#hojaDeViajeUnidadDeMedidaProporcional2").val(0);
    $("#resultado2").val(0);
    masRemolques=true;
});
//
 	
$( "#hojaDeViajeCargaCantidad2" ).keydown(function() {
    //resultado2
    
    $("#resultado2").val(
        (parseFloat($("#hojaDeViajeCargaCantidad2").val())*parseFloat($("#hojaDeViajeUnidadDeMedidaProporcional2").val())).toFixed(2)
    );
});
$( "#hojaDeViajeUnidadDeMedidaProporcional2" ).keydown(function() {
    $("#resultado2").val(
        (parseFloat($("#hojaDeViajeCargaCantidad2").val())*parseFloat($("#hojaDeViajeUnidadDeMedidaProporcional2").val())).toFixed(2)
    );
});
$( "#hojaDeViajeCargaCantidad1" ).keydown(function() {
    //resultado2
    $("#resultado1").val(
        (parseFloat($("#hojaDeViajeCargaCantidad1").val())*parseFloat($("#hojaDeViajeUnidadDeMedidaProporcional1").val())).toFixed(2)
    );
});
$( "#hojaDeViajeUnidadDeMedidaProporcional1" ).keydown(function() {
    $("#resultado1").val(
        (parseFloat($("#hojaDeViajeCargaCantidad1").val())*parseFloat($("#hojaDeViajeUnidadDeMedidaProporcional1").val())).toFixed(2)
    );
});
function arranque_hojaDeViajeRegistro(){
    $('.masEmpresas').hide(); 
    $('.masRemolque').hide();
}
//agregarHojaDeViaje
$("#agregarHojaDeViaje").click(function()
    {
        if (
            //empresa1
            $("#empresaEmisoraId1").val()=== "0" ||
            $("#empresaReceptoraId1").val()=== "0" |
            $("#hojaDeViajeOrigen1").val()=== "" |
            //operador y tractor
            $("#operadorId").val()=== "0" |
            $("#hojaDeViajeTractorEconomico").val()=== "" ||
            //remolque1
            $("#remolqueCargaId1").val()=== "0" ||
            $("#hojaDeViajeRemolqueEconomico1").val()=== "0" ||
            $("#hojaDeViajeTalon1A").val()=== "" ||
            $("#hojaDeViajeTalon1B").val()=== "" ||
            //remolque1 cantidades
            $("#cargaId1").val()=== "0" ||
            $("#hojaDeViajeCargaCantidad1").val()=== "" ||
            $("#cargaUnidadDeMedidaID1").val()=== "0" ||
            $("#hojaDeViajeUnidadDeMedidaProporcional1").val()=== ""
            
        ) {
            alert("los campos principales no estan llenos!.");
        } else {
            alert("datos llenados exitosamente.");
            var arreglos={
                "empresasYorigen":validacionDeDobleEmpresa(),
                "operador":$("#operadorId").val(),
                "tractor":$("#hojaDeViajeTractorEconomico").val(),
                "remolques":validacionDeDobleRemolque(),
                "comentario":$("#hojaDeViajeComentario").val()
            }
            console.log(arreglos);
            console.log(arreglos.empresasYorigen)
        }
    }
);

function validacionDeDobleEmpresa(){
    var empresa;
    switch (masEmpresas) {
        case true:
            if (
                $("#empresaEmisoraId2").val() =="0" ||
                $("#empresaReceptoraId2").val() =="0" ||
                $("#hojaDeViajeOrigen2").val() ==""
                ) 
            {
                empresa = null;    
            } 
            else 
            {
                empresa ={
                    "empresa1":
                    {
                        "empresaEmisoraId1":$("#empresaEmisoraId1").val(),
                        "empresaReceptoraId1":$("#empresaReceptoraId1").val()
                    },
                    "origen1":
                    {
                        "hojaDeViajeOrigen1":$("#hojaDeViajeOrigen1").val()
                    },
                    "empresa2":
                    {
                    "empresaEmisoraId2":$("#empresaEmisoraId2").val(),
                    "empresaReceptoraId2":$("#empresaReceptoraId2").val()
                    },
                    "origen2":
                    {
                    "hojaDeViajeOrigen2":$("#hojaDeViajeOrigen2").val()
                    }
                };
            }
            break;
        case false:
            empresa ={
                "empresa1":
                {
                    "empresaEmisoraId1":$("#empresaEmisoraId1").val(),
                    "empresaReceptoraId1":$("#empresaReceptoraId1").val(),
                },
                "origen1":
                {
                "hojaDeViajeOrigen1":$("#hojaDeViajeOrigen1").val(),
                },
                "empresa2":
                {
                "empresaEmisoraId2":"",
                "empresaReceptoraId2":"",
                },
                "origen2":
                {
                "hojaDeViajeOrigen2":""
                }
            };
            break;
        default:
            break;
    }
    return empresa;
}
function validacionDeDobleRemolque(){
    var remolque;
    switch (masRemolques) {
        case true:
            remolque = {
                "remolque1":{
                    "remolqueCargaId1":$("#remolqueCargaId1").val(),
                    "hojaDeViajeRemolqueEconomico1":$("#hojaDeViajeRemolqueEconomico1").val(),
                    "hojaDeViajeTalon1A":$("#hojaDeViajeTalon1A").val(),
                    "hojaDeViajeTalon1B":$("#hojaDeViajeTalon1B").val(),
                    "cantidades":{
                        "cargaId1":$("#cargaId1").val(),
                        "hojaDeViajeCargaCantidad1":$("#hojaDeViajeCargaCantidad1").val(),
                        "cargaUnidadDeMedidaID1":$("#cargaUnidadDeMedidaID1").val(),
                        "hojaDeViajeUnidadDeMedidaProporcional1":$("#hojaDeViajeUnidadDeMedidaProporcional1").val(),
                    }
                },
                "remolque2":{
                    "remolqueCargaId2":$("#remolqueCargaId2").val(),
                    "hojaDeViajeRemolqueEconomico2":$("#hojaDeViajeRemolqueEconomico2").val(),
                    "hojaDeViajeTalon2A":$("#hojaDeViajeTalon2A").val(),
                    "hojaDeViajeTalon2B":$("#hojaDeViajeTalon2B").val(),
                    "cantidades":{
                        "cargaId2":$("#cargaId2").val(),
                        "hojaDeViajeCargaCantidad2":$("#hojaDeViajeCargaCantidad2").val(),
                        "cargaUnidadDeMedidaID2":$("#cargaUnidadDeMedidaID2").val(),
                        "hojaDeViajeUnidadDeMedidaProporcional2":$("#hojaDeViajeUnidadDeMedidaProporcional2").val()
                    }
                }
            };
            break;
        case false:
            remolque = {
                "remolque1":{
                    "remolqueCargaId1":$("#remolqueCargaId1").val(),
                    "hojaDeViajeRemolqueEconomico1":$("#hojaDeViajeRemolqueEconomico1").val(),
                    "hojaDeViajeTalon1A":$("#hojaDeViajeTalon1A").val(),
                    "hojaDeViajeTalon1B":$("#hojaDeViajeTalon1B").val(),
                    "cantidades":{
                        "cargaId1":$("#cargaId1").val(),
                        "hojaDeViajeCargaCantidad1":$("#hojaDeViajeCargaCantidad1").val(),
                        "cargaUnidadDeMedidaID1":$("#cargaUnidadDeMedidaID1").val(),
                        "hojaDeViajeUnidadDeMedidaProporcional1":$("#hojaDeViajeUnidadDeMedidaProporcional1").val(),
                    }
                },
                "remolque2":{
                    "remolqueCargaId2":"",
                    "hojaDeViajeRemolqueEconomico2":"",
                    "hojaDeViajeTalon2A":"",
                    "hojaDeViajeTalon2B":"",
                    "cantidades":{
                        "cargaId2":"",
                        "hojaDeViajeCargaCantidad2":"",
                        "cargaUnidadDeMedidaID2":"",
                        "hojaDeViajeUnidadDeMedidaProporcional2":""
                    }
                },
            };
            break;
    }
    return remolque;
}
