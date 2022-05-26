<?php
if(isset($_GET['id'])){
	$id_lp = $_GET['id'];
	$landingpage = verLP($id_lp);
	$lp = $landingpage->fetch(PDO::FETCH_ASSOC);

	$usuario = verUsuario($id_lp);
	$usuario = $usuario->fetch(PDO::FETCH_ASSOC);

	$refresh = "<script>window.location.href='./?pagina=landingpage&acao=editar&id=".$id_lp."'</script>";

	$formulario = (isset($_POST['formulario'])) ? $_POST['formulario'] : false;
	if($formulario){
		switch ($formulario) {
			case 'landingpage':
			$nome = $_POST['nome'];
			$dominio = $_POST['dominio'];
			$atualizar = atualizarLP($nome, $dominio, $id_lp);
			echo $refresh;
			break;

			case 'usuario':
			$nome = $_POST['nome'];
			$login = $_POST['login'];
			$senha = $_POST['senha'];
			$email = $_POST['email'];
			$status = $_POST['status'];
			$codigo = $_POST['codigo'];
			$whatsapp = $_POST['whatsapp'];
			$pixel = $_POST['pixel'];
			$scripts = $_POST['scripts'];
			$atualizar = atualizarUsuario($usuario['id'], $nome, $login, $senha, $email, $status, $codigo, $whatsapp, $pixel, $scripts);
			echo $refresh;
			break;

			default:
						// code...
			break;
		}		
	}

}else{
	echo "<script>window.history.back();</script>";
	die();
}
?>
<h5>Edição de Landing Page</h5>
<hr>
<div class="row mb-5">
	<div class="col-md-6 pd-2">
		<h6>DADOS DA PÁGINA</h6>
		<form method="POST" accept-charset="utf8">
			<input type="hidden" name="formulario" value="landingpage">
			<div class="row">
				<div class="form-group mt-3 col-sm-12">
					<label for="nome-lp">Nome da LP:</label>
					<input class="form-control " type="text" name="nome" id="nome-lp" placeholder="Nome da página" value="<?=$lp['nome']?>" required>
				</div>
				<div class="form-group mt-3 col-sm-12">
					<label for="dominio">Link da LP:</label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" id="url">https://energybrasilsolar.com.br/lojas/</span>
						</div>
						<input class="form-control " type="text" aria-describedby="url" name="dominio" id="dominio" placeholder="nome-da-unidade" value="<?=$lp['dominio']?>" required>
					</div>
				</div>
				<div class="form-group mt-3 col-sm-6">
					<input class="form-control btn btn-primary" type="submit" value="Atualizar Landing Page">
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-6 card bg-none pd-2">
		<h6>DADOS DA UNIDADE</h6>
		<form method="POST" accept-charset="utf8">
			<input type="hidden" name="formulario" value="usuario">
			<div class="row">
				<div class="form-group mt-3 col-sm-12">
					<label for="nome">Nome do Franqueado:</label>
					<input class="form-control " type="text" name="nome" placeholder="Nome do franqueado" value="<?=$usuario['nome']?>" required>
				</div>
				<div class="form-group mt-3 col-sm-6">
					<label for="login">Login:</label>
					<input class="form-control " type="text" name="login" id="login" placeholder="Login" value="<?=$usuario['login']?>" required>
				</div>
				<div class="form-group mt-3 col-sm-6">
					<label for="senha">Senha:</label>
					<input class="form-control " type="password" id="senha" name="senha" value="<?=$usuario['senha']?>" placeholder="Senha" required>
				</div>
				<div class="form-group mt-3 col-sm-6">
					<label for="codigo">Codigo:</label>
					<input class="form-control " type="tel" id="codigo" name="codigo" value="<?=$usuario['codigo']?>" placeholder="Cód afiliado" required>
				</div>
				<div class="form-group mt-3 col-sm-6">
					<label for="whatsapp">WhatsApp:</label>
					<input class="form-control " type="tel" id="whatsapp" name="whatsapp" value="<?=$usuario['whatsapp']?>" placeholder="WhatsApp (somente números)" required>
				</div>
				<div class="form-group mt-3 col-sm-6">
					<label for="status">Status:</label>
					<select class="form-control " id="status" name="status" required>
						<option <?=($usuario['status'] == 'ativo') ? 'selected': ''?> value="ativo">Ativo</option>
						<option <?=($usuario['status'] == 'inativo') ? 'selected': ''?> value="inativo">Inativo</option>
					</select>
				</div>
				<div class="form-group mt-3 col-sm-6">
					<label for="pixel">ID do pixel:</label>
					<input class="form-control " type="tel" id="pixel" name="pixel" value="<?=$usuario['pixel']?>" placeholder="Código do pixel">
				</div>
				<div class="form-group mt-3 col-sm-12">
					<label for="email">E-mail:</label>
					<input class="form-control " type="email" id="email" name="email" value="<?=$usuario['email']?>" placeholder="E-mail do usuário" required>
				</div>
				<div class="form-group mt-3 col-sm-12">
					<label for="scripts">Códigos de integração:</label>
					<textarea class="form-control" name="scripts" id="scripts" rows="5" placeholder="Scripts (Pixel, Analytics, etc.)"><?=$usuario['scripts']?></textarea> 
				</div>
				<div class="form-group mt-3 col-sm-12">
					<input class="form-control btn btn-primary" type="submit" value="Atualizar Franquia">
				</div>
			</div>
		</form>
	</div>
</div>