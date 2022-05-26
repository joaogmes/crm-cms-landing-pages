<?php
if($_SESSION['tipo'] != 'admin'){
      include ('sair.php');
      echo "<script>window.location.href='./'";
      die();
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Painel de Leads</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
  <script src="./js/main.js?v=1.0" type="text/javascript"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css?v2.03">
  <link rel="icon" href="https://cdn-icons.flaticon.com/png/512/4151/premium/4151946.png?token=exp=1638552497~hmac=7078f7be99fdf3e71265db9111a91fdc" sizes="32x32" />
</head>
<body class="bg-light">
 <div id="wrapper_1">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="./">
        <img src="https://cdn-icons.flaticon.com/png/512/4151/premium/4151946.png?token=exp=1638552497~hmac=7078f7be99fdf3e71265db9111a91fdc" alt="" height="30px" class="d-inline-block align-text-top">
      </a>
      <button id="toggler" class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarColor02" style="">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="./?pagina=landingpage&acao=listar">Landing Pages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./?pagina=contatos">Contatos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./?pagina=mensagens">Mensagens</a>
          </li>
        </ul>
       <!--  <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form> -->
        <div class="d-flex ms-3">
          <div class="dropdown">
            <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <?=$_SESSION['nome'];?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <li><a class="dropdown-item" href="./?pagina=sair">Sair</a></li>
            </ul>
          </div>
          <!-- <button class="btn btn-light ms-3">Login</button> -->
        </div>
      </div>
    </div>
  </nav>
  <div id="conteudo" class="text-center mt-4">
    <?php

    if(file_exists('paginas/'.$pagina.'.php')){
      include ('paginas/'.$pagina.'.php');
    }else{
      include ('paginas/landingpage.php');
    }
    ?>
  </div>
</div>
</body>
</html>