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
            "INSERT INTO `tractor` 
            (`tractorId`, `usuarioId`, `tractorPlaca`, `tractorEconomico`, 
            `tractorFechaCreacion`, `tractorMarcaId`) VALUES 
            (
            NULL, '".$creador."', '".$_POST["data"]["tractorPlaca"]."', 
            '".$_POST["data"]["tractorEconomico"]."', 
            '".$_POST["data"]["tractorFechaCreacion"]."', 
            '".$_POST["data"]["tractorMarcaId"]."');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `tractor` SET 
            `tractorEconomico` = '".$_POST["data"]["tractorEconomico"]."', 
            `tractorPlaca` = '".$_POST["data"]["tractorPlaca"]."', 
            `tractorMarcaId` = '".$_POST["data"]["tractorMarcaId"]."'
            WHERE `tractor`.`tractorId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="DELETE FROM `empresa_receptora` WHERE `empresa_receptora`.`empresaReceptoraId` =".$_POST['id'];
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `tractor` WHERE `tractorId`=".$_POST['id'];
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