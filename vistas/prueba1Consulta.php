<?php 
include "../controlador/coneccion/config.php";
if ($_POST["caso"]==="1") {echo retornaTabla($_POST["string"], $mysqli);}
if ($_POST["caso"]==="2") {echo buscarId($_POST["id"], $mysqli);}
function retornaTabla($string, $mysqli)
{
    $consulta="SELECT 
    id_viaje AS ID, 
    DATE_FORMAT(viaje_fechaDeDescarga, '%Y-%m-%d') AS FECHA_DESCARGA, 
    DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')AS FECHA_LIMITE,
    DATEDIFF(viaje_fechaDeDescarga, DATE_FORMAT(now(), '%Y-%m-%d')) AS DIAS_RESTA,
    DATE_FORMAT(now(), '%Y-%m-%d') AS FECHA_ACTUAL,
    (
    	CASE
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') < DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN 'FALTAN DIAS PARA EL PAGO' 
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') = DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN 'LIMITE DE PAGO HOY' 
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') > DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN 'EXEDIO EL LIMITE DE PAGO' 
        END
    )
    AS PARAMETRO,
    (
    	CASE
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') < DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN '#9bff43'
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') = DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN '#fcff43' 
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') > DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN '#ff4343' 
        END
    )
    AS COLOR_TR,
    (
    	CASE
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') < DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN 'text-dark'
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') = DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN 'text-dark' 
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') > DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN 'text-light' 
        END
    )
    AS COLOR_TEXTO
    FROM `viaje` 
    WHERE `id_viajeEstado` = 4 
    AND estadoRegistro = 0
    AND (viaje_fechaDeDescarga LIKE '%$string%' OR DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d') LIKE '%$string%' ) 
    ORDER BY date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY) DESC
    ";
    $viaje="";
    $result = $mysqli->query($consulta);
    $n=1;
    while ($filas =$result->fetch_assoc()) 
    {
       $viaje .= 
       "<tr bgcolor='".$filas["COLOR_TR"]."' class='".$filas["COLOR_TEXTO"]." font-weight-bold'>".
       "<td>".$n++."</td>".
       "<td><button type='button' class='btn btn-info'  onclick='verInfoId(".$filas["ID"].")'>".$filas["ID"]."</button></td>".
       "<td>".$filas["PARAMETRO"]."</td>".
       "<td>".$filas["FECHA_DESCARGA"]."</td>".
       "<td>".$filas["FECHA_LIMITE"]."</td>".
       "<td>".$filas["FECHA_ACTUAL"]."</td>".
       "<td>".$filas["DIAS_RESTA"]."</td>".
       "</tr>";
    }
    return ($viaje);
}
function buscarId($id,$mysqli)
{
    $consulta="SELECT
	viaje.id_viaje,
    viaje.viaje_talon1,
    viaje.viaje_talon2,
    viaje.id_hojaDeViaje,
    hoja_de_viaje.hojaDeViaje_fechaDeLiberacion,
    viaje.viaje_fechaDeArribo,
    viaje.viaje_fechaDeCarga,
    viaje.viaje_fechaDeDescarga,
    tractor_del_operador.id_operador,
    viaje.viaje_cargaCantidad,
    viaje.viaje_cargaProporcionUM,
    viaje.viaje_folioDeCarga,
    viaje.viaje_folioDeBascula,
    viaje.viaje_sellos,
    viaje.viaje_origen,
    viaje.viaje_destino,
    (select operadorNombre from operadores where operadores.operadorID=tractor_del_operador.id_operador LIMIT 1) as nombre_operador,
    (select operadorLisencia from operadores where operadores.operadorID=tractor_del_operador.id_operador LIMIT 1) as licencia_operador,
    (select tractorEconomico from tractor where tractor.tractorId=tractor_del_operador.id_tractor LIMIT 1) as economico_tractor,
    (select tractorPlaca from tractor where tractor.tractorId=tractor_del_operador.id_tractor LIMIT 1) as ecoonomico_tractor,
    empresa_emisora.empresaEmisoraNombre,
    empresa_emisora.empresaEmisoraRFC,
    empresa_receptora.empresaReceptoraNombre,
    empresa_receptora.empresaReceptoraRFC,
    carga.cargaNombre,
    carga_unidad_de_medida.cargaUnidadDeMedidaNombre,
    (select destino_nombre from destino where destino.destino_id= viaje.viaje_origen) as origen,
    (select destino_nombre from destino where destino.destino_id= viaje.viaje_destino) as destino
    FROM viaje 
    INNER JOIN hoja_de_viaje
    on hoja_de_viaje.id_hojaDeViaje = viaje.id_hojaDeViaje
    INNER JOIN tractor_del_operador
    on tractor_del_operador.id_hojaDeViaje= viaje.id_hojaDeViaje
    INNER JOIN empresa_emisora
    on empresa_emisora.empresaEmisoraId= viaje.id_empresaEmisora
    INNER JOIN empresa_receptora
    on empresa_receptora.empresaReceptoraId= viaje.id_empresaReceptora
    INNER JOIN carga 
    ON carga.cargaId = viaje.id_carga
    INNER JOIN carga_unidad_de_medida 
    ON carga_unidad_de_medida.cargaUnidadDeMedidaID = viaje.id_unidadDeMedida
    WHERE viaje.id_viaje =$id"; 
    $result = $mysqli->query($consulta);
    //print_r($result);    
    while ($filas =$result->fetch_assoc()) 
    {
        $consulta= 
        '<ul class="list-group">'.
            '<li class="list-group-item list-group-item-secondary">
            <div class="container-fluid">
                <div class="row font-weight-bold">
                    <div class="col-sm">
                    ID DE VIAJE:
                    </div>
                    <div class="col-sm">
                    ID DE REMOLQUE:
                    </div>
                    <div class="col-sm">
                    TALON:
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                    '.$filas["id_hojaDeViaje"].'
                    </div>
                    <div class="col-sm">
                    '.$filas["id_viaje"].'
                    </div>
                    <div class="col-sm">
                    '.$filas["viaje_talon1"].'-'.$filas["viaje_talon2"].'
                    </div>
                </div>
            </div>
            </li>'.
            '<li class="list-group-item ">
            <div class="container-fluid">
                <div class="row font-weight-bold">
                    <div class="col-sm">
                    Fecha Liberacion:
                    </div>
                    <div class="col-sm">
                    Fecha Arribo:
                    </div>
                    <div class="col-sm">
                    Fecha Carga:
                    </div>
                    <div class="col-sm">
                    Fecha Descarga:
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                    '.$filas["hojaDeViaje_fechaDeLiberacion"].'
                    </div>
                    <div class="col-sm">
                    '.$filas["viaje_fechaDeArribo"].'
                    </div>
                    <div class="col-sm">
                    '.$filas["viaje_fechaDeCarga"].'
                    </div>
                    <div class="col-sm">
                    '.$filas["viaje_fechaDeDescarga"].'
                    </div>
                </div>
            </div>
            </li>'.
            '<li class="list-group-item ">
            <div class="container-fluid">
                <div class="row font-weight-bold">
                    <div class="col-sm">
                    Nombre Empresa Emisora:
                    </div>
                    <div class="col-sm">
                    RFC Empresa Emisora:
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                    '.$filas["empresaEmisoraNombre"].'
                    </div>
                    <div class="col-sm">
                    '.$filas["empresaEmisoraRFC"].'
                    </div>
                </div>
            </div>
            </li>
            <li class="list-group-item ">
            <div class="container-fluid">
                <div class="row font-weight-bold">
                    <div class="col-sm">
                    Nombre Empresa Receptora:
                    </div>
                    <div class="col-sm">
                    RFC Empresa Receptora:
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                    '.$filas["empresaReceptoraNombre"].'
                    </div>
                    <div class="col-sm">
                    '.$filas["empresaReceptoraRFC"].'
                    </div>
                </div>
            </div>
            </li>'.
            '<li class="list-group-item ">
                <div class="container-fluid">
                <div class="row font-weight-bold">

                    <div class="col-sm">
                    FOLIO DE CARGA:
                    </div>
                    <div class="col-sm">
                    FOLIO DE BASCULA:
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                    '.$filas["viaje_folioDeCarga"].'
                    </div>
                    <div class="col-sm">
                    '.$filas["viaje_folioDeBascula"].'
                    </div>
                </div>
            </div>
            </li>'.
            '<li class="list-group-item ">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-sm font-weight-bold">
                    SELLOS:
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                    '.$filas["viaje_sellos"].'
                    </div>
                </div>
            </div>
            </li>'.
            
            '<li class="list-group-item ">
                <div class="container-fluid">
                <div class="row font-weight-bold">
                    <div class="col-sm">
                    ORIGEN:
                    </div>
                    <div class="col-sm">
                    DESTINO:
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                    '.$filas["origen"].'
                    </div>
                    <div class="col-sm">
                    '.$filas["destino"].'
                    </div>
                </div>
            </div>
            </li>'.
        '</ul>';
        
    }

    return $consulta;
}
?>  

    
    