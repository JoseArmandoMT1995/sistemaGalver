<?php
    include "../controlador/login/acceso.php";
    include "../import/componentes/head.php";
    include "../import/componentes/navbarLateral.php";
    include "../import/componentes/navbarHorizontal.php";
    include "../controlador/coneccion/config.php";
    include "../controlador/modulos/selects.php";
?>
<div class="container-fluid">
    <style>
        .card_hdv 
        {
            height: 1350px !important;
        }
        div.cardScroll 
        {
            height: 1200px;
            overflow: auto;
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
                        $colorTituloCard="#5cff1e";
                        $tituloPlantilla='<i class="fas fa-folder-plus"></i> '."LIBERACION";
                        include "../import/componentes/hojaDeViaje/nav.php";
                    ?>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <div class="row cardScroll">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID VIAJE</th>
                                                <th scope="col">ID REMOLQUE VIAJE</th>
                                                <th scope="col">LIBERACION FECHA</th>
                                                <th scope="col">CLIENTE</th>
                                                <th scope="col">OPERADOR</th>
                                                <th scope="col">TALONES</th>
                                                <th scope="col">ORIGEN DE CARGA</th>
                                                <th scope="col">EDICION</th>
                                                <th scope="col">SIGUIENTE PASO</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">ID VIAJE</th>
                                                <th scope="col">ID REMOLQUE VIAJE</th>
                                                <th scope="col">LIBERACION FECHA</th>
                                                <th scope="col">CLIENTE</th>
                                                <th scope="col">OPERADOR</th>
                                                <th scope="col">TALONES</th>
                                                <th scope="col">ORIGEN DE CARGA</th>
                                                <th scope="col">EDICION</th>
                                                <th scope="col">SIGUIENTE PASO</th>
                                            </tr>
                                        </tfoot>
                                        <tbody class=" text-center">
                                        <?php
                                            $hdv=muestraHDV($mysqli,1);
                                            while ($filas =$hdv->fetch_assoc()) 
                                            {
                                                $talones=($filas["TALON2"]!="")?"[".$filas["TALON1"]."],<br>[".$filas["TALON2"]."]":"[".$filas["TALON1"]."]";
                                                echo 
                                                "<tr bgcolor='#5cff1e' class=' font-weight-bold' style='#FFFFFF'>".
                                                    "<td>".$filas["ID"]."</td>".
                                                    "<td onclick='verInfoId(".$filas["ID_VIAJE"].")'>".$filas["ID_VIAJE"]."</td>".
                                                    "<td>".substr($filas["LIBERACION_FECHA"], 0, -9)."</td>".    
                                                    "<td>".$filas["CLIENTE"]."</td>".
                                                    "<td>".$filas["OPERADOR"]."</td>".                                         
                                                    "<td>".$talones."</td>".
                                                    "<td>".$filas["ORIGEN"]."</td>".        
                                                    "<td><a href='./HDV_ArriboEdicion.php?id=".$filas["ID"]."'><button type='button' class='btn btn-warning'><i class='fas fa-edit'></i></button></a></td>".
                                                    "<td><a href='./HDV_Arribo.php?id=".$filas["ID_VIAJE"]."'><button type='button' class='btn btn-warning'><i class='fas fa-arrow-alt-circle-right'></i></button></a></td>".
                                                "</tr>";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                           
    <?php
    include "../import/componentes/modal/remolqueInfo.php";
    include "../import/componentes/footer.php";
    include "../import/componentes/modal/modalIndex.php";
    include "../import/componentes/js/main.php";
    ?>