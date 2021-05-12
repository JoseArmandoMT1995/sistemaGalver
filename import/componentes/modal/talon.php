    <!-- Logout Modal-->
    <style>
        .navbar-light .navbar-nav .nav-link {
            color: rgba(247, 247, 247, 0.9) !important;
        }

        .navbar-light .navbar-nav .nav-link:hover {
            color: rgb(255, 217, 0) !important;
        }
    </style>
    <div class="modal fade" id="opcionesDeHojaDeViaje" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex flex-row-reverse">

                    <nav class="navbar navbar-expand-lg navbar-light ">

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" onclick="seccionOpcionesBasicasModal()">Opciones de
                                        Registro<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" onclick="seccionHistorialDeHDV()">Historial de ediciones</a>
                                </li>

                                <li class="nav-item">
                                    <a data-dismiss="modal" class="nav-link" href="#">Cancelar <span
                                            class="sr-only">(current)</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <!--
                    <h5 class="modal-title" id="ModalLabel">Opciones de Hoja de viaje</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    -->
                </div>
                <div class="modal-body">
                    <h1>folio de registro: <b class="folioModal"></b> </h1>
                    <hr>
                    <div class="container">
                        
                        <div class="row " id="seccionOpcionesBasicasModal">

                            <div class="d-flex justify-content-center">
                                <div class="col">
                                    <button type="button" class="btn btn-warning"><a
                                            href="talonEditar.php?hojaDeViajeID=?>">Editar Registro <i
                                                class="fas fa-edit"></i></a></button>
                                </div>
                                <div class="col">
                                    <a href="../controlador/modulos/talones/eliminarTalon.php?hojaDeViajeID=?"><button
                                            type="button" class="btn btn-danger">Eliminar Registro <i
                                                class="fas fa-trash"></i></button></a>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Estado</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01">
                                            <?php
                                            $consultaSqlEstadoTalon=muestraTalonEstado($con);
                                                while ($r=$consultaSqlEstadoTalon->fetch_array()) 
                                                    {
                                            ?>
                                            <option value="<?php echo $r['hojaDeViajeEstadoId'];?>">
                                                <?php echo $r["hojaDeViajeEstadoNombre"];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row" id="seccionHistorialDeHDV">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Folio</th>
                                        
                                        <th scope="col">Fecha de modificacion</th>
                                        <th scope="col">Usuario que modifico el registro</th>
                                        <th scope="col">Fecha de creacion</th>
                                        <th scope="col">Usuario que creao el registro</th>
                                        
                                        
                                        <th scope="col">Ver edicion</th>
                                        <th scope="col">Establecer como ultima edicion</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaModalHDV">
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>2021-04-10 11:15:00</td>
                                        <td>Otto</td>
                                        <td>2021-04-10 11:15:00</td>
                                        <td>Mark</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-secondary"><i class="fas fa-eye"></i></button>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-success"><i class="fas fa-exchange-alt"></i></button>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <!--
                    <a class="btn btn-primary" id="salirSistema" href="../controlador/login/salir.php">Salir</a>
                    -->

                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("seccionOpcionesBasicasModal").style.display = "block";
        document.getElementById("seccionHistorialDeHDV").style.display = "none";

        function seccionOpcionesBasicasModal() {
            document.getElementById("seccionOpcionesBasicasModal").style.display = "block";
            document.getElementById("seccionHistorialDeHDV").style.display = "none";
        }

        function seccionHistorialDeHDV() {
            document.getElementById("seccionOpcionesBasicasModal").style.display = "none";
            document.getElementById("seccionHistorialDeHDV").style.display = "block";
        }
        function opcionesDeHojaDeViaje(folioHojaDeViaje){
            //<span id="folioModal"></span>
            alert(folioHojaDeViaje);
            $(".folioModal").html("<span id='folioModal' data-folioHojaDeViaje='"+folioHojaDeViaje+"'>"+folioHojaDeViaje+"</span>");
            /* 
                SELECT hoja_de_viaje_edicion.hojaDeViajeFechaLiberacion, hoja_de_viaje_edicion.hojaDeViajeEdicionUsuarioEdicion, hoja_de_viaje_edicion.hojaDeViajeFechaDeEdicion, hoja_de_viaje_edicion.creadorId FROM hoja_de_viaje_edicion WHERE hoja_de_viaje_edicion.hojaDeViajeID = 14 
            */
        }
    </script>