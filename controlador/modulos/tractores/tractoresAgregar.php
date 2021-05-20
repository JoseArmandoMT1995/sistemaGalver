<?php
if(!empty($_POST))
{
	if(
         isset($_POST["tractorPlaca"]) 
       &&isset($_POST["tractorEconomico"]) 
       &&isset($_POST["tractorMarcaId"]) 
       )
    {
		if(
            $_POST["tractorPlaca"]!=""
            &&$_POST["tractorEconomico"]!=""            
            &&$_POST["tractorMarcaId"]!=""

            )
        {
            include "../../coneccion/config.php";
            session_start();
            $query='INSERT INTO 
            `tractor` 
            (
                `tractorId`, `tractorPlaca`, `tractorEconomico`, `usuarioId`, `tractorFechaCreacion`, `tractorMarcaId`
            ) 
            VALUES 
            (
            NULL, 
            "'.$_POST["tractorPlaca"].'", 
            "'.$_POST["tractorEconomico"].'", 
            "'.$_SESSION['usuarioId'].'", 
            "2021-05-19 17:55:08",
            "'.$_POST["tractorMarcaId"].'"
            );
            ';
            print_r($query);
            $resultado =$mysqli->query($query);
            print_r($resultado);
            if ($resultado!==1) {
                print "<script>alert(\"Ha ingresado los datos correctamente.\");window.location='../../../vistas/tractores.php';</script>";
            }else{
             print "<script>alert(\"Ingrese los datos por favor.\");window.location='../../../vistas/tractoresRegistro.php';</script>";
            }
        }else{
            print "<script>alert(\"campos vacios.\");window.location='../../../vistas/tractoresRegistro.php';</script>";
        }
    }else{
        print "<script>alert(\"campos vacios1.\");window.location='../../../vistas/tractoresRegistro.php';</script>";
    }
}else{
    print "<script>alert(\"Sin datos.\");window.location='../../../vistas/tractoresRegistro.php';</script>";
}
?>