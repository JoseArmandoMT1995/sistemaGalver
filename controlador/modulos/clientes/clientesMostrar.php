<?php

    
    include "../controlador/coneccion/config.php";
    $consultaSql=muestraClientes($con);
    function muestraClientes($con){
        $consultaContenido= "SELECT empresa.empresaId, empresa.empresaNombre, empresa.empresaRFC, empresa.empresaDescripcion, empresa.empresaDireccion, empresa.empresaCorreo, empresa.empresaFechaDeCreacion, sesion.sesionId, sesion.sesionNombre FROM empresa LEFT JOIN sesion ON empresa.sesionId = sesion.sesionId;";
        return $con->query($consultaContenido);
    }

?>