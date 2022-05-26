  <?php
  error_reporting(E_ALL); ini_set("display_errors", 1);
  if(!file_exists('./gerenciamento/modulos/cfg/credenciais.json')){
    include('./templates/construcao/index.php');
    die();
  }  
  include_once('./gerenciamento/modulos/cfg/conexao.php');
  include_once('./gerenciamento/modulos/cfg/funcoes.php');
  
  $credenciais = credenciais('frontend');
  extract($credenciais);
  $conexao = conectaBanco($hostname, $dbname, $username, $password);

  $etapa = checarInstalacao('frontend');
  // die(var_dump($etapa));

  if($etapa!='completo'){
    include('./templates/construcao/index.php');
    die();
  }
  
  $cliente = crud_front('listar', 'cliente', 'LIMIT 1', '', '', '');
  $template = crud_front('listar', 'template', 'LIMIT 1', '', '', '');
  $seo = crud_front('listar', 'seo', 'LIMIT 1', '', '', '');

  $icone_mostrar = ($seo['icone']=='') ? './gerenciamento/assets/img/icone-generico.png' : './gerenciamento/uploads/'.$seo['icone'];
  

  $query = "SELECT * FROM servico ORDER BY id ASC";
  $servicos = $conexao->prepare($query);
  $servicos->execute();
  
  $query = "SELECT * FROM produto ORDER BY id ASC";
  $produtos = $conexao->prepare($query);
  $produtos->execute();

  $query = "SELECT * FROM depoimento WHERE landingpage IS NULL ORDER BY id ASC";
  $depoimentos = $conexao->prepare($query);
  $depoimentos->execute();
  
  $query = "SELECT categoria FROM portifolio WHERE categoria !='' GROUP BY categoria";
  $categorias = $conexao->prepare($query);
  $categorias->execute();
  
  $query = "SELECT * FROM portifolio ORDER BY id DESC";
  $portfolio = $conexao->prepare($query);
  $portfolio->execute();

  $tema = './templates/'.$template['tema'].'/';
  // die($tema);
  if(file_exists($tema)){
    include($tema.'index.php');
  }else{
    include('./templates/manutencao/index.php');
  }
  die();
  ?>
