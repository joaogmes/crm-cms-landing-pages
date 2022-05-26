<?php
include_once('./modulos/cfg/conexao.php');
include_once('./modulos/cfg/funcoes.php');
if(isset($_POST)){
	$dados = $_POST;
	$telefone = $dados['telefone'];
	$mensagem = $dados['mensagem'];
	$tipo = $dados['tipo'];
	unset($dados['telefone']);

	$message = $_POST['mensagem'];
	$message = addslashes($message);
	$message = htmlspecialchars($message);

	$dados['mensagem'] = $message;

	$inserir = crud('inserir', 'mensagem', $dados, 'sucesso', 'falha', '');

	if($inserir ==  "<script>window.location.href='sucesso';</script>"){
		if($tipo == 'whatsapp'){
			$mensagem_whats = str_replace(' ', '%20', $mensagem);
			$link = "https://api.whatsapp.com/send?phone=".$telefone."&text=".$mensagem_whats;		
			$retorno = "<script>window.open('".$link."');</script>";
		}else if($tipo == 'email'){
			$to      = $_POST['destinatario'];
			$subject = $_POST['assunto'];
	
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= 'From: contato@jotagomes.com.br' . "\r\n" .
			'Reply-To: contato@jotagomes.com.br' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

			$message = html_entity_decode($message);

			if(mail($to, $subject, $message, $headers)){
				$retorno = "E-mail enviado com sucesso";
			}else{
				$retorno = "E-mail não enviado";
			}
		}
		echo $retorno;
	}else if($inserir ==  "<script>window.location.href='falha';</script>"){
		echo "Inserção não realizada!";
	}else{
		echo "Problema não identificado";
	}
}else{
	echo 'false';	
}
?>