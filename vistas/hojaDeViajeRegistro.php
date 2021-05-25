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
    <div class="row">
        <!-- Area Chart -->
        <div class="col-12">
            <style>
                .card {
                    height: 1050px !important;
                }
            </style>
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <?php
                    include "../import/componentes/hojaDeViaje/nav.php";
                ?>
                <!-- Card Body -->
                <style>
                    .btn-light {
                        border-color: #d1d3e2;
                    }
                    .bootstrap-select .dropdown-menu {
                        background: black !important;
                    }
                    .btn-light:not(:disabled):not(.disabled).active,
                    .btn-light:not(:disabled):not(.disabled):active,
                    .show>.btn-light.dropdown-toggle {
                        background-color: rgb(255, 217, 0) !important;
                    }
                </style>
                <div class="card-body">
                    <div class="chart-area">
                        <form>
                            <div class="form-row ">
                                <div class="form-group col-md-3 ">
                                    <label for="inputEmail4 ">Empresa emisora 1</label>
                                    <select id="empresaEmisoraId" class="selectpicker form-control" data-live-search="true"
                                        name="empresaEmisoraId">
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
                                    <select id="empresaReceptoraId" class="selectpicker form-control" data-live-search="true"
                                        name="empresaReceptoraId">
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
                                <label for="inputPassword4">Origen de carga 1</label>
                                    <input type="text" class="form-control" id="hojaDeViajeOrigen"
                                        placeholder="Escriba aqui..." name="hojaDeViajeOrigen">
                                </div>
                                <div class="form-group col-md-2  ">
                                <label for="inputPassword4">muestra mas empresas</label>
                                        <button type=""  class="form-control ">+</button>
                                </div>
                                
                            </div>
                            <div class="form-row ">
                                <div class="form-group col-md-3 ">
                                    <label for="inputEmail4 ">Empresa emisora 2</label>
                                    <select id="" class="selectpicker form-control" data-live-search="true"
                                        name="">
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
                                    <select id="" class="selectpicker form-control" data-live-search="true"
                                        name="">
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
                                <label for="inputPassword4">Origen de carga 2</label>
                                    <input type="text" class="form-control" id=""
                                        placeholder="Escriba aqui..." name="">
                                </div>
                                
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Nombre del operador</label>
                                    <select id="operadorId" class="selectpicker form-control" data-live-search="true"
                                        name="operadorId">
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
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Economico Tractor</label>
                                    <select 
                                          id="hojaDeViajeTractorEconomico" class="selectpicker form-control" data-live-search="true"
                                        name="hojaDeViajeTractorEconomico">
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
                                    <input type="text" 
                                        class="form-control" id="tractorPlaca" name="tractorPlaca" 
                                        placeholder="Escriba aqui..." readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Contenido de Remolque 1</label>

                                    <select id="remolqueCargaId1" class="selectpicker form-control" data-live-search="true" name="remolqueCargaId1">
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
                                <div class=" form-group col-md-2">
                                    <label for=" inputPassword4">Econoico de remolque 1</label>
                                    <select id="hojaDeViajeRemolqueEconomico1" class="selectpicker form-control" data-live-search="true" name="hojaDeViajeRemolqueEconomico1">
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
                                    <input type="text" class="form-control" id="hojaDeViajeTalon1"
                                        placeholder="Escriba aqui..." name="hojaDeViajeTalon1">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Talon de Remolque 1B</label>
                                    <input type="text" class="form-control" id=""
                                        placeholder="pendiente" name="">
                                </div>

                            </div>
                            <div class="form-row ">
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Carga 1</label>
                                    <select id="cargaId" class="selectpicker form-control" data-live-search="true"
                                        name="cargaId">
                                        <optgroup label="Escriba y seleccione">
                                        <?php
                                        $tipoCarga=muestraCarga($mysqli);
                                        while ($fila =$tipoCarga->fetch_assoc()) {
                                            echo '<option value="'.$fila["cargaId"].'">'.$fila["cargaNombre"].'</option>';
                                        }
                                        ?> 
                                        </optgroup>
                                    </select>
                                    <label for="inputPassword4">Cantidad de la carga 1</label>
                                    <input type="text" class="form-control" placeholder="Escriba aqui..."
                                        name="hojaDeViajeCantidadCarga" min="0" id="hojaDeViajeCantidadCarga" value="0"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Tipo de carga 1</label>
                                    <select id="cargaUnidadDeMedidaID" class="selectpicker form-control" data-live-search="true"
                                        name="cargaUnidadDeMedidaID">
                                        <optgroup label="Escriba y seleccione">
                                        <?php
                                        $unidadDeMedida=muestraUnidadesDeMedida($mysqli);
                                        while ($fila =$unidadDeMedida->fetch_assoc()) {
                                            echo '<option value="'.$fila["cargaUnidadDeMedidaID"].'">'.$fila["cargaUnidadDeMedidaNombre"].'</option>';
                                        }
                                        ?>
                                        </optgroup>
                                    </select>
                                    <label for="inputPassword4">Poporcion de carga 1</label>
                                    <input type="text" class="form-control" placeholder="Escriba aqui..."
                                        name="hojaDeViajeCantidadCargaProporcion" min="0" id="hojaDeViajeCantidadCargaProporcion" value="0"/>
                                </div>
   

                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Resultado de la caga</label>

                                    <input type="text" class="form-control" id="resultadoCarga" value="0" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Contenido de Remolque 2</label>
                                    <select id="remolqueCargaId2" class="selectpicker form-control" data-live-search="true"
                                        name="remolqueCargaId2" >
                                        <optgroup label="Escriba y seleccione">
                                        <?php
                                        $remolqueCarga=muestraRemolqueCarga($mysqli);
                                        while ($fila =$remolqueCarga->fetch_assoc()) {
                                            echo '<option value="'.$fila["remolqueCargaId"].'">'.$fila["remolqueCargaServicio"].'</option>';
                                        }
                                        ?>   
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Economico de remolque 2</label>
                                    <select id="hojaDeViajeRemolqueEconomico2" class="selectpicker form-control" data-live-search="true"
                                        name="hojaDeViajeRemolqueEconomico2">
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
                                        placeholder="Escriba aqui..." name="remolquePlaca2" readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Talon de Remolque 2A</label>
                                    <input type="text" class="form-control" id="hojaDeViajeTalon2"
                                        placeholder="Escriba aqui..." name="hojaDeViajeTalon2">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Talon de Remolque 2B</label>
                                    <input type="text" class="form-control" id=""
                                        placeholder="pendiente" name="">
                                </div>
                            </div>
                            <hr>
                            
                            <hr>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Comentario</label>
                                <textarea class="form-control" id="hojaDeViajeComentario" rows="3" name="hojaDeViajeComentario"></textarea>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-warning col-md-6" id="agregarTalonNuevo">Agregar</button>
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

