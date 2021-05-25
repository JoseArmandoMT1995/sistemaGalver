<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
?>
<?php
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/talones/select.php";
    include "../controlador/modulos/hojaDeViaje/hojaDeViajeRegistros.php";
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
                                            <th scope="col">#</th>
                                            <th scope="col">NombreEmpresaEmisora</th>
                                            <th scope="col">NombreEmpresaReceptora</th>
                                            <th scope="col">OperadorNombre</th>
                                            <th scope="col">OperadorLicencia</th>
                                            <th scope="col">TractorEconomico</th>
                                            <th scope="col">TractorPlaca</th>
                                            <th scope="col">RemolqueEconomico1</th>
                                            <th scope="col">RemolquePlaca1</th>
                                            <th scope="col">RemolqueTalon1</th>
                                            <th scope="col">RemolqueServicio1</th>
                                            <th scope="col">RemolqueEconomico2</th>
                                            <th scope="col">RemolquePlaca2</th>
                                            <th scope="col">RemolqueTalon2</th>
                                            <th scope="col">RemolqueServicio2</th>
                                            <th scope="col">CargaNombre</th>
                                            <th scope="col">CargaCantidad</th>
                                            <th scope="col">CargaUnidad</th>
                                            <th scope="col">CargaProporcionUnidad</th>
                                            <th scope="col">Toneladas</th>
                                            <th scope="col">FechaLiberacion</th>
                                            <th scope="col">Destino</th>
                                            <th scope="col">Observacion</th>
                                            <th scope="col">CreadorDeRegistro</th>
                                            <th scope="col">EstadoDeRegistro</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th scope="col">#</th>
                                            <th scope="col">NombreEmpresaEmisora</th>
                                            <th scope="col">NombreEmpresaReceptora</th>
                                            <th scope="col">OperadorNombre</th>
                                            <th scope="col">OperadorLicencia</th>
                                            <th scope="col">TractorEconomico</th>
                                            <th scope="col">TractorPlaca</th>
                                            <th scope="col">RemolqueEconomico1</th>
                                            <th scope="col">RemolquePlaca1</th>
                                            <th scope="col">RemolqueTalon1</th>
                                            <th scope="col">RemolqueServicio1</th>
                                            <th scope="col">RemolqueEconomico2</th>
                                            <th scope="col">RemolquePlaca2</th>
                                            <th scope="col">RemolqueTalon2</th>
                                            <th scope="col">RemolqueServicio2</th>
                                            <th scope="col">CargaNombre</th>
                                            <th scope="col">CargaCantidad</th>
                                            <th scope="col">CargaUnidad</th>
                                            <th scope="col">CargaProporcionUnidad</th>
                                            <th scope="col">Toneladas</th>
                                            <th scope="col">FechaLiberacion</th>
                                            <th scope="col">Destino</th>
                                            <th scope="col">Observacion</th>
                                            <th scope="col">CreadorDeRegistro</th>
                                            <th scope="col">EstadoDeRegistro</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="cardScroll text-center">
                                        <?php
                                        $filas= registrosHojaDeViaje($mysqli);
                                        for ($i=0; $i < count(registrosHojaDeViaje($mysqli)) ; $i++) 
                                        { 
                                            echo 
                                            "<tr>".
                                            "<td>".$filas[$i]["hojaDeViajeID"]."</td>".
                                            "<td>".$filas[$i]["empresaEmisoraNombre"]."</td>".
                                            "<td>".$filas[$i]["empresaReceptoraNombre"]."</td>".
                                            "<td>".$filas[$i]["operadorNombre"]."</td>".
                                            "<td>".$filas[$i]["operadorLisencia"]."</td>".
                                            "<td>".$filas[$i]["tractorEconomico"]."</td>".
                                            "<td>".$filas[$i]["tractorPlaca"]."</td>".
                                            "<td>".$filas[$i]["remolqueEconomico1"]."</td>".
                                            "<td>".$filas[$i]["remolquePlaca1"]."</td>".
                                            "<td>".$filas[$i]["hojaDeViajeTalon1"]."</td>".
                                            "<td>".$filas[$i]["remolqueCargaServicio1"]."</td>".
                                            "<td>".$filas[$i]["remolqueEconomico2"]."</td>".
                                            "<td>".$filas[$i]["remolquePlaca2"]."</td>".
                                            "<td>".$filas[$i]["hojaDeViajeTalon2"]."</td>".
                                            "<td>".$filas[$i]["remolqueCargaServicio2"]."</td>".
                                            "<td>".$filas[$i]["cargaNombre"]."</td>".
                                            "<td>".$filas[$i]["hojaDeViajeCantidadCarga"]."</td>".
                                            "<td>".$filas[$i]["cargaUnidadDeMedidaNombre"]."</td>".
                                            "<td>".$filas[$i]["hojaDeViajeCantidadCargaProporcion"]."</td>".
                                            "<td>".$filas[$i]["hojaDeViajeToneladas"]."</td>".
                                            "<td>".$filas[$i]["hojaDeViajeFechaLiberacion"]."</td>".
                                            "<td>".$filas[$i]["hojaDeViajeOrigen"]."</td>".
                                            "<td>".$filas[$i]["hojaDeViajeComentario"]."</td>".
                                            "<td>".$filas[$i]["usuarioCreadorNombre"]."</td>".
                                            "<td>".$filas[$i]["hojaDeViajeEstadoNombre"]."</td>".
                                            "</tr>";
                                        }
                                        ?>
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