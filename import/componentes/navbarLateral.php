<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- inicio Sidebar -->
        <ul class="navbar-nav color-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <img src="../assets/img/GalverLogisticaLogo.png" alt="" class="logoGalverSistema">
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="text-negro">Inicio</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading text-negro">
                Monitores
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-book "></i>
                    <span class="text-negro ">Hoja de Viaje</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded collapseColor">
                        <h6 class="collapse-header text-amarillo">Opciones:</h6>
                        <a class="collapse-item text-amarillo" href="./HDV_TodosLosRegistros.php"><i class="fas fa-paste"></i> hojas de viaje</a>
                        <a class="collapse-item text-amarillo" href="./HDV_Liberacion.php"><i class="fas fa-folder-plus"></i> Liberacion</a>
                        <a class="collapse-item text-amarillo" href="./HDV_ArriboRegistro.php"><i class="fas fa-truck-moving"></i> Arribo</a>
                        <a class="collapse-item text-amarillo" href="./HDV_CargaRegistro.php"><i class="fas fa-people-carry"></i> Carga</a>
                        <a class="collapse-item text-amarillo" href=""><i class="fas fa-truck-loading"></i> Descarga</a>
                        <a class="collapse-item text-amarillo" href=""><i class="fas fa-exclamation-triangle"></i> Pedndiente!</a>
                        <a class="collapse-item text-amarillo" href="./HDV_Cancelaciones.php"><i class="fas fa-trash"></i> Cancelaciones</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTRES"
                    aria-expanded="true" aria-controls="collapseTRES">
                    <i class="fas fa-database"></i>
                    <span class="text-negro ">Base de datos</span>
                </a>
                <div id="collapseTRES" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded collapseColor">
                        <h6 class="collapse-header text-amarillo">Opciones:</h6>
                        <a class="collapse-item text-amarillo" href="./CRUD_EmpresaEmisora.php"><i class="fas fa-building"></i> Empresa Emisora</a>
                        <a class="collapse-item text-amarillo" href="./CRUD_EmpresaReceptora.php"><i class="far fa-building"></i> Empresa Receptora</a>
                        <a class="collapse-item text-amarillo" href="./CRUD_Operadores.php"><i class="fas fa-smile"></i> Operadores</a>
                        <a class="collapse-item text-amarillo" href="./CRUD_Tractores.php"><i class="fas fa-truck-moving"></i> Tractores</a>
                        <a class="collapse-item text-amarillo" href="./CRUD_Tractores_marca.php"><i class="fab fa-bandcamp"></i> Marca de veiculos</a>
                        <a class="collapse-item text-amarillo" href="./CRUD_Remolques.php"><i class="fas fa-trailer"></i> Remolques</a>
                        <a class="collapse-item text-amarillo" href="./CRUD_Remolques_servicios.php"><i class="fas fa-concierge-bell"></i> Remolques Servicios</a>
                        <a class="collapse-item text-amarillo" href="./CRUD_Cargas.php"><i class="fas fa-boxes"></i> Cargas</a>
                        <a class="collapse-item text-amarillo" href="./CRUD_Unidades_de_medida.php"><i class="fas fa-ruler-vertical"></i> Unidades de medida</a>
                        <a class="collapse-item text-amarillo" href="./CRUD_Destinos.php"><i class="fas fa-map-marked"></i> Destino</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span class="text-negro">Editar mi perfil</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>