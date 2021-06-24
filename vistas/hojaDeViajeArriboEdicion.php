<?php
    $id=$_GET['id'];
    include "../controlador/login/acceso.php";
    $usuario=$_SESSION['usuarioId'];
    include "../import/componentes/hojaDeViaje/hdv_a_e.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/selects.php";
    include "../controlador/modulos/hojaDeViaje/hojaDeViajeArriboEdicion.php";
    
?>

<div class="container-fluid">
    <?php
        //include "../import/componentes/nav1.php";
    ?>

    <div class="card mb-3">
        <div class="card-header">
            Encabezado de Hoja de Viaje
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">CREADOR</th>
                            <th scope="col">EDITOR</th>
                            <th scope="col">FECHA DE LIBERACION</th>
                            <th scope="col">FECHA DE EDICION</th>
                            <th scope="col">OBSERVACIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $hojaDeViaje['id_hojaDeViaje'];?></th>
                            <td><?php echo $hojaDeViaje['CREADOR'];?></td>
                            <td><?php echo $hojaDeViaje['EDITOR'];?></td>
                            <td><?php echo $hojaDeViaje['hojaDeViaje_fechaDeLiberacion'];?></td>
                            <td><?php echo $hojaDeViaje['hojaDeViaje_fechaDeEdicion'];?></td>

                            <td><textarea class="form-control" aria-label="With textarea"
                                    id="hojaDeViaje_observaciones"><?php echo $hojaDeViaje['hojaDeViaje_observaciones'];?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mb-5">

        <div class="col-sm-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    Remolques <button class="btn btn-success agregarRemolque"><i class="fas fa-plus-square"></i> <i
                            class="fas fa-caravan"></i></button>
                </div>
                <div class="card-body">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col">ORIGEN</th>
                                <th scope="col">EMISOR</th>
                                <th scope="col">CLIENTE</th>
                                <th scope="col">REMOLQUE_ECONOMICO</th>
                                <th scope="col">REMOLQUE_PLACAS</th>
                                <th scope="col">REMOLQUE_SERVICIO</th>
                                <th scope="col">REMOLQUE_SERVICIO_IMPUESTO</th>
                                <th scope="col">CARGA</th>
                                <th scope="col">UNIDAD</th>
                                <th scope="col">TALON1</th>
                                <th scope="col">TALON2</th>
                                <th scope="col">ELIMINAR</th>
                                <th scope="col">EDITAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                for ($i=0; $i < count($viaje); $i++) { 
                            ?>
                            <tr id="tr<?php echo $i+1?>">
                                <th scope="row" id="id_viaje<?php echo $i+1?>"
                                    value="<?php echo $viaje[$i]['id_viaje'];?>"><?php echo $viaje[$i]['id_viaje'];?>
                                </th>
                                <td id="ESTADO<?php echo $i+1?>" value="<?php echo $viaje[$i]['ESTADO'];?>">
                                    <?php echo $viaje[$i]['ESTADO'];?></td>
                                <td id="ORIGEN<?php echo $i+1?>"><?php echo $viaje[$i]['viaje_origen'];?></td>
                                <td id="EMISOR<?php echo $i+1?>"><?php echo $viaje[$i]['EMISOR'];?></td>
                                <td id="CLIENTE<?php echo $i+1?>"><?php echo $viaje[$i]['CLIENTE'];?></td>
                                <td id="REMOLQUE_ECONOMICO<?php echo $i+1?>">
                                    <?php echo $viaje[$i]['REMOLQUE_ECONOMICO'];?></td>
                                <td id="REMOLQUE_PLACAS<?php echo $i+1?>"><?php echo $viaje[$i]['REMOLQUE_PLACAS'];?>
                                </td>
                                <td id="REMOLQUE_SERVICIO<?php echo $i+1?>">
                                    <?php echo $viaje[$i]['REMOLQUE_SERVICIO'];?></td>
                                <td id="REMOLQUE_SERVICIO_IMPUESTO<?php echo $i+1?>">
                                    <?php echo $viaje[$i]['REMOLQUE_SERVICIO_IMPUESTO'];?></td>
                                <td id="CARGA<?php echo $i+1?>"><?php echo $viaje[$i]['CARGA'];?></td>
                                <td id="UNIDAD<?php echo $i+1?>"><?php echo $viaje[$i]['UNIDAD'];?></td>
                                <td id="viaje_talon1<?php echo $i+1?>"><?php echo $viaje[$i]['viaje_talon1'];?></td>
                                <td id="viaje_talon2<?php echo $i+1?>"><?php echo $viaje[$i]['viaje_talon2'];?></td>
                                <td id="ELIMINAR<?php echo $i+1?>"><button type="button" class="btn btn-danger"
                                onclick="eliminarIdViaje(<?php echo $viaje[$i]['id_viaje'];?>,'<?php echo $viaje[$i]['ESTADO'];?>')"><i
                                            class="fas fa-trash-alt"></i></button></td>
                                <td id="EDITAR<?php echo $i+1?>">
                                    <button type="button" class="btn btn-warning"
                                        onclick="obtenerIdViaje(<?php echo $viaje[$i]['id_viaje'];?>,'<?php echo $viaje[$i]['ESTADO'];?>')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    Tractor y Operador
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Tractor</span>
                                </div>
                                <select id="id_tractor" class=" form-control" name="id_tractor">
                                    <option value="0">Seleccione una opcion</option>
                                    <optgroup label="Economico/Placa">
                                        <?php
                                        $tractor=muestraTractores($mysqli);
                                        while ($fila =$tractor->fetch_assoc()) {
                                            echo '<option value="'.$fila["tractorId"].'">'.$fila["tractorEconomico"]."-".$fila["tractorPlaca"].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="">Operador</span>
                                </div>
                                <select id="id_operador" class=" form-control" name="id_operador">
                                    <option value="0">Seleccione una opcion</option>
                                    <optgroup label="Nomvre/Licencia">
                                        <?php
                                        $operador=muestraOperador($mysqli);
                                        while ($fila =$operador->fetch_assoc()) {
                                            echo '<option value="'.$fila["operadorID"].'">'
                                            .$fila["operadorNombre"]."-".$fila["operadorLisencia"].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-warning btn-lg btn-block mb-5 editarCambios">Guardar cambios</button>
    <!-- Large modal -->
    <div class="modal fade viaje-editar-data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="" class="formularioViaje">
                    <div class="container">
                        <div class="form-row mb-4 mt-4">
                            <div class="col-md-3">
                                <label for="">#Codigo de viaje</label>
                                <input type="text" id="id_viaje" class="form-control" name="id_viaje">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="">Empresa Emisora:</label>
                                <select id="empresaEmisoraId" class=" form-control" name="empresaEmisoraId">
                                    <option value="0">Seleccione una opcion</option>
                                    <optgroup label="Escriba y seleccione">

                                        <?php
                                        $nosotros=muestraEmpresaEmisoara($mysqli);
                                        while ($fila =$nosotros->fetch_assoc()) {
                                            echo '<option value="'.$fila["empresaEmisoraId"].'">'.$fila["empresaEmisoraNombre"].'</option>';
                                        }
                                    ?>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Empresa Receptora:</label>
                                <select id="empresaReceptoraId" class=" form-control" name="empresaReceptoraId">
                                    <option value="0">Seleccione una opcion</option>
                                    <optgroup label="Escriba y seleccione">
                                        <?php
                                        $clientes=muestraEmpresaReceptora($mysqli);
                                        while ($fila =$clientes->fetch_assoc()) {
                                            echo '<option value="'.$fila["empresaReceptoraId"].'">'.$fila["empresaReceptoraNombre"].'</option>';
                                        }
                                    ?>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Origen de carga:</label>
                                        <select id="hojaDeViajeOrigen" class=" form-control"
                                                name="hojaDeViajeOrigen">
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
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="">Contenido de Remolque</label>
                                <select id="remolqueCargaId1" class=" form-control" name="remolqueCargaId">
                                    <option value="0">Seleccione una opcion</option>
                                    <optgroup label="Escriba y seleccione">
                                        <?php
                                            $servicio=muestraRemolqueCarga($mysqli);
                                            while ($fila =$servicio->fetch_assoc()) {
                                                echo '<option value="'.$fila["remolqueCargaId"].'">'.$fila["remolqueCargaServicio"].'</option>';
                                            }
                                            ?>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for=" inputPassword4">Econoico de remolque</label>
                                <select id="hojaDeViajeRemolqueEconomico" class=" form-control"
                                    name="hojaDeViajeRemolqueEconomico">
                                    <option value="0">Seleccione una opcion</option>
                                    <optgroup label="Economico/Placa">
                                        <?php
                                        $remolque=muestraRemolqe($mysqli);
                                        while ($fila =$remolque->fetch_assoc()) {
                                            echo '<option value="'.$fila["remolqueID"].'">'.$fila["remolqueEconomico"]."-".$fila["remolqueEconomico"].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for=" inputPassword4">Talon 1</label>
                                <input type="text" class="form-control" id="hojaDeViajeTalon1"
                                    placeholder="Escriba aqui..." name="hojaDeViajeTalon1">
                            </div>
                            <div class="form-group col-md-3">
                                <label for=" inputPassword4">Talon 2</label>
                                <input type="text" class="form-control" id="hojaDeViajeTalon2" name="hojaDeViajeTalon2"
                                    placeholder="pendiente">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="card card-cantidad">
                                <div class="card-body form-row">
                                    <div class="form-group col-lg-6 col-xl-4">
                                        <label for="" class="text-center col-12">Tipo de carga /
                                            Cantidad</label>
                                        <select class="custom-select" id="cargaId" name="cargaId">
                                            <option value="0">Seleccione una opcion</option>
                                            <optgroup label="Escriba y seleccione">
                                                <?php
                                                        $carga=muestraCarga($mysqli);
                                                        while ($fila =$carga->fetch_assoc()) {
                                                            echo '<option value="'.$fila["cargaId"].'">'.$fila["cargaNombre"].'</option>';
                                                        }
                                                        ?>
                                            </optgroup>
                                        </select>
                                        <div class="input-group-prepend ">
                                            <input id="hojaDeViajeCargaCantidad" name="hojaDeViajeCargaCantidad"
                                                class="form-control input-group" type="number" min="0" value="0">
                                        </div>

                                    </div>
                                    <div class="form-group col-lg-6 col-xl-4">
                                        <label for="" class="text-center col-12">Unidad /
                                            Proporcion</label>

                                        <select class="custom-select" id="cargaUnidadDeMedidaID"
                                            name="cargaUnidadDeMedidaID">
                                            <option value="0">Seleccione una opcion</option>
                                            <optgroup label="Escriba y seleccione">
                                                <?php
                                                        $carga=muestraUnidadesDeMedida($mysqli);
                                                        while ($fila =$carga->fetch_assoc()) {
                                                            echo '<option value="'.$fila["cargaUnidadDeMedidaID"].'">'.$fila["cargaUnidadDeMedidaNombre"].'</option>';
                                                        }
                                                        ?>
                                            </optgroup>
                                        </select>
                                        <div class="input-group-prepend ">
                                            <input class="form-control input-group"
                                                id="hojaDeViajeUnidadDeMedidaProporcional"
                                                name="hojaDeViajeUnidadDeMedidaProporcional" type="number" min="0"
                                                value="0">
                                        </div>

                                    </div>
                                    <div class="form-group col-lg-6 col-xl-4">
                                        <label for="" class="text-center col-12">Resultado</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary res1" type="button">=</button>
                                            </div>
                                            <input type="text" class="form-control" placeholder="" id="res1"
                                                aria-label="" aria-describedby="basic-addon1" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-warning btn-sm mb-5 editarHDV"
                            data-dismiss="modal">Editar</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--agregar-->
    
    <div class="modal fade viaje-agregar-data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="" class="formularioViaje_A">
                    <div class="container">
                        <div class="form-row mb-4 mt-4">
                            <div class="form-group col-md-4">
                                <label for="">Empresa Emisora:</label>
                                <select id="empresaEmisoraId_A" class=" form-control" name="empresaEmisoraId_A">
                                    <option value="0">Seleccione una opcion</option>
                                    <optgroup label="Escriba y seleccione">

                                        <?php
                                        $nosotros=muestraEmpresaEmisoara($mysqli);
                                        while ($fila =$nosotros->fetch_assoc()) {
                                            echo '<option value="'.$fila["empresaEmisoraId"].'">'.$fila["empresaEmisoraNombre"].'</option>';
                                        }
                                    ?>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Empresa Receptora:</label>
                                <select id="empresaReceptoraId_A" class=" form-control" name="empresaReceptoraId_A">
                                    <option value="0">Seleccione una opcion</option>
                                    <optgroup label="Escriba y seleccione">
                                        <?php
                                        $clientes=muestraEmpresaReceptora($mysqli);
                                        while ($fila =$clientes->fetch_assoc()) {
                                            echo '<option value="'.$fila["empresaReceptoraId"].'">'.$fila["empresaReceptoraNombre"].'</option>';
                                        }
                                    ?>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Origen de carga:</label>
                                    <select id="hojaDeViajeOrigen_A" class=" form-control" name="hojaDeViajeOrigen_A">
                                        <option value="0">Seleccione una opcion</option>
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
                                    </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="">Contenido de Remolque</label>
                                <select id="remolqueCargaId1_A" class=" form-control" name="remolqueCargaId_A">
                                    <option value="0">Seleccione una opcion</option>
                                    <optgroup label="Escriba y seleccione">
                                        <?php
                                            $servicio=muestraRemolqueCarga($mysqli);
                                            while ($fila =$servicio->fetch_assoc()) {
                                                echo '<option value="'.$fila["remolqueCargaId"].'">'.$fila["remolqueCargaServicio"].'</option>';
                                            }
                                            ?>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for=" inputPassword4">Econoico de remolque</label>
                                <select id="hojaDeViajeRemolqueEconomico_A" class=" form-control"
                                    name="hojaDeViajeRemolqueEconomico_A">
                                    <option value="0">Seleccione una opcion</option>
                                    <optgroup label="Economico/Placa">
                                        <?php
                                        $remolque=muestraRemolqe($mysqli);
                                        while ($fila =$remolque->fetch_assoc()) {
                                            echo '<option value="'.$fila["remolqueID"].'">'.$fila["remolqueEconomico"]."-".$fila["remolqueEconomico"].'</option>';
                                        }
                                        ?>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for=" inputPassword4">Talon 1</label>
                                <input type="text" class="form-control" id="hojaDeViajeTalon1_A"
                                    placeholder="Escriba aqui..." name="hojaDeViajeTalon1_A">
                            </div>
                            <div class="form-group col-md-3">
                                <label for=" inputPassword4">Talon 2</label>
                                <input type="text" class="form-control" id="hojaDeViajeTalon2_A"
                                    name="hojaDeViajeTalon2_A" placeholder="pendiente">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="card card-cantidad">
                                <div class="card-body form-row">
                                    <div class="form-group col-lg-6 col-xl-4">
                                        <label for="" class="text-center col-12">Tipo de carga /
                                            Cantidad</label>
                                        <select class="custom-select" id="cargaId_A" name="cargaId_A">
                                            <option value="0">Seleccione una opcion</option>
                                            <optgroup label="Escriba y seleccione">
                                                <?php
                                                        $carga=muestraCarga($mysqli);
                                                        while ($fila =$carga->fetch_assoc()) {
                                                            echo '<option value="'.$fila["cargaId"].'">'.$fila["cargaNombre"].'</option>';
                                                        }
                                                        ?>
                                            </optgroup>
                                        </select>
                                        <div class="input-group-prepend ">
                                            <input id="hojaDeViajeCargaCantidad_A" name="hojaDeViajeCargaCantidad_A"
                                                class="form-control input-group" type="number" min="0" value="0">
                                        </div>

                                    </div>
                                    <div class="form-group col-lg-6 col-xl-4">
                                        <label for="" class="text-center col-12">Unidad /
                                            Proporcion</label>

                                        <select class="custom-select" id="cargaUnidadDeMedidaID_A"
                                            name="cargaUnidadDeMedidaID_A">
                                            <option value="0">Seleccione una opcion</option>
                                            <optgroup label="Escriba y seleccione">
                                                <?php
                                                        $carga=muestraUnidadesDeMedida($mysqli);
                                                        while ($fila =$carga->fetch_assoc()) {
                                                            echo '<option value="'.$fila["cargaUnidadDeMedidaID"].'">'.$fila["cargaUnidadDeMedidaNombre"].'</option>';
                                                        }
                                                        ?>
                                            </optgroup>
                                        </select>
                                        <div class="input-group-prepend ">
                                            <input class="form-control input-group"
                                                id="hojaDeViajeUnidadDeMedidaProporcional_A"
                                                name="hojaDeViajeUnidadDeMedidaProporcional_A" type="number" min="0"
                                                value="0">
                                        </div>

                                    </div>
                                    <div class="form-group col-lg-6 col-xl-4">
                                        <label for="" class="text-center col-12">Resultado</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary res1" type="button">=</button>
                                            </div>
                                            <input type="text" class="form-control" placeholder="" id="res1_A"
                                                aria-label="" aria-describedby="basic-addon1" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-warning btn-sm mb-5 agregarHDV">Agregar</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
    <?php
        include "../import/componentes/footer.php";
        include "../import/componentes/modal/modalIndex.php";
        include "../import/componentes/js/main.php";
    ?>
    <script>
        var remolques;
        var remolques1;
        var remolques2;

        function trRemolque(parametros, num) {
            if ($("#id_viaje" + num).length > 0) {
                if (parametros.id_viaje ===
                    $("#id_viaje" + num).attr("value")) {
                    if (num === "1") {
                        remolques1 = parametros
                    }
                    if (num === "2") {
                        remolques2 = parametros
                    }
                    data = {
                        "caso": 1,
                        "tr": num,
                        "array": parametros
                    };
                    $.ajax({
                        type: "POST",
                        url: "../controlador/modulos/hojaDeViaje/hojaDeViajeArriboEdicionTr.php",
                        data: data,
                        success: function (res) {
                            res = JSON.parse(res);
                            editarTr(res);
                        }
                    });
                }
            }
        }

        $(".editarCambios").click(function () {
            var array = {
                "caso": 1,
                "id_hojaDeViaje": <?php echo $_GET['id'] ?> ,
                "hojaDeViaje_observaciones": $("#hojaDeViaje_observaciones").val(),
                "viaje": obtenerRemolques(),
                "tractor_del_operador": {
                    "id_tractor": $("#id_tractor").val(),
                    "id_operador": $("#id_operador").val()
                }
            };
            console.log(array);
            $.ajax({
                type: "POST",
                url: "../controlador/modulos/hojaDeViaje/hojaDeViajeArriboEdicionSubir.php",
                data: array,
                success: function (res) {
                    //res = JSON.parse(res);
                    location.replace("./hojaDeViaje.php");
                }
            });

        });
        $(".editarHDV").click(function () {
            var params = $('.formularioViaje').serializeArray();
            params = serializeToJson(params);
            remolques = params;
            console.log(remolques);
            trRemolque(remolques, "1");
            trRemolque(remolques, "2");
            $('.viaje-editar-data').modal('hide');

        });
        $(".agregarRemolque").click(function () {
            if ($("#id_viaje2").length > 0) {
                alert("El tractor no puede tener mas de 2 remolques");
            } else {
                //alert("NO esta el array"); .viaje-agregar-data
                $('.viaje-agregar-data').modal('show');
            }
        });
        $(".agregarHDV").click(function()
            {
                //validaciones 
                if (
                    //NUMBER
                    $("#empresaEmisoraId_A").val() === "0" ||
                    $("#empresaReceptoraId_A").val() === "0" ||
                    $("#remolqueCargaId1_A").val() === "0" ||
                    $("#hojaDeViajeRemolqueEconomico_A").val() === "0" ||
                    $("#cargaId_A").val() === "0" ||
                    $("#cargaUnidadDeMedidaID_A").val() === "0" ||
                    //STRING
                    $("#hojaDeViajeTalon1_A").val() === "" ||
                    $("#hojaDeViajeCargaCantidad_A").val() === "0" || $("#hojaDeViajeCargaCantidad_A").val() === "" ||
                    $("#hojaDeViajeUnidadDeMedidaProporcional_A").val() === "0" || $("#hojaDeViajeUnidadDeMedidaProporcional_A").val() === "" 
                ){
                    alert("ingrese los datos correspondientes");
                }else{
                    alert("DATOS CORRECTOS");
                    agregarUnRemolque();
                    
                    //window.locationf="hojaDeViajeArriboEdicion.php";
                }
            }
        );
        function obtenerRemolques() {
            return {
                'r1': remolques1,
                'r2': remolques2
            };
        }
        function editarTr(data) {
            $("#ORIGEN" + data.tr).html(data["ORIGEN"]);
            $("#EMISOR" + data.tr).html(data["EMISOR"]);
            $("#EMISOR" + data.tr).html(data["EMISOR"]);
            $("#CLIENTE" + data.tr).html(data["CLIENTE"]);
            $("#REMOLQUE_ECONOMICO" + data.tr).html(data["REMOLQUE_ECONOMICO"]);
            $("#REMOLQUE_PLACAS" + data.tr).html(data["REMOLQUE_PLACAS"]);
            $("#REMOLQUE_SERVICIO" + data.tr).html(data["REMOLQUE_SERVICIO"]);
            $("#REMOLQUE_SERVICIO_IMPUESTO" + data.tr).html(data["REMOLQUE_SERVICIO_IMPUESTO"]);
            $("#CARGA" + data.tr).html(data["CARGA"]);
            $("#UNIDAD" + data.tr).html(data["UNIDAD"]);
            $("#viaje_talon1" + data.tr).html(data["viaje_talon1"]);
            $("#viaje_talon2" + data.tr).html(data["viaje_talon2"]);
        }

        function serializeToJson(serializer) {
            var _string = '{';
            for (var ix in serializer) {
                var row = serializer[ix];
                _string += '"' + row.name + '":"' + row.value + '",';
            }
            var end = _string.length - 1;
            _string = _string.substr(0, end);
            _string += '}';
            //    console.log('_string: ', _string);
            return JSON.parse(_string);
        }
        function eliminarIdViaje(id, estado){
            if (estado !== "liberacion") {
                alert("no se puede editar remolques que no tengan estado (liberacion)");
            } else {
                if (window.confirm("Segur@ de que quiere eliminar este viaje?")) 
                {
                    location.replace("../controlador/modulos/hojaDeViaje/hojaDeViajeArriboEdicionEliminarRemolque.php?id_viaje="+id+"&&id_hojaDeViaje=<?php echo $id?>");
                }
            }
        }
        function obtenerIdViaje(id, estado) {
            if (estado !== "liberacion") {
                alert("no se puede editar remolques que no tengan estado (liberacion)");
            } else {
                $("#id_viaje").val(id);
                $('.viaje-editar-data').modal('show');
                
            }

        }
        function agregarUnRemolque()
            {
                var params = $('.formularioViaje_A').serializeArray();   
                params = serializeToJson(params);
                //console.log(params);
             
                var array = 
                {
                "caso": 1,
                "id_hojaDeViaje": <?php echo $_GET['id'] ?> ,
                "hojaDeViaje_observaciones": $("#hojaDeViaje_observaciones").val(),
                "viaje": params,
                "tractor_del_operador": 
                    {
                    "id_tractor": $("#id_tractor").val(),
                    "id_operador": $("#id_operador").val()
                    }
                };
                console.log(array);
                $.ajax({
                    type: "POST",
                    url: "../controlador/modulos/hojaDeViaje/hojaDeViajeArriboEdicionAddRemolque.php",
                    data: array,
                    success: function (res) {
                        //res = JSON.parse(res);
                        //console.log(res);
                        $('.viaje-agregar-data').modal('hide'); 
                        location.replace("./hojaDeViajeArriboEdicion.php?id=<?php echo $id?>");
                    }
                });
        }
    </script>