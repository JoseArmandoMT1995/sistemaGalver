<?php
    include "../controlador/coneccion/config.php";
    include "../import/componentes/nav1.php";
    echo '<a href="./operadorRegistro.php">Agregar operador</a>';

    function muestraClientes($mysqli)
    {
        $arreglo=[];
        $result = $mysqli->query("SELECT * FROM `operadores`");
        while ($row = $result->fetch_object()){
            $arreglo[] = $row;
        }
        return $arreglo;
    }
    $empresaEmisora=muestraClientes($mysqli);
    echo "<h1>numero de registros: ".count($empresaEmisora)."</h1>";

    for ($i=0; $i < count($empresaEmisora); $i++) { 
        print_r($empresaEmisora[0]);
        echo "<hr><br>";
    }

?>