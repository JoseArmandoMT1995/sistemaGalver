<?php
    print_r($_POST);
    include "../../coneccion/config.php";
    insertaHojaDeViaje($con,$_POST);
    function insertaHojaDeViaje($con,$contenido)
    {
        session_start();
		//$_SESSION["user_id"];
        $consultaContenido= 
            "INSERT INTO hoja_de_viaje(
                sesionId,
                hojaDeViajeUsuarioEdicion,
                empresaEmisoraId,
                empresaReceptoraId,
                operadorId,
                hojaDeViajeEstadoId,
                cargaId,
                cargaTipoId,
                hojaDeViajeFechaArribo,
                hojaDeViajeFechaCarga,
                hojaDeViajeFechaLlegadaDeDescarga,
                hojaDeViajeFechaDescarga,
                hojaDeViajeOrigen,
                hojaDeViajeOrigenDeDestino
                hojaDeViajeRemolque1,
                hojaDeViajeRemolque2,
                hojaDeViajePlaca1,
                hojaDeViajePlaca2,
                hojaDeViajeEconomico1,
                hojaDeViajeEconomico2,
                hojaDeViajeTalon1,
                hojaDeViajeTalon2,
                hojaDeViajeCargaCantidad,
                hojaDeViajeComentarios
                ) VALUES (
                    '".$_SESSION['user_id']."',
                    '".$_SESSION['user_id']."',
                    '".$contenido['empresaEmisoraId']."',
                    '".$contenido['empresaReceptoraId']."',
                    '".$contenido['operadorId']."',
                    '1',
                    '".$contenido['cargaId']."',
                    '".$contenido['cargaTipoId']."',

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
                );";
     
     /* 
     INSERT INTO `hoja_de_viaje` 
    (`hojaDeViajeID`, 
     `sesionId`, 
     `empresaEmisoraId`, 
     `empresaReceptoraId`, 
     `operadorId`, 
     `hojaDeViajeEstadoId`, 
     `cargaId`, 
     `cargaTipoId`, 
     `hojaDeViajeFechaDeEdicion`, 
     `hojaDeViajeFechaLiberacion`, 
     `hojaDeViajeFechaArribo`, 
     `hojaDeViajeFechaCarga`, 
     `hojaDeViajeFechaLlegadaDeDescarga`, 
     `hojaDeViajeFechaDescarga`, 
     `hojaDeViajeOrigen`, 
     `hojaDeViajeOrigenDeDestino`, 
     `hojaDeViajeRemolque1`, 
     `hojaDeViajeRemolque2`, 
     `hojaDeViajePlaca1`, 
     `hojaDeViajePlaca2`, 
     `hojaDeViajeEconomico1`, 
     `hojaDeViajeEconomico2`, 
     `hojaDeViajeTalon1`, 
     `hojaDeViajeTalon2`, 
     `hojaDeViajeCargaCantidad`, 
     `hojaDeViajeComentarios`) VALUES 
     (
        NULL, 
        NULL, 
        NULL,
        NULL, 
        NULL, 
        NULL, 
        NULL, 
        NULL, 
        '2021-05-07 21:56:53.000000', 
        '2021-05-07 21:56:53.000000', 
        '2021-05-07 21:56:53.000000', 
        '2021-05-07 21:56:53.000000', 
        '2021-05-07 21:56:53.000000', 
        '2021-05-07 21:56:53.000000', 
        NULL, 
        NULL, 
        NULL, 
        NULL, 
        NULL,
        NULL, 
        NULL, 
        NULL, 
        NULL, 
        NULL, 
        NULL, 
        NULL
    );
     */
     $con->query($consultaContenido);
    }
?>