<?php
include "../../coneccion/config.php";
session_start();

$tipoHojaDeViaje=numeroDeRegistrosDeViaje($mysqli,$_GET['id_hojaDeViaje']);
$consulta="DELETE FROM `viaje` WHERE `viaje`.`id_viaje` = ".$_GET["id_viaje"];
$consulta=$mysqli->query($consulta); 
if ($consulta== true) 
{
    //eliminar linea 15
    $consulta=
    "UPDATE 
    `hoja_de_viaje` SET 
    `hojaDeViaje_observaciones` = 'se elimino remolque de viaje', 
    `hojaDeViaje_tipoDeViaje` = '$tipoHojaDeViaje',
    `hojaDeViaje_fechaDeEdicion` = NOW() 
    WHERE `hoja_de_viaje`.`id_hojaDeViaje` = ".$_GET["id_hojaDeViaje"]."; ";
    echo $consulta;
    $consulta=$mysqli->query($consulta);
    if ($consulta== true) 
    {
        header("Location: ../../../vistas/hojaDeViajeArriboEdicion.php?id=".$_GET["id_hojaDeViaje"]);
    }else{
        echo "<h1>error de conexion de base de datos1</h1>";
    }
}
else
{
    echo "<h1>error de conexion de base de datos</h1>";
}
function numeroDeRegistrosDeViaje($mysqli,$id_hojaDeViaje){
        $consulta="SELECT (COUNT(*))-1 AS CANTIDAD FROM `viaje` WHERE viaje.id_hojaDeViaje =$id_hojaDeViaje;";
        $result = $mysqli->query($consulta);
        while ($fila =$result->fetch_assoc()) {
            return $fila["CANTIDAD"];
            break;
        }
    }
?>