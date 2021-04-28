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

            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <?php
                                    include "../import/componentes/talon/nav.php";
                                ?>
                <!-- Card Body -->
                <div class="card-body">

                    <div class="chart-area">

                        <form>
                            <!-- Button trigger modal -->



                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">Empresa Emisora *</label><br>
                                    <input type="text" placeholder="Username" id="empresaNT" disabled>
                                    <button type="button" data-toggle="modal" data-target="#empresaModal">?</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4">Cliente *</label><br>
                                    <input type="text" placeholder="Username" disabled>
                                    <button type="button" id="select">?</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Origen *</label><br>
                                    <input type="text" placeholder="Username" disabled>
                                    <button type="button" id="select">?</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Destino *</label><br>
                                    <input type="text" placeholder="Username" disabled>
                                    <button type="button" id="select">?</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Operador *</label><br>
                                    <input type="text" placeholder="Username" disabled>
                                    <button type="button" id="select">?</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Licencia *</label><br>
                                    <input type="text" placeholder="Username" disabled>
                                    <button type="button" id="select">?</button>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Placas *</label><br>
                                    <input type="text" placeholder="Username" disabled>
                                    <button type="button" id="select">?</button>
                                </div>
                                <div class="form-group col-md-3">

                                </div>



                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Talon *</label><br>
                                    <input type="text" placeholder="Username" disabled>
                                    <button type="button" id="select">?</button>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Folio de carga *</label><br>
                                    <input type="text" placeholder="Username" disabled>
                                    <button type="button" id="select">?</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Remolque *</label><br>
                                    <input type="text" placeholder="Username" disabled>
                                    <button type="button" id="select">?</button>
                                </div>
                                <div class="form-group col-md-3">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Unidad de medida *</label><br>
                                    <input type="text" id="unidadNT" disabled>
                                    <button type="button" data-toggle="modal"
                                        data-target="#unidadDeMedidaModal">?</button>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Unidad de medida *</label><br>
                                    <input type="text">
                                </div>
                                <div class="form-group col-md-6">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Fecha de Liberacion
                                        (Cliente) *</label><br>
                                    <input type="Date">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Fecha de Limite (Cliente)*</label><br>
                                    <input type="Date">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Fecha de carga (Operador)*</label><br>
                                    <input type="Date">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Fecha de Entrega (Operador)*</label><br>
                                    <input type="Date">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Observaciones</span>
                                    </div>
                                    <textarea class="form-control" aria-label="With textarea"></textarea>
                                </div>
                                <!--
                                                <div class="form-group col-md-2">
                                                    <label for="inputPassword4">Talon</label>
                                                    <select class="custom-select" id="inputGroupSelect01">
                                                        <option selected>Choose...</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputPassword4">Talon</label>
                                                    <input type="text" class="form-control" placeholder="Placa x" aria-label="Username" aria-describedby="basic-addon1">

                                                </div>
                                            -->

                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block">Agregar
                                Talon</button>

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