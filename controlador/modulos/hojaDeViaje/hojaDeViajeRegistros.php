<?php
include "../../coneccion/config.php";
$permiso =false;
    echo json_encode(array("peticion"=>validacionTalon($mysqli,$_POST)));
    function validacionTalon($mysqli,$talon)
    {
        $permiso= muestraTalon($mysqli,$talon['remolques']['remolque1']['hojaDeViajeTalon1A']);
        $permiso= muestraTalon($mysqli,$talon['remolques']['remolque1']['hojaDeViajeTalon1B']);
        $permiso= muestraTalon($mysqli,$talon['remolques']['remolque2']['hojaDeViajeTalon2A']);
        $permiso= muestraTalon($mysqli,$talon['remolques']['remolque2']['hojaDeViajeTalon2B']);
        return insertarHDV($mysqli,$talon,$permiso);
    }
    
    function muestraTalon($mysqli,$talon)
    {
        if ($talon== NULL || $talon== 'NULL' || $talon== '') 
        {
            return true;
        }
        else
        {
            $result = 
            $mysqli->query(
                "SELECT * FROM `hoja_de_viaje` WHERE 
                `hojaDeViajeTalon1A`='$talon' OR 
                `hojaDeViajeTalon2A`='$talon' OR 
                `hojaDeViajeTalon1B`='$talon' OR 
                `hojaDeViajeTalon2B`='$talon'");
            if 
            ($result->num_rows == 0) {
                return true;
            }
            else{
                return false;
            }
        }
        
    }
    function insertarHDV($mysqli,$array,$permiso)
    {
        if ($permiso===true) 
        {
            //insertarHDV($mysqli,$array,$permiso);
            $insert=
            "INSERT INTO 
            `hoja_de_viaje` 
            (
            `hojaDeViajeID`,
            `hojaDeViajeOrigen1`, 
            `hojaDeViajeOrigenDeDestino1`, 
            `hojaDeViajeFechaDeEdicion`, 
            `hojaDeViajeFechaLiberacion`, 
            `hojaDeViajeFechaArribo`, 
            `hojaDeViajeFechaCarga`, 
            `hojaDeViajeFechaLlegadaDeDescarga`, 
            `hojaDeViajeFechaDescarga`, 
            `hojaDeViajeCantidadCarga1`, 
            `hojaDeViajeCantidadCargaProporcion1`, 
            `hojaDeViajeTalon1A`, 
            `hojaDeViajeTalon2A`, 
            `remolqueCargaId1`, 
            `remolqueCargaId2`, 
            `remolqueID1`, 
            `remolqueID2`, 
            `tractorId`, 
            `cargaId1`, 
            `cargaUnidadDeMedidaID1`, 
            `hojaDeViajeEstadoId`,
            `usuarioCreadorId`, 
            `usuarioEditorId`, 
            `empresaEmisoraId1`, 
            `empresaReceptoraId1`,
            `hojaDeViajeComentario`, 
            `operadorID`, 
            `hojaDeViajeTalon1B`, 
            `hojaDeViajeTalon2B`,
            `hojaDeViajeOrigen2`, 
            `hojaDeViajeOrigenDeDestino2`, 
            `empresaEmisoraId2`, 
            `empresaReceptoraId2`, 
            `hojaDeViajeCantidadCargaProporcion2`, 
            `cargaUnidadDeMedidaID2`,
            `hojaDeViajeCantidadCarga2`, 
            `cargaId2`
            ) VALUES 
            (
                NULL, 
                ".$array['empresasYorigen']['origen1']['hojaDeViajeOrigen1'].", 
                NULL, 
                ".$array['fechaActual'].",
                ".$array['fechaActual'].",
                '0000:00:00 00:00:00', 
                '0000:00:00 00:00:00', 
                '0000:00:00 00:00:00',  
                '0000:00:00 00:00:00', 
                ".$array['remolques']['remolque1']['cantidades']['hojaDeViajeCargaCantidad1'].", 
                ".$array['remolques']['remolque1']['cantidades']['hojaDeViajeUnidadDeMedidaProporcional1'].", 
                ".$array['remolques']['remolque1']['hojaDeViajeTalon1A'].",
                ".$array['remolques']['remolque2']['hojaDeViajeTalon2A'].",
                ".$array['remolques']['remolque1']['cantidades']['cargaId1'].", 
                ".$array['remolques']['remolque2']['cantidades']['cargaId2'].",
                ".$array['remolques']['remolque1']['hojaDeViajeRemolqueEconomico1'].",
                ".$array['remolques']['remolque2']['hojaDeViajeRemolqueEconomico2'].",
                ".$array['tractor'].", 
                '', 
                '', 
                '', 
                '', 
                '', 
                '', 
                '', 
                '', 
                '', 
                '', 
                '', 
                '', 
                '', 
                '', 
                '', 
                '', 
                '', 
                '', 
                ''
                );"
                ;
        }
        else
        {
            return $permiso;
        }
    }
/*
function muestraHDV($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM hoja_de_viaje INNER JOIN empresa_emisora ON empresa_emisora.empresaEmisoraId = hoja_de_viaje.empresaEmisoraId INNER JOIN empresa_receptora ON empresa_receptora.empresaReceptoraId = hoja_de_viaje.empresaReceptoraId INNER JOIN tractor ON tractor.tractorId = hoja_de_viaje.tractorId INNER JOIN carga ON carga.cargaId = hoja_de_viaje.cargaId INNER JOIN carga_unidad_de_medida ON carga_unidad_de_medida.cargaUnidadDeMedidaID = hoja_de_viaje.cargaUnidadDeMedidaID INNER JOIN operadores ON operadores.operadorID = hoja_de_viaje.operadorID INNER JOIN hoja_de_viaje_estado ON hoja_de_viaje_estado.hojaDeViajeEstadoId = hoja_de_viaje.hojaDeViajeEstadoId ORDER BY `hoja_de_viaje`.`hojaDeViajeID` ASC");
        return $result;
    }
    function muestraTractorHDV($mysqli,$table,$columna1,$id,$columnaValor1)
    {
        $result = $mysqli->query("SELECT * FROM `$table` WHERE $columna1 =$id");
        while ($fila =$result->fetch_assoc()) {
            $result=$fila[$columnaValor1];
            break;
        }
        return $result;
    }

function registrosHojaDeViaje($mysqli){
    $hdv=muestraHDV($mysqli);
    $hdvNuevo=[];
    while ($fila =$hdv->fetch_assoc()) {
        $hdvNuevo[]=
        array(
            "hojaDeViajeID"=>$fila['hojaDeViajeID'],
            "empresaEmisoraId"=>$fila['empresaEmisoraId'],
            "empresaEmisoraNombre"=>$fila['empresaEmisoraNombre'],
            "empresaReceptoraId"=>$fila['empresaReceptoraId'],
            "empresaReceptoraNombre"=>$fila['empresaReceptoraNombre'],
            "operadorID"=>$fila['operadorID'],
            "operadorNombre"=>$fila['operadorNombre'],
            "operadorLisencia"=>$fila['operadorLisencia'],
            "tractorId"=>$fila['tractorId'],
            "tractorEconomico"=>$fila['tractorEconomico'],
            "tractorPlaca"=>$fila['tractorPlaca'],
            "remolqueID1"=>$fila['remolqueID1'],
            "remolqueEconomico1"=>muestraTractorHDV($mysqli,"remolque","remolqueID",$fila['remolqueID1'],"remolqueEconomico"),
            "remolquePlaca1"=>muestraTractorHDV($mysqli,"remolque","remolqueID",$fila['remolqueID1'],"remolquePlaca"),
            "remolqueCargaId1"=>$fila['remolqueCargaId1'],
            "remolqueCargaServicio1"=>muestraTractorHDV($mysqli,"remolque_carga","remolqueCargaId",$fila['remolqueCargaId1'],"remolqueCargaServicio"),
            "hojaDeViajeTalon1"=>$fila['hojaDeViajeTalon1'],

            "remolqueID2"=>$fila['remolqueID2'],
            "remolqueEconomico2"=>muestraTractorHDV($mysqli,"remolque","remolqueID",$fila['remolqueID2'],"remolqueEconomico"),
            "remolquePlaca2"=>muestraTractorHDV($mysqli,"remolque","remolqueID",$fila['remolqueID2'],"remolquePlaca"),
            "remolqueCargaId2"=>$fila['remolqueCargaId2'],
            "remolqueCargaServicio2"=>muestraTractorHDV($mysqli,"remolque_carga","remolqueCargaId",$fila['remolqueCargaId2'],"remolqueCargaServicio"),
            "hojaDeViajeTalon2"=>$fila['hojaDeViajeTalon2'],

            "cargaId"=>$fila['cargaId'],
            "cargaUnidadDeMedidaID"=>$fila['cargaUnidadDeMedidaID'],
            "cargaNombre"=>$fila['cargaNombre'],
            "hojaDeViajeCantidadCarga"=>$fila['hojaDeViajeCantidadCarga'],
            "cargaUnidadDeMedidaNombre"=>$fila['cargaUnidadDeMedidaNombre'],
            "hojaDeViajeCantidadCargaProporcion"=>$fila['hojaDeViajeCantidadCargaProporcion'],

            "hojaDeViajeToneladas"=>($fila['hojaDeViajeCantidadCarga']*$fila['hojaDeViajeCantidadCargaProporcion']),
            "hojaDeViajeComentario"=>$fila['hojaDeViajeComentario'],
            "hojaDeViajeOrigen"=>$fila['hojaDeViajeOrigen'],
            "hojaDeViajeOrigenDeDestino"=>$fila['hojaDeViajeOrigenDeDestino'],
            "usuarioCreadorId"=>$fila['usuarioCreadorId'],
            "usuarioCreadorNombre"=>muestraTractorHDV($mysqli,"usuario","usuarioId",$fila['usuarioCreadorId'],"usuarioNombre"),

            "hojaDeViajeFechaDeEdicion"=>$fila['hojaDeViajeFechaDeEdicion'],
            "hojaDeViajeFechaLiberacion"=>$fila['hojaDeViajeFechaLiberacion'],
            "hojaDeViajeFechaArribo"=>$fila['hojaDeViajeFechaArribo'],
            "hojaDeViajeFechaCarga"=>$fila['hojaDeViajeFechaCarga'],
            "hojaDeViajeFechaLlegadaDeDescarga"=>$fila['hojaDeViajeFechaLlegadaDeDescarga'],
            "hojaDeViajeFechaDescarga"=>$fila['hojaDeViajeFechaDescarga'],

            "hojaDeViajeEstadoId"=>$fila['hojaDeViajeEstadoId'],
            "hojaDeViajeEstadoNombre"=>$fila['hojaDeViajeEstadoNombre'],
        );
    }
    return $hdvNuevo;
}*/
?>