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

?>