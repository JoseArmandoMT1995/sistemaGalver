<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>galver</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="./assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="./assets/css/login.css" rel="stylesheet">
</head>
<body class="fondoLogin">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9 mt-5 ">
                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card-body p-0 caja-login">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block align-self-center">
                                <img src="./assets/img/GalverLogisticaLogo.png" class="rounded mx-auto d-block bg-login-image " alt="Responsive image">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Sistema de Galver</h1>
                                    </div>
                                    <form class="user" action="./controlador/login/login.php" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control "
                                                id="nombreLogin" aria-describedby="nombreLogin" name="username"
                                                placeholder="Ingresa tu nombre de usuario...">
                                        </div>
     
                                        <div class="form-group">
                                            <input type="password" class="form-control " name="password"
                                                id="exampleInputPassword" placeholder="Contraseña">
                                        </div>
                                        <button type="submit" class="btn btn-primary  btn-block" >Ingresar</button>
                                        
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="./assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="./assets/js/sb-admin-2.min.js"></script>
</body>
</html>