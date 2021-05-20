<?php
if(!empty($_POST))
{
	if(
         isset($_POST["cargaNombre"]) 
       &&isset($_POST["cargaDescripcion"]) 

       )
    {
		if(
            $_POST["cargaNombre"]!=""
            &&$_POST["cargaDescripcion"]!=""            

            )
        {
            include "../../coneccion/config.php";
            session_start();
            $query='INSERT INTO 
            `carga` 
            (
                `cargaId`, `usuarioId`, `cargaNombre`, `cargaDescripcion`, `cargaFecaCreacion`
            ) 
            VALUES 
            (
            NULL, 
            "'.$_SESSION['usuarioId'].'", 
            "'.$_POST["cargaNombre"].'", 
            "'.$_POST["cargaDescripcion"].'", 
            "2021-05-19 21:14:34.000000"
            );
            ';
            print_r($query);
            $resultado =$mysqli->query($query);
            print_r($resultado);
            if ($resultado!==1) {
                print "<script>alert(\"Ha ingresado los datos correctamente.\");window.location='../../../vistas/carga.php';</script>";
            }else{
             print "<script>alert(\"Ingrese los datos por favor.\");window.location='../../../vistas/empresaReceptoraRegistro.php';</script>";
            }
        }else{
            print "<script>alert(\"campos vacios.\");window.location='../../../vistas/empresaReceptoraRegistro.php';</script>";
        }
    }else{
        print "<script>alert(\"campos vacios.\");window.location='../../../vistas/empresaReceptoraRegistro.php';</script>";
    }
}else{
    print "<script>alert(\"Sin datos.\");window.location='../../../vistas/empresaReceptoraRegistro.php';</script>";
}
?>