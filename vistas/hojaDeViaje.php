<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
?>
<?php
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/selects.php";
?>
<div class="container-fluid">
    <?php
        include "../import/componentes/nav1.php";
    ?>
    <style>
        .card_hdv {
            height: 1300px !important;
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
                <style>
   
                </style>
                <div class="card shadow mb-4 card_hdv">
                    <!-- Card Header - Dropdown -->
                    <?php
                                    include "../import/componentes/hojaDeViaje/nav.php";
                                ?>
                    <!-- Card Body -->
                    <div class="card-body">

                        <div class="chart-area ">
                            <div class="row">

                                <div class="cardScroll table-responsive">

                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">ECONOMICO</th>
                                                <th scope="col">OPERADOR</th>
                                                <th scope="col">PLACAS</th>
                                                <th scope="col">CAJAS</th>
                                                <th scope="col">LICENCIA</th>
                                                <th scope="col">TALON1</th>
                                                <th scope="col">TALON2</th>
                                                <th scope="col">LIBERACION_FECHA</th>
                                                <th scope="col">FECHA_ARRIBO</th>
                                                <th scope="col">FECHA_CARGA</th>
                                                <th scope="col">FOLIO_DE_CARGA</th>
                                                <th scope="col">TONELADAS</th>
                                                <th scope="col">OBSERVACIONES</th>
                                                <th scope="col">FECHA_ENTREGA</th>
                                                <th scope="col">ORIGEN</th>
                                                <th scope="col">DESTINO</th>
                                                <th scope="col">CLIENTE</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">ECONOMICO</th>
                                                <th scope="col">OPERADOR</th>
                                                <th scope="col">PLACAS</th>
                                                <th scope="col">CAJAS</th>
                                                <th scope="col">LICENCIA</th>
                                                <th scope="col">TALON1</th>
                                                <th scope="col">TALON2</th>
                                                <th scope="col">LIBERACION_FECHA</th>
                                                <th scope="col">FECHA_ARRIBO</th>
                                                <th scope="col">FECHA_CARGA</th>
                                                <th scope="col">FOLIO_DE_CARGA</th>
                                                <th scope="col">TONELADAS</th>
                                                <th scope="col">OBSERVACIONES</th>
                                                <th scope="col">FECHA_ENTREGA</th>
                                                <th scope="col">ORIGEN</th>
                                                <th scope="col">DESTINO</th>
                                                <th scope="col">CLIENTE</th>
                                            </tr>
                                        </tfoot>
                                        <tbody class=" text-center">
                                        <?php
                                        $hdv=muestraHDV($mysqli);
                                        while ($filas =$hdv->fetch_assoc()) {
                                            echo 
                                            "<tr>".
                                            "<td>".$filas["ID"]."</td>".
                                            "<td>".$filas["ECONOMICO"]."</td>".
                                            "<td>".$filas["OPERADOR"]."</td>".
                                            "<td>".$filas["PLACAS"]."</td>".
                                            "<td>".$filas["CAJAS"]."</td>".
                                            "<td>".$filas["LICENCIA"]."</td>".
                                            "<td>".$filas["TALON1"]."</td>".
                                            "<td>".$filas["TALON2"]."</td>".
                                            "<td>".$filas["LIBERACION_FECHA"]."</td>".
                                            "<td>".$filas["FECHA_ARRIBO"]."</td>".
                                            "<td>".$filas["FECHA_CARGA"]."</td>".
                                            "<td>".$filas["FOLIO_DE_CARGA"]."</td>".
                                            "<td>".$filas["TONELADAS"]."</td>".
                                            "<td>".$filas["OBSERVACIONES"]."</td>".
                                            "<td>".$filas["FECHA_ENTREGA"]."</td>".
                                            "<td>".$filas["ORIGEN"]."</td>".
                                            "<td>".$filas["DESTINO"]."</td>".
                                            "<td>".$filas["CLIENTE"]."</td>".
                                            "</tr>";
                                        }
                                        ?>
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
    //include "../import/componentes/modal/talon.php";
    include "../import/componentes/modal/modalIndex.php";
    include "../import/componentes/js/main.php";
?>