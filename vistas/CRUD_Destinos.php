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

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-map-marked"></i> DESTINO</h6>
                    <button type="button" class="btn btn-success tabla_todos"><i class="fas fa-list"></i>
                        REGISTROS</button>
                    <button type="button" class="btn btn-warning tabla_papelera"><i class="fas fa-recycle"></i>
                        PAPELERA</button>
                    <button type="button" class="btn btn-info  d-none d-md-block" data-toggle="modal"
                        data-target="#INSERT"><i class="fas fa-plus"></i> AGREGAR DESTINO</button>
                </div>
                <div class="card-body">
                    <div class="chart-area ">
                        <div class="row">
                        <div class="editarTodos col-12 mb-5">
                                <button type="button" class="btn btn-danger btn-lg btn-block"
                                    onclick="restaorarTodosLosRegistros(0,1)">Mandar todo a
                                    papelera
                                </button>
                            </div>
                            <div class="table-responsive cardScroll">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">NOMBRE</th>
                                            <th scope="col">DIRECCION</th>
                                            <th scope="col">TELEFONO1</th>
                                            <th scope="col">TELEFONO2</th>
                                            <th scope="col">CORREO</th>
                                            <th scope="col">ELIMINAR</th>
                                            <th scope="col">EDITAR</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">NOMBRE</th>
                                            <th scope="col">DIRECCION</th>
                                            <th scope="col">TELEFONO1</th>
                                            <th scope="col">TELEFONO2</th>
                                            <th scope="col">CORREO</th>
                                            <th scope="col">ELIMINAR</th>
                                            <th scope="col">EDITAR</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class=" text-center tabla_principal">
                                        <?php
                                            $hdv=muestraDestinos($mysqli);
                                            while ($filas =$hdv->fetch_assoc()) 
                                            {
                                            echo 
                                            "<tr bgcolor ='#6B8E23' style='color:#FFFFFF'>".
                                                "<td>".$filas["destino_id"]."</td>".
                                                "<td>".$filas["destino_nombre"]."</td>".
                                                "<td>".$filas["destino_direccion"]."</td>".
                                                "<td>".$filas["destino_telefono1"]."</td>".
                                                "<td>".$filas["destino_telefono2"]."</td>".
                                                "<td>".$filas["destino_correo"]."</td>".
                                                "<td><button type='button' class='btn btn-danger' onclick='eliminarEmpresaEmisora(".$filas["destino_id"].")')><i class='fas fa-trash-alt'></i></button></td>".
                                                "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                                                data-target='#UPDATE' onclick='editarPaso1Id(".$filas["destino_id"].")'><i class='fas fa-edit'></i></button></td>".
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
                    <h5 class="modal-title" id="INSERTLabel">AGREGAR NUEVA DESTINO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row mt-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="nombre" id="a_destino_nombre">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="direccion"
                                    id="a_destino_direccion">
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col">
                                <input type="email" class="form-control" placeholder="correo" id="a_destino_correo">
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="telefono fijo 1"
                                    id="a_destino_telefono1">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="telefono fijo 2"
                                    id="a_destino_telefono2">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary insertar_direccion">Agregar</button>
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
                        <div class="form-row mt-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="nombre" id="u_destino_nombre">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="direccion"
                                    id="u_destino_direccion">
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col">
                                <input type="email" class="form-control" placeholder="correo" id="u_destino_correo">
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="telefono fijo 1"
                                    id="u_destino_telefono1">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="telefono fijo 2"
                                    id="u_destino_telefono2">
                            </div>
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
    var url= "../controlador/modulos/crud/destino.php";
        $(".tabla_papelera").click(function () 
        {
                $(".editarTodos").html(
                    '<button type="button" class="btn btn-success btn-lg btn-block" onclick="restaorarTodosLosRegistros(1,0)">Restaorar todo</button>'
                );
                verTabla(1, 1);
        });
        $(".tabla_todos").click(function () 
        {
            $(".editarTodos").html(
                '<button type="button" class="btn btn-danger btn-lg btn-block" onclick="restaorarTodosLosRegistros(0,1)">Mandar todo a papelera</button>'
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
        function restaorarRegistro(id) {
            $.ajax(
            {
                type: "POST",
                url: url,
                data: {
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
            var html1 =
                '<button type="button" class="btn btn-danger btn-lg btn-block" onclick="restaorarTodosLosRegistros(0,1)">Mandar todo a papelera</button>';
            var html2 =
                '<button type="button" class="btn btn-success btn-lg btn-block" onclick="restaorarTodosLosRegistros(1,0)">Restaorar todo</button>';
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
        $(".insertar_direccion").click(function () 
        {
            if (
                $("#a_destino_nombre").val() === "" ||
                $("#a_destino_direccion").val() === "" ||
                $("#a_destino_correo").val() === "") 
            {
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
                        "destino_nombre": $("#a_destino_nombre").val(),
                        "destino_direccion": $("#a_destino_direccion").val(),
                        "destino_correo": $("#a_destino_correo").val(),
                        "destino_telefono1": $("#a_destino_telefono1").val(),
                        "destino_telefono2": $("#a_destino_telefono2").val()
                    }
                };
                insert_direccion(data);
            }
        });
        function editarEmpresaEmisora(id) 
        {
            if ($("#u_destino_nombre").val() === "" ||
                $("#u_destino_direccion").val() === "" ||
                $("#u_destino_correo").val() === "") 
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
                        "destino_nombre": $("#u_destino_nombre").val(),
                        "destino_direccion": $("#u_destino_direccion").val(),
                        "destino_correo": $("#u_destino_correo").val(),
                        "destino_telefono1": $("#u_destino_telefono1").val(),
                        "destino_telefono2": $("#u_destino_telefono2").val()
                    }
                };
                insert_direccion(data);
            }
        }
        function editarPaso1Id(id) 
        {
            $("#UPDATELabel").html('<h5 class="modal-title" id="UPDATELabel" >MODIFICAR REGISTRO: ' + id + '</h5>');
            $("#modificar_receptor").html(
                '<button type="button" class="btn btn-primary modificar_receptor" onclick="editarEmpresaEmisora(' +
                id + ')">Modificar</button>');
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
                    $("#u_destino_nombre").val(data.destino_nombre);
                    $("#u_destino_direccion").val(data.destino_direccion);
                    $("#u_destino_correo").val(data.destino_correo);
                    $("#u_destino_telefono1").val(data.destino_telefono1);
                    $("#u_destino_telefono2").val(data.destino_telefono2);
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
                insert_direccion(data);
            } 
            else 
            {
            }
        }
        function insert_direccion(data) 
        {
            $.ajax(
            {
                type: "POST",
                url: url,
                data: data, //capturo array     
                success: function (data) 
                {
                    console.log(data);
                    if (data === "1") 
                    {
                        alert("operacion exitosa!");
                        window.location.href = "./CRUD_Destinos.php";
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