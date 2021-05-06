
$("#talonesCargaCantidad").keyup(function(event){
    var cargaTipoId=$('#cargaTipoId').val();
    var talonesCargaCantidad=$('#talonesCargaCantidad').val();
    $('#resultadoCarga').val(
        obtenerResultado(cargaTipoId,talonesCargaCantidad)
    );
}); 

$('#operadorId').on('change', function() 
{
    ajaxOperadorLicencia();

});

$('#carga').on('change', function() {
    var data ="";
    $('#talonesCargaCantidad').val(data);
    $('#resultadoCarga').val(data);
});
$('#cargaTipoId').on('change', function() {
    var data ="";
    $('#talonesCargaCantidad').val(data);
    $('#resultadoCarga').val(data);
});
function obtenerResultado(operacion,cantidad){
    var resultado;
    if (operacion=== null || operacion === "") {
        resultado = "ingrese la carga";
    }
    else
    {
        if (cantidad === null || cantidad === "") {
            resultado = "ingrese la cantidad";
        }
        else
        {
            if (validateDecimal(cantidad)!==true) {
                resultado= "ingrece un numero decimal";
            }else{
               
                resultado= ajaxResultadoDeCarga(operacion,cantidad);
            }
        }
    }
    return resultado;
}
function ajaxResultadoDeCarga(cargaTipoID,cantidad){
    var array = {'cargaTipoID':cargaTipoID ,'cantidad':cantidad}; //array que deseo enviar
    var url= "../controlador/modulos/talones/operacionCarga.php";
    $.ajax({
            type: "POST",
            url: url,
            data: array,//capturo array     
            success: function(data){
                data =parseFloat(data);
                $('#resultadoCarga').val(data);
            }
    });
}
function ajaxOperadorLicencia(){
    $.ajax({
        type: "POST",
        url: "../controlador/modulos/talones/selectOperador.php",
        data: 
        {
            'operadorID':$('#operadorId').val()
        },//capturo array     
        success: function(data)
        {
            $('#operadorLisencia').val(data);
        }
    });
}
function validateDecimal(valor) {
    var RE = /^\d*\.?\d*$/;
    if (RE.test(valor)) 
    {
        return true;
    } 
    else 
    {
        return false;
    }
}