<?php
if(isset($_GET['logout'])){
    include ('./modulos/login/logout.php');
}
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'home';
$_pagina = $pagina;
$pagina = (file_exists('./modulos/franqueado/'.$pagina.'.php')) ? './modulos/franqueado/'.$pagina.'.php' : './modulos/franqueado/home.php'; 
?>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./?modulo=dashboard&acao=listar">
           <!--  <div class="sidebar-brand-icon">
                <img src="./assets/img/icone-jgomes.png" class="logo col-12">
            </div> -->
            <div class="sidebar-brand-text mx-3">Painel do Franqueado</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="./?">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Início</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>
             <li class="nav-item <?= ($_pagina == 'leads') ? 'active' : ''; ?>">
                <a class="nav-link" href="./?pagina=leads">
                    <i class="fas fa-chart-area"></i>
                    <span> Leads</span></a>
                </li>
                
                <li class="nav-item <?= ($_pagina == 'banner') ? 'active' : ''; ?>">
                <a class="nav-link" href="./?pagina=banner">
                        <i class="far fa-images"></i><span> Banner</span>
                    </a>
                </li>
                <li class="nav-item <?= ($_pagina == 'depoimentos') ? 'active' : ''; ?>">
                <a class="nav-link" href="./?pagina=depoimentos">
                        <i class="far fa-star"></i><span> Depoimentos</span>
                    </a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->
                <li class="nav-item <?= ($_pagina == 'atualizar') ? 'active' : ''; ?>">
                <a class="nav-link" href="./?pagina=atualizar">
                        <i class="fa fa-id-badge"></i><span> Meus dados</span>
                    </a>
                </li>
                <li class="nav-item <?= ($_pagina == 'unidade') ? 'active' : ''; ?>">
                <a class="nav-link" href="./?pagina=unidade">
                       <i class="fas fa-solar-panel"></i><span> Dados unidade</span>
                    </a>
                </li>
               
                <!-- <li class="nav-item <?= ($_pagina == 'configuracao') ? 'active' : ''; ?>">
                    <a class="nav-link" href="./?modulo=configuracao&acao=listar">
                        <i class="fas fa-cog"></i><span> Configurações</span>
                    </a>
                </li> -->

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
                <!-- Sidebar Message -->
<!--     <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> -->
</ul>
<!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
                </button>
                <!-- Topbar Search -->
                <!--  <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Searcteteteteh for..."
                        aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form> -->
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <h5>Página: <?=$seo['titulo']?></h5>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!--  -->
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= $_SESSION['usuario'] ?></span>
                            <i class="fa fa-user"></i>
                        </a>
                        <!-- Dropdown - User Information -->
                        <?php
                        $id = $_SESSION['u_id'];
                        $afiliado = crud('listar', 'usuario', 'WHERE id = '.$id.' AND tipo = "afiliado"', '$sucesso', '$falha', '$id');

                        $lp = $afiliado['lp'];
                        $landingpage = crud('listar', 'landingpage', 'WHERE id = '.$lp, '$sucesso', '$falha', '$id');
                        ?>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="../<?=$landingpage['dominio']?>/" target="_blank">
                                <i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>
                                Ver o site
                            </a>
                            <!-- <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?php
                include($pagina);
                ?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Desenvolvido por: <i class="fa fa-heart-o"></i> <a href="https://jotagomes.com.br" target="_blank" class="text-warning"> Jota Gomes - Comunicação Visual</a></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deseja sair?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Clique em "Sair" para encessar sua sessão atual.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="./?logout">Sair</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="./assets/template-admin/arquivos/vendor/jquery/jquery.min.js"></script>
<!-- <script src="./assets/template-admin/arquivos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- Core plugin JavaScript-->
<script src="./assets/template-admin/arquivos/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="./assets/template-admin/arquivos/js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="./assets/template-admin/arquivos/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="./assets/template-admin/arquivos/js/demo/chart-area-demo.js"></script>
<script src="./assets/template-admin/arquivos/js/demo/chart-pie-demo.js"></script>
</body>
</html>