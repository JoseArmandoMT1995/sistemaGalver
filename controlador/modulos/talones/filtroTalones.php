<?php
include "../../coneccion/config.php";

print_r(TalonesDelOperador($con,$_POST['hojaDeViajeTalon1'],$_POST['hojaDeViajeTalon2']));
function TalonesDelOperador($con,$talon1,$talon2)
{
    $consultaContenido= "SELECT * FROM hoja_de_viaje where `hojaDeViajeTalon1`= '$talon1' OR `hojaDeViajeTalon2`= '$talon2'";
    $consulta = $con->query($consultaContenido);
    return TalonesFiltroDelOperador($consulta);
}
function TalonesFiltroDelOperador($consulta){
    $hojaDeViajeTalon1=null;
    $hojaDeViajeTalon2=null;
    while ($r=$consulta->fetch_array()) 
    {

        $hojaDeViajeTalon1=$r["hojaDeViajeTalon1"];
        $hojaDeViajeTalon2=$r["hojaDeViajeTalon2"];
    }
    
    if($hojaDeViajeTalon1!=null || $hojaDeViajeTalon2!=null)
    {
        return "no";
        //usuario incorrecto
    }else{
        return "si";
    }
}
?>