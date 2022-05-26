<?php
error_reporting(E_ALL); ini_set("display_errors", 1);
include_once('./gerenciamento/modulos/cfg/conexao.php');
include_once('./gerenciamento/modulos/cfg/funcoes.php');
$credenciais = credenciais('frontend');
extract($credenciais);
$conexao = conectaBanco($hostname, $dbname, $username, $password);

$lojas = "SELECT * FROM landingpage WHERE status = 1";
$stmt_lojas = $conexao->prepare($lojas);
$stmt_lojas->execute();
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>Lojas Energy Brasil</title>
  <style type="text/css" media="screen">
    body{
      margin:0;
      padding: 0;
    }
    .container{
      display: flex;
      width: 100vw;
      background: #f9f9f9;
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
      /*min-width: 70%;*/
      max-width: 600px;
      margin: 1rem;
      padding: 2rem;
      background: #fff;
      border-radius: 10px;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      align-content: center;
      box-shadow: 1px 1px 1px #ebebeb;
    }
    .logotipo{
      min-width: 150px;
      max-width: 50%;
      margin:1rem;
    }
    hr{
      min-width: 80px;
      max-width: 70%;
      border: 1px solid #01299b;
    }
    .icones{
      display: flex;
      background: #01299b;
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
    .conversa{
      width: 100%;
      /*background-image: url('https://i.pinimg.com/736x/8c/98/99/8c98994518b575bfd8c949e91d20548b.jpg');*/
      background-image: url('img/whats-bg2.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 50vh;
      overflow: auto;
    }
    .conversa p{
      display: block;
      padding: 10px;
      margin: 10px;
      border-radius: 10px;
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
      background: #d1d1d1;
      width: 50px;
      height: 50px;
      padding: 10px;
      border-radius: 100%;
      margin: 4px;
      flex-direction: column;
      flex-wrap: nowrap;
      justify-content: center;
      align-content: center;
      align-items: center;
      margin-right: 20px;
      margin-left: -130px;
      left: 10px;
    }
    .perfil .nome{
      display: flex;
    }
    .img img{
      width: 100%;
    }
    .chat{
      display: flex;
      padding-top: 13px;
      width: 100%;
      background: #e3e3e3;
      border-radius: 0 0 10px 10px;
      padding-bottom: 13px;
      justify-content: center;
      align-content: center;
      align-items: center;
      flex-wrap: nowrap;
      flex-direction: row;
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
      margin: 10px;
      border-radius: 10px;
      outline: none;
      border: none;
      padding: 15px;
    }
    .chat button{
      width: 50px;
      height: 60px;
      border-radius: 100%;
      background: #ccc;
      border: none;
      outline: none;
      padding: 10px;
      display: flex;
      flex-wrap: nowrap;
      justify-content: flex-end;
      align-items: center;
      padding-bottom: 0px
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
    }
  </style>
  <!-- <link rel="shortcut icon" href="assets/icon/icone_novael.png"> -->
  <!-- <link rel="apple-touch-icon-precomposed" href="assets/icon/icone_novael.png"> -->
  <!-- Meta Pixel Code -->
</head>
<body>
  <div class="container">
    <div class="conteudo">
      <!-- <img class="logotipo" src="https://www.invencivelprepara.com/wp-content/uploads/2021/12/SEM-FUNDO-768x168.png"> -->
      <h2>Energy Brasil</h2>
      <h3>Nossas Lojas</h3>
      <hr>
      <?php
        while($loja = $stmt_lojas->fetch(PDO::FETCH_ASSOC)){
          echo "<a href='./".$loja['dominio']."/'><p>Loja: <strong>".$loja['nome']."</strong></p></a>";
        }
      ?>
    <!--   <div class="icones">
        <ul>
          <a href="tel:5517997189003" target="_blank"><li>Ligar</li></a>
          <a href="https://wa.me/5517997189003" target="_blank"><li>WhatsApp</li></a>
          <a href="mailto:invencivelcursos@gmail.com" target="_blank"><li>Email</li></a>
        </ul>
      </div> -->
    </div>
  </div>
</body>
</html>