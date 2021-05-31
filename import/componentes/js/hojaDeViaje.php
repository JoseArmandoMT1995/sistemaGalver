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
            var addViaje=false;
            arranqueFormulario();
            $(".agregarRemolque2").click(function () {
                $('#viaje2').show();
                $('.agregarRemolque2').hide();
                $('.eliminarRemolque2').show();
                $("#hojaDeViajeOrigen2").val("");
                $("#remolquePlaca2").val("");
                $("#hojaDeViajeTalon2A").val("");
                $("#hojaDeViajeTalon2B").val("");
                addViaje= true;
            });
            $(".eliminarRemolque2").click(function () {
                arranqueFormulario();
                addViaje= false;
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
                //age= 20;
                //var url = age > 18 ? "continue.html" : "stop.html";

                //console.log(url);
                //var operadorId= $("#operadorId").val()=== "0" ? "NULL":$("#operadorId").val();
                //console.log(operadorId);
            }
        </script>

        </html>