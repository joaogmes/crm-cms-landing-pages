<?php
include('config.php');
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'landingpage';
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : 'entrar';
$acao = isset($_GET['acao']) ? $_GET['acao'] : '';
if($pagina == 'sair'){
	include('paginas/sair.php');
}
//VERIFICAR SE ESTÁ LOGADO
if(!check_session()){
	//AQUI ESTÁ SEM LOGAR
	include ('login.php');
}else{
	//AGORA TÁ LOGADO
	include('paginas/painel.php');
}
?>
