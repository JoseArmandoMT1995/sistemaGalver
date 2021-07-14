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
            "INSERT INTO `empresa_emisora` 
            (`empresaEmisoraId`, `usuarioId`, `empresaEmisoraNombre`, `empresaEmisoraRFC`, 
            `empresaEmisoraDireccion`, `empresaEmisoraTelefonoFijo1`, `empresaEmisoraTelefonoFijo2`, 
            `empresaEmisoraTelefonoCelular1`, `empresaEmisoraTelefonoCelular2`, `empresaEmisoraCorreo`, 
            `empresaEmisoraFechaDeCreacion`, `empresaEmisoraDescripcion`, `empresaEmisoraCP`) VALUES 
            (
            NULL, '".$creador."', '".$_POST["data"]["empresaEmisoraNombre"]."', 
            '".$_POST["data"]["empresaEmisoraRFC"]."', 
            '".$_POST["data"]["empresaEmisoraDireccion"]."', 
            '".$_POST["data"]["empresaEmisoraTelefonoFijo1"]."', '".$_POST["data"]["empresaEmisoraTelefonoFijo2"]."',
            '".$_POST["data"]["empresaEmisoraTelefonoCelular1"]."', '".$_POST["data"]["empresaEmisoraTelefonoCelular2"]."',
            '".$_POST["data"]["empresaEmisoraCorreo"]."', '".$_POST["data"]["empresaEmisoraFechaDeCreacion"]."', 
            '', '".$_POST["data"]["empresaEmisoraCP"]."');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `empresa_emisora` SET 
            `empresaEmisoraNombre` = '".$_POST["data"]["empresaEmisoraNombre"]."', 
            `empresaEmisoraRFC` = '".$_POST["data"]["empresaEmisoraRFC"]."', 
            `empresaEmisoraTelefonoFijo1` = '".$_POST["data"]["empresaEmisoraTelefonoFijo1"]."', 
            `empresaEmisoraTelefonoFijo2` = '".$_POST["data"]["empresaEmisoraTelefonoFijo2"]."', 
            `empresaEmisoraTelefonoCelular1` = '".$_POST["data"]["empresaEmisoraTelefonoCelular1"]."', 
            `empresaEmisoraTelefonoCelular2` = '".$_POST["data"]["empresaEmisoraTelefonoCelular2"]."', 
            `empresaEmisoraCorreo` = '".$_POST["data"]["empresaEmisoraCorreo"]."', 
            `empresaEmisoraCP` = '".$_POST["data"]["empresaEmisoraCP"]."', 
            `empresaEmisoraDireccion` = '".$_POST["data"]["empresaEmisoraDireccion"]."'
            WHERE `empresa_emisora`.`empresaEmisoraId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="DELETE FROM `empresa_emisora` WHERE `empresa_emisora`.`empresaEmisoraId` =".$_POST['id'];
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `empresa_emisora` WHERE `empresaEmisoraId`=".$_POST['id'];
            $consulta=$mysqli->query($consulta);
            //echo json_encode($arreglo);
            while ($filas =$consulta->fetch_assoc()) {
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