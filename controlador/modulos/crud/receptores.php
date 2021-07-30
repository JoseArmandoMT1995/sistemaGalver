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
            "INSERT INTO `empresa_receptora` 
            (`empresaReceptoraId`, `usuarioId`, `empresaReceptoraNombre`, `empresaReceptoraRFC`, 
            `empresaReceptoraDireccion`, `empresaReceptoraTelefonoFijo1`, `empresaReceptoraTelefonoFijo2`, 
            `empresaReceptoraTelefonoCelular1`, `empresaReceptoraTelefonoCelular2`, `empresaReceptoraCorreo`, 
            `empresaReceptoraFechaDeCreacion`, `empresaReceptoraDescripcion`, `empresaReceptoraCP`) VALUES 
            (
            NULL, '".$creador."', '".$_POST["data"]["empresaReceptoraNombre"]."', 
            '".$_POST["data"]["empresaReceptoraRFC"]."', 
            '".$_POST["data"]["empresaReceptoraDireccion"]."', 
            '".$_POST["data"]["empresaReceptoraTelefonoFijo1"]."', '".$_POST["data"]["empresaReceptoraTelefonoFijo2"]."',
            '".$_POST["data"]["empresaReceptoraTelefonoCelular1"]."', '".$_POST["data"]["empresaReceptoraTelefonoCelular2"]."',
            '".$_POST["data"]["empresaReceptoraCorreo"]."', '".$_POST["data"]["empresaReceptoraFechaDeCreacion"]."', 
            '', '".$_POST["data"]["empresaReceptoraCP"]."');";
            echo $mysqli->query($consulta);
            break;
        case '2':
            $consulta="UPDATE `empresa_receptora` SET 
            `empresaReceptoraNombre` = '".$_POST["data"]["empresaReceptoraNombre"]."', 
            `empresaReceptoraRFC` = '".$_POST["data"]["empresaReceptoraRFC"]."', 
            `empresaReceptoraTelefonoFijo1` = '".$_POST["data"]["empresaReceptoraTelefonoFijo1"]."', 
            `empresaReceptoraTelefonoFijo2` = '".$_POST["data"]["empresaReceptoraTelefonoFijo2"]."', 
            `empresaReceptoraTelefonoCelular1` = '".$_POST["data"]["empresaReceptoraTelefonoCelular1"]."', 
            `empresaReceptoraTelefonoCelular2` = '".$_POST["data"]["empresaReceptoraTelefonoCelular2"]."', 
            `empresaReceptoraCorreo` = '".$_POST["data"]["empresaReceptoraCorreo"]."', 
            `empresaReceptoraCP` = '".$_POST["data"]["empresaReceptoraCP"]."', 
            `empresaReceptoraDireccion` = '".$_POST["data"]["empresaReceptoraDireccion"]."'
            WHERE `empresa_receptora`.`empresaReceptoraId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '3':
            $consulta="UPDATE `empresa_receptora` SET 
            `estadoRegistro` = '1'
            WHERE `empresa_receptora`.`empresaReceptoraId` = ".$_POST['id']; 
            echo $mysqli->query($consulta);
            break;
        case '4':
            $consulta="SELECT * FROM `empresa_receptora` WHERE `empresaReceptoraId`=".$_POST['id'];
            $consulta=$mysqli->query($consulta);
            while ($filas =$consulta->fetch_assoc()) 
            {
                echo json_encode($filas);
                break;
            }
            break;
        case '5':     
                $consulta= muestraReceptor($mysqli,$_POST["parametro"]);
                $html1="";
                $html2="";
                while ($filas =$consulta->fetch_assoc()) 
                {
                    $html2 .= 
                    "<tr bgcolor ='#DC143C' style='color:#FFFFFF'>".
                        "<td>".$filas["empresaReceptoraId"]."</td>".
                        "<td>".$filas["empresaReceptoraNombre"]."</td>".
                        "<td>".$filas["empresaReceptoraRFC"]."</td>".
                        "<td>".$filas["empresaReceptoraTelefonoFijo1"]."</td>".
                        "<td>".$filas["empresaReceptoraTelefonoFijo2"]."</td>".
                        "<td>".$filas["empresaReceptoraTelefonoCelular1"]."</td>".
                        "<td>".$filas["empresaReceptoraTelefonoCelular2"]."</td>".
                        "<td>".$filas["empresaReceptoraCorreo"]."</td>".
                        "<td>".$filas["empresaReceptoraCP"]."</td>".
                        "<td>".$filas["empresaReceptoraFechaDeCreacion"]."</td>".
                        "<td>".$filas["usuarioNombre"]."</td>".
                        "<td></td>".
                        "<td><button type='button' class='btn btn-warning'
                        onclick='restaorarRegistro(".$filas["empresaReceptoraId"].")'><i class='fas fa-recycle'></i></button></td>".
                    "</tr>";
                    $html1 .= 
                    "<tr bgcolor ='#6B8E23' style='color:#FFFFFF'>".
                        "<td>".$filas["empresaReceptoraId"]."</td>".
                        "<td>".$filas["empresaReceptoraNombre"]."</td>".
                        "<td>".$filas["empresaReceptoraRFC"]."</td>".
                        "<td>".$filas["empresaReceptoraTelefonoFijo1"]."</td>".
                        "<td>".$filas["empresaReceptoraTelefonoFijo2"]."</td>".
                        "<td>".$filas["empresaReceptoraTelefonoCelular1"]."</td>".
                        "<td>".$filas["empresaReceptoraTelefonoCelular2"]."</td>".
                        "<td>".$filas["empresaReceptoraCorreo"]."</td>".
                        "<td>".$filas["empresaReceptoraCP"]."</td>".
                        "<td>".$filas["empresaReceptoraFechaDeCreacion"]."</td>".
                        "<td>".$filas["usuarioNombre"]."</td>".
                        "<td><button type='button' class='btn btn-danger' onclick='eliminarEmpresaEmisora(".$filas["empresaReceptoraId"].")')><i class='fas fa-trash-alt'></i></button></td>".
                        "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                        data-target='#UPDATE' onclick='editarPaso1Id(".$filas["empresaReceptoraId"].")'><i class='fas fa-edit'></i></button></td>".
                    "</tr>";
                }
            echo ($_POST["caso"]==='0'||$_POST["caso"]===0)?$html1:$html2;
            break;
        case '6':
                $consulta="UPDATE `empresa_receptora` SET 
                `estadoRegistro` = '0'
                WHERE `empresa_receptora`.`empresaEmisoraId` = ".$_POST['id']; 
                echo $mysqli->query($consulta);
                break;
        case '7':
                $cambio=$_POST['editado'];
                $consulta="UPDATE `empresa_receptora` SET `estadoRegistro` = $cambio WHERE empresa_receptora.estadoRegistro= ".$_POST['caso'];
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
function muestraReceptor($mysqli,$parametro)
{
    $result = $mysqli->query("SELECT * FROM empresa_receptora INNER JOIN usuario ON usuario.usuarioId= empresa_receptora.usuarioId WHERE empresa_receptora.estadoRegistro = $parametro");   
    return $result;
}
?>