<?php
if(!empty($_POST))
{
	if(
         isset($_POST["empresaEmisoraNombre"]) 
       &&isset($_POST["empresaEmisoraRFC"]) 
       &&isset($_POST["empresaEmisoraCP"]) 
       &&isset($_POST["empresaEmisoraDireccion"]) 
       &&isset($_POST["empresaEmisoraCorreo"]) 
       )
    {
		if(
            $_POST["empresaEmisoraNombre"]!=""
            &&$_POST["empresaEmisoraRFC"]!=""            
            &&$_POST["empresaEmisoraCP"]!=""
            &&$_POST["empresaEmisoraDireccion"]!=""
            &&$_POST["empresaEmisoraCorreo"]!=""
            )
        {
            include "../../coneccion/config.php";
            session_start();
            $query='INSERT INTO 
            `empresa_emisora` 
            (`empresaEmisoraId`, `usuarioId`, `empresaEmisoraNombre`, `empresaEmisoraRFC`, `empresaEmisoraDireccion`, 
            `empresaEmisoraTelefonoFijo1`, `empresaEmisoraTelefonoFijo2`, `empresaEmisoraTelefonoCelular1`, `empresaEmisoraTelefonoCelular2`, `empresaEmisoraCorreo`, `empresaEmisoraFechaDeCreacion`, `empresaEmisoraDescripcion`, `empresaEmisoraCP`) 
            VALUES 
            (
            NULL, 
            "'.$_SESSION['usuarioId'].'", 
            "'.$_POST["empresaEmisoraNombre"].'", 
            "'.$_POST["empresaEmisoraRFC"].'", 
            "'.$_POST["empresaEmisoraDireccion"].'", 
            "'.$_POST["empresaEmisoraTelefonoFijo1"].'",
            "'.$_POST["empresaEmisoraTelefonoFijo2"].'",
            "'.$_POST["empresaEmisoraTelefonoCelular1"].'",
            "'.$_POST["empresaEmisoraTelefonoCelular2"].'",
            '.$_POST["empresaEmisoraCorreo"].', 
            "2021-05-19 21:14:34.000000", 
            '.$_POST["empresaEmisoraDescripcion"].', 
            '.$_POST["empresaEmisoraCP"].'
            );
            ';
            print_r($query);
            $resultado =$mysqli->query($query);
            print_r($resultado);
            if ($resultado===1) {
                print "<script>alert(\"Ingrese los datos por favor.\");window.location='../../../vistas/empresaEmisora.php';</script>";
            }else{
                print "<script>alert(\"Ingrese los datos por favor.\");window.location='../../../vistas/empresaEmisoraRegistro.php';</script>";
            }
        }else{
            print "<script>alert(\"campos vacios.\");window.location='../../../vistas/empresaEmisoraRegistro.php';</script>";
        }
    }else{
        print "<script>alert(\"campos vacios.\");window.location='../../../vistas/empresaEmisoraRegistro.php';</script>";
    }
}else{
    print "<script>alert(\"Sin datos.\");window.location='../../../vistas/empresaEmisoraRegistro.php';</script>";
}
?>