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
            "INSERT INTO `tractor` 
            (`tractorId`, `usuarioId`, `tractorPlaca`, `tractorEconomico`, 
            `tractorFechaCreacion`, `tractorMarcaId`) VALUES 
            (
            NULL, '".$creador."', '".$_POST["data"]["tractorPlaca"]."', 
            '".$_POST["data"]["tractorEconomico"]."', 
            '".$_POST["data"]["tractorFechaCreacion"]."', 
            '".$_POST["data"]["tractorMarcaId"]."');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `tractor` SET 
            `tractorEconomico` = '".$_POST["data"]["tractorEconomico"]."', 
            `tractorPlaca` = '".$_POST["data"]["tractorPlaca"]."', 
            `tractorMarcaId` = '".$_POST["data"]["tractorMarcaId"]."'
            WHERE `tractor`.`tractorId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="UPDATE `tractor` SET 
                `estadoRegistro` = '1'
                WHERE `tractorId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `tractor` WHERE `tractorId`=".$_POST['id'];
            $consulta=$mysqli->query($consulta);
            while ($filas =$consulta->fetch_assoc()) 
            {
                echo json_encode($filas);
                break;
            }
            break;
        case '5':     
                $consulta= muestraTractor($mysqli,$_POST["parametro"]);
                $html1="";
                $html2="";
                while ($filas =$consulta->fetch_assoc()) 
                {
                    $html2 .= 
                    "<tr bgcolor ='#DC143C' style='color:#FFFFFF'>".
                        "<td>".$filas["tractorId"]."</td>".
                        "<td>".$filas["tractorEconomico"]."</td>".
                        "<td>".$filas["tractorPlaca"]."</td>".
                        "<td>".$filas["tractorMarcaNombre"]."</td>".
                        "<td>".$filas["tractorFechaCreacion"]."</td>".
                        "<td>".$filas["usuarioNombre"]."</td>".
                        "<td></td>".
                        "<td><button type='button' class='btn btn-warning'
                        onclick='restaorarRegistro(".$filas["tractorId"].")'><i class='fas fa-recycle'></i></button></td>".
                    "</tr>";
                    $html1 .= 
                    "<tr bgcolor ='#6B8E23' style='color:#FFFFFF'>".
                        "<td>".$filas["tractorId"]."</td>".
                        "<td>".$filas["tractorEconomico"]."</td>".
                        "<td>".$filas["tractorPlaca"]."</td>".
                        "<td>".$filas["tractorMarcaNombre"]."</td>".
                        "<td>".$filas["tractorFechaCreacion"]."</td>".
                        "<td>".$filas["usuarioNombre"]."</td>".
                        "<td><button type='button' class='btn btn-danger' onclick='eliminarTractor(".$filas["tractorId"].")')><i class='fas fa-trash-alt'></i></button></td>".
                        "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                        data-target='#UPDATE' onclick='editarPaso1Id(".$filas["tractorId"].")'><i class='fas fa-edit'></i></button></td>".
                    "</tr>";
                }
            echo ($_POST["caso"]==='0'||$_POST["caso"]===0)?$html1:$html2;
            break;
        case '6':
            $consulta="UPDATE `tractor` SET 
            `estadoRegistro` = '0'
            WHERE `tractorId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '7':
            $cambio=$_POST['editado'];
            $consulta="UPDATE `tractor` SET `estadoRegistro` = $cambio WHERE tractor.estadoRegistro= ".$_POST['caso'];
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
function muestraTractor($mysqli,$parametro)
{
    $result = $mysqli->query("SELECT * FROM tractor 
    INNER JOIN tractor_marca ON tractor_marca.tractorMarcaId= tractor.tractorMarcaId 
    INNER JOIN usuario ON tractor.usuarioId= usuario.usuarioId WHERE tractor.estadoRegistro = $parametro");   
    return $result;
}
?>