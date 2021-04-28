<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){

			include "./config.php";
			
			$user_id=null;
			
			$sql1= "select * from sesion where sesionNombre='".$_POST['username']."' and sesionPassword='".$_POST["password"]."';";
			//selecciona mientras coinsidan dos parametros
			$query = $con->query($sql1);

			while ($r=$query->fetch_array()) {
				$user_id=$r["sesionId"];
				break;
			}
			//encuentra elemento en sql
			if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='./index.php';</script>";
				//usuario incorrecto
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
				print "<script>window.location='./monitores.html';</script>";	
				//inicio de sesion 			
			}
			//condicion de retorno o validacion
		}
	}
}



?>