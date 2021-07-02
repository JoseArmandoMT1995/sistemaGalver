<?php
include "../../coneccion/config.php";
session_start();
$creador= $_SESSION['usuarioId'];
if (isset($_POST)) {
    switch ($_POST["tipo"]) {
        case '1':
            $consulta=
            "INSERT INTO `remolque` 
            (`remolqueID`, `remolquePlaca`, `remolqueEconomico`, `remolqueFechaCreacion`, 
            `usuarioId`) VALUES 
            (NULL, '".$_POST["data"]["remolquePlaca"]."', '".$_POST["data"]["remolqueEconomico"]."', 
            '".$_POST["data"]["remolqueFechaCreacion"]."', '$creador');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `remolque` SET 
            `remolquePlaca` = '".$_POST["data"]["remolquePlaca"]."', 
            `remolqueEconomico` = '".$_POST["data"]["remolqueEconomico"]."'
            WHERE `remolque`.`remolqueID` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="DELETE FROM `remolque` WHERE `remolque`.`remolqueID` =".$_POST['id'];
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `remolque` WHERE `remolqueID`=".$_POST['id'];
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