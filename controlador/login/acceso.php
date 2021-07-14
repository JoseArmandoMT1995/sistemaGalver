<?php
session_start();
$nombrePermiso=null;
if(!isset($_SESSION))
{
    header('location: index.php');
}
else
{
    if (!isset($_SESSION['usuarioId']) and !isset($_SESSION['usuarioTipoId']) and !isset($_SESSION['usuarioNombre'])) 
    {
        header('location: index.php');
    }
}
?>

