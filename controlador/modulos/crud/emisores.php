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
            "INSERT INTO `empresa_emisora` 
            (`empresaEmisoraId`, `usuarioId`, `empresaEmisoraNombre`, `empresaEmisoraRFC`, 
            `empresaEmisoraDireccion`, `empresaEmisoraTelefonoFijo1`, `empresaEmisoraTelefonoFijo2`, 
            `empresaEmisoraTelefonoCelular1`, `empresaEmisoraTelefonoCelular2`, `empresaEmisoraCorreo`, 
            `empresaEmisoraFechaDeCreacion`, `empresaEmisoraDescripcion`, `empresaEmisoraCP`) VALUES 
            (
            NULL, '".$creador."', '".$_POST["data"]["empresaEmisoraNombre"]."', 
            '".$_POST["data"]["empresaEmisoraRFC"]."', 
            '".$_POST["data"]["empresaEmisoraDireccion"]."', 
            '".$_POST["data"]["empresaEmisoraTelefonoFijo1"]."', '".$_POST["data"]["empresaEmisoraTelefonoFijo2"]."',
            '".$_POST["data"]["empresaEmisoraTelefonoCelular1"]."', '".$_POST["data"]["empresaEmisoraTelefonoCelular2"]."',
            '".$_POST["data"]["empresaEmisoraCorreo"]."', '".$_POST["data"]["empresaEmisoraFechaDeCreacion"]."', 
            '', '".$_POST["data"]["empresaEmisoraCP"]."');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `empresa_emisora` SET 
            `empresaEmisoraNombre` = '".$_POST["data"]["empresaEmisoraNombre"]."', 
            `empresaEmisoraRFC` = '".$_POST["data"]["empresaEmisoraRFC"]."', 
            `empresaEmisoraTelefonoFijo1` = '".$_POST["data"]["empresaEmisoraTelefonoFijo1"]."', 
            `empresaEmisoraTelefonoFijo2` = '".$_POST["data"]["empresaEmisoraTelefonoFijo2"]."', 
            `empresaEmisoraTelefonoCelular1` = '".$_POST["data"]["empresaEmisoraTelefonoCelular1"]."', 
            `empresaEmisoraTelefonoCelular2` = '".$_POST["data"]["empresaEmisoraTelefonoCelular2"]."', 
            `empresaEmisoraCorreo` = '".$_POST["data"]["empresaEmisoraCorreo"]."', 
            `empresaEmisoraCP` = '".$_POST["data"]["empresaEmisoraCP"]."', 
            `empresaEmisoraDireccion` = '".$_POST["data"]["empresaEmisoraDireccion"]."'
            WHERE `empresa_emisora`.`empresaEmisoraId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta=
            "UPDATE `empresa_emisora` SET 
            `estadoRegistro` = '1'
            WHERE `empresa_emisora`.`empresaEmisoraId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `empresa_emisora` WHERE `empresaEmisoraId`=".$_POST['id'];
            $consulta=$mysqli->query($consulta);
            while ($filas =$consulta->fetch_assoc()) {
                echo json_encode($filas);
                break;
            }
            break;
        case '5':     
                $consulta= muestraEmisor($mysqli,$_POST["parametro"]);
                $html1="";
                $html2="";
                while ($filas =$consulta->fetch_assoc()) 
                {
                    $html2 .= 
                    "<tr bgcolor ='#DC143C' style='color:#FFFFFF'>".
                        "<td>".$filas["empresaEmisoraId"]."</td>".
                        "<td>".$filas["empresaEmisoraNombre"]."</td>".
                        "<td>".$filas["empresaEmisoraRFC"]."</td>".
                        "<td>".$filas["empresaEmisoraTelefonoFijo1"]."</td>".
                        "<td>".$filas["empresaEmisoraTelefonoFijo2"]."</td>".
                        "<td>".$filas["empresaEmisoraTelefonoCelular1"]."</td>".
                        "<td>".$filas["empresaEmisoraTelefonoCelular2"]."</td>".
                        "<td>".$filas["empresaEmisoraCorreo"]."</td>".
                        "<td>".$filas["empresaEmisoraCP"]."</td>".
                        "<td>".$filas["empresaEmisoraFechaDeCreacion"]."</td>".
                        "<td>".$filas["usuarioNombre"]."</td>".
                        "<td></td>".
                        "<td><button type='button' class='btn btn-warning'
                        onclick='restaorarRegistro(".$filas["empresaEmisoraId"].")'><i class='fas fa-recycle'></i></button></td>".
                    "</tr>";
                    $html1 .= 
                    "<tr bgcolor ='#6B8E23' style='color:#FFFFFF'>".
                        "<td>".$filas["empresaEmisoraId"]."</td>".
                        "<td>".$filas["empresaEmisoraNombre"]."</td>".
                        "<td>".$filas["empresaEmisoraRFC"]."</td>".
                        "<td>".$filas["empresaEmisoraTelefonoFijo1"]."</td>".
                        "<td>".$filas["empresaEmisoraTelefonoFijo2"]."</td>".
                        "<td>".$filas["empresaEmisoraTelefonoCelular1"]."</td>".
                        "<td>".$filas["empresaEmisoraTelefonoCelular2"]."</td>".
                        "<td>".$filas["empresaEmisoraCorreo"]."</td>".
                        "<td>".$filas["empresaEmisoraCP"]."</td>".
                        "<td>".$filas["empresaEmisoraFechaDeCreacion"]."</td>".
                        "<td>".$filas["usuarioNombre"]."</td>".
                        "<td><button type='button' class='btn btn-danger' onclick='eliminarCarga(".$filas["empresaEmisoraId"].")')><i class='fas fa-trash-alt'></i></button></td>".
                        "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                                            data-target='#UPDATE' onclick='editarPaso1Id(".$filas["empresaEmisoraId"].")'>E</button></td>".
                    "</tr>";
                }
            echo ($_POST["caso"]==='0'||$_POST["caso"]===0)?$html1:$html2;
            break;
        case '6':
                $consulta="UPDATE `empresa_emisora` SET 
                `estadoRegistro` = '0'
                WHERE `empresa_emisora`.`empresaEmisoraId` = ".$_POST['id']; 
                echo $mysqli->query($consulta);
                break;
        case '7':
                $cambio=$_POST['editado'];
                $consulta="UPDATE `empresa_emisora` SET `estadoRegistro` = $cambio WHERE empresa_emisora.estadoRegistro= ".$_POST['caso'];
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
function muestraEmisor($mysqli,$parametro)
{
    $result = $mysqli->query("SELECT * FROM empresa_emisora INNER JOIN usuario ON usuario.usuarioId= empresa_emisora.usuarioId WHERE empresa_emisora.estadoRegistro = $parametro");   
    return $result;
}
?>