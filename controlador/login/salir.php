<?php 
session_start();
session_destroy();
print "<script>alert(\"usted salio.\");window.location='../../vistas/login.php';</script>";
/*
function salir($valor){
    
    if($valor=true){
        
    }else{
        print "<script>alert(\"Ingrese los datos por favor.\");window.location='../../vistas/login.php';</script>";
    }
}
*/

?>