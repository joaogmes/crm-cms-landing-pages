<?php
date_default_timezone_set('America/Sao_Paulo');

// require_once('ZipArchive.php');

function database(){
	//CONEXAO AO BANCO
	global $conn;
	// $host = 'br554.hostgator.com.br';
	// $database = 'port9482_energy_lp';
	// $user = 'port9482_energy';
	// $password = '@Energy#2022';	
	$host = 'localhost';
	$database = 'energy';
	$user = 'root';
	$password = 'root';
	try {
		$conn = new PDO('mysql:host='.$host.';dbname='.$database, $user, $password);
		$conn->query('set character_set_client=utf8');
		$conn->query('set character_set_connection=utf8');
		$conn->query('set character_set_results=utf8');
		$conn->query('set character_set_server=utf8');
		$status = $conn;
	} catch(PDOException $e) {
		$status = 'ERROR: ' . $e->getMessage();
	} finally{
		return $status;
	}
}

function check_session(){
	session_start();
	if(isset($_SESSION['u_id'])){
			//VERIFICA SE TEM USUÁRIO LOGADO
		return true;
	}else{
			//TEM SESSÃO MAS SEM LOGIN
		return false;
	}
}

function login($usuario, $senha){
	//FAZ LOGIN E VALIDA USUÁRIO
	$conn = database();
	$query = "SELECT * FROM usuario WHERE login = '".$usuario."' AND senha = '".$senha."' AND status = 'ativo' AND tipo = 'admin'";
	$stmt = $conn->prepare($query);
	try{
		$stmt->execute();
		$count = $stmt->rowCount();
	// die(var_dump($count));
		if($count > 0){
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$status = $result;
			session_start();
			$_SESSION['nome'] = $result['nome'];
			$_SESSION['usuario'] = $result['login'];
			$_SESSION['u_id'] = $result['id'];
			$_SESSION['tipo'] = $result['tipo'];
			$_SESSION['lp'] = $result['lp'];
			return 0;
		}else{
			//NENHUM USUÁRIO ENCONTRATO
			return 1;
		}
	}catch(PDOException $e){
		//ERRO NA EXECUÇÃO DA QUERY
		return 2;
	}
	// return $status;
}

function verificarUrl($dominio){
	$conn = database();
	$query = "SELECT * FROM landingpage WHERE dominio = '".$dominio."' OR pasta = '".$dominio."'";
	$stmt_url = $conn->prepare($query);
	$stmt_url->execute();
	if($stmt_url->rowCount()>0){
		return false;
	}else{
		return true;
	}
}

function cadastrarLP($nome, $dominio, $pasta, $cadastro, $status){
	$conn = database();

	$pasta = str_replace('http://', '', $pasta);
	$pasta = str_replace('https://', '', $pasta);
	$pasta = str_replace('www.', '', $pasta);
	$pasta = str_replace('.com', '', $pasta);
	$pasta = str_replace('.br', '', $pasta);

	if(!verificarUrl($dominio) || !verificarUrl($pasta)){
		$url = "https://energybrasilsolar.com.br/lojas/".$dominio;
		throw new Exception("A url <b>".$url."</b> já está em uso, selecione outra");
	}

	$query = "INSERT INTO landingpage (nome, dominio, pasta, cadastro, status) VALUES ('$nome', '$dominio', '$pasta', '$cadastro', '$status' )";
	$insercao = $conn->prepare($query);
	if($insercao->execute()){
		$id = $conn->lastInsertId();
		return $id;
	}else{
		throw new Exception("Erro ao cadastrar a landing page. Função de inserção!");
	}
}

function cadastrarUsuario($nome, $login, $senha, $tipo, $lp, $codigo, $whatsapp, $email,$pixel, $scripts){
	$conn = database();
	$query = "INSERT INTO usuario (nome, login, senha, tipo, lp, codigo, whatsapp, email, pixel, scripts, status) VALUES ('$nome', '$login', '$senha', '$tipo', '$lp', '$codigo', '$whatsapp', '$email','$pixel', '$scripts', 'ativo')";
	$stmt_cadastrar = $conn->prepare($query);
	try{
		$stmt_cadastrar->execute();
		$usuario = $conn->lastInsertId();
		return true;
	}catch (Exception $e){
		$erro = $e->getMessage();
		return $erro;
	}
}

function criarLP($id){
	$conn = database();

	$query = "SELECT * FROM landingpage WHERE id = '".$id."'";
	$lp = $conn->prepare($query);
	$lp->execute();
	$pagina = $lp->fetch(PDO::FETCH_ASSOC);

	$pasta = './lps/'.$pagina['pasta'].'/';
	if(!is_dir($pasta)){
		mkdir($pasta);
	}

	$zip = new ZipArchive;
	$res = $zip->open('./matriz/landingenergy.zip');
	if ($res === true) {
		$zip->extractTo($pasta);
		$zip->close();
		echo('Extração completa, clique na listagem para visualizar a página');
	} else {
		throw new Exception('Erro ao completar extração!.');
	}
}

function listarLP(){
	$conn = database();
	$query = "SELECT l.*, u.nome as franqueado, u.email, u.whatsapp FROM landingpage l, usuario u WHERE l.status = '1' AND l.id = u.lp ORDER BY l.id DESC";
	$listagem = $conn->prepare($query);
	$listagem->execute();
	return $listagem;
}

function nomeLP($id){
	$conn = database();
	$query = "SELECT nome FROM landingpage WHERE id = ".$id;
	$stmt_query = $conn->prepare($query);
	$stmt_query->execute();
	$nomeLP = $stmt_query->fetch(PDO::FETCH_ASSOC);
	$nome = $nomeLP['nome'];
	return $nome;
}

function filtrarLP($chave, $valor){
	$conn = database();
	switch ($chave){
		case 'nome':
		$chave = 'l.nome';
		break;
		case 'franqueado':
		$chave = 'u.nome';
		break;
		case 'whatsapp':
		$chave = 'u.whatsapp';
		break;
		case 'email':
		$chave = 'u.email';
		break;
	}
	$query = "SELECT l.*, u.nome as franqueado, u.email, u.whatsapp FROM landingpage l, usuario u WHERE l.status = '1' AND l.id = u.lp AND ".$chave." LIKE '%".$valor."%' ORDER BY l.id DESC";
	// die($query);
	$listagem = $conn->prepare($query);
	$listagem->execute();
	return $listagem;
}

function verLP($id){
	$conn = database();
	$query = "SELECT * FROM landingpage WHERE id = '".$id."' ";
	$listagem = $conn->prepare($query);
	$listagem->execute();
	return $listagem;
}


function desativarLP($id){
	$conn = database();
	$query = "UPDATE landingpage SET status = 0 WHERE id = $id";
	$desativacao = $conn->prepare($query);
	if($desativacao->execute()){
		return true;
	}else{
		return false;
	}
}

function atualizarLP($nome, $dominio, $id){
	$conn = database();
	$lp = verLP($id);
	$lp = $lp->fetch(PDO::FETCH_ASSOC);

	if($dominio == $lp['dominio']){
		$link = '';
	}else{
		if(verificarUrl($dominio)){
			//pode alterar
			$link = ", dominio = '".$dominio."', pasta = '".$dominio."' ";
		}else{
			//já tem essa url
			$erro_url = '<div class="alert alert-danger" role="alert">
			<strong>Erro:</strong> A URL <b>https://energybrasilsolar.com.br/'.$dominio.'</b> já está em uso, escolha outra que ainda não esteja em uso. <a onclick="window.history.back()"><i>Clique aqui</i> para voltar Voltar</a>
			</div>';
			die($erro_url);
		}
	}
	$query = "UPDATE landingpage SET nome = '".$nome."'".$link."  WHERE id = '".$id."'";
	$atualizar = $conn->prepare($query);
	if($atualizar->execute()){
		return true;
	}else{
		return false;
	}
}

function atualizarUsuario($id, $nome, $login, $senha, $email, $status, $codigo, $whatsapp, $pixel, $scripts){
	$conn = database();
	$update = "UPDATE usuario SET
	nome = '".$nome."',
	login = '".$login."',
	senha = '".$senha."',
	email = '".$email."',
	status = '".$status."',
	codigo = '".$codigo."',
	whatsapp = '".$whatsapp."',
	pixel = '".$pixel."',
	scripts = '".$scripts."'
	WHERE id = ".$id;
	$stmt_update = $conn->prepare($update);
	if($stmt_update->execute()){
		return true;
	}else{
		return false;
	}
}

function verUsuario($lp){
	$conn = database();
	$query = "SELECT * FROM usuario WHERE lp = '".$lp."'";
	$stmt_usuario = $conn->prepare($query);
	$stmt_usuario->execute();
	return $stmt_usuario;
}

function listarLeads(){
	$conn = database();
	$query = "SELECT * FROM contato ORDER BY id DESC";
	$listagem = $conn->prepare($query);
	$listagem->execute();
	return $listagem;
}

function verLeads($lp){
	$conn = database();
	$query = "SELECT * FROM contato WHERE landingpage = ".$lp." ORDER BY id DESC ";
	$listagem = $conn->prepare($query);
	$listagem->execute();
	return $listagem;
}

function filtrarLeadsLp($chave, $valor, $lp){
	$conn = database();
	$query = "SELECT * FROM contato WHERE ".$chave." LIKE '%".$valor."%' AND landingpage = ".$lp." ORDER BY id DESC";
	$listagem = $conn->prepare($query);
	$listagem->execute();
	return $listagem;
}

function filtrarLeads($chave, $valor){
	$conn = database();
	$query = "SELECT * FROM contato WHERE ".$chave." LIKE '%".$valor."%' ORDER BY id DESC";
	$listagem = $conn->prepare($query);
	$listagem->execute();
	return $listagem;
}

function listarMensagens(){
	$conn = database();
	$query = "SELECT * FROM mensagem ORDER BY id DESC";
	$listagem = $conn->prepare($query);
	$listagem->execute();
	return $listagem;
}
function verMensagens($lp){
	$conn = database();
	$query = "SELECT m.*, c.id as franqueado, c.landingpage FROM mensagem m, contato c WHERE c.landingpage = ".$lp." AND c.id = m.contato ORDER BY m.id DESC ";
	// die($query);
	$listagem = $conn->prepare($query);
	$listagem->execute();
	return $listagem;
}

function filtrarMensagensLp($chave, $valor, $lp){
	$conn = database();
	switch ($chave) {
		case 'contato':
		$chave = "c.nome";
		break;
		case 'id':
		$chave = "m.id";
		break;
		case 'id_contato':
		$chave = "c.id";
		break;
		case 'tipo':
		$chave = "m.tipo";
		break;
		case 'destinatario':
		$chave = "m.destinatario";
		break;
		case 'remetente':
		$chave = "m.remetente";
		break;
		case 'canal':
		$chave = "m.canal";
		break;
		
		default:
			// code...
		break;
	}
	$query = "SELECT m.*, c.id as franqueado, c.landingpage FROM mensagem m, contato c WHERE c.landingpage = ".$lp." AND c.id = m.contato AND ".$chave." LIKE '%".$valor."%' ORDER BY m.id DESC ";
	$listagem = $conn->prepare($query);
	$listagem->execute();
	return $listagem;
}

function filtrarMensagens($chave, $valor){
	$conn = database();
	$query = "SELECT * FROM mensagem WHERE ".$chave." LIKE '%".$valor."%' ORDER BY id DESC";
	$listagem = $conn->prepare($query);
	$listagem->execute();
	return $listagem;
}

function filtrarMensagensContato($contato){
	$conn = database();
	$query = "SELECT * FROM mensagem WHERE contato = ".$contato;
	$listagem = $conn->prepare($query);
	$listagem->execute();
	return $listagem;
}

function filtrarMensagensLpContato($chave, $valor, $lp, $contato){
	$conn = database();
	switch ($chave) {
		case 'contato':
		$chave = "c.nome";
		break;
		case 'id':
		$chave = "m.id";
		break;
		case 'id_contato':
		$chave = "c.id";
		break;
		case 'tipo':
		$chave = "m.tipo";
		break;
		case 'destinatario':
		$chave = "m.destinatario";
		break;
		case 'remetente':
		$chave = "m.remetente";
		break;
		case 'canal':
		$chave = "m.canal";
		break;
		
		default:
			// code...
		break;
	}
	$query = "SELECT m.*, c.id as franqueado, c.landingpage FROM mensagem m, contato c WHERE c.landingpage = ".$lp." AND c.id = m.contato AND ".$chave." LIKE '%".$valor."%' ORDER BY m.id DESC ";
	$listagem = $conn->prepare($query);
	$listagem->execute();
	return $listagem;
}

?>