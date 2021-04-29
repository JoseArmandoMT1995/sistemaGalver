<?php
    include "../../coneccion/config.php";
    $consultaSql=eliminarCliente($con);
    function eliminarCliente($con){
        $consultaContenido= "DELETE FROM empresa WHERE empresa.empresaId =".$_GET["empresaId"];
        $con->query($consultaContenido);
        print "<script>alert(\"Ha eliminado a la empresa ".$_GET["empresaNombre"].".\");window.location='../../../vistas/clientes.php';</script>";
    }
?>