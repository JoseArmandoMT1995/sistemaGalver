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
                    <h6 class="m-0 font-weight-bold text-primary">DATOS DE DESCARGA</h6>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="br-3 btn btn-danger  d-none d-md-block verModalInsert modalDesvio">
                            <i class="fas fa-exclamation-triangle"></i></button>
                        <button type="button" class="ml-2 br-3 btn btn-success  d-none d-md-block verModalInsert modalInsert">
                            <i class="fas fa-plus-circle"></i></button>
                        <button type="button" onclick="altaDescarga(<?php echo $_GET['id'];?>)" class="ml-2 btn btn-warning  d-none d-md-block" ><i class="fas fa-arrow-circle-right"></i></button>
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
                                            <th scope="col">ETADO</th>
                                            <th scope="col">CAUSA</th>
                                            <th scope="col">FECHA DE RUTA DE DESCARGA</th>
                                            <th scope="col">FECHA DE DESCARGA</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr  class="text-center">
                                            <th scope="col">#</th>
                                            <th scope="col">ORIGEN DE CARGA</th>
                                            <th scope="col">ETADO</th>
                                            <th scope="col">CAUSA</th>
                                            <th scope="col">FECHA DE RUTA DE DESCARGA</th>
                                            <th scope="col">FECHA DE DESCARGA</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="text-center tabla_descargas">
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
                    <h5 class="modal-title" id="INSERTLabel">AGREGAR DATOS DE DESCARGA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="estadoDescarga"></div>
                    <form>
                        <div class="form-row mt-2 ">
                            <div class="form-row col-md-12">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">ORIGEN</label>
                                    <select id="descargaDestino_destino" class=" form-control"
                                        name="descargaDestino_destino">
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
                                    <label for="inputPassword4">CAUSA DE CAMBIO DE ORNEN</label>
                                    <input type="text" class="form-control" id="descargaDestino_causaDeCambio"
                                        name="descargaDestino_causaDeCambio"
                                        placeholder="Ingresar la causa de cambio de destino">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary insertar_descarga">Agregar</button>
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
                                    <select id="u_descargaDestino_destino" class=" form-control"
                                        name="u_descargaDestino_destino">
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
                                    <input type="text" class="form-control" id="u_descargaDestino_causaDeCambio"
                                        name="u_descargaDestino_causaDeCambio"
                                        placeholder="Ingresar la causa de cambio de destino">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary modificar_descarga"
                        id="modificar_descarga">Modificar</button>
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
            if ($(".descargaOrigenDeCarga_fechaDescarga").length===0) 
            {
                $('#INSERT').modal('show');
            } 
            if($(".descargaOrigenDeCarga_fechaDescarga").length===1) 
            {
              //alert($(".descargaOrigenDeCarga_fechaDescarga").data("id"));  
                if($(".descargaOrigenDeCarga_fechaDescarga").val() === "" && $(".descargaOrigenDeCarga_fechaDescargaRuta").val() === "") 
                {
                    alert("Tiene que ingresar la fecha de descarga rura antes de generar nuevo registro!");
                } 
                else 
                {
                    $('#INSERT').modal('show');
                }
            }
        });
        $(".modalDesvio").click(function()
            {
                $("#INSERTLabel").html("AGREGAR DATOS DE DESVIO DE DESCARGA.");
                $(".estadoDescarga").attr({'data-id': 6});
            }
        );
        $(".modalInsert").click(function()
            {
                $("#INSERTLabel").html("AGREGAR DATOS DE DESCARGA.");
                $(".estadoDescarga").attr({'data-id': 1});
            }
        );
        $(".insertar_descarga").click(function () 
        {
            if ($("#descargaDestino_destino").val() === "0" || $("#descargaDestino_destino").val() === 0) 
            {
                alert("por favor llene los campos");
            } 
            else 
            {
                var descargaOrigenDeCarga_id =($(".descargaOrigenDeCarga_fechaDescarga").length===1)?$(".descargaOrigenDeCarga_fechaDescarga").data("id"):"";
                var descargaOrigenDeCarga_fechaDescarga =($(".descargaOrigenDeCarga_fechaDescarga").length===1)?$(".descargaOrigenDeCarga_fechaDescarga").val():"0000:00:00 00:00:00";
                var descargaOrigenDeCarga_fechaDescargaRuta =($(".descargaOrigenDeCarga_fechaDescargaRuta").length===1)?$(".descargaOrigenDeCarga_fechaDescargaRuta").val():"0000:00:00 00:00:00";
                //alert(descargaOrigenDeCarga_fechaDescarga);
                var descargaOrigenDeCarga_estado =$(".estadoDescarga").data("id");
                // no lee el data 
                alert(descargaOrigenDeCarga_estado);
                var data = 
                {
                    "tipo": 1,
                    "descargaOrigenDeCarga_id": descargaOrigenDeCarga_id,
                    "data": {
                        "id_viaje": <?php echo $_GET["id"];?> ,
                        "descargaOrigenDeCarga_origenCarga": $("#descargaDestino_destino").val(),
                        "descargaOrigenDeCarga_causaDeCambio": $("#descargaDestino_causaDeCambio").val(),
                        "descargaOrigenDeCarga_fechaDescarga":descargaOrigenDeCarga_fechaDescarga,
                        "descargaOrigenDeCarga_fechaDescargaRuta":descargaOrigenDeCarga_fechaDescargaRuta,
                        "descargaOrigenDeCarga_estado":descargaOrigenDeCarga_estado
                    }
                };
                insert_descarga(data);
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
                $("#UPDATELabel").html('<h5 class="modal-title" id="UPDATELabel" >MODIFICAR DESCARGA: ' + id + '</h5>');
                $("#modificar_descarga").html(
                    '<button type="button" class="btn btn-primary modificar_descarga" onclick="editarDescarga(' +
                    id + ')">Modificar</button>');
                $.ajax(
                {
                    type: "POST",
                    url: "../controlador/modulos/crud/descarga.php",
                    data: 
                    {
                        "tipo": 4,
                        "id": id
                    }, //capturo array     
                    success: function (data) 
                    {
                        data = JSON.parse(data);
                        console.log(data);
                        $("#u_descargaDestino_destino").val(data.descargaDestino_destino);
                        $("#u_descargaDestino_causaDeCambio").val(data.descargaDestino_causaDeCambio);
                    }
                });
            }
        }
        function altaDescarga(id)
        {
            if ($(".descargaOrigenDeCarga_fechaDescarga").length===0) 
            {
                alert("Tiene que agregar minimo un descarga");
            } 
            if($(".descargaOrigenDeCarga_fechaDescarga").length===1) 
            {
              //alert($(".descargaOrigenDeCarga_fechaDescarga").data("id"));  
                if($(".descargaOrigenDeCarga_fechaDescarga").val() === "") 
                {
                    alert("Tiene que ingresar la fecha de descarga antes de pasar a la siguiente etapa!");
                } 
                else 
                {
                    var descargaOrigenDeCarga_id =($(".descargaOrigenDeCarga_fechaDescarga").length===1)?$(".descargaOrigenDeCarga_fechaDescarga").data("id"):"";
                    var descargaOrigenDeCarga_fechaDescarga =($(".descargaOrigenDeCarga_fechaDescarga").length===1)?$(".descargaOrigenDeCarga_fechaDescarga").val():"0000:00:00 00:00:00";
                    var descargaOrigenDeCarga_fechaDescargaRuta =($(".descargaOrigenDeCarga_fechaDescargaRuta").length===1)?$(".descargaOrigenDeCarga_fechaDescargaRuta").val():"0000:00:00 00:00:00";
                    $.ajax(
                    {
                        type: "POST",
                        url: "../controlador/modulos/crud/descarga.php",
                        data: 
                        {
                            "tipo":5,
                            "id":id,
                            "descarga_origen_de_carga":
                            {
                                "descargaOrigenDeCarga_id":descargaOrigenDeCarga_id,
                                "descargaOrigenDeCarga_fechaDescarga":descargaOrigenDeCarga_fechaDescarga,
                                "descargaOrigenDeCarga_fechaDescargaRuta":descargaOrigenDeCarga_fechaDescargaRuta
                            }
                        },
                        success: function (data) 
                        {
                            console.log(data);
                            if (data === "true") {
                                alert("operacion exitosa!");
                                window.location="http://localhost/sistemaGalver/vistas/HDV_descargaRegistros.php";
                            } else {
                                alert("ocurrio un error en base de datos");
                            }
                        }
                    });
                }
            }
        }
        function insert_descarga(data) 
        {            
            $.ajax(
            {
                type: "POST",
                url: "../controlador/modulos/crud/descarga.php",
                data: data,
                success: function (data) 
                {
                    console.log(data);
                    if (data === "1") 
                    {
                        alert("operacion exitosa!");
                        $('#INSERT').modal('hide');
                        //$(".tabla_descargas").html(data);
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
                url: "../controlador/modulos/crud/descarga.php",
                data: {"tipo": 6,"id":<?php echo $_GET["id"];?>},
                success: function (data) 
                {
                    tablaDescarga(JSON.parse(data));
                    //$(".tabla_descargas").html(data);
                }
            }
            );
        }
        function tablaDescarga(data){
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
                        "<td >"+data[i].hdve_nombre+"</td>"+
                        "<td>"+data[i].descargaOrigenDeCarga_causaDeCambio+"</td>"+
                        "<td>"+data[i].descargaOrigenDeCarga_fechaDescargaRuta.substring(0, 10)+"</td>"+
                        "<td>"+data[i].descargaOrigenDeCarga_fechaDescarga.substring(0, 10)+"</td>"+
                    "</td>";
                } 
                if (i+1 === data.length) 
                {   html+=
                    "<tr bgcolor='"+data[i].color_td+"' class='text-light font-weight-bold'>"+
                        "<td>"+(i+1)+"</td>"+
                        "<td>"+data[i].destino_nombre+"</td>"+
                        "<td class='text-dark'>"+data[i].hdve_nombre+"</td>"+
                        "<td>"+data[i].descargaOrigenDeCarga_causaDeCambio+"</td>"+
                        "<td>"+
                            '<input type="date" class="descargaOrigenDeCarga_fechaDescargaRuta" data-idruta="'+data[i].descargaOrigenDeCarga_id+'" value="'+data[i].descargaOrigenDeCarga_fechaDescargaRuta.substring(0, 10)+'">'+
                        "</td>"+
                        "<td>"+
                            '<input type="date" class="descargaOrigenDeCarga_fechaDescarga" data-id="'+data[i].descargaOrigenDeCarga_id+'" value="'+data[i].descargaOrigenDeCarga_fechaDescarga.substring(0, 10)+'">'+
                        "</td>"+
                    "</td>";
                }
            }
            $(".tabla_descargas").html(html);
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