        <!-- Bootstrap core JavaScript-->
        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="../assets/js/sb-admin-2.min.js"></script>
        <!-- Page level plugins -->
        <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="../assets/js/demo/datatables-demo.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.js"></script>
        <!--<script src="../assets/js/import/talon/main.js"></script>-->
        <script src="../assets/js/import/hojaDeViaje/main.js"></script>
        </body>
        <script>
            var addViaje = false;

            arranqueFormulario();
            $(".agregarRemolque2").click(function () {
                $('#viaje2').show();
                $('.agregarRemolque2').hide();
                $('.eliminarRemolque2').show();
                $("#hojaDeViajeOrigen2").val("");
                $("#remolquePlaca2").val("");
                $("#hojaDeViajeTalon2A").val("");
                $("#hojaDeViajeTalon2B").val("");
                addViaje = true;
            });
            $(".eliminarRemolque2").click(function () {
                arranqueFormulario();
                addViaje = false;
            });
            //operaciones de multiplicacion 
            $(".res1").click(function () {
                var cantidad = Number($("#hojaDeViajeCargaCantidad1").val());
                var proporcion = Number($("#hojaDeViajeUnidadDeMedidaProporcional1").val());
                $("#res1").val(cantidad * proporcion);
            });
            $(".res2").click(function () {
                var cantidad = Number($("#hojaDeViajeCargaCantidad2").val());
                var proporcion = Number($("#hojaDeViajeUnidadDeMedidaProporcional2").val());
                $("#res2").val(cantidad * proporcion);
            });

            function arranqueFormulario() {
                $("#empresaEmisoraId2").val("0");
                $("#empresaReceptoraId2").val("0");
                $("#hojaDeViajeOrigen2").val("null");
                $("#remolqueCargaId2").val("0");
                $("#hojaDeViajeRemolqueEconomico2").val("0");
                $("#remolquePlaca2").val("null");
                $("#hojaDeViajeTalon2A").val("null");
                $("#hojaDeViajeTalon2B").val("null");
                $("#cargaId2").val("0");
                $("#hojaDeViajeCargaCantidad2").val(0);
                $("#cargaUnidadDeMedidaID2").val("0");
                $("#hojaDeViajeUnidadDeMedidaProporcional2").val(0);
                $('#viaje2').hide();
                $('.agregarRemolque2').show();
                $('.eliminarRemolque2').hide();
            }
            //agregarHojaDeViaje
            $(".agregarHojaDeViaje").click(
                function () {
                    var formularioTalonValidacion = false;

                    if (
                        $("#hojaDeViajeTalon1A").val() !== $("#hojaDeViajeTalon2A").val() ||
                        $("#hojaDeViajeTalon1A").val() !== $("#hojaDeViajeTalon2B").val() ||
                        $("#hojaDeViajeTalon1B").val() !== $("#hojaDeViajeTalon2A").val() ||
                        $("#hojaDeViajeTalon1B").val() !== $("#hojaDeViajeTalon2B").val()
                    ) {
                        obtenerEInsertar();
                    } else {
                        Swal.fire(
                            'Error!',
                            'talones similares :(',
                            'error'
                        );
                    }
                }
            );

            function obtenerEInsertar() {
                if (
                    $("#id_operador").val() === "0" || $("#id_tractor").val() === "0" ||
                    $("#empresaEmisoraId1").val() === "0" || $("#empresaReceptoraId1").val() === "0" ||
                    $("#remolqueCargaId1").val() === "0" || $("#hojaDeViajeRemolqueEconomico1").val() === "0" ||
                    $("#cargaId1").val() === "0" || $("#cargaUnidadDeMedidaID1").val() === "0"
                ) {
                    alert("faltan campos");
                } else {
                    alert("inicio de insercion");
                    var viajes;
                    var viaje_1 = {
                        
                        "id_viaje": "pendiente",
                        "id_hojaDeViaje": "pendiente",
                        "id_viajeEstado": 1,
                        "id_empresaEmisora": $("#empresaEmisoraId1").val(),
                        "id_empresaReceptora": $("#empresaReceptoraId1").val(),
                        "id_carga": $("#cargaId1").val(),
                        "id_unidadDeMedida": $("#cargaUnidadDeMedidaID1").val(),
                        "id_unidadDeMedida": $("#cargaUnidadDeMedidaID1").val(),
                        "viaje_fechaDeArribo": "0000:00:00 00:00:00",
                        "viaje_fechaDeCarga": "0000:00:00 00:00:00",
                        "viaje_fechaDeLlegadaDeDescarga": "0000:00:00 00:00:00",
                        "viaje_fechaDeDescarga": "0000:00:00 00:00:00",
                        "viaje_cargaCantidad": $("#hojaDeViajeCargaCantidad1").val(),
                        "viaje_cargaProporcionUM": $("#hojaDeViajeUnidadDeMedidaProporcional1").val(),
                        "viaje_origen":$("#hojaDeViajeOrigen1").val(),
                        "id_remolque": $("#hojaDeViajeRemolqueEconomico1").val(),
                        "id_remolqueServicio": $("#remolqueCargaId1").val(),
                        "viaje_talon1": $("#hojaDeViajeTalon1A").val(),
                        "viaje_talon2": $("#hojaDeViajeTalon1B").val(),
                    };
                    var viaje_2 = {
                        "id_viaje": "pendiente",
                        "id_hojaDeViaje": "pendiente",
                        "id_viajeEstado": 1,
                        "id_empresaEmisora": $("#empresaEmisoraId2").val(),
                        "id_empresaReceptora": $("#empresaReceptoraId2").val(),
                        "id_carga": $("#cargaId1").val(),
                        "id_unidadDeMedida": $("#cargaUnidadDeMedidaID2").val(),
                        "id_unidadDeMedida": $("#cargaUnidadDeMedidaID2").val(),
                        "viaje_fechaDeArribo": "0000:00:00 00:00:00",
                        "viaje_fechaDeCarga": "0000:00:00 00:00:00",
                        "viaje_fechaDeLlegadaDeDescarga": "0000:00:00 00:00:00",
                        "viaje_fechaDeDescarga": "0000:00:00 00:00:00",
                        "viaje_cargaCantidad": $("#hojaDeViajeCargaCantidad2").val(),
                        "viaje_cargaProporcionUM": $("#hojaDeViajeUnidadDeMedidaProporcional2").val(),
                        "viaje_origen":$("#hojaDeViajeOrigen2").val(),
                        "id_remolque": $("#hojaDeViajeRemolqueEconomico2").val(),
                        "id_remolqueServicio": $("#remolqueCargaId2").val(),
                        "viaje_talon1": $("#hojaDeViajeTalon2A").val(),
                        "viaje_talon2": $("#hojaDeViajeTalon2B").val(),
                    };
                    var tractor_del_operador = {
                        "id_tractor": $("#id_tractor").val(),
                        "id_operador": $("#id_operador").val(),
                        "id_hojaDeViaje": "pendiente",
                    };
                    if (addViaje === false) {
                        viajes = {
                            viaje_1,
                            viaje_2: {}
                        };
                    } else {
                        viajes = {
                            viaje_1,
                            viaje_2
                        };
                    }
                    var hoja_de_viaje = {
                        tractor_del_operador,
                        viajes,
                        "id_creador": "pendiente",
                        "id_editor": "pendiente",
                        "hojaDeViaje_fechaDeLiberacion": fechaActual(),
                        "hojaDeViaje_fechaDeEdicion": "0000:00:00 00:00:00",
                        "hojaDeViaje_observaciones": $("#hojaDeViajeComentario").val(),
                        "id_hojaDeViaje": "pendiente",

                    };
                    insertarHojaDeViaje(hoja_de_viaje);
                }
            }

            function insertarHojaDeViaje(hoja_de_viaje) {
                $.ajax({
                    type: "POST",
                    url: "../controlador/modulos/hojaDeViaje/hojaDeViajeRegistros.php",
                    data: hoja_de_viaje,
                    success: function (data) {
                        //data = JSON.parse(data);
                        switch (data) {
                            case "1":
                                Swal.fire(
                                    '1-Exito!',
                                    'se ha agregado registro a la hoja de viaje!.',
                                    'success'
                                );
                                location.href ="./hojaDeViaje.php";
                                break;

                            default:
                                Swal.fire(
                                    'Error!',
                                    'lo sentimos , ha ocurrido un error en la insercion!.',
                                    'error'
                                );
                                break;
                        }
                    }
                });
            }

            function fechaActual() {
                var dt = new Date();
                return (
                    `${dt.getFullYear().toString().padStart(4, '0')}:${(
                    dt.getMonth()+1).toString().padStart(2, '0')}:${
                    dt.getDate().toString().padStart(2, '0')} ${
                    dt.getHours().toString().padStart(2, '0')}:${
                    dt.getMinutes().toString().padStart(2, '0')}:${
                    dt.getSeconds().toString().padStart(2, '0')}`
                );
            }
        </script>

        </html>