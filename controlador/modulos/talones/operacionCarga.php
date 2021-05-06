<?php 
    include "../../coneccion/config.php";
    $resultadoOperacionCarga=muestraOperacion($con,$_POST['cargaTipoID'],$_POST['cantidad']);
    print_r($resultadoOperacionCarga);
    function muestraOperacion($con,$cargaTipoID,$cantidad){
        $consultaContenido= "SELECT `operacion`,`valor` FROM `cargatipo` WHERE `cargaTipoID` =".$cargaTipoID;

        $consultaContenido=$con->query($consultaContenido);
        return gerSqlConsulta($consultaContenido,$cantidad);
    }
    function gerSqlConsulta($consultaContenido,$cantidad){
        $resultado=0;
        $valorOperacion=0;
        while ($r=$consultaContenido->fetch_array()) 
        {
            $resultado=$r['operacion'];
            $valorOperacion=$r['valor'];
            break;
        }
        if($resultado != null){
            switch ($resultado) {
                case 1:
                    $resultado =($cantidad + $valorOperacion);
                    break;
                case 2:
                    $resultado =($cantidad - $valorOperacion);
                    break;
                case 3:
                    $resultado =($cantidad * $valorOperacion);
                    break;
                case 4:
                    $resultado =($cantidad / $valorOperacion);
                    break;
            }
        }
        return $resultado;
    }
?>