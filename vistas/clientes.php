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
                    include "../import/componentes/clientes/nav.php";
                ?>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre de la Empresa</th>
                                        <th scope="col">RFC</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Direccion</th>
                                        <th scope="col">Fecha de Creacion</th>
                                        <th scope="col">Registro Generado por</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre de la Empresa</th>
                                        
                                        <th scope="col">RFC</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Direccion</th>
                                        <th scope="col">Fecha de Creacion</th>
                                        <th scope="col">Registro Generado por</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                    
                                    include "../controlador/modulos/clientes/clientesMostrar.php";
                                    $contador=0;
                                    while ($r=$consultaSql->fetch_array()) 
                                    {
                                        $contador=$contador+1;
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $contador?></th>
                                        <td><?php echo $r["empresaNombre"];?></td>
                                        
                                        <td><?php echo $r["empresaRFC"];?></td>
                                        <td><?php echo $r["empresaDescripcion"];?></td>
                                        <td><?php echo $r["empresaCorreo"];?></td>
                                        <td><?php echo $r["empresaDireccion"];?></td>
                                        <td><?php echo $r["empresaFechaDeCreacion"];?></td>
                                        
                                        <td><?php echo $r["sesionNombre"];?></td>

                                        
                                        <td>
                                            <a href="../controlador/modulos/clientes/clientesEliminar.php?empresaId=<?php echo $r['empresaId'];?>& empresaNombre=<?php echo $r['empresaNombre'];?>"><button type="button" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></button></a>
                                            
                                            <button type="button" class="btn btn-warning"><a
                                                    href="clientesEditar.html?idCli=1"><i
                                                        class="fas fa-edit"></i></a></button>
                                        </td>
                                    </tr>
                                <?php
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
    include "../import/componentes/modal/modalIndex.php";
    include "../import/componentes/js/main.php";
?>