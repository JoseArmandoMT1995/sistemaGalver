<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
?>
<?php
    //include "../controlador/coneccion/config.php";
    //include "../controlador/modulos/talones/select.php";
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
                                <div class="form-group col-md-4 ">
                                    <label for="inputEmail4 ">Empresa emisora</label>
                                    <select id="empresaEmisoraId" class="selectpicker form-control" data-live-search="true"
                                        name="empresaEmisoraId">
                                        <optgroup label="Escriba y seleccione">
                                            
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Empresa receptora</label>
                                    <select id="empresaReceptoraId" class="selectpicker form-control" data-live-search="true"
                                        name="empresaReceptoraId">
                                        <optgroup label="Escriba y seleccione">
                                           
                                        </optgroup>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-4">
                                <label for="inputPassword4">Origen de carga</label>
                                    <input type="text" class="form-control" id="talonesOrigen"
                                        placeholder="Escriba aqui..." name="talonesOrigen">
                                </div>
                                
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Nombre del operador</label>
                                    <select id="operadorId" class="selectpicker form-control" data-live-search="true"
                                        name="operadorId">
                                        <optgroup label="Escriba y seleccione">
                                            
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
                                    <select id="operadorId" class="selectpicker form-control" data-live-search="true"
                                        name="operadorId">
                                        <optgroup label="Escriba y seleccione">
                                            
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Placa Tractor</label>
                                    <input type="text" class="form-control" id="opeisencia"
                                        placeholder="Escriba aqui..." name="operadorLisencia" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Contenido de Remolque 1</label>

                                    <select id="talonesRemolque1" class="selectpicker form-control" data-live-search="true"
                                        name="talonesRemolque1">
                                        <optgroup label="Escriba y seleccione">
                                            
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Placa de remolque 1</label>
                                    <select id="cargaTipoId" class="selectpicker form-control" data-live-search="true"
                                        name="cargaTipoId">
                                        <optgroup label="Escriba y seleccione">
                                            
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Economico de Remolque 1</label>
                                    <input type="text" class="form-control" id="talonesEconomico1"
                                        placeholder="Escriba aqui..." name="talonesEconomico1" readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Talon de Remolque 1</label>
                                    <input type="text" class="form-control" id="talonesTalon1"
                                        placeholder="Escriba aqui..." name="talonesTalon1">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Contenido de Remolque 2</label>
                                    <select id="talonesRemolque2" class="selectpicker form-control" data-live-search="true"
                                        name="talonesRemolque2" >
                                        <optgroup label="Escriba y seleccione">
                                           
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Placa de remolque 2</label>
                                    <select id="cargaTipoId" class="selectpicker form-control" data-live-search="true"
                                        name="cargaTipoId">
                                        <optgroup label="Escriba y seleccione">
                                            
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Economico de Remolque 2</label>
                                    <input type="text" class="form-control" id="talonesEconomico2"
                                        placeholder="Escriba aqui..." name="talonesEconomico2" readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Talon de Remolque 2</label>
                                    <input type="text" class="form-control" id="talonesTalon2"
                                        placeholder="Escriba aqui..." name="talonesTalon2">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row ">
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Carga</label>
                                    <select id="carga" class="selectpicker form-control" data-live-search="true"
                                        name="cargaId">
                                        <optgroup label="Escriba y seleccione">
                                            
                                        </optgroup>
                                    </select>
                                    <label for="inputPassword4">Cantidad de la carga</label>
                                    <input type="text" class="form-control" placeholder="Escriba aqui..."
                                        name="talonesCargaCantidad" min="0" id="talonesCargaCantidad"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Tipo de carga</label>
                                    <select id="cargaTipoId" class="selectpicker form-control" data-live-search="true"
                                        name="cargaTipoId">
                                        <optgroup label="Escriba y seleccione">
                                            
                                        </optgroup>
                                    </select>
                                    <label for="inputPassword4">Poporcion de carga</label>
                                    <input type="text" class="form-control" placeholder="Escriba aqui..."
                                        name="talonesCargaCantidad" min="0" id="talonesCargaCantidad"/>
                                </div>
   

                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Resultado de la caga</label>

                                    <input type="text" class="form-control" id="resultadoCarga" readonly>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Comentario</label>
                                <textarea class="form-control" id="talonesComentarios" rows="3" name="talonesComentarios"></textarea>
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
    include "../import/componentes/js/talon.php";
?>

