<?php
    include "../../coneccion/config.php";
    if ($_POST["caso"]==1 || $_POST["caso"]=="1") 
    {
        $consulta= $_POST["folio"];
        $consulta="SELECT * FROM `viaje` WHERE `viaje_folioDeCarga`='$consulta'";
        echo json_encode(busquedaDeFolio($mysqli,$consulta));      
    }
    if ($_POST["caso"]==2 || $_POST["caso"]=="2") 
    {
        $consulta= $_POST["folio"];
        $consulta="SELECT * FROM `viaje` WHERE `viaje_folioDeBascula`='$consulta'";
        echo json_encode(busquedaDeFolio($mysqli,$consulta));  
    }
    function busquedaDeFolio($mysqli,$consulta)
    {
        $result = $mysqli->query($consulta);
        if ($result->num_rows == 0) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }
?>