<?php
    session_start();
    include "../../coneccion/config.php";
    $consulta="DELETE FROM `viaje` WHERE `viaje`.`id_viaje` = ".$_GET["id_viaje"];
    echo $consulta;
    $consulta=$mysqli->query($consulta); 
    if ($consulta== true) 
    {
        $consulta=
        "UPDATE `hoja_de_viaje` SET 
        `hojaDeViaje_observaciones` = 'Cancelacion de hoja de viaje', 
        `hojaDeViaje_estadoDeViaje` = '3',
        `hojaDeViaje_fechaDeEdicion` = NOW() 
        WHERE `id_hojaDeViaje` = ".$_GET["id_hojaDeViaje"]."; ";
        //echo $consulta;
        $consulta=$mysqli->query($consulta);
        if ($consulta== true) 
        {
            header("Location: ../../../vistas/HDV_Cancelaciones.php");
        }
        else
        {
            echo "<h1>error de conexion de base de datos1</h1>";
        }
    }
    else
    {
        echo "<h1>error de conexion de base de datos</h1>";
    }
?>