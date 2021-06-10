<?php
    include "../../coneccion/config.php";
    if ($_POST['id']) {
        switch ($_POST['caso']) {
            case '1':
                print_r(caso1($mysqli,$_POST));
                break;
            case '3':
                print_r(caso3($mysqli));
                break;
            
            default:
                echo "sin casos encontrados";
                break;
        }
    }else{
        echo "sin datos";
    }
    function caso3($mysqli)
    {
        $consulta="SELECT MAX(viaje_folioDeCarga)+1 AS folio FROM viaje";
        while ($fila = $mysqli->query($consulta)->fetch_assoc()) 
        {
            return $fila['folio'];
            break;
        }
    }
    function caso1($mysqli,$datos){
        $arribo=    fechaLimite($mysqli,$datos["data"]["arribo"],$datos["data"]["fechaActual"]);
        $carga=     fechaLimite($mysqli,$datos["data"]["carga" ],$datos["data"]["fechaActual"]);
        //$folio=false;
        //print_r($datos);

    }
    function fechaLimite($mysqli,$fechaManual,$fechaActual){
        $consulta=
        "SELECT 
        hoja_de_viaje.id_hojaDeViaje,viaje.id_viaje,hoja_de_viaje.hojaDeViaje_fechaDeLiberacion 
        FROM `viaje` 
        INNER JOIN hoja_de_viaje 
        ON hoja_de_viaje.id_hojaDeViaje = viaje.id_hojaDeViaje
        WHERE 
        viaje.id_viaje= 15
        AND
        '$fechaManual' >= hoja_de_viaje.hojaDeViaje_fechaDeLiberacion
        AND
        '$fechaManual' <= '$fechaActual';";
        print_r($consulta);
        /* 
        */
    }
    function folio($mysqli,$datos){

    }

?>