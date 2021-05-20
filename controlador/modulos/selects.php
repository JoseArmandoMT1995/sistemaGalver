<?php
    //registroTractores
     
    function muestraTractoresMarca($mysqli)
    {

        $result = $mysqli->query("SELECT * FROM `tractor_marca`");
        
        return $result;
    }
    function muestraTractores($mysqli)
    {

        $result = $mysqli->query("SELECT * FROM `tractor_marca`");
        
        return $result;
    }
    

?>