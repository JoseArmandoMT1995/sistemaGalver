<?php 
include "../../coneccion/config.php";
 function retornaSelect($mysqli,$data)
    {
        $result = $mysqli->query($data);
        while ($fila =$result->fetch_assoc()) {
            return $fila["nombre"];
            break;
        }
    }
    //
    $array =[
        "tr"=>$_POST["tr"],
        "EMISOR"=>retornaSelect($mysqli,"SELECT `empresaEmisoraNombre` AS nombre FROM `empresa_emisora` WHERE `empresaEmisoraId`=11 LIMIT 1"),
        "CLIENTE"=>retornaSelect($mysqli,"SELECT empresaReceptoraNombre AS nombre FROM empresa_receptora WHERE empresaReceptoraId =17 LIMIT 1"),
        "ORIGEN"=>$_POST["array"]["hojaDeViajeOrigen"],
        "REMOLQUE_ECONOMICO"=>retornaSelect($mysqli,"SELECT remolqueEconomico AS nombre FROM remolque WHERE remolqueID = 1 LIMIT 1 "),
        "REMOLQUE_PLACAS"=>retornaSelect($mysqli,"SELECT remolquePlaca AS nombre FROM remolque WHERE remolqueID = 1 LIMIT 1 "),
        "REMOLQUE_SERVICIO"=>retornaSelect($mysqli,"SELECT `remolqueCargaServicio` AS nombre FROM `remolque_carga` WHERE `remolqueCargaId` = 1 LIMIT 1"),
        "REMOLQUE_SERVICIO_IMPUESTO"=>retornaSelect($mysqli,"SELECT `remolqueCargaImpuesto` AS nombre FROM `remolque_carga` WHERE `remolqueCargaId` = 1 LIMIT 1"),
        "CARGA"=>retornaSelect($mysqli,"SELECT `cargaNombre` AS nombre FROM `carga` WHERE `cargaId` = 1 LIMIT 1"),
        "UNIDAD"=>retornaSelect($mysqli,"SELECT `cargaUnidadDeMedidaNombre` AS nombre FROM `carga_unidad_de_medida` WHERE `cargaUnidadDeMedidaID` =1 LIMIT 1"),
        "viaje_talon1"=>$_POST["array"]["hojaDeViajeTalon1"],
        "viaje_talon2"=>$_POST["array"]["hojaDeViajeTalon2"]
    ];
    echo json_encode($array);
 /*
 (no)id_viaje
 (no)ESTADO
 ORIGEN
 CLIENTE
 REMOLQUE_ECONOMICO
 REMOLQUE_PLACAS
 REMOLQUE_SERVICIO
 REMOLQUE_SERVICIO_IMPUESTO
 CARGA
 UNIDAD
 viaje_talon1
 viaje_talon2
 */
 ?>