var masEmpresas=false;
var masRemolques=false;

arranque_hojaDeViajeRegistro();
function arranque_hojaDeViajeRegistro(){
    $('.masEmpresas').hide(); 
    $("#hojaDeViajeOrigen2").val("NULL");
    $('.masRemolque').hide();
    $("#hojaDeViajeTalon2A").val("NULL");
    $("#hojaDeViajeTalon2B").val("NULL");
}
$("#masEmpresas").click(function(){
    
    $('.masEmpresas').show();
    $('#masEmpresas').hide();
    $('#labelMasMenos').hide();
    $('#labelMenosMenos').show();
    $("#hojaDeViajeOrigen2").val(""); 
    masEmpresas=true;
    
});
$("#menosEmpresas").click(function(){
    $('.masEmpresas').hide();
    $('#masEmpresas').show();
    $('#labelMasMenos').show();
    //empresas 2 receteo
    $("#empresaEmisoraId2").val("0");
    $("#empresaReceptoraId2").val("0");
    $("#hojaDeViajeOrigen2").val("NULL");    
    masEmpresas=false;
    //empresaReceptoraId2
});
$("#masRemolque").click(function(){
    $('.masRemolque').show();
    $('.labelMasRemolque').hide();
    $('#masRemolque').hide();
    $("#hojaDeViajeTalon2A").val("");
    $("#hojaDeViajeTalon2B").val("");
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
    $("#hojaDeViajeTalon2A").val("NULL");
    $("#hojaDeViajeTalon2B").val("NULL");

    $("#cargaId2").val("0");
    $("#hojaDeViajeCargaCantidad2").val(0);
    $("#cargaUnidadDeMedidaID2").val("0");
    $("#hojaDeViajeUnidadDeMedidaProporcional2").val(0);
    $("#resultado2").val(0);
    masRemolques=true;
});

$("#operadorId").on('change', function () {
    if ($("#operadorId").val()==="0"||$("#operadorId").val()===0) {
        $("#operadorLisencia").val("");
    } else{
        select($("#operadorId").val(),"operadorId","operadores","operadorLisencia","#operadorLisencia");
    }
    
});
$("#hojaDeViajeTractorEconomico").on('change', function () {
    if ($("#hojaDeViajeTractorEconomico").val()==="0"||$("#hojaDeViajeTractorEconomico").val()===0) {
        $("#tractorPlaca").val("");
    } else{
    select($("#hojaDeViajeTractorEconomico").val(),"tractorId","tractor","tractorPlaca","#tractorPlaca");
    }
});
$("#hojaDeViajeRemolqueEconomico1").on('change', function () {
    if ($("#hojaDeViajeRemolqueEconomico1").val()==="0"||$("#hojaDeViajeRemolqueEconomico1").val()===0) {
        $("#remolquePlaca1").val("");
    } else{
    select($("#hojaDeViajeRemolqueEconomico1").val(),"remolqueID","remolque","remolquePlaca","#remolquePlaca1");
    }
});
$("#hojaDeViajeRemolqueEconomico2").on('change', function () {
    if ($("#hojaDeViajeRemolqueEconomico2").val()==="0"||$("#hojaDeViajeRemolqueEconomico2").val()===0) {
        $("#remolquePlaca2").val("");
    } else{
    select($("#hojaDeViajeRemolqueEconomico2").val(),"remolqueID","remolque","remolquePlaca","#remolquePlaca2");
    }
});
function select(valorSelect,campoSelect,tablaSelect,campoSeleccionado,idJquery){
    $.ajax({
        type: "POST",
        url: "../controlador/modulos/hojaDeViaje/selectDinamico.php",
        data: {
                "valor":valorSelect,
                "campo":campoSelect,
                "tabla":tablaSelect
            }, //capturo array     
        success: function (data) 
        {
            data= JSON.parse(data);
            $(idJquery).val(data[0][campoSeleccionado]);
        }
    });
}

//inicio valida si dentro de los talones no hay replica
//fin valida si dentro de los talones no hay replica

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

//agregarHojaDeViaje

$("#agregarHojaDeViaje").click(function()
    {
        if (
            //empresa1
            $("#empresaEmisoraId1").val()=== "0" ||
            $("#empresaReceptoraId1").val()=== "0" ||
            $("#hojaDeViajeOrigen1").val()=== "" ||
            //operador y tractor
            $("#operadorId").val()=== "0" ||
            $("#hojaDeViajeTractorEconomico").val()=== "" ||
            //remolque1
            $("#remolqueCargaId1").val()=== "0" ||
            $("#hojaDeViajeRemolqueEconomico1").val()=== "0" ||
            $("#hojaDeViajeTalon1A").val()=== "" ||
            //$("#hojaDeViajeTalon1B").val()=== "" ||
            //remolque1 cantidades
            $("#cargaId1").val()=== "0" ||
            $("#hojaDeViajeCargaCantidad1").val()=== "" ||
            $("#cargaUnidadDeMedidaID1").val()=== "0" ||
            $("#hojaDeViajeUnidadDeMedidaProporcional1").val()=== ""
            
        ) {
            Swal.fire(
                'Error!',
                'los campos principales no estan llenos!.',
                'error'
            );
        } else {
            if 
            (
                $("#hojaDeViajeTalon1A").val() === $("#hojaDeViajeTalon2A").val() ||
                $("#hojaDeViajeTalon1A").val() === $("#hojaDeViajeTalon2B").val() ||
                $("#hojaDeViajeTalon1B").val() === $("#hojaDeViajeTalon2A").val() ||
                $("#hojaDeViajeTalon1B").val() === $("#hojaDeViajeTalon2B").val()
            ) {
                Swal.fire(
                    'Error!',
                    'talones duplicados en este formulario!.',
                    'error'
                );
                
            } else {
                
                /*
                Swal.fire(
                    'Bien hecho!',
                    'datos llenados exitosamente!.',
                    'success'
                );
                */
                var arreglos={
                    "fechaActual":fechaActual(),
                    "empresasYorigen":validacionDeDobleEmpresa(),
                    "operador":$("#operadorId").val(),
                    "tractor":$("#hojaDeViajeTractorEconomico").val(),
                    "remolques":validacionDeDobleRemolque(),
                    "comentario":$("#hojaDeViajeComentario").val()
                }
                //console.log(arreglos);
                $.ajax({
                    type: "POST",
                    url: "../controlador/modulos/hojaDeViaje/hojaDeViajeRegistros.php",
                    data: arreglos, //capturo array     
                    success: function (data) 
                    {
                        console.log(JSON.parse(data));
                    }
                });    
            }
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
function fechaActual() {
    var dt = new Date();
    return (
        `${dt.getFullYear().toString().padStart(4, '0')}:${(
        dt.getMonth()+1).toString().padStart(2, '0')}:${
        dt.getDate().toString().padStart(2, '0')} ${
        dt.getHours().toString().padStart(2, '0')}:${
        dt.getMinutes().toString().padStart(2, '0')}:${
        dt.getSeconds().toString().padStart(2, '0')}`
    );
}
//inicio solo permite numeros y punto decimal en input
function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;    
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{       
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {     
              return true;              
          }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{       
                    return true;
                }
          }else{
              return false;
          }
    }
}
function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }    
}
//fin solo permite numeros y punto decimal en input
