<?php
error_reporting(E_ALL); ini_set("display_errors", 1);
include_once('./gerenciamento/modulos/cfg/conexao.php');
include_once('./gerenciamento/modulos/cfg/funcoes.php');
$credenciais = credenciais('frontend');
extract($credenciais);
$conexao = conectaBanco($hostname, $dbname, $username, $password);


if(isset($_POST['nome'])){
 $nome = $_POST['nome'];
 $whatsapp = $_POST['telefone'];
 $email = $_POST['email'];
 $cidade_uf = $_POST['cidade_uf'];
 $cep = $_POST['cep'];
 $valor_conta = $_POST['valor_conta'];
 $landingpage = $_POST['pagina'];
 $datacadastro=date("Y-m-d H:i:s");
 $origem = 'site';
 $dados = array(
  'nome' => $nome,
  'telefone' => $whatsapp,
  'email' => $email,
  'cidade_uf' => $cidade_uf,
  'cep' => $cep,
  'valor_conta' => $valor_conta,
  'datacadastro' => $datacadastro,
  'origem' => $origem,
  'landingpage' => $landingpage
);
 $franqueado = "SELECT * FROM usuario WHERE lp = '".$landingpage."'";
 $stmt_franqueado = $conexao->prepare($franqueado);
 $stmt_franqueado->execute();
 $franqueado = $stmt_franqueado->fetch(PDO::FETCH_ASSOC);

 $msg = $_POST['mensagem'];
 $contato = crud_front('inserir-contato', 'contato', $dados, 'sucesso', 'falha', '');
 $id_contato = $contato;
 $dados_msg = array(
  'tipo' => 'email',
  'destinatario' => $franqueado['email'],
  'remetente' => $email,
  'canal' => 'site',
  'contato' => $id_contato,
  'assunto' => 'Novo Lead Energy Brasil',
  'mensagem' => $msg,
  'data' => $datacadastro
);
 $f = $franqueado['id'];
 $u = $franqueado['codigo'];
 $l = $franqueado['lp'];

 $to = $franqueado['email'];
 $subject = "Novo Lead Energy Brasil";
 $txt = "Você recebeu um novo lead pelo formulário da sua landing page! Acesse seu painel administrativo e confira o que ".strtoupper($nome)." precisa. O código desse contato é o ".$id_contato.".";
 $headers = "From: no-reply@energybrasilsolar.com.br" . "\r\n" .
 "BCC: leads@energybrasilsolar.com.br, desenvolvimento@ascending.com.br";

 mail($to,$subject,$txt,$headers);

 $sucesso = "obrigado.php?f=$f&u=$u&l=$l";
 $mensagem = crud_front('inserir', 'mensagem', $dados_msg, $sucesso, 'falha', '');
 echo $mensagem;
 die();
}else{
  echo "<script>window.history.back()</script>";
  die();
}
?>
