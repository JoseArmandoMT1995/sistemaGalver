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
            "INSERT INTO `destino` 
            (`destino_id`, `destino_nombre`, `destino_direccion`, `destino_telefono1`, 
            `destino_telefono2`,`destino_correo`,`destino_creacion`,`usuarioId`) VALUES 
            (NULL, 
            '".$_POST["data"]["destino_nombre"]."', 
            '".$_POST["data"]["destino_direccion"]."', 
            '".$_POST["data"]["destino_telefono1"]."', 
            '".$_POST["data"]["destino_telefono2"]."', 
            '".$_POST["data"]["destino_correo"]."', 
            'NOW()', 
            '$creador','$creador');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `destino` SET 
            `destino_nombre` = '".$_POST["data"]["destino_nombre"]."', 
            `destino_direccion` = '".$_POST["data"]["destino_direccion"]."',
            `destino_telefono1` = '".$_POST["data"]["destino_telefono1"]."', 
            `destino_telefono2` = '".$_POST["data"]["destino_telefono2"]."',
            `destino_correo` = '".$_POST["data"]["destino_correo"]."'
            WHERE `destino_id` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="UPDATE `destino` SET 
                `estadoRegistro` = '1'
                WHERE `operadorID` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `destino` WHERE `destino_id`=".$_POST['id'];
            $consulta=$mysqli->query($consulta);    
            while ($filas =$consulta->fetch_assoc()) 
            {
                echo json_encode($filas);
                break;
            }
            break;
        case '5':     
                $consulta= muestraDestinos($mysqli,$_POST["parametro"]);
                
                $html1="";
                $html2="";
                while ($filas =$consulta->fetch_assoc()) 
                {
                    $html2 .= 
                    "<tr bgcolor ='#DC143C' style='color:#FFFFFF'>".
                        "<td>".$filas["destino_id"]."</td>".
                        "<td>".$filas["destino_nombre"]."</td>".
                        "<td>".$filas["destino_direccion"]."</td>".
                        "<td>".$filas["destino_telefono1"]."</td>".
                        "<td>".$filas["destino_telefono2"]."</td>".
                        "<td>".$filas["destino_correo"]."</td>".
                        "<td></td>".
                        "<td><button type='button' class='btn btn-warning'
                        onclick='restaorarRegistro(".$filas["destino_id"].")'><i class='fas fa-recycle'></i></button></td>".
                    "</tr>";
                    $html1 .= 
                    "<tr bgcolor ='#6B8E23' style='color:#FFFFFF'>".
                    "<td>".$filas["destino_id"]."</td>".
                    "<td>".$filas["destino_nombre"]."</td>".
                    "<td>".$filas["destino_direccion"]."</td>".
                    "<td>".$filas["destino_telefono1"]."</td>".
                    "<td>".$filas["destino_telefono2"]."</td>".
                    "<td>".$filas["destino_correo"]."</td>".
                    "<td><button type='button' class='btn btn-danger' onclick='eliminarEmpresaEmisora(".$filas["destino_id"].")')><i class='fas fa-trash-alt'></i></button></td>".
                    "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                        data-target='#UPDATE' onclick='editarPaso1Id(".$filas["destino_id"].")'><i class='fas fa-edit'></i></button></button></td>".
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
function muestraDestinos($mysqli,$parametro)
{
    $result = $mysqli->query("SELECT * FROM destino INNER JOIN usuario ON usuario.usuarioId= destino.usuarioId WHERE destino.estadoRegistro = $parametro");   
    return $result;
}
?>