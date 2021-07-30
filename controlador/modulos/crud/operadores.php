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
            "INSERT INTO `operadores` 
            (`operadorID`, `operadorNombre`, 
            `operadorLisencia`, `operadorFechaCreacion`, 
            `operadorRFC`, `usuarioId`) VALUES 
            (
            NULL, '".$_POST["data"]["operadorNombre"]."', 
            '".$_POST["data"]["operadorLisencia"]."', '".$_POST["data"]["operadorFechaCreacion"]."', 
            '".$_POST["data"]["operadorRFC"]."', '".$creador."');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `operadores` SET 
            `operadorNombre` = '".$_POST["data"]["operadorNombre"]."', 
            `operadorLisencia` = '".$_POST["data"]["operadorLisencia"]."', 
            `operadorRFC` = '".$_POST["data"]["operadorRFC"]."'
            WHERE `operadorID` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3': 
            $consulta="UPDATE `operadores` SET 
            `estadoRegistro` = '1'
            WHERE `operadores`.`operadorID` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `operadores` WHERE `operadorID`=".$_POST['id'];
            $consulta=$mysqli->query($consulta);
            while ($filas =$consulta->fetch_assoc()) 
            {
                echo json_encode($filas);
                break;
            }
            break;
        case '5':     
                $consulta= muestraOperador($mysqli,$_POST["parametro"]);
                $html1="";
                $html2="";
                while ($filas =$consulta->fetch_assoc()) 
                {
                    $html2 .= 
                    "<tr bgcolor ='#DC143C' style='color:#FFFFFF'>".
                        "<td>".$filas["operadorID"]."</td>".
                        "<td>".$filas["operadorNombre"]."</td>".
                        "<td>".$filas["operadorRFC"]."</td>".
                        "<td>".$filas["operadorLisencia"]."</td>".
                        "<td>".$filas["operadorFechaCreacion"]."</td>".
                        "<td>".$filas["usuarioNombre"]."</td>".
                        "<td></td>".
                        "<td><button type='button' class='btn btn-warning'
                        onclick='restaorarRegistro(".$filas["operadorID"].")'><i class='fas fa-recycle'></i></button></td>".
                    "</tr>";
                    $html1 .= 
                    "<tr bgcolor ='#6B8E23' style='color:#FFFFFF'>".
                                            "<td>".$filas["operadorID"]."</td>".
                                            "<td>".$filas["operadorNombre"]."</td>".
                                            "<td>".$filas["operadorRFC"]."</td>".
                                            "<td>".$filas["operadorLisencia"]."</td>".
                                            "<td>".$filas["operadorFechaCreacion"]."</td>".
                                            "<td>".$filas["usuarioNombre"]."</td>".
                                            "<td><button type='button' class='btn btn-danger' onclick='eliminarEmpresaEmisora(".$filas["operadorID"].")')><i class='fas fa-trash-alt'></i></button></td>".
                                            "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                                            data-target='#UPDATE' onclick='editarPaso1Id(".$filas["operadorID"].")'><i class='fas fa-edit'></i></button></button></td>".
                                            "</tr>";
                }
            echo ($_POST["caso"]==='0'||$_POST["caso"]===0)?$html1:$html2;
            break;
        case '6':
                $consulta="UPDATE `operadores` SET 
                `estadoRegistro` = '0'
                WHERE `operadores`.`empresaEmisoraId` = ".$_POST['id']; 
                echo $mysqli->query($consulta);
                break;
        case '7':
                $cambio=$_POST['editado'];
                $consulta="UPDATE `operadores` SET `estadoRegistro` = $cambio WHERE operadores.estadoRegistro= ".$_POST['caso'];
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
function muestraOperador($mysqli,$parametro)
{
    $result = $mysqli->query("SELECT * FROM operadores INNER JOIN usuario ON usuario.usuarioId= operadores.usuarioId WHERE operadores.estadoRegistro = $parametro");   
    return $result;
}
?>