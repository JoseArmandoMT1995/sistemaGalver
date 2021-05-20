<?php
    //registroTractores
     
    function muestraTractoresMarca($mysqli)
    {

        $result = $mysqli->query("SELECT * FROM `tractor_marca`");
        
        return $result;
    }
    function muestraTractores($mysqli)
    {

        $result = $mysqli->query("SELECT * FROM `tractor`");
        
        return $result;
    }
    function muestraRemolque($mysqli)
    {

        $result = $mysqli->query("SELECT * FROM `remolque`");
        
        return $result;
    }
    function muestraRemolqueCarga($mysqli)
    {

        $result = $mysqli->query("SELECT * FROM `remolque_carga`");
        
        return $result;
    }
    function muestraCarga($mysqli)
    {

        $result = $mysqli->query("SELECT * FROM `carga`");
        
        return $result;
    }
    function muestraUnidadesDeMedida($mysqli)
    {

        $result = $mysqli->query("SELECT * FROM `carga_unidad_de_medida`");
        
        return $result;
    }
    function muestraEmpresaEmisoara($mysqli)
    {

        $result = $mysqli->query("SELECT * FROM `empresa_emisora`");
        
        return $result;
    }
    function muestraEmpresaReceptora($mysqli)
    {

        $result = $mysqli->query("SELECT * FROM `empresa_receptora`");
        
        return $result;
    }
    function muestraOperador($mysqli)
    {

        $result = $mysqli->query("SELECT * FROM `operadores`");
        
        return $result;
    }

?>