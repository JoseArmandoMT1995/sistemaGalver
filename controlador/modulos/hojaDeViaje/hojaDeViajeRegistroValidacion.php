<?php
    include "../../coneccion/config.php";
    $remolque ="";
    if (isset($_POST)) {
        if($_POST['validacion']==1){
            muestraOperador($mysqli,$_POST);
        }
        if($_POST['validacion']==2){
            muestraTractor($mysqli,$_POST);
        }
        if($_POST['validacion']==3){
            muestraRemolqueEconomico1($mysqli,$_POST);
        }
        if($_POST['validacion']==4){
            muestraRemolqueEconomico2($mysqli,$_POST);
        }
        if($_POST['validacion']==5){
            agregaOjaDeViaje($mysqli,$_POST);
        }
        //faltan mas casos
        else{
            echo false;
        }
    }else{
        echo false;
    }
    function agregaOjaDeViaje($mysqli,$data){
        $remolque= "null";
        if (
            $data["hojaDeViaje"]["remolqueCargaId1"] != "1" && $data["hojaDeViaje"]["remolqueCargaId2"] == "1"
        ) {
            $remolque= "SL";
        }
        if (
            $data["hojaDeViaje"]["remolqueCargaId1"] == "1" && $data["hojaDeViaje"]["remolqueCargaId2"] != "1"
            ) {
            $remolque= "SR";
        }
        if (
            $data["hojaDeViaje"]["remolqueCargaId1"] != "1" && $data["hojaDeViaje"]["remolqueCargaId2"] != "1") {
            $remolque= "SF";
        }
        if (
            $data["hojaDeViaje"]["remolqueCargaId1"] == "1" && $data["hojaDeViaje"]["remolqueCargaId2"] == "1") {
        }
        $talon1= $data["hojaDeViaje"]["hojaDeViajeTalon1"];
        $talon2= $data["hojaDeViaje"]["hojaDeViajeTalon2"];
        $result = $mysqli->query("SELECT * FROM hoja_de_viaje where `hojaDeViajeTalon1`= '$talon1' OR `hojaDeViajeTalon2`= '$talon2'"); 
        session_start();
        if ($result->num_rows == 0 && $remolque != null) 
        {
            $consulta ="INSERT INTO `hoja_de_viaje` 
            (`hojaDeViajeID`, `hojaDeViajeOrigen`, `hojaDeViajeOrigenDeDestino`, `hojaDeViajeFechaDeEdicion`, `hojaDeViajeFechaLiberacion`, `hojaDeViajeFechaArribo`, `hojaDeViajeFechaCarga`, `hojaDeViajeFechaLlegadaDeDescarga`, `hojaDeViajeFechaDescarga`, `hojaDeViajeCantidadCarga`, `hojaDeViajeCantidadCargaProporcion`, `hojaDeViajeTalon1`, `hojaDeViajeTalon2`, `remolqueCargaId1`, `remolqueCargaId2`, `remolqueID1`, `remolqueID2`, `tractorId`, `cargaId`, `cargaUnidadDeMedidaID`, `hojaDeViajeEstadoId`, `usuarioCreadorId`, `usuarioEditorId`, `empresaEmisoraId`, `empresaReceptoraId`, `hojaDeViajeComentario`, `operadorID`) 
            VALUES 
            (NULL, 
            '".$data["hojaDeViaje"]["hojaDeViajeOrigen"]."',   
            NULL, 
            '".$data["hojaDeViaje"]["fechaActual"]."',   
            '".$data["hojaDeViaje"]["fechaActual"]."',   
            NULL, 
            NULL, 
            NULL, 
            NULL, 
            '".$data["hojaDeViaje"]["hojaDeViajeCantidadCarga"]."',  
            '".$data["hojaDeViaje"]["hojaDeViajeCantidadCargaProporcion"]."', 
            '".$data["hojaDeViaje"]["hojaDeViajeTalon1"]."', 
            '".$data["hojaDeViaje"]["hojaDeViajeTalon2"]."', 
            '".$data["hojaDeViaje"]["remolqueCargaId1"]."', 
            '".$data["hojaDeViaje"]["remolqueCargaId2"]."', 
            '".$data["hojaDeViaje"]["remolqueID1"]."', 
            '".$data["hojaDeViaje"]["remolqueID2"]."', 
            '".$data["hojaDeViaje"]["tractorId"]."', 
            '".$data["hojaDeViaje"]["cargaId"]."',  
            '".$data["hojaDeViaje"]["cargaUnidadDeMedidaID"]."',   
            1, 
            '".$_SESSION['usuarioId']."', 
            '', 
            '".$data["hojaDeViaje"]["empresaEmisoraId"]."', 
            '".$data["hojaDeViaje"]["empresaReceptoraId"]."',   
            '".$data["hojaDeViaje"]["hojaDeViajeComentario"]."', 
            '".$data["hojaDeViaje"]["operadorId"]."' 
            ); ";
            $insert = $mysqli->query($consulta);
            if ($insert == 1) {
                //echo 1;
                $array=array(
                    array("validacion"=>$data['validacion']),
                    array("insercion"=>1)
                );
                echo json_encode($array);
            }     
            else{
                //echo 0;
                $array=array(
                    array("validacion"=>$data['validacion']),
                    array("insercion"=>0)
                );
                echo json_encode($array);
            }       
        }
        else
        {
            //echo 0;
            $array=array(
                array("validacion"=>$data['validacion']),
                array("insercion"=>0)
            );
            echo json_encode($array);
        }
    }
    function muestraOperador($mysqli,$data)
    {
        $result = $mysqli->query("SELECT * FROM `operadores` WHERE `operadorID`=".$data['operadorId']);
        while ($fila =$result->fetch_assoc()) {
            $array=array(
                array("validacion"=>$data['validacion']),
                $fila
            );
            echo json_encode($array);
        }
    }
    function muestraTractor($mysqli,$data)
    {
        $result = $mysqli->query("SELECT * FROM `tractor` WHERE `tractorId`=".$data['tractorId']);
        while ($fila =$result->fetch_assoc()) {
            $array=array(
                array("validacion"=>$data['validacion']),
                $fila
            );
            echo json_encode($array);
        }
    }
    function muestraRemolqueEconomico1($mysqli,$data)
    {
        $result = $mysqli->query("SELECT * FROM remolque WHERE remolqueID =".$data['remolqueID']);
        while ($fila =$result->fetch_assoc()) {
            $array=array(
                array("validacion"=>$data['validacion']),
                $fila
            );
            echo json_encode($array);
        }   
    }
    function muestraRemolqueEconomico2($mysqli,$data)
    {
        $result = $mysqli->query("SELECT * FROM remolque WHERE remolqueID =".$data['remolqueID']);
        while ($fila =$result->fetch_assoc()) {
            $array=array(
                array("validacion"=>$data['validacion']),
                $fila
            );
            echo json_encode($array);
        }
    }    
?>