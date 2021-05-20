<?php
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/selects.php";
    include "../import/componentes/nav1.php";
    
    echo '<a href="./cargaRegistro.php">Agregar nueva Remolques</a>';
    $tractores=muestraCarga($mysqli);
    while ($fila =$tractores->fetch_assoc()) {
        //echo '<option value="'.$fila["tractorMarcaId"].'">'.$fila["tractorMarcaNombre"].'</option>';
        echo "<hr>";
        print_r($fila);
        
    }

?>