<?php
include "../coneccion/config.php";

//funciones de vista
function muestraHDV($mysqli)
    {
        $result = $mysqli->query("
        SELECT * FROM hoja_de_viaje INNER JOIN empresa_emisora ON empresa_emisora.empresaEmisoraId = hoja_de_viaje.empresaEmisoraId INNER JOIN empresa_receptora ON empresa_receptora.empresaReceptoraId = hoja_de_viaje.empresaReceptoraId INNER JOIN tractor ON tractor.tractorId = hoja_de_viaje.tractorId INNER JOIN carga ON carga.cargaId = hoja_de_viaje.cargaId INNER JOIN carga_unidad_de_medida ON carga_unidad_de_medida.cargaUnidadDeMedidaID = hoja_de_viaje.cargaUnidadDeMedidaID INNER JOIN operadores ON operadores.operadorID = hoja_de_viaje.operadorID ORDER BY `hoja_de_viaje`.`hojaDeViajeID` ASC ");
        return $result;
    }
    function muestraTractorHDV($mysqli,$table,$columna1,$id,$columnaValor1)
    {
        $result = $mysqli->query("SELECT * FROM `$table` WHERE $columna1 =$id");
        while ($fila =$result->fetch_assoc()) {
            $result=$fila[$columnaValor1];
            break;
        }
        return $result;
    }

function registrosHojaDeViaje($mysqli){
    $hdv=muestraHDV($mysqli);
    $hdvNuevo=[];
    while ($fila =$hdv->fetch_assoc()) {
        $hdvNuevo[]=
        array(
            "hojaDeViajeID"=>$fila['hojaDeViajeID'],
            "empresaEmisoraId"=>$fila['empresaEmisoraId'],
            "empresaEmisoraNombre"=>$fila['empresaEmisoraNombre'],
            "empresaReceptoraId"=>$fila['empresaReceptoraId'],
            "empresaReceptoraNombre"=>$fila['empresaReceptoraNombre'],
            "operadorID"=>$fila['operadorID'],
            "operadorNombre"=>$fila['operadorNombre'],
            "tractorId"=>$fila['tractorId'],
            "tractorEconomico"=>$fila['tractorEconomico'],
            "tractorPlaca"=>$fila['tractorPlaca'],
            "remolqueID1"=>$fila['remolqueID1'],
            "remolqueEconomico1"=>muestraTractorHDV($mysqli,"remolque","remolqueID",$fila['remolqueID1'],"remolqueEconomico"),
            "remolquePlaca1"=>muestraTractorHDV($mysqli,"remolque","remolqueID",$fila['remolqueID1'],"remolquePlaca"),
            "remolqueCargaId1"=>$fila['remolqueCargaId1'],
            "remolqueCargaServicio1"=>muestraTractorHDV($mysqli,"remolque_carga","remolqueCargaId",$fila['remolqueCargaId1'],"remolqueCargaServicio"),
            "hojaDeViajeTalon1"=>$fila['hojaDeViajeTalon1'],

            "remolqueID2"=>$fila['remolqueID2'],
            "remolqueEconomico2"=>muestraTractorHDV($mysqli,"remolque","remolqueID",$fila['remolqueID2'],"remolqueEconomico"),
            "remolquePlaca2"=>muestraTractorHDV($mysqli,"remolque","remolqueID",$fila['remolqueID2'],"remolquePlaca"),
            "remolqueCargaId2"=>$fila['remolqueCargaId2'],
            "remolqueCargaServicio2"=>muestraTractorHDV($mysqli,"remolque_carga","remolqueCargaId",$fila['remolqueCargaId2'],"remolqueCargaServicio"),
            "hojaDeViajeTalon2"=>$fila['hojaDeViajeTalon2'],

            "cargaId"=>$fila['cargaId'],
            "cargaUnidadDeMedidaID"=>$fila['cargaUnidadDeMedidaID'],
            "hojaDeViajeCantidadCarga"=>$fila['hojaDeViajeCantidadCarga'],
            "hojaDeViajeCantidadCargaProporcion"=>$fila['hojaDeViajeCantidadCargaProporcion'],
            "hojaDeViajeToneladas"=>($fila['hojaDeViajeCantidadCarga']*$fila['hojaDeViajeCantidadCargaProporcion']),
            "hojaDeViajeComentario"=>$fila['hojaDeViajeComentario'],
            "hojaDeViajeOrigen"=>$fila['hojaDeViajeOrigen'],
            "hojaDeViajeOrigenDeDestino"=>$fila['hojaDeViajeOrigenDeDestino'],
            "usuarioCreadorId"=>$fila['usuarioCreadorId'],
            "usuarioCreadorNombre"=>muestraTractorHDV($mysqli,"usuario","usuarioId",$fila['usuarioCreadorId'],"usuarioNombre"),

            "hojaDeViajeFechaDeEdicion"=>$fila['hojaDeViajeFechaDeEdicion'],
            "hojaDeViajeFechaLiberacion"=>$fila['hojaDeViajeFechaLiberacion'],
            "hojaDeViajeFechaArribo"=>$fila['hojaDeViajeFechaArribo'],
            "hojaDeViajeFechaCarga"=>$fila['hojaDeViajeFechaCarga'],
            "hojaDeViajeFechaLlegadaDeDescarga"=>$fila['hojaDeViajeFechaLlegadaDeDescarga'],
            "hojaDeViajeFechaDescarga"=>$fila['hojaDeViajeFechaDescarga'],
        );
    }
    return $hdvNuevo;
}
//var_dump(registrosHojaDeViaje($mysqli));
echo "<h1>hola</h1><hr>";
$filas= registrosHojaDeViaje($mysqli);
for ($i=0; $i < count($filas) ; $i++) 
{ 
    print_r($filas[$i]["hojaDeViajeID"]);
    print_r("<hr>");
}
?>