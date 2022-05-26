<div class="jumbotron text-center padding-0">
	<h3>Template</h3>
	<p>Configuração dos elementos visuais do site</p>
</div>
<div class="container">
	<?php
	if(isset($_POST['enviar'])){
//RECEBE OS DADOS

		if(isset($_FILES['logotipo'])){
			$logotipo = upload($_FILES, "logotipo");
			if($logotipo){
				unlink("./uploads/".$template['logotipo']);
				if(verificarArquivo($logotipo)){
					$dado_logotipo = array('logotipo' => $logotipo);
// echo var_dump($dado_logotipo);
				}
			}
		}
		if(isset($_FILES['bghero'])){
			$bghero = upload($_FILES, "bghero");
			if($bghero){
				unlink("./uploads/".$template['bghero']);
				if(verificarArquivo($bghero)){
					$dado_bghero = array('bghero' => $bghero);
// echo var_dump($dado_bghero);
				}
			}
		}
		if(isset($_FILES['sobre'])){
			$sobre = upload($_FILES, "sobre");
			if($sobre){
				unlink("./uploads/".$template['sobre']);
				if(verificarArquivo($sobre)){
					$dado_sobre = array('sobre' => $sobre);
// echo var_dump($dado_sobre);
				}
			}
		}

// die(var_dump($_POST));
		$imagens = array();
		if(isset($dado_logotipo)){
			$imagens = array_merge($imagens, $dado_logotipo);
		}
		if(isset($dado_bghero)){
			$imagens = array_merge($imagens, $dado_bghero);
		}
		$dados = array_merge($_POST, $imagens);
		unset($dados["enviar"]);
		$sucesso = "./?modulo=template&acao=atualizar";
		$falha = '<div
		class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Erro!</strong> Não foi possível gravar no banco de dados, atualize a página e tente novamente.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>';
		$atualizar = crud('alterar','template', $dados, $sucesso, $falha, 1);
		// die(var_dump($atualizar));
		echo $atualizar;
	}else{
	}
	?>
	<hr>
	<form method="POST" action="./?modulo=template&acao=atualizar" enctype="multipart/form-data">
		<input type="hidden" name="enviar" value="sim">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="logotipo">Logotipo</label>
				<div class="col-md-12 padding-0 mb-3">
					<img src="./uploads/<?=$template['logotipo']?>" class="img-fluid" style="height: 100px !important;">
				</div>
				<p class="small">Envie arquivo em PNG, 3:1, e de no máximo 500 kb</p>
				<p class="small" id="alterar-logo">Alterar</p>
				<input type="file" name="logotipo" id="logotipo" required disabled>
			</div>
			<div class="form-group col-md-6">
				<label for="bghero">Banner Destaque</label>
				<div class="col-md-12 padding-0 mb-3">
					<img src="./uploads/<?=$template['bghero']?>" class="img-fluid" style="height: 100px !important;">
				</div>
				<p class="small">Envie arquivo em JPG, 1920x1270, e de no máximo 300 kb</p>
				<p class="small" id="alterar-bghero">Alterar</p>
				<input type="file" name="bghero" id="bghero" required disabled>
			</div>
			<hr>
		</div>
		<hr>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="titulo">Título*</label>
				<textarea class="form-control summernote" name="titulo" id="titulo" placeholder="Apresente sua empresa para o cliente" required><?=$template['titulo']?></textarea>
			</div>
			<div class="form-group col-md-4">
				<label for="subtitulo">Subtítulo*</label>
				<textarea class="form-control summernote" name="subtitulo" id="subtitulo" placeholder="Apresente sua empresa para o cliente" required><?=$template['subtitulo']?></textarea>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="link">Link do botão*</label>
					<input type="text" class="form-control" name="link" id="link" placeholder="Insira o link" value="<?=$template['link']?>" required>
				</div>
				<div class="form-group">
					<label for="tema">Tema*</label>
					<select name="tema" id="tema" class="form-control">
						<option value="">Selecione</option>
						<option value="padrao" <?= ($template['tema'] =='padrao') ? 'selected' : '' ?>>Padrão</option>
						<option value="lpenergy" <?= ($template['tema'] =='lpenergy') ? 'selected' : '' ?>>Energy</option>
						<option value="invencivel" <?= ($template['tema'] =='invencivel') ? 'selected' : '' ?>>Invencível</option>
					</select>
				</div>
			<!-- </div> -->
			<!-- <div class="col-md-3"> -->
			<div class="form-group">
				<label for="corprimaria">Cor primária</label>
				<!-- <p class="small">Selecione a cor de maior destaque. a que é mais presente na identidade visual</p> -->
				<input type="color" class="form-control" style="height:3em" name="corprimaria" value="<?=$template['corprimaria']?>" id="corprimaria" required>
			</div>
			<div class="form-group">
				<label for="corsecundaria">Cor secundária</label>
				<!-- <p class="small">Selecione uma cor para contrastar com a cor principal.</p> -->
				<input type="color" class="form-control" style="height:3em" name="corsecundaria" value="<?=$template['corsecundaria']?>" id="corsecundaria" required>
			</div>
			<div class="form-group">
				<label for="corterciaria">Cor terciaria</label>
				<!-- <p class="small">Selecione uma cor neutra que combine com a primária e secundária</p> -->
				<input type="color" class="form-control" style="height:3em" name="corterciaria" value="<?=$template['corterciaria']?>" id="corterciaria" required>
			</div>
				
			</div>
		</div>
		<div class="text-center">
			<button class="btn btn-primary btn-lg"><i class="fa fa-angle-double-right"></i> Prosseguir</button>
		</div>
	</form>
</div>

<script type="text/javascript">
	$('.summernote').summernote({
		placeholder: 'Hello Bootstrap 4',
		tabsize: 2,
		height: 300
	});

	$("#alterar-logo").click(function(){
		if($("#logotipo").prop('disabled')){
			$("#logotipo").prop('disabled', false);
		}else{
			$("#logotipo").prop('disabled', true);

		}
	});
	$("#alterar-bghero").click(function(){
		if($("#bghero").prop('disabled')){
			$("#bghero").prop('disabled', false);
		}else{
			$("#bghero").prop('disabled', true);

		}
	});
	</script>