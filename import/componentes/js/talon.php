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
    <script src="../assets/js/bootstrap-select.js"></script>
    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>
    <script src="../assets/js/operaciones.js"></script>
    <script>
        $("#cv").keydown(function (event) {
            var cu = Number(document.getElementById("cu").value);
            var cv = Number(document.getElementById("cv").value);
            document.getElementById("resultado").value = talonCantidad(cu, cv);
        });
        $('#cu').on('change', function (e) {
            document.getElementById("cv").value = 0;
            document.getElementById("resultado").innerHTML = "";
        });

        function limitDecimalPlaces(e, count) {
            if (e.target.value.indexOf('.') == -1) {
                //console.log("no encontro .");
                return;
            }
            if ((e.target.value.length - e.target.value.indexOf('.')) > count) {
                //console.log("Si encontro .!");
                e.target.value = parseFloat(e.target.value).toFixed(count);
            }
        }

        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>


    </body>

    </html>