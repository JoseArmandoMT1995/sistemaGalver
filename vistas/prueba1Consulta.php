<?php 
 include "../controlador/coneccion/config.php";
 $string=$_POST["string"];
 $estado=$_POST["estado"];
 $consulta="SELECT  
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
 WHERE
 viaje.id_hojaDeViaje='$string' OR
 viaje.id_viaje= '$string' OR
 (SELECT empresaEmisoraNombre FROM empresa_emisora WHERE empresaEmisoraId= viaje.id_empresaEmisora LIMIT 1) LIKE '%$string%' OR
 (SELECT empresaReceptoraNombre FROM empresa_receptora WHERE empresaReceptoraId = viaje.id_empresaReceptora) LIKE '%$string%' OR
 (SELECT operadorNombre FROM operadores WHERE operadorID= tractor_del_operador.id_operador LIMIT 1) LIKE '%$string%' OR
 (SELECT tractorPlaca FROM tractor WHERE tractorId= tractor_del_operador.id_tractor LIMIT 1) LIKE '%$string%' OR
 (SELECT remolqueEconomico FROM remolque WHERE remolque.remolqueID = viaje.id_remolque LIMIT 1) LIKE '%$string%' OR
 (SELECT operadorLisencia FROM operadores WHERE operadorID= tractor_del_operador.id_operador LIMIT 1) LIKE '%$string%' OR
 viaje.viaje_talon1 LIKE '%$string%' OR
 viaje.viaje_talon2 LIKE '%$string%' OR
 viaje.viaje_destino LIKE '%$string%' OR 
 destino.destino_nombre LIKE '%$string%' AND 
 viaje.id_viajeEstado LIKE '%$estado%' 
 ORDER BY hoja_de_viaje.id_hojaDeViaje asc";
 $viaje="";
 $result = $mysqli->query($consulta);
 while ($filas =$result->fetch_assoc()) {
    $talones=($filas["TALON2"]!="")?$filas["TALON1"]."<br>".$filas["TALON2"]:$filas["TALON1"];
    $viaje .= 
    "<tr bgcolor='#5cff1e' class='text-light font-weight-bold'>".
    "<td>".$filas["ID"]."</td>".
    "<td>".substr($filas["LIBERACION_FECHA"], 0, -9)."</td>".    
    "<td>".$filas["ECONOMICO"]."</td>".
    "<td>".$filas["CLIENTE"]."</td>".
    "<td>".$filas["OPERADOR"]."</td>".
    "<td>".$filas["LICENCIA"]."</td>".
    "<td>".$filas["PLACAS"]."</td>".
    "<td>".$filas["CAJAS"]."</td>".                                            
    "<td>".$talones."</td>".
    "<td>".$filas["TONELADAS"]."</td>".
    "<td>".$filas["ORIGEN"]."</td>".        
    "<td><a href='./HDV_ArriboEdicion.php?id=".$filas["ID"]."'><button type='button' class='btn btn-warning'><i class='fas fa-edit'></i></button></a></td>".
    "<td><a href='./HDV_Arribo.php?id=".$filas["ID_VIAJE"]."'><button type='button' class='btn btn-warning'><i class='fas fa-arrow-alt-circle-right'></i></button></a></td>".
    "</tr>";
}
 echo ($viaje);
?>  