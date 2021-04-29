<?php
if(!empty($_POST))
{
	if(
         isset($_POST["empresaNombre"]) 
       &&isset($_POST["empresaRFC"]) 
       &&isset($_POST["empresaTelefonoFijo1"]) 
       &&isset($_POST["empresaTelefonoFijo2"]) 
       &&isset($_POST["empresaTelefonoCelular1"]) 
       &&isset($_POST["empresaTelefonoCelular2"]) 
       &&isset($_POST["empresaCorreo"])
       &&isset($_POST["empresaDireccion"])
       &&isset($_POST["empresaDescripcion"])
       )
    {
		if(
            $_POST["empresaNombre"]!=""
            &&$_POST["empresaRFC"]!=""            
            &&$_POST["empresaTelefonoFijo1"]!=""
            &&$_POST["empresaTelefonoFijo2"]!=""
            &&$_POST["empresaTelefonoCelular1"]!=""
            &&$_POST["empresaTelefonoCelular2"]!=""
            &&$_POST["empresaCorreo"]!=""
            &&$_POST["empresaDireccion"]!=""
            &&$_POST["empresaDescripcion"]!=""
            )
        {
            session_start();
            include "../../coneccion/config.php";
            $empresa_id=null;

            $consultaBuscarParentesco= "select * from empresa where empresaRFC='".$_POST['empresaRFC']."';";
            $query = $con->query($consultaBuscarParentesco);
            while ($r=$query->fetch_array()) {
				$empresa_id=$r["empresaId"];
				break;
			}
            if($empresa_id!=null){
				print "<script>alert(\"No puede poner dos RFC repetidos.\");window.location='../../../vistas/clientesNuevoRegistro.php';</script>";
				//usuario incorrecto
			}
            else{
            $sql1= 
            "INSERT INTO empresa".
            "(empresaNombre,empresaRFC,empresaTelefonoFijo1,empresaTelefonoFijo2,empresaTelefonoCelular1,empresaTelefonoCelular2,empresaCorreo,sesionId,empresaFechaDeCreacion,empresaDireccion,tipoEmpresaId,empresaDescripcion)".
            "VALUES".
            "('"
                .$_POST["empresaNombre"]."','"
                .$_POST["empresaRFC"]."','"
                .$_POST["empresaTelefonoFijo1"]."','"
                .$_POST["empresaTelefonoFijo2"]."','"
                .$_POST["empresaTelefonoCelular1"]."','"
                .$_POST["empresaTelefonoCelular2"]."','"
                .$_POST["empresaCorreo"]."','"
                .$_SESSION["user_id"]."','"
                .date("Y-m-d H:i:s")."','"
                .$_POST["empresaDireccion"].
                "','1','".
                $_POST["empresaDescripcion"]."')"
            ;
            //.date("Y-m-d H:i:s").
            $query = $con->query($sql1);
            print "<script>alert(\"Ha ingresado al nuevo cliente.\");window.location='../../../vistas/clientes.php';</script>";
            }
        }
    }
}
?>