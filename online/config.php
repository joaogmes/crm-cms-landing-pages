<?php
date_default_timezone_set('America/Sao_Paulo');

// require_once('ZipArchive.php');

function database(){
	//CONEXAO AO BANCO
	global $conn;
	$host = 'br554.hostgator.com.br';
	$database = 'port9482_energy_lp';
	$user = 'port9482_energy';
	$password = '@Energy#2022';	
	// $host = 'localhost';
	// $database = 'energy';
	// $user = 'ascending';
	// $password = 'asc';
	try {
		$conn = new PDO('mysql:host='.$host.';dbname='.$database, $user, $password);
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

function cadastrarLP($nome, $dominio, $pasta, $cadastro, $status){
	$conn = database();

	$pasta = str_replace('http://', 'replace', $pasta);
	$pasta = str_replace('https://', 'replace', $pasta);
	$pasta = str_replace('www.', 'replace', $pasta);

	$query = "INSERT INTO landingpage (nome, dominio, pasta, cadastro, status) VALUES ('$nome', '$dominio', '$pasta', '$cadastro', '$status' )";
	$insercao = $conn->prepare($query);
	if($insercao->execute()){
		$id = $conn->lastInsertId();

	}else{
		throw new Exception("Erro ao cadastrar a landing page. Função de inserção!");
	}
}

function cadastrarUsuario($nome, $login, $senha, $tipo, $lp, $codigo, $whatsapp, $email, $scripts){
	$conn = database();
	$query = "INSERT INTO usuario (nome, login, senha, tipo, lp, codigo, whatsapp, email, scripts, status) VALUES ('$nome', '$login', '$senha', '$tipo', '$lp', '$codigo', '$whatsapp', '$email','$scripts', 'ativo')";
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
	$query = "SELECT * FROM landingpage WHERE status = '1' ";
	$listagem = $conn->prepare($query);
	$listagem->execute();
	return $listagem;
}

function verLP($id){
	$conn = database();
	$query = "SELECT * FROM landingpage WHERE id = '$id' ";
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

function listarLeads(){
	$conn = database();
	$query = "SELECT * FROM contato ORDER BY id DESC";
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


?>