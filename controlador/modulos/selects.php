<?php
    //tractoresMarca
    function muestraTractoresMarca($mysqli)
    {

        $result = $mysqli->query("SELECT * FROM `tractor_marca`");
        
        return $result;
    }
    //traxtores
    function muestraTractores($mysqli)
    {

        $result = $mysqli->query("SELECT * FROM `tractor`");
        
        return $result;
    }
    //remolque
    function muestraRemolque($mysqli)
    {

        $result = $mysqli->query("SELECT * FROM `remolque`");
        
        return $result;
    }
    //Remolque carga
    function muestraRemolqueCarga($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `remolque_carga`");   
        return $result;
    }
    //carga
    function muestraCarga($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `carga`");   
        return $result;
    }
    //unidad de medida
    function muestraUnidadesDeMedida($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `carga_unidad_de_medida`");   
        return $result;
    }
    //empresa emisora
    function muestraEmpresaEmisoara($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM empresa_emisora INNER JOIN usuario ON usuario.usuarioId= empresa_emisora.usuarioId");
        return $result;
    }
    //empresa receptora
    function muestraEmpresaReceptora($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `empresa_receptora`");
        return $result;
    }
    //operador
    function muestraOperador($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `operadores`");
        return $result;
    }
    //remolque
    function muestraRemolqe($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `remolque`");
        return $result;
    }
    //hoja de viaje
    function muestraHDV($mysqli)
    {
        $consulta=
        "SELECT  
        hoja_de_viaje.id_hojaDeViaje as ID,
        (SELECT operadorNombre FROM operadores WHERE operadorID= tractor_del_operador.id_operador LIMIT 1) as OPERADOR,
        (SELECT tractorPlaca FROM tractor WHERE tractorId= tractor_del_operador.id_tractor LIMIT 1) as PLACAS,
        (SELECT remolqueEconomico FROM remolque WHERE remolque.remolqueID = viaje.id_remolque) as CAJAS,
        (SELECT operadorLisencia FROM operadores WHERE operadorID= tractor_del_operador.id_operador LIMIT 1) as LICENCIA,
        viaje.viaje_talon1 as TALON1,
        viaje.viaje_talon2 as TALON2,
        hoja_de_viaje.hojaDeViaje_fechaDeLiberacion as LIBERACION_FECHA,
        viaje.viaje_fechaDeArribo as FECHA_ARRIBO,
        viaje.viaje_fechaDeArribo as FECHA_CARGA,
        viaje.viaje_folioDeCarga as FOLIO_DE_CARGA,
        (viaje.viaje_cargaCantidad * viaje.viaje_cargaProporcionUM) as TONELADAS,
        hoja_de_viaje.hojaDeViaje_observaciones as OBSERVACIONES,
        viaje.viaje_fechaDeDescarga as FECHA_ENTREGA,
        viaje.viaje_origen as ORIGEN,
        viaje.viaje_destino as DESTINO,
        (SELECT empresaReceptoraNombre FROM empresa_receptora WHERE empresaReceptoraId = viaje.id_empresaReceptora) as CLIENTE
        FROM `viaje` 
        INNER JOIN tractor_del_operador ON tractor_del_operador.id_hojaDeViaje = viaje.id_hojaDeViaje
        INNER JOIN hoja_de_viaje ON hoja_de_viaje.id_hojaDeViaje = viaje.id_hojaDeViaje
        order by hoja_de_viaje.id_hojaDeViaje asc
        ";
        $result = $mysqli->query($consulta);
        return $result;
    }

?>