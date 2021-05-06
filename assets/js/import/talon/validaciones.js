
//acciones de arranque de la pagina
ajaxOperadorLicencia();
//acciones al precionar el boton
$("#agregarTalonNuevo").click(function(event){
    var empresaReceptoraId= $("#empresaReceptoraId").val();
    var empresaEmisoraId=   $("#empresaEmisoraId").val();
    var operadorId=         $("#operadorId").val();
    var talonesOrigen=      $("#talonesOrigen").val();
    var talonesOrigenDeDestino=$("#talonesOrigenDeDestino").val();
    var talonesRemolque1=   $("#talonesRemolque1").val();
    var talonesPlaca1=      $("#talonesPlaca1").val();
    var talonesEconomico1=  $("#talonesEconomico1").val();
    var talonesTalon1=      $("#talonesTalon1").val();

    var talonesRemolque2=   $("#talonesRemolque2").val();
    var talonesPlaca2=      $("#talonesPlaca2").val();
    var talonesEconomico2=  $("#talonesEconomico2").val();
    var talonesTalon2=      $("#talonesTalon2").val();

    var talonesFechaArribo_Fecha=      $("#talonesFechaArribo_Fecha").val();
    var talonesFechaArribo_Hora=      $("#talonesFechaArribo_Hora").val();

    var talonesFechaCarga_Fecha=      $("#talonesFechaCarga_Fecha").val();
    var talonesFechaCarga_Hora=      $("#talonesFechaCarga_Hora").val();

    var talonesFechaLlegadaDeDescarga_Fecha=      $("#talonesFechaLlegadaDeDescarga_Fecha").val();
    var talonesFechaLlegadaDeDescarga_Hora=      $("#talonesFechaLlegadaDeDescarga_Hora").val();

    var talonesFechaDescarga_Fecha=      $("#talonesFechaDescarga_Fecha").val();
    var talonesFechaDescarga_Hora=      $("#talonesFechaDescarga_Hora").val();

    var cargaId=      $("#carga").val();
    var cargaTipoId=      $("#cargaTipoId").val();
    var talonesCargaCantidad=      $("#talonesCargaCantidad").val();
    var talonesComentarios=      $("#talonesComentarios").val();
});
