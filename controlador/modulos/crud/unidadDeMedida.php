<?php
include "../../coneccion/config.php";
session_start();
$creador= $_SESSION['usuarioId'];
if (isset($_POST)) 
{
    switch ($_POST["tipo"]) 
    {
        case '1':
            $consulta=
            "INSERT INTO `carga_unidad_de_medida` 
            (`cargaUnidadDeMedidaID`, `cargaUnidadDeMedidaNombre`, `cargaUnidadDeMedidaDescripcion`, `cargaUnidadDeMedidaFechaDeCreacion`, 
            `usuarioId`) VALUES 
            (NULL, '".$_POST["data"]["cargaUnidadDeMedidaNombre"]."', '".$_POST["data"]["cargaUnidadDeMedidaDescripcion"]."', 
            '".$_POST["data"]["cargaUnidadDeMedidaFechaDeCreacion"]."', '$creador');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `carga_unidad_de_medida` SET 
            `cargaUnidadDeMedidaNombre` = '".$_POST["data"]["cargaUnidadDeMedidaNombre"]."', 
            `cargaUnidadDeMedidaDescripcion` = '".$_POST["data"]["cargaUnidadDeMedidaDescripcion"]."'
            WHERE `carga_unidad_de_medida`.`cargaUnidadDeMedidaID` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="DELETE FROM `carga_unidad_de_medida` WHERE `cargaUnidadDeMedidaID` =".$_POST['id'];
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `carga_unidad_de_medida` WHERE `cargaUnidadDeMedidaID`=".$_POST['id'];
            $consulta=$mysqli->query($consulta);
            while ($filas =$consulta->fetch_assoc()) 
            {
                echo json_encode($filas);
                break;
            }
            break;
        default:
            echo false;
            break;
    }
} 
else 
{
    echo false;
}
?>