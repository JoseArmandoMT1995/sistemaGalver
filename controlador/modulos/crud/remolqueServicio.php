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
            "INSERT INTO `remolque_carga` 
            (`remolqueCargaId`, `remolqueCargaServicio`, `remolqueCargaImpuesto`, `remolqueCargaFechaCreacion`,`usuarioId`) VALUES 
            (NULL,
            '".$_POST["data"]["remolqueCargaServicio"]."', 
            '".$_POST["data"]["remolqueCargaImpuesto"]."', 
            '".$_POST["data"]["remolqueCargaFechaCreacion"]."', 
            '$creador');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `remolque_carga` SET 
            `remolqueCargaServicio` = '".$_POST["data"]["remolqueCargaServicio"]."', 
            `remolqueCargaImpuesto` = '".$_POST["data"]["remolqueCargaImpuesto"]."'
            WHERE `remolque_carga`.`remolqueCargaId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta=
                "UPDATE `remolque_carga` SET 
                `estadoRegistro` = '1'
                WHERE `remolqueCargaId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `remolque_carga` WHERE `remolqueCargaId`=".$_POST['id'];
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
                        "<td>".$filas["remolqueCargaId"]."</td>".
                        "<td>".$filas["remolqueCargaServicio"]."</td>".
                        "<td>".$filas["remolqueCargaImpuesto"]."</td>".
                        "<td>".$filas["remolqueCargaFechaCreacion"]."</td>".
                        "<td>".$filas["usuarioNombre"]."</td>".
                        "<td></td>".
                        "<td><button type='button' class='btn btn-warning'
                        onclick='restaorarRegistro(".$filas["remolqueCargaId"].")'><i class='fas fa-recycle'></i></button></td>".
                    "</tr>";
                    $html1 .= 
                    "<tr bgcolor ='#6B8E23' style='color:#FFFFFF'>".
                    "<td>".$filas["remolqueCargaId"]."</td>".
                        "<td>".$filas["remolqueCargaServicio"]."</td>".
                        "<td>".$filas["remolqueCargaImpuesto"]."</td>".
                        "<td>".$filas["remolqueCargaFechaCreacion"]."</td>".
                        "<td>".$filas["usuarioNombre"]."</td>".
                        "<td><button type='button' class='btn btn-danger' onclick='eliminarRemolque(".$filas["remolqueCargaId"].")')><i class='fas fa-trash-alt'></i></button></td>".
                        "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                        data-target='#UPDATE' onclick='editarPaso1Id(".$filas["remolqueCargaId"].")'><i class='fas fa-edit'></i></button></button></td>".
                    "</tr>";
                }
            echo ($_POST["caso"]==='0'||$_POST["caso"]===0)?$html1:$html2;
            break;
        case '6':
            $consulta="UPDATE `remolque_carga` SET 
            `estadoRegistro` = '0'
            WHERE `remolqueCargaId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '7':
            $cambio=$_POST['editado'];
            $consulta="UPDATE `remolque_carga` SET `estadoRegistro` = $cambio WHERE remolque_carga.estadoRegistro= ".$_POST['caso'];
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
    $result = $mysqli->query("SELECT * FROM remolque_carga INNER JOIN usuario ON remolque_carga.usuarioId= usuario.usuarioId WHERE remolque_carga.estadoRegistro = $parametro");   
    return $result;
}
?>