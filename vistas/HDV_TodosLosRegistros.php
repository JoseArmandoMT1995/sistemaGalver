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
        .card_hdv 
        {
            height: 1300px !important;
        }
        div.cardScroll 
        {
            width: 1350px;
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
                                            <th scope="col" class="text-center">ID</th>
                                            <th scope="col" class="text-center">ESTADO</th>
                                            <th scope="col" class="text-center">REMOLQUES</th>
                                            <th scope="col" class="text-center">VER</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col" class="text-center">ID</th>
                                            <th scope="col" class="text-center">ESTADO</th>
                                            <th scope="col" class="text-center">REMOLQUES</th>
                                            <th scope="col" class="text-center">VER</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class=" text-center">
                                        <?php
                                        $hdv=muestraHDVT($mysqli,1);
                                        while ($filas =$hdv->fetch_assoc()) 
                                        {
                                            echo 
                                            "<tr bgcolor='".$filas["ESTADO_TD"]."' class='text-dark font-weight-bold' >".
                                            "<td>".$filas["ID"]."</td>".
                                            "<td>".$filas["ESTADO"]."</td>".
                                            "<td style='-webkit-text-stroke: 1px ".$filas["COLOR_TD"]."; color: black; '>".$filas["TIPO"]."</td>".
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
                                    <th scope="col">ID</th>
                                    <th scope="col">ESTADO VIAJE</th>
                                    <th scope="col">FECHA LIBERACION</th>
                                    <th scope="col">FECHA ARRIBO</th>
                                    <th scope="col">FECHA CARGA</th>
                                    <th scope="col">FECHA DESCARGA</th>
                                    <th scope="col">ECONOMICO</th>
                                    <th scope="col">CLIENTE</th>
                                    <th scope="col">OPERADOR</th>
                                    <th scope="col">LICENCIA</th>
                                    <th scope="col">PLACAS</th>
                                    <th scope="col">CAJAS</th>
                                    <th scope="col">TALON1</th>
                                    <th scope="col">TALON2</th>
                                    <th scope="col">TONELADAS</th>
                                    <th scope="col">OBSERVACIONES</th>
                                    <th scope="col">OBSERBVACIONES_CARGA</th>
                                    <th scope="col">FOLIO_CARGA</th>
                                    <th scope="col">FOLIO_BASCULA</th>
                                    <th scope="col">SELLOS</th>
                                    <th scope="col">ORIGEN</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">ESTADO VIAJE</th>
                                    <th scope="col">FECHA LIBERACION</th>
                                    <th scope="col">FECHA ARRIBO</th>
                                    <th scope="col">FECHA CARGA</th>
                                    <th scope="col">FECHA DESCARGA</th>
                                    <th scope="col">ECONOMICO</th>
                                    <th scope="col">CLIENTE</th>
                                    <th scope="col">OPERADOR</th>
                                    <th scope="col">LICENCIA</th>
                                    <th scope="col">PLACAS</th>
                                    <th scope="col">CAJAS</th>
                                    <th scope="col">TALON1</th>
                                    <th scope="col">TALON2</th>
                                    <th scope="col">TONELADAS</th>
                                    <th scope="col">OBSERVACIONES</th>
                                    <th scope="col">OBSERBVACIONES_CARGA</th>
                                    <th scope="col">FOLIO_CARGA</th>
                                    <th scope="col">FOLIO_BASCULA</th>
                                    <th scope="col">SELLOS</th>
                                    <th scope="col">ORIGEN</th>
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
        function modal_remolques(id) 
        {
            var url = "../controlador/modulos/hojaDeViaje/todosLosRegistros/index.php";
            $.ajax(
            {
                type: "POST",
                url: url,
                data: 
                {
                    "caso": 1,
                    "id": id
                },
                success: function (data) 
                {
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