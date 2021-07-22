<?php 
    session_start();
    session_destroy();
    print "<script>alert(\"Usted salio.\");window.location='../../';</script>";
?>