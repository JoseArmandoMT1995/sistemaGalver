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
                <style>
                    .card {
                    height: 700px !important;
                }
                </style>
                <div class="card-body">
                    <div class="chart-area">
                        <form method="POST" id="formulario">
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Nombre de la Empresa"
                                        name="empresaNombre" id="empresaNombre">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="RFC" name="empresaRFC" id="empresaRFC">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Telefono Fijo 1"
                                        name="empresaTelefonoFijo1" id="empresaTelefonoFijo1">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Telefono Celular 1" name="empresaTelefonoCelular1" id="empresaTelefonoCelular1">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Telefono Fijo 2"
                                        name="empresaTelefonoFijo2" id="empresaTelefonoFijo2">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Telefono Celular 2" name="empresaTelefonoCelular2" id="empresaTelefonoCelular2">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <input type="email" class="form-control" placeholder="Correo"
                                        name="empresaCorreo" id="empresaCorreo">
                                </div>
                            </div>
                            <div class="form-group  mt-3">
                                <label for="exampleInputEmail1">Descripcion de la empresa</label>
                                    <textarea 
                                    class="form-control" 
                                    id="exampleFormControlTextarea1" 
                                    rows="3"
                                    name="empresaDescripcion"
                                    id="empresaDescripcion"
                                    >
                                    </textarea> <small id="emailHelp"
                                    class="form-text text-muted">We'll never
                                    share your email with
                                    anyone else.</small>
                            </div>
                            <div class="form-group  mt-3">
                                <label for="exampleInputEmail1">Direccion</label>
                                    <textarea 
                                    class="form-control" 
                                    id="exampleFormControlTextarea1" 
                                    rows="3"
                                    name="empresaDireccion"
                                    id="empresaDireccion"
                                    >
                                    </textarea> <small id="emailHelp"
                                    class="form-text text-muted">We'll never
                                    share your email with
                                    anyone else.</small>
                            </div>
                            <button type="button" class="btn btn-secondary btn-lg btn-block" id="btn-ingresar" onclick="Hola()">Editar</button>
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
    function Hola(nombre,mensaje) {
    var empresaId = '<?php echo $_GET["idCli"];?>';
     var parametros = 
        {
            "empresaId":empresaId,
            "empresaNombre":$('#empresaNombre').val(),
            "empresaRFC":$('#empresaRFC').val(),
            "empresaTelefonoFijo1":$('#empresaTelefonoFijo1').val(),
            "empresaTelefonoCelular1":$('#empresaTelefonoCelular1').val(),
            "empresaTelefonoFijo2":$('#empresaTelefonoFijo2').val(),
            "empresaTelefonoCelular2":$('#empresaTelefonoCelular2').val(),
            "empresaCorreo":$('#empresaCorreo').val(),
            "empresaDescripcion":$('#empresaDescripcion').val(),
            "empresaDireccion":$('#empresaDireccion').val()
        };
        $.ajax({
            data:parametros,
            url:'../controlador/modulos/clientes/clienteEditar.php',
            type: 'post',
            beforeSend: function () {
                alert("Procesando, espere por favor");
            },
            success: function (response) {   
                
                alert("dddd");
            }
        });
    }  
</script>


