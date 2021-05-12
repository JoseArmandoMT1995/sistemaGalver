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
                                    include "../import/componentes/talon/nav.php";
                                ?>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area ">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>

                                        <tr>
                                            <th scope="col">Folio</th>
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
                                            <th scope="col">Estado</th>
                                            <th scope="col">Editar</th>
                                            <th scope="col">Eliminar</th>
                                            <th scope="col">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">Folio</th>
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
                                            <th scope="col">Estado</th>
                                            <th scope="col">Editar</th>
                                            <th scope="col">Eliminar</th>
                                            <th scope="col">Opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody class="cardScroll">
                                        <?php 
                                        $consulta=muestraHojasDeViaje($con);
                                        while ($r=$consulta->fetch_array()) 
                                        {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $r["hojaDeViajeID"];?></th>
                                            <td><?php echo $r["empresaEmisoraNombre"];?></td>
                                            <td><?php echo $r["empresaReceptoraNombre"];?></td>
                                            <td><?php echo $r["operadorNombre"];?></td>
                                            <td><?php echo $r["hojaDeViajeOrigen"];?></td>
                                            </td>
                                            <td><?php echo $r["hojaDeViajeOrigenDeDestino"];?></td>
                                            </td>
                                            <td><?php echo $r["hojaDeViajeRemolque1"];?></td>
                                            <td><?php echo $r["hojaDeViajePlaca1"];?></td>
                                            <td><?php echo $r["hojaDeViajeEconomico1"];?></td>
                                            <td><?php echo $r["hojaDeViajeTalon1"];?></td>
                                            <td><?php echo $r["hojaDeViajeRemolque2"];?></td>
                                            <td><?php echo $r["hojaDeViajePlaca2"];?></td>
                                            <td><?php echo $r["hojaDeViajeEconomico2"];?></td>
                                            <td><?php echo $r["hojaDeViajeTalon2"];?></td>
                                            <td><?php echo $r["cargaNombre"];?></td>
                                            <td><?php echo $r["cargaTipoNombre"];?></td>
                                            <td><?php echo $r["hojaDeViajeCargaCantidad"];?></td>
                                            <td><?php echo resutadoCarga($r)?></td>
                                            <td><?php echo $r["hojaDeViajeFechaDeEdicion"];?></td>
                                            <td><?php echo $r["hojaDeViajeFechaLiberacion"];?></td>
                                            <td><?php echo $r["hojaDeViajeFechaArribo"];?></td>
                                            <td><?php echo $r["hojaDeViajeFechaCarga"];?></td>
                                            <td><?php echo $r["hojaDeViajeFechaLlegadaDeDescarga"];?></td>
                                            <td><?php echo $r["hojaDeViajeFechaDescarga"];?></td>
                                            <td><?php echo $r["hojaDeViajeEstadoNombre"];?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning"><a
                                                        href="talonEditar.php?hojaDeViajeID=<?php echo $r['hojaDeViajeID'];?>"><i
                                                            class="fas fa-edit"></i></a></button>
                                            </td>
                                            <td>
                                            
                                            <a
                                                href="../controlador/modulos/talones/eliminarTalon.php?hojaDeViajeID=<?php echo $r['hojaDeViajeID'];?>"><button
                                                    type="button" class="btn btn-danger"><i
                                                        class="fas fa-trash"></i></button></a>
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#opcionesDeHojaDeViaje">
                                                    <button type="button" class="btn btn-secondary" onclick="opcionesDeHojaDeViaje(<?php echo $r['hojaDeViajeID'];?>)"><i class="fas fa-cogs"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php 
                                        }
                                        function resutadoCarga($array){
                                            $resultado=0;
                                            switch ($array["operacion"]) {
                                                case 1:
                                                    $resultado= (floatval($array["hojaDeViajeCargaCantidad"]) + floatval($array["valor"]));
                                                    break;
                                                case 2:
                                                    $resultado= (floatval($array["hojaDeViajeCargaCantidad"]) - floatval($array["valor"]));
                                                    break;
                                                case 3:
                                                    $resultado= (floatval($array["hojaDeViajeCargaCantidad"]) * floatval($array["valor"]));
                                                    break;
                                                case 4:
                                                    $resultado= (floatval($array["hojaDeViajeCargaCantidad"]) / floatval($array["valor"]));
                                                    break;
                                                default:
                                                    break;
                                            }
                                            return $resultado." kilogramos";
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
    include "../import/componentes/modal/talon.php";
    include "../import/componentes/modal/modalIndex.php";
    include "../import/componentes/js/main.php";
?>