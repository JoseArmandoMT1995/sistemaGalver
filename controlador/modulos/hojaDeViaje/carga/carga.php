<?php
    include "../../../coneccion/config.php";
    if (isset($_POST)) 
    {   
        $array;
        if ($_POST["caso"] == "1") 
        {
            $folioCarga=    busquedaDeCampo($mysqli,"viaje_folioDeCarga",   $_POST["data"]["viaje_folioDeCarga"]);    
            $folioBascula=  busquedaDeCampo($mysqli,"viaje_folioDeBascula", $_POST["data"]["viaje_folioDeBascula"]);
            if ($folioCarga==true && $folioBascula==true) {
                $consulta=
                "UPDATE `viaje` SET 
                `id_viajeEstado` = '3', 
                `viaje_fechaDeCarga` = NOW(), 
                `viaje_folioDeBascula` = '".$_POST["data"]["viaje_folioDeBascula"]."', 
                `viaje_folioDeCarga` = '".$_POST["data"]["viaje_folioDeCarga"]."',
                `viaje_observacion_carga` = '".$_POST["data"]["viaje_observacion_carga"]."', 
                `viaje_sellos` = '".$_POST["data"]["viaje_sellos"]."'
                WHERE `id_viaje` = ".$_POST["data"]['id_viaje']; 
                $consulta= $mysqli->query($consulta);
                $array=array(
                    "caso"=>$consulta,
                    "folioCarga"=>$folioCarga,
                    "folioBascula"=>$folioBascula
                );             
            }else{
                $array=array(
                    "caso"=>false,
                    "folioCarga"=>$folioCarga,
                    "folioBascula"=>$folioBascula
                );
            }
            echo json_encode($array);
        }
    }
    function busquedaDeCampo($mysqli,$nomCampo,$campo)
    {
        $consulta=
        "SELECT $nomCampo FROM `viaje` WHERE $nomCampo = '$campo'";
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