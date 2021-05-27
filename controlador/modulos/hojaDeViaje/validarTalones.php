<?php
include "../../coneccion/config.php";

function muestraOperador($mysqli,$talon)
    {
        $result = $mysqli->query(
            "SELECT * FROM `hoja_de_viaje` WHERE 
            `hojaDeViajeTalon1A`='$talon' OR 
            `hojaDeViajeTalon2A`='$talon' OR 
            `hojaDeViajeTalon1B`='$talon' OR 
            `hojaDeViajeTalon2B`='$talon' ");
            if ($result->num_rows == 0) {
                return 0;
            }
            else{
                return 1;
            }
        
    }
echo (muestraOperador($mysqli,$_POST["talon"]));

/* 
$talon1= $data["hojaDeViaje"]["hojaDeViajeTalon1"];
        $talon2= $data["hojaDeViaje"]["hojaDeViajeTalon2"];
        $result = $mysqli->query("SELECT * FROM hoja_de_viaje where `hojaDeViajeTalon1`= '$talon1' OR `hojaDeViajeTalon2`= '$talon2'"); 
        //echo "numero de filas = ".$result->num_rows."<br>";
        
        
        session_start();
        if ($result->num_rows == 0 && $remolque != null) 
*/
?>