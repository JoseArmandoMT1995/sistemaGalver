<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/selects.php";
?>
<div class="container-fluid">
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
            <div class="card shadow mb-4 card_hdv">
                <!-- Card Header - Dropdown -->
                <?php
                        $tituloPlantilla='<i class="fas fa-paste"></i> '."HOJA DE VIAJE";
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
                                            "<td><button type='button' class='btn btn-warning modal_remolques' onclick='modal_remolques(".$filas["ID"].")'><i class='fas fa-eye'></i></button></td>".
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
    <!-- Large modal -->
    <div class="modal fade remolques" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Remolques asignados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ESTADO VIAJE</th>
                                    <th scope="col">ECONOMICO</th>
                                    <th scope="col">OPERADOR</th>
                                    <th scope="col">PLACAS</th>
                                    <th scope="col">CAJAS</th>
                                    <th scope="col">LICENCIA</th>
                                    <th scope="col">TALON1</th>
                                    <th scope="col">TALON2</th>
                                    <th scope="col">LIBERACION_FECHA</th>
                                    <th scope="col">TONELADAS</th>
                                    <th scope="col">OBSERVACIONES</th>
                                    <th scope="col">ORIGEN</th>
                                    <th scope="col">CLIENTE</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ESTADO VIAJE</th>
                                    <th scope="col">ECONOMICO</th>
                                    <th scope="col">OPERADOR</th>
                                    <th scope="col">PLACAS</th>
                                    <th scope="col">CAJAS</th>
                                    <th scope="col">LICENCIA</th>
                                    <th scope="col">TALON1</th>
                                    <th scope="col">TALON2</th>
                                    <th scope="col">LIBERACION_FECHA</th>
                                    <th scope="col">TONELADAS</th>
                                    <th scope="col">OBSERVACIONES</th>
                                    <th scope="col">ORIGEN</th>
                                    <th scope="col">CLIENTE</th>
                                </tr>
                            </tfoot>
                            <tbody class=" text-center tabla_remolques">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function modal_remolques(id) {
            var url = "../controlador/modulos/hojaDeViaje/todosLosRegistros/index.php";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    "caso":1,
                    "id": id
                }, //capturo array     
                success: function (data) {
                    $(".tabla_remolques").html(data);
                    $('.remolques').modal('show');
                }
            });
        }
    </script>
    <?php
    include "../import/componentes/footer.php";
    include "../import/componentes/modal/modalIndex.php";
    include "../import/componentes/js/main.php";
?>