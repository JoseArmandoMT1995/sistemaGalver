<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/hojaDeViaje/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/selects.php";
?>
<style>
    .card-viaje {
        background-color: rgb(34, 34, 34) !important;
        height: 350px !important;
    }
</style>
<div class="container-fluid">
    <?php
        include "../import/componentes/nav1.php";
    ?>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-12">

            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <?php
                    include "../import/componentes/hojaDeViaje/nav.php";
                ?>
                <!-- Card Body -->

                <div class="card-body">
                    <div class="chart-area">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="inputPassword4">Nombre del operador</label>
                                    <select id="operadorId" class=" form-control" name="operadorId">
                                        <option value="0">Seleccione una opcion</option>
                                        <optgroup label="Escriba y seleccione">
                                            <?php
                                        $operador=muestraOperador($mysqli);
                                        while ($fila =$operador->fetch_assoc()) {
                                            echo '<option value="'.$fila["operadorID"].'">'.$fila["operadorNombre"].'</option>';
                                        }
                                        ?>
                                        </optgroup>
                                    </select>

                                </div>

                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Licencia</label>
                                    <input type="text" class="form-control" id="operadorLisencia"
                                        placeholder="Escriba aqui..." name="operadorLisencia" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Economico Tractor</label>
                                    <select id="hojaDeViajeTractorEconomico" class=" form-control"
                                        name="hojaDeViajeTractorEconomico">
                                        <option value="0">Seleccione una opcion</option>
                                        <optgroup label="Escriba y seleccione">
                                            <?php
                                        $tractor=muestraTractores($mysqli);
                                        while ($fila =$tractor->fetch_assoc()) {
                                            echo '<option value="'.$fila["tractorId"].'">'.$fila["tractorEconomico"].'</option>';
                                        }
                                        ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Placa Tractor</label>
                                    <input type="text" class="form-control" id="tractorPlaca" name="tractorPlaca"
                                        placeholder="Escriba aqui..." readonly>
                                </div>
                            </div>
                            <hr>

                            <div class="card card-viaje" id="viaje1">
                                <div class="card-body">
                                    <div class="form-row col-md-12">
                                        <div class="form-group col-md-3 ">
                                            <label for="inputEmail4 ">Empresa emisora 1</label>
                                            <select id="empresaEmisoraId1" class=" form-control"
                                                name="empresaEmisoraId1">
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
                                        <div class="form-group col-md-3">
                                            <label>Empresa receptora 1</label>
                                            <select id="empresaReceptoraId1" class=" form-control"
                                                name="empresaReceptoraId1">
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

                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Origen de carga 1</label>
                                            <input type="text" class="form-control" id="hojaDeViajeOrigen1"
                                                placeholder="Escriba aqui..." name="hojaDeViajeOrigen1">
                                        </div>

                                    </div>
                                    <div class="form-row col-md-12">
                                        <div class="form-group col-md-3">
                                            <label for="inputPassword4">Contenido de Remolque 1</label>
                                            <select id="remolqueCargaId1" class=" form-control" name="remolqueCargaId1">
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
                                        <div class=" form-group col-md-3">
                                            <label for=" inputPassword4">Econoico de remolque 1</label>
                                            <select id="hojaDeViajeRemolqueEconomico1" class=" form-control"
                                                name="hojaDeViajeRemolqueEconomico1">
                                                <option value="0">Seleccione una opcion</option>
                                                <optgroup label="Escriba y seleccione">
                                                    <?php
                                        $remolque=muestraRemolqe($mysqli);
                                        while ($fila =$remolque->fetch_assoc()) {
                                            echo '<option value="'.$fila["remolqueID"].'">'.$fila["remolqueEconomico"].'</option>';
                                        }
                                        ?>
                                                </optgroup>
                                            </select>

                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="inputPassword4">Placa de Remolque 1</label>
                                            <input type="text" class="form-control" id="remolquePlaca1"
                                                placeholder="Escriba aqui..." name="remolqueEconomico1" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputPassword4">Talon de Remolque 1A</label>
                                            <input type="text" class="form-control" id="hojaDeViajeTalon1A"
                                                placeholder="Escriba aqui..." name="hojaDeViajeTalon1A">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputPassword4">Talon de Remolque 1B</label>
                                            <input type="text" class="form-control" id="hojaDeViajeTalon1B"
                                                name="hojaDeViajeTalon1B" placeholder="pendiente">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="card card-cantidad">
                                            <div class="card-body form-row">
                                                <div class="form-group col-lg-6 col-xl-4">
                                                    <label for="" class="text-center col-12">Tipo de carga /
                                                        Cantidad</label>
                                                    <div class="input-group">
                                                        <select class="custom-select" id="cargaId1">
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
                                                            <input id="hojaDeViajeCargaCantidad1"
                                                                class="form-control input-group" type="number" min="0"
                                                                value="0" onkeypress="return filterFloat(event,this);">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6 col-xl-4">
                                                    <label for="" class="text-center col-12">Unidad de medida /
                                                        Proporcion</label>
                                                    <div class="input-group">
                                                        <select class="custom-select" id="cargaUnidadDeMedidaID1">
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
                                                                id="hojaDeViajeUnidadDeMedidaProporcional1"
                                                                type="number" min="0" value="0"
                                                                onkeypress="return filterFloat(event,this);">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6 col-xl-4">
                                                    <label for="" class="text-center col-12">Resultado</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-outline-secondary res1"
                                                                type="button">=</button>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="" id="res1"
                                                            aria-label="" aria-describedby="basic-addon1" readonly>
                                                    </div>
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="button" class="btn btn-primary btn-lg btn-block agregarRemolque2">Agregar
                                remolque</button>
                            <hr>
                            <div class="card card-viaje" id="viaje2">
                                <div class="card-body">
                                    <div class="form-row col-md-12">
                                        <div class="form-group col-md-3 ">
                                            <label for="inputEmail4 ">Empresa emisora 2</label>
                                            <select id="empresaEmisoraId2" class=" form-control"
                                                name="empresaEmisoraId2">
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
                                        <div class="form-group col-md-3">
                                            <label>Empresa receptora 2</label>
                                            <select id="empresaReceptoraId2" class=" form-control"
                                                name="empresaReceptoraId2">
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

                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Origen de carga 2</label>
                                            <input type="text" class="form-control" id="hojaDeViajeOrigen2"
                                                placeholder="Escriba aqui..." name="hojaDeViajeOrigen2">
                                        </div>

                                    </div>
                                    <div class="form-row col-md-12">
                                        <div class="form-group col-md-3">
                                            <label for="inputPassword4">Contenido de Remolque 2</label>
                                            <select id="remolqueCargaId2" class=" form-control" name="remolqueCargaId2">
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
                                        <div class=" form-group col-md-3">
                                            <label for=" inputPassword4">Econoico de remolque 2</label>
                                            <select id="hojaDeViajeRemolqueEconomico2" class=" form-control"
                                                name="hojaDeViajeRemolqueEconomico2">
                                                <option value="0">Seleccione una opcion</option>
                                                <optgroup label="Escriba y seleccione">
                                                    <?php
                                        $remolque=muestraRemolqe($mysqli);
                                        while ($fila =$remolque->fetch_assoc()) {
                                            echo '<option value="'.$fila["remolqueID"].'">'.$fila["remolqueEconomico"].'</option>';
                                        }
                                        ?>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputPassword4">Placa de Remolque 2</label>
                                            <input type="text" class="form-control" id="remolquePlaca2"
                                                placeholder="Escriba aqui..." name="remolqueEconomico2" readonly>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputPassword4">Talon de Remolque 2A</label>
                                            <input type="text" class="form-control" id="hojaDeViajeTalon2A"
                                                placeholder="Escriba aqui..." name="hojaDeViajeTalon2A">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputPassword4">Talon de Remolque 2B</label>
                                            <input type="text" class="form-control" id="hojaDeViajeTalon2B"
                                                name="hojaDeViajeTalon2B" placeholder="pendiente">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="card card-cantidad">
                                            <div class="card-body form-row">
                                                <div class="form-group col-lg-6 col-xl-4">
                                                    <label for="" class="text-center col-12">Tipo de carga /
                                                        Cantidad</label>
                                                    <div class="input-group">
                                                        <select class="custom-select" id="cargaId2">
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
                                                            <input id="hojaDeViajeCargaCantidad2"
                                                                class="form-control input-group" type="number" min="0"
                                                                value="0" onkeypress="return filterFloat(event,this);">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6 col-xl-4">
                                                    <label for="" class="text-center col-12">Unidad de medida /
                                                        Proporcion</label>
                                                    <div class="input-group">
                                                        <select class="custom-select" id="cargaUnidadDeMedidaID2">
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
                                                                id="hojaDeViajeUnidadDeMedidaProporcional2"
                                                                type="number" min="0" value="0"
                                                                onkeypress="return filterFloat(event,this);">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6 col-xl-4">
                                                    <label for="" class="text-center col-12">Resultado</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-outline-secondary res2"
                                                                type="button">=</button>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="" id="res2"
                                                            aria-label="" aria-describedby="basic-addon1" readonly>
                                                    </div>
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="button" class="btn btn-primary btn-lg btn-block eliminarRemolque2">Eliminar
                                Remolque</button>
                            <hr>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Comentario</label>
                                <textarea class="form-control" id="hojaDeViajeComentario" rows="3"
                                    name="hojaDeViajeComentario"></textarea>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-warning col-md-6 agregarHojaDeViaje"
                                    id="agregarHojaDeViaje">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include "../import/componentes/footer.php";
    include "../import/componentes/modal/modalIndex.php";
    include "../import/componentes/js/hojaDeViaje.php";
?>