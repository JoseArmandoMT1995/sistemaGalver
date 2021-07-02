<?php
    //tractoresMarca
    function muestraTractoresMarca($mysqli)
    {
        $result = $mysqli->query(
        "SELECT * FROM `tractor_marca`
        INNER JOIN usuario ON usuario.usuarioId= tractor_marca.usuarioId");
        return $result;
    }
    //traxtores
    function muestraTractores($mysqli)
    {
        $result = $mysqli->query(
        "SELECT * FROM `tractor` 
        INNER JOIN usuario ON usuario.usuarioId= tractor.usuarioId
        INNER JOIN tractor_marca ON tractor_marca.tractorMarcaId= tractor.tractorMarcaId");
        return $result;
    }
    //remolque
    function muestraRemolque($mysqli)
    {
        $result = $mysqli->query(
        "SELECT * FROM `remolque`
        INNER JOIN usuario ON usuario.usuarioId= remolque.usuarioId");
        return $result;
    }
    //Remolque carga
    function muestraRemolqueCarga($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `remolque_carga` INNER JOIN usuario ON usuario.usuarioId= remolque_carga.usuarioId");   
        return $result;
    }
    //carga
    function muestraCarga($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `carga` INNER JOIN usuario ON usuario.usuarioId= carga.usuarioId");   
        return $result;
    }
    //unidad de medida
    function muestraUnidadesDeMedida($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `carga_unidad_de_medida`  INNER JOIN usuario ON usuario.usuarioId= carga_unidad_de_medida.usuarioId");   
        return $result;
    }
    //empresa emisora
    function muestraEmpresaEmisoara($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM empresa_emisora INNER JOIN usuario ON usuario.usuarioId= empresa_emisora.usuarioId");
        return $result;
    }
    //empresa receptora
    function muestraEmpresaReceptora($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `empresa_receptora` 
        INNER JOIN usuario ON usuario.usuarioId= empresa_receptora.usuarioId");
        return $result;
    }
    //operador
    function muestraOperador($mysqli)
    {
        $result = $mysqli->query("SELECT * FROM `operadores` 
        INNER JOIN usuario ON usuario.usuarioId= operadores.usuarioId");
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
        $result = $mysqli->query("SELECT * FROM `destino`");
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
    function muestraHDVT($mysqli,$estado){
        $consulta=
        "SELECT hoja_de_viaje.id_hojaDeViaje AS ID
        , hoja_de_viaje.hojaDeViaje_fechaDeLiberacion AS FECHA_CREACION
        , hoja_de_viaje.hojaDeViaje_fechaDeEdicion AS FECHA_EDICION
        , (SELECT usuarioNombre FROM usuario WHERE usuario.usuarioId = hoja_de_viaje.id_creador LIMIT 1)AS CREADOR, 
        (SELECT usuarioNombre FROM usuario WHERE usuario.usuarioId = hoja_de_viaje.id_editor LIMIT 1)AS EDITOR, hoja_de_viaje.hojaDeViaje_estadoDeViaje AS ID_ESTADO, 
        hoja_de_viaje_estado.hdve_nombre AS ESTADO, 
        (SELECT (COUNT(*))AS NUM FROM viaje WHERE viaje.id_hojaDeViaje = hoja_de_viaje.id_hojaDeViaje LIMIT 1)AS ID_TIPO,
        (SELECT hoja_de_viaje_tipo.hdvt_nombre FROM hoja_de_viaje_tipo WHERE hoja_de_viaje_tipo.hdvt_id= (SELECT (COUNT(*))AS NUM FROM viaje WHERE viaje.id_hojaDeViaje = hoja_de_viaje.id_hojaDeViaje LIMIT 1) LIMIT 1) AS TIPO
        FROM hoja_de_viaje 
        INNER JOIN hoja_de_viaje_estado ON hoja_de_viaje_estado.hdve_id = hoja_de_viaje.hojaDeViaje_estadoDeViaje";
        $result = $mysqli->query($consulta);
        return $result;
    }
    function muestraHDVTC($mysqli,$estado){
        $consulta=
        "SELECT hoja_de_viaje.id_hojaDeViaje AS ID
        , hoja_de_viaje.hojaDeViaje_fechaDeLiberacion AS FECHA_CREACION
        , hoja_de_viaje.hojaDeViaje_fechaDeEdicion AS FECHA_EDICION
        , (SELECT usuarioNombre FROM usuario WHERE usuario.usuarioId = hoja_de_viaje.id_creador LIMIT 1)AS CREADOR, 
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
        //SI EXISTE 
        $consulta="SELECT * FROM `arribo_destinos` WHERE `id_viaje`=$id";
        $result = $mysqli->query($consulta);
        if ($result->num_rows == 0) 
        {
            $consulta=
            "INSERT INTO `arribo_destinos` 
            (`arriboDestino_id`, `arriboDestino_fecha`, `arriboDestino_destino`, `arriboDestino_causaDeCambio`, 
            `id_viaje`, `creador`, `editor`) 
            VALUES 
            (NULL, 
            (SELECT hoja_de_viaje.hojaDeViaje_fechaDeLiberacion FROM viaje INNER JOIN hoja_de_viaje ON hoja_de_viaje.id_hojaDeViaje= viaje.id_hojaDeViaje WHERE id_viaje = $id), 
            (SELECT viaje.viaje_origen FROM viaje WHERE id_viaje = $id), 
            'primera fecha y destino de arribo', 
            $id, 
            ".$_SESSION['usuarioId'].", 
            ".$_SESSION['usuarioId'].")";
            echo $consulta;
            $result= $mysqli->query($consulta);
            if ($result== true) {
                echo "<script> window.location='HDV_Arribo.php?id=$id'; </script>";
                exit;
            }
        }
    }
?>