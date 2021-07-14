<?php
include "../../coneccion/config.php";
session_start();
$creador= $_SESSION['usuarioId'];
if (isset($_POST)) {
    switch ($_POST["tipo"]) 
    {
        case '1':
            $consulta=
            "INSERT INTO `tractor_marca` 
            (`tractorMarcaId`, `tractorMarcaNombre`, `tractorMarcaCreacion`, `usuarioId`) VALUES 
            (NULL, '".$_POST["data"]["tractorMarcaNombre"]."', '".$_POST["data"]["tractorMarcaCreacion"]."', '".$creador."');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `tractor_marca` SET 
            `tractorMarcaNombre` = '".$_POST["data"]["tractorMarcaNombre"]."'
            WHERE `tractor_marca`.`tractorMarcaId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="DELETE FROM `tractor_marca` WHERE `tractor_marca`.`tractorMarcaId` =".$_POST['id'];
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `tractor_marca` WHERE `tractorMarcaId`=".$_POST['id'];
            $consulta=$mysqli->query($consulta);
            //echo json_encode($arreglo);
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