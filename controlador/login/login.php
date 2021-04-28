<?php
if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){

			include "../coneccion/config.php";
			
			$user_id=null;
            $user_permiso=null;
            $user_name=null;
			
			$sql1= "select * from sesion where sesionNombre='".$_POST['username']."' and sesionPassword='".$_POST["password"]."';";
			//selecciona mientras coinsidan dos parametros
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
                //print_r($r);
				$user_id=$r["sesionId"];
                $user_permiso=$r["permisoId"];
                $user_name=$r["sesionNombre"];
				break;
			}
			//encuentra elemento en sql
			if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='../../index.php';</script>";
				//usuario incorrecto
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
                $_SESSION["user_permiso"]=$user_permiso;
                $_SESSION["user_name"]=$user_name;
				print "<script>window.location='../../vistas/index.php';</script>";	
				//inicio de sesion 			
			}
			//condicion de retorno o validacion
		}else{
            print "<script>alert(\"Ingrese los datos por favor.\");window.location='../../index.php';</script>";
        }
	}else{
        print "<script>alert(\"Ingrese los datos por favor.\");window.location='../../index.php';</script>";
    }
}
?>