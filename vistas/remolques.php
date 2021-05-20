<?php
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/selects.php";
    include "../import/componentes/nav1.php";
    
    echo '<a href="./remolquesRegistro.php">Agregar nueva Remolques</a>';
    $tractores=muestraRemolque($mysqli);
    while ($fila =$tractores->fetch_assoc()) {
        //echo '<option value="'.$fila["tractorMarcaId"].'">'.$fila["tractorMarcaNombre"].'</option>';
        echo "<hr>";
        print_r($fila);
        
    }

?>