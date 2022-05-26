<?php
$erro ='';
if(isset($_POST['login']) && $_POST['login'] !=''){
	// foreach ($_POST as $campo => $valor) {
	// 	echo "Campo: ".$campo." |||| Chave: ".$valor."<br>";
	// }
	$login = login($_POST['login'], $_POST['senha']);
	$erro = '';
	if($login == 0){
		echo "<script>window.location.href='./';</script>";
	}else{
		$erro = ($login == 1) ? "Credenciais incorretas ou usuário não habilitado." :  "Erro ao efetuar login.";
	}
}
?>
<div class="card login">
	<div class="card-body">
		<!-- <img class="logo" src="https://sorriafernandopolis.com.br/wp-content/uploads/2021/01/Clinica-Sorria.png"> -->
		<h2 class="card-title">Portal de Leads</h2>
		<hr>
		<h5 class="card-title">Fazer Login</h5>
		<p class="card-text">Insira suas credenciais para acessar o sistema.</p>
		<form action="./" method="POST" class="login-form mb-3">
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Seu usuário</label>
				<input type="text" class="form-control" required name="login" id="exampleInputEmail1" autocomplete="off" aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Senha</label>
				<input type="password" class="form-control"required  name="senha" autocomplete="off" id="exampleInputPassword1">
			</div>
			<div class="mx-auto text-center">
				<input type="submit" class="btn btn-primary mb-3" value="Entrar">
				<p class="text-danger erro"><?php echo $erro ?></p>
			</div>
		</form>
		<p>Não é cadastrado ainda? Clique <a href="#" id="criar-usuario"><strong>aqui</strong></a> para se cadastrar.</p>
	</div>
</div>