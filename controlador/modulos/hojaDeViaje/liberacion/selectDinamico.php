<?php
include "../../../coneccion/config.php";
    retornaSelect($mysqli,$_POST);
    function retornaSelect($mysqli,$data)
    {
        $result = $mysqli->query("SELECT * FROM ".$data['tabla']." WHERE ".$data['campo']." =".$data['valor']);
        while ($fila =$result->fetch_assoc()) {
            $array=array(
                $fila
            );
            echo json_encode($array);
        }
    }
?>