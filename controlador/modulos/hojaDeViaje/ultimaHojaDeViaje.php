<?php
function ultimoID()
    {   
        $consulta="SELECT MAX(id_hojaDeViaje)+1 AS id_asignado FROM hoja_de_viaje";
        $result = consultaSQL($consulta);
        if ($result->num_rows == 0) 
        {
            return 1;
        }
        else
        {
            while ($fila = $result->fetch_assoc()) 
            {
                return $fila['id_asignado'];
            }
        }
    }
function consultaSQL($consulta)
{
    include "../../coneccion/config.php";
    $result = $mysqli->query($consulta);
    return $result;
}
echo (ultimoID());
?>