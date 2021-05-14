<?php
include "../../coneccion/config.php";
$html=muestraHojasDeViaje($con,$_POST['id']);
print_r($html);
function generaTabla($datos){
    $html="";
    while ($r=$datos->fetch_array()) 
    {
        // pendiente
        echo "pendiente";
    }

}
function muestraHojasDeViaje($con,$id){
    $consultaContenido= "
    SELECT 
    hoja_de_viaje.hojaDeViajeID, 
    hoja_de_viaje.sesionId, 
    sesion.sesionNombre, 
    hoja_de_viaje.empresaEmisoraId, 
    empresa_emisora.empresaEmisoraNombre, 
    hoja_de_viaje.empresaReceptoraId, 
    empresa_receptora.empresaReceptoraNombre, 
    hoja_de_viaje.operadorId, 
    operadores.operadorNombre, 
    operadores.operadorLisencia, 
    hoja_de_viaje.cargaId, 
    carga.cargaNombre, 
    hoja_de_viaje.cargaTipoId, 
    cargatipo.cargaTipoNombre,
    cargatipo.valor,
    cargatipo.operacion,
    hoja_de_viaje_estado.hojaDeViajeEstadoId,
    hoja_de_viaje_estado.hojaDeViajeEstadoNombre,
    hoja_de_viaje.hojaDeViajeOrigen,
    hoja_de_viaje.hojaDeViajeOrigenDeDestino,
    hoja_de_viaje.hojaDeViajeCargaCantidad,
    hoja_de_viaje.hojaDeViajeComentarios,
    hoja_de_viaje.hojaDeViajeRemolque1,
    hoja_de_viaje.hojaDeViajePlaca1,
    hoja_de_viaje.hojaDeViajeEconomico1,
    hoja_de_viaje.hojaDeViajeTalon1,
    hoja_de_viaje.hojaDeViajeRemolque2,
    hoja_de_viaje.hojaDeViajePlaca2,
    hoja_de_viaje.hojaDeViajeEconomico2,
    hoja_de_viaje.hojaDeViajeTalon2,
    hoja_de_viaje.hojaDeViajeFechaDeEdicion,
    hoja_de_viaje.hojaDeViajeFechaLiberacion,
    hoja_de_viaje.hojaDeViajeFechaArribo,
    hoja_de_viaje.hojaDeViajeFechaCarga,
    hoja_de_viaje.hojaDeViajeFechaLlegadaDeDescarga,
    hoja_de_viaje.hojaDeViajeFechaDescarga
    FROM hoja_de_viaje 
    INNER JOIN sesion ON hoja_de_viaje.sesionId = sesion.sesionId 
    INNER JOIN empresa_emisora ON hoja_de_viaje.empresaEmisoraId = empresa_emisora.empresaEmisoraId 
    INNER JOIN empresa_receptora ON hoja_de_viaje.empresaReceptoraId= empresa_receptora.empresaReceptoraId 
    INNER JOIN operadores ON hoja_de_viaje.operadorId = operadores.operadorId 
    INNER JOIN carga ON hoja_de_viaje.cargaId = carga.cargaId 
    INNER JOIN cargatipo ON hoja_de_viaje.cargaTipoId= cargatipo.cargaTipoID
    INNER JOIN hoja_de_viaje_estado ON hoja_de_viaje.hojaDeViajeEstadoId= hoja_de_viaje_estado.hojaDeViajeEstadoId
    WHERE 
    hoja_de_viaje.hojaDeViajeEstadoId = $id
";
    return $con->query($consultaContenido);
}
?>