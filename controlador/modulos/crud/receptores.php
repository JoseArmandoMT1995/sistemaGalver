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
            "INSERT INTO `empresa_receptora` 
            (`empresaReceptoraId`, `usuarioId`, `empresaReceptoraNombre`, `empresaReceptoraRFC`, 
            `empresaReceptoraDireccion`, `empresaReceptoraTelefonoFijo1`, `empresaReceptoraTelefonoFijo2`, 
            `empresaReceptoraTelefonoCelular1`, `empresaReceptoraTelefonoCelular2`, `empresaReceptoraCorreo`, 
            `empresaReceptoraFechaDeCreacion`, `empresaReceptoraDescripcion`, `empresaReceptoraCP`) VALUES 
            (
            NULL, '".$creador."', '".$_POST["data"]["empresaReceptoraNombre"]."', 
            '".$_POST["data"]["empresaReceptoraRFC"]."', 
            '".$_POST["data"]["empresaReceptoraDireccion"]."', 
            '".$_POST["data"]["empresaReceptoraTelefonoFijo1"]."', '".$_POST["data"]["empresaReceptoraTelefonoFijo2"]."',
            '".$_POST["data"]["empresaReceptoraTelefonoCelular1"]."', '".$_POST["data"]["empresaReceptoraTelefonoCelular2"]."',
            '".$_POST["data"]["empresaReceptoraCorreo"]."', '".$_POST["data"]["empresaReceptoraFechaDeCreacion"]."', 
            '', '".$_POST["data"]["empresaReceptoraCP"]."');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `empresa_receptora` SET 
            `empresaReceptoraNombre` = '".$_POST["data"]["empresaReceptoraNombre"]."', 
            `empresaReceptoraRFC` = '".$_POST["data"]["empresaReceptoraRFC"]."', 
            `empresaReceptoraTelefonoFijo1` = '".$_POST["data"]["empresaReceptoraTelefonoFijo1"]."', 
            `empresaReceptoraTelefonoFijo2` = '".$_POST["data"]["empresaReceptoraTelefonoFijo2"]."', 
            `empresaReceptoraTelefonoCelular1` = '".$_POST["data"]["empresaReceptoraTelefonoCelular1"]."', 
            `empresaReceptoraTelefonoCelular2` = '".$_POST["data"]["empresaReceptoraTelefonoCelular2"]."', 
            `empresaReceptoraCorreo` = '".$_POST["data"]["empresaReceptoraCorreo"]."', 
            `empresaReceptoraCP` = '".$_POST["data"]["empresaReceptoraCP"]."', 
            `empresaReceptoraDireccion` = '".$_POST["data"]["empresaReceptoraDireccion"]."'
            WHERE `empresa_receptora`.`empresaReceptoraId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="DELETE FROM `empresa_receptora` WHERE `empresa_receptora`.`empresaReceptoraId` =".$_POST['id'];
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `empresa_receptora` WHERE `empresaReceptoraId`=".$_POST['id'];
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