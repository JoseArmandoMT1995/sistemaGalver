<?php
    include "../../../coneccion/config.php";
    session_start();
    echo json_encode(array(
        "hojaDeViaje"=>hoja_de_viaje($_POST,$mysqli),
        "tractor_del_operador"=>tractor_del_operador($_POST,$mysqli),
        "viajes"=>retornaFalseTrueViaje(viaje($_POST,$mysqli))
    ));    
    function retornaFalseTrueViaje($viaje)
    {
        if ($viaje['r1']==false && $viaje['r2']==true) {return true;}
        if ($viaje['r1']==true && $viaje['r2']==false) {return true;}
        if ($viaje['r1']==false && $viaje['r2']==false) {return false;}
    }
    function hoja_de_viaje($data,$mysqli)
    {
        $consulta=
        "UPDATE `hoja_de_viaje` 
        SET 
        `id_editor` = ".$_SESSION['usuarioId'].",
        `hojaDeViaje_observaciones` = '".$data['hojaDeViaje_observaciones']."',
        `hojaDeViaje_fechaDeEdicion` = NOW()
        WHERE `hoja_de_viaje`.`id_hojaDeViaje` = ".$data['id_hojaDeViaje'].";";
        return $mysqli->query($consulta);
    }    
    function tractor_del_operador($data,$mysqli)
    {
        $edicionData="";
        $tractor_del_operador ="";
        $id_operador="";
            if(
            $data["tractor_del_operador"]["id_tractor"]!= 0 ||
            $data["tractor_del_operador"]["id_tractor"]!= "0"
            ) 
            {
                $tractor_del_operador="`id_tractor` = ".$data["tractor_del_operador"]["id_tractor"];
            }
            if (
            $data["tractor_del_operador"]["id_operador"]!= 0 ||
            $data["tractor_del_operador"]["id_operador"]!= "0"
            ) 
            {
                    $id_operador="`id_operador` = ".$data["tractor_del_operador"]["id_operador"];
            }
            if ($tractor_del_operador != "" && $id_operador == "") 
            {
                $edicionData=$tractor_del_operador;
            }
            if ($tractor_del_operador == "" && $id_operador != "") 
            {
                $edicionData=$id_operador;
            }
            
            if ($tractor_del_operador != "" && $id_operador != "") 
            {
                $edicionData=$tractor_del_operador.",".$id_operador;
            }
            if ($tractor_del_operador == "" && $id_operador == "") 
            {
                $edicionData="";
            }
            if ($edicionData=="") 
            {
                return false;
            }
            if ($edicionData != "") 
            {
                $consulta=
                "UPDATE `tractor_del_operador` 
                SET 
                $edicionData
                WHERE `id_hojaDeViaje` = ".$data['id_hojaDeViaje'].";";
                return $mysqli->query($consulta);              
            }
            else
            {
                return false;
            }
    }
    function viaje($data,$mysqli)
    {
        $viaje1=false;
        $viaje2=false;
        if (empty($data["viaje"]))
        {
            $viaje1=false;
            $viaje2=false;      
        }
        else
        {
            if (empty($data["viaje"]["r1"]) && empty($data["viaje"]["r2"])) 
            {
                $viaje1=false;
                $viaje2=false;  
            }
            if (!empty($data["viaje"]["r1"])) 
            {
                $viaje1=editarRemolque($data["viaje"]["r1"],$mysqli);
            }
            if (!empty($data["viaje"]["r2"])) 
            {
                $viaje2=editarRemolque($data["viaje"]["r2"],$mysqli);
            }
        }
        return array("r1"=>$viaje1,"r2"=>$viaje2);
    }
    function editarRemolque($data,$mysqli)
    {
        $empresaEmisoraId=                      $data["empresaEmisoraId"] !=0 ? setConsulta("id_empresaEmisora",$data["empresaEmisoraId"]) : consultaSql("id_empresaEmisora",$data,$mysqli);
        $empresaReceptoraId=                    $data["empresaReceptoraId"] !=0 ? setConsulta("id_empresaReceptora",$data["empresaReceptoraId"]) : consultaSql("id_empresaReceptora",$data,$mysqli);
        $hojaDeViajeOrigen=                     $data["hojaDeViajeOrigen"] !="" ? setConsulta("viaje_origen",$data["hojaDeViajeOrigen"]) : consultaSql("viaje_origen",$data,$mysqli);
        $remolqueCargaId=                       $data["remolqueCargaId"] !=0 ? setConsulta("id_remolqueServicio",$data["remolqueCargaId"]) : consultaSql("id_remolqueServicio",$data,$mysqli);
        $hojaDeViajeRemolqueEconomico=          $data["hojaDeViajeRemolqueEconomico"] !=0 ? setConsulta("id_remolque",$data["hojaDeViajeRemolqueEconomico"]) : consultaSql("id_remolque",$data,$mysqli);
        $hojaDeViajeTalon1=                     $data["hojaDeViajeTalon1"] !="" ? revisaTalon($mysqli,$data["hojaDeViajeTalon1"],"viaje_talon1",$data) : consultaSql("viaje_talon1",$data,$mysqli);
        $hojaDeViajeTalon2=                     $data["hojaDeViajeTalon2"] !="" ? revisaTalon($mysqli,$data["hojaDeViajeTalon2"],"viaje_talon2",$data) : consultaSql("viaje_talon2",$data,$mysqli);
        $cargaId=                               $data["cargaId"] !=0 ? setConsulta("id_carga",$data["cargaId"]) : consultaSql("id_carga",$data,$mysqli);
        $hojaDeViajeCargaCantidad=              $data["hojaDeViajeCargaCantidad"] !=0 || $data["hojaDeViajeCargaCantidad"] !="" ? setConsulta("viaje_cargaCantidad",$data["hojaDeViajeCargaCantidad"]) : consultaSql("viaje_cargaCantidad",$data,$mysqli);
        $cargaUnidadDeMedidaID=                 $data["cargaUnidadDeMedidaID"] !=0 ? setConsulta("id_unidadDeMedida",$data["cargaUnidadDeMedidaID"]) : consultaSql("id_unidadDeMedida",$data,$mysqli);
        $hojaDeViajeUnidadDeMedidaProporcional= $data["hojaDeViajeUnidadDeMedidaProporcional"] !=0 ||$data["hojaDeViajeUnidadDeMedidaProporcional"] !="" ? setConsulta("viaje_cargaProporcionUM",$data["hojaDeViajeUnidadDeMedidaProporcional"]) : consultaSql("viaje_cargaProporcionUM",$data,$mysqli);
        $consulta=
        "UPDATE `viaje` SET 
        $empresaEmisoraId,$empresaReceptoraId,$hojaDeViajeOrigen,$remolqueCargaId,
        $hojaDeViajeRemolqueEconomico,$hojaDeViajeTalon1,$hojaDeViajeTalon2,
        $cargaId,$hojaDeViajeCargaCantidad,$cargaUnidadDeMedidaID,$hojaDeViajeUnidadDeMedidaProporcional
        WHERE `id_viaje` = ".$data['id_viaje'].";";
        return $mysqli->query($consulta);   
    }
    function revisaTalon($mysqli,$talon,$campo,$data)
    {
        $consulta= "SELECT * FROM `viaje` WHERE 
        viaje_talon1='$talon' OR 
        viaje_talon2='$talon' AND
        id_viaje <> ".$data["id_viaje"].";";
        $result = $mysqli->query($consulta);
        $contador=$result->num_rows;
        if ($contador != 0) {
            return consultaSql($campo,$data,$mysqli);
        }
        else{
            return setConsulta($campo,$talon);
        }
    }
    function consultaSql($campo,$data,$mysqli)
    {
        $data ="SELECT `$campo` AS `nombre` FROM `viaje` WHERE `id_viaje` =".$data["id_viaje"];
        $result = $mysqli->query($data);
        while ($fila =$result->fetch_assoc()) 
        {
            return setConsulta($campo,$fila["nombre"]);
            break;
        }
    }
    function setConsulta($campo,$valor)
    {
        return "`$campo`='$valor'";
    }    
?>