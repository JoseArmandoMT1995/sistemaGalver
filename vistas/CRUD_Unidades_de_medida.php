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
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-ruler-vertical"></i> UNIDADES DE MEDIDA</h6>
                    <button type="button" class="btn btn-success tabla_todos"><i class="fas fa-list"></i> REGISTROS</button>
                    <button type="button" class="btn btn-warning tabla_papelera"><i class="fas fa-recycle"></i> PAPELERA</button>
                    <button type="button" class="btn btn-info  d-none d-md-block" data-toggle="modal" data-target="#INSERT"><i class="fas fa-plus"></i> AGREGAR UNIDAD DE MEDIDA</button>
                </div>
                <div class="card-body">
                    <div class="chart-area ">
                        <div class="row">
                            <div class="editarTodos col-12 mb-5">
                                <button type="button" class="btn btn-danger btn-lg btn-block" onclick="restaorarTodosLosRegistros(0,1)"><i class="fas fa-times"></i> Mandar todo a papelera</button>
                            </div>
                            <div class="cardScroll table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">NOMBRE DE UNIDAD</th>
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
                                            <th scope="col">NOMBRE DE UNIDAD</th>
                                            <th scope="col">DESCRIPCION</th>
                                            <th scope="col">FECHA_ALTA</th>
                                            <th scope="col">CREADOR</th>
                                            <th scope="col">ELIMINAR</th>
                                            <th scope="col">EDITAR</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class=" text-center tabla_principal">
                                        <?php
                                        $datos=muestraUnidadesDeMedida($mysqli);
                                        while ($filas =$datos->fetch_assoc()) 
                                        {
                                            echo 
                                            "<tr  bgcolor ='#6B8E23' style='color:#FFFFFF'>".
                                            "<td>".$filas["cargaUnidadDeMedidaID"]."</td>".
                                            "<td>".$filas["cargaUnidadDeMedidaNombre"]."</td>".
                                            "<td>".$filas["cargaUnidadDeMedidaDescripcion"]."</td>".
                                            "<td>".$filas["cargaUnidadDeMedidaFechaDeCreacion"]."</td>".
                                            "<td>".$filas["usuarioNombre"]."</td>".
                                            "<td><button type='button' class='btn btn-danger' onclick='eliminarEmpresaEmisora(".$filas["cargaUnidadDeMedidaID"].")')><i class='fas fa-trash-alt'></i></button></td>".
                                            "<td><button type='button' class='btn btn-warning' data-toggle='modal'
                                            data-target='#UPDATE' onclick='editarPaso1Id(".$filas["cargaUnidadDeMedidaID"].")'><i class='fas fa-edit'></i></button></button></td>".
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
                                <label for="inputEmail4">NOMBRE</label>
                                <input type="text" class="form-control" id="i_cargaUnidadDeMedidaNombre" placeholder="NOMBRE">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">DESCRIPCION</label>
                                <input type="text" class="form-control" id="i_cargaUnidadDeMedidaDescripcion" placeholder="DESCRIPCION">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary insertar_unidad">Agregar</button>
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
                                <label for="inputEmail4">NOMBRE</label>
                                <input type="text" class="form-control" id="u_cargaUnidadDeMedidaNombre" placeholder="NOMBRE">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">DESCRIPCION</label>
                                <input type="text" class="form-control" id="u_cargaUnidadDeMedidaDescripcion" placeholder="DESCRIPCION">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary modificar_unidad" id="modificar_unidad">Modificar</button>
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
    var url= "../controlador/modulos/crud/unidadDeMedida.php";
    $(".tabla_papelera").click(function () 
    {
        $(".editarTodos").html('<button type="button" class="btn btn-success btn-lg btn-block" onclick="restaorarTodosLosRegistros(1,0)"><i class="fas fa-recycle"></i> Restaorar todo</button>');
        verTabla(1, 1);
    });
        $(".tabla_todos").click(function () 
        {
            $(".editarTodos").html('<button type="button" class="btn btn-danger btn-lg btn-block" onclick="restaorarTodosLosRegistros(0,1)"><i class="fas fa-times"></i> Mandar todo a papelera</button>');
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
                insert_unidad(data);
            } 
            else 
            {}
        }
        //***********************************************/
        $(".insertar_unidad").click(function () 
        {
            if ($("#i_cargaUnidadDeMedidaNombre").val() === "") 
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
                        "cargaUnidadDeMedidaNombre": $("#i_cargaUnidadDeMedidaNombre").val(),
                        "cargaUnidadDeMedidaDescripcion": $("#i_cargaUnidadDeMedidaDescripcion").val(),
                        "cargaUnidadDeMedidaFechaDeCreacion": fechaActual()
                    }
                };
                insert_unidad(data);
            }
        });
        function editarUnidades(id) 
        {
            if ($("#u_tractorMarcaNombre").val() === "") 
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
                        "cargaUnidadDeMedidaNombre": $("#u_cargaUnidadDeMedidaNombre").val(),
                        "cargaUnidadDeMedidaDescripcion": $("#u_cargaUnidadDeMedidaDescripcion").val(),
                        "cargaUnidadDeMedidaFechaDeCreacion": fechaActual()
                    }
                };
                insert_unidad(data);
            }
        }
        function editarPaso1Id(id) 
        {
            $("#UPDATELabel").html('<h5 class="modal-title" id="UPDATELabel" >MODIFICAR REGISTRO: ' + id + '</h5>');
            $("#modificar_unidad").html('<button type="button" class="btn btn-primary modificar_unidad" onclick="editarUnidades(' +id + ')">Modificar</button>');
            $.ajax(
            {
                type: "POST",
                url:url,
                data: 
                {
                    "tipo": 4,
                    "id": id
                }, 
                success: function (data) 
                {
                    data = JSON.parse(data);
                    $("#u_cargaUnidadDeMedidaNombre").val(data.cargaUnidadDeMedidaNombre);
                    $("#u_cargaUnidadDeMedidaDescripcion").val(data.cargaUnidadDeMedidaDescripcion);
                }
            });
        }
        function editarUnidadDeMedida(id) 
        {
            if (confirm("Quiere eliminar este registro?!")) 
            {
                var data = 
                {
                    "tipo": 3,
                    "id": id,
                    "data": {}
                };
                insert_unidad(data);
            } 
            else 
            {}
        }
        function insert_unidad(data) 
        {
            $.ajax(
            {
                type: "POST",
                url:url,
                data: data,
                success: function (data) 
                {
                    console.log(data);
                    if (data === "1") 
                    {
                        alert("operacion exitosa!");
                        window.location.href = "./CRUD_Unidades_de_medida.php";
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