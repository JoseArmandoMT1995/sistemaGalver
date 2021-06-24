<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/selects.php";
?>
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-sm-8">
            <div class="card">

                <div class="card-header d-flex justify-content-between">
                    FECHAS
                    <button type="button" class="btn btn-info buscarFechaYHora">
                        <i class="fas fa-question"></i>
                        <i class="fas fa-clock"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col form-group">
                            <label for=""><b>ARRIBO</b></label>
                            <div class="form-row">
                                <div class="col ">
                                    <label for="">FECHA:</label>
                                    <input type="date" class="form-control" id="fd_Arribo" disabled>
                                </div>
                                <div class="col ">
                                    <label for="">HORA:</label>
                                    <input type="time" class="form-control" id="ft_Arribo" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col form-group">
                            <label for=""><b>CARGA</b></label>
                            <div class="form-row">
                                <div class="col ">
                                    <label for="">FECHA:</label>
                                    <input type="date" class="form-control" id="fd_Carga" disabled>
                                </div>
                                <div class="col ">
                                    <label for="">HORA:</label>
                                    <input type="time" class="form-control" id="ft_Carga" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card ">
                <div class="card-header">
                    DESTIONO
                </div>
                <div class="card-body">
                    <select class="custom-select" id="destino_id">
                        <option selected value="0">SELECIONE UNA OPCION</option>
                        <?php
                        $hdv=muestraDestinos($mysqli);
                        while ($filas =$hdv->fetch_assoc()) 
                        {
                        ?>
                            <option value="<?php echo $filas["destino_id"]?>">
                                <?php echo $filas["destino_id"]?>-<?php echo $filas["destino_nombre"]?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    SELLOS
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fas fa-plus"></i>
                        <i class="fas fa-stamp"></i>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">OBSERVACION DE SELLADO</th>
                                    <th scope="col">ELIMINAR</th>
                                    <th scope="col">EDITAR</th>

                                </tr>
                            </thead>
                            <tbody id="tablaDeSellos">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    FOLIOS
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="">CARGA</label>
                            <input type="text" class="form-control" id="viaje_folioDeCarga"
                                aria-describedby="emailHelp" placeholder="ingrese el folio de carga">
                        </div>
                        <div class="form-group">
                            <label for="">BASCULA</label>
                            <input type="text" class="form-control" id="viaje_folioDeBascula"
                                placeholder="ingrese el folio de bascula">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    OBSERVACIONES DE CARGA
                </div>
                <div class="card-body">
                <textarea class="form-control" aria-label="With textarea" id="carga_observacion"></textarea>
                </div>
            </div>
        </div>

    </div>
    <button type="button" class="btn btn-warning btn-lg btn-block subir_cambios">Subir cambios</button>
    <!--modal-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Sello</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Observacion de sellado</span>
                        </div>
                        <textarea class="form-control" aria-label="With textarea" id="sello_observacion"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success agregar_sello"><i class="fas fa-check"></i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var sellos = [];
        fechaActualizada();
        function agregarFilasSellos() {
            var text = "";
            for (let i = 0; i < sellos.length; i++) {
                text += "<tr>";
                text += "<td>";
                text += i + 1;
                text += "</td>";
                text += "<td>";
                text += sellos[i].sello_observacion;
                text += "</td>";
                text += "<td>";
                text += '<button type="button" class="btn btn-danger" onclick="eliminarSello(' + i +
                    ')"><i class="fas fa-times"></i></button>';
                text += "</td>";
                text += "<td>";
                text += '<button type="button" class="btn btn-warning" onclick="eliminarSelloPanel(' + i +
                    ')"><i class="fas fa-edit"></i></button>';
                text += "</td>";
                text += "</tr>";
            }
            $("#tablaDeSellos").html(text);
        }

        function eliminarSello(id) {
            var selloEliminado = [];
            for (let i = 0; i < sellos.length; i++) {
                if (id !== i) {
                    selloEliminado.push({
                        'sello_observacion': sellos[i].sello_observacion
                    });
                }
            }
            sellos = selloEliminado;
            agregarFilasSellos();
        }
        //eliminarSelloPanel
        function eliminarSelloPanel(id) {
            var titulo = "Editar Sello";
            var botones =
                '<button type="button" class="btn btn-success" onclick="editar_sello(' + id +
                ')"><i class="fas fa-edit"></i></button>' +
                '<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>';
            $("#exampleModalLongTitle").html(titulo);
            $(".modal-footer").html(botones);
            $("#sello_observacion").val(sellos[id].sello_observacion);
            $('#exampleModalCenter').modal('show');
        }

        function editar_sello(id) {
            sellos[id].sello_observacion = $("#sello_observacion").val();
            agregarFilasSellos();
            $("#sello_observacion").val("");
            $('#exampleModalCenter').modal('hide');
        }
        // sellos[?].sello_observacion = ?;
        $(".agregar_sello").click(function () {
            sellos.push({
                'sello_observacion': $("#sello_observacion").val()
            });
            $("#sello_observacion").val("");
            $('#exampleModalCenter').modal('hide');
            agregarFilasSellos();
        });

        $(".subir_cambios").click(function () {
            agregarFilasSellos();
        });
        $(".buscarFechaYHora").click(function () 
            {
                fechaActualizada();
            }
        );
        function fechaActualizada(){
            $("#fd_Arribo").val(fechaActual());
            $("#ft_Arribo").val(horaActual());
            $("#fd_Carga").val(fechaActual());
            $("#ft_Carga").val(horaActual());
        }
        function fechaActual() {
                var dt = new Date();
                return (
                    `${dt.getFullYear().toString().padStart(4, '0')}-${(
                    dt.getMonth()+1).toString().padStart(2, '0')}-${
                    dt.getDate().toString().padStart(2, '0')}`

                );
            }
        function horaActual() {
            var dt = new Date();
                return (
                    `${dt.getHours().toString().padStart(2, '0')}:${
                    dt.getMinutes().toString().padStart(2, '0')}`
            );
        }

        //
    </script>
    <?php
    include "../import/componentes/footer.php";
    //include "../import/componentes/modal/talon.php";
    include "../import/componentes/modal/modalIndex.php";
    include "../import/componentes/js/main.php";
?>