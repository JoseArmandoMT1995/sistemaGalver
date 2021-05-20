<?php
    function muestraClientes($con)
    {
        include "../../coneccion/config.php";
        $arreglo=[];
        $result = $con->query("SELECT * FROM `empresa_emisora`");
        while ($row = $result->fetch_object()){
            $arreglo[] = $row;
        }
        return $arreglo;
    }
    function muestraCliente($con,$id){
        $consultaContenido= "SELECT * FROM empresa WHERE empresaId = '".$id."';";
        return $con->query($consultaContenido);
    }
?>