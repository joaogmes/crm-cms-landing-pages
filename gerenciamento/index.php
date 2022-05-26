<?php
error_reporting(E_ALL); ini_set("display_errors", 1);
include_once('./modulos/cfg/conexao.php');
include_once('./modulos/cfg/funcoes.php');
if (!checarLogin()) {
    include('./modulos/login/login.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Agência Jota Gomes - Gerenciamento</title>
    <!-- Custom fonts for this template-->
    <link href="./assets/template-admin/arquivos/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <script type="text/javascript" src="./assets/js/jquery-3.5.1.min.js"></script>
    <!-- Custom styles for this template-->
    <script src="./assets/js/popper.min.js"></script>
    <script type="text/javascript" src="./assets/js/bootstrap.js"></script>
    <link href="./assets/css/summernote-bs4.min.css" rel="stylesheet">
    <script src="./assets/js/summernote-bs4.min.js"></script>
    <link href="./assets/template-admin/arquivos/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon"  href="./assets/img/icone-jgomes.png">
</head>
<body id="page-top">
 <?php
 if(checarInstalacao('backend')!='completo'){
    $etapa = checarInstalacao('backend');
    include('./modulos/instalacao/install.php');
    die();
}
$modulo = ($modulo = isset($_GET['modulo'])) ? $_GET['modulo'] : 'dashboard';
$acao = ($acao = isset($_GET['acao'])) ? $_GET['acao'] : 'listar';
$chave = ($chave = isset($_GET['chave'])) ? $_GET['chave'] : '';
$valor = ($valor = isset($_GET['valor'])) ? $_GET['valor'] : '';
$param = ($param = isset($_GET['param'])) ? $_GET['param'] : '';
$valor_p = ($valor_p = isset($_GET['valor_p'])) ? $_GET['valor_p'] : '';
$status_bd_local = ('local');
$status_bd_online = ('online');
$cliente = crud('listar', 'cliente', 'LIMIT 1', '', '', '');
$template = crud('listar', 'template', 'LIMIT 1', '', '', '');
$seo = crud('listar', 'seo', 'LIMIT 1', '', '', '');
// echo var_dump($_SESSION);

if($_SESSION['tipo'] != 'admin'){
    include 'franqueado.php';
    die();
}
?>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./?modulo=dashboard&acao=listar">
            <div class="sidebar-brand-icon">
                <img src="./assets/img/icone-jgomes.png" class="logo col-12">
            </div>
            <div class="sidebar-brand-text mx-3">Painel de Controle</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="./?modulo=dashboard&acao=listar">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>
             <li class="nav-item <?= ($modulo == 'cliente') ? 'active' : ''; ?>">
                <a class="nav-link" href="./?modulo=cliente&acao=atualizar">
                    <i class="fa fa-id-badge"></i>
                    <span> Cliente</span></a>
                </li>
                <li class="nav-item <?= ($modulo == 'template') ? 'active' : ''; ?>">
                    <a class="nav-link" href="./?modulo=template&acao=atualizar">
                        <i class="fas fa-paint-roller"></i><span> Template</span>
                    </a>
                </li>
                <li class="nav-item <?= ($modulo == 'servico') ? 'active' : ''; ?>">
                    <a class="nav-link" href="./?modulo=servico&acao=listar">
                        <i class="fas fa-people-arrows"></i><span> Serviços</span>
                    </a>
                </li> 
                <li class="nav-item <?= ($modulo == 'produto') ? 'active' : ''; ?>">
                    <a class="nav-link" href="./?modulo=produto&acao=listar">
                        <i class="fas fa-box-open"></i><span> FAQ</span>
                    </a>
                </li>
                
                <li class="nav-item <?= ($modulo == 'portifolio') ? 'active' : ''; ?>">
                    <a class="nav-link" href="./?modulo=portifolio&acao=listar">
                        <i class="far fa-images"></i><span> Galeria</span>
                    </a>
                </li>
                <li class="nav-item <?= ($modulo == 'depoimento') ? 'active' : ''; ?>">
                    <a class="nav-link" href="./?modulo=depoimento&acao=listar">
                        <i class="far fa-star"></i><span> Depoimentos</span>
                    </a>
                </li>
                <li class="nav-item <?= ($modulo == 'seo') ? 'active' : ''; ?>">
                    <a class="nav-link" href="./?modulo=seo&acao=atualizar">
                        <i class="fas fa-chart-area"></i><span> SEO</span>
                    </a>
                </li>
                <li class="nav-item <?= ($modulo == 'contato') ? 'active' : ''; ?>">
                    <a class="nav-link" href="./?modulo=contato&acao=listar">
                        <i class="fas fa-folder"></i><span> Contato</span>
                    </a>
                </li>
                <li class="nav-item <?= ($modulo == 'mensagem') ? 'active' : ''; ?>">
                    <a class="nav-link" href="./?modulo=mensagem&acao=listar">
                        <i class="far fa-comments"></i><span> Mensagens</span>
                    </a>
                </li>
                <!-- <li class="nav-item <?= ($modulo == 'configuracao') ? 'active' : ''; ?>">
                    <a class="nav-link" href="./?modulo=configuracao&acao=listar">
                        <i class="fas fa-cog"></i><span> Configurações</span>
                    </a>
                </li> -->
                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Heading -->

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
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="../" target="_blank">
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
    include('./modulos/' . $modulo . '/' . $acao . '.php');
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
            <a class="btn btn-primary" href="./?modulo=login&acao=logout">Sair</a>
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