<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
?>
<?php
    include "../controlador/coneccion/config.php";
    //include "../controlador/modulos/talones/select.php";
?>
<div class="container-fluid">
    <?php
        include "../import/componentes/nav1.php";
    ?>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-12">
            <style>
                .card {
                    height: 1050px !important;
                }
            </style>
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <?php
                    //include "../import/componentes/hojaDeViaje/nav.php";
                ?>
                <!-- Card Body -->
                <style>
                    .btn-light {
                        border-color: #d1d3e2;
                    }
                    .bootstrap-select .dropdown-menu {
                        background: black !important;
                    }
                    .btn-light:not(:disabled):not(.disabled).active,
                    .btn-light:not(:disabled):not(.disabled):active,
                    .show>.btn-light.dropdown-toggle {
                        background-color: rgb(255, 217, 0) !important;
                    }
                </style>
                <div class="card-body">
                    <div class="chart-area">
                        <form action="../controlador/modulos/operadores/operadoresAgregar.php" method="post">
                           <h1 class="text-center mb-5">Registro de Operador.</h1>
                            <div class="form-row ">
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Nombre de operador</label>
                                    <input type="text" class="form-control" placeholder="Escriba aqui..."
                                        name="operadorNombre" min="0" id="operadorNombre"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">R.F.C.</label>
                                    <input type="text" class="form-control" placeholder="Escriba aqui..."
                                        name="operadorRFC" min="0" id="operadorRFC"/>
                                </div>      
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Codigo Postal</label>
                                    <input type="text" class="form-control" placeholder="Escriba aqui..."
                                        name="operadorLisencia" min="0" id="operadorLisencia"/>
                                </div>                            
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-warning col-md-6" id="agregarTalonNuevo">Agregar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include "../import/componentes/footer.php";
    include "../import/componentes/modal/modalIndex.php";
    //include "../import/componentes/js/talon.php";
?>
