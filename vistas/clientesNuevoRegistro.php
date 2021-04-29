<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
?>
<div class="container-fluid">
    <?php
        include "../import/componentes/nav1.php";
    ?>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <?php
                    include "../import/componentes/clientes/nav.php";
                ?>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <form action="../controlador/modulos/clientes/clientesAgregar.php" method="POST">
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Nombre de la Empresa"
                                        name="empresaNombre">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="RFC" name="empresaRFC">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Telefono Fijo 1"
                                        name="empresaTelefonoFijo1">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Telefono Celular 1" name="empresaTelefonoCelular1">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Telefono Fijo 2"
                                        name="empresaTelefonoFijo2">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Telefono Celular 2" name="empresaTelefonoCelular2">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Correo"
                                        name="empresaCorreo">
                                </div>
                            </div>
                            <div class="form-group  mt-3">
                                <label for="exampleInputEmail1">Descripcion de la empresa</label>
                                    <textarea 
                                    class="form-control" 
                                    id="exampleFormControlTextarea1" 
                                    rows="3"
                                    name="empresaDescripcion"
                                    >
                                    </textarea> <small id="emailHelp"
                                    class="form-text text-muted">We'll never
                                    share your email with
                                    anyone else.</small>
                            </div>
                            <div class="form-group  mt-3">
                                <label for="exampleInputEmail1">Direccion</label>
                                    <textarea 
                                    class="form-control" 
                                    id="exampleFormControlTextarea1" 
                                    rows="3"
                                    name="empresaDireccion"
                                    >
                                    </textarea> <small id="emailHelp"
                                    class="form-text text-muted">We'll never
                                    share your email with
                                    anyone else.</small>
                            </div>
                            <button type="submir" class="btn btn-secondary btn-lg btn-block">Agregar</button>
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
    include "../import/componentes/js/main.php";
?>