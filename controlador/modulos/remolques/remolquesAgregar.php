<?php
if(!empty($_POST))
{
	if(
         isset($_POST["remolquePlaca"]) 
       &&isset($_POST["remolqueEconomico"]) 
       &&isset($_POST["remolqueCargaID"]) 
       )
    {
		if(
            $_POST["remolquePlaca"]!=""
            &&$_POST["remolqueEconomico"]!=""            
            &&$_POST["remolqueCargaID"]!=""

            )
        {
            include "../../coneccion/config.php";
            session_start();
            $query='INSERT INTO 
            `remolque` 
            (
                `remolqueID`, `remolquePlaca`, `remolqueEconomico`, `usuarioId`, `tractorFechaCreacion`, `remolqueCargaID`
            ) 
            VALUES 
            (
            NULL, 
            "'.$_POST["remolquePlaca"].'", 
            "'.$_POST["remolqueEconomico"].'", 
            "'.$_SESSION['usuarioId'].'", 
            "2021-05-19 17:55:08",
            "'.$_POST["remolqueCargaID"].'"
            );
            ';
            print_r($query);
            $resultado =$mysqli->query($query);
            print_r($resultado);
            if ($resultado!==1) {
                print "<script>alert(\"Ha ingresado los datos correctamente.\");window.location='../../../vistas/remolques.php';</script>";
            }else{
             print "<script>alert(\"Ingrese los datos por favor.\");window.location='../../../vistas/remolquesRegistro.php';</script>";
            }
        }else{
            print "<script>alert(\"campos vacios.\");window.location='../../../vistas/remolquesRegistro.php';</script>";
        }
    }else{
        print "<script>alert(\"campos vacios1.\");window.location='../../../vistas/remolquesRegistro.php';</script>";
    }
}else{
    print "<script>alert(\"Sin datos.\");window.location='../../../vistas/remolquesRegistro.php';</script>";
}
?>