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
        .table {
            margin: auto;
            width: 50% !important;
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
                        $tituloPlantilla='<i class="fas fa-folder-plus"></i> '."LIBERACION";
                        include "../import/componentes/hojaDeViaje/nav.php";
                    ?>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area ">
                        <div class="row">
                            <script type="text/javascript" src="./paginar.js"></script>
                            <div id="index_native" class="box col-12"></div>
                            <div class="col-5 d-flex justify-content-center">
                                <div class="input-group mb-3 col-12 mt-3">
                                    <input type="text" class="form-control buscarBdString bg-light" placeholder="Ingrese el contenido"
                                    aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary buscarBd bg-primary" type="button"><i
                                                class="fas fa-search text-light"></i></button>
                                    </div>
                                </div>
                            </div>
                            <style>
                                div.cardScroll {
                                    height: 1090px;
                                    overflow: auto;
                                }
                            </style>
                            <div class="cardScroll table-responsive table_box_native" id="table_box_native">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">LIBERACION FECHA</th>
                                            <th scope="col">ECONOMICO</th>
                                            <th scope="col">CLIENTE</th>
                                            <th scope="col">OPERADOR</th>
                                            <th scope="col">LICENCIA</th>
                                            <th scope="col">PLACAS</th>
                                            <th scope="col">CAJAS</th>
                                            <th scope="col">TALONES</th>
                                            <th scope="col">TONELADAS</th>
                                            <th scope="col">ORIGEN DE CARGA</th>
                                            <th scope="col">EDICION</th>
                                            <th scope="col">SIGUIENTE PASO</th>
                                        </tr>
                                    </thead>
                                    <tbody class=" text-center tabla_hdv">
                                        <!--contenido agregado por ajax-->
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">LIBERACION FECHA</th>
                                            <th scope="col">ECONOMICO</th>
                                            <th scope="col">CLIENTE</th>
                                            <th scope="col">OPERADOR</th>
                                            <th scope="col">LICENCIA</th>
                                            <th scope="col">PLACAS</th>
                                            <th scope="col">CAJAS</th>
                                            <th scope="col">TALONES</th>
                                            <th scope="col">TONELADAS</th>
                                            <th scope="col">ORIGEN DE CARGA</th>
                                            <th scope="col">EDICION</th>
                                            <th scope="col">SIGUIENTE PASO</th>
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
    <?php
    include "../import/componentes/footer.php";
    include "../import/componentes/modal/modalIndex.php";
    include "../import/componentes/js/main.php";
    ?>
    <script>
        ajaxTaba(1, "");
        window.addEventListener("load", function () 
        {
            reiniciarTabla();
        }, false);
        function reiniciarTabla() 
        {
            paginator(
                {
                    table: document.getElementById("table_box_native").getElementsByTagName("table")[0],
                    box: document.getElementById("index_native"),
                    active_class: "btn btn-secondary"
                }
            );
        }
        $(".buscarBd").click(function () 
            {
                var string = $(".buscarBdString").val();
                ajaxTaba(1, string);
            }
        );
        function ajaxTaba(estatus, string) 
        {
            $.ajax(
                {
                    type: "POST",
                    url: "./prueba1Consulta.php",
                    data: {
                        "estado": estatus,
                        "string": string
                    },
                    success: function (res) {
                        $(".tabla_hdv").html(res);
                        reiniciarTabla();
                    }
                }
            );
        }
    </script>