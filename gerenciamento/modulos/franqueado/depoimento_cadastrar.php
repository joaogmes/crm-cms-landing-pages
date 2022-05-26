<?php
$id = $_SESSION['u_id'];
$afiliado = crud('listar', 'usuario', 'WHERE id = '.$id.' AND tipo = "afiliado"', '$sucesso', '$falha', '$id');
if(isset($_POST['enviar'])){
	$foto = upload($_FILES, "foto");
	if(verificarArquivo($foto)){
		$imagens = array(
			'foto' => $foto
		);
		$dados = array_merge($_POST, $imagens);
		unset($dados["enviar"]);
		$sucesso = "./?pagina=depoimentos";
		$falha = '<div
	// class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Erro!</strong> Não foi possível gravar no banco de dados, atualize a página e tente novamente.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		echo crud('inserir', 'depoimento', $dados, $sucesso, $falha, '');
	}else{
		$caminho = "./uploads/";
		$del_foto = (!$foto) ? '' : unlink($caminho.$foto);
		echo '<div
	// class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Erro!</strong> Revise os campos de upload e tente novamente.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
	}
}
?>
<div class="jumbotron text-center padding-0">
	<h3>Depoimentos</h3>
	<p>Cadastro dos depoimentos recebidos</p>
</div>
<div class="container">
	<hr>
	<form method="POST" action="./?pagina=depoimento_cadastrar&acao=cadastrar" enctype="multipart/form-data">
		<input type="hidden" name="enviar" value="sim">
		<input type="hidden" name="landingpage" value="<?=$afiliado['lp']?>">
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="nome">Cliente*</label>
				<input type="text" class="form-control" name="nome" id="nome" required>
			</div>
			<div class="form-group col-md-4">
				<div class="form-group col-md-12">
					<label for="depoimento">Depoimento*</label>
					<textarea class="form-control" name="depoimento" id="depoimento" placeholder="" required></textarea>
				</div>
			</div>
			<div class="form-group col-md-4">
				<label for="foto">Foto</label>
				<p class="small">Envie arquivo em PNG, 1:1, e de no máximo 100 kb</p>
				<input type="file" name="foto" id="foto" required>
			</div>
		</div>
		<div class="text-center">
			<button class="btn btn-primary btn-lg"><i class="fa fa-angle-double-right"></i> Prosseguir</button>
		</div>
	</form>
</div>
<script>
	$('.summernote').summernote({
		placeholder: 'Hello Bootstrap 4',
		tabsize: 2,
		height: 300
	});
</script>