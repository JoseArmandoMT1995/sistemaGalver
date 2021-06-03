<?php
include "../../coneccion/config.php";
session_start();
$creador= $_SESSION['usuarioId'];
if (isset($_POST)) {
    switch ($_POST["tipo"]) {
        case '1':
            $consulta=
            "INSERT INTO `remolque_carga` 
            (`remolqueCargaId`, `remolqueCargaServicio`, `remolqueCargaImpuesto`, `remolqueCargaFechaCreacion`,`usuarioId`) VALUES 
            (NULL,
            '".$_POST["data"]["remolqueCargaServicio"]."', 
            '".$_POST["data"]["remolqueCargaImpuesto"]."', 
            '".$_POST["data"]["remolqueCargaFechaCreacion"]."', 
            '$creador');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `remolque_carga` SET 
            `remolqueCargaServicio` = '".$_POST["data"]["remolqueCargaServicio"]."', 
            `remolqueCargaImpuesto` = '".$_POST["data"]["remolqueCargaImpuesto"]."'
            WHERE `remolque_carga`.`remolqueCargaId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="DELETE FROM `remolque_carga` WHERE `remolque_carga`.`remolqueCargaId` =".$_POST['id'];
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `remolque_carga` WHERE `remolqueCargaId`=".$_POST['id'];
            $consulta=$mysqli->query($consulta);
            while ($filas =$consulta->fetch_assoc()) {
                echo json_encode($filas);
                break;
            }
            break;
        default:
            echo false;
            break;
    }
} else {
    echo false;
}

?>