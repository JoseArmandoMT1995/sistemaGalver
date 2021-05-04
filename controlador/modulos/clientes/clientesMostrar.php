<?php
    function muestraClientes($con){
        $consultaContenido= "SELECT empresa.empresaId, empresa.empresaNombre, empresa.empresaRFC, empresa.empresaDescripcion, empresa.empresaDireccion, empresa.empresaCorreo, empresa.empresaFechaDeCreacion, sesion.sesionId, sesion.sesionNombre FROM empresa LEFT JOIN sesion ON empresa.sesionId = sesion.sesionId;";
        return $con->query($consultaContenido);
    }
    function muestraCliente($con,$id){
        $consultaContenido= "SELECT * FROM empresa WHERE empresaId = '".$id."';";
        return $con->query($consultaContenido);
    }
?>