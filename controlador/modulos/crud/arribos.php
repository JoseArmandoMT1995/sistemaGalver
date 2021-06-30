<?php
include "../../coneccion/config.php";
session_start();
$creador= $_SESSION['usuarioId'];
if (isset($_POST)) {
    switch ($_POST["tipo"]) {
        case '1':
            $consulta=
            "INSERT INTO `arribo_destinos` 
            (`arriboDestino_id`, `arriboDestino_fecha`, `arriboDestino_destino`, `arriboDestino_causaDeCambio`, 
            `id_viaje`, `creador`, `editor`) 
            VALUES 
            (NULL, 
            NOW(), 
            '".$_POST["data"]["arriboDestino_destino"]."', 
            '".$_POST["data"]["arriboDestino_causaDeCambio"]."', 
            '".$_POST["data"]["id_viaje"]."', 
            ".$_SESSION['usuarioId'].", 
            ".$_SESSION['usuarioId'].")";
            echo $mysqli->query($consulta);
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
            while ($filas =$consulta->fetch_assoc()) {
                echo json_encode($filas);
                break;
            }
            break;
        case '5':
            echo json_encode(checarArriboAlta($mysqli,$_POST["id"]));
            break;
        default:
            echo false;
            break;
    }
} else {
    echo false;
}
function checarArriboAlta($mysqli,$id){
    $consulta="SELECT MAX(`arriboDestino_id`)AS NUM_ARRIVO_MAX FROM `arribo_destinos` WHERE `id_viaje`=$id LIMIT 1;";
    echo $consulta;
    echo "<hr>";
    
    $retorno=existenciaArray($mysqli,$consulta);
    print_r($retorno);
    echo "<hr>";
    
    
    if($retorno == NULL){
        return false;
    }else{
        $consulta="UPDATE viaje SET 
        id_viajeEstado=2,
        viaje_fechaDeArribo = (SELECT arriboDestino_fecha FROM arribo_destinos WHERE arriboDestino_id=$retorno LIMIT 1), 
        viaje_origen = (SELECT arriboDestino_destino FROM arribo_destinos WHERE arriboDestino_id=$retorno LIMIT 1)
        WHERE id_viaje = 43";
        echo $consulta;
    }
    //
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
function modificacionHDVArribo($mysqli,$consulta){

}
?>