<?php
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/selects.php";
    include "../import/componentes/nav1.php";
    
    echo '<a href="./tractoresRegistro.php">Agregar nueva Tractores</a>';
    $tractores=muestraTractores($mysqli);
    while ($fila =$tractores->fetch_assoc()) {
        print_r($fila);
        
    }

?>