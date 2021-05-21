<?php
    include "../../coneccion/config.php";
    if (isset($_POST)) {
        if($_POST['validacion']==1){
            muestraOperador($mysqli,$_POST);
        }
        if($_POST['validacion']==2){
            muestraTractor($mysqli,$_POST);
        }
        if($_POST['validacion']==3){
            muestraRemolqueEconomico($mysqli,$_POST);
        }
        //faltan mas casos
        else{
            echo false;
        }
    }else{
        echo false;
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
    function muestraRemolqueEconomico($mysqli,$data)
    {
        $consulta= "SELECT * FROM remolque_carga INNER JOIN remolque ON remolque.remolqueCargaID = remolque_carga.remolqueCargaId WHERE remolque_carga.remolqueCargaId=".$data['remolqueCargaId'];
        $result = $mysqli->query($consulta);
        $fila =$result->fetch_assoc();
        $array=array(
            array("validacion"=>$data['validacion']),
            array("arreglos")
        );
        if ($fila) {
            $result = $mysqli->query($consulta);  
            while ($fila =$result->fetch_assoc()) {
                $array[1]["economicoRemolque"][]=array($fila);
            }
            echo json_encode($array);
            
        }else{
            echo json_encode($array);
        }
        
    }
?>