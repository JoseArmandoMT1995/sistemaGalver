<?php 
 include "../controlador/coneccion/config.php";
 echo retornaTabla($_POST["string"], $mysqli);
 function retornaTabla($string, $mysqli)
{
    $consulta="SELECT 
    id_viaje AS ID, 
    DATE_FORMAT(viaje_fechaDeDescarga, '%Y-%m-%d') AS FECHA_DESCARGA
    , DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')AS FECHA_LIMITE,
    DATEDIFF(viaje_fechaDeDescarga, DATE_FORMAT(now(), '%Y-%m-%d')) AS DIAS_RESTA,
    DATE_FORMAT(now(), '%Y-%m-%d') AS FECHA_ACTUAL,
    (
    	CASE
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') < DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN 'FALTAN DIAS PARA EL PAGO' 
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') = DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN 'LIMITE DE PAGO HOY' 
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') > DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN 'EXEDIO EL LIMITE DE PAGO' 
        END
    )AS PARAMETRO,
    (
    	CASE
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') < DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN '#9bff43'
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') = DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN '#fcff43' 
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') > DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN '#ff4343' 
        END
    )AS COLOR_TR,
    (
    	CASE
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') < DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN 'text-light'
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') = DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN 'text-dark' 
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') > DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN 'text-light' 
        END
    )AS COLOR_TEXTO
    FROM `viaje` 
    WHERE `id_viajeEstado` = 4 
    AND estadoRegistro = 0
    AND (viaje_fechaDeDescarga LIKE '%$string%' OR DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d') LIKE '%$string%' ) 
    ORDER BY date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY) asc
    ";
    //AND (viaje_fechaDeDescarga LIKE '%$string%' OR date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY) LIKE '%$string%' ) 

    //ORDER BY (date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY)<= NOW()) asc
    $viaje="";
    $result = $mysqli->query($consulta);
    $n=1;
    while ($filas =$result->fetch_assoc()) 
    {
       $viaje .= 
       "<tr bgcolor='".$filas["COLOR_TR"]."' class='".$filas["COLOR_TEXTO"]." font-weight-bold'>".
       "<td>".$n++."</td>".
       "<td>".$filas["ID"]."</td>".
       "<td>".$filas["PARAMETRO"]."</td>".
       "<td>".$filas["FECHA_DESCARGA"]."</td>".
       "<td>".$filas["FECHA_LIMITE"]."</td>".
       "<td>".$filas["FECHA_ACTUAL"]."</td>".
       "<td>".$filas["DIAS_RESTA"]."</td>".
       "</tr>";
    }
    return ($viaje);
}
?>  

    
    