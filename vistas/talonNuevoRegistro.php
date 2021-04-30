<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
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
                    height: 1000px !important;
                }
            </style>
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <?php
                    include "../import/componentes/talon/nav.php";
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
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Empresa emisora</label>
                                    <select id="" class="selectpicker form-control" data-live-search="true"
                                        name="talonEmpresaEmisora">
                                        <optgroup label="Escriba y seleccione">
                                            <option value="galver">galver</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Empresa receptora</label>
                                    <select id="" class="selectpicker form-control" data-live-search="true"
                                        name="estadoTalonId">
                                        <optgroup label="Escriba y seleccione">
                                            <?php
                                            include "../controlador/modulos/clientes/clientesMostrar.php";
                                            $contador=0;
                                                while ($r=$consultaSql->fetch_array()) 
                                                    {
                                            ?>
                                            <option value="<?php echo $r['empresaId'];?>">
                                                <?php echo $r["empresaNombre"];?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Empresa emisora</label>
                                    <select id="" class="selectpicker form-control" data-live-search="true"
                                        name="talonEmpresaEmisora">
                                        <optgroup label="Escriba y seleccione">
                                            <option value="1">Activo</option>
                                            <option value="2">Pausa</option>
                                            <option value="3">Cancelado</option>
                                            <option value="4">Finalizado</option>
                                        </optgroup>
                                    </select>
                                </div>

                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Nombre del operador</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOperador">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Licensia</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Origen de carga</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Destino de carga</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonDestino">
                                </div>

                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Nombre del operador</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOperador">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Licensia</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Remolque 1</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Numero de placa 1</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Ficha de caja 1</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Talon 1</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Remolque 2</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Numero de placa 2</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Ficha de caja 2</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Talon 2</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>

                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Fecha de liberacion</label>
                                    <input type="date" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Fecha de carga</label>
                                    <input type="date" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Fecha de Descarga</label>
                                    <input type="date" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Fecha de Arribo</label>
                                    <input type="date" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Tipo de cantidad</label>
                                    <select id="" class="selectpicker form-control" data-live-search="true"
                                        name="talonEmpresaEmisora">
                                        <optgroup label="Escriba y seleccione">
                                            <option value="bulto">bulto</option>
                                            <option value="bulto">saco</option>
                                            <option value="bulto">super saco</option>
                                            <option value="bulto">tarmia</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Cantidad</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Resultado de cantidad</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-warning col-md-6">Agregar</button>
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
    include "../import/componentes/js/main.php";
?>