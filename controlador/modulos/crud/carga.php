<?php
session_start();
include "../../coneccion/config.php";
$creador= $_SESSION['usuarioId'];
if (isset($_POST)) 
{
    switch ($_POST["tipo"])
    {
        case '1':
            $consulta=
            "INSERT INTO `carga` 
            (`cargaId`, `cargaNombre`, `cargaDescripcion`, `cargaFecaCreacion`, 
            `usuarioId`) VALUES 
            (NULL, '".$_POST["data"]["cargaNombre"]."', '".$_POST["data"]["cargaDescripcion"]."', 
            '".$_POST["data"]["cargaFecaCreacion"]."', '$creador');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `carga` SET 
            `cargaNombre` = '".$_POST["data"]["cargaNombre"]."', 
            `cargaDescripcion` = '".$_POST["data"]["cargaDescripcion"]."'
            WHERE `carga`.`cargaId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="UPDATE `carga` SET 
            `estadoRegistro` = '1'
            WHERE `carga`.`cargaId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `carga` WHERE `cargaId`=".$_POST['id'];
            $consulta=$mysqli->query($consulta);
            while ($filas =$consulta->fetch_assoc()) 
            {
                echo json_encode($filas);
                break;
            }
            break;
        case '5':     
            $consulta= muestraCarga($mysqli,$_POST["parametro"]);
            $html1="";
            $html2="";
            while ($filas =$consulta->fetch_assoc()) 
            {
                $html2 .= 
                "<tr bgcolor ='#DC143C' style='color:#FFFFFF'>".
                    "<td>".$filas["cargaId"]."</td>".
                    "<td>".$filas["cargaNombre"]."</td>".
                    "<td>".$filas["cargaDescripcion"]."</td>".
                    "<td>".$filas["cargaFecaCreacion"]."</td>".
                    "<td>".$filas["usuarioNombre"]."</td>".
                    "<td></td>".
                    "<td><button type='button' class='btn btn-warning'
                    onclick='restaorarRegistro(".$filas["cargaId"].")'><i class='fas fa-recycle'></i></button></td>".
                "</tr>";
                $html1 .= 
                "<tr bgcolor ='#6B8E23' style='color:#FFFFFF'>".
                    "<td>".$filas["cargaId"]."</td>".
                    "<td>".$filas["cargaNombre"]."</td>".
                    "<td>".$filas["cargaDescripcion"]."</td>".
                    "<td>".$filas["cargaFecaCreacion"]."</td>".
                    "<td>".$filas["usuarioNombre"]."</td>".
                    "<td><button type='button' class='btn btn-danger' onclick='eliminarCarga(".$filas["cargaId"].")')><i class='fas fa-trash-alt'></i></button></td>".
                    "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                    data-target='#UPDATE' onclick='editarPaso1Id(".$filas["cargaId"].")'><i class='fas fa-edit'></i></button></td>".
                "</tr>";
            }
            echo ($_POST["caso"]==='0'||$_POST["caso"]===0)?$html1:$html2;
            break;
        case '6':
            $consulta="UPDATE `carga` SET 
            `estadoRegistro` = '0'
            WHERE `carga`.`cargaId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '7':
            $cambio=$_POST['editado'];
            $consulta="UPDATE `carga` SET `estadoRegistro` = $cambio WHERE carga.estadoRegistro= ".$_POST['caso'];
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
function muestraCarga($mysqli,$parametro)
{
    $result = $mysqli->query("SELECT * FROM `carga` INNER JOIN usuario ON usuario.usuarioId= carga.usuarioId WHERE carga.estadoRegistro = $parametro");   
    return $result;
}
?>