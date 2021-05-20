<?php
if(!empty($_POST))
{
	if(
         isset($_POST["operadorNombre"]) 
       &&isset($_POST["operadorRFC"]) 
       &&isset($_POST["operadorLisencia"]) 
       )
    {
		if(
            $_POST["operadorNombre"]!=""
            &&$_POST["operadorRFC"]!=""            
            &&$_POST["operadorLisencia"]!=""
            )
        {
            include "../../coneccion/config.php";
            session_start();
            $query='INSERT INTO 
            `operadores` 
            (`operadorID`, `operadorNombre`, `operadorLisencia`, `operadorFechaCreacion`, `operadorRFC`, `usuarioId`)
            VALUES 
            (
            NULL, 
            "'.$_POST["operadorNombre"].'",
            '.$_POST["operadorLisencia"].', 
            "2021-05-19 21:14:34.000000", 
            '.$_POST["operadorRFC"].',
            "'.$_SESSION['usuarioId'].'"
            );
            ';
            print_r($query);
            $resultado =$mysqli->query($query);
            print_r($resultado);
            if ($resultado!==1) {
                print "<script>alert(\"ingreso exitoso.\");window.location='../../../vistas/operadores.php';</script>";
            }else{
                print "<script>alert(\"Ingrese los datos por favor.\");window.location='../../../vistas/operadorRegistro.php';</script>";
            }
        }else{
            print "<script>alert(\"campos vacios.\");window.location='../../../vistas/operadorRegistro.php';</script>";
        }
    }else{
        print "<script>alert(\"campos vacios.\");window.location='../../../vistas/operadorRegistro.php';</script>";
    }
}else{
    print "<script>alert(\"Sin datos.\");window.location='../../../vistas/operadorRegistro.php';</script>";
}
?>