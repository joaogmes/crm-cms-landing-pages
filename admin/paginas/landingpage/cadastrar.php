<?php
if(isset($_POST['nome'])){
	$nome = $_POST['nome'];
	$dominio = $_POST['dominio'];
	$pasta = $_POST['dominio'];
	$cadastro = date('Y-m-d H:i:s');
	$satus = '1';
	try{
		$cadastro = cadastrarLP($nome, $dominio, $pasta, $cadastro, $satus);
		$id = $conn->lastInsertId();
		// try{
			// 	$lp = criarLP($id);
			// 	echo $lp;
			// 	die();
		// }catch(Exception $e){
			// 	echo $e->getMessage();
			// 	die();
		// }
		echo "<script>window.location.href='./?pagina=usuario&lp=".$cadastro."';</script>";
	}catch(Exception $e){
		echo $e->getMessage();
		die();
	}
}
?>
<h5>Cadastro de Landing Page</h5>
<hr>
<div class="alert alert-primary" role="alert">
	<strong>Aviso importante:</strong> para que as landing pages funcionem corretamente é necessário que o domínio já esteja devidamente configurado. Caso precise de ajudar clique <strong><a href="./?pagina=tutorial" target="_blank">aqui</a></strong> para acessar o tutorial
</div>
<form method="POST" accept-charset="utf8">
	<div class="row">
		<div class="form-group mt-3 col-sm-5">
			<input class="form-control " type="text" name="nome" placeholder="Nome da página" required>
		</div>
		<div class="form-group mt-3 col-sm-5">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="url">https://energybrasilsolar.com.br/lojas/</span>
			</div>
			<input class="form-control " type="text" aria-describedby="url" name="dominio" placeholder="nome-da-unidade" required>
		</div>
		</div>
		<div class="form-group mt-3 col-sm-2">
			<input class="form-control " type="submit" value="Enviar">
		</div>
	</div>
</div>
</form>