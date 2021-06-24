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
                        <h6 class="m-0 font-weight-bold text-primary">REMOLQUES</h6>
                        <button type="button" class="btn btn-info  d-none d-md-block" data-toggle="modal"
                            data-target="#INSERT">AGREGAR NUEVO REMOLQUES</button>
                    </div>
                    <div class="card-body">
                        <div class="chart-area ">
                            <div class="row">
                                <div class="cardScroll table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">NOMBRE DE CARGA</th>
                                                <th scope="col">DESCRIPCION</th>
                                                <th scope="col">FECHA_ALTA</th>
                                                <th scope="col">CREADOR</th>
                                                <th scope="col">ELIMINAR</th>
                                                <th scope="col">EDITAR</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">NOMBRE DE CARGA</th>
                                                <th scope="col">DESCRIPCION</th>
                                                <th scope="col">FECHA_ALTA</th>
                                                <th scope="col">CREADOR</th>
                                                <th scope="col">ELIMINAR</th>
                                                <th scope="col">EDITAR</th>
                                            </tr>
                                        </tfoot>
                                        <tbody class=" text-center">
                                            <?php
                                        $datos=muestraRemolque($mysqli);
                                        while ($filas =$datos->fetch_assoc()) {
                                            echo 
                                            "<tr>".
                                            "<td>".$filas["remolqueID"]."</td>".
                                            "<td>".$filas["remolqueEconomico"]."</td>".
                                            "<td>".$filas["remolquePlaca"]."</td>".
                                            "<td>".$filas["remolqueFechaCreacion"]."</td>".
                                            "<td>".$filas["usuarioNombre"]."</td>".
                                            "<td><button type='button' class='btn btn-danger' onclick='eliminarRemolque(".$filas["remolqueID"].")')>X</button></td>".
                                            "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                                            data-target='#UPDATE' onclick='editarPaso1Id(".$filas["remolqueID"].")'>E</button></td>".
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
                    <h5 class="modal-title" id="INSERTLabel">AGREGAR NUEVA MARCA DE VEICULOS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Economico</label>
                                <input type="text" class="form-control" id="i_remolqueEconomico" placeholder="Economico">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Placa</label>
                                <input type="text" class="form-control" id="i_remolquePlaca" placeholder="Placa">
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
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Economico</label>
                                    <input type="text" class="form-control" id="u_remolqueEconomico"
                                        placeholder="Economico">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Placa</label>
                                    <input type="text" class="form-control" id="u_remolquePlaca"
                                        placeholder="Placa">
                                </div>
                            </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary modificar_remolque"
                        id="modificar_remolque">Modificar</button>
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
            if ($("#i_tractorMarcaNombre").val() === "") {
                alert("por favor llene los campos");
            } else {
                var data = {
                    "tipo": 1,
                    "id": "",
                    "data": {
                        "remolqueEconomico": $("#i_remolqueEconomico").val(),
                        "remolquePlaca": $("#i_remolquePlaca").val(),
                        "remolqueFechaCreacion": fechaActual()
                    }
                };
                //console.log(data);
                insert_tractores(data);
            }
        });
        function editarRemolque(id) {
            if ($("#u_tractorMarcaNombre").val() === "") {
                alert("por favor llene los campos");
            } else {
                var data = {
                    "tipo": 2,
                    "id": id,
                    "data": {
                        "remolqueEconomico": $("#u_remolqueEconomico").val(),
                        "remolquePlaca": $("#u_remolquePlaca").val(),
                        "remolqueFechaCreacion": fechaActual()
                    }
                };
                //console.log(data);
                insert_tractores(data);
            }
        }
        function editarPaso1Id(id) {
            $("#UPDATELabel").html('<h5 class="modal-title" id="UPDATELabel" >MODIFICAR REGISTRO: ' + id + '</h5>');
            $("#modificar_remolque").html(
                '<button type="button" class="btn btn-primary modificar_remolque" onclick="editarRemolque(' +
                id + ')">Modificar</button>');
            $.ajax({
                type: "POST",
                url: "../controlador/modulos/crud/remolques.php",
                data: {
                    "tipo": 4,
                    "id": id
                }, //capturo array     
                success: function (data) {
                    data = JSON.parse(data);
                    $("#u_remolqueEconomico").val(data.remolqueEconomico);
                    $("#u_remolquePlaca").val(data.remolquePlaca);
                }
            });
        }
        function eliminarRemolque(id) {
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
                url: "../controlador/modulos/crud/remolques.php",
                data: data, //capturo array     
                success: function (data) {
                    console.log(data);
                    if (data === "1") {
                        alert("operacion exitosa!");
                        window.location.href = "./remolques.php";
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