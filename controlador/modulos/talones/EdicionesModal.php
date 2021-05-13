<?php
    
    include "../../coneccion/config.php";
    
    function muestraTodoDeUnRegistro($id,$con){
        $consulta=
        "
            SELECT * FROM 
            hoja_de_viaje_edicion 
            WHERE 
            hoja_de_viaje_edicion.hojaDeViajeID = $id;
        "
        ;
        return $con->query($consulta);
    }
    function muestraSesiones($con)
    {
        $consulta="SELECT sesionId,sesionNombre FROM sesion;";
        return $con->query($consulta);
    }
    function cambiaDeEstadoUnRegistro(){
     //null   
    }
    function estadoHDV($id,$con){
        $consulta=
        "
            SELECT * FROM 
            hoja_de_viaje
            WHERE 
            hoja_de_viaje_edicion.hojaDeViajeID = $id;
        "
        ;
        return $con->query($consulta);
    }
    /*********************************************************************/
    $resultado;
    if (isset($_POST)) 
	{
        if (isset($_POST["hojaDeViajeID"]) && isset($_POST["accionModal"])) 
        {

            $array=[];
            switch ($_POST["accionModal"]) {
                case 1:
                    $consulta=muestraTodoDeUnRegistro($_POST["hojaDeViajeID"],$con);
                    $consultaUsuarios=muestraSesiones($con);
                    $select=estadoHDV($_POST["hojaDeViajeID"],$con);
                    # muestraTodoDeUnRegistro...
                    while ($r=$consulta->fetch_array()) 
                    {
                        $editorNombre;$creadorNombre;
                        while ($m=$consultaUsuarios->fetch_array()) 
                        {
                            if ($m["sesionId"] === $r["hojaDeViajeEdicionUsuarioEdicion"]) 
                            {
                                $editorNombre=$m["sesionNombre"];
                            }
                            if ($m["sesionId"] === $r["creadorId"]) 
                            {
                                $creadorNombre=$m["sesionNombre"];
                            }
                        }
              
                        $array[]=
                        array(
                            "hojaDeViajeEdicionID" => $r['hojaDeViajeEdicionID'],
                            "hojaDeViajeFechaDeEdicion" => $r['hojaDeViajeFechaDeEdicion'],
                            "hojaDeViajeEdicionUsuarioEdicion" => $r['hojaDeViajeEdicionUsuarioEdicion'],
                            "hojaDeViajeFechaArribo" => $r['hojaDeViajeFechaArribo'],
                            "creadorId" => $r['creadorId'],
                            "editorNombre" => $editorNombre,
                            "creadorNombre" => $creadorNombre
                        );
                    }
                    echo json_encode($array);
                    break;
                case 2:
                    cambiaDeEstadoUnRegistro($_POST["hojaDeViajeID"],);
                    # cambiaDeEstadoUnRegistro...
                    break;
                default:
                    echo "Variable NO definida!!!";
                    break;
            }
        }
        else
        {
            echo "Variable NO definida!!!";
        }
	}
    else
	{
		echo "Variable NO definida!!!";
	}
?>