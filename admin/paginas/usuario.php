<?php
$lp = $_GET['lp'];
$pagina = VerLP($lp);
$landing = $pagina->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['nome'])){
	$scripts = $_POST['scripts'];
	$scripts = addslashes($scripts);
	$cadastrar = cadastrarUsuario($_POST['nome'], $_POST['login'], $_POST['senha'], $_POST['tipo'], $_POST['lp'], $_POST['codigo'], $_POST['whatsapp'], $_POST['email'], $_POST['pixel'], $scripts);

	if($cadastrar){
		echo "<script>window.location.href='./?pagina=landingpage&acao=listar'</script>";
	}else{
		echo $cadastrar;
	}
}
?>
<h5>Usuário</h5>
<p>Cadastre o usuário para a página:<strong> <?=$landing['nome']?> </strong></p>
<hr>
<div class="container">
	<div class="row">
		<form method="POST" accept-charset="utf8">
			<input type="hidden" name="tipo" value="afiliado">
			<input type="hidden" name="lp" value="<?=$lp?>">
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						
					<div class="form-group mt-3 col-sm-12">
						<input class="form-control " type="text" name="nome" placeholder="Nome do afiliado" required>
					</div>
					<div class="form-group mt-3 col-sm-6">
						<input class="form-control " type="text" name="login" placeholder="Login" required>
					</div>
					<div class="form-group mt-3 col-sm-6">
						<input class="form-control " type="password" name="senha" placeholder="Senha" required>
					</div>
					<div class="form-group mt-3 col-sm-6">
						<input class="form-control " type="tel" name="codigo" placeholder="Cód afiliado" required>
					</div>
					<div class="form-group mt-3 col-sm-6">
						<input class="form-control " type="tel" name="whatsapp" placeholder="WhatsApp (somente números)" required>
					</div>
					<div class="form-group mt-3 col-sm-6">
						<input class="form-control " type="email" name="email" placeholder="E-mail do usuário" required>
					</div>
					<div class="form-group mt-3 col-sm-6">
						<input class="form-control " type="tel" name="pixel" placeholder="Insira o código do pixel" required>
					</div>
					</div>
				</div>
				<div class="col-md-6">
					
					<div class="form-group mt-3 col-sm-12">
						<textarea class="form-control" rows="10" name="scripts" placeholder="Scripts (Analytics, etc.)"></textarea> 
					</div>
				</div>
				<div class="form-group mt-3 col-sm-6">
					<input class="form-control" type="submit" value="Enviar">
				</div>
			</div>
		</form>
	</div>
</div>