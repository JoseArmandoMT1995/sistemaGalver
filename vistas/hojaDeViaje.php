<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
?>
<?php
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/talones/select.php";
?>
<div class="container-fluid">
    <?php
        include "../import/componentes/nav1.php";
    ?>
    <style>
        .card {
            height: 800px !important;
        }

        div.cardScroll {
            width: 1200px;
            height: 700px;
            overflow: auto;
        }
    </style>
    <div class="row">
        <!- - Area Chart -->
            <div class="col-12">

                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <?php
                                    include "../import/componentes/hojaDeViaje/nav.php";
                                ?>
                    <!-- Card Body -->
                    <div class="card-body">
                        
                        
                        <div class="chart-area ">
                        <div class="row">
                                <div class="form-group col-12">
                                    <h5>Seleccione el estado de Hoja de viaje para visualizarlo:</h5>
                                    <select class="form-control col-md-4" id="verVistaEstadoDeHDV">
                                    <?php
                                        /*
                                            $consultaSqlEstadoTalon=muestraTalonEstado($con);
                                                while ($r=$consultaSqlEstadoTalon->fetch_array()) 
                                                    {
                                            ?>
                                            <option value="<?php echo $r['hojaDeViajeEstadoId'];?>">
                                                <?php echo $r["hojaDeViajeEstadoNombre"];?></option>
                                            <?php } 
                                            */
                                            ?>
                                        
                                    </select>
                                </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Folio</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Emisor</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Operador</th>
                                            <th scope="col">Origen</th>
                                            <th scope="col">Destino</th>
                                            <th scope="col">Remolque1</th>
                                            <th scope="col">N_placa1</th>
                                            <th scope="col">N_Economico1</th>
                                            <th scope="col">N_Talon1</th>
                                            <th scope="col">Remolque2</th>
                                            <th scope="col">N_placa2</th>
                                            <th scope="col">N_Economico2</th>
                                            <th scope="col">N_Talon2</th>
                                            <th scope="col">Carga</th>
                                            <th scope="col">Tipo de carga</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Resultado de carga</th>
                                            <th scope="col">Fecha de Edicion</th>
                                            <th scope="col">Fecha de Liberacion</th>
                                            <th scope="col">Fecha de Arribo</th>
                                            <th scope="col">Fecha de Carga</th>
                                            <th scope="col">Fecha de llegada de Descarga</th>
                                            <th scope="col">Fecha de Descarga</th>
                                            <th scope="col">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">Folio</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Emisor</th>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Operador</th>
                                            <th scope="col">Origen</th>
                                            <th scope="col">Destino</th>
                                            <th scope="col">Remolque1</th>
                                            <th scope="col">N_placa1</th>
                                            <th scope="col">N_Economico1</th>
                                            <th scope="col">N_Talon1</th>
                                            <th scope="col">Remolque2</th>
                                            <th scope="col">N_placa2</th>
                                            <th scope="col">N_Economico2</th>
                                            <th scope="col">N_Talon2</th>
                                            <th scope="col">Carga</th>
                                            <th scope="col">Tipo de carga</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Resultado de carga</th>
                                            <th scope="col">Fecha de Edicion</th>
                                            <th scope="col">Fecha de Liberacion</th>
                                            <th scope="col">Fecha de Arribo</th>
                                            <th scope="col">Fecha de Carga</th>
                                            <th scope="col">Fecha de llegada de Descarga</th>
                                            <th scope="col">Fecha de Descarga</th>
                                            <th scope="col">Opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="cardScroll text-center">
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>
</div>

<?php
    
    include "../import/componentes/footer.php";
    //include "../import/componentes/modal/talon.php";
    include "../import/componentes/modal/modalIndex.php";
    include "../import/componentes/js/main.php";
?>