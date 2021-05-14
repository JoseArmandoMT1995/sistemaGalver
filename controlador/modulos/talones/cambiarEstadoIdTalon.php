<?php
include "../../coneccion/config.php";
//print_r($_POST);
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
    echo 0;
}
else
{
    print_r(procesoDeEdicion($con,$paso2,$_POST));
}
function procesoDeEdicion($con,$insercion,$edicion){
        session_start();
        if (insertarEdicion($con,$insercion,$edicion,$_SESSION["user_id"])== 1 || insertarEdicion($con,$insercion,$edicion,$_SESSION["user_id"])=='1') 
        {
            if (editarEdicion($con,$insercion,$edicion,$_SESSION["user_id"])== 1 || editarEdicion($con,$insercion,$edicion,$_SESSION["user_id"])=='1') 
            {
                return 1;
            }
            else{
                return 0;
            }
        }else{
            return 0;
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
        '".$edicion['fechaActual']."', 
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
    hojaDeViajeEstadoId='".$edicion['hojaDeViajeEstadoId']."',
    hojaDeViajeFechaDeEdicion='".$edicion['fechaActual']."'
    WHERE hoja_de_viaje.hojaDeViajeID = ".$insercion['hojaDeViajeID'];

    return $consulta=$con->query($consulta);
}
?>