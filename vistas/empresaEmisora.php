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
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">EMPRESA EMISORA</h6>

                        <button type="button" class="btn btn-info  d-none d-md-block" data-toggle="modal"
                            data-target="#INSERT">AGREGAR NUEVA EMPRESA</button>
                    </div>

                    <div class="card-body">

                        <div class="chart-area ">
                            <div class="row">

                                <div class="table-responsive">

                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">NOMBRE</th>
                                                <th scope="col">RFC</th>
                                                <th scope="col">RELEFONO_FIJO1</th>
                                                <th scope="col">RELEFONO_FIJO2</th>
                                                <th scope="col">RELEFONO_CELULAR1</th>
                                                <th scope="col">RELEFONO_CELULAR2</th>
                                                <th scope="col">EMAIL</th>
                                                <th scope="col">C.P.</th>
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
                                                <th scope="col">RELEFONO_FIJO1</th>
                                                <th scope="col">RELEFONO_FIJO2</th>
                                                <th scope="col">RELEFONO_CELULAR1</th>
                                                <th scope="col">RELEFONO_CELULAR2</th>
                                                <th scope="col">EMAIL</th>
                                                <th scope="col">C.P.</th>
                                                <th scope="col">FECHA_ALTA</th>
                                                <th scope="col">CREADOR</th>
                                                <th scope="col">ELIMINAR</th>
                                                <th scope="col">EDITAR</th>
                                            </tr>
                                        </tfoot>
                                        <tbody class="cardScroll text-center">
                                            <?php
                                        $hdv=muestraEmpresaEmisoara($mysqli);
                                        while ($filas =$hdv->fetch_assoc()) {
                                            echo 
                                            "<tr>".
                                            "<td>".$filas["empresaEmisoraId"]."</td>".
                                            "<td>".$filas["empresaEmisoraNombre"]."</td>".
                                            "<td>".$filas["empresaEmisoraRFC"]."</td>".
                                            "<td>".$filas["empresaEmisoraTelefonoFijo1"]."</td>".
                                            "<td>".$filas["empresaEmisoraTelefonoFijo2"]."</td>".
                                            "<td>".$filas["empresaEmisoraTelefonoCelular1"]."</td>".
                                            "<td>".$filas["empresaEmisoraTelefonoCelular2"]."</td>".
                                            "<td>".$filas["empresaEmisoraCorreo"]."</td>".
                                            "<td>".$filas["empresaEmisoraCP"]."</td>".
                                            "<td>".$filas["empresaEmisoraFechaDeCreacion"]."</td>".
                                            "<td>".$filas["usuarioNombre"]."</td>".
                                            "<td><button type='button' class='btn btn-danger' onclick='eliminarEmpresaEmisora(".$filas["empresaEmisoraId"].")')>X</button></td>".
                                            "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                                            data-target='#UPDATE' onclick='editarPaso1Id(".$filas["empresaEmisoraId"].")'>E</button></td>".
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
                    <h5 class="modal-title" id="INSERTLabel">AGREGAR NUEVA EMPRESA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="nombre" id="i_nombre">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="rfc" id="i_rfc">
                            </div>
                        </div>
                        <div class="form-row mt-2">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="telefono fijo 1" id="i_tf1">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="telefono fijo 2" id="i_tf2">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="telefono celular 1" id="i_tc1">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="telefono celular 2" id="i_tc2">
                            </div>
                        </div>
                        <div class="form-row mt-2">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="email" id="i_email">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="C.P." id="i_cp">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Direccion de empresa</label>
                            <textarea class="form-control" id="i_dir"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary insertar_receptor">Agregar</button>
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
                                <label for="inputEmail4">Nombre de la empresa</label>
                                <input type="text" class="form-control" placeholder="nombre" id="u_nombre">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">RFC</label>
                                <input type="text" class="form-control" placeholder="rfc" id="u_rfc">
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">telefono fijo 1</label>
                                <input type="text" class="form-control" placeholder="telefono fijo 1" id="u_tf1">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">telefono fijo 2</label>
                                <input type="text" class="form-control" placeholder="telefono fijo 2" id="u_tf2">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">telefono celular 1</label>
                                <input type="text" class="form-control" placeholder="telefono celular 1" id="u_tc1">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">telefono celular 2</label>
                                <input type="text" class="form-control" placeholder="telefono celular 2" id="u_tc2">
                            </div>
                        </div>
                        <div class="form-row mt-2">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" placeholder="email" id="u_email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Codigo postal</label>
                                <input type="text" class="form-control" placeholder="C.P." id="u_cp">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Direccion de empresa</label>
                            <textarea class="form-control" id="u_dir"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary modificar_receptor"
                        id="modificar_receptor">Modificar</button>
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
        $(".insertar_receptor").click(function () {
            if ($("#i_nombre").val() === "" || $("#i_rfc").val() === "" || $("#i_email").val() === "" || $(
                    "#i_cp").val() === "") {
                alert("por favor llene los campos");
            } else {
                var data = {
                    "tipo": 1,
                    "id": "",
                    "data": {
                        "empresaEmisoraNombre": $("#i_nombre").val(),
                        "empresaEmisoraRFC": $("#i_rfc").val(),
                        "empresaEmisoraTelefonoFijo1": $("#i_tf1").val(),
                        "empresaEmisoraTelefonoFijo2": $("#i_tf2").val(),
                        "empresaEmisoraTelefonoCelular1": $("#i_tc1").val(),
                        "empresaEmisoraTelefonoCelular2": $("#i_tc2").val(),
                        "empresaEmisoraCorreo": $("#i_email").val(),
                        "empresaEmisoraCP": $("#i_cp").val(),
                        "empresaEmisoraDireccion": $("#i_dir").val(),
                        "empresaEmisoraFechaDeCreacion":fechaActual()
                    }
                };
                insert_empresa_emisora(data);
            }
        });

        function editarEmpresaEmisora(id) {
            if ($("#u_nombre").val() === "" || $("#u_rfc").val() === "" || $("#u_email").val() === "" || $(
                    "#u_cp").val() === "") {
                alert("por favor llene los campos");
            } else {
                var data = {
                    "tipo": 2,
                    "id": id,
                    "data": {
                        "empresaEmisoraNombre": $("#u_nombre").val(),
                        "empresaEmisoraRFC": $("#u_rfc").val(),
                        "empresaEmisoraTelefonoFijo1": $("#u_tf1").val(),
                        "empresaEmisoraTelefonoFijo2": $("#u_tf2").val(),
                        "empresaEmisoraTelefonoCelular1": $("#u_tc1").val(),
                        "empresaEmisoraTelefonoCelular2": $("#u_tc2").val(),
                        "empresaEmisoraCorreo": $("#u_email").val(),
                        "empresaEmisoraCP": $("#u_cp").val(),
                        "empresaEmisoraDireccion": $("#u_dir").val(),
                    }
                };
                //console.log(data);
                insert_empresa_emisora(data);
            }
        }

        function editarPaso1Id(id) {
            $("#UPDATELabel").html('<h5 class="modal-title" id="UPDATELabel" >MODIFICAR REGISTRO: ' + id + '</h5>');
            $("#modificar_receptor").html(
                '<button type="button" class="btn btn-primary modificar_receptor" onclick="editarEmpresaEmisora(' +
                id + ')">Modificar</button>');

            $.ajax({
                type: "POST",
                url: "../controlador/modulos/crud/emisores.php",
                data: {
                    "tipo": 4,
                    "id": id
                }, //capturo array     
                success: function (data) {
                    data = JSON.parse(data);
                    $("#u_nombre").val(data.empresaEmisoraNombre);
                    $("#u_rfc").val(data.empresaEmisoraRFC);
                    $("#u_tf1").val(data.empresaEmisoraTelefonoFijo1);
                    $("#u_tf2").val(data.empresaEmisoraTelefonoFijo2);
                    $("#u_tc1").val(data.empresaEmisoraTelefonoCelular1);
                    $("#u_tc2").val(data.empresaEmisoraTelefonoCelular2);
                    $("#u_email").val(data.empresaEmisoraCorreo);
                    $("#u_cp").val(data.empresaEmisoraCP);
                    $("#u_dir").val(data.empresaEmisoraDireccion);
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
                insert_empresa_emisora(data);
            } else {
                //txt = "You pressed Cancel!";
            }
        }

        function insert_empresa_emisora(data) {
            $.ajax({
                type: "POST",
                url: "../controlador/modulos/crud/emisores.php",
                data: data, //capturo array     
                success: function (data) {
                    console.log(data);
                    if (data === "1") {
                        alert("operacion exitosa!");
                        window.location.href = "./empresaEmisora.php";
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