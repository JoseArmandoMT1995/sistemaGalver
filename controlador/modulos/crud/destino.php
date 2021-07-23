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
            "INSERT INTO `destino` 
            (`destino_id`, `destino_nombre`, `destino_direccion`, `destino_telefono1`, 
            `destino_telefono2`,`destino_correo`,`destino_creacion`,`destino_creador`) VALUES 
            (NULL, 
            '".$_POST["data"]["destino_nombre"]."', 
            '".$_POST["data"]["destino_direccion"]."', 
            '".$_POST["data"]["destino_telefono1"]."', 
            '".$_POST["data"]["destino_telefono2"]."', 
            '".$_POST["data"]["destino_correo"]."', 
            'NOW()', 
            '$creador');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `destino` SET 
            `destino_nombre` = '".$_POST["data"]["destino_nombre"]."', 
            `destino_direccion` = '".$_POST["data"]["destino_direccion"]."',
            `destino_telefono1` = '".$_POST["data"]["destino_telefono1"]."', 
            `destino_telefono2` = '".$_POST["data"]["destino_telefono2"]."',
            `destino_correo` = '".$_POST["data"]["destino_correo"]."'
            WHERE `destino_id` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="DELETE FROM `destino` WHERE `destino_id` =".$_POST['id'];
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `destino` WHERE `destino_id`=".$_POST['id'];
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