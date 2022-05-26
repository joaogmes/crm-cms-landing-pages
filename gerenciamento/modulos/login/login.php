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

  <!-- Custom styles for this template-->
  <link href="./assets/template-admin/arquivos/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
               <div class="p-5">
                 <?php
                 // echo var_dump($_SESSION);
                 if (isset($_POST['usuario']) && $_POST['usuario'] != '' && isset($_POST['senha']) && $_POST['senha'] != '') {
                 if(verificarUsuario($_POST['usuario'], $_POST['senha'])){
                 if(!isset($_SESSION)){
                 session_start();
               }
               $usuario = verificarUsuario($_POST['usuario'], $_POST['senha']);
               $_SESSION['nome'] = $usuario['nome'];
               $_SESSION['usuario'] = $usuario['login'];
               $_SESSION['u_id'] = $usuario['id'];
               $_SESSION['tipo'] = $usuario['tipo'];
               $_SESSION['lp'] = $usuario['lp'];
               echo "<script>window.location.href='./?';</script>";
             }else{
             echo "<p class='alert alert-danger alert-dismissible fade show'>Usuário ou senha incorreto(s) </p>";
           }
         } else {
         echo "<p class='alert alert-warning alert-dismissible fade show'>Informe usuário e senha </p>";
       }
       ?>
       <form method="POST" action="./">
        <h3 class="text-center"><img class="img-fluid" src="./assets/img/AgênciaJotaGomes.png" alt="Agência Jota Gomes"></h3>
        <div class="form-group">
          <label for="usuario">Usuário</label>
          <input type="text" class="form-control" name="usuario" id="usuario">
        </div>
        <div class="form-group">
          <label for="senha">Senha</label>
          <input type="password" class="form-control" name="senha" id="senha">
        </div>
        <button type="submit" class="btn btn-primary">Logar</button>
      </form>
    </div>
  </div>
</div>
</div>
</div>

</div>

</div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="./assets/template-admin/arquivos/vendor/jquery/jquery.min.js"></script>
<script src="./assets/template-admin/arquivos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="./assets/template-admin/arquivos/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="./assets/template-admin/arquivos/js/sb-admin-2.min.js"></script>

</body>

</html>