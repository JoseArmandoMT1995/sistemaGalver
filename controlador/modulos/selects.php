<?php
    //tractoresMarca
    function muestraTractoresMarca($mysqli)
    {
        $result = $mysqli->query(
        "SELECT * FROM `tractor_marca`
        INNER JOIN usuario ON usuario.usuarioId= tractor_marca.usuarioId
        WHERE tractor_marca.estadoRegistro = 0");
        return $result;
    }
    //traxtores
    function muestraTractores($mysqli)
    {
        $result = $mysqli->query(
        "SELECT * FROM `tractor` 
        INNER JOIN usuario ON usuario.usuarioId= tractor.usuarioId
        INNER JOIN tractor_marca ON tractor_marca.tractorMarcaId= tractor.tractorMarcaId 
        WHERE tractor.estadoRegistro = 0");
        return $result;
    }
    //remolque
    function muestraRemolque($mysqli)
    {
        $result = $mysqli->query(
        "SELECT * FROM `remolque` INNER JOIN usuario ON usuario.usuarioId= remolque.usuarioId WHERE remolque.estadoRegistro = 0");
        return $result;
    }
    //Remolque carga
    function muestraRemolqueCarga($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `remolque_carga` 
        INNER JOIN usuario ON usuario.usuarioId= remolque_carga.usuarioId WHERE remolque_carga.estadoRegistro = 0");   
        return $result;
    }
    //carga
    function muestraCarga($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `carga` 
        INNER JOIN usuario ON usuario.usuarioId= carga.usuarioId WHERE carga.estadoRegistro = 0");   
        return $result;
    }
    //unidad de medida
    function muestraUnidadesDeMedida($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `carga_unidad_de_medida` 
        INNER JOIN usuario ON usuario.usuarioId= carga_unidad_de_medida.usuarioId WHERE carga_unidad_de_medida.estadoRegistro = 0");   
        return $result;
    }
    //empresa emisora
    function muestraEmpresaEmisoara($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM empresa_emisora INNER JOIN usuario ON usuario.usuarioId= empresa_emisora.usuarioId  WHERE empresa_emisora.estadoRegistro = 0");
        return $result;
    }
    //empresa receptora
    function muestraEmpresaReceptora($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `empresa_receptora` INNER JOIN usuario ON usuario.usuarioId= empresa_receptora.usuarioId WHERE empresa_receptora.estadoRegistro = 0");
        return $result;
    }
    //operador
    function muestraOperador($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `operadores` INNER JOIN usuario ON usuario.usuarioId= operadores.usuarioId WHERE operadores.estadoRegistro = 0");
        return $result;
    }
    //remolque
    function muestraRemolqe($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `remolque`");
        return $result;
    }
    function muestraDestinos($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `destino` 
        INNER JOIN usuario ON usuario.usuarioId= destino.usuarioId
        WHERE destino.estadoRegistro = 0");
        return $result;
    }
    function muestraArriboDestinos($mysqli,$id)
    {
        $consulta="SELECT 
        arriboDestino_id AS ID,
        arriboDestino_fecha AS FECHA,
        arriboDestino_destino AS ID_DESTINO,
        destino.destino_nombre AS DESTINO,
        arribo_destinos.creador AS ID_CREADOR,
        (SELECT usuario.usuarioNombre FROM usuario WHERE usuario.usuarioId =creador)AS CREADOR,
        arribo_destinos.arriboDestino_causaDeCambio AS CAUSA,
        arribo_destinos.arriboDestino_id AS ID_VIAJE
        FROM arribo_destinos 
        INNER JOIN destino ON destino.destino_id= arribo_destinos.arriboDestino_destino
        WHERE arribo_destinos.id_viaje= $id;";
        $result = $mysqli->query($consulta);
        return $result;
    }
    //hoja de viaje
    function muestraHDVT($mysqli,$estado)
    {
        $consulta=
        "SELECT hoja_de_viaje.id_hojaDeViaje AS ID
        ,(SELECT `id_operador` FROM `tractor_del_operador` WHERE `id_hojaDeViaje`=hoja_de_viaje.id_hojaDeViaje LIMIT 1 ) AS ID_OPERADOR
        ,(SELECT `operadorNombre` FROM `operadores` WHERE `operadorID`=(SELECT `id_operador` FROM `tractor_del_operador` WHERE `id_hojaDeViaje`=hoja_de_viaje.id_hojaDeViaje LIMIT 1 ) LIMIT 1)AS OPERADOR
        ,(SELECT `tractorEconomico` FROM `tractor` WHERE `tractorId`=(SELECT `tractorId` FROM `tractor_del_operador` WHERE `id_hojaDeViaje`=hoja_de_viaje.id_hojaDeViaje LIMIT 1 ) LIMIT 1)AS ECONOMICO_TRACTOR
        ,(SELECT `tractorPlaca` FROM `tractor` WHERE `tractorId`=(SELECT `tractorId` FROM `tractor_del_operador` WHERE `id_hojaDeViaje`=hoja_de_viaje.id_hojaDeViaje LIMIT 1 ) LIMIT 1)AS PLACA_TRACTOR
        ,(SELECT `operadorLisencia` FROM `operadores` WHERE `operadorID`=(SELECT `id_operador` FROM `tractor_del_operador` WHERE `id_hojaDeViaje`=hoja_de_viaje.id_hojaDeViaje LIMIT 1 ) LIMIT 1)AS LICENCIA
        
        ,hoja_de_viaje.hojaDeViaje_fechaDeLiberacion AS FECHA_CREACION
        ,hoja_de_viaje.hojaDeViaje_fechaDeEdicion AS FECHA_EDICION
        ,(SELECT usuarioNombre FROM usuario WHERE usuario.usuarioId = hoja_de_viaje.id_creador LIMIT 1)AS CREADOR, 
        (SELECT usuarioNombre FROM usuario WHERE usuario.usuarioId = hoja_de_viaje.id_editor LIMIT 1)AS EDITOR, hoja_de_viaje.hojaDeViaje_estadoDeViaje AS ID_ESTADO, 
        hoja_de_viaje_estado.hdve_nombre AS ESTADO,
        hoja_de_viaje_estado.color_td AS ESTADO_TD,  
        (SELECT (COUNT(*))AS NUM FROM viaje WHERE viaje.id_hojaDeViaje = hoja_de_viaje.id_hojaDeViaje LIMIT 1)AS ID_TIPO,
        (SELECT hoja_de_viaje_tipo.hdvt_nombre FROM hoja_de_viaje_tipo WHERE hoja_de_viaje_tipo.hdvt_id= (SELECT (COUNT(*))AS NUM FROM viaje WHERE viaje.id_hojaDeViaje = hoja_de_viaje.id_hojaDeViaje LIMIT 1) LIMIT 1) AS TIPO,
        (SELECT hoja_de_viaje_tipo.hdvt_color_tr FROM hoja_de_viaje_tipo WHERE hoja_de_viaje_tipo.hdvt_id= (SELECT (COUNT(*))AS NUM FROM viaje WHERE viaje.id_hojaDeViaje = hoja_de_viaje.id_hojaDeViaje LIMIT 1) LIMIT 1) AS COLOR_TD        
        FROM hoja_de_viaje 
        INNER JOIN hoja_de_viaje_estado ON hoja_de_viaje_estado.hdve_id = hoja_de_viaje.hojaDeViaje_estadoDeViaje";
        $result = $mysqli->query($consulta);
        return $result;
    }
    function muestraHDVTC($mysqli,$estado)
    {
        $consulta=
        "SELECT hoja_de_viaje.id_hojaDeViaje AS ID
        ,hoja_de_viaje.hojaDeViaje_fechaDeLiberacion AS FECHA_CREACION
        ,hoja_de_viaje.hojaDeViaje_fechaDeEdicion AS FECHA_EDICION
        ,(SELECT usuarioNombre FROM usuario WHERE usuario.usuarioId = hoja_de_viaje.id_creador LIMIT 1)AS CREADOR, 
        (SELECT usuarioNombre FROM usuario WHERE usuario.usuarioId = hoja_de_viaje.id_editor LIMIT 1)AS EDITOR, hoja_de_viaje.hojaDeViaje_estadoDeViaje AS ID_ESTADO, 
        hoja_de_viaje_estado.hdve_nombre AS ESTADO, 
        (SELECT (COUNT(*))AS NUM FROM viaje WHERE viaje.id_hojaDeViaje = hoja_de_viaje.id_hojaDeViaje LIMIT 1)AS ID_TIPO,
        (SELECT hoja_de_viaje_tipo.hdvt_nombre FROM hoja_de_viaje_tipo WHERE hoja_de_viaje_tipo.hdvt_id= (SELECT (COUNT(*))AS NUM FROM viaje WHERE viaje.id_hojaDeViaje = hoja_de_viaje.id_hojaDeViaje LIMIT 1) LIMIT 1) AS TIPO
        FROM hoja_de_viaje 
        INNER JOIN hoja_de_viaje_estado ON hoja_de_viaje_estado.hdve_id = hoja_de_viaje.hojaDeViaje_estadoDeViaje
        WHERE hoja_de_viaje.hojaDeViaje_estadoDeViaje= 3";
        $result = $mysqli->query($consulta);
        return $result;
    }    
    function muestraHDV($mysqli,$estado)
    {
        $consulta=
        "SELECT  
		viaje.id_viaje as ID_VIAJE,
        hoja_de_viaje.id_hojaDeViaje as ID,
		(SELECT empresaEmisoraNombre FROM empresa_emisora WHERE empresaEmisoraId= viaje.id_empresaEmisora LIMIT 1) as ECONOMICO,
        (SELECT operadorNombre FROM operadores WHERE operadorID= tractor_del_operador.id_operador LIMIT 1) as OPERADOR,
        (SELECT tractorPlaca FROM tractor WHERE tractorId= tractor_del_operador.id_tractor LIMIT 1) as PLACAS,
        (SELECT remolqueEconomico FROM remolque WHERE remolque.remolqueID = viaje.id_remolque LIMIT 1) as CAJAS,
        (SELECT operadorLisencia FROM operadores WHERE operadorID= tractor_del_operador.id_operador LIMIT 1) as LICENCIA,
        viaje.viaje_talon1 as TALON1,
        viaje.viaje_talon2 as TALON2,
        hoja_de_viaje.hojaDeViaje_fechaDeLiberacion as LIBERACION_FECHA,
        viaje.viaje_fechaDeArribo as FECHA_ARRIBO,
        viaje.viaje_fechaDeArribo as FECHA_CARGA,
        viaje.viaje_folioDeCarga as FOLIO_DE_CARGA,
        (viaje.viaje_cargaCantidad * viaje.viaje_cargaProporcionUM) as TONELADAS,
        hoja_de_viaje.hojaDeViaje_observaciones as OBSERVACIONES,
        viaje.viaje_fechaDeDescarga as FECHA_ENTREGA,
        destino.destino_nombre as ORIGEN,
        viaje.viaje_destino as DESTINO,
        (SELECT empresaReceptoraNombre FROM empresa_receptora WHERE empresaReceptoraId = viaje.id_empresaReceptora) as CLIENTE,
        viaje.viaje_folioDeCarga AS FOLIO_CARGA,
        viaje.viaje_folioDeBascula AS FOLIO_BASCULA,
        viaje.viaje_observacion_carga AS OBSERVACION_CARGA,
        viaje.viaje_sellos AS SELLOS_CARGA,
        viaje.id_viajeEstado as ID_ESTADO
        FROM `viaje` 
        INNER JOIN tractor_del_operador ON tractor_del_operador.id_hojaDeViaje = viaje.id_hojaDeViaje
        INNER JOIN hoja_de_viaje ON hoja_de_viaje.id_hojaDeViaje = viaje.id_hojaDeViaje
        INNER JOIN destino ON destino.destino_id = viaje.viaje_origen
        WHERE viaje.id_viajeEstado=$estado
        ORDER BY hoja_de_viaje.id_hojaDeViaje asc;";
        $result = $mysqli->query($consulta);
        return $result;
    }
    function checarExistenciaDestino($mysqli,$id)
    {
        $consulta="SELECT * FROM `arribo_origen_de_carga` WHERE `id_viaje`=$id";
        $result = $mysqli->query($consulta);
        if ($result->num_rows == 0) 
        {
            $consulta=
            "INSERT INTO `arribo_origen_de_carga` 
            (`arriboOrigenDeCarga_id`,`creador`,`editor`,`arriboOrigenDeCarga_fechaCreacion`,`arriboOrigenDeCarga_fechaEdicion`,
            `id_viaje`,`arriboOrigenDeCarga_origenCarga`)
            VALUES
            (NULL,".$_SESSION['usuarioId'].",".$_SESSION['usuarioId'].",NOW(),NOW(),$id,(SELECT viaje.viaje_origen FROM viaje WHERE id_viaje = $id));";
            $result= $mysqli->query($consulta);
            if ($result== true) 
            {
                echo "<script> window.location='HDV_Arribo.php?id=$id'; </script>"; exit;
            }
        }
    }
    function checarExistenciaDestinoDescarga($mysqli,$id)
    {
        $consulta="SELECT * FROM `descarga_origen_de_carga` WHERE descarga_origen_de_carga.id_viaje=$id";
        $result = $mysqli->query($consulta);
        if ($result->num_rows == 0) 
        {
            $consulta=
            "INSERT INTO `descarga_origen_de_carga` 
            (`descargaOrigenDeCarga_id`,`creador`,`editor`,`descargaOrigenDeCarga_fechaCreacion`,`descargaOrigenDeCarga_fechaEdicion`,
            `id_viaje`,`descargaOrigenDeCarga_origenCarga`,`descargaOrigenDeCarga_estado`)
            VALUES
            (NULL,".$_SESSION['usuarioId'].",".$_SESSION['usuarioId'].",NOW(),NOW(),$id,(SELECT viaje.viaje_origen FROM viaje WHERE id_viaje = $id),1);";
            
            $result= $mysqli->query($consulta);
            if ($result== true) 
            {
                echo "<script> window.location='HDV_descarga.php?id=$id'; </script>"; exit;
            }
        }
    }
    function idsViaje($id,$mysqli)
    {
        
        $result = $mysqli->query(
        "SELECT * FROM `viaje` INNER JOIN hoja_de_viaje on hoja_de_viaje.id_hojaDeViaje = viaje.id_hojaDeViaje
        WHERE `id_viaje`=".$id);
        while ($filas =$result->fetch_assoc()) 
        {
          $talones=($filas["viaje_talon2"]!="")?"".$filas["viaje_talon1"].",".$filas["viaje_talon2"]:$filas["viaje_talon1"];
          $result=array("id_viaje"=>$filas['id_viaje'],"id_hojaDeViaje"=>$filas['id_hojaDeViaje'],"talones"=>$talones); 
          break;  
        }
        return $result;
    }
    function consultaSqlRegistrosViajeRemolque($mysqli)
{
    $consulta="SELECT  
    viaje.id_viaje as ID_VIAJE,
    viaje.id_viajeEstado as ID_ESTADO_VIAJE,
    viaje_estado.url as URL,
    viaje_estado.viajeEstado_nombre as ESTADO_VIAJE,
    viaje_estado.color_tr as TR_COLOR_ESTADO,
    hoja_de_viaje.id_hojaDeViaje as ID,
    (SELECT empresaEmisoraNombre FROM empresa_emisora WHERE empresaEmisoraId= viaje.id_empresaEmisora LIMIT 1) as ECONOMICO,
    (SELECT operadorNombre FROM operadores WHERE operadorID= tractor_del_operador.id_operador LIMIT 1) as OPERADOR,
    (SELECT tractorPlaca FROM tractor WHERE tractorId= tractor_del_operador.id_tractor LIMIT 1) as PLACAS,
    (SELECT remolqueEconomico FROM remolque WHERE remolque.remolqueID = viaje.id_remolque) as CAJAS,
    (SELECT operadorLisencia FROM operadores WHERE operadorID= tractor_del_operador.id_operador LIMIT 1) as LICENCIA,
    viaje.viaje_talon1 as TALON1,
    viaje.viaje_talon2 as TALON2,
    hoja_de_viaje.hojaDeViaje_fechaDeLiberacion as LIBERACION_FECHA,
    viaje.viaje_fechaDeArribo as FECHA_ARRIBO,
    viaje.viaje_fechaDeArribo as FECHA_CARGA,
    viaje.viaje_fechaDeDescarga as FECHA_DESCARGA,
    viaje.viaje_fechaDeDescarga as FOLIO_DE_DESCARGA,
    (viaje.viaje_cargaCantidad * viaje.viaje_cargaProporcionUM) as TONELADAS,
    hoja_de_viaje.hojaDeViaje_observaciones as OBSERVACIONES,
    viaje.viaje_fechaDeDescarga as FECHA_ENTREGA,
    destino.destino_nombre as ORIGEN,
    viaje.viaje_destino as DESTINO,
    (SELECT empresaReceptoraNombre FROM empresa_receptora WHERE empresaReceptoraId = viaje.id_empresaReceptora) as CLIENTE,
    viaje.id_viajeEstado as ID_ESTADO,
    viaje.viaje_folioDeCarga AS FOLIO_CARGA,
    viaje.viaje_folioDeBascula AS FOLIO_BASCULA,
    viaje.viaje_sellos AS SELLOS,
    viaje.viaje_observacion_carga AS OBSERBVACIONES_CARGA
    FROM `viaje` 
    INNER JOIN tractor_del_operador ON tractor_del_operador.id_hojaDeViaje = viaje.id_hojaDeViaje
    INNER JOIN hoja_de_viaje ON hoja_de_viaje.id_hojaDeViaje = viaje.id_hojaDeViaje
    INNER JOIN destino ON destino.destino_id = viaje.viaje_origen
    INNER JOIN viaje_estado ON viaje_estado.id_viajeEstado= viaje.id_viajeEstado
    ORDER BY hoja_de_viaje.id_hojaDeViaje asc";
    $html="";
    $result = $mysqli->query($consulta);
    while ($filas =$result->fetch_assoc()) 
    {
        $html .= 
        "<tr bgcolor='".$filas["TR_COLOR_ESTADO"]."' style='color:black; '>".
            "<td>".$filas["ID"]."</td>".
            "<td>".$filas["ESTADO_VIAJE"]."</td>".
            "<td>".substr($filas["LIBERACION_FECHA"],0,10)."</td>".  
            "<td>".substr($filas["FECHA_ARRIBO"],0,10)."</td>".  
            "<td>".substr($filas["FECHA_CARGA"],0,10)."</td>".  
            "<td>".substr($filas["FECHA_DESCARGA"],0,10)."</td>".
            "<td>".$filas["ECONOMICO"]."</td>".
            "<td>".$filas["CLIENTE"]."</td>".
            "<td>".$filas["OPERADOR"]."</td>".
            "<td>".$filas["LICENCIA"]."</td>".
            "<td>".$filas["PLACAS"]."</td>".
            "<td>".$filas["CAJAS"]."</td>".
            "<td>".$filas["TALON1"]."</td>".
            "<td>".$filas["TALON2"]."</td>".                         
            "<td>".$filas["TONELADAS"]."</td>".
            "<td>".$filas["OBSERVACIONES"]."</td>".
            "<td>".$filas["OBSERBVACIONES_CARGA"]."</td>".
            "<td>".$filas["FOLIO_CARGA"]."</td>".
            "<td>".$filas["FOLIO_BASCULA"]."</td>".
            "<td>".$filas["SELLOS"]."</td>".
            "<td>".$filas["ORIGEN"]."</td>".
            '<td><a href="'.$filas["URL"].'?id='.$filas["ID"].'"><button type="button" class="btn btn-success">Siguiente Paso</button></a></td>'.
        "</tr>";
    }
    $html= ($html!= ""||$html!= NULL)?$html:"<h1>Tractor sin remolques!</h1>";
    return $html;
}
?>