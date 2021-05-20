<?php
    include "../controlador/login/acceso.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema galvert</title>
    <!-- Custom fonts for this template-->
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <Link rel="stylesheet" href="../assets/css/bootstrap-select.css"></Link>

    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">  
    <link rel="stylesheet" href="../assets/css/animate.css"> 

    <link href="../assets/css/main.css" rel="stylesheet">
</head>
<?php
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
?>

<div class="container-fluid">
    
    <?php
        //include "./import/componentes/nav1.php";
    ?>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-12">

            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">INICIO</h6>
                   
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <h1 class="text-center">Bienbenido <?php echo $_SESSION["usuarioTipoCargo"];?>- <?php echo $_SESSION["usuarioNombre"];?> </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include "../import/componentes/footer.php";
    //include "../import/componentes/modal/modalIndex.php";
?>
    <!-- Bootstrap core JavaScript-->
    
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>	
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/bootstrap-select.js"></script>
    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>
    <script src="../assets/js/sweetalert2.all.min.js"></script>

</body>
</html>