 <!doctype html>
  <html lang="pt-br">
  <head>
    <title><?=$seo['titulo']?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" content="<?=$seo['titulo']?>">
    <meta name="description" content="<?=$seo['descricao']?>">
    <meta name="keywords" content="<?=$seo['keywords']?>">
    <meta name="robots" content= "index, follow">

    <meta property="og:image" content="./gerenciamento/uploads/<?=$seo['imagem']?>">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="800"> 
    <meta property="og:image:height" content="600">

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700;900&display=swap" rel="stylesheet">

    <style type="text/css" media="screen">
      :root{
        --cor-primaria: <?=$template['corprimaria']?>;
        --cor-secundaria: <?=$template['corsecundaria']?>;
        --cor-terciaria: <?=$template['corterciaria']?>;
      }
    </style>
    <link rel="stylesheet" href="<?=$tema?>fontawesome-5/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?=$tema?>fontawesome-5/css/all.css">
    <link rel="stylesheet" href="<?=$tema?>css/bootstrap/bootstrap.css?v=3">
    <link rel="stylesheet" href="<?=$tema?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?=$tema?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=$tema?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=$tema?>css/owl.theme.default.min.css">

    <link rel="stylesheet" href="<?=$tema?>css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="<?=$tema?>css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="<?=$tema?>fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="<?=$tema?>css/aos.css">

    <link rel="stylesheet" href="<?=$tema?>css/style.css?v=4">

    <link rel="shortcut icon" href="<?=$icone_mostrar?>">
    <script src="<?=$tema?>js/jquery-3.3.1.min.js"></script>

    <script>

      $(document).ready(function() {
        $("#todas-categorias").click();
      });

      <?=$seo['scripts']?>
    </script>

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <div class="site-wrap">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="fa fa-times js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header class="site-navbar py-4 js-sticky-header shrink site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center justify-content-center">

            <div class="col-4">
              <a href="./"><img class="logotipo" src="./gerenciamento/uploads/<?=$template['logotipo']?>"></a>
            </div>

            <div class="col-8"> <nav class="site-navigation position-relative
              text-right" role="navigation"> 
              <ul class="site-menu main-menu js-clone-nav
              mr-auto d-none d-lg-block"> 
              <li><a href="#inicio" class="">Início</a></li> 
              <li><a href="#sobre" class="">Sobre</a></li> 
              <li><a href="#servicos" class="">Serviços</a></li>
              <li><a href="#portifolio" class="" onclick="categorias()">Portifólio</a></li>
              <!-- <li><a href="#blog-section" class="">Blog</a></li> --> 
              <li><a href="#contato"  class="">Contato</a></li> 
            </ul> 
          </nav>

          <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle float-right"><i class="fa fa-bars"></i></a>

        </div>

      </div>
    </div>

  </header>

  <div class="site-blocks-cover overlay bg-light" style="background-image: url('./gerenciamento/uploads/<?=$template['bghero']?>'); " id="inicio">

    <div class="container">
      <div class="row justify-content-center">

        <div class="col-12 text-center align-self-center text-intro">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <h1 class="text-white" data-aos="fade-up" data-aos-delay=""><?=$template['titulo']?></h1>
              <p class="lead text-white" data-aos="fade-up" data-aos-delay="100"><?=$template['subtitulo']?></p>
              <p data-aos="fade-up" data-aos-delay="200"><a href="<?= (isset($template['link']) ? $template['link'] : '#servicos') ?>" class="btn smoothscroll btn-primary"> Mais informações</a></p>

            </div>
          </div>
        </div>

      </div>
    </div>

  </div>  


  <div class="site-section" id="sobre">
    <div class="container">
      <div class="row ">
        <div class="col-12 mb-4 position-relative">
          <h2 class="section-title">Sobre Nós</h2>
        </div>
        <div class="col-lg-8 order-2 order-md-1">
          <?=$cliente['textosobre']?>
        </div>
        <div class="col-lg-4 order-1 order-md-2">
          <img src="./gerenciamento/uploads/<?=$cliente['fotosobre']?>" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>

  <div class="site-section" id="servicos">
    <div class="container">
      <div class="row ">
        <div class="col-12 mb-5 position-relative">
          <h2 class="section-title text-center mb-5">Serviços</h2>
        </div>
        <?php
        while($servico = $servicos->fetch(PDO::FETCH_ASSOC)){
          ?>
          <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="">
            <div class="service d-flex h-100">
              <div class="svg-icon">
                <img src="./gerenciamento/uploads/<?=$servico['imagem']?>" alt="Image" class="img-fluid">
              </div>
              <div class="service-about">
                <h3><?=$servico['nome']?></h3>
                <p><?=$servico['descricao']?></p>
              </div>
            </div>
          </div>
          <?php
        }
        ?>

      </div>
    </div>
  </div>

  <section class="site-section block__62272" id="portifolio">

  <!--   <div class="container">
      <div class="row mb-5">
        <div class="col-12 position-relative">
          <h2 class="section-title text-center mb-5">Portifólio</h2>
        </div>
      </div>

      <div class="row justify-content-center mb-5" data-aos="fade">
        <div id="filters" class="filters text-center button-group col-md-7">
          <button class="btn btn-primary active" data-filter="*" id="todas-categorias" onload="categorias()">Todas</button>
            <button class="btn btn-primary" data-filter=".categoria">Categoria</button>
        </div>
      </div>  

      <div id="posts" class="row no-gutter">
        
          <div class="item categoria col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href="./gerenciamento/uploads/imagem" class="item-wrap fancybox">
              <span class="fa fa-search"></span>
              <img class="img-fluid" src="./gerenciamento/uploads/imagem">
            </a>
          </div>
          

      </div>
    </div> -->
    <div class="container">
      <div class="row mb-5">
        <div class="col-12 position-relative">
          <h2 class="section-title text-center mb-5">Portifólio</h2>
        </div>
      </div>
      <div class="row justify-content-center mb-5">
        <button class="btn btn-default filter-button" data-filter="all">Todos</button>
        <?php
        while($categoria = $categorias->fetch(PDO::FETCH_ASSOC)){
          ?>
          <button class="btn btn-primary filter-button" data-filter="<?=$categoria['categoria']?>"><?=$categoria['categoria']?></button>
          <?php
        }
        ?>
      </div>
      <div class="row justify-content-center mb-5">
        <?php
        while($foto = $portfolio->fetch(PDO::FETCH_ASSOC)){
          ?>
          <div class="gallery_product col-lg-4 col-md-3 col-12 filter <?=$foto['categoria']?>">
            <img src="./gerenciamento/uploads/<?=$foto['imagem']?>" class="img-responsive">
          </div>
          <?php
        }
        ?>
      </div>
    </div>

  </section>

  <section class="site-section bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-5 position-relative">
          <h2 class="section-title text-center mb-5 text-white">Depoimentos</h2>
        </div>
      </div>
      <div class="owl-carousel slide-one-item">
       <?php
       while($depoimento = $depoimentos->fetch(PDO::FETCH_ASSOC)){
        ?>
        <div class="slide">
          <i class="fas fa-2x fa-quote-left text-white"></i>
          <blockquote>
            <p><?=$depoimento['depoimento']?></p>
            <p><cite>&mdash; <?=$depoimento['nome']?></cite></p>
          </blockquote>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
</section>

<section class="site-section" id="contato">
  <div class="container">
    <div class="row">
      <div class="col-12 mb-5 position-relative">
        <h2 class="section-title text-center mb-5">Entre em contato</h2>
      </div>
    </div>
    <div class="row justify-content-between">
      <div class="col-lg-6 order-2 order-lg-1">
        <form id="form-contato" class="form">
          <input type="hidden" name="origem" id="origem" value="formulario">
          <input type="hidden" name="datacadastro" id="datacadastro" value="<?=date('Y-m-d H:i:s')?>">
          <input type="hidden" name="newsletter" id="newsletter" value="0">
          <div class="row mb-4">
            <div class="form-group col-6">
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome" required>
            </div>
            <div class="form-group col-6">
              <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="55 (17) 99999-9999" required>
            </div>
          </div>

          <div class="row mb-4">
            <div class="form-group col-12">
              <input type="email" class="form-control" id="email" name="email" required placeholder="Endereço de e-mail">
            </div>
          </div>

          <div class="row mb-4">
            <div class="form-group col-12">
              <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto da mensagem">
            </div>
          </div>

          <div class="row mb-4">
            <div class="form-group col-12">
              <textarea cols="30" rows="10" id="mensagem" name="mensagem" class="form-control" placeholder="Escreva sua mensagem aqui.."></textarea>
            </div>
          </div>

          <div class="row text-center mb-4">
            <div class="col-md-6">
              <input type="submit" class="btn btn-primary" value="Enviar!">
            </div>
          </div>

        </form>
      </div>
      <div class="col-lg-5 order-lg-2 order-1 mb-5">
        <h3>Fale conosco</h3>
        <ul class="list-unstyled mb-5">
          <?php
          if(isset($cliente['enderco']) && $cliente['endereco']!=""){
            ?>
            <li class="mb-3">
              <strong class="d-block mb-1">Endereço</strong>
              <span><?=$cliente['endereco']?></span>
            </li>
            <?php
          }
          if(isset($cliente['telefone']) && $cliente['telefone']!=""){
            ?>
            <li class="mb-3">
              <strong class="d-block mb-1">Telefone</strong>
              <span><a href="tel:55<?=$cliente['telefone']?>"><?=$cliente['telefone']?></a></span>
            </li>
            <?php
          }
          if(isset($cliente['whatsapp']) && $cliente['whatsapp']!=""){
            ?>
            <li class="mb-3">
              <strong class="d-block mb-1">Celular</strong>
              <span><a href="tel:55<?=$cliente['whatsapp']?>"><?=$cliente['whatsapp']?></a></span>
            </li>
            <?php
          }
          ?>
        </ul>
        <h3 class="footer-title">Sigam:</h3>
        <?php
        if(isset($cliente['facebook']) && $cliente['facebook']!=""){
          ?>
          <a href="<?=$cliente['facebook']?>" target="_blank" class="social-circle m-2"><span class="fab fa-facebook"></span></a>
          <?php
        }
        if(isset($cliente['instagram']) && $cliente['instagram']!=""){
          ?>
          <a href="<?=$cliente['instagram']?>" target="_blank" class="social-circle m-2"><span class="fab fa-instagram"></span></a>
          <?php
        }if(isset($cliente['youtube']) && $cliente['youtube']!=""){
          ?>
          <a href="<?=$cliente['youtube']?>" target="_blank" class="social-circle m-2"><span class="fab fa-youtube"></span></a>
          <?php
        }
        if(isset($cliente['googleplus']) && $cliente['googleplus']!=""){
          ?>
          <a href="<?=$cliente['googleplus']?>" target="_blank" class="social-circle m-2"><span class="fab fa-googleplus"></span></a>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
</section>

<footer class="site-section bg-light footer">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-6">
        <h3 class="footer-title"><?=$cliente['nome']?></h3>
        <p>
          <!-- <span class="d-inline-block d-md-block"><?=$cliente['cnpj']?>, <?=$cliente['razaosocial']?></span> <?=$cliente['endereco']?><br> -->
          <?=$seo['descricao']?>
        </p>
        <ul style="list-style: square inside url('data:image/gif;base64,R0lGODlhBQAKAIABAAAAAP///yH5BAEAAAEALAAAAAAFAAoAAAIIjI+ZwKwPUQEAOw=='); padding-left:0; margin-left: 0 ">
          <li><?=$cliente['cnpj']?></li>
          <li><?=$cliente['razaosocial']?></li>
          <li><?=$cliente['endereco']?></li>
        </ul>
      </div>
      <div class="col-md-3 mx-auto">
        <h3 class="footer-title">Links</h3>
        <ul class="list-unstyled">
          <li><a href="#inicio" class="">Início</a></li> 
          <li><a href="#sobre" class="">Sobre</a></li> 
          <li><a href="#servicos" class="">Serviços</a></li>
          <li><a href="#portifolio" class="">Portifólio</a></li>
          <li><a href="#contato"  class="">Contato</a></li> 
        </ul>
      </div>
      <div class="col-md-3">
        <h3 class="footer-title">Siga-nos</h3>
        <?php
        if(isset($cliente['facebook']) && $cliente['facebook']!=""){
          ?>
          <a href="<?=$cliente['facebook']?>" target="_blank" class="social-circle m-2"><span class="fab fa-facebook"></span></a>
          <?php
        }
        if(isset($cliente['instagram']) && $cliente['instagram']!=""){
          ?>
          <a href="<?=$cliente['instagram']?>" target="_blank" class="social-circle m-2"><span class="fab fa-instagram"></span></a>
          <?php
        }if(isset($cliente['youtube']) && $cliente['youtube']!=""){
          ?>
          <a href="<?=$cliente['youtube']?>" target="_blank" class="social-circle m-2"><span class="fab fa-youtube"></span></a>
          <?php
        }
        if(isset($cliente['googleplus']) && $cliente['googleplus']!=""){
          ?>
          <a href="<?=$cliente['googleplus']?>" target="_blank" class="social-circle m-2"><span class="fab fa-googleplus"></span></a>
          <?php
        }
        ?>
       <!--  <a href="#" class="social-circle m-2"><span class="fab fa-twitter"></span></a>
        <a href="#" class="social-circle m-2"><span class="fab fa-facebook"></span></a>
        <a href="#" class="social-circle m-2"><span class="fab fa-instagram"></span></a>
        <a href="#" class="social-circle m-2"><span class="fab fa-dribbble"></span></a>
        <a href="#" class="social-circle m-2"><span class="fab fa-linkedin"></span></a> -->
      </div>
    </div>

    <div class="row">
      <div class="col-12 text-center">
        <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          <?=$cliente['nome']?> &copy;
          <script>
            document.write(new Date().getFullYear());
          </script> Todos os direitos reservados | Desenvolvido por <a target="_blank" href="https://jotagomes.com.br" >Agência Jota Gomes</a>
        </p>  
      </div>
    </div>
  </div>
</footer>
</div> <!-- .site-wrap -->
<?php
$whatsapp = $cliente['whatsapp'];
$whatsapp = str_replace('(', '', $whatsapp);
$whatsapp = str_replace(')', '', $whatsapp);
$whatsapp = str_replace(' ', '', $whatsapp);
$whatsapp = str_replace('-', '', $whatsapp);
$whatsapp = str_replace('+', '', $whatsapp);
if(strlen($whatsapp) < 13){
  $whatsapp = '55'.$whatsapp;
}
?>
<a class="botao-whatsapp btn btn-success" target="_blank" href="https://wa.me/<?=$whatsapp?>"><i class="fab fa-1x fa-whatsapp"></i> Fale Conosco</a>
<script type="text/javascript">
 function categorias(){
  $("#todas-categorias").click();
}

$(document).ready(function() {
  $("#form-contato").submit(function(){
    event.preventDefault();
    var nome = $("#nome").val();
    var email = $("#email").val();
    var telefone = $("#telefone").val();
    var assunto = $("#assunto").val();
    var mensagem = $("#mensagem").val();
    var origem = $("#origem").val();
    var datacadastro = $("#datacadastro").val();
    var newsletter = $("#newsletter").val();

    var contato = {
      'nome' : nome,
      'email' : email,
      'telefone' : telefone,
      'datacadastro' : datacadastro,
      'origem' : origem,
      'newsletter' : newsletter
    }


    console.log(contato);
    console.log(mensagem);

    ajaxRequest= $.ajax({
      url: "./enviar-mensagem.php",
      type: "post",
      data: dados
    });

    ajaxRequest.done(function (response, textStatus, jqXHR){
      var mensagem = {
        'tipo' : 'email',
        'destinatario' : 'portal',
        'remetente' : email,
        'canal' : origem,
        'contato' : contato,
        'assunto' : assunto,
        'mensagem' : mensagem,
        'data' : datacadastro
      };
      $("#resultado-email").html(response);
    });
  })
});
</script>
<script src="<?=$tema?>js/jquery-ui.js"></script>
<script src="<?=$tema?>js/popper.min.js"></script>
<script src="<?=$tema?>js/bootstrap.min.js"></script>
<script src="<?=$tema?>fontawesome-5/js/fontawesome.min.js"></script>
<script src="<?=$tema?>js/owl.carousel.min.js"></script>
<script src="<?=$tema?>js/jquery.easing.1.3.js"></script>
<script src="<?=$tema?>js/aos.js"></script>
<script src="<?=$tema?>js/jquery.fancybox.min.js"></script>
<script src="<?=$tema?>js/jquery.sticky.js"></script>
<script src="<?=$tema?>js/isotope.pkgd.min.js"></script>

<script src="<?=$tema?>js/main.js"></script>
</body>
</html>