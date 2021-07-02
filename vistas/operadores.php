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
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">OPERADOR</h6>
                        <button type="button" class="btn btn-info  d-none d-md-block" data-toggle="modal"
                            data-target="#INSERT">AGREGAR NUEVA OPERADOR</button>
                    </div>
                    <div class="card-body">
                        <div class="chart-area ">
                            <div class="row">
                                <div class="table-responsive cardScroll">
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
                                                <th scope="col">NOMBRE</th>
                                                <th scope="col">RFC</th>
                                                <th scope="col">LICENCIA</th>
                                                <th scope="col">FECHA_ALTA</th>
                                                <th scope="col">CREADOR</th>
                                                <th scope="col">ELIMINAR</th>
                                                <th scope="col">EDITAR</th>
                                            </tr>
                                        </tfoot>
                                        <tbody class=" text-center">
                                            <?php
                                        $datos=muestraOperador($mysqli);
                                        while ($filas =$datos->fetch_assoc()) {
                                            echo 
                                            "<tr>".
                                            "<td>".$filas["operadorID"]."</td>".
                                            "<td>".$filas["operadorNombre"]."</td>".
                                            "<td>".$filas["operadorRFC"]."</td>".
                                            "<td>".$filas["operadorLisencia"]."</td>".
                                            "<td>".$filas["operadorFechaCreacion"]."</td>".
                                            "<td>".$filas["usuarioNombre"]."</td>".
                                            "<td><button type='button' class='btn btn-danger' onclick='eliminarEmpresaEmisora(".$filas["operadorID"].")')>X</button></td>".
                                            "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                                            data-target='#UPDATE' onclick='editarPaso1Id(".$filas["operadorID"].")'>E</button></td>".
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
                    <h5 class="modal-title" id="INSERTLabel">AGREGAR NUEVO OPERADOR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row mt-2">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Nombre del operador</label>
                                <input type="text" class="form-control" placeholder="Nombre del operador" id="i_operadorNombre">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">RFC</label>
                                <input type="text" class="form-control" placeholder="RFC" id="i_operadorRFC">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Licencia</label>
                                <input type="text" class="form-control" placeholder="Licencia" id="i_operadorLisencia">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary insertar_operador">Agregar</button>
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
                                <label for="inputEmail4">Nombre del operador</label>
                                <input type="text" class="form-control" placeholder="Nombre del operador" id="u_operadorNombre">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">RFC</label>
                                <input type="text" class="form-control" placeholder="RFC" id="u_operadorRFC">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Licencia</label>
                                <input type="text" class="form-control" placeholder="Licencia" id="u_operadorLisencia">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary modificar_operador"
                        id="modificar_operador">Modificar</button>
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
        $(".insertar_operador").click(function () {
            if ($("#i_nombre").val() === "" || $("#i_rfc").val() === "" || $("#i_email").val() === "" || $(
                    "#i_cp").val() === "") {
                alert("por favor llene los campos");
            } else {
                var data = {
                    "tipo": 1,
                    "id": "",
                    "data": {
                        "operadorNombre": $("#i_operadorNombre").val(),
                        "operadorRFC": $("#i_operadorRFC").val(),
                        "operadorLisencia": $("#i_operadorLisencia").val(),
                        "operadorFechaCreacion": fechaActual()
                    }
                };
                //console.log(data);
                insert_operadores(data);
            }
        });
        function editarEmpresaReceptora(id) {
            if ($("#u_nombre").val() === "" || $("#u_rfc").val() === "" || $("#u_email").val() === "" || $(
                    "#u_cp").val() === "") {
                alert("por favor llene los campos");
            } else {
                var data = {
                    "tipo": 2,
                    "id": id,
                    "data": {
                        "operadorNombre": $("#u_operadorNombre").val(),
                        "operadorRFC": $("#u_operadorRFC").val(),
                        "operadorLisencia": $("#u_operadorLisencia").val(),
                        "operadorFechaCreacion": fechaActual()
                    }
                };
                insert_operadores(data);
            }
        }
        function editarPaso1Id(id) {
            $("#UPDATELabel").html('<h5 class="modal-title" id="UPDATELabel" >MODIFICAR REGISTRO: ' + id + '</h5>');
            $("#modificar_operador").html(
                '<button type="button" class="btn btn-primary modificar_operador" onclick="editarEmpresaReceptora(' +
                id + ')">Modificar</button>');
            $.ajax({
                type: "POST",
                url: "../controlador/modulos/crud/operadores.php",
                data: {
                    "tipo": 4,
                    "id": id
                }, //capturo array     
                success: function (data) {
                    data = JSON.parse(data);
                    $("#u_operadorNombre").val(data.operadorNombre);
                    $("#u_operadorRFC").val(data.operadorRFC);
                    $("#u_operadorLisencia").val(data.operadorLisencia);
                }
            });
        }
        function eliminarEmpresaEmisora(id) {
            if (confirm("Quiere eliminar este registro?!")) {
                var data = {
                    "tipo": 3,
                    "id": id,
                    "data": {}
                };
                insert_operadores(data);
            } 
            else 
            {
            }
        }
        function insert_operadores(data) {
            $.ajax({
                type: "POST",
                url: "../controlador/modulos/crud/operadores.php",
                data: data, //capturo array     
                success: function (data) {
                    console.log(data);
                    if (data === "1") {
                        alert("operacion exitosa!");
                        window.location.href = "./operadores.php";
                    } else {
                        alert("ocurrio un error en base de datos");
                    }
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