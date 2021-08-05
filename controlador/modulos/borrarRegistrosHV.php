<?php
include "../coneccion/config.php";
$consulta="
TRUNCATE arribo_origen_de_carga;
TRUNCATE descarga_destinos;
TRUNCATE descarga_origen_de_carga;
TRUNCATE hoja_de_viaje;
TRUNCATE hoja_de_viaje_edicion;
TRUNCATE tractor_del_operador;
TRUNCATE tractor_del_operador_edicion;
TRUNCATE viaje;";
$mysqli->query($consulta);
header("Location: ../../vistas/HDV_TodosLosRegistros.php");
?>