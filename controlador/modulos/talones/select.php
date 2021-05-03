<?php
function muestraClientes($con){
    $consultaContenido= "SELECT empresa.empresaId, empresa.empresaNombre, empresa.empresaRFC, empresa.empresaDescripcion, empresa.empresaDireccion, empresa.empresaCorreo, empresa.empresaFechaDeCreacion, sesion.sesionId, sesion.sesionNombre FROM empresa LEFT JOIN sesion ON empresa.sesionId = sesion.sesionId;";
    return $con->query($consultaContenido);
}
function muestraRemolques($con){
    $consultaContenido= "SELECT remolqueId,remolqueServicio FROM remolques";
    return $con->query($consultaContenido);
}
function muestraTalonEstado($con){
    $consultaContenido= "SELECT estadoTalonId,estadoTalonNombre FROM estadotalon";
    return $con->query($consultaContenido);
}
?>