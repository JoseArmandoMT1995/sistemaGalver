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
            "INSERT INTO `operadores` 
            (`operadorID`, `operadorNombre`, 
            `operadorLisencia`, `operadorFechaCreacion`, 
            `operadorRFC`, `usuarioId`) VALUES 
            (
            NULL, '".$_POST["data"]["operadorNombre"]."', 
            '".$_POST["data"]["operadorLisencia"]."', '".$_POST["data"]["operadorFechaCreacion"]."', 
            '".$_POST["data"]["operadorRFC"]."', '".$creador."');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `operadores` SET 
            `operadorNombre` = '".$_POST["data"]["operadorNombre"]."', 
            `operadorLisencia` = '".$_POST["data"]["operadorLisencia"]."', 
            `operadorRFC` = '".$_POST["data"]["operadorRFC"]."'
            WHERE `operadorID` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="DELETE FROM `operadores` WHERE `operadores`.`operadorID` =".$_POST['id'];
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `operadores` WHERE `operadorID`=".$_POST['id'];
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