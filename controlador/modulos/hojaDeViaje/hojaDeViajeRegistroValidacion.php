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
        $result = $mysqli->query("SELECT * FROM remolque_carga INNER JOIN remolque ON remolque.remolqueCargaID = remolque_carga.remolqueCargaId WHERE remolque_carga.remolqueCargaId=".$data['remolqueCargaId']);
        $fila =$result->fetch_assoc();
        if ($fila) {
            print_r($fila);
            while ($fila) {
                $array=array(
                    array("validacion"=>$data['validacion']),
                    $fila
                );
                echo json_encode($array);
            }
        }else{
            $array=array(
                array("validacion"=>$data['validacion']),
                array()
            );
            echo json_encode($array);
        }
    }
?>