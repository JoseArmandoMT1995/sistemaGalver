<?php 
session_start();
session_destroy();
print "<script>alert(\"usted salio.\");window.location='../../';</script>";
?>