<?php
include "../../coneccion/config.php";
session_start();
$creador= $_SESSION['usuarioId'];
if (isset($_POST)) 
{
    switch ($_POST["tipo"]) 
    {
        case '1':
            if ($_POST["arriboOrigenDeCarga_id"]!="")
            {
                $consulta=
                "UPDATE `arribo_origen_de_carga` SET 
                `arriboOrigenDeCarga_fechaArribo` = '".$_POST["data"]["arriboOrigenDeCarga_fechaArribo"]."', 
                `arriboOrigenDeCarga_fechaEdicion` = NOW(),
                `editor` = ".$_SESSION['usuarioId']."
                WHERE `arribo_origen_de_carga`.`arriboOrigenDeCarga_id` = ".$_POST["arriboOrigenDeCarga_id"]."; ";
                $result=$mysqli->query($consulta);
                if ($result== true) {
                    $consulta=
                    "INSERT INTO `arribo_origen_de_carga` 
                    (`arriboOrigenDeCarga_id`, `arriboOrigenDeCarga_fechaArribo`, 
                    `arriboOrigenDeCarga_origenCarga`, `arriboOrigenDeCarga_causaDeCambio`, 
                    `id_viaje`, `creador`,
                    `editor`, `arriboOrigenDeCarga_fechaEdicion`, 
                    `arriboOrigenDeCarga_fechaCreacion`) 
                    VALUES 
                    (
                    NULL,
                    '0000-00-00 00:00:00', 
                    '".$_POST["data"]["arriboOrigenDeCarga_origenCarga"]."', 
                    '".$_POST["data"]["arriboOrigenDeCarga_causaDeCambio"]."', 
                    '".$_POST["data"]["id_viaje"]."', 
                    ".$_SESSION['usuarioId'].", 
                    ".$_SESSION['usuarioId'].",
                    '0000-00-00 00:00:00', 
                    NOW()
                    )";
                    echo $mysqli->query($consulta);
                }
                else
                {
                    echo 0;
                }
            }
            else
            {
                $consulta=
                    "INSERT INTO `arribo_origen_de_carga` 
                    (`arriboOrigenDeCarga_id`, `arriboOrigenDeCarga_fechaArribo`, 
                    `arriboOrigenDeCarga_origenCarga`, `arriboOrigenDeCarga_causaDeCambio`, 
                    `id_viaje`, `creador`,
                    `editor`, `arriboOrigenDeCarga_fechaEdicion`, 
                    `arriboOrigenDeCarga_fechaCreacion`) 
                    VALUES 
                    (
                    NULL,
                    '0000-00-00 00:00:00', 
                    '".$_POST["data"]["arriboOrigenDeCarga_origenCarga"]."', 
                    '".$_POST["data"]["arriboOrigenDeCarga_causaDeCambio"]."', 
                    '".$_POST["data"]["id_viaje"]."', 
                    ".$_SESSION['usuarioId'].", 
                    ".$_SESSION['usuarioId'].",
                    '0000-00-00 00:00:00', 
                    NOW()
                    )";
                    echo $mysqli->query($consulta);
            }
        break;
        case '2':
            $consulta="UPDATE `arribo_destinos` SET 
            `editor` = '".$_SESSION['usuarioId']."', 
            `arriboDestino_destino` = '".$_POST["data"]["arriboDestino_destino"]."', 
            `arriboDestino_causaDeCambio` = '".$_POST["data"]["arriboDestino_causaDeCambio"]."',
            `arriboDestino_fechaEdicion` = NOW()
            WHERE `arribo_destinos`.`arriboDestino_id` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="DELETE FROM `arribo_destinos` WHERE `arriboDestino_id` =".$_POST['id'];
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `arribo_destinos` WHERE `arriboDestino_id`=".$_POST['id'];
            $consulta=$mysqli->query($consulta);
            while ($filas =$consulta->fetch_assoc()) 
            {
                echo json_encode($filas);
                break;
            }
            break;
        case '5':
            echo json_encode(checarArriboAlta($mysqli,$_POST["id"]));
            break;
        case '6':
            echo json_encode(generarTableRecarga($mysqli,$_POST["id"]));
            break;
        default:
            echo false;
            break;
    }
} else {
    echo false;
}
function generarTableRecarga($mysqli,$id)
{
    $consulta="SELECT * FROM `arribo_origen_de_carga` INNER JOIN destino ON destino.destino_id= arribo_origen_de_carga.arriboOrigenDeCarga_origenCarga WHERE id_viaje =$id";
    $result=$mysqli->query($consulta);
    $array=[];
    while ($filas =$result->fetch_assoc()) 
    {   
        $array[]=$filas;
    }
    return $array;
}
function checarArriboAlta($mysqli,$id)
{
    if ($_POST["arribo_origen_de_carga"]["arriboOrigenDeCarga_id"]!="")
    {
        $consulta=
                "UPDATE `arribo_origen_de_carga` SET 
                `arriboOrigenDeCarga_fechaArribo` = '".$_POST["arribo_origen_de_carga"]["arriboOrigenDeCarga_fechaArribo"]."', 
                `arriboOrigenDeCarga_fechaEdicion` = NOW(),
                `editor` = ".$_SESSION['usuarioId']."
                WHERE `arribo_origen_de_carga`.`arriboOrigenDeCarga_id` = ".$_POST["arribo_origen_de_carga"]["arriboOrigenDeCarga_id"]."; ";
        $result=$mysqli->query($consulta);
        if ($result== true) 
        {
            $consulta=
            "SELECT MAX(`arriboOrigenDeCarga_id`)AS NUM_ARRIVO_MAX FROM 
            `arribo_origen_de_carga` WHERE `id_viaje`=$id LIMIT 1 "; 
            $retorno=existenciaArray($mysqli,$consulta);
            if($retorno == NULL)
            {
                return false;
            }
            else
            {
                $consulta=
                "UPDATE viaje SET 
                id_viajeEstado=2,
                viaje_fechaDeArribo = (SELECT arriboOrigenDeCarga_fechaArribo FROM arribo_origen_de_carga WHERE arriboOrigenDeCarga_id=$retorno LIMIT 1), 
                viaje_origen = (SELECT arriboOrigenDeCarga_origenCarga FROM arribo_origen_de_carga WHERE arriboOrigenDeCarga_id=$retorno LIMIT 1 )
                WHERE id_viaje = $id";
                return $mysqli->query($consulta);
            }
        }
    }
    else
    {
        return false;  
    }
}
function existenciaArray($mysqli,$consulta)
{
    $consulta=$mysqli->query($consulta);
    while ($filas =$consulta->fetch_assoc()) 
    {
        return $filas["NUM_ARRIVO_MAX"];
        break;
    }
}
?>