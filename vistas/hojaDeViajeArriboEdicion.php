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

                            <td><textarea class="form-control"
                                    aria-label="With textarea"><?php echo $hojaDeViaje['hojaDeViaje_observaciones'];?></textarea>
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
                <div class="card-header">
                    Remolques
                </div>
                <div class="card-body">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ESTADO</th>
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
                            <tr>
                                <th scope="row"><?php echo $viaje[$i]['id_viaje'];?></th>
                                <td><?php echo $viaje[$i]['ESTADO'];?></td>
                                <td><?php echo $viaje[$i]['EMISOR'];?></td>
                                <td><?php echo $viaje[$i]['CLIENTE'];?></td>
                                <td><?php echo $viaje[$i]['REMOLQUE_ECONOMICO'];?></td>
                                <td><?php echo $viaje[$i]['REMOLQUE_PLACAS'];?></td>
                                <td><?php echo $viaje[$i]['REMOLQUE_SERVICIO'];?></td>
                                <td><?php echo $viaje[$i]['REMOLQUE_SERVICIO_IMPUESTO'];?></td>
                                <td><?php echo $viaje[$i]['CARGA'];?></td>
                                <td><?php echo $viaje[$i]['UNIDAD'];?></td>
                                <td><?php echo $viaje[$i]['viaje_talon1'];?></td>
                                <td><?php echo $viaje[$i]['viaje_talon2'];?></td>
                                <td><button type="button" class="btn btn-danger"><i
                                            class="fas fa-trash-alt"></i></button></td>
                                <td><button type="button" class="btn btn-warning"><i class="fas fa-edit"
                                            data-toggle="modal" data-target=".viaje-editar-data"
                                            onclick="obtenerIdViaje(<?php echo $viaje[$i]['id_viaje'];?>)"></i></button>
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
                                            echo '<option value="'.$fila["operadorID"].'">'.$fila["operadorNombre"]."-".$fila["operadorLisencia"].'</option>';
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
    <button type="button" class="btn btn-warning btn-lg btn-block mb-5">Guardar cambios</button>
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
                                <input type="text" class="form-control" id="hojaDeViajeOrigen"
                                    placeholder="Escriba aqui..." name="hojaDeViajeOrigen">
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
                                <input type="text" class="form-control" id="hojaDeViajeTalon1" name="hojaDeViajeTalon1"
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
                        <button type="button" class="btn btn-warning btn-sm mb-5 editarHDV">Editar</button>
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
        $(".editarHDV").click(function () {
            var txt;
            if (confirm("¿Desea editar este viaje?")) {

                //$('.viaje-editar-data').modal('hide')           

                var params = $('.formularioViaje').serializeArray();
                params = serializeToJson(params);
                console.log(params);
            } 
            else 
            {                
            //code..
            }
        });
        function serializeToJson(serializer){
            var _string = '{';
            for(var ix in serializer)
            {
                var row = serializer[ix];
                _string += '"' + row.name + '":"' + row.value + '",';
            }
            var end =_string.length - 1;
            _string = _string.substr(0, end);
            _string += '}';
            console.log('_string: ', _string);
            return JSON.parse(_string);
        }
        function obtenerIdViaje(id) {
            $("#id_viaje").val(id)
        }
    </script>