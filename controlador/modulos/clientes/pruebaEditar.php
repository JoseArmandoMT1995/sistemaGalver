<?php
include "../../coneccion/config.php";
$sql= "
UPDATE `empresa` SET 
`empresaNombre` = 'capcom', 
`empresaRFC` = '223323211', 
`empresaDireccion` = 'sss1', 
`empresaTelefonoFijo1` = '7877811', 
`empresaTelefonoFijo2` = '87878711', 
`empresaTelefonoCelular1` = '8778711', 
`empresaTelefonoCelular2` = '811', 
`empresaCorreo` = 'ss1', 
`tipoEmpresaId` = '2', 
`empresaDescripcion` = 's1 2 ' 
WHERE `empresa`.`empresaId` = 10; ";
$con->query($sql);
print_r($con);
echo "<br><hr>";
var_dump($con);

?>