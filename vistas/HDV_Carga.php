<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/selects.php";
?>
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <?php $ids=idsViaje($_GET['id'],$mysqli);?>
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-people-carry"></i> PROCESO DE CARGA</h6>
            <h6 class="m-0 font-weight-bold text-primary">ID_VIAJE[ <?php echo $ids["id_hojaDeViaje"];?> ] |
                ID_VIAJE_REMOLQUE[ <?php echo $ids["id_viaje"];?> ] | TALON[ <?php echo $ids["talones"];?> ].</h6>
            <h6></h6>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="">Folio de carga</label>
                    <input type="text" class="form-control" id="folio_carga" placeholder="ingresar folio">
                    <small id="" class="form-text text-muted folio_carga"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Folio de bascula</label>
                    <input type="text" class="form-control" id="folio_bascula" placeholder="ingresar folio">
                    <small id="" class="form-text text-muted folio_bascula"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Sellos</label>
                    <input type="text" class="form-control" id="sellos" placeholder="ingresar sello o sellos">
                    <small id="" class="form-text text-muted sellos"></small>
                </div>
                <div class="form-group">
                    <label for="">Observacion de Carga</label>
                    <textarea class="form-control" id="observacion_carga" rows="4"></textarea>
                </div>
                <button type="button" class="btn btn-secondary btn-lg btn-block"
                    onclick="subirCarga (<?php echo $_GET['id'];?>)">Carga</button>
            </form>
        </div>
    </div>
    <script>
        function subirCarga(id) {
            var folioCarga = $("#folio_carga").val();
            var folioBascula = $("#folio_bascula").val();
            var sellos = $("#sellos").val();
            var obserBaciones = $("#observacion_carga").val();
            if (folioCarga !== "" && folioBascula !== "" && sellos !== "") {
                console.log(id);
                var data = {
                    "id_viaje": id,
                    "viaje_folioDeCarga": folioCarga,
                    "viaje_folioDeBascula": folioCarga,
                    "viaje_sellos": sellos,
                    "viaje_observacion_carga": obserBaciones
                };
                var url = "../controlador/modulos/hojaDeViaje/carga/carga.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        'caso': 1,
                        'data': data
                    },
                    success: function (res) {
                        res = JSON.parse(res);
                        console.log(res);

                        if (res.caso === "true" || res.caso === true) {
                            bacearCamposModal();
                            $('.carga').modal('hide');
                            alert("Se ha generado nueva carga");
                            window.location = "./HDV_descarga.php?id=" + id;
                        } else {
                            var mensaje = "<p class='text-danger'>ingrese la informacion del campo ";
                            if (res.folioBascula !== true) {
                                $(".folio_bascula").html(mensaje + "Folio</p>")
                            }
                            if (res.folioCarga !== true) {
                                $(".folio_carga").html(mensaje + "Folio</p>")
                            }
                        }

                    }
                });
            } else {
                var mensaje = "<p class='text-danger'>ingrese la informacion del campo ";
                if (folioCarga === "") {
                    $(".folio_carga").html(mensaje + "Folio</p>")
                }
                if (folioCarga !== "") {
                    $(".folio_carga").html("")
                }
                if (folioBascula === "") {
                    $(".folio_bascula").html(mensaje + "Folio</p>")
                }
                if (folioBascula !== "") {
                    $(".folio_bascula").html("")
                }
                if (sellos === "") {
                    $(".sellos").html(mensaje + "Sellos</p>")
                }
                if (sellos !== "") {
                    $(".sellos").html("")
                }
            }
        }

        function bacearCamposModal() {
            $(".folio_carga").html("");
            $("#folio_carga").val("");
            $(".folio_bascula").html("");
            $("#folio_bascula").val("");
            $(".sellos").html("");
            $("#sellos").val("");
            $("#observacion_carga").val("");
        }
    </script>
    <?php
    include "../import/componentes/footer.php";
    include "../import/componentes/modal/modalIndex.php";
    include "../import/componentes/js/main.php";
?>