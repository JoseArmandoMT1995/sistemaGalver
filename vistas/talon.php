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
    <style>
        .card {
            height: 800px !important;
        }

        div.cardScroll {
            width: 1200px;
            height: 700px;
            overflow: auto;
        }
    </style>
    <div class="row">
        <!- - Area Chart -->
            <div class="col-12">

                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <?php
                                    include "../import/componentes/talon/nav.php";
                                ?>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area cardScroll">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Emisor</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Operador</th>
                                            <th scope="col">Origen</th>
                                            <th scope="col">Destino</th>
                                            <th scope="col">Talon</th>
                                            <th scope="col">Cajas</th>

                                            <th scope="col">F Arribo</th>
                                            <th scope="col">F Carga</th>
                                            <th scope="col">F Entrega</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Emisor</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Operador</th>
                                            <th scope="col">Origen</th>
                                            <th scope="col">Destino</th>
                                            <th scope="col">Talon</th>
                                            <th scope="col">Cajas</th>

                                            <th scope="col">F Arribo</th>
                                            <th scope="col">F Carga</th>
                                            <th scope="col">F Entrega</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>GALVER 02</td>
                                            <td>MSSUGAR</td>
                                            <td>ALEJANDRO BENITEZ PEREZ</td>
                                            <td>TAMAZULA</td>
                                            <td>BODEGA ALMER-GDL</td>
                                            <td>C32997</td>
                                            <td>59TX9U</td>
                                            <td>22/03/2021</td>
                                            <td>22/03/2021</td>
                                            <td>22/03/2021</td>
                                            <td></td>
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