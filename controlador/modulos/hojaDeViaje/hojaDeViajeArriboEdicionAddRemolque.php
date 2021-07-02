<?php
include "../../coneccion/config.php";
session_start();
$tipoHojaDeViaje=numeroDeRegistrosDeViaje($mysqli,$_POST['id_hojaDeViaje']);
    echo json_encode(array(
        "hojaDeViaje"=>hoja_de_viaje($_POST,$mysqli,$tipoHojaDeViaje),
        "tractor_del_operador"=>tractor_del_operador($_POST,$mysqli),
        "viajes"=>agregarRemolque($_POST,$mysqli)
    ));
    function numeroDeRegistrosDeViaje($mysqli,$id_hojaDeViaje){
        $consulta="SELECT (COUNT(*))+1 AS CANTIDAD FROM `viaje` WHERE viaje.id_hojaDeViaje =$id_hojaDeViaje;";
        $result = $mysqli->query($consulta);
        while ($fila =$result->fetch_assoc()) {
            return $fila["CANTIDAD"];
            break;
        }
    }
    function hoja_de_viaje($data,$mysqli,$hojaDeViaje_tipoDeViaje)
    {
        $consulta=
        "UPDATE `hoja_de_viaje` 
        SET 
        `id_editor` = ".$_SESSION['usuarioId'].",
        `hojaDeViaje_observaciones` = '".$data['hojaDeViaje_observaciones']."',
        `hojaDeViaje_fechaDeEdicion` = NOW()
        WHERE `hoja_de_viaje`.`id_hojaDeViaje` = ".$data['id_hojaDeViaje'].";";
        return $mysqli->query($consulta);
    }
    function tractor_del_operador($data,$mysqli)
    {
        $edicionData="";
        $tractor_del_operador ="";
        $id_operador="";
            if(
            $data["tractor_del_operador"]["id_tractor"]!= 0 ||
            $data["tractor_del_operador"]["id_tractor"]!= "0"
            ) 
            {
                $tractor_del_operador="`id_tractor` = ".$data["tractor_del_operador"]["id_tractor"];
            }
            if (
            $data["tractor_del_operador"]["id_operador"]!= 0 ||
            $data["tractor_del_operador"]["id_operador"]!= "0"
            ) 
            {
                    $id_operador="`id_operador` = ".$data["tractor_del_operador"]["id_operador"];
            }
            if ($tractor_del_operador != "" && $id_operador == "") {
                $edicionData=$tractor_del_operador;
            }
            if ($tractor_del_operador == "" && $id_operador != "") {
                $edicionData=$id_operador;
            }            
            if ($tractor_del_operador != "" && $id_operador != "") {
                $edicionData=$tractor_del_operador.",".$id_operador;
            }
            if ($tractor_del_operador == "" && $id_operador == "") {
                $edicionData="";
            }
            if ($edicionData=="") {
                return false;
            }
            if ($edicionData != "") {
                $consulta=
                "UPDATE `tractor_del_operador` 
                SET 
                $edicionData
                WHERE `id_hojaDeViaje` = ".$data['id_hojaDeViaje'].";";
                return $mysqli->query($consulta);              
            }
            else{
                return false;
            }
    }
    function agregarRemolque($data,$mysqli){
        $empresaEmisoraId=                      $data["viaje"]["empresaEmisoraId_A"] !=0 ? $data["viaje"]["empresaEmisoraId_A"] :NULL;
        $empresaReceptoraId=                    $data["viaje"]["empresaReceptoraId_A"] !=0 ? $data["viaje"]["empresaReceptoraId_A"] :NULL;
        $hojaDeViajeOrigen=                     $data["viaje"]["hojaDeViajeOrigen_A"] !="" ? $data["viaje"]["hojaDeViajeOrigen_A"] : NULL;
        $remolqueCargaId=                       $data["viaje"]["remolqueCargaId_A"] !=0 ? $data["viaje"]["remolqueCargaId_A"] : NULL;
        $hojaDeViajeRemolqueEconomico=          $data["viaje"]["hojaDeViajeRemolqueEconomico_A"] !=0 ? $data["viaje"]["hojaDeViajeRemolqueEconomico_A"] : NULL;
        $hojaDeViajeTalon1=                     $data["viaje"]["hojaDeViajeTalon1_A"] !="" ? revisaTalon($mysqli,$data["viaje"]["hojaDeViajeTalon1_A"],"viaje_talon1",$data) : NULL;
        $hojaDeViajeTalon2=                     $data["viaje"]["hojaDeViajeTalon2_A"] !="" ? revisaTalon($mysqli,$data["viaje"]["hojaDeViajeTalon2_A"],"viaje_talon2",$data) : NULL;
        $cargaId=                               $data["viaje"]["cargaId_A"] !=0 ? $data["viaje"]["cargaId_A"] : NULL;
        $hojaDeViajeCargaCantidad=              $data["viaje"]["hojaDeViajeCargaCantidad_A"] !=0 || $data["viaje"]["hojaDeViajeCargaCantidad_A"] !="" ? $data["viaje"]["hojaDeViajeCargaCantidad_A"] : 0;
        $cargaUnidadDeMedidaID=                 $data["viaje"]["cargaUnidadDeMedidaID_A"] !=0 ? $data["viaje"]["cargaUnidadDeMedidaID_A"] : NULL;
        $hojaDeViajeUnidadDeMedidaProporcional= $data["viaje"]["hojaDeViajeUnidadDeMedidaProporcional_A"] !=0 ||$data["viaje"]["hojaDeViajeUnidadDeMedidaProporcional_A"] !="" ? $data["viaje"]["hojaDeViajeUnidadDeMedidaProporcional_A"] : 0;
        $consulta="INSERT INTO viaje
        (id_hojaDeViaje,id_viajeEstado,id_empresaEmisora,id_empresaReceptora,viaje_origen,id_remolqueServicio,id_remolque,viaje_talon1,viaje_talon2,
        id_carga,viaje_cargaCantidad,id_unidadDeMedida,viaje_cargaProporcionUM) 
        VALUES 
        ('".$data['id_hojaDeViaje']."',1,'$empresaEmisoraId','$empresaReceptoraId','$hojaDeViajeOrigen','$remolqueCargaId','$hojaDeViajeRemolqueEconomico','$hojaDeViajeTalon1','$hojaDeViajeTalon2',
        '$cargaId','$hojaDeViajeCargaCantidad','$cargaUnidadDeMedidaID','$hojaDeViajeUnidadDeMedidaProporcional'); ";
        return $mysqli->query($consulta);   
    }
    function revisaTalon($mysqli,$talon,$campo,$data){
        $result = $mysqli->query(
            "SELECT * FROM `viaje` WHERE 
            `viaje_talon1`='$talon' OR 
            `viaje_talon2`='$talon';");
            if ($result->num_rows == 0) {
                return NULL;
            }
            else{
                return $talon;
            }
    }
    //POR SI ACASO
    function setConsulta($campo,$valor){
        return "`$campo`='$valor'";
    }  
    function consultaSql($campo,$data,$mysqli){
        $data ="SELECT `$campo` AS `nombre` FROM `viaje` WHERE `id_viaje` =".$data["id_viaje"];
        $result = $mysqli->query($data);
        while ($fila =$result->fetch_assoc()) {
            return setConsulta($campo,$fila["nombre"]);
            break;
        }
    }
?>