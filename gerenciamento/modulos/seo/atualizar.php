<?php

if(isset($_POST['titulo']) && $_POST['titulo']!=""){
	
	if(isset($_FILES['icone'])){
		$icone = upload($_FILES, "icone");
		if($icone){
			unlink("./uploads/".$seo['icone']);
			if(verificarArquivo($icone)){
				$dado_icone = array('icone' => $icone);
			}
		}
	}

	if(isset($_FILES['imagem'])){
		$imagem = upload($_FILES, "imagem");
		if($imagem){
			unlink("./uploads/".$seo['imagem']);
			if(verificarArquivo($imagem)){
				$dado_imagem = array('imagem' => $imagem);
			}
		}
	}

	$imagens = array();
	if(isset($dado_icone)){
		$imagens = array_merge($imagens, $dado_icone);
	}if(isset($dado_imagem)){
		$imagens = array_merge($imagens, $dado_imagem);
	}

	$_POST['scripts'] = addslashes($_POST['scripts']);
	$_POST['scripts'] = htmlspecialchars($_POST['scripts']);

	$dados = array_merge($_POST, $imagens);
	// unset($dados["scripts"]);
	$sucesso = "./?modulo=seo&acao=atualizar";
	$falha = "Erro ao inserir dados";
	$atualizar = crud('alterar','seo', $dados, $sucesso, $falha, '1');
	echo $atualizar;
}

$icone_mostrar = ($seo['icone']=='') ? './assets/img/icone-generico.png' : './uploads/'.$seo['icone'];
?>
<div class="jumbotron text-center padding-0">
	<h3>SEO</h3>
	<p>Gerencie as configurações avançadas de sua página</p>
</div>
<div class="container">
	<hr>
	<form method="POST" action="./?modulo=seo&acao=atualizar" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="icone">Ícone</label>
						<div class="col-md-12 padding-0 mb-3">
							<img src="<?=$icone_mostrar?>" class="img-fluid" style="max-height: 100px">
						</div>
						<p class="small">Envie arquivo em PNG, 1:1, e de no máximo 100 kb</p>
						<p class="small" id="alterar-icone">Alterar</p>
						<input type="file" name="icone" id="icone" required disabled>
					</div>
					<div class="form-group col-md-6">
						<label for="imagem">Imagem destaque</label>
						<div class="col-md-12 padding-0 mb-3">
							<img src="./uploads/<?=$seo['imagem']?>" class="img-fluid" style="max-height: 100px">
						</div>
						<p class="small">Envie arquivo em JPG, 1:1, e de no máximo 100 kb</p>
						<p class="small" id="alterar-imagem">Alterar</p>
						<input type="file" name="imagem" id="imagem" required disabled>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<h5>Aparência</h5>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="titulo">Título do site</label>
						<input type="text" class="form-control" name="titulo" value="<?=$seo['titulo']?>" id="titulo" required>
					</div>
					<div class="form-group col-md-12">
						<label for="descricao">Descrição da empresa</label>
						<textarea name="descricao" rows="2" class="form-control" id="descricao" required><?=$seo['descricao']?></textarea>
					</div>
					<div class="form-group col-md-12">
						<label for="autor">Autor do site</label>
						<input type="text" class="form-control" name="autor" value="<?=$seo['autor']?>" id="autor" required>
					</div>
					<div class="form-group col-md-12">
						<label for="keywords">Palavras chave <small>(separadas por vírgula)</small></label>
						<textarea name="keywords" rows="2" class="form-control" id="keywords" required><?=$seo['keywords']?></textarea>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<h5>Scripts</h5>
				<div class="form-row">
					<div class="form-group">
						<label for="scripts">Aqui vão os códigos de acompanhamento*</label>
						<textarea rows="15" width="100vw" class="form-control" name="scripts" id="scripts" required><?=$seo['scripts']?></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="text-center">
			<button class="btn btn-primary btn-lg"><i class="fa fa-angle-double-right"></i> Salvar</button>
		</div>
	</form>
</div>

<script>
	$('.summernote').summernote({
		placeholder: 'Hello Bootstrap 4',
		tabsize: 2,
		height: 400
		// airMode: true
	});

	$(document).ready(function(){
		$(".btn-codeview").click();
	})


	$("#alterar-icone").click(function(){
		if($("#icone").prop('disabled')){
			$("#icone").prop('disabled', false);
		}else{
			$("#icone").prop('disabled', true);

		}
	});

	$("#alterar-imagem").click(function(){
		if($("#imagem").prop('disabled')){
			$("#imagem").prop('disabled', false);
		}else{
			$("#imagem").prop('disabled', true);

		}
	});
</script>