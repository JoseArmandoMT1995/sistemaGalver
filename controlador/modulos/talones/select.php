<?php
//inicio se eliminara
function muestraClientes($con){
    $consultaContenido= "SELECT empresa.empresaId, empresa.empresaNombre, empresa.empresaRFC, empresa.empresaDescripcion, empresa.empresaDireccion, empresa.empresaCorreo, empresa.empresaFechaDeCreacion, sesion.sesionId, sesion.sesionNombre FROM empresa LEFT JOIN sesion ON empresa.sesionId = sesion.sesionId;";
    return $con->query($consultaContenido);
}
//fin se eliminara
function muestraRemolques($con){
    $consultaContenido= "SELECT remolqueId,remolqueServicio FROM remolques";
    return $con->query($consultaContenido);
}
function muestraTalonEstado($con){
    $consultaContenido= "SELECT estadoTalonId,estadoTalonNombre FROM estadotalon";
    return $con->query($consultaContenido);
}


function muestraEmpresaOperadores($con){
    $consultaContenido= "SELECT * FROM operadores;";
    return $con->query($consultaContenido);
}
function muestraEmpresasEmisoras($con){
    $consultaContenido= "SELECT * FROM empresaemisora;";
    return $con->query($consultaContenido);
}
function muestraEmpresasReceptoras($con){
    $consultaContenido= "SELECT * FROM empresareceptora;";
    return $con->query($consultaContenido);
}
function muestraCargas($con){
    $consultaContenido= "SELECT * FROM carga;";
    return $con->query($consultaContenido);
}
function muestraCargaTipos($con){
    $consultaContenido= "SELECT * FROM cargatipo;";
    return $con->query($consultaContenido);
}
?>