<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
?>
<?php
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/talones/select.php";
?>
<div class="container-fluid">
    <?php
        include "../import/componentes/nav1.php";
    ?>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-12">
            <style>
                .card {
                    height: 1050px !important;
                }
            </style>
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <?php
                    include "../import/componentes/talon/nav.php";
                ?>
                <!-- Card Body -->
                <style>
                    .btn-light {
                        border-color: #d1d3e2;
                    }

                    .bootstrap-select .dropdown-menu {
                        background: black !important;
                    }

                    .btn-light:not(:disabled):not(.disabled).active,
                    .btn-light:not(:disabled):not(.disabled):active,
                    .show>.btn-light.dropdown-toggle {
                        background-color: rgb(255, 217, 0) !important;
                    }
                </style>
                <div class="card-body">
                    <div class="chart-area">
                        <form>
                            <div class="form-row ">
                                <div class="form-group col-md-4 ">
                                    <label for="inputEmail4 ">Empresa emisora</label>
                                    <select id="" class="selectpicker form-control" data-live-search="true"
                                        name="talonEmpresaEmisora">
                                        <optgroup label="Escriba y seleccione">
                                            <?php
                                            
                                            $contador=0;
                                            $consultaSqlEmpresaEmisora=muestraEmpresasEmisoras($con);
                                                while ($r=$consultaSqlEmpresaEmisora->fetch_array()) 
                                                    {
                                            ?>
                                            <option value="<?php echo $r['empresaEmisoraId'];?>">
                                                <?php echo $r["empresaEmisoraNombre"];?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Empresa receptora</label>
                                    <select id="" class="selectpicker form-control" data-live-search="true"
                                        name="estadoTalonId">
                                        <optgroup label="Escriba y seleccione">
                                            <?php
                                            
                                            $contador=0;
                                            $consultaSqlEmpresaReceptora=muestraEmpresasReceptoras($con);
                                                while ($r=$consultaSqlEmpresaReceptora->fetch_array()) 
                                                    {
                                            ?>
                                            <option value="<?php echo $r['empresaReceptoraId'];?>">
                                                <?php echo $r["empresaReceptoraNombre"];?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <!--
                                <div class="form-group col-md-4">
                                    <label for="">Estado de talon</label>
                                    <select id="" class="selectpicker form-control" data-live-search="true"
                                        name="talonEstado">
                                        <optgroup label="Escriba y seleccione">
                                            <?php
                                            $contador=0;
                                            $consultaSqlEstadoTalon=muestraTalonEstado($con);
                                                while ($r=$consultaSqlEstadoTalon->fetch_array()) 
                                                    {
                                            ?>
                                            <option value="<?php echo $r['estadoTalonId'];?>">
                                                <?php echo $r["estadoTalonNombre"];?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>
                                -->
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Nombre del operador</label>
                                    <select id="" class="selectpicker form-control" data-live-search="true"
                                        name="estadoTalonId">
                                        <optgroup label="Escriba y seleccione">
                                            <?php
                                            
                                            $contador=0;
                                            $consultaSqlOperadores=muestraEmpresaOperadores($con);
                                                while ($r=$consultaSqlOperadores->fetch_array()) 
                                                    {
                                            ?>
                                            <option value="<?php echo $r['operadorID'];?>">
                                                <?php echo $r["operadorNombre"];?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Licencia</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Origen de carga</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Origen de carga</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonDestino">
                                </div>

                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Remolque 1</label>

                                    <select id="" class="selectpicker form-control" data-live-search="true"
                                        name="talonEmpresaEmisora">
                                        <optgroup label="Escriba y seleccione">
                                            <?php
                                            
                                            $contador=0;
                                            $consultaSqlRemolque1=muestraRemolques($con);
                                                while ($r=$consultaSqlRemolque1->fetch_array()) 
                                                    {
                                            ?>
                                            <option value="<?php echo $r['remolqueId'];?>">
                                                <?php echo $r["remolqueServicio"];?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Numero de placa 1</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Economico 1</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Talon 1</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Remolque 2</label>
                                    <select id="" class="selectpicker form-control" data-live-search="true"
                                        name="talonEmpresaEmisora">
                                        <optgroup label="Escriba y seleccione">
                                            <?php
                                            
                                            $contador=0;
                                            $consultaSqlRemolque2=muestraRemolques($con);
                                                while ($r=$consultaSqlRemolque2->fetch_array()) 
                                                    {
                                            ?>
                                            <option value="<?php echo $r['remolqueId'];?>">
                                                <?php echo $r["remolqueServicio"];?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Numero de placa 2</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Economico 2</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputPassword4">Talon 2</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                        placeholder="Escriba aqui..." name="talonOrigen">
                                </div>

                            </div>
                            <hr>
                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label class="" for="inputPassword4">Fecha de Arribo</label>
                                    <div class="col form-row">
                                        <div class="form-group">
                                            <label class="" for="inputPassword4">Fecha</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="" for="inputPassword4">Hora</label>
                                            <input type="time" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="" for="inputPassword4">Fecha de Carga</label>
                                    <div class="col form-row">
                                        <div class="form-group">
                                            <label class="" for="inputPassword4">Fecha</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="" for="inputPassword4">Hora</label>
                                            <input type="time" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="" for="inputPassword4">Fecha de llegada de descarga</label>
                                    <div class="col form-row">
                                        <div class="form-group">
                                            <label class="" for="inputPassword4">Fecha</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="" for="inputPassword4">Hora</label>
                                            <input type="time" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="" for="inputPassword4">Fecha de llegada de descarga</label>
                                    <div class="col form-row">
                                        <div class="form-group">
                                            <label class="" for="inputPassword4">Fecha</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="" for="inputPassword4">Hora</label>
                                            <input type="time" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="form-row ">
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Carga</label>
                                    <select id="cu" class="selectpicker form-control" data-live-search="true"
                                        name="talonEmpresaEmisora">
                                        <optgroup label="Escriba y seleccione">
                                            <?php
                                            $consultaSqlCargas=muestraCargas($con);
                                                while ($r=$consultaSqlCargas->fetch_array()) 
                                                    {
                                            ?>
                                            <option value="<?php echo $r['cargaId'];?>">
                                                <?php echo $r["cargaNombre"];?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Tipo de carga</label>
                                    <select id="cargaTipoId" class="selectpicker form-control" data-live-search="true"
                                        name="cargaTipoId">
                                        <optgroup label="Escriba y seleccione">
                                            <?php
                                            $consultaSqlCargaTipos=muestraCargaTipos($con);
                                                while ($r=$consultaSqlCargaTipos->fetch_array()) 
                                                    {
                                            ?>
                                            <option value="<?php echo $r['cargaTipoID'];?>">
                                                <?php echo $r["cargaTipoNombre"];?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Cantidad de la carga</label>
                                    <input type="text" class="form-control" placeholder="Escriba aqui..."
                                        name="talonesCargaCantidad" min="0" id="talonesCargaCantidad" />
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="inputPassword4">Resultado de la caga</label>

                                    <input type="text" class="form-control" id="resultadoCarga" readonly>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Comentario</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-warning col-md-6">Agregar</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include "../import/componentes/footer.php";
    include "../import/componentes/modal/modalIndex.php";
    include "../import/componentes/js/talon.php";
?>
<script>
	$("#talonesCargaCantidad").keyup(function(event){
        var cargaTipoId=$('#cargaTipoId').val();
        var talonesCargaCantidad=$('#talonesCargaCantidad').val();
        $('#resultadoCarga').val(
            obtenerResultado(cargaTipoId,talonesCargaCantidad)
        );
	}); 
    function obtenerResultado(operacion,cantidad){
        var resultado;
        if (operacion=== null || operacion === "") {
            resultado = "ingrese la carga";
        }
        else
        {
            if (cantidad === null || cantidad === "") {
                resultado = "ingrese la cantidad";
            }
            else
            {
                if (validateDecimal(cantidad)!==true) {
                    resultado= "ingrece un numero decimal";
                }else{
                   
                    resultado= ajaxResultadoDeCarga(operacion,cantidad);
                }
            }
        }
        return resultado;
    }
    function ajaxResultadoDeCarga(carga,valor){
        var array = [1,2,3,4]; //array que deseo enviar
        var url= "../controlador/modulos/talones/operacionCarga.php";
        $.ajax({
                type: "POST",
                url: url,
                data: {'array': JSON.stringify(array)},//capturo array     
                success: function(data){
                    console.log(data);
                }
        });
    }
    
    function validateDecimal(valor) {
        var RE = /^\d*\.?\d*$/;
        if (RE.test(valor)) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }
</script>