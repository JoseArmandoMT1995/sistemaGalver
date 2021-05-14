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
        $paso2 = $r;
    }
    if (empty($paso2)) 
    {
        echo 'no';
    }else
    {
        print_r(procesoDeEdicion($con,$paso2,$_POST));
    }
    function procesoDeEdicion($con,$insercion,$edicion){
            session_start();
            if (insertarEdicion($con,$insercion,$edicion,$_SESSION["user_id"])== 1 || insertarEdicion($con,$insercion,$edicion,$_SESSION["user_id"])=='1') 
            {
                if (editarEdicion($con,$insercion,$edicion,$_SESSION["user_id"])== 1 || editarEdicion($con,$insercion,$edicion,$_SESSION["user_id"])=='1') 
                {
                    return "si";
                }
                else{
                    return "no";
                }
            }else{
                return "no";
            }       
    }
    function consultarRegistroEdicion($con,$hojaDeViajeID){
        $consultainsercion= "SELECT * FROM `hoja_de_viaje` WHERE `hojaDeViajeID`=".$hojaDeViajeID;
        return $con->query($consultainsercion);
    }
    function insertarEdicion($con,$insercion,$edicion,$user_id){
        $consulta="
        INSERT INTO `hoja_de_viaje_edicion` 
        (`hojaDeViajeEdicionID`, `hojaDeViajeID`,`creadorId`, `hojaDeViajeEdicionUsuarioEdicion`, `empresaEmisoraId`, 
        `empresaReceptoraId`, `operadorId`, 
        `hojaDeViajeEstadoId`, `cargaId`, `cargaTipoId`, `hojaDeViajeFechaDeEdicion`, `hojaDeViajeFechaLiberacion`, 
        `hojaDeViajeFechaArribo`, `hojaDeViajeFechaCarga`, `hojaDeViajeFechaLlegadaDeDescarga`, `hojaDeViajeFechaDescarga`, 
        `hojaDeViajeOrigen`, `hojaDeViajeOrigenDeDestino`, `hojaDeViajeRemolque1`, `hojaDeViajeRemolque2`, `hojaDeViajePlaca1`, 
        `hojaDeViajePlaca2`, `hojaDeViajeEconomico1`, `hojaDeViajeEconomico2`, `hojaDeViajeTalon1`, `hojaDeViajeTalon2`, 
        `hojaDeViajeCargaCantidad`, `hojaDeViajeComentarios`) VALUES (
            NULL, 
            '".$insercion['hojaDeViajeID']."', 
            '".$insercion['sesionId']."', 
            '".$user_id."', 
            '".$insercion['empresaEmisoraId']."', 
            '".$insercion['empresaReceptoraId']."', 
            '".$insercion['operadorId']."', 
            '".$insercion['hojaDeViajeEstadoId']."', 
            '".$insercion['cargaId']."', 
            '".$insercion['cargaTipoId']."', 
            '".$edicion['fechaActial']."', 
            '".$insercion['hojaDeViajeFechaLiberacion']."',
            '".$insercion['hojaDeViajeFechaArribo']."',
            '".$insercion['hojaDeViajeFechaCarga']."',
            '".$insercion['hojaDeViajeFechaLlegadaDeDescarga']."',
            '".$insercion['hojaDeViajeFechaDescarga']."',
            '".$insercion['hojaDeViajeOrigen']."', 
            '".$insercion['hojaDeViajeOrigenDeDestino']."', 
            '".$insercion['hojaDeViajeRemolque1']."', 
            '".$insercion['hojaDeViajeRemolque2']."', 
            '".$insercion['hojaDeViajePlaca1']."', 
            '".$insercion['hojaDeViajePlaca2']."', 
            '".$insercion['hojaDeViajeEconomico1']."', 
            '".$insercion['hojaDeViajeEconomico2']."', 
            '".$insercion['hojaDeViajeTalon1']."',
            '".$insercion['hojaDeViajeTalon2']."', 
            '".$insercion['hojaDeViajeCargaCantidad']."', 
            '".$insercion['hojaDeViajeComentarios']."'
        );
        ";
        return $consulta=$con->query($consulta);
    }
    function editarEdicion($con,$insercion,$edicion,$user_id){
        $consulta="
        UPDATE hoja_de_viaje
        SET 
        hojaDeViajeEdicionUsuarioEdicion='".$user_id."',
        empresaEmisoraId='".$edicion['empresaEmisoraId']."',
        empresaReceptoraId='".$edicion['empresaReceptoraId']."',
        operadorId='".$edicion['operadorId']."',
        hojaDeViajeEstadoId='".$edicion['hojaDeViajeEstadoId']."',
        cargaId='".$edicion['cargaId']."',
        cargaTipoId='".$edicion['cargaTipoId']."',
        hojaDeViajeFechaDeEdicion='".$edicion['fechaActial']."',
        hojaDeViajeFechaArribo='".$edicion['hojaDeViajeFechaArribo']."',
        hojaDeViajeFechaCarga='".$edicion['hojaDeViajeFechaCarga']."',
        hojaDeViajeFechaLlegadaDeDescarga='".$edicion['hojaDeViajeFechaLlegadaDeDescarga']."',
        hojaDeViajeFechaDescarga='".$edicion['hojaDeViajeFechaDescarga']."',
        hojaDeViajeOrigen='".$edicion['hojaDeViajeOrigen']."',
        hojaDeViajeOrigenDeDestino='".$edicion['hojaDeViajeOrigenDeDestino']."',
        hojaDeViajeRemolque1='".$edicion['hojaDeViajeRemolque1']."',
        hojaDeViajeRemolque2='".$edicion['hojaDeViajeRemolque2']."',
        hojaDeViajePlaca1='".$edicion['hojaDeViajePlaca1']."',
        hojaDeViajePlaca2='".$edicion['hojaDeViajePlaca2']."',
        hojaDeViajeEconomico1='".$edicion['hojaDeViajeEconomico1']."',
        hojaDeViajeEconomico2='".$edicion['hojaDeViajeEconomico2']."',
        hojaDeViajeTalon1='".$edicion['hojaDeViajeTalon1']."',
        hojaDeViajeTalon2='".$edicion['hojaDeViajeTalon2']."',
        hojaDeViajeCargaCantidad='".$edicion['hojaDeViajeCargaCantidad']."',
        hojaDeViajeComentarios='".$edicion['hojaDeViajeComentarios']."'
        WHERE hoja_de_viaje.hojaDeViajeID = ".$insercion['hojaDeViajeID'];
        return $consulta=$con->query($consulta);
    }
?>