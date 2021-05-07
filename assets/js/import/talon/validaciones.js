
//acciones de arranque de la pagina
ajaxOperadorLicencia();
//acciones al precionar el boton
$("#agregarTalonNuevo").click(function(event){
    var variables =
    {
        "empresaEmisoraId":$("#empresaEmisoraId").val(),
        "empresaReceptoraId":$("#empresaReceptoraId").val(),
        "operadorId":$("#operadorId").val(),
        "hojaDeViajeOrigen":$("#talonesOrigen").val(),
        "hojaDeViajeOrigenDeDestino":$("#talonesOrigenDeDestino").val(),
        "hojaDeViajeRemolque1":$("#talonesRemolque1").val(),
        "hojaDeViajePlaca1":$("#talonesPlaca1").val(),
        "hojaDeViajeEconomico1":$("#talonesEconomico1").val(),
        "hojaDeViajeTalon1":$("#talonesTalon1").val(),
        "hojaDeViajeRemolque2":$("#talonesRemolque2").val(),
        "hojaDeViajePlaca2":$("#talonesPlaca2").val(),
        "hojaDeViajeEconomico2":$("#talonesEconomico2").val(),
        "hojaDeViajeTalon2":$("#talonesTalon2").val(),

        "hojaDeViajeFechaArribo":parceToDataTime($("#talonesFechaArribo_Fecha").val(),$("#talonesFechaArribo_Hora").val()),

        "hojaDeViajeFechaCarga":parceToDataTime($("#talonesFechaCarga_Fecha").val(),$("#talonesFechaCarga_Hora").val()),
        
        "hojaDeViajeFechaLlegadaDeDescarga":parceToDataTime($("#talonesFechaLlegadaDeDescarga_Fecha").val(),$("#talonesFechaLlegadaDeDescarga_Hora").val()),

        "hojaDeViajeFechaDescarga":parceToDataTime($("#talonesFechaDescarga_Fecha").val(),$("#talonesFechaDescarga_Hora").val()),
        
        "cargaId":$("#carga").val(),
        "cargaTipoId":$("#cargaTipoId").val(),
        "hojaDeViajeCargaCantidad":$("#talonesCargaCantidad").val(),
        "hojaDeViajeComentarios":$("#talonesComentarios").val()
    };
    existenciaDeVariables(variables);

});
function ajaxFiltro(variables){
    $.ajax({
        type: "POST",
        url: "../controlador/modulos/talones/filtroTalones.php",
        data: variables,//capturo array     
        success: function(data)
        {
            switch (data) 
        {
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
    //return acceso;
}
function ajaxInsert(variables){
    $.ajax({
        type: "POST",
        url: "../controlador/modulos/talones/insertarTalon.php",
        data: variables,//capturo array     
        success: function(data)
        {
            console.log(data);
        }
    });
}
function existenciaDeVariables(variables){
    var respuesta;
    if 
    (
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
    ) 
    {
        respuesta = ajaxFiltro(variables);
        
        /*
        switch (respuesta) 
        {
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
        */
        
    } 
    else 
    {
        alert("ups!");
        
    }
}
function parceToDataTime(fecha,hora){
    var datatime;
    var myDate = new Date(fecha);
    var d = myDate.getDate();
    var m = myDate.getMonth();
    m += 1;
    var y = myDate.getFullYear();
    datatime = (y + "-" + m + "-" + d);
    //.000000
    return datatime = datatime +" "+hora+":00";

}