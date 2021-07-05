//acciones de arranque de la pagina
ajaxOperadorLicencia();
//********************Edicion*************************/
function defaultFuncionesInput() {
    obtenerResultado($("#cargaTipoId").val(), $("#cargaTipoId").val("#talonesCargaCantidad"));
}
$("#editarTalonNuevo").click(function 
    (event) {
        console.log("dddd");
        console.log($("#hojaDeViajeEdicionID").data("hojadeviajeedicionid"));
        console.log($("#hojaDeViajeID").data("hojadeviajeid"));
    var variables = {
        "casoTalones":2,
        "hojaDeViajeEstadoId":$("#hojaDeViajeEstadoId").val(),
        "hojaDeViajeID":$("#hojaDeViajeID").data("hojadeviajeid"),
        "hojaDeViajeEdicionID":$("#hojaDeViajeEdicionID").data("hojadeviajeedicionid"),
        "sesionid":$("#sesionId").data("sesionid"),
        "empresaEmisoraId": $("#empresaEmisoraId").val(),
        "empresaReceptoraId": $("#empresaReceptoraId").val(),
        "operadorId": $("#operadorId").val(),
        "hojaDeViajeOrigen": $("#talonesOrigen").val(),
        "hojaDeViajeOrigenDeDestino": $("#talonesOrigenDeDestino").val(),
        "hojaDeViajeRemolque1": $("#talonesRemolque1").val(),
        "hojaDeViajePlaca1": $("#talonesPlaca1").val(),
        "hojaDeViajeEconomico1": $("#talonesEconomico1").val(),
        "hojaDeViajeTalon1": $("#talonesTalon1").val(),
        "hojaDeViajeRemolque2": $("#talonesRemolque2").val(),
        "hojaDeViajePlaca2": $("#talonesPlaca2").val(),
        "hojaDeViajeEconomico2": $("#talonesEconomico2").val(),
        "hojaDeViajeTalon2": $("#talonesTalon2").val(),
        "fechaActial": obtenerFechaActual(),
        "hojaDeViajeFechaArribo": parceToDataTime($("#talonesFechaArribo_Fecha").val(), $("#talonesFechaArribo_Hora").val()),
        "hojaDeViajeFechaCarga": parceToDataTime($("#talonesFechaCarga_Fecha").val(), $("#talonesFechaCarga_Hora").val()),
        "hojaDeViajeFechaLlegadaDeDescarga": parceToDataTime($("#talonesFechaLlegadaDeDescarga_Fecha").val(), $("#talonesFechaLlegadaDeDescarga_Hora").val()),
        "hojaDeViajeFechaDescarga": parceToDataTime($("#talonesFechaDescarga_Fecha").val(), $("#talonesFechaDescarga_Hora").val()),
        "cargaId": $("#carga").val(),
        "cargaTipoId": $("#cargaTipoId").val(),
        "hojaDeViajeCargaCantidad": $("#talonesCargaCantidad").val(),
        "hojaDeViajeComentarios": $("#talonesComentarios").val()
    };
    existenciaDeVariablesEdicion(variables);
});
function existenciaDeVariablesEdicion(variables) {
    var respuesta;
    if (
        variables.hojaDeViajeEstadoId !== "" &&
        variables.hojaDeViajeID !== "" &&
        variables.empresaEmisoraId !== "" &&
        variables.empresaReceptoraId !== "" &&
        variables.operadorId !== "" &&
        variables.hojaDeViajeOrigen !== "" &&
        variables.hojaDeViajeOrigenDeDestino !== "" &&
        variables.hojaDeViajeRemolque1 !== "" &&
        variables.hojaDeViajePlaca1 !== "" &&
        variables.hojaDeViajeEconomico1 !== "" &&
        variables.hojaDeViajeTalon1 !== "" &&
        variables.hojaDeViajeRemolque2 !== "" &&
        variables.hojaDeViajePlaca2 !== "" &&
        variables.hojaDeViajeEconomico2 !== "" &&
        variables.hojaDeViajeTalon2 !== "" &&
        variables.hojaDeViajeFechaArribo !== "" &&
        variables.hojaDeViajeFechaCarga !== "" &&
        variables.hojaDeViajeFechaLlegadaDeDescarga !== "" &&
        variables.hojaDeViajeFechaDescarga !== "" &&
        variables.cargaId !== "" &&
        variables.cargaTipoId !== "" &&
        variables.hojaDeViajeCargaCantidad !== ""
    ) {
        respuesta = ajaxFiltroEditar(variables);
    } else {
        alert("ups no agregado!");
    }
}
function ajaxFiltroEditar(variables) {
    $.ajax(
        {
        type: "POST",
        url: "../controlador/modulos/talones/filtroTalonesEdicion.php",
        data: variables, //capturo array     
        success: function (data) 
            {
            switch (data) 
                {
                case "si":
                    ajaxInsertEdit(variables);
                    break;
                case "no":
                    alert("no se puede ingresar nuevo registro por que hay talones duplicados");
                    break;
                default:
                    console.log("no encontre casos.");
                    alert("no encontre casos.");
                    break;
                }
            }
        });
}
function ajaxInsertEdit(variables) 
{
    $.ajax({
        type: "POST",
        url: "../controlador/modulos/talones/editarTalones.php",
        data: variables, //capturo array     
        success: function (data) {
            alert("se editado con exito amigo");
            location.href ="talon.php";
        }
    });
}
//********************Agregado*************************/
$('#resultadoCarga').val(
    obtenerResultado($('#cargaTipoId').val(), $('#talonesCargaCantidad').val())
);
$("#talonesCargaCantidad").keyup(function (event) {
    var cargaTipoId = $('#cargaTipoId').val();
    var talonesCargaCantidad = $('#talonesCargaCantidad').val();
    $('#resultadoCarga').val(
        obtenerResultado(cargaTipoId, talonesCargaCantidad)
    );
});
$('#operadorId').on('change', function () {
    ajaxOperadorLicencia();

});
$('#carga').on('change', function () {
    var data = "";
    $('#talonesCargaCantidad').val(data);
    $('#resultadoCarga').val(data);
});
$('#cargaTipoId').on('change', function () {
    var data = "";
    $('#talonesCargaCantidad').val(data);
    $('#resultadoCarga').val(data);
});
$("#agregarTalonNuevo").click(function (event) {
    var variables = {
        "empresaEmisoraId": $("#empresaEmisoraId").val(),
        "empresaReceptoraId": $("#empresaReceptoraId").val(),
        "operadorId": $("#operadorId").val(),
        "hojaDeViajeOrigen": $("#talonesOrigen").val(),
        "hojaDeViajeOrigenDeDestino": $("#talonesOrigenDeDestino").val(),
        "hojaDeViajeRemolque1": $("#talonesRemolque1").val(),
        "hojaDeViajePlaca1": $("#talonesPlaca1").val(),
        "hojaDeViajeEconomico1": $("#talonesEconomico1").val(),
        "hojaDeViajeTalon1": $("#talonesTalon1").val(),
        "hojaDeViajeRemolque2": $("#talonesRemolque2").val(),
        "hojaDeViajePlaca2": $("#talonesPlaca2").val(),
        "hojaDeViajeEconomico2": $("#talonesEconomico2").val(),
        "hojaDeViajeTalon2": $("#talonesTalon2").val(),
        "fechaActial": obtenerFechaActual(),
        "hojaDeViajeFechaArribo": parceToDataTime($("#talonesFechaArribo_Fecha").val(), $("#talonesFechaArribo_Hora").val()),
        "hojaDeViajeFechaCarga": parceToDataTime($("#talonesFechaCarga_Fecha").val(), $("#talonesFechaCarga_Hora").val()),
        "hojaDeViajeFechaLlegadaDeDescarga": parceToDataTime($("#talonesFechaLlegadaDeDescarga_Fecha").val(), $("#talonesFechaLlegadaDeDescarga_Hora").val()),
        "hojaDeViajeFechaDescarga": parceToDataTime($("#talonesFechaDescarga_Fecha").val(), $("#talonesFechaDescarga_Hora").val()),
        "cargaId": $("#carga").val(),
        "cargaTipoId": $("#cargaTipoId").val(),
        "hojaDeViajeCargaCantidad": $("#talonesCargaCantidad").val(),
        "hojaDeViajeComentarios": $("#talonesComentarios").val()
    };
    existenciaDeVariables(variables);
});
function ajaxFiltro(variables) {
    $.ajax({
        type: "POST",
        url: "../controlador/modulos/talones/filtroTalones.php",
        data: variables, //capturo array     
        success: function (data) {
            switch (data) {
                case "si":
                    alert("se ingresara nuevo registro");
                    ajaxInsert(variables);
                    break;
                case "no":
                    alert("no se puede ingresar nuevo registro por que hay talones duplicados");
                    break;

                default:
                    alert("no encontre casos");
                    break;
            }
        }
    });
}
function ajaxInsert(variables) {
    $.ajax({
        type: "POST",
        url: "../controlador/modulos/talones/insertarTalon.php",
        data: variables, //capturo array     
        success: function (data) {
            alert("se agrego con exito amigo");
            location.href ="talon.php";
        }
    });
}
function existenciaDeVariables(variables) {
    var respuesta;
    if (
        variables.empresaEmisoraId !== "" &&
        variables.empresaReceptoraId !== "" &&
        variables.operadorId !== "" &&
        variables.hojaDeViajeOrigen !== "" &&
        variables.hojaDeViajeOrigenDeDestino !== "" &&
        variables.hojaDeViajeRemolque1 !== "" &&
        variables.hojaDeViajePlaca1 !== "" &&
        variables.hojaDeViajeEconomico1 !== "" &&
        variables.hojaDeViajeTalon1 !== "" &&
        variables.hojaDeViajeRemolque2 !== "" &&
        variables.hojaDeViajePlaca2 !== "" &&
        variables.hojaDeViajeEconomico2 !== "" &&
        variables.hojaDeViajeTalon2 !== "" &&
        variables.hojaDeViajeFechaArribo !== "" &&
        variables.hojaDeViajeFechaCarga !== "" &&
        variables.hojaDeViajeFechaLlegadaDeDescarga !== "" &&
        variables.hojaDeViajeFechaDescarga !== "" &&
        variables.cargaId !== "" &&
        variables.cargaTipoId !== "" &&
        variables.hojaDeViajeCargaCantidad !== ""
    ) {
        respuesta = ajaxFiltro(variables);
    } else {
        alert("ups no agregado!");
    }
}
function parceToDataTime(fecha, hora) {
    var datatime;
    var myDate = new Date(fecha);
    var d = myDate.getDate();
    var m = myDate.getMonth();
    m += 1;
    var y = myDate.getFullYear();
    datatime = (y + "-" + m + "-" + d);
    //.000000
    return datatime = datatime + " " + hora + ":00";
}
function obtenerFechaActual() {
    var f = new Date();
    var mes = f.getMonth();
    if (mes < 10) {
        mes = "0" + mes;
    }
    return f.getFullYear() + ":" + mes + ":" + f.getDate() + " " + f.getHours() + ":" + f.getMinutes() + ":00.000000";
}
function obtenerResultado(operacion, cantidad) {
    var resultado;
    if (operacion === null || operacion === "") {
        resultado = "ingrese la carga";
    } else {
        if (cantidad === null || cantidad === "") {
            resultado = "ingrese la cantidad";
        } else {
            if (validateDecimal(cantidad) !== true) {
                resultado = "ingrece un numero decimal";
            } else {

                resultado = ajaxResultadoDeCarga(operacion, cantidad);
            }
        }
    }
    return resultado;
}
function ajaxResultadoDeCarga(cargaTipoID, cantidad) {
    var array = {
        'cargaTipoID': cargaTipoID,
        'cantidad': cantidad
    }; //array que deseo enviar
    var url = "../controlador/modulos/talones/operacionCarga.php";
    $.ajax({
        type: "POST",
        url: url,
        data: array, //capturo array     
        success: function (data) {
            data = parseFloat(data);
            $('#resultadoCarga').val(data);
        }
    });
}
function ajaxOperadorLicencia() {
    $.ajax({
        type: "POST",
        url: "../controlador/modulos/talones/selectOperador.php",
        data: {
            'operadorID': $('#operadorId').val()
        }, //capturo array     
        success: function (data) {
            $('#operadorLisencia').val(data);
        }
    });
}
function validateDecimal(valor) {
    var RE = /^\d*\.?\d*$/;
    if (RE.test(valor)) {
        return true;
    } else {
        return false;
    }
}