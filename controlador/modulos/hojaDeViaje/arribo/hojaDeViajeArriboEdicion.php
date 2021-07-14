<?php 
    $hojaDeViaje=obtenerArrayHojaDeViaje($mysqli,$id);
    $tractorDelOperador=obtenerArrayTractorDelOperador($mysqli,$id);
    $viaje=obtenerViaje($mysqli,$id);
    function obtenerArrayHojaDeViaje($mysqli,$id)
    {
        $result = $mysqli->query(
            "SELECT id_hojaDeViaje, id_creador, 
            (SELECT usuarioNombre FROM usuario WHERE usuarioId = hoja_de_viaje.id_creador LIMIT 1)AS CREADOR, id_editor, 
            (SELECT usuarioNombre FROM usuario WHERE usuarioId = hoja_de_viaje.id_editor LIMIT 1)AS EDITOR, 
            hojaDeViaje_fechaDeLiberacion, hojaDeViaje_fechaDeEdicion, hojaDeViaje_observaciones 
            FROM `hoja_de_viaje` WHERE id_hojaDeViaje =".$id
        );
        while ($filas =$result->fetch_assoc()) 
        {
            return $filas;
            break;
        }
    }
    function obtenerArrayTractorDelOperador($mysqli,$id)
    {
        $result = $mysqli->query("SELECT id_hojaDeViaje, id_tractorDelOperador, id_operador, operadores.operadorNombre AS NOMBRE, operadores.operadorLisencia AS LISENCIA , id_tractor, tractor.tractorPlaca AS PLACA, tractor.tractorEconomico AS ECONOMICO FROM tractor_del_operador INNER JOIN operadores ON operadores.operadorID= tractor_del_operador.id_operador INNER JOIN tractor ON tractor.tractorId= tractor_del_operador.id_tractor WHERE tractor_del_operador.id_hojaDeViaje =".$id);
        while ($filas =$result->fetch_assoc()) 
        {
            return $filas;
            break;
        }
    }
    function obtenerViaje($mysqli,$id)
    {
        $result = $mysqli->query(
            "SELECT 
            viaje.id_viaje, 
            viaje.id_hojaDeViaje, 
            viaje_estado.viajeEstado_nombre AS ESTADO, 
            viaje_estado.color_tr AS ESTADO_TR, 
            empresa_emisora.empresaEmisoraId, 
            empresa_emisora.empresaEmisoraNombre AS 
            EMISOR, empresa_receptora.empresaReceptoraId, 
            empresa_receptora.empresaReceptoraNombre AS CLIENTE, viaje.id_carga, carga.cargaNombre AS CARGA, 
            viaje.viaje_cargaCantidad, viaje.id_unidadDeMedida, carga_unidad_de_medida.cargaUnidadDeMedidaNombre AS UNIDAD, 
            viaje.viaje_cargaProporcionUM, viaje.id_remolque, remolque.remolqueEconomico AS REMOLQUE_ECONOMICO, 
            remolque.remolquePlaca AS REMOLQUE_PLACAS, viaje.id_remolqueServicio, 
            remolque_carga.remolqueCargaServicio AS REMOLQUE_SERVICIO, remolque_carga.remolqueCargaImpuesto AS REMOLQUE_SERVICIO_IMPUESTO, 
            viaje.viaje_talon1, viaje.viaje_talon2, viaje.viaje_origen FROM viaje 
            INNER JOIN viaje_estado ON viaje_estado.id_viajeEstado = viaje.id_viajeEstado 
            INNER JOIN empresa_emisora ON empresa_emisora.empresaEmisoraId = viaje.id_empresaEmisora
            INNER JOIN empresa_receptora ON empresa_receptora.empresaReceptoraId = viaje.id_empresaReceptora
            INNER JOIN carga ON carga.cargaId = viaje.id_carga
            INNER JOIN carga_unidad_de_medida ON carga_unidad_de_medida.cargaUnidadDeMedidaID =viaje.id_unidadDeMedida
            INNER JOIN remolque ON remolque.remolqueID = viaje.id_remolque
            INNER JOIN remolque_carga ON remolque_carga.remolqueCargaId = viaje.id_remolqueServicio
            WHERE viaje.id_hojaDeViaje =
            ".$id
        );
        $viaje=[];
        while ($filas =$result->fetch_assoc()) 
        {
            $viaje[]=$filas;
        }
        return $viaje;
    }
?>