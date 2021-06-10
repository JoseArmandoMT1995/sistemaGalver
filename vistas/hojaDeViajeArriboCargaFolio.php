<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
?>
<?php
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/selects.php";
?>
<div class="container-fluid">
    <?php
        //include "../import/componentes/nav1.php";
    ?>
    <style>
        .card_hdv {
            height: 600px !important;
        }
    </style>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-12">
            <style>

            </style>
            <div class="card shadow mb-4 card_hdv">
                <!-- Card Header - Dropdown -->
                <?php
                        //include "../import/componentes/hojaDeViaje/nav.php";
                    ?>
                <!-- Card Body -->
                <div class="card-body">

                    <div class="row">
                        <div class="col form-group">
                            <label for=""><b>FECHA DE ARRIBO:</b></label>
                            <div class="form-row">
                                <div class="col ">
                                    <label for="">FECHA:</label>
                                    <input type="date" class="form-control" id="fd_Arribo" required>
                                </div>
                                <div class="col ">
                                    <label for="">HORA:</label>
                                    <input type="time" class="form-control" id="ft_Arribo" required>
                                </div>
                            </div>
                        </div>
                        <div class="col form-group">
                            <label for=""><b>FECHA DE CARGA:</b></label>
                            <div class="form-row">
                                <div class="col ">
                                    <label for="">FECHA:</label>
                                    <input type="date" class="form-control" id="fd_Carga" required>
                                </div>
                                <div class="col ">
                                    <label for="">HORA:</label>
                                    <input type="time" class="form-control" id="ft_Carga" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> <b>DESTINO DE VIAJE:</b> </label>
                        <textarea class="form-control" id="destino" rows="3"></textarea>
                    </div>
                    <hr>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                FOLIO AUTOMATICO :
                                <input type="radio" aria-label="Radio button for following text input" name="radio"
                                    id="folioAutomatico">
                            </div>
                        </div>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                FOLIO MANUAL :
                                <input type="radio" aria-label="Radio button for following text input" name="radio"
                                    id="folioManual" checked>
                            </div>
                        </div>
                        <input id="folio" type="text" class="form-control input-number"
                            aria-label="Text input with radio button" placeholder="Ingrese el folio manualmente.">
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-primary btn-lg btn-block modificar">
                                MODIFICAR ESTADO DE REGISTRO
                            </button>
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
    <script>
        /* 
            folio
            destino
            fd_Arribo
            ft_Arribo
            fd_Carga
            ft_Carga
            */
        $(".modificar").click(function () {
            var data=
            {
                'id': <?php echo $_GET['id']; ?> ,
                'caso' : 1,
                "data":
                {
                    "arribo":obtenerfecha($("#fd_Arribo").val(),$("#ft_Arribo").val()),
                    "carga":obtenerfecha($("#fd_Carga").val(),$("#ft_Carga").val()),
                    "destino":$("#destino").val(),
                    "folio":$("#folio").val(),
                    "fechaActual":fechaActual()
                }
            };
            if (checarCamposVacios(data) === false) {
                alert("porfavor ingrese los datos correspondientemente");
            } else {
                $.ajax(
                {
                    type: "POST",
                    url: "../controlador/modulos/hojaDeViaje/hojaDeViajeArriboCargaFolio.php",
                    data: data,
                    success: function (res) 
                    {
                        if (data["caso"] === 1) 
                        {
                            //$(data["inputDestino"]).val(res);
                        } 
                        else 
                        {
                            alert("ha ocurrido un error en la conexion!.");
                        }
                    }
                });
            }
        });
        function checarCamposVacios(data){
            if 
            (
                data["data"]["arribo"]===null || 
                data["data"]["carga"]===null || 
                data["data"]["destino"]==="" || 
                data["data"]["folio"]===""
            ) 
            {
                return false;
            } 
            else 
            {
                return true;
            }
        }
        function obtenerfecha(fd,ft){
            if (fd !=="" && ft !=="") {
                return fd+" "+ft;
            }
            if (fd ==="" || ft ==="") {
                return null;
            }
        }
        $("#folioAutomatico").change(function () {
            var data = {
                'id': <?php echo $_GET['id']; ?> ,
                'caso' : 3,
                'inputDestino': "#folio"
            };
            ajax_ACF_folioAutomatico(data);
        });
        $("#folioManual").change(function () {
            $("#folio").val("");
        });

        function ajax_ACF_folioAutomatico(data) {
            $.ajax({
                type: "POST",
                url: "../controlador/modulos/hojaDeViaje/hojaDeViajeArriboCargaFolio.php",
                data: data,
                success: function (res) {
                    if (data["caso"] === 3) {
                        $(data["inputDestino"]).val(res);
                    } else {
                        alert("sin casos encontrados");
                    }
                }
            });
        }
        $('.input-number').on('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
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