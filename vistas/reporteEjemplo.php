<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
?>
<div class="container-fluid">
    <style>
        .card {
            height: 800px !important;
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
                <div class="card shadow mb-4">
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area ">
                            <div class="row">
                                <style>
                                    .card-reporte {
                                        width: 100%;
                                    }
                                </style>
                                <div class="card card-reporte">
                                    <div class="card-header">
                                    <i class="fas fa-hard-hat"></i> With supporting text below
                                            as a natural lead-in to additional content.
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <p class="card-text">
                                        </p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-8">Rango de fechas:</div>
                                            <div class="col-4">
                                                <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected>Choose...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                            <div class="col-8"></div>
                                            <div class="col-4">
                                            <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected>Choose...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-8">Rango de codigo de clientes:</div>
                                            <div class="col-4">
                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                            </div>
                                            <div class="col-8"></div>
                                            <div class="col-4">
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-8">Imprimir clientes:</div>
                                            <div class="col-4">
                                                <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected>Choose...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-8">Imprimir documentos:</div>
                                            <div class="col-4">
                                                <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected>Choose...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-8">Estado del cliente:</div>
                                            <div class="col-4">
                                                <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected>Choose...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-8">Cliente con moneda:</div>
                                            <div class="col-4">
                                                <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected>Choose...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-8">Formato de imprecion:</div>
                                            <div class="col-4">
                                                <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected>Choose...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-8">Moneda:</div>
                                            <div class="col-4">
                                                <select class="custom-select" id="inputGroupSelect01">
                                                    <option selected>Choose...</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row d-flex flex-row-reverse">
                                            <button type="" class="btn btn-secondary ml-3" >Cancelar</button>
                                            <button type="" class="btn btn-success">Continuar</button>
                                        </div>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
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