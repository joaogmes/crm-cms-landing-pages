<?php
error_reporting(E_ALL); ini_set("display_errors", 1);
include_once('./gerenciamento/modulos/cfg/conexao.php');
include_once('./gerenciamento/modulos/cfg/funcoes.php');
$credenciais = credenciais('frontend');
extract($credenciais);
$conexao = conectaBanco($hostname, $dbname, $username, $password);

$icone = "SELECT icone FROM seo WHERE id=1";
$stmt_icone = $conexao->prepare($icone);
$stmt_icone->execute();
$icone = $stmt_icone->fetch(PDO::FETCH_ASSOC);
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>WhatsApp</title>
  <style type="text/css" media="screen">
    body{
      margin:0;
      padding: 0;
    }
    /* width */
    ::-webkit-scrollbar {
      width: 3px;
    }

/* Track */
::-webkit-scrollbar-track {
  background: transparent;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
.container{
 display: flex;
 width: 100vw;
 background: #333;
 flex-direction: column;
 align-items: center;
 justify-content: center;
 align-content: center;
 flex-wrap: nowrap;
 font-family: sans-serif;
 text-align: center;
 height: 100vh;
 overflow: hidden;
}
.conteudo{
  display: flex;
  /* min-width: 70%; */
  max-width: 600px;
  margin: 1rem; 
  /* padding-bottom: 0rem; */
  background: #128C7E;
  border-radius: 10px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  align-content: center;
}
.logotipo{
  min-width: 150px;
  max-width: 50%;
  margin:1rem;
}
hr{
  min-width: 80px;
  max-width: 70%;
  border: 1px solid #57b33c;
}
.icones{
  display: flex;
  background: #57b33c;
  width: 100%;
  padding: 2rem;
  margin-top: 1rem;
  flex-direction: row;
  flex-wrap: nowrap;
  align-content: center;
  justify-content: center;
  align-items: center;
}
.icones ul{
}
.icones li{
  display: inline-block;
  margin: 1rem;
  padding: 1rem;
  border: 1px solid #fff;
  border-radius: 5px;
  color:#fff;
}
.icones li:hover{
  transform: scale(1.1);
}
.icones li a,  .icones li a:active{
  color:#fff;
  font-weight: bold;
  text-decoration: none;
}
.icones li:hover a{
  font-weight: bolder
}
.bg{
  background-image: url(img/whatsapp-bg.jpg);
  padding-top: 1px;
  border-radius: 0 0 10px 10px;
}
.conversa{
  width: 100%;
  /* background-image: url(https://i.pinimg.com/736x/8c/98/99/8c98994….jpg); */
  /* background-image: url(img/whatsapp-bg.png); */
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  height: 65vh;
  overflow: auto;
  border-radius: 0 0 10px 10px;
}
.conversa p{
  display: block;
  padding: 10px;
  margin: 10px;
  border-radius: 10px 10px 10px 0px;
  background: #fff;
  text-align: left;
  box-shadow: 1px 1px 10px #ededed;
  line-height: 22px;
}
.perfil{
  display: flex;
  align-content: center;
  justify-content: space-between;
  align-items: center;
  flex-direction: row;
  flex-wrap: nowrap
}
.perfil .img{
 display: flex;
 background: #ffffff;
 width: 30px;
 height: 30px;
 padding: 10px;
 border-radius: 100%;
 margin: 10px;
 flex-direction: column;
 flex-wrap: nowrap;
 justify-content: center;
 align-content: center;
 align-items: center;
 margin-right: 20px;
 margin-left: -10rem;
 left: 10px;
}
.perfil .nome{
  display: flex;
  width: auto;
  color: #fff;
  text-transform: capitalize;
}

.nome h3{
  /*margin-left: -2rem;*/
}
.img img{
  width: 100%;
}
.chat{
  display: flex;
  width: 100%;
  padding-top: 1.4rem;
  margin: -1rem 0 0 0;
  border-radius: 0 0 10px 10px;
  justify-content: center;
  align-content: center;
  align-items: center;
  flex-wrap: nowrap;
  flex-direction: row;
  padding-bottom: 0rem;
}
.chat form{
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  align-content: flex-start;
  justify-content: space-around;
  align-items: center;
  width: 90%;
}
form input{
  display: flex;
  width: 100%;
  height: 45px;
  margin-right: 10px;
  border-radius: 30px;
  outline: none;
  border: solid 1px #dbdbdb;
  padding: 10px 25px 10px 25px;
  color: #333;
  box-shadow: 0 0 10px #cfcfcf;
  font-size: 14px
}
.chat button{
  /*width: 60px;*/
  /*height: 60px;*/
  border-radius: 100%;
  background: #388c7e;
  border: none;
  outline: none;
  /* margin: 0; */
  color: #fff;
  display: flex;
  flex-wrap: nowrap;
  justify-content: flex-end;
  align-items: center;
  padding: 0 3px 0px 0;
  box-shadow: 0 0 10px #cfcfcf;
}
.chat button img{
  width: 30px;
  height: 30px;
}
.chat button:hover{
  cursor: pointer;
}
p.msg{
  text-align: right;
  background-color: #d9fdd3;
  border-radius: 10px 10px 0px 10px !important;
}
</style>
<!-- <link rel="shortcut icon" href="assets/icon/icone_novael.png"> -->
<!-- <link rel="apple-touch-icon-precomposed" href="assets/icon/icone_novael.png"> -->
<!-- Meta Pixel Code -->
</head>
<body>
  <?php
  $g_afiliado = $_GET['f'];
  $g_curso = $_GET['u'];
  $lp = $_GET['l'];
  $afiliado = "SELECT * FROM usuario WHERE id = $g_afiliado";
  $stmt_afiliado = $conexao->prepare($afiliado);
  $stmt_afiliado->execute();
  $afiliado = $stmt_afiliado->fetch(PDO::FETCH_ASSOC);
  $lp = "SELECT * FROM landingpage WHERE id = ".$afiliado['lp'];
  $stmt_lp = $conexao->prepare($lp);
  $stmt_lp->execute();
  $lp = $stmt_lp->fetch(PDO::FETCH_ASSOC);

  // socorro
  if(isset($_POST['nome_hid'])){
    $nome = $_POST['nome_hid'];
    $msg_nome = "<p class='msg'><strong>Você:</strong><br>".$nome."</p>";
    $msg_nome .= "<p><strong>".$afiliado['nome'].":</strong><br>Valeu ".$nome."!</p>";
    $msg_nome .= "<p><strong>".$afiliado['nome'].":</strong><br>Agora vocẽ me passa qual é número do seu WhatsApp com DDD? 🤔</p>";
    $msg_whatsapp='';
    if(isset($_POST['telefone'])){
      $whatsapp = $_POST['telefone'];
      $msg_whatsapp = "<p class='msg'><strong>Você:</strong><br>".$whatsapp."</p>";
      $msg_whatsapp .= "<p><strong>".$afiliado['nome']."</strong><br>Jóia!</p>";
      $msg_whatsapp .= "<p><strong>".$afiliado['nome']."</strong><br>Última informação ".$nome.", digita seu e-mail fazendo favor 🙏🏻</p>";
      $campo = 'email';
      $msg_email='';
    //CADASTRO DO CONTATO
    }else if(isset($_POST['email'])){
      $nome = $_POST['nome_hid'];
      $whatsapp = $_POST['telefone_hid'];
      $email = $_POST['email'];
      $datacadastro=date("Y-m-d H:i:s");
      $origem = 'site';
      $landingpage = $lp['id'];
      $dados = array(
        'nome' => $nome,
        'telefone' => $whatsapp,
        'email' => $email,
        'datacadastro' => $datacadastro,
        'origem' => $origem,
        'landingpage' => $landingpage
      );
      $mensagem_1 = "Oi, gostaria de falar com um consultor Energy Brasil";
      if($afiliado['mensagem_whatsapp']!=''){
        $mensagem_1 = $afiliado['mensagem_whatsapp'];
      }
      $mensagem = str_replace(" ", "%20", $mensagem_1);
      $sucesso = "https://api.whatsapp.com/send?phone=".$afiliado['whatsapp']."&text=".$mensagem;
      $contato = crud_front('inserir-contato', 'contato', $dados, 'sucesso', 'falha', '');
      $id_contato = $contato;
      $dados_msg = array(
        'tipo' => 'whatsapp',
        'destinatario' => $afiliado['whatsapp'],
        'remetente' => $whatsapp,
        'canal' => 'site',
        'contato' => $id_contato,
        'assunto' => 'Contato via WhatsApp',
        'mensagem' => $mensagem_1,
        'data' => $datacadastro
      );
      $mensagem = crud_front('inserir', 'mensagem', $dados_msg, $sucesso, 'falha', '');
      echo $mensagem;
      die();
    }
  }
  else if(isset($_POST['nome'])){
    $nome = $_POST['nome'];
    $msg_nome = "<p class='msg'><strong>Você:</strong><br>".$nome."</p>";
    $msg_nome .= "<p><strong>".$afiliado['nome'].":</strong><br>Valeu ".$nome."!</p>";
    $msg_nome .= "<p><strong>".$afiliado['nome'].":</strong><br>Agora vocẽ me passa qual é número do seu WhatsApp com DDD? 🤔</p>";
    $campo = "telefone";
    $msg_whatsapp='';
    $msg_email='';
  }else{
    $msg_nome='';
    $msg_whatsapp='';
    $msg_email='';
    $campo = 'nome';
  }
  ?>
  <div class="container">
    <div class="conteudo">
      <div class="perfil">
        <div class="img">
          <img src="./gerenciamento/uploads/<?=$icone['icone']?>">
        </div>
        <div class="nome">
          <h3><small><?=$afiliado['nome']?></small></h3>
        </div>
      </div>
      <!-- <hr> -->
      <div class="bg">
        <div class="conversa">
          <p>
            <strong><?=$afiliado['nome']?>:</strong><br>
          Oi, tudo bem!?</p>
          <p>
            <strong><?=$afiliado['nome']?>:</strong><br>
            Antes de ir pro WhatsApp preciso saber seu nome, como você chama?
          </p>
          <?=$msg_nome.$msg_whatsapp.$msg_email?>
        </div>
        <div class="chat" id="chat">
          <form method="POST" accept-charset="utf8">
            <?php
            if($campo=='telefone'){
              ?>
              <input type="hidden" name="nome_hid" value="<?=$nome?>">
              <?php
            }if($campo=='email'){
              ?>
              <input type="hidden" name="nome_hid" value="<?=$nome?>">
              <input type="hidden" name="telefone_hid" value="<?=$whatsapp?>">
              <?php
            }
            ?>
            <input type="text" name="<?=$campo?>" autofocus>
            <button><i class="fa-solid fa-2x fa-paper-plane" style="margin: 0.7rem;"></i></button>
          </form>
        </div>
      </div>
        <!-- <div class="icones">
          <ul>
            <a href="tel:5519991046556" target="_blank"><li>Ligar</li></a>
            <a href="https://wa.me/5519991046556" target="_blank"><li>WhatsApp</li></a>
            <a href="mailto:comercial@novael.com.br" target="_blank"><li>Email</li></a>
          </ul>
        </div> -->
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.conversa').scrollTop($('.conversa')[0].scrollHeight);
      })
    </script>
  </body>
  </html>