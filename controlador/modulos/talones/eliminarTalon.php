<?php
    include "../../coneccion/config.php";
    //echo $_GET["hojaDeViajeID"];
    eliminarHojaDeViaje($con);
    function eliminarHojaDeViaje($con){
        //DELETE FROM `hoja_de_viaje` WHERE `hoja_de_viaje`.`hojaDeViajeID` = 7"
        $consultaContenido= "DELETE FROM `hoja_de_viaje` WHERE `hoja_de_viaje`.`hojaDeViajeID` =".$_GET["hojaDeViajeID"];
        $con->query($consultaContenido);
        print "<script>alert(\"Ha eliminado la hoja d evieja ".$_GET["hojaDeViajeID"].".\");window.location='../../../vistas/talon.php';</script>";
    }
?>