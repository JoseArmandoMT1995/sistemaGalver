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
    function caso1($mysqli,$datos)
    {
        $arribo=    fechaLimite($mysqli,$datos["data"]["arribo"],$datos["data"]["fechaActual"],$datos["id"]);
        $carga=     fechaLimite($mysqli,$datos["data"]["carga" ],$datos["data"]["fechaActual"],$datos["id"]);
        $folio=     folio($mysqli,$datos["data"]["folio"]);
        if ($arribo=== NULL || $carga === NULL || $folio === NULL) 
        {
            return 0;
        }
        else
        {
            $consulta="UPDATE `viaje` SET 
            `viaje_fechaDeArribo` = '$arribo',
            `viaje_fechaDeCarga` = '$carga',
            `viaje_folioDeCarga` =$folio,
            `id_viajeEstado`= 3            
            WHERE `viaje`.`id_viaje` = ".$datos["id"];
            $result = consultaSQL($mysqli,$consulta);
            return $result;
        }
    }
    function fechaLimite($mysqli,$fechaManual,$fechaActual,$id){
        $consulta=
       "SELECT hoja_de_viaje.id_hojaDeViaje,viaje.id_viaje,hoja_de_viaje.hojaDeViaje_fechaDeLiberacion FROM `viaje` 
        INNER JOIN hoja_de_viaje 
        ON hoja_de_viaje.id_hojaDeViaje = viaje.id_hojaDeViaje
        WHERE viaje.id_viaje= $id 
        AND '$fechaManual' >= hoja_de_viaje.hojaDeViaje_fechaDeLiberacion
        AND '$fechaManual' <= '$fechaActual';";

        $result = consultaSQL($mysqli,$consulta);
        if ($result->num_rows == 0 ) 
        {
            return $fechaManual;
        }
        else{
            return NULL;
        }
    }
    function folio($mysqli,$folio){
        $consulta= "SELECT * FROM `viaje` WHERE `viaje_folioDeCarga` = $folio";
        $result = consultaSQL($mysqli,$consulta);
        if ($result->num_rows == 0 ) 
        {
            return $folio;
        }
        else
        {
            return NULL;
        }      
    }
    function consultaSQL($mysqli,$consulta)
    {
        $result = $mysqli->query($consulta);
        return $result;
    }

?>