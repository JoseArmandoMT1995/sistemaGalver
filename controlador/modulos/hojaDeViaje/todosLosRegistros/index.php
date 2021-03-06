<?php
include "../../../coneccion/config.php";
if (isset($_POST)) 
{
    if ($_POST["caso"]=="1"){echo consultaSqlRegistrosViaje($mysqli,$_POST["id"]);}else{echo false;}
}
else
{
    echo false;
}
function consultaSqlRegistrosViaje($mysqli,$id)
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
    WHERE viaje.id_hojaDeViaje ='$id'
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
            "<td class='font-weight-bold'>".$filas["TALON1"]."</td>".
            "<td>".$filas["TALON2"]."</td>".                         
            "<td>".$filas["TONELADAS"]."</td>".
            "<td>".$filas["OBSERVACIONES"]."</td>".
            "<td>".$filas["OBSERBVACIONES_CARGA"]."</td>".
            "<td>".$filas["FOLIO_CARGA"]."</td>".
            "<td>".$filas["FOLIO_BASCULA"]."</td>".
            "<td>".$filas["SELLOS"]."</td>".
            "<td>".$filas["ORIGEN"]."</td>".
            '<td><a href="'.$filas["URL"].'?id='.$filas["ID"].'"><button type="button" class="btn btn-success"><i class="fas fa-arrow-alt-circle-right"></i></button></a></td>'.
        "</tr>";
    }
    $html= ($html!= ""||$html!= NULL)?$html:"<h1>Tractor sin remolques!</h1>";
    return $html;
}
?>