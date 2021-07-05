<?php
include "../../../coneccion/config.php";
session_start();    
    $permiso =false;
    print_r(pasos_para_insertar($mysqli,$_POST));
    function pasos_para_insertar($mysqli,$arreglo)
    {
        $id_viaje =ultimoID($mysqli);
        //1° paso: checar si hay talones iguales.
        $retorno=validarTalones($mysqli,$arreglo);
        if ($retorno == true) {
            //2° paso: insertar_tabla_hoja_de_viaje
            $retorno= insertar_tabla_hoja_de_viaje($mysqli,$arreglo,$id_viaje);
            if ($retorno == true) {
                //3° paso: insertar viaje y tractor_del_operador
                #3.1 insertar tractor_del_operador
                $retorno= insertar_tractor_del_operador($mysqli,$arreglo,$id_viaje);
                #3.2 insertar viaje
                if (isset($arreglo["viajes"]["viaje_2"]))
                {
                    $retorno= insertar_viaje1($mysqli,$arreglo,$id_viaje);
                    $retorno= insertar_viaje2($mysqli,$arreglo,$id_viaje);
                }
                else
                {
                    $retorno= insertar_viaje1($mysqli,$arreglo,$id_viaje);
                }
                return $retorno;
            }
            else
            {
                return false;
            }
        }else{
            return false;
        }
    }
    //paso 1
    function validarTalones($mysqli,$arreglo)
    {
        $permiso =muestraTalon($mysqli,$arreglo["viajes"]["viaje_1"]["viaje_talon1"]);
        $permiso =muestraTalon($mysqli,$arreglo["viajes"]["viaje_1"]["viaje_talon2"]);
        if (isset($arreglo["viajes"]["viaje_2"])) {
            $permiso =muestraTalon($mysqli,$arreglo["viajes"]["viaje_2"]["viaje_talon1"]);
            $permiso =muestraTalon($mysqli,$arreglo["viajes"]["viaje_2"]["viaje_talon2"]);
        }
        return $permiso;
    }
    //paso 2
    function insertar_tabla_hoja_de_viaje($mysqli,$talon,$id_viaje)
    {
        //eliminar el tipo
        $id_viaje = ultimoID($mysqli);
        $hojaDeViaje_estadoRemolque2=(isset($talon["viajes"]["viaje_2"]))?1:NULL;
        if (isset($_POST)) 
        {
            $consulta="INSERT INTO `hoja_de_viaje` 
            (`id_hojaDeViaje`, `id_creador`, `id_editor`, `hojaDeViaje_fechaDeLiberacion`, 
            `hojaDeViaje_fechaDeEdicion`, `hojaDeViaje_observaciones`,`hojaDeViaje_estadoDeViaje`) 
            VALUES 
            (
            ".$id_viaje.", 
            '".$_SESSION['usuarioId']."', 
            '".$_SESSION['usuarioId']."', 
            '".$talon['hojaDeViaje_fechaDeLiberacion']."', 
            '0000:00:00 00:00:00', 
            '".$talon['hojaDeViaje_observaciones'].
            "',
            '1');";
            return $mysqli->query($consulta);
        }
    }
    function insertar_destinos_arribo($mysqli,$array,$id_viaje)
    {
        //eliminar el tipo
        if (isset($array)) 
        {
            $consulta="INSERT INTO `arribo_destinos` 
            (`id_hojaDeViaje`,`creador`,`editor`, `arriboDestino_fecha`, `arriboDestino_destino`, `arriboDestino_causaDeCambio`) 
            VALUES 
            (
            ".$id_viaje.", 
            '".$_SESSION['usuarioId']."', 
            '".$_SESSION['usuarioId']."', 
            '".$array['hojaDeViaje_fechaDeLiberacion']."', 
            '0000:00:00 00:00:00', 
            '".$array['hojaDeViaje_observaciones'].
            "',
            '1');";
            return $mysqli->query($consulta);
        }
    }
    //paso3
    //paso3.1
    function insertar_tractor_del_operador($mysqli,$arreglo,$id_viaje)
    {
        
        if (isset($_POST)) 
        {
            $consulta="INSERT INTO `tractor_del_operador` 
            (`id_tractorDelOperador`, `id_operador`, `id_tractor`, `id_hojaDeViaje`) 
            VALUES 
            (
            NULL, 
            '".$arreglo['tractor_del_operador']['id_operador']."', 
            '".$arreglo['tractor_del_operador']['id_tractor']."', 
            '$id_viaje');";
            return $mysqli->query($consulta);
        }
    }
    //paso3.2 fin
    function insertar_viaje1($mysqli,$arreglo,$id_viaje)
    {
        if (isset($_POST)) 
        {
            $consulta="INSERT INTO `viaje` 
            (
            `id_viaje`, `id_hojaDeViaje`, `id_viajeEstado`, `id_empresaEmisora`, 
            `id_empresaReceptora`, `id_carga`, `id_unidadDeMedida`, `viaje_fechaDeArribo`, 
            `viaje_fechaDeCarga`, `viaje_fechaDeLlegadaDeDescarga`, `viaje_fechaDeDescarga`, 
            `viaje_cargaCantidad`, `viaje_cargaProporcionUM`, `id_remolque`, `id_remolqueServicio`, 
            `viaje_talon1`, `viaje_talon2`, `viaje_origen`) VALUES 
            (
            NULL, 
            $id_viaje, 
            1, 
            '".$arreglo["viajes"]["viaje_1"]["id_empresaEmisora"]."',  
            '".$arreglo["viajes"]["viaje_1"]["id_empresaReceptora"]."',
            '".$arreglo["viajes"]["viaje_1"]["id_carga"]."',
            '".$arreglo["viajes"]["viaje_1"]["id_unidadDeMedida"]."',
            '0000:00:00 00:00:00', 
            '0000:00:00 00:00:00', 
            '0000:00:00 00:00:00', 
            '0000:00:00 00:00:00', 
            '".$arreglo["viajes"]["viaje_1"]["viaje_cargaCantidad"]."',
            '".$arreglo["viajes"]["viaje_1"]["viaje_cargaProporcionUM"]."',
            '".$arreglo["viajes"]["viaje_1"]["id_remolque"]."',
            '".$arreglo["viajes"]["viaje_1"]["id_remolqueServicio"]."',
            '".$arreglo["viajes"]["viaje_1"]["viaje_talon1"]."', 
            '".$arreglo["viajes"]["viaje_1"]["viaje_talon2"]."',
            '".$arreglo["viajes"]["viaje_1"]["viaje_origen"]."'
            ); ";
            return $mysqli->query($consulta);
        }
    }
    function insertar_viaje2($mysqli,$arreglo,$id_viaje)
    {
        if (isset($_POST)) 
        {
            $consulta="INSERT INTO `viaje` 
            (`id_viaje`, `id_hojaDeViaje`, `id_viajeEstado`, `id_empresaEmisora`, 
            `id_empresaReceptora`, `id_carga`, `id_unidadDeMedida`, `viaje_fechaDeArribo`, 
            `viaje_fechaDeCarga`, `viaje_fechaDeLlegadaDeDescarga`, `viaje_fechaDeDescarga`, 
            `viaje_cargaCantidad`, `viaje_cargaProporcionUM`, `id_remolque`, `id_remolqueServicio`, 
            `viaje_talon1`, `viaje_talon2`,`viaje_origen`) VALUES 
            (
            NULL, 
            $id_viaje, 
            1, 
            '".$arreglo["viajes"]["viaje_2"]["id_empresaEmisora"]."',  
            '".$arreglo["viajes"]["viaje_2"]["id_empresaReceptora"]."',
            '".$arreglo["viajes"]["viaje_2"]["id_carga"]."',
            '".$arreglo["viajes"]["viaje_2"]["id_unidadDeMedida"]."',
            '0000:00:00 00:00:00', 
            '0000:00:00 00:00:00', 
            '0000:00:00 00:00:00', 
            '0000:00:00 00:00:00', 
            '".$arreglo["viajes"]["viaje_2"]["viaje_cargaCantidad"]."',
            '".$arreglo["viajes"]["viaje_2"]["viaje_cargaProporcionUM"]."',
            '".$arreglo["viajes"]["viaje_2"]["id_remolque"]."',
            '".$arreglo["viajes"]["viaje_2"]["id_remolqueServicio"]."',
            '".$arreglo["viajes"]["viaje_2"]["viaje_talon1"]."', 
            '".$arreglo["viajes"]["viaje_2"]["viaje_talon2"]."',
            '".$arreglo["viajes"]["viaje_2"]["viaje_origen"]."'
            ); ";
            return $mysqli->query($consulta);
        }
    }
    function muestraTalon($mysqli,$talon)
    {
        if ($talon== NULL || $talon== 'NULL' || $talon== '') 
        {
            return true;
        }
        else
        {
            $result = 
            $mysqli->query(
                "SELECT * FROM `viaje` WHERE `viaje_talon1`='$talon' OR `viaje_talon1`='$talon';");
            if 
            ($result->num_rows == 0) {
                return true;
            }
            else{
                return false;
            }
        }        
    }
    function ultimoID($mysqli)
    {   
        $consulta="SELECT MAX(id_hojaDeViaje)+1 AS id_asignado FROM hoja_de_viaje";
        $result = consultaSQL($mysqli,$consulta);
        if ($result->num_rows == 0 ) 
        {
            return 1;
        }
        else
        {
            while ($fila = $result->fetch_assoc()) 
            {
                if ($fila['id_asignado'] == "" || $fila['id_asignado'] == NULL) {
                    return 1;
                } else {
                    return $fila['id_asignado'];
                }
                break;
            }
        }
    }
    function consultaSQL($mysqli,$consulta)
    {
        $result = $mysqli->query($consulta);
        return $result;
    }
?>