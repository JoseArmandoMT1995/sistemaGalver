<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/selects.php";
?>
<div class="container-fluid">
    <?php
        //include "../import/componentes/nav1.php";
    ?>
    <style>
        .card_hdv {
            height: 1300px !important;
        }
        div.cardScroll {
            width: 1200px;
            height: 1200px;
            overflow: auto;
        }
    </style>
    <div class="row">
        <!-- Area Chart -->
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
                                                <th scope="col">FECHA_CREACION</th>
                                                <th scope="col">FECHA_EDICION</th>
                                                <th scope="col">CREADOR</th>
                                                <th scope="col">EDITOR</th>
                                                <th scope="col">ESTADO</th>
                                                <th scope="col">HOJA_DE_VIAJE_TIPO</th>

                                                <th scope="col">VER</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">FECHA_CREACION</th>
                                                <th scope="col">FECHA_EDICION</th>
                                                <th scope="col">CREADOR</th>
                                                <th scope="col">EDITOR</th>
                                                <th scope="col">ESTADO</th>
                                                <th scope="col">HOJA_DE_VIAJE_TIPO</th>

                                                <th scope="col">VER</th>
                                            </tr>
                                        </tfoot>
                                        <tbody class=" text-center">
                                        <?php
                                        $hdv=muestraHDVT($mysqli,1);
                                        while ($filas =$hdv->fetch_assoc()) {
                                            echo 
                                            "<tr>".
                                            "<td>".$filas["ID"]."</td>".
                                            "<td>".$filas["FECHA_CREACION"]."</td>".
                                            "<td>".$filas["FECHA_EDICION"]."</td>".
                                            "<td>".$filas["CREADOR"]."</td>".
                                            "<td>".$filas["EDITOR"]."</td>".
                                            "<td>".$filas["ESTADO"]."</td>".
                                            "<td>".$filas["TIPO"]."</td>".
                                            "<td><a href='./hojaDeViajeArriboEdicion.php?id=".$filas["ID"]."'><button type='button' class='btn btn-warning'><i class='fas fa-eye'></i></button></a></td>".
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