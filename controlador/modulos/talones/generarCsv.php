<?php
    
    include "../../coneccion/config.php";
    muestraTodoDeUnRegistro($_POST['hojaDeViajeID'],$con);
    
    function muestraTodoDeUnRegistro($id,$con){
        $consulta=
        'SELECT * FROM hoja_de_viaje 
        INNER JOIN empresa_emisora ON empresa_emisora.empresaEmisoraId = hoja_de_viaje.empresaEmisoraId 
        INNER JOIN empresa_receptora ON empresa_receptora.empresaReceptoraId = hoja_de_viaje.empresaReceptoraId 
        INNER JOIN operadores ON operadores.operadorID = hoja_de_viaje.operadorID 
        INNER JOIN remolques ON remolques.remolqueId = hoja_de_viaje.operadorID 
        WHERE hoja_de_viaje.hojaDeViajeID = '.$id;
        $consulta= $con->query($consulta);
        $arreglo=[];
        while ($r=$consulta->fetch_array()) {
            $arreglo[]=array(
                "ECONOMICO" =>  $r['empresaEmisoraNombre'],
                "OPERADOR" =>   $r['operadorNombre'],
                "CAJAS1" =>      $r['remolqueServicio'],
                "CAJAS1" =>      $r['remolqueServicio'],
                "LICENCIA" =>   $r['operadorLisencia'],
                "LIBERACION" => $r['hojaDeViajeFechaLiberacion'],
                "ARRIBO"=>      $r['hojaDeViajeFechaArribo'],
                "CARGA"=>       $r['hojaDeViajeFechaCarga'],
                "TALONES1" =>   $r['hojaDeViajePlaca1'],
                "TALONES2" =>   $r['hojaDeViajePlaca1'],
                "PLACAS1" =>    $r['hojaDeViajeTalon1'],
                "PLACAS2" =>    $r['hojaDeViajeTalon2'],
                "FOLIOS1"=>     $r['hojaDeViajeEconomico1'],
                "FOLIOS2"=>     $r['hojaDeViajeEconomico2'],
                "TONELADAS"=>   "",
                "OBSERVACION"=> $r['hojaDeViajeComentarios'],
                "ENTREGA"=>     $r['hojaDeViajeFechaDescarga'],
                "ORIGEN"=>      $r['hojaDeViajeOrigen'],
                "CLIENTE"=>     $r['empresaReceptoraNombre']
            );
        }
        echo json_encode($arreglo);
        
    }
    
?>