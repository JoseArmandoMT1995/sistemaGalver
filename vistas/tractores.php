<?php
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/selects.php";
    include "../import/componentes/nav1.php";
    
    echo '<a href="./tractoresRegistro.php">Agregar nueva Tractores</a>';
    $tractores=muestraTractoresMarca($mysqli);
    $fila = $tractores->fetch_assoc();
    echo "<h1>numero de registros: ".count($fila)."</h1>";
    while ($fila) {
        //echo '<option value="'.$fila["tractorMarcaId"].'">'.$fila["tractorMarcaNombre"].'</option>';
        print_r($fila);
        echo "h"
    }

?>