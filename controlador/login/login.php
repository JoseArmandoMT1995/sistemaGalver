<?php
if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"]))
	{
		if($_POST["username"]!=""&&$_POST["password"]!="")
		{
			include "../coneccion/config.php";	
			$user_id=null;
            $user_permiso=null;
            $user_name=null;
			$sql= 
			"SELECT * FROM usuario 
			 INNER JOIN usuario_tipo ON usuario_tipo.usuarioTipoId =usuario.usuarioId 
			 WHERE usuarioNombre='".$_POST['username']."' AND usuarioPassword='".$_POST["password"]."';";
			$result = $mysqli->query($sql);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			if(isset($row))
			{
				session_start();
				$_SESSION["usuarioId"]=			$row["usuarioId"];
                $_SESSION["usuarioNombre"]=		$row["usuarioNombre"];
                $_SESSION["usuarioPassword"]=	$row["usuarioPassword"];
				$_SESSION["usuarioTipoId"]=		$row["usuarioTipoId"];
                $_SESSION["usuarioTipoCargo"]=	$row["usuarioTipoCargo"];
				print "<script>alert(\"Biembenido ".$row["usuarioNombre"].".\");window.location='../../vistas/index.php';</script>";
			}
			else
			{
				print "<script>alert(\"usuario no encontrado.\");window.location='../../index.php';</script>";
			}
			if (!$resultado = $mysqli->query($sql)) 
			{
				// ¡Oh, no! La consulta falló. 
				echo "Lo sentimos, este sitio web está experimentando problemas.";
				// De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
				// cómo obtener información del error
				echo "Error: La ejecución de la consulta falló debido a: \n";
				echo "Query: " . $sql . "\n";
				echo "Errno: " . $mysqli->errno . "\n";
				echo "Error: " . $mysqli->error . "\n";
				exit;
			}
		}
		else
		{
            print "<script>alert(\"Ingrese los datos por favor.\");window.location='../../index.php';</script>";
        }
	}
	else
	{
        print "<script>alert(\"Ingrese los datos por favor.\");window.location='../../index.php';</script>";
    }
}
?>