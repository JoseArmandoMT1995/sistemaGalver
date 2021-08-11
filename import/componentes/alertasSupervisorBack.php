<?php
include '../../controlador/coneccion/config.php';
echo listAlerta($mysqli);
function listAlerta($mysqli)
{
    $consulta="SELECT 
    id_viaje AS ID, 
    viaje_fechaDeDescarga AS 
    FECHA_DESCARGA, DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')AS FECHA_LIMITE,
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
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') < DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN 'bg-success' 
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') = DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN 'bg-warning' 
        WHEN (DATE_FORMAT(now(), '%Y-%m-%d') > DATE_FORMAT(date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY), '%Y-%m-%d')) THEN 'bg-danger' 
        END
    )AS COLOR_ICONO
    FROM `viaje` 
    WHERE `id_viajeEstado` = 4 
    AND estadoRegistro = 0
    ORDER BY date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY) DESC LIMIT 3";
    $result = $mysqli->query($consulta);
    $viaje="";
    while ($filas =$result->fetch_assoc()) 
    {
       $viaje.=
       '<a class="dropdown-item d-flex align-items-center" href="#">'.
            '<div class="mr-3">'.
                '<div class="icon-circle '.$filas["COLOR_ICONO"].'">'.
                    '<i class="fas fa-exclamation-triangle text-white"></i>'.
                '</div>'.
            '</div>'.
            '<div>'.
                '<div class="small text-gray-500">'.$filas["FECHA_LIMITE"].'</div>'.
                '<span class="font-weight-bold">'.$filas["PARAMETRO"].'</span>'.
            '</div>'.
        '</a>';
    }
    return ($viaje);
}
?>