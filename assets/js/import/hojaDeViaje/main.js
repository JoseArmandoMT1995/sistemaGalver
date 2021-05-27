var masEmpresas=false;
var masRemolques=false;

arranque_hojaDeViajeRegistro();
function validarTalonesAlTeclear(campo,talon){
    $.ajax({
        type: "POST",
        url: "../controlador/modulos/hojaDeViaje/validarTalones.php",
        data: {"talon":talon}, //capturo array     
        success: function (data) {
            switch (data) {
                case "1":
                    //alert("no puede ingresar talones identicos a otros registros existentes");
                    Swal.fire(
                        'Error!',
                        'no puede poner un talon que ya exista en otros registros de la base de datos!',
                        'error'
                    );
                    $(campo).val("");
                    break;            
                default:
                    break;
            }
             
        }
    });
}
$("#operadorId").on('change', function () {
     select($("#operadorId").val(),"operadorId","operadores","operadorLisencia","#operadorLisencia");
});
$("#hojaDeViajeTractorEconomico").on('change', function () {
    select($("#hojaDeViajeTractorEconomico").val(),"tractorId","tractor","tractorPlaca","#tractorPlaca");
});
$("#hojaDeViajeRemolqueEconomico1").on('change', function () {
    select($("#hojaDeViajeRemolqueEconomico1").val(),"remolqueID","remolque","remolquePlaca","#remolquePlaca1");
});
$("#hojaDeViajeRemolqueEconomico2").on('change', function () {
    select($("#hojaDeViajeRemolqueEconomico2").val(),"remolqueID","remolque","remolquePlaca","#remolquePlaca2");
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
//inicio valida si dentro de los talones no hay replica

$( "#hojaDeViajeTalon1A" ).keydown(function() 
    {
        if ($( "#hojaDeViajeTalon1A" ).val() === "") {
            //no asa nada
        }
        else
        {
        if (
            $("#hojaDeViajeTalon1A" ).val()=== $( "#hojaDeViajeTalon2A" ).val()|| 
            $( "#hojaDeViajeTalon1A" ).val()=== $( "#hojaDeViajeTalon2B" ).val()
            ) 
            {
                $("#hojaDeViajeTalon1A" ).val("");
                Swal.fire(
                    'Error!',
                    'no puedes tener talones duplicados en dos remolques!',
                    'error'
                );
                
            }
            else{
                validarTalonesAlTeclear("#hojaDeViajeTalon1A",$("#hojaDeViajeTalon1A" ).val());
            }
        }
    }
);
$( "#hojaDeViajeTalon1B" ).keydown(function() 
    {
        if ($( "#hojaDeViajeTalon1B" ).val() === "") {
            //no asa nada
        }
        else
        {
            if (
                $("#hojaDeViajeTalon1B" ).val()=== $( "#hojaDeViajeTalon2A" ).val()|| 
                $( "#hojaDeViajeTalon1B" ).val()=== $( "#hojaDeViajeTalon2B" ).val() &&
                $( "#hojaDeViajeTalon1B" ).val() !== ""
                ) {
                Swal.fire(
                    'Error!',
                    'no puedes tener talones duplicados en dos remolques!',
                    'error'
                );
                
                $("#hojaDeViajeTalon1B" ).val("");
            }
            else{
                validarTalonesAlTeclear("#hojaDeViajeTalon1B",$("#hojaDeViajeTalon1B" ).val());
            }
        }
    }
);
$( "#hojaDeViajeTalon2A" ).keydown(function() 
    {
        if ($( "#hojaDeViajeTalon2A" ).val() === "") {
            //no asa nada
        }
        else
        {
            if (
                $("#hojaDeViajeTalon2A" ).val()=== $( "#hojaDeViajeTalon1A" ).val()|| 
                $( "#hojaDeViajeTalon2A" ).val()=== $( "#hojaDeViajeTalon1B" ).val()&&
                $( "#hojaDeViajeTalon2A" ).val() !== ""
                ) {
                Swal.fire(
                    'Error!',
                    'no puedes tener talones duplicados en dos remolques!',
                    'error'
                );
                $("#hojaDeViajeTalon2A" ).val("");
            }
            else{
                validarTalonesAlTeclear("#hojaDeViajeTalon2A",$("#hojaDeViajeTalon2A" ).val());
            }
        }
    }
);
$( "#hojaDeViajeTalon2B" ).keydown(function() 
    {
        if ($( "#hojaDeViajeTalon2B" ).val() === "") {
            //no asa nada
        }
        else
        {
            if (
                $("#hojaDeViajeTalon2B" ).val()=== $( "#hojaDeViajeTalon1A" ).val()|| 
                $( "#hojaDeViajeTalon2B" ).val()=== $( "#hojaDeViajeTalon1B" ).val()&&
                $( "#hojaDeViajeTalon2B" ).val() !== ""
                ) 
            {
                Swal.fire(
                    'Error!',
                    'no puedes tener talones duplicados en dos remolques!',
                    'error'
                );
                $("#hojaDeViajeTalon2B" ).val("");
            }
            else{
                validarTalonesAlTeclear("#hojaDeViajeTalon2B",$("#hojaDeViajeTalon2B" ).val());
                
            }
        }
    }
);
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
            Swal.fire(
                'Error!',
                'los campos principales no estan llenos!.',
                'error'
            );
        } else {
            Swal.fire(
                'Bien hecho!',
                'datos llenados exitosamente!.',
                'success'
            );
            var arreglos={
                "empresasYorigen":validacionDeDobleEmpresa(),
                "operador":$("#operadorId").val(),
                "tractor":$("#hojaDeViajeTractorEconomico").val(),
                "remolques":validacionDeDobleRemolque(),
                "comentario":$("#hojaDeViajeComentario").val()
            }
            console.log(arreglos);
            $.ajax({
                type: "POST",
                url: "../controlador/modulos/hojaDeViaje/hojaDeViajeRegistros.php",
                data: arreglos, //capturo array     
                success: function (data) {
                    console.log(JSON.parse(data));
                }
            });
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
