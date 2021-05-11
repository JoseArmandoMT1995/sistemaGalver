<?php
    
    include "../../coneccion/config.php";
    $paso1=consultarRegistroEdicion(
        $con,
        $_POST['hojaDeViajeID']
    );
    $paso2;
    while (
        $r=$paso1->fetch_array()) 
    {
        $paso2[] = $r;
    }
    if (empty($paso2)) 
    {
        echo 'no';
    }else
    {
        echo "ests listo para generar una nueva edicion";
        echo "pendiente la edicion";
    }
   
   
    function consultarRegistroEdicion($con,$hojaDeViajeID){
        $consultaContenido= "SELECT * FROM `hoja_de_viaje` WHERE `hojaDeViajeID`=".$hojaDeViajeID;
        return $con->query($consultaContenido);
    }
    function insertaHojaDeViaje($con,$contenido)
    {
        session_start();
        $consultaContenido= "SELECT * FROM `hoja_de_viaje` WHERE `hojaDeViajeID`=".$_POST['hojaDeViajeID'];
        $con->query($consultaContenido);
        //print_r($contenido['fechaActial']);
        /*
        $consultaContenido="
                    INSERT INTO `hoja_de_viaje` (
                        `hojaDeViajeID`, `sesionId`, `empresaEmisoraId`, `empresaReceptoraId`, `operadorId`, `hojaDeViajeEstadoId`, `cargaId`, 
                        `cargaTipoId`, `hojaDeViajeFechaDeEdicion`, `hojaDeViajeFechaLiberacion`, `hojaDeViajeFechaArribo`, 
                        `hojaDeViajeFechaCarga`, `hojaDeViajeFechaLlegadaDeDescarga`, `hojaDeViajeFechaDescarga`, `hojaDeViajeOrigen`, 
                        `hojaDeViajeOrigenDeDestino`, `hojaDeViajeRemolque1`, `hojaDeViajeRemolque2`, `hojaDeViajePlaca1`, `hojaDeViajePlaca2`, 
                        `hojaDeViajeEconomico1`, `hojaDeViajeEconomico2`, `hojaDeViajeTalon1`, `hojaDeViajeTalon2`, `hojaDeViajeCargaCantidad`, 
                        `hojaDeViajeComentarios`) VALUES (
                            NULL, 
                            '".$_SESSION["user_id"]."', 
                            '".$contenido['empresaEmisoraId']."', 
                            '".$contenido['empresaReceptoraId']."', 
                            '".$contenido['operadorId']."',
                            '1',
                            '".$contenido['cargaId']."', 
                            '".$contenido['cargaTipoId']."',  
                            '".$contenido['fechaActial']."',
                            '".$contenido['fechaActial']."',
                            '".$contenido['hojaDeViajeFechaArribo']."',
                            '".$contenido['hojaDeViajeFechaCarga']."',
                            '".$contenido['hojaDeViajeFechaLlegadaDeDescarga']."',
                            '".$contenido['hojaDeViajeFechaDescarga']."',
                            '".$contenido['hojaDeViajeOrigen']."',
                            '".$contenido['hojaDeViajeOrigenDeDestino']."', 
                            '".$contenido['hojaDeViajeRemolque1']."',
                            '".$contenido['hojaDeViajeRemolque2']."',
                            '".$contenido['hojaDeViajePlaca1']."',
                            '".$contenido['hojaDeViajePlaca2']."',
                            '".$contenido['hojaDeViajeEconomico1']."',
                            '".$contenido['hojaDeViajeEconomico2']."',
                            '".$contenido['hojaDeViajeTalon1']."',
                            '".$contenido['hojaDeViajeTalon2']."',
                            '".$contenido['hojaDeViajeCargaCantidad']."',
                            '".$contenido['hojaDeViajeComentarios']."'
                    );
                ";
    */
    
    }
?>