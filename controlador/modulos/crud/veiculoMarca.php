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
            "INSERT INTO `tractor_marca` 
            (`tractorMarcaId`, `tractorMarcaNombre`, `tractorMarcaCreacion`, `usuarioId`) VALUES 
            (NULL, '".$_POST["data"]["tractorMarcaNombre"]."', '".$_POST["data"]["tractorMarcaCreacion"]."', '".$creador."');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `tractor_marca` SET `tractorMarcaNombre` = '".$_POST["data"]["tractorMarcaNombre"]."' WHERE `tractor_marca`.`tractorMarcaId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="UPDATE `tractor_marca` SET 
                `estadoRegistro` = '1'
                WHERE `tractorMarcaId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `tractor_marca` WHERE `tractorMarcaId`=".$_POST['id'];
            $consulta=$mysqli->query($consulta);
            while ($filas =$consulta->fetch_assoc()) 
            {
                echo json_encode($filas);
                break;
            }
            break;
        case '5':     
            $consulta= muestraTractorMarca($mysqli,$_POST["parametro"]);
            $html1="";
            $html2="";
            while ($filas =$consulta->fetch_assoc()) 
            {
                $html2 .= 
                "<tr bgcolor ='#DC143C' style='color:#FFFFFF'>".
                    "<td>".$filas["tractorMarcaId"]."</td>".
                    "<td>".$filas["tractorMarcaNombre"]."</td>".
                    "<td>".$filas["tractorMarcaCreacion"]."</td>".
                    "<td>".$filas["usuarioNombre"]."</td>".
                    "<td></td>".
                    "<td><button type='button' class='btn btn-warning'
                    onclick='restaorarRegistro(".$filas["tractorMarcaId"].")'><i class='fas fa-recycle'></i></button></td>".
                "</tr>";
                $html1 .= 
                "<tr bgcolor ='#6B8E23' style='color:#FFFFFF'>".
                    "<td>".$filas["tractorMarcaId"]."</td>".
                    "<td>".$filas["tractorMarcaNombre"]."</td>".
                    "<td>".$filas["tractorMarcaCreacion"]."</td>".
                    "<td>".$filas["usuarioNombre"]."</td>".
                    "<td><button type='button' class='btn btn-danger' onclick='eliminarMrca(".$filas["tractorMarcaId"].")')><i class='fas fa-trash-alt'></i></button></td>".
                    "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                    data-target='#UPDATE' onclick='editarPaso1Id(".$filas["tractorMarcaId"].")'><i class='fas fa-edit'></i></button></td>".
                "</tr>";
            }
            echo ($_POST["caso"]==='0'||$_POST["caso"]===0)?$html1:$html2;
            break;
        case '6':
            $consulta="UPDATE `tractor_marca` SET 
            `estadoRegistro` = '0' WHERE `tractorMarcaId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
             break;
        case '7':
            $cambio=$_POST['editado'];
            $consulta="UPDATE `tractor_marca` SET `estadoRegistro` = $cambio WHERE tractor_marca.estadoRegistro= ".$_POST['caso'];
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
function muestraTractorMarca($mysqli,$parametro)
{
    $result = $mysqli->query("SELECT * FROM tractor_marca 
    INNER JOIN usuario ON tractor_marca.usuarioId= usuario.usuarioId WHERE tractor_marca.estadoRegistro = $parametro");   
    return $result;
}
?>