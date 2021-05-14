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
                </div>
                <div class="modal-body">
                    <div class="folioModal d-flex justify-content-center"></div>
                    <!--<h1>folio de registro: <b class="folioModal"></b> </h1>-->
                    <hr>
                    <div class="container">
                        <div class="row " id="seccionOpcionesBasicasModal">
                            <div class="d-flex justify-content-center">
                                <div class="col">
                                    <div id="boton_talonEditar">
                                    </div>
                                </div>
                                <div class="col">
                                    <div id="boton_eliminarTalon">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Estado</label>
                                        </div>
                                        <select class="custom-select" id="muestraTalonEstado">
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
                                    </tr>
                                </thead>
                                <tbody id="tablaModalHDV" class="text-center">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
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
        function opcionesDeHojaDeViaje(folioHojaDeViaje,hojaDeViajeEstadoId) {
            $(".folioModal").html("<h1 id='folioHDV' data-foliohdv='"+ folioHojaDeViaje +"'>folio de registro: <b>" +
                folioHojaDeViaje + "</b> </h1>");             
                $("#muestraTalonEstado").val(hojaDeViajeEstadoId);
                botonesModal(folioHojaDeViaje);
                ajaxObtenerEdicionesDeHDV(folioHojaDeViaje,1);
        }
        $('#muestraTalonEstado').on('change', function () {
            var data = {
                "hojaDeViajeID":$('#folioHDV').data("foliohdv"),
                "hojaDeViajeEstadoId":$('#muestraTalonEstado').val(),
                "fechaActual":obtenerFechaActualEstado()
            };
            console.log(data);
            ajaxObtenerEdicionesDeEstadoHDV(data);
        });
        function estadoPapelera(){
            var data = {
                "hojaDeViajeID":$('#folioHDV').data("foliohdv"),
                "hojaDeViajeEstadoId":5,
                "fechaActual":obtenerFechaActualEstado()
            };
            console.log(data);
            ajaxObtenerEdicionesDeEstadoHDV(data);
        }
        function obtenerFechaActualEstado() {
            var f = new Date();
            //obtener fecha datatime
            var year = f.getFullYear();
            var month=      dosDigitosFecha(Number(f.getMonth())+1);
            var day=        dosDigitosFecha(Number(f.getDate()));
            var hours=      dosDigitosFecha(Number(f.getHours()));
            var minutes=    dosDigitosFecha(Number(f.getMinutes()));
            return year + ":" + month + ":" + day + " " + hours + ":" + minutes + ":00.000000";
        }
        function dosDigitosFecha(dato){
            if (dato < 10) {
                dato = "0" + dato;
            }
            return dato;
        }
        function ajaxObtenerEdicionesDeEstadoHDV(array) {
            var url = "../controlador/modulos/talones/cambiarEstadoIdTalon.php";
            $.ajax({
                type: "POST",
                url: url,
                data: array, //capturo array     
                success: function (data) {
                    if (data===1 || data ==="1") {
                        alert("Se ha editado el estado de este registro!!");
                        location.href ="talon.php";
                    }else{
                        alert("No se ha editado el estado de este registro!!!");
                    }
                }
            });
        }
        function ajaxObtenerEdicionesDeHDV(id,caso) {
            var array = 
            {
                'hojaDeViajeID': id,
                'accionModal':caso
            }; //array que deseo enviar
            var url = "../controlador/modulos/talones/EdicionesModal.php";
            $.ajax({
                type: "POST",
                url: url,
                data: array, //capturo array     
                success: function (data) {
                    var datos = JSON.parse(data);
                    console.log(datos);
                    casosModalTabla(datos,caso);
                }
            });
        }
        function botonesModal(id)
        {
            var boton_talonEditar ='<button type="button" class="btn btn-warning"><a href="talonEditar.php?hojaDeViajeID='+id+'">Editar Registro <i class="fas fa-edit"></i></a></button>';
            $('#boton_talonEditar').html(boton_talonEditar);
            //id
            var boton_eliminarTalon ='<button type="button" onclick="estadoPapelera()" class="btn btn-danger">Papelera <i class="fas fa-trash"></i></button>';
            $('#boton_eliminarTalon').html(boton_eliminarTalon);
        }
        function casosModalTabla(data,caso){
            switch (caso) {
                case 1:
                    if (data.length===0) {
                        $('#tablaModalHDV').html("<tr><td colspan='7'><h2>No hay ediciones de este registro</h2></td></tr>"); 
                    }
                    else
                    {
                        var html ="";
                        for (let i = 0; i < data.length; i++) {
                            html+="<tr>";
                            html+="<th scope='row'>"+data[i].hojaDeViajeEdicionID+"</th>";
                            html+="<th scope='row'>"+data[i].hojaDeViajeFechaDeEdicion+"</th>";
                            html+="<th scope='row'>"+data[i].editorNombre+"</th>";
                            html+="<th scope='row'>"+data[i].hojaDeViajeFechaArribo+"</th>";
                            html+="<th scope='row'>"+data[i].creadorNombre+"</th>";
                            html+="<th scope='row'>";
                            html+='<a href="etalonEdicionesEditar.php?hojaDeViajeID='+data[i].hojaDeViajeEdicionID+'"><button type="button" class="btn btn-secondary"><i class="fas fa-eye"></i></button></a>';
                            html+="</th>";

                            html+="</tr>";                        
                        }                    
                        $('#tablaModalHDV').html(html);
                    }
                    break;   
                default:
                    alert("ningun caso");
                    break;
            }
        }
    </script>