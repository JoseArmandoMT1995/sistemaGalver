<?php
$host="localhost";
$user="root";
$password="";
$db="galver_sistema2021";
//$con = new mysqli($host,$user,$password,$db);
// Create connection
$mysqli = new mysqli($host, $user, $password, $db);
if ($mysqli->connect_errno) 
{
    echo "Lo sentimos, este sitio web está experimentando problemas.";
    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";    
    exit;
}
?>