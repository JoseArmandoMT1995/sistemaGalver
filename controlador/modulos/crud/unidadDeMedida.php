<?php
include "../../coneccion/config.php";
session_start();
$creador= $_SESSION['usuarioId'];
if (isset($_POST)) 
{
    switch ($_POST["tipo"]) 
    {
        case '1':
            $consulta=
            "INSERT INTO `carga_unidad_de_medida` 
            (`cargaUnidadDeMedidaID`, `cargaUnidadDeMedidaNombre`, `cargaUnidadDeMedidaDescripcion`, `cargaUnidadDeMedidaFechaDeCreacion`, 
            `usuarioId`) VALUES 
            (NULL, '".$_POST["data"]["cargaUnidadDeMedidaNombre"]."', '".$_POST["data"]["cargaUnidadDeMedidaDescripcion"]."', 
            '".$_POST["data"]["cargaUnidadDeMedidaFechaDeCreacion"]."', '$creador');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `carga_unidad_de_medida` SET 
            `cargaUnidadDeMedidaNombre` = '".$_POST["data"]["cargaUnidadDeMedidaNombre"]."', 
            `cargaUnidadDeMedidaDescripcion` = '".$_POST["data"]["cargaUnidadDeMedidaDescripcion"]."'
            WHERE `carga_unidad_de_medida`.`cargaUnidadDeMedidaID` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="UPDATE `carga_unidad_de_medida` SET 
                `estadoRegistro` = '1'
                WHERE `cargaUnidadDeMedidaID` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `carga_unidad_de_medida` WHERE `cargaUnidadDeMedidaID`=".$_POST['id'];
            $consulta=$mysqli->query($consulta);
            while ($filas =$consulta->fetch_assoc()) 
            {
                echo json_encode($filas);
                break;
            }
            break;
        case '5':     
            $consulta= muestraUM($mysqli,$_POST["parametro"]);    
            $html1="";
            $html2="";
            while ($filas =$consulta->fetch_assoc()) 
            {
                $html2 .= 
                "<tr bgcolor ='#DC143C' style='color:#FFFFFF'>".
                "<td>".$filas["cargaUnidadDeMedidaID"]."</td>".
                "<td>".$filas["cargaUnidadDeMedidaNombre"]."</td>".
                "<td>".$filas["cargaUnidadDeMedidaDescripcion"]."</td>".
                "<td>".$filas["cargaUnidadDeMedidaFechaDeCreacion"]."</td>".
                "<td>".$filas["usuarioNombre"]."</td>".
                    "<td></td>".
                    "<td><button type='button' class='btn btn-warning'
                    onclick='restaorarRegistro(".$filas["cargaUnidadDeMedidaID"].")'><i class='fas fa-recycle'></i></button></td>".
                "</tr>";
                $html1 .= 
                "<tr bgcolor ='#6B8E23' style='color:#FFFFFF'>".
                    "<td>".$filas["cargaUnidadDeMedidaID"]."</td>".
                    "<td>".$filas["cargaUnidadDeMedidaNombre"]."</td>".
                    "<td>".$filas["cargaUnidadDeMedidaDescripcion"]."</td>".
                    "<td>".$filas["cargaUnidadDeMedidaFechaDeCreacion"]."</td>".
                    "<td>".$filas["usuarioNombre"]."</td>".
                    "<td><button type='button' class='btn btn-danger' onclick='eliminarEmpresaEmisora(".$filas["cargaUnidadDeMedidaID"].")')><i class='fas fa-trash-alt'></i></button></td>".
                    "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                    data-target='#UPDATE' onclick='editarPaso1Id(".$filas["cargaUnidadDeMedidaID"].")'><i class='fas fa-edit'></i></button></button></td>".
                "</tr>";
            }
            echo ($_POST["caso"]==='0'||$_POST["caso"]===0)?$html1:$html2;
            break;
        case '6':
            $consulta="UPDATE `destino` SET 
            `estadoRegistro` = '0'
            WHERE `destino_id` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '7':
            $cambio=$_POST['editado'];
            $consulta="UPDATE `destino` SET `estadoRegistro` = $cambio WHERE destino.estadoRegistro= ".$_POST['caso'];
            echo  $consulta;echo "<hr>";
            echo $mysqli->query($consulta);
            break;
        default:
            echo false;
            break;
    }
} 
else 
{
    echo false;
}
function muestraUM($mysqli,$parametro)
{
    $result = $mysqli->query("SELECT * FROM carga_unidad_de_medida INNER JOIN usuario ON carga_unidad_de_medida.usuarioId= usuario.usuarioId WHERE carga_unidad_de_medida.estadoRegistro = $parametro");   
    return $result;
}
?>