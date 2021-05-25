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
        $result = $mysqli->query("SELECT * FROM `empresa_emisora`");
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
        $result = $mysqli->query("
        SELECT * FROM hoja_de_viaje INNER JOIN empresa_emisora ON empresa_emisora.empresaEmisoraId = hoja_de_viaje.empresaEmisoraId INNER JOIN empresa_receptora ON empresa_receptora.empresaReceptoraId = hoja_de_viaje.empresaReceptoraId INNER JOIN tractor ON tractor.tractorId = hoja_de_viaje.tractorId INNER JOIN carga ON carga.cargaId = hoja_de_viaje.cargaId INNER JOIN carga_unidad_de_medida ON carga_unidad_de_medida.cargaUnidadDeMedidaID = hoja_de_viaje.cargaUnidadDeMedidaID");
        return $result;
    }

?>