<?php
include "../controlador/coneccion/config.php";
cancelacion($_GET["id"],$_GET["caso"],$mysqli,$_GET["url"]);
function cancelacion($id,$caso,$mysqli,$url)
{
    $consulta="UPDATE `hoja_de_viaje` SET `hojaDeViaje_estadoDeViaje` = '$caso' WHERE `hoja_de_viaje`.`id_hojaDeViaje` = $id;";
    $result = $mysqli->query($consulta);
    if ($result ==1) {
        header('Location: ./'.$url);
        exit;
    }else{
        echo "error en la coneccion";
    }
}
?>