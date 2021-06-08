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
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">TRACTORES</h6>
                        <button type="button" class="btn btn-info  d-none d-md-block" data-toggle="modal"
                            data-target="#INSERT">AGREGAR NUEVA TRACTORES</button>
                    </div>
                    <div class="card-body">
                        <div class="chart-area ">
                            <div class="row">
                                <div class="cardScroll table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">NOMBRE</th>
                                                <th scope="col">RFC</th>
                                                <th scope="col">LICENCIA</th>
                                                <th scope="col">FECHA_ALTA</th>
                                                <th scope="col">CREADOR</th>
                                                <th scope="col">ELIMINAR</th>
                                                <th scope="col">EDITAR</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">ECONOMICO</th>
                                                <th scope="col">PLACA</th>
                                                <th scope="col">MARCA</th>
                                                <th scope="col">FECHA_ALTA</th>
                                                <th scope="col">CREADOR</th>
                                                <th scope="col">ELIMINAR</th>
                                                <th scope="col">EDITAR</th>
                                            </tr>
                                        </tfoot>
                                        <tbody class=" text-center">
                                            <?php
                                        $datos=muestraTractores($mysqli);
                                        while ($filas =$datos->fetch_assoc()) {
                                            echo 
                                            "<tr>".
                                            "<td>".$filas["tractorId"]."</td>".
                                            "<td>".$filas["tractorEconomico"]."</td>".
                                            "<td>".$filas["tractorPlaca"]."</td>".
                                            "<td>".$filas["tractorMarcaNombre"]."</td>".
                                            "<td>".$filas["tractorFechaCreacion"]."</td>".
                                            "<td>".$filas["usuarioNombre"]."</td>".
                                            "<td><button type='button' class='btn btn-danger' onclick='eliminarTractor(".$filas["tractorId"].")')>X</button></td>".
                                            "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                                            data-target='#UPDATE' onclick='editarPaso1Id(".$filas["tractorId"].")'>E</button></td>".
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
    <!-- MODAL INSERT-->
    <div class="modal fade" id="INSERT" tabindex="-1" role="dialog" aria-labelledby="INSERTLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="INSERTLabel">AGREGAR NUEVO TRACTOR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row mt-2">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Economico</label>
                                <input type="text" class="form-control" placeholder="Economico" id="i_tractorEconomico">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Placa</label>
                                <input type="text" class="form-control" placeholder="Placa" id="i_tractorPlaca">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Marca de tractor</label>
                                <select class="custom-select" id="i_tractorMarcaId">
                                    <optgroup label="Escriba y seleccione">
                                        <?php
                                        $data=muestraTractoresMarca($mysqli);
                                        while ($fila =$data->fetch_assoc()) {
                                            echo '<option value="'.$fila["tractorMarcaId"].'">'.$fila["tractorMarcaNombre"].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary insertar_tractor">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL UPDATE-->
    <div class="modal fade" id="UPDATE" tabindex="-1" role="dialog" aria-labelledby="UPDATELabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UPDATELabel">MODIFICAR REGISTRO: </h5>
                    <div id="update" data-update=""></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row mt-2">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Economico</label>
                                <input type="text" class="form-control" placeholder="Economico" id="u_tractorEconomico">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Placa</label>
                                <input type="text" class="form-control" placeholder="Placa" id="u_tractorPlaca">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Marca de tractor</label>
                                <select class="custom-select" id="u_tractorMarcaId">
                                    <optgroup label="Escriba y seleccione">
                                        <?php
                                        $data=muestraTractoresMarca($mysqli);
                                        while ($fila =$data->fetch_assoc()) {
                                            echo '<option value="'.$fila["tractorMarcaId"].'">'.$fila["tractorMarcaNombre"].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                </select>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary modificar_tractor"
                        id="modificar_tractor">Modificar</button>
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
    <script>
        $(".insertar_tractor").click(function () {
            if ($("#i_tractorEconomico").val() === "" || $("#i_tractorPlaca").val() === "" || $(
                    "#i_tractorMarcaId").val() === "") {
                alert("por favor llene los campos");
            } else {
                var data = {
                    "tipo": 1,
                    "id": "",
                    "data": {
                        "tractorEconomico": $("#i_tractorEconomico").val(),
                        "tractorPlaca": $("#i_tractorPlaca").val(),
                        "tractorMarcaId": $("#i_tractorMarcaId").val(),
                        "tractorFechaCreacion": fechaActual()
                    }
                };
                //console.log(data);
                insert_tractores(data);
            }
        });
        function editarTractor(id) {
            if ($("#u_tractorEconomico").val() === "" || $("#u_tractorPlaca").val() === "" || $("#u_tractorMarcaId")
                .val() === "") {
                alert("por favor llene los campos");
            } else {
                var data = {
                    "tipo": 2,
                    "id": id,
                    "data": {
                        "tractorEconomico": $("#u_tractorEconomico").val(),
                        "tractorPlaca": $("#u_tractorPlaca").val(),
                        "tractorMarcaId": $("#u_tractorMarcaId").val(),
                        "tractorFechaCreacion": fechaActual()
                    }
                };
                //console.log(data);
                insert_tractores(data);
            }
        }
        function editarPaso1Id(id) {
            $("#UPDATELabel").html('<h5 class="modal-title" id="UPDATELabel" >MODIFICAR REGISTRO: ' + id + '</h5>');
            $("#modificar_tractor").html(
                '<button type="button" class="btn btn-primary modificar_tractor" onclick="editarTractor(' +
                id + ')">Modificar</button>');
            $.ajax({
                type: "POST",
                url: "../controlador/modulos/crud/tractores.php",
                data: {
                    "tipo": 4,
                    "id": id
                }, //capturo array     
                success: function (data) {
                    data = JSON.parse(data);
                    $("#u_tractorEconomico").val(data.tractorEconomico);
                    $("#u_tractorPlaca").val(data.tractorPlaca);
                    $("#u_tractorMarcaId").val(data.tractorMarcaId);
                }
            });
        }
        function eliminarTractor(id) {
            if (confirm("Quiere eliminar este registro?!")) {
                var data = {
                    "tipo": 3,
                    "id": id,
                    "data": {}
                };
                insert_tractores(data);
            } else {
                //txt = "You pressed Cancel!";
            }
        }
        function insert_tractores(data) {
            $.ajax({
                type: "POST",
                url: "../controlador/modulos/crud/tractores.php",
                data: data, //capturo array     
                success: function (data) {
                    console.log(data);
                    if (data === "1") {
                        alert("operacion exitosa!");
                        window.location.href = "./tractores.php";
                    } else {
                        alert("ocurrio un error en base de datos");
                    }
                    //console.log(JSON.parse(data));
                }
            });
        }
        function fechaActual() {
            var dt = new Date();
            return (
                `${dt.getFullYear().toString().padStart(4, '0')}:${(
        dt.getMonth()+1).toString().padStart(2, '0')}:${
        dt.getDate().toString().padStart(2, '0')} ${
        dt.getHours().toString().padStart(2, '0')}:${
        dt.getMinutes().toString().padStart(2, '0')}:${
        dt.getSeconds().toString().padStart(2, '0')}`
            );
        }
    </script>