<?php
include "../../coneccion/config.php";
session_start();
print_r($_GET);
$consulta="DELETE FROM `viaje` WHERE `viaje`.`id_viaje` = ".$_GET["id_viaje"];
$consulta=$mysqli->query($consulta); 
if ($consulta== true) 
{
    $consulta=
    "UPDATE 
    `hoja_de_viaje` SET 
    `hojaDeViaje_observaciones` = 'se elimino remolque de viaje' 
    `hojaDeViaje_fechaDeEdicion` = NOW() 
    WHERE `hoja_de_viaje`.`id_hojaDeViaje` = ".$_GET["id_hojaDeViaje"]."; ";
    $consulta=$mysqli->query($consulta);
    if ($consulta== true) 
    {
        header("Location: ../../../vistas/hojaDeViajeArriboEdicion.php?id=".$_GET["id_hojaDeViaje"]);
    }else{
        echo "<h1>error de conexion de base de datos</h1>";
    }
}
else
{
    echo "<h1>error de conexion de base de datos</h1>";
}
?>