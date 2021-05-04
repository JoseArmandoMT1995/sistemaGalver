<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
?>
<?php
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/clientes/clientesMostrar.php";
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
                <?php
                    //$query = $con->query($consultaBuscarParentesco);
                    $query = muestraCliente($con,$_GET["idCli"]);
                    $array=[];
                    $empresa_id;
                    while ($r=$query->fetch_array()) {
                        $empresa_id=$r["empresaId"];
                        $array=$r;
                        break;
                    }
                    if($empresa_id==null){
                        print "<script>alert(\"cliente no encontrado.\");window.location='../../../vistas/clientes.php';</script>";
                        //usuario incorrecto
                    }
                ?>
                <div class="card-body">
                    <div class="chart-area">
                        <form method="POST" id="formulario">
                            <div class="form-row">
                                <div class="form-group col-md-9">
                                    <label for="inputPassword4">Nombre de la Empresa</label>
                                    <input type="text" class="form-control" placeholder="Nombre de la Empresa"
                                        name="empresaNombre" id="empresaNombre"
                                        value="<?php print_r($array['empresaNombre'])?>">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">RFC</label>
                                    <input type="text" class="form-control" placeholder="RFC" name="empresaRFC"
                                        id="empresaRFC" value="<?php print_r($array['empresaRFC'])?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Telefono Fijo 1</label>
                                    <input type="text" class="form-control" placeholder="Telefono Fijo 1"
                                        name="empresaTelefonoFijo1" id="empresaTelefonoFijo1"
                                        value="<?php print_r($array['empresaTelefonoFijo1'])?>">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Telefono Celular 1</label>
                                    <input type="text" class="form-control" placeholder="Telefono Celular 1"
                                        name="empresaTelefonoCelular1" id="empresaTelefonoCelular1"
                                        value="<?php print_r($array['empresaTelefonoCelular1'])?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Telefono Fijo 2</label>
                                    <input type="text" class="form-control" placeholder="Telefono Fijo 2"
                                        name="empresaTelefonoFijo2" id="empresaTelefonoFijo2"
                                        value="<?php print_r($array['empresaTelefonoFijo2'])?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Telefono Celular 2</label>
                                    <input type="text" class="form-control" placeholder="Telefono Celular 2"
                                        name="empresaTelefonoCelular2" id="empresaTelefonoCelular2"
                                        value="<?php print_r($array['empresaTelefonoCelular2'])?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label for="inputPassword4">Email</label>
                                    <input type="email" class="form-control" placeholder="Correo" name="empresaCorreo"
                                        id="empresaCorreo" value="<?php print_r($array['empresaCorreo'])?>">
                                </div>
                            </div>

                            <div class="form-group  mt-3">
                                <label for="exampleInputEmail1">Descripcion de la empresa</label>
                                <textarea class="form-control" rows="3" name="empresaDescripcion"
                                    id="empresaDescripcion"><?php print_r($array['empresaDescripcion'])?>
                                    </textarea> <small id="emailHelp" class="form-text text-muted">We'll never
                                    share your email with
                                    anyone else.</small>
                            </div>
                            <div class="form-group  mt-3">
                                <label for="exampleInputEmail1">Direccion</label>
                                <textarea class="form-control" rows="3" name="empresaDireccion" id="empresaDireccion"><?php print_r($array['empresaDireccion'])?>
                                </textarea> <small id="emailHelp" class="form-text text-muted">We'll never
                                    share your email with
                                    anyone else.</small>
                            </div>
                            <button type="button" class="btn btn-secondary btn-lg btn-block" id="btn-ingresar"
                                onclick="Hola()">Editar</button>
                        </form>
                    </div>


                </div>
                <div id="resp"></div>
            </div>
        </div>
    </div>
</div>

<?php
    include "../import/componentes/footer.php";
    include "../import/componentes/modal/modalIndex.php";
    include "../import/componentes/js/main.php";
?>

<script>
    function Hola(nombre, mensaje) {
        var empresaId = '<?php echo $_GET["idCli"];?>';
        var parametros = {
            "empresaId": empresaId,
            "empresaNombre": $('#empresaNombre').val(),
            "empresaRFC": $('#empresaRFC').val(),
            "empresaTelefonoFijo1": $('#empresaTelefonoFijo1').val(),
            "empresaTelefonoCelular1": $('#empresaTelefonoCelular1').val(),
            "empresaTelefonoFijo2": $('#empresaTelefonoFijo2').val(),
            "empresaTelefonoCelular2": $('#empresaTelefonoCelular2').val(),
            "empresaCorreo": $('#empresaCorreo').val(),
            "empresaDescripcion": $('#empresaDescripcion').val(),
            "empresaDireccion": $('#empresaDireccion').val()
        };
        //console.log(parametros);
        $.ajax({
            data: parametros,
            url: '../controlador/modulos/clientes/clienteEditar.php',
            type: 'post',
            beforeSend: function () {
                alert("Procesando, espere por favor");
            },
            success: function (data) {
                data = JSON.parse(data);
                /*
                Swal.fire({
                    type: data['mensajeTipo'],
                    title: data['mensajeSubtitulo'],
                    text: data['mensajeSubtitulo']
                });
                */
                alert(data['mensajeSubtitulo']);
                window.location='./clientes.php';
            }
        });
    }

    function tiempo() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    }
</script>