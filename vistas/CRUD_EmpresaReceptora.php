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
                    <h6 class="m-0 font-weight-bold text-primary"><i class="far fa-building"></i> EMPRESA RECEPTORA</h6>
                    <button type="button" class="btn btn-success tabla_todos"><i class="fas fa-list"></i>
                        REGISTROS</button>
                    <button type="button" class="btn btn-warning tabla_papelera"><i class="fas fa-recycle"></i>
                        PAPELERA</button>
                    <button type="button" class="btn btn-info  d-none d-md-block" data-toggle="modal"
                        data-target="#INSERT"><i class="fas fa-plus"></i> AGREGAR EMPRESA</button>
                </div>
                <div class="card-body">
                    <div class="chart-area ">
                        <div class="row">
                            <div class="editarTodos col-12 mb-5">
                                <button type="button" class="btn btn-danger btn-lg btn-block"
                                    onclick="restaorarTodosLosRegistros(0,1)"><i class="fas fa-times"></i> Mandar todo a
                                    papelera
                                </button>
                            </div>
                            <div class="cardScroll table-responsive">
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
                                    <tbody class=" text-center tabla_principal">
                                        <?php
                                        $hdv=muestraEmpresaReceptora($mysqli);
                                        while ($filas =$hdv->fetch_assoc()) {
                                            echo 
                                            "<tr bgcolor ='#6B8E23' style='color:#FFFFFF'>".
                                            "<td>".$filas["empresaReceptoraId"]."</td>".
                                            "<td>".$filas["empresaReceptoraNombre"]."</td>".
                                            "<td>".$filas["empresaReceptoraRFC"]."</td>".
                                            "<td>".$filas["empresaReceptoraTelefonoFijo1"]."</td>".
                                            "<td>".$filas["empresaReceptoraTelefonoFijo2"]."</td>".
                                            "<td>".$filas["empresaReceptoraTelefonoCelular1"]."</td>".
                                            "<td>".$filas["empresaReceptoraTelefonoCelular2"]."</td>".
                                            "<td>".$filas["empresaReceptoraCorreo"]."</td>".
                                            "<td>".$filas["empresaReceptoraCP"]."</td>".
                                            "<td>".$filas["empresaReceptoraFechaDeCreacion"]."</td>".
                                            "<td>".$filas["usuarioNombre"]."</td>".
                                            "<td><button type='button' class='btn btn-danger' onclick='eliminarEmpresaEmisora(".$filas["empresaReceptoraId"].")')><i class='fas fa-trash-alt'></i></button></td>".
                                            "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                                            data-target='#UPDATE' onclick='editarPaso1Id(".$filas["empresaReceptoraId"].")'><i class='fas fa-edit'></i></button></td>".
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
        include "../import/componentes/modal/modalIndex.php";
        include "../import/componentes/js/main.php";
    ?>
    <script>
        var url = "../controlador/modulos/crud/receptores.php";
        $(".tabla_papelera").click(function () 
        {
            $(".editarTodos").html(
                '<button type="button" class="btn btn-success btn-lg btn-block" onclick="restaorarTodosLosRegistros(1,0)"><i class="fas fa-recycle"></i> Restaorar todo</button>'
            );
            verTabla(1, 1);
        });
        $(".tabla_todos").click(function () 
        {
            $(".editarTodos").html(
                '<button type="button" class="btn btn-danger btn-lg btn-block" onclick="restaorarTodosLosRegistros(0,1)"><i class="fas fa-times"></i> Mandar todo a papelera</button>'
            );
            verTabla(0, 0);
        });
        function verTabla(parametro, caso) 
        {
            $.ajax(
            {
                type: "POST",
                url: url,
                data: 
                {
                    "tipo": 5,
                    "caso": caso,
                    "parametro": parametro,
                }, 
                success: function (data) 
                {
                    console.log(data);
                    $(".tabla_principal").html(data);
                }
            });
        }
        function restaorarRegistro(id) 
        {
            $.ajax(
            {
                type: "POST",
                url: url,
                data: 
                {
                    "tipo": 6,
                    "id": id,
                }, 
                success: function (data) 
                {
                    verTabla(0, 0);
                }
            });
        }
        function restaorarTodosLosRegistros(caso, ed) 
        {
            var html1 ='<button type="button" class="btn btn-danger btn-lg btn-block" onclick="restaorarTodosLosRegistros(0,1)"><i class="fas fa-times"></i> Mandar todo a papelera</button>';
            var html2 ='<button type="button" class="btn btn-success btn-lg btn-block" onclick="restaorarTodosLosRegistros(1,0)"><i class="fas fa-recycle"></i> Restaorar todo</button>';
            $.ajax(
            {
                type: "POST",
                url: url,
                data: 
                {
                    "tipo": 7,
                    "caso": caso,
                    "editado": ed,
                }, 
                success: function (data) 
                {
                    verTabla(ed, ed);
                    var html = (ed === 0) ? html1 : html2;
                    $(".editarTodos").html(html)
                }
            });
        }
        //***********************************************/
        $(".insertar_receptor").click(function () 
        {
            if ($("#i_nombre").val() === "" || $("#i_rfc").val() === "" || $("#i_email").val() === "" || $(
                    "#i_cp").val() === "") {
                alert("por favor llene los campos");
            } 
            else 
            {
                var data = 
                {
                    "tipo": 1,
                    "id": "",
                    "data": 
                    {
                        "empresaReceptoraNombre": $("#i_nombre").val(),
                        "empresaReceptoraRFC": $("#i_rfc").val(),
                        "empresaReceptoraTelefonoFijo1": $("#i_tf1").val(),
                        "empresaReceptoraTelefonoFijo2": $("#i_tf2").val(),
                        "empresaReceptoraTelefonoCelular1": $("#i_tc1").val(),
                        "empresaReceptoraTelefonoCelular2": $("#i_tc2").val(),
                        "empresaReceptoraCorreo": $("#i_email").val(),
                        "empresaReceptoraCP": $("#i_cp").val(),
                        "empresaReceptoraDireccion": $("#i_dir").val(),
                        "empresaReceptoraFechaDeCreacion": fechaActual()
                    }
                };
                insert_empresa_receptora(data);
            }
        });
        function editarEmpresaReceptora(id) 
        {
            if ($("#u_nombre").val() === "" || $("#u_rfc").val() === "" || $("#u_email").val() === "" || $(
                    "#u_cp").val() === "") 
            {
                alert("por favor llene los campos");
            } 
            else 
            {
                var data = 
                {
                    "tipo": 2,
                    "id": id,
                    "data": 
                    {
                        "empresaReceptoraNombre": $("#u_nombre").val(),
                        "empresaReceptoraRFC": $("#u_rfc").val(),
                        "empresaReceptoraTelefonoFijo1": $("#u_tf1").val(),
                        "empresaReceptoraTelefonoFijo2": $("#u_tf2").val(),
                        "empresaReceptoraTelefonoCelular1": $("#u_tc1").val(),
                        "empresaReceptoraTelefonoCelular2": $("#u_tc2").val(),
                        "empresaReceptoraCorreo": $("#u_email").val(),
                        "empresaReceptoraCP": $("#u_cp").val(),
                        "empresaReceptoraDireccion": $("#u_dir").val(),
                    }
                };
                insert_empresa_receptora(data);
            }
        }
        function editarPaso1Id(id) 
        {
            $("#UPDATELabel").html('<h5 class="modal-title" id="UPDATELabel" >MODIFICAR REGISTRO: ' + id + '</h5>');
            $("#modificar_receptor").html('<button type="button" class="btn btn-primary modificar_receptor" onclick="editarEmpresaReceptora(' +id + ')">Modificar</button>');
            $.ajax(
            {
                type: "POST",
                url: url,
                data: 
                {
                    "tipo": 4,
                    "id": id
                }, 
                success: function (data) 
                {
                    data = JSON.parse(data);
                    $("#u_nombre").val(data.empresaReceptoraNombre);
                    $("#u_rfc").val(data.empresaReceptoraRFC);
                    $("#u_tf1").val(data.empresaReceptoraTelefonoFijo1);
                    $("#u_tf2").val(data.empresaReceptoraTelefonoFijo2);
                    $("#u_tc1").val(data.empresaReceptoraTelefonoCelular1);
                    $("#u_tc2").val(data.empresaReceptoraTelefonoCelular2);
                    $("#u_email").val(data.empresaReceptoraCorreo);
                    $("#u_cp").val(data.empresaReceptoraCP);
                    $("#u_dir").val(data.empresaReceptoraDireccion);
                }
            });
        }
        function eliminarEmpresaEmisora(id) 
        {
            if (confirm("Quiere eliminar este registro?!")) 
            {
                var data = 
                {
                    "tipo": 3,
                    "id": id,
                    "data": {}
                };
                insert_empresa_receptora(data);
            } else {}
        }
        function insert_empresa_receptora(data) 
        {
            $.ajax(
            {
                type: "POST",
                url: url,
                data: data, 
                success: function (data) 
                {
                    console.log(data);
                    if (data === "1") 
                    {
                        alert("operacion exitosa!");
                        window.location.href = "./CRUD_EmpresaReceptora.php";
                    } 
                    else 
                    {
                        alert("ocurrio un error en base de datos");
                    }
                }
            });
        }
        function fechaActual() 
        {
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