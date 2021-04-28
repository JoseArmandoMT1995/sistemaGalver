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
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre de la Empresa</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">RFC</th>
                                        <th scope="col">Titular de la empresa</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre de la Empresa</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">RFC</th>
                                        <th scope="col">Titular de la empresa</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>GALVER 02</td>
                                        <td>Empresa encargada de la distrubucion de azucares</td>
                                        <td>2we432343321</td>
                                        <td>Ana Luz</td>
                                        <td>
                                            <button type="button" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></button>
                                            <button type="button" class="btn btn-warning"><a
                                                    href="clientesEditar.html?idCli=1"><i
                                                        class="fas fa-edit"></i></a></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>GALVER 02</td>
                                        <td>Empresa encargada de la distrubucion de azucares</td>
                                        <td>2we432343321</td>
                                        <td>Ana Luz</td>
                                        <td>
                                            <button type="button" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>

                                            </button>
                                            <button type="button" class="btn btn-warning">
                                                <a href="clientesEditar.html?idCli=2"><i class="fas fa-edit"></i></a>

                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>GALVER 02</td>
                                        <td>Empresa encargada de la distrubucion de azucares</td>
                                        <td>2we432343321</td>
                                        <td>Ana Luz</td>
                                        <td>
                                            <button type="button" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></button>
                                            <button type="button" class="btn btn-warning"><a
                                                    href="clientesEditar.html?idCli=3"><i
                                                        class="fas fa-edit"></i></a></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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