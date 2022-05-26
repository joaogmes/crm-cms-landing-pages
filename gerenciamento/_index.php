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
<head>
    <title>Agência Jota Gomes - Gerenciamento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Language" content="pt-br">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/all.css">
    <script type="text/javascript" src="./assets/js/jquery-3.5.1.min.js"></script>
    <!-- include summernote css/js -->
    <script src="./assets/js/popper.min.js"></script>
    <script type="text/javascript" src="./assets/js/bootstrap.js"></script>
    <link href="./assets/css/summernote-bs4.min.css" rel="stylesheet">
    <script src="./assets/js/summernote-bs4.min.js"></script>
    
    <link rel="icon"  href="./assets/img/icone-jgomes.png">
</head>
<body>
    <?php
    if(checarInstalacao('backend')!='completo'){
        $etapa = checarInstalacao();
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
    ?>
    <header>
        <div class="container mb-1">
            <div class="row">
                <div class="col-md-10 col-12 text-center">
                    <h5>Página: <?=$seo['titulo']?></h5>
                    <!-- <a href="../" target="_blank">Ver site <i class="fa fa-eye"></i></a> -->
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="../" target="_blank"><i class="fa fa-eye"></i> Ver site</a> |</li>
                        <li class="list-inline-item">Usuário: <?= $_SESSION['usuario'] ?> |</li>
                        <!-- <li class="list-inline-item">IP: <?= $_SERVER['REMOTE_ADDR']; ?> |</li>
                        <li class="list-inline-item">Data: <?= date("d/m/Y - H:i") ?> |</li> -->
                        <li class="list-inline-item"><a href="./?modulo=login&acao=logout"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                    </ul>
                </div>
                <div class="col-md-2 d-none d-sm-block">
                    <img class="img-fluid" src="./uploads/<?=$template['logotipo']?>">
                </div>
            </div>
        </div>
        <!-- <div class="container ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./?modulo=<?= $modulo ?>"><?= $modulo ?></a></li>
                    <li class="breadcrumb-item"><a href="./?modulo=<?= $modulo ?>&acao=<?= $acao ?>"><?= $acao ?></a></li>
                </ol>
            </nav>
        </div> -->
        <div class="container text-center">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="./?modulo=dashboard&acao=listar"><img src="./assets/img/icone-jgomes.png" class="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-1 mt-lg-0">
                        <li class="nav-item <?= ($modulo == 'cliente') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=cliente&acao=atualizar"><i class="fa fa-id-badge"></i> Cliente</span></a>
                        </li>
                        <li class="nav-item <?= ($modulo == 'template') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=template&acao=atualizar"><i class="fas fa-paint-roller"></i> Template</a>
                        </li>
                        <li class="nav-item <?= ($modulo == 'servico') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=servico&acao=listar"><i class="fas fa-people-arrows"></i> Serviços</a>
                        </li>
                        <li class="nav-item <?= ($modulo == 'produto') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=produto&acao=listar"><i class="fas fa-box-open"></i> Produtos</a>
                        </li>
                        <li class="nav-item <?= ($modulo == 'portifolio') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=portifolio&acao=listar"><i class="far fa-images"></i> Galeria</a>
                        </li>
                       <!--  <li class="nav-item <?= ($modulo == 'planos') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=planos&acao=listar"><i class="fas fa-money-bill-wave"></i> Planos</a>
                        </li>
                        <li class="nav-item <?= ($modulo == 'blog') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=blog&acao=listar"><i class="fas fa-comments"></i> Blog</a>
                        </li> -->
                        <li class="nav-item <?= ($modulo == 'depoimento') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=depoimento&acao=listar"><i class="far fa-star"></i> Depoimentos</a>
                        </li>
                        <li class="nav-item <?= ($modulo == 'seo') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=seo&acao=atualizar"><i class="fas fa-chart-area"></i> SEO</a>
                        </li>
                        <li class="nav-item <?= ($modulo == 'contato') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=contato&acao=listar"><i class="fas fa-folder"></i> Contato</a>
                        </li>
                        <li class="nav-item <?= ($modulo == 'mensgem') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=mensgem&acao=listar"><i class="far fa-comments"></i> Mensagens</a>
                        </li>
                        <li class="nav-item <?= ($modulo == 'configuracao') ? 'active' : ''; ?>">
                            <a class="nav-link" href="./?modulo=configuracao&acao=listar"><i class="fas fa-cog"></i> Configurações</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <section>
        <div class="container include">
            <?php
            include('./modulos/' . $modulo . '/' . $acao . '.php');
            ?>
        </div>
    </section>
    <footer>
        <div class="container">
            <hr>
            <h6>Desenvolvido por: <i class="fa fa-heart-o"></i> <a href="https://jotagomes.com.br" target="_blank" class="text-warning"> Jota Gomes - Comunicação Visual</a></h6>
        </div>
    </footer>
    <script type="text/javascript" src="./assets/js/jquery.mask.js"></script>
</body>