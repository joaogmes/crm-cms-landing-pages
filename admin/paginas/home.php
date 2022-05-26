<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Portal de Leads</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
  <script src="/js/main.js?v=1.0" type="text/javascript"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css?v2.01">
  <link rel="icon" href="https://cdn-icons.flaticon.com/png/512/4529/premium/4529252.png?token=exp=1648698964~hmac=3b19ef32c179a147ae403d9cabbba33e" sizes="32x32" />
</head>
<body class="bg-light">
 <div id="wrapper_1">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
      <a class="navbar-brand" href="./">
        <img src="https://sp-ao.shortpixel.ai/client/q_glossy,ret_img/https://sorriafernandopolis.com.br/wp-content/uploads/elementor/thumbs/Clinica-Sorria-White-1-p0ayme7ep9nex9qkgkfiqmv5c4b029kvo90rz9w58y.png" alt="" height="30px" class="d-inline-block align-text-top">
      </a>
      <button id="toggler" class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarColor02" style="">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="lancamentos">Lançamentos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
        </ul>
       <!--  <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form> -->
        <div class="d-flex ms-3">
          <div class="dropdown">
            <button class="btn btn-primary bg-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
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
  <div id="conteudo" class="text-center">
    <?php
  //print (file_exists('paginas/'.$pagina.".php")) ? include('paginas/'.$pagina.".php") : include('paginas/home.php');
    ?>
  </div>
</div>
</body>
</html>