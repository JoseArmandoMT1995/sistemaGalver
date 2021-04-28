<?php
session_start();
$nombrePermiso=null;
if (!isset($_SESSION['user_id']) and !isset($_SESSION['user_permiso']) and !isset($_SESSION['sesionNombre'])) {
    header('location: index.php');
}else{
    if ($_SESSION['user_permiso']== 1) {
        # code...
        $nombrePermiso="Super Administrador";
    }
    if ($_SESSION['user_permiso']== 2) {
        $nombrePermiso="Supervisor";
    }
    if ($_SESSION['user_permiso']== 3) {
        $nombrePermiso="Operador";
    }
    if ($_SESSION['user_permiso']== 4) {
        $nombrePermiso="Monitor";
    }
}


?>

