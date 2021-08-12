<?php
include "../../coneccion/config.php";
session_start();
$creador= $_SESSION['usuarioId'];
if (isset($_POST)) 
{
    switch ($_POST["tipo"]) 
    {
        case '1':
            if ($_POST["descargaOrigenDeCarga_id"] != "")
            {
                $consulta=
                "UPDATE `descarga_origen_de_carga` SET 
                `descargaOrigenDeCarga_fechaDescargaLlegada` = '".$_POST["data"]["descargaOrigenDeCarga_fechaDescargaLlegada"]."', 
                `descargaOrigenDeCarga_fechaDescarga` = '".$_POST["data"]["descargaOrigenDeCarga_fechaDescarga"]."', 
                `descargaOrigenDeCarga_fechaEdicion` = NOW(), `editor` = 1 
                WHERE `descarga_origen_de_carga`.`descargaOrigenDeCarga_id` = "
                .$_POST["descargaOrigenDeCarga_id"]."; ";                
                $result=$mysqli->query($consulta);
                if ($result== true) 
                {
                    $consulta=
                    "INSERT INTO `descarga_origen_de_carga` 
                    (`descargaOrigenDeCarga_id`, `descargaOrigenDeCarga_fechaDescarga`, `descargaOrigenDeCarga_origenCarga`, 
                    `descargaOrigenDeCarga_causaDeCambio`, `id_viaje`, `creador`, `editor`, 
                    `descargaOrigenDeCarga_fechaEdicion`, `descargaOrigenDeCarga_fechaCreacion`, 
                    `descargaOrigenDeCarga_estado`) 
                    VALUES 
                    (
                    NULL,
                    '0000-00-00 00:00:00', 
                    '".$_POST["data"]["descargaOrigenDeCarga_origenCarga"]."', 
                    '".$_POST["data"]["descargaOrigenDeCarga_causaDeCambio"]."', 
                    '".$_POST["data"]["id_viaje"]."', 
                    ".$_SESSION['usuarioId'].", 
                    ".$_SESSION['usuarioId'].",
                    '0000-00-00 00:00:00', 
                    NOW(),'".$_POST["data"]["descargaOrigenDeCarga_estado"]."'
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
                "INSERT INTO `descarga_origen_de_carga` 
                (`descargaOrigenDeCarga_id`, `descargaOrigenDeCarga_fechaDescarga`, `descargaOrigenDeCarga_origenCarga`, 
                `descargaOrigenDeCarga_causaDeCambio`, `id_viaje`, `creador`, `editor`, 
                `descargaOrigenDeCarga_fechaEdicion`, `descargaOrigenDeCarga_fechaCreacion`, 
                `descargaOrigenDeCarga_estado`) 
                VALUES 
                (
                    NULL,
                    '0000-00-00 00:00:00', 
                    '".$_POST["data"]["descargaOrigenDeCarga_origenCarga"]."', 
                    '".$_POST["data"]["descargaOrigenDeCarga_causaDeCambio"]."', 
                    '".$_POST["data"]["id_viaje"]."', 
                    ".$_SESSION['usuarioId'].", 
                    ".$_SESSION['usuarioId'].",
                    '0000-00-00 00:00:00', 
                    NOW(), 
                    '".$_POST["data"]["descargaOrigenDeCarga_estado"]."'
                )";
                echo $mysqli->query($consulta);
            }
            break;
        case '2':
            $consulta="UPDATE `descarga_destinos` SET 
            `editor` = '".$_SESSION['usuarioId']."', 
            `descargaDestino_destino` = '".$_POST["data"]["descargaDestino_destino"]."', 
            `descargaDestino_causaDeCambio` = '".$_POST["data"]["descargaDestino_causaDeCambio"]."',
            `descargaDestino_fechaEdicion` = NOW()
            WHERE `descarga_destinos`.`descargaDestino_id` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="DELETE FROM `descarga_destinos` WHERE `descargaDestino_id` =".$_POST['id'];
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `descarga_destinos` WHERE `descargaDestino_id`=".$_POST['id'];
            $consulta=$mysqli->query($consulta);
            while ($filas =$consulta->fetch_assoc()) 
            {
                echo json_encode($filas);
                break;
            }
            break;
        case '5':
            echo json_encode(checarDescargaAlta($mysqli,$_POST["id"],$_POST["desvio"]));
            break;
        case '6':
            echo json_encode(generarTableRecarga($mysqli,$_POST["id"]));
            break;
        case '7':
            $consulta=
            "UPDATE `descarga_origen_de_carga` SET 
            `editor` = '".$_SESSION['usuarioId']."', 
            `descargaOrigenDeCarga_fechaDescargaLlegada` = '".$_POST["data"]["descargaOrigenDeCarga_fechaDescargaLlegada"]."', 
            `descargaOrigenDeCarga_fechaDescarga` = '".$_POST["data"]["descargaOrigenDeCarga_fechaDescarga"]."',
            `descargaOrigenDeCarga_fechaEdicion` = NOW()
            WHERE `descarga_origen_de_carga`.`descargaOrigenDeCarga_id` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
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

    $consulta=
    "SELECT * FROM `descarga_origen_de_carga` INNER JOIN destino ON destino.destino_id= descarga_origen_de_carga.descargaOrigenDeCarga_origenCarga INNER JOIN hoja_de_viaje_estado ON hoja_de_viaje_estado.hdve_id= descarga_origen_de_carga.descargaOrigenDeCarga_estado WHERE id_viaje =$id";
    $result=$mysqli->query($consulta);
    $array=[];
    while ($filas =$result->fetch_assoc()) 
    {   
        $array[]=$filas;
    }
    return $array;
}
function checarDescargaAlta($mysqli,$id,$checarDescargaAlta)
{
    if ($checarDescargaAlta == 1 ||$checarDescargaAlta == "1" ) 
    {
        if ($_POST["descarga_origen_de_carga"]["descargaOrigenDeCarga_id"]!="")
        {
            $consulta=
            "UPDATE `descarga_origen_de_carga` SET 
            `descargaOrigenDeCarga_fechaDescarga` = '".$_POST["descarga_origen_de_carga"]["descargaOrigenDeCarga_fechaDescarga"]."', 
            `descargaOrigenDeCarga_fechaDescargaLlegada` = '".$_POST["descarga_origen_de_carga"]["descargaOrigenDeCarga_fechaDescargaLlegada"]."', 
            `descargaOrigenDeCarga_fechaEdicion` = NOW(),
            `editor` = ".$_SESSION['usuarioId']."
            WHERE `descarga_origen_de_carga`.`descargaOrigenDeCarga_id` = ".$_POST["descarga_origen_de_carga"]["descargaOrigenDeCarga_id"]."; ";
            $result=$mysqli->query($consulta);
            if ($result== true) 
            {
                $consulta=
                "SELECT MAX(`descargaOrigenDeCarga_id`)
                AS NUM_ARRIVO_MAX FROM 
                `descarga_origen_de_carga` WHERE `id_viaje`=$id LIMIT 1 "; 
                $retorno=existenciaArray($mysqli,$consulta);
                if($retorno == NULL)
                {
                    return false;
                }
                else
                {
                    $consulta=
                    "UPDATE viaje SET 
                    id_viajeEstado=4,
                    viaje_fechaDeDescarga = (SELECT descargaOrigenDeCarga_fechaDescarga FROM descarga_origen_de_carga WHERE descargaOrigenDeCarga_id=$retorno LIMIT 1), 
                    viaje_destino = (SELECT descargaOrigenDeCarga_origenCarga FROM descarga_origen_de_carga WHERE descargaOrigenDeCarga_id=$retorno LIMIT 1 )
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
    else
    {
        return 'desvio';  
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