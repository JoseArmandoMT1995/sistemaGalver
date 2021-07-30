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
            "INSERT INTO `remolque` 
            (`remolqueID`, `remolquePlaca`, `remolqueEconomico`, `remolqueFechaCreacion`, 
            `usuarioId`) VALUES 
            (NULL, '".$_POST["data"]["remolquePlaca"]."', '".$_POST["data"]["remolqueEconomico"]."', 
            '".$_POST["data"]["remolqueFechaCreacion"]."', '$creador');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `remolque` SET 
            `remolquePlaca` = '".$_POST["data"]["remolquePlaca"]."', 
            `remolqueEconomico` = '".$_POST["data"]["remolqueEconomico"]."'
            WHERE `remolque`.`remolqueID` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta=
            "UPDATE `remolque` SET 
            `estadoRegistro` = '1'
            WHERE `remolque`.`remolqueID` = ".$_POST['id'];
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `remolque` WHERE `remolqueID`=".$_POST['id'];
            $consulta=$mysqli->query($consulta);
            while ($filas =$consulta->fetch_assoc()) 
            {
                echo json_encode($filas);
                break;
            }
            break;
            case '5':     
                $consulta= muestraRemolque($mysqli,$_POST["parametro"]);
                $html1="";
                $html2="";
                while ($filas =$consulta->fetch_assoc()) 
                {
                    $html2 .= 
                    "<tr bgcolor ='#DC143C' style='color:#FFFFFF'>".
                        "<td>".$filas["remolqueID"]."</td>".
                        "<td>".$filas["remolqueEconomico"]."</td>".
                        "<td>".$filas["remolquePlaca"]."</td>".
                        "<td>".$filas["remolqueFechaCreacion"]."</td>".
                        "<td>".$filas["usuarioNombre"]."</td>".
                        "<td></td>".
                        "<td><button type='button' class='btn btn-warning'
                        onclick='restaorarRegistro(".$filas["remolqueID"].")'><i class='fas fa-recycle'></i></button></td>".
                    "</tr>";
                    $html1 .= 
                    "<tr bgcolor ='#6B8E23' style='color:#FFFFFF'>".
                        "<td>".$filas["remolqueID"]."</td>".
                        "<td>".$filas["remolqueEconomico"]."</td>".
                        "<td>".$filas["remolquePlaca"]."</td>".
                        "<td>".$filas["remolqueFechaCreacion"]."</td>".
                        "<td>".$filas["usuarioNombre"]."</td>".
                        "<td><button type='button' class='btn btn-danger' onclick='eliminarRemolque(".$filas["remolqueID"].")')>X</button></td>".
                        "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                        data-target='#UPDATE' onclick='editarPaso1Id(".$filas["remolqueID"].")'>E</button></td>".
                    "</tr>";
                }
            echo ($_POST["caso"]==='0'||$_POST["caso"]===0)?$html1:$html2;
            break;
        case '6':
            $consulta="UPDATE `remolque` SET 
            `estadoRegistro` = '0'
            WHERE `remolqueID` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '7':
            $cambio=$_POST['editado'];
            $consulta="UPDATE `remolque` SET `estadoRegistro` = $cambio WHERE remolque.estadoRegistro= ".$_POST['caso'];
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
function muestraRemolque($mysqli,$parametro)
{
    $result = $mysqli->query("SELECT * FROM remolque INNER JOIN usuario ON usuario.usuarioId= remolque.usuarioId WHERE remolque.estadoRegistro = $parametro");   
    return $result;
}
?>