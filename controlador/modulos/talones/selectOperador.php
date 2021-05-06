<?php 

include "../../coneccion/config.php";
$consultaContenido= "SELECT `operadorLisencia` FROM `operadores` WHERE `operadorID` =".$_POST['operadorID'];
$resultado = $con->query($consultaContenido);
print_r(gerSqlConsulta($resultado));

function gerSqlConsulta($consultaContenido){
    $licecia="";
    while ($r=$consultaContenido->fetch_array()) 
    {
        $licecia=$r['operadorLisencia'];
        break;
    }

    return $licecia;
}
?>