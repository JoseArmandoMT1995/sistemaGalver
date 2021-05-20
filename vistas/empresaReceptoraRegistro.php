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
                        <form action="../controlador/modulos/receptores/receptorAgregar.php" method="post">
                           <h1 class="text-center mb-5">Registro de Receptora emisoras.</h1>
                            <div class="form-row ">
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Nombre de empresa</label>
                                    <input type="text" class="form-control" placeholder="Escriba aqui..."
                                        name="empresaReceptoraNombre" min="0" id="empresaReceptoraNombre"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">R.F.C.</label>
                                    <input type="text" class="form-control" placeholder="Escriba aqui..."
                                        name="empresaReceptoraRFC" min="0" id="empresaReceptoraRFC"/>
                                </div>      
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Codigo Postal</label>
                                    <input type="text" class="form-control" placeholder="Escriba aqui..."
                                        name="empresaReceptoraCP" min="0" id="empresaReceptoraCP"/>
                                </div>                            
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Direccion</label>
                                <textarea class="form-control" id="empresaReceptoraDireccion" rows="3" name="empresaReceptoraDireccion"></textarea>
                            </div>
                            <div class="form-row ">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Telefono Fijo 1</label>
                                    <input type="text" class="form-control" placeholder="Escriba aqui..."
                                        name="empresaReceptoraTelefonoFijo1" min="0" id="empresaReceptoraTelefonoFijo1"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Telefono Celular 1</label>
                                    <input type="text" class="form-control" placeholder="Escriba aqui..."
                                        name="empresaReceptoraTelefonoCelular1" min="0" id="empresaReceptoraTelefonoCelular1"/>
                                </div>                                
                            </div>
                            <div class="form-row ">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Telefono Fijo 2</label>
                                    <input type="text" class="form-control" placeholder="Escriba aqui..."
                                        name="empresaReceptoraTelefonoFijo2" min="0" id="empresaReceptoraTelefonoFijo2"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Telefono Celular 2</label>
                                    <input type="text" class="form-control" placeholder="Escriba aqui..."
                                        name="empresaReceptoraTelefonoCelular2" min="0" id="empresaReceptoraTelefonoCelular2"/>
                                </div>                                
                            </div>
                            <div class="form-row ">
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Correo electronico</label>
                                    <input type="text" class="form-control" placeholder="Escriba aqui..."
                                        name="empresaReceptoraCorreo" min="0" id="empresaReceptoraCorreo"/>
                                </div>                      
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descripcion de la empresa</label>
                                <textarea class="form-control" id="empresaReceptoraDescripcion" rows="3" name="empresaReceptoraDescripcion"></textarea>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-warning col-md-6" id="agregaReceptorNuevo">Agregar</button>
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
