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
            "INSERT INTO `carga` 
            (`cargaId`, `cargaNombre`, `cargaDescripcion`, `cargaFecaCreacion`, 
            `usuarioId`) VALUES 
            (NULL, '".$_POST["data"]["cargaNombre"]."', '".$_POST["data"]["cargaDescripcion"]."', 
            '".$_POST["data"]["cargaFecaCreacion"]."', '$creador');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `carga` SET 
            `cargaNombre` = '".$_POST["data"]["cargaNombre"]."', 
            `cargaDescripcion` = '".$_POST["data"]["cargaDescripcion"]."'
            WHERE `carga`.`cargaId` = ".$_POST['id']; 
            //echo $consulta;
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="DELETE FROM `carga` WHERE `carga`.`cargaId` =".$_POST['id'];
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `carga` WHERE `cargaId`=".$_POST['id'];
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