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
            <style>
            </style>
            <div class="card shadow mb-4 card_hdv">
                <!-- Card Header - Dropdown -->
                <?php
                        $tituloPlantilla='<i class="fas fa-truck-moving"></i> '."ARRIBO";
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
                                            <th scope="col">ARRIBO_FECHA</th>
                                            <th scope="col">TONELADAS</th>
                                            <th scope="col">OBSERVACIONES</th>
                                            <th scope="col">ORIGEN</th>
                                            <th scope="col">CLIENTE</th>
                                            <th scope="col">EDICION</th>
                                            <th scope="col">SIGUIENTE PASO</th>
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
                                            <th scope="col">ARRIBO_FECHA</th>
                                            <th scope="col">TONELADAS</th>
                                            <th scope="col">OBSERVACIONES</th>
                                            <th scope="col">ORIGEN</th>
                                            <th scope="col">CLIENTE</th>
                                            <th scope="col">EDICION</th>
                                            <th scope="col">SIGUIENTE PASO</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class=" text-center">
                                        <?php
                                        $hdv=muestraHDV($mysqli,2);
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
                                            "<td>".$filas["TONELADAS"]."</td>".
                                            "<td>".$filas["OBSERVACIONES"]."</td>".
                                            "<td>".$filas["ORIGEN"]."</td>".
                                            "<td>".$filas["CLIENTE"]."</td>".
                                            "<td><a href='./HDV_Arribo.php?id=".$filas["ID_VIAJE"]."'><button type='button' class='btn btn-warning'><i class='fas fa-edit'></i></button></a></td>".
                                            "<td><button type='button' class='btn btn-warning cargaInicio' onclick='cargaInicio(".$filas["ID_VIAJE"].")'><i class='fas fa-arrow-alt-circle-right'></i></button></td>".
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
    <div class="modal fade carga" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Generar Carga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="">Folio de carga</label>
                            <input type="text" class="form-control" id="folio_carga" placeholder="ingresar folio">
                            <small id="" class="form-text text-muted folio_carga"></small>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Folio de bascula</label>
                            <input type="text" class="form-control" id="folio_bascula" placeholder="ingresar folio">
                            <small id="" class="form-text text-muted folio_bascula"></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Sellos</label>
                            <input type="text" class="form-control" id="sellos" placeholder="ingresar sello o sellos">
                            <small id="" class="form-text text-muted sellos"></small>
                        </div>
                        <div class="form-group">
                            <label for="">Observacion de Carga</label>
                            <textarea class="form-control" id="observacion_carga" rows="4"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer guardarCambios">
                    <!--pendiente-->
                </div>
            </div>
        </div>
    </div>
    <script>
        function cargaInicio(id) {
            bacearCamposModal();
            var html =
                '<button type="button" class="btn btn-primary" onclick="subirCarga(' + id +
                ')">Guardar cambios</button>' +
                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>';
            $('.guardarCambios').html(html);
            $('.carga').modal('show');
        }
        function bacearCamposModal() {
            $(".folio_carga").html("");
            $("#folio_carga").val("");
            $(".folio_bascula").html("");
            $("#folio_bascula").val("");
            $(".sellos").html("");
            $("#sellos").val("");
            $("#observacion_carga").val("");
        }
        function subirCarga(id) {
            var folioCarga = $("#folio_carga").val();
            var folioBascula = $("#folio_bascula").val();
            var sellos = $("#sellos").val();
            var obserBaciones = $("#observacion_carga").val();
            if (folioCarga !== "" && folioBascula !== "" && sellos !== "") {
                var data = {
                    "id_viaje": id,
                    "viaje_folioDeCarga": folioCarga,
                    "viaje_folioDeBascula": folioCarga,
                    "viaje_sellos": sellos,
                    "viaje_observacion_carga": obserBaciones
                };
                var url="../controlador/modulos/hojaDeViaje/carga/carga.php";
                //bacearCamposModal();
                //$('.carga').modal('hide');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        'caso':1,
                        'data':data
                    },
                    success: function (res) {
                        res = JSON.parse(res);
                        if (res.caso==="true" || res.caso===true) {
                            bacearCamposModal();
                            $('.carga').modal('hide');
                            alert("Se ha generado nueva carga");
                            window.location="./HDV_CargaRegistro.php";
                        } 
                        else 
                        {
                            var mensaje = "<p class='text-danger'>ingrese la informacion del campo ";
                            if (res.folioBascula !== true) {
                                $(".folio_bascula").html(mensaje + "Folio</p>")
                            }
                            if (res.folioCarga !== true) {
                                $(".folio_carga").html(mensaje + "Folio</p>")
                            }
                        }
                    }
                });
            } else {
                var mensaje = "<p class='text-danger'>ingrese la informacion del campo ";
                if (folioCarga === "") {
                    $(".folio_carga").html(mensaje + "Folio</p>")
                }
                if (folioCarga !== "") {
                    $(".folio_carga").html("")
                }
                if (folioBascula === "") {
                    $(".folio_bascula").html(mensaje + "Folio</p>")
                }
                if (folioBascula !== "") {
                    $(".folio_bascula").html("")
                }
                if (sellos === "") {
                    $(".sellos").html(mensaje + "Sellos</p>")
                }
                if (sellos !== "") {
                    $(".sellos").html("")
                }
            }
        }
    </script>
    <?php
    include "../import/componentes/footer.php";
    include "../import/componentes/modal/modalIndex.php";
    include "../import/componentes/js/main.php";
?>