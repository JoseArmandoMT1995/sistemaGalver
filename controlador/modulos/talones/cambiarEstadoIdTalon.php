<?php
include "../../coneccion/config.php";
if (isset($_POST)) 
{
    if (isset($_POST["hojaDeViajeEstadoId"]) && isset($_POST["hojaDeViajeID"])&& isset($_POST["caso"])) 
        {
            switch ($_POST['caso']) {
                case 2:
                    
                    print_r(editaEstado($_POST,$con));
                break;
                
                default:
                    # code...
                    break;
            }
            
        }
}    
function editaEstado($datos,$con){
    $hojaDeViajeEstadoId=$datos["hojaDeViajeEstadoId"];
    $hojaDeViajeID=$datos["hojaDeViajeID"];
    $consulta="UPDATE `hoja_de_viaje` SET `hojaDeViajeEstadoId` = '$hojaDeViajeEstadoId' WHERE `hoja_de_viaje`.`hojaDeViajeID` = $hojaDeViajeID LIMIT 1;";
    return $con->query($consulta);
}
?>