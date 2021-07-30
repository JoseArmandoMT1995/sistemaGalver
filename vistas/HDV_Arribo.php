<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/selects.php";
    //checarExistenciaDestino($mysqli,$_GET["id"]);
?>
<div class="container-fluid">
    <style>
        .card_hdv 
        {
            height: 1300px !important;
        }
        div.cardScroll 
        {
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
                    <h6 class="m-0 font-weight-bold text-primary">DATOS DE ARRIBO</h6>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="br-3 btn btn-success  d-none d-md-block verModalInsert"><i class="fas fa-plus-circle"></i></button>
                        <button type="button" onclick="altaArribo(<?php echo $_GET['id'];?>)" class="ml-2 btn btn-warning  d-none d-md-block" ><i class="fas fa-arrow-circle-right"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area ">
                        <div class="row">
                            <div class="cardScroll table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">#</th>
                                            <th scope="col">ORIGEN DE CARGA</th>
                                            <th scope="col">CAUSA</th>
                                            <th scope="col">FECHA DE ARRIBO</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr  class="text-center">
                                            <th scope="col">#</th>
                                            <th scope="col">ORIGEN DE CARGA</th>
                                            <th scope="col">CAUSA</th>
                                            <th scope="col">FECHA DE ARRIBO</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="text-center tabla_arribos">
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
                    <h5 class="modal-title" id="INSERTLabel">AGREGAR DATOS DE ARRIBO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row mt-2 ">
                            <div class="form-row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">DESTINO</label>
                                    <select id="arriboDestino_destino" class=" form-control"
                                        name="arriboDestino_destino">
                                        <option value="0">Seleccione una opcion</option>
                                        <optgroup label="Escriba y seleccione">
                                            <option selected value="0">Seleccione una opcion</option>
                                            <?php
                                                $hdv=muestraDestinos($mysqli);
                                                while ($filas =$hdv->fetch_assoc()) 
                                                {
                                            ?>
                                            <option value="<?php echo $filas["destino_id"]?>">
                                                <?php echo $filas["destino_id"]?>-<?php echo $filas["destino_nombre"]?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">CAUSA DE CAMBIO DE DESTINO</label>
                                    <input type="text" class="form-control" id="arriboDestino_causaDeCambio"
                                        name="arriboDestino_causaDeCambio"
                                        placeholder="Ingresar la causa de cambio de destino">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary insertar_arribo">Agregar</button>
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
                        <div class="form-row mt-2 ">
                            <div class="form-row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">DESTINO</label>
                                    <select id="u_arriboDestino_destino" class=" form-control"
                                        name="u_arriboDestino_destino">
                                        <option value="0">Seleccione una opcion</option>
                                        <optgroup label="Escriba y seleccione">
                                            <option selected value="0">Seleccione una opcion</option>
                                            <?php
                                                $hdv=muestraDestinos($mysqli);
                                                while ($filas =$hdv->fetch_assoc()) 
                                                {
                                            ?>
                                            <option value="<?php echo $filas["destino_id"]?>">
                                                <?php echo $filas["destino_id"]?>-<?php echo $filas["destino_nombre"]?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">CAUSA DE CAMBIO DE DESTINO</label>
                                    <input type="text" class="form-control" id="u_arriboDestino_causaDeCambio"
                                        name="u_arriboDestino_causaDeCambio"
                                        placeholder="Ingresar la causa de cambio de destino">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary modificar_arribo"
                        id="modificar_arribo">Modificar</button>
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
        recargarTabla();
        $(".verModalInsert").click(function ()
        {
            if ($(".arriboOrigenDeCarga_fechaArribo").length===0) 
            {
                $('#INSERT').modal('show');
            } 
            if($(".arriboOrigenDeCarga_fechaArribo").length===1) 
            {
                if($(".arriboOrigenDeCarga_fechaArribo").val() === "") 
                {
                    alert("Tiene que ingresar la fecha de arribo antes de generar nuevo registro!");
                } 
                else 
                {
                    $('#INSERT').modal('show');
                }
            }
        });
        $(".insertar_arribo").click(function () 
        {
            if ($("#arriboDestino_destino").val() === "0" || $("#arriboDestino_destino").val() === 0) 
            {
                alert("por favor llene los campos");
            } 
            else 
            {
                var arriboOrigenDeCarga_id =($(".arriboOrigenDeCarga_fechaArribo").length===1)?$(".arriboOrigenDeCarga_fechaArribo").data("id"):"";
                var arriboOrigenDeCarga_fechaArribo =($(".arriboOrigenDeCarga_fechaArribo").length===1)?$(".arriboOrigenDeCarga_fechaArribo").val():"0000:00:00 00:00:00";
                var data = 
                {
                    "tipo": 1,
                    "arriboOrigenDeCarga_id": arriboOrigenDeCarga_id,
                    "data": {
                        "id_viaje": <?php echo $_GET["id"];?> ,
                        "arriboOrigenDeCarga_origenCarga": $("#arriboDestino_destino").val(),
                        "arriboOrigenDeCarga_causaDeCambio": $("#arriboDestino_causaDeCambio").val(),
                        "arriboOrigenDeCarga_fechaArribo":arriboOrigenDeCarga_fechaArribo
                    }
                };
                insert_arribo(data);
            }
        });
        function editarPaso1Id(id,index) 
        {
            if (index===1 || index==="1") 
            {
                alert("no puede modificar o editar el primer registro!!");       
            } 
            else 
            {
                $('#UPDATE').modal('show');
                $("#UPDATELabel").html('<h5 class="modal-title" id="UPDATELabel" >MODIFICAR ARRIBO: ' + id + '</h5>');
                $("#modificar_arribo").html('<button type="button" class="btn btn-primary modificar_arribo" onclick="editarArribo(' + id + ')">Modificar</button>');
                $.ajax(
                {
                    type: "POST",
                    url: "../controlador/modulos/crud/arribos.php",
                    data: 
                    {
                        "tipo": 4,
                        "id": id
                    }, 
                    success: function (data) 
                    {
                        data = JSON.parse(data);
                        //console.log(data);
                        $("#u_arriboDestino_destino").val(data.arriboDestino_destino);
                        $("#u_arriboDestino_causaDeCambio").val(data.arriboDestino_causaDeCambio);
                    }
                });
            }
        }
        function altaArribo(id)
        {
            if ($(".arriboOrigenDeCarga_fechaArribo").length===0) 
            {
                alert("Tiene que agregar minimo un arribo");
            } 
            if($(".arriboOrigenDeCarga_fechaArribo").length===1) 
            {
                if($(".arriboOrigenDeCarga_fechaArribo").val() === "") 
                {
                    alert("Tiene que ingresar la fecha de arribo antes de pasar a la siguiente etapa!");
                } 
                else 
                {
                    var arriboOrigenDeCarga_id =($(".arriboOrigenDeCarga_fechaArribo").length===1)?$(".arriboOrigenDeCarga_fechaArribo").data("id"):"";
                    var arriboOrigenDeCarga_fechaArribo =($(".arriboOrigenDeCarga_fechaArribo").length===1)?$(".arriboOrigenDeCarga_fechaArribo").val():"0000:00:00 00:00:00";
                    $.ajax(
                    {
                        type: "POST",
                        url: "../controlador/modulos/crud/arribos.php",
                        data: 
                        {
                            "tipo":5,
                            "id":id,
                            "arribo_origen_de_carga":
                            {
                                "arriboOrigenDeCarga_id":arriboOrigenDeCarga_id,
                                "arriboOrigenDeCarga_fechaArribo":arriboOrigenDeCarga_fechaArribo
                            }
                        },
                        success: function (data) 
                        {
                            console.log(data);
                            if (data === "true") {
                                alert("operacion exitosa!");
                                window.location="http://localhost/sistemaGalver/vistas/HDV_ArriboRegistro.php";
                            } else {
                                alert("ocurrio un error en base de datos");
                            }
                        }
                    });
                }
            }
        }
        function insert_arribo(data) 
        {            
            $.ajax(
            {
                type: "POST",
                url: "../controlador/modulos/crud/arribos.php",
                data: data,
                success: function (data) 
                {
                    console.log(data);
                    if (data === "1") 
                    {
                        alert("operacion exitosa!");
                        $('#INSERT').modal('hide');
                        recargarTabla();
                    } 
                    else 
                    {
                        alert("ocurrio un error en base de datos");
                    }
                }
            }
            );   
        }
        function recargarTabla()
        {
            $.ajax(
            {
                type: "POST",
                url: "../controlador/modulos/crud/arribos.php",
                data: {"tipo": 6,"id":<?php echo $_GET["id"];?>},
                success: function (data) 
                {
                    tablaArribo(JSON.parse(data));
                }
            }
            );
        }
        function tablaArribo(data){
            console.log(data.length);
            var html ="";
            for (let i = 0; i < data.length; i++) 
            {
                if (i+1 < data.length || i+1 > data.length) 
                {
                    html+=
                    "<tr bgcolor='#fbc417' class='text-light font-weight-bold'  >"+
                        "<td>"+(i+1)+"</td>"+
                        "<td>"+data[i].destino_nombre+"</td>"+
                        "<td>"+data[i].arriboOrigenDeCarga_causaDeCambio+"</td>"+
                        "<td>"+data[i].arriboOrigenDeCarga_fechaArribo.substring(0, 10)+"</td>"+
                    "</td>";
                } 
                if (i+1 === data.length) 
                {   html+=
                    "<tr bgcolor='#5cff1e' class='text-light font-weight-bold'>"+
                        "<td>"+(i+1)+"</td>"+
                        "<td>"+data[i].destino_nombre+"</td>"+
                        "<td>"+data[i].arriboOrigenDeCarga_causaDeCambio+"</td>"+
                        "<td>"+
                            '<input type="date" class="arriboOrigenDeCarga_fechaArribo" data-id="'+data[i].arriboOrigenDeCarga_id+'" value="'+data[i].arriboOrigenDeCarga_fechaArribo.substring(0, 10)+'">'+
                        "</td>"+
                    "</td>";
                }
            }
            $(".tabla_arribos").html(html);
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