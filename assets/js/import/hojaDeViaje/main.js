arranque_hojaDeViajeRegistro();

$("#masEmpresas").click(function(){
    
    $('.masEmpresas').show();
    $('#masEmpresas').hide();
    $('#labelMasMenos').hide();
    $('#labelMenosMenos').show();
    
});
$("#menosEmpresas").click(function(){
    $('.masEmpresas').hide();
    $('#masEmpresas').show();
    $('#labelMasMenos').show();
    //empresas 2 receteo
    $("#empresaEmisoraId2").val("0");
    $("#empresaReceptoraId2").val("0");
    $("#hojaDeViajeOrigen2").val("");
    

    
    
    //empresaReceptoraId2

});
$("#masRemolque").click(function(){
    $('.masRemolque').show();
    $('.labelMasRemolque').hide();
    $('#masRemolque').hide();
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
    //ajaxRetorno({"validacion":1,"operadorId":$("#operadorId").val()}); 
    //ajaxRetorno({"validacion":2,"tractorId":$("#hojaDeViajeTractorEconomico").val()});  
    //ajaxRetorno({"validacion":3,"remolqueID":$("#hojaDeViajeRemolqueEconomico1").val()});  
    //ajaxRetorno({"validacion":4,"remolqueID":$("#hojaDeViajeRemolqueEconomico2").val()}); 
    $('.masEmpresas').hide(); 
    $('.masRemolque').hide();
}