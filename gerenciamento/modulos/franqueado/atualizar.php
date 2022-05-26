<?php
	$id = $_SESSION['u_id'];
	$afiliado = crud('listar', 'usuario', 'WHERE id = '.$id.' AND tipo = "afiliado"', '$sucesso', '$falha', '$id');
	if(isset($_POST['nome'])){
	    $scripts = $_POST['scripts'];
	    $scripts = addslashes($scripts);
		$atualizar = atualizarAfiliado($_POST['nome'], $_POST['login'], $_POST['senha'], $_POST['tipo'], $_POST['lp'], $_POST['codigo'], $_POST['whatsapp'],$_POST['pixel'], $scripts, $id);
		if($atualizar){
			echo "<p>Atualização bem sucedida!</p><script>window.location.href='./?pagina=atualizar'</script>";
		}else{
			echo $atualizar;
		}
	}
?>
<div class="container">
<h5>Usuário</h5>
<p>Configurações do usuário:<strong> <?=$afiliado['nome']?> </strong></p>
<hr>
	<div class="row">
		<form method="POST" accept-charset="utf8">
			<input type="hidden" name="id" value="<?=$id?>">
			<input type="hidden" name="tipo" value="afiliado">
			<input type="hidden" name="lp" value="<?=$afiliado['lp']?>">
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						
					<div class="form-group mt-3 col-sm-12">
						<label for="nome"><strong><?=strtoupper('nome')?>:</strong></label>
						<input class="form-control " type="text" name="nome" id="nome" value="<?=$afiliado['nome']?>" placeholder="Nome do afiliado" required>
					</div>
					<div class="form-group mt-3 col-sm-6">
						<label for="login"><strong><?=strtoupper('login')?>:</strong></label>
						<input class="form-control " type="text" name="login" id="login" value="<?=$afiliado['login']?>" placeholder="Login" required>
					</div>
					<div class="form-group mt-3 col-sm-6">
						<label for="senha"><strong><?=strtoupper('senha')?>:</strong></label>
						<input class="form-control " type="password" name="senha" id="senha" value="<?=$afiliado['senha']?>" placeholder="Senha" required>
					</div>
					<div class="form-group mt-3 col-sm-6">
						<label for="codigo"><strong><?=strtoupper('codigo')?>:</strong></label>
						<input class="form-control " type="tel" name="codigo" id="codigo" value="<?=$afiliado['codigo']?>" placeholder="Cód afiliado" required>
					</div>
					<div class="form-group mt-3 col-sm-6">
						<label for="whatsapp"><strong><?=strtoupper('whatsapp')?>:</strong></label>
						<input class="form-control " type="tel" name="whatsapp" id="whatsapp" value="<?=$afiliado['whatsapp']?>" placeholder="WhatsApp (somente números)" required>
					</div>
					<div class="form-group mt-3 col-sm-6">
						<label for="email"><strong><?=strtoupper('email')?>:</strong></label>
						<input class="form-control " type="email" name="email" id="email" value="<?=$afiliado['email']?>" placeholder="E-mail do usuário" required>
					</div>
					<div class="form-group mt-3 col-sm-6">
						<label for="pixel"><strong><?=strtoupper('pixel')?>:</strong></label>
						<input class="form-control " type="tel" name="pixel" id="pixel" value="<?=$afiliado['pixel']?>" placeholder="Insira o código do pixel">
					</div>
					</div>
				</div>
				<div class="col-md-6">
					
					<div class="form-group mt-3 col-sm-12">
						<label for="scripts"><strong><?=strtoupper('scripts')?>:</strong></label>
						<textarea class="form-control" rows="10" name="scripts" id="scripts" placeholder="Scripts (Analytics, etc.)"><?=$afiliado['scripts']?></textarea> 
					</div>
				</div>
				<div class="form-group mt-3 col-sm-6">
					<input class="form-control" type="submit" value="Enviar">
				</div>
			</div>

	</form>
</div>
</div>