<?php
include_once('./modulos/cfg/conexao.php');
include_once('./modulos/cfg/funcoes.php');
$cadastro = $_REQUEST['cadastro_enviar'];
$mensagem = $_REQUEST['mensagem_enviar'];
$inserir = crud('inserir-contato', 'contato', $cadastro, 'sucesso', 'falha', '');
if($inserir !=  "falha"){
	if($mensagem['tipo']=='email'){
		$mensagem['contato'] = $inserir;
		$inserir = crud('inserir-contato', 'mensagem', $mensagem, 'sucesso', 'falha', '');
		if($inserir !=  "falha"){
			$to      = $mensagem['destinatario'];
			$from      = $mensagem['remetente'];
			$subject = $mensagem['assunto'];
			$message = $mensagem['mensagem'];
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= 'From: '.$from . "\r\n" .
			'Reply-To: '.$from . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			$message = html_entity_decode($message);
			if(mail($to, $subject, $message, $headers)){
				$retorno = "E-mail enviado com sucesso";
			}else{
				$retorno = "E-mail não enviado";
			}
			echo $retorno;
		}else{
			echo "Falha";
		}
	}else{
		$mensagem['contato'] = $inserir;
		$inserir = crud('inserir-contato', 'mensagem', $mensagem, 'sucesso', 'falha', '');
		if($inserir !=  "falha"){
			$link = "https://api.whatsapp.com/send?phone=".$mensagem['destinatario']."&text=".$mensagem['mensagem'];		
			$retorno = "<script>window.open('".$link."');</script>";		
			echo $retorno;
		}else{
			echo "Falha";
		}
	}
}else{
	echo "Falha";
}
?>