<?php 
include "../controlador/coneccion/config.php";
$array=[];
$array[]=retornaArray("", $mysqli,"<","#66FF00","FALTA DE TIEMPO");
$array[]=retornaArray("", $mysqli,"=","#FF8C00","TIEMPO LIMITE");
$array[]=retornaArray("", $mysqli,">","#FF0000","USTED EXEDIO EL TIEMPO");
retornaRegistros($array);
/* 
$filas.="<tr bgcolor='".$array[$i][$e]["COLOR_FILA"]."' class='text-light font-weight-bold'>".
        "<td>".$i++."</td>".
        "<td>".$array[$i][$e]["ID"]."</td>".
        "<td>s</td>".
        "<td>".$array[$i][$e]["FECHA_DESCARGA"]."</td>".
        "<td>".$array[$i][$e]["FECHA_LIMITE"]."</td>".
        "<td>".$array[$i][$e]["FECHA_ACTUAL"]."</td>".
        "<td>".$array[$i][$e]["DIAS_RESTA"]."</td>".
        "</tr>";
*/
function retornaRegistros($array)
{
    $filas=[];
    for ($i=0; $i <= count($array); $i++) { 
        if (isset($array[$i])) {
            for ($e=0; $e <= count($array[$i]); $e++) { 
                if (isset($array[$i][$e])) {
                echo "<tr bgcolor='".$array[$i][$e]["COLOR_FILA"]."' class='text-light font-weight-bold'>";
                echo "<td></td>";
                echo "</tr>";
                    
                }
            }   
        }
        
    }
    return $filas;
} 
function retornaArray($string, $mysqli,$operador,$color,$estado)
{
    $consulta="SELECT 
    id_viaje AS ID, 
    viaje_fechaDeDescarga AS 
    FECHA_DESCARGA, date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY)AS FECHA_LIMITE,
    DATEDIFF(viaje_fechaDeDescarga, NOW()) AS DIAS_RESTA,
    NOW() AS FECHA_ACTUAL
    FROM `viaje` 
    WHERE `id_viajeEstado` = 4 
    AND (NOW() $operador date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY)) 
    AND (viaje_fechaDeDescarga LIKE '%$string%' OR date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY) LIKE '%$string%' ) 
    AND estadoRegistro = 0
    ORDER BY date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY) asc 
    ";
    //ORDER BY (date_add(viaje_fechaDeDescarga, INTERVAL +3 DAY)<= NOW()) asc
    $result = $mysqli->query($consulta);
    $array=[];
    while ($filas =$result->fetch_assoc()) 
    {
       $array[]=array(
           "ID"=>$filas["ID"],
           "FECHA_DESCARGA"=>substr($filas["FECHA_DESCARGA"], 0, -9),
           "FECHA_LIMITE"=>substr($filas["FECHA_LIMITE"], 0, -9),
           "FECHA_ACTUAL"=>substr($filas["FECHA_ACTUAL"], 0, -9),
           "DIAS_RESTA"=>$filas["DIAS_RESTA"],
           "COLOR_FILA"=>$color,
           "ESTADO"=>$estado
        );
    }
    return $array;
}
?>