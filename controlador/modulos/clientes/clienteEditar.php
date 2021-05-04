<?php
$array=[];
if(!empty($_POST)){
    if(
      isset($_POST["empresaId"])
      &&isset($_POST["empresaNombre"])
      &&isset($_POST["empresaRFC"]) 
      &&isset($_POST["empresaTelefonoFijo1"]) 
      &&isset($_POST["empresaTelefonoFijo2"]) 
      &&isset($_POST["empresaTelefonoCelular1"]) 
      &&isset($_POST["empresaTelefonoCelular2"]) 
      &&isset($_POST["empresaCorreo"])
      &&isset($_POST["empresaDireccion"])
      &&isset($_POST["empresaDescripcion"])
      ){
        //echo "todos los datos estan ";  
        if(
            $_POST["empresaId"]!=""
            &&$_POST["empresaNombre"]!=""
            &&$_POST["empresaRFC"]!=""            
            &&$_POST["empresaTelefonoFijo1"]!=""
            &&$_POST["empresaTelefonoFijo2"]!=""
            &&$_POST["empresaTelefonoCelular1"]!=""
            &&$_POST["empresaTelefonoCelular2"]!=""
            &&$_POST["empresaCorreo"]!=""
            &&$_POST["empresaDireccion"]!=""
            &&$_POST["empresaDescripcion"]!=""
            ){

                include "../../coneccion/config.php";
                $sql= "
                UPDATE `empresa` SET 
                `empresaNombre` = '".$_POST["empresaNombre"]."', 
                `empresaRFC` = '".$_POST["empresaRFC"]."', 
                `empresaDireccion` = '".$_POST["empresaDireccion"]."', 
                `empresaTelefonoFijo1` = '".$_POST["empresaTelefonoFijo1"]."', 
                `empresaTelefonoFijo2` = '".$_POST["empresaTelefonoFijo2"]."', 
                `empresaTelefonoCelular1` = '".$_POST["empresaTelefonoCelular1"]."', 
                `empresaTelefonoCelular2` = '".$_POST["empresaTelefonoCelular2"]."', 
                `empresaCorreo` = '".$_POST["empresaCorreo"]."', 
                `tipoEmpresaId` = '2', 
                `empresaDescripcion` = '".$_POST["empresaDescripcion"]."' 
                WHERE `empresa`.`empresaId` = ".$_POST["empresaId"]."; ";

                $con->query($sql);
                $array = [
                    "mensajeTitulo" => "Exito",
                    "mensajeSubtitulo" => "Se han editado los datos",
                    "mensajeTipo" => "success"
                ];
            }else
            {
                $array = [
                    "mensajeTitulo" => "precaucion",
                    "mensajeSubtitulo" => "No ingrese campos vasios",
                    "mensajeTipo" => "question"
                ];
            }    
      }else{
        $array = [
            "mensajeTitulo" => "precaucion",
            "mensajeSubtitulo" => "hay datos",
            "mensajeTipo" => "error"
        ];
      }
}
echo json_encode($array);
?>