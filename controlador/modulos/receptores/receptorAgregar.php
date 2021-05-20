<?php
if(!empty($_POST))
{
	if(
         isset($_POST["empresaReceptoraNombre"]) 
       &&isset($_POST["empresaReceptoraRFC"]) 
       &&isset($_POST["empresaReceptoraCP"]) 
       &&isset($_POST["empresaReceptoraDireccion"]) 
       &&isset($_POST["empresaReceptoraCorreo"]) 
       )
    {
		if(
            $_POST["empresaReceptoraNombre"]!=""
            &&$_POST["empresaReceptoraRFC"]!=""            
            &&$_POST["empresaReceptoraCP"]!=""
            &&$_POST["empresaReceptoraDireccion"]!=""
            &&$_POST["empresaReceptoraCorreo"]!=""
            )
        {
            include "../../coneccion/config.php";
            session_start();
            $query='INSERT INTO 
            `empresa_receptora` 
            (
                `empresaReceptoraId`, `usuarioId`, `empresaReceptoraNombre`, `empresaReceptoraRFC`, `empresaReceptoraDireccion`, 
                `empresaReceptoraTelefonoFijo1`, `empresaReceptoraTelefonoFijo2`, `empresaReceptoraTelefonoCelular1`, `empresaReceptoraTelefonoCelular2`, `empresaReceptoraCorreo`, `empresaReceptoraFechaDeCreacion`, `empresaReceptoraDescripcion`, `empresaReceptoraCP`
            ) 
            VALUES 
            (
            NULL, 
            "'.$_SESSION['usuarioId'].'", 
            "'.$_POST["empresaReceptoraNombre"].'", 
            "'.$_POST["empresaReceptoraRFC"].'", 
            "'.$_POST["empresaReceptoraDireccion"].'", 
            "'.$_POST["empresaReceptoraTelefonoFijo1"].'",
            "'.$_POST["empresaReceptoraTelefonoFijo2"].'",
            "'.$_POST["empresaReceptoraTelefonoCelular1"].'",
            "'.$_POST["empresaReceptoraTelefonoCelular2"].'",
            '.$_POST["empresaReceptoraCorreo"].', 
            "2021-05-19 21:14:34.000000", 
            '.$_POST["empresaReceptoraDescripcion"].', 
            '.$_POST["empresaReceptoraCP"].'
            );
            ';
            print_r($query);
            $resultado =$mysqli->query($query);
            print_r($resultado);
            if ($resultado!==1) {
                print "<script>alert(\"Ha ingresado los datos correctamente.\");window.location='../../../vistas/empresaReceptora.php';</script>";
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