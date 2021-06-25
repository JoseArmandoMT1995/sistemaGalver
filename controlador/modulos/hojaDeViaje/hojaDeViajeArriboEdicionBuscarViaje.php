<?php
    include "../../coneccion/config.php";
    $consulta="SELECT * FROM `viaje` WHERE `id_viaje`=".$_POST["id_viaje"];
    $result = $mysqli->query($consulta);
    while ($fila =$result->fetch_assoc()) {
        $consulta= $fila;
        break;
    }
    echo json_encode($consulta);
?>