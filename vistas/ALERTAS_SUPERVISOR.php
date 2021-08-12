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
            height: 1320px !important;
        }

        .table {
            margin: auto;
            width: 50% !important;
        }

        div.cardScroll {
            height: 1065px;
            overflow: auto;
        }
    </style>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-12">
            <div class="card shadow mb-4 card_hdv">
                <!-- Card Header - Dropdown -->
                <?php
                        $tituloPlantilla='<i class="fas fa-folder-plus"></i> '."LIBERACION";
                        include "../import/componentes/hojaDeViaje/nav.php";
                    ?>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area ">
                        <div class="row">
                            <script type="text/javascript" src="./paginar.js"></script>
                            <!--INICIO PANEL NUMERICO-->
                            <div id="index_native" class="box col-12"></div>
                            <!--FIN PANEL NUMERICO-->
                            <!--INICIO INPUT DE INFORMACION-->
                            <div class="col-5 d-flex justify-content-center">
                                <div class="input-group mb-3 col-12 mt-3">
                                    <input type="text" class="form-control buscarBdString bg-light"
                                        placeholder="Ingrese el contenido" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary buscarBd bg-primary" type="button"><i
                                                class="fas fa-search text-light"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!--FIN INPUT DE INFORMACION-->
                            <!--INICIO CAJAS DE NUMEROS PARA PAGINAR-->
                            <div class="cardScroll table-responsive table_box_native" id="table_box_native">
                                <!--FIN CAJAS DE NUMEROS PARA PAGINAR-->
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">NUM</th>
                                            <th scope="col">ID <i class="fas fa-search"></i></th>
                                            <th scope="col">ESTATUS</th>
                                            <th scope="col">FECHA DESCARGA</th>
                                            <th scope="col">FECHA LIMITE</th>
                                            <th scope="col">FECHA ACTUAL</th>
                                            <th scope="col">DIFERENCIA DE DIAS</th>

                                        </tr>
                                    </thead>
                                    <tbody class=" text-center tabla_hdv ">
                                        <!--contenido agregado por ajax-->
                                    </tbody>
                                    <tfoot class="">
                                        <tr>
                                            <th scope="col">NUM</th>
                                            <th scope="col">ID <i class="fas fa-search"></i></th>
                                            <th scope="col">ESTATUS</th>
                                            <th scope="col">FECHA DESCARGA</th>
                                            <th scope="col">FECHA LIMITE</th>
                                            <th scope="col">FECHA ACTUAL</th>
                                            <th scope="col">DIFERENCIA DE DIAS</th>

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <?php
    include "../import/componentes/modal/remolqueInfo.php";
    include "../import/componentes/footer.php";
    include "../import/componentes/modal/modalIndex.php";
    include "../import/componentes/js/main.php";
    ?>
    <script>
        ajaxTaba(1, "");
        /*|INICIO|DE|PAGINACION|*/
        window.addEventListener("load", function () {
            reiniciarTabla();
        }, false);

        function reiniciarTabla() {
            paginator({
                table: document.getElementById("table_box_native").getElementsByTagName("table")[0],
                box: document.getElementById("index_native"),
                active_class: "btn btn-secondary"
            });
        }
        /*|FIN|DE|PAGINACION|*/
        $(".buscarBd").click(function () {
            var string = $(".buscarBdString").val();
            ajaxTaba(1, string);
        });

        function ajaxTaba(estatus, string) {
            $.ajax({
                type: "POST",
                url: "./prueba1Consulta.php",
                data: {
                    "caso":1,
                    "estado": estatus,
                    "string": string
                },
                success: function (res) {
                    $(".tabla_hdv").html(res);
                    reiniciarTabla();
                }
            });
        }
        /*ver informacion*/

    </script>
    