<?php

if(isset($_POST['nome']) && $_POST['nome']!=""){

	if(isset($_FILES['fotosobre'])){
		$fotosobre = upload($_FILES, "fotosobre");
		if($fotosobre){
			unlink("./uploads/".$seo['fotosobre']);
			if(verificarArquivo($fotosobre)){
				$dado_fotosobre = array('fotosobre' => $fotosobre);
			}
		}
	}

	$imagens = array();
	if(isset($dado_fotosobre)){
		$imagens = array_merge($imagens, $dado_fotosobre);
	}

	$dados = array_merge($_POST, $imagens);

	$sucesso = "./?";
	$falha = "Erro ao inserir dados";
	$atualizar = crud('alterar','cliente', $dados, $sucesso, $falha, '1');
	echo $atualizar;
}
?>
<div class="jumbotron text-center padding-0">
	<h3>Cliente</h3>
	<p>Informe os dados cadastrais do cliente</p>
</div>
<div class="container">
	<hr>
	<form method="POST" action="./?modulo=cliente&acao=atualizar" enctype="multipart/form-data">
		<h5>Identificação</h5>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="nome">Nome Fantasia*</label>
				<input type="text" class="form-control" name="nome" id="nome" value="<?=$cliente['nome']?>" required>
			</div>
			<div class="form-group col-md-4">
				<label for="razaosocial">Razão Social</label>
				<input type="text" class="form-control" name="razaosocial" value="<?=$cliente['razaosocial']?>" id="razaosocial">
			</div>
			<div class="form-group col-md-4">
				<label for="cnpj">CNPJ</label>
				<input type="text" class="form-control" name="cnpj" value="<?=$cliente['cnpj']?>" id="cnpj">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="responsavel">Nome do Responsável*</label>
				<input type="text" class="form-control" name="responsavel" value="<?=$cliente['responsavel']?>" id="responsavel" required>
			</div>
			<div class="form-group col-md-6">
				<label for="cpfresponsavel">CPF do Responsável*</label>
				<input type="text" class="form-control" name="cpfresponsavel" value="<?=$cliente['cpfresponsavel']?>" id="cpfresponsavel" required>
			</div>
		</div>
		<div class="row">
			
			<div class="col-md-6">
				<h5>Informações</h5>
				<div class="form-row">
					<div class="form-group">
						<label for="fotosobre">Foto Sobre</label>
						<div class="col-md-12 padding-0 mb-3">
							<img src="./uploads/<?=$cliente['fotosobre']?>" class="img-fluid" style="max-height: 100px">
						</div>
						<p class="small">Envie arquivo em PNG, 1:1, e de no máximo 100 kb</p>
						<p class="small" id="alterar-fotosobre">Alterar</p>
						<input type="file" name="fotosobre" id="fotosobre" required disabled>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group">
						<label for="textosobre">Sobre a empresa*</label>
						<textarea class="form-control summernote" name="textosobre" id="textosobre" placeholder="Apresente sua empresa para o cliente" required><?=$cliente['textosobre']?></textarea>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<h5>Midias online</h5>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="endereco">Endereço</label>
						<input type="text" class="form-control" name="endereco" value="<?=$cliente['endereco']?>" id="endereco">
					</div>
					<div class="form-group col-md-6">
						<label for="telefone">Telefone</label>
						<input type="text" class="form-control" name="telefone" value="<?=$cliente['telefone']?>" id="telefone">
					</div>
					<div class="form-group col-md-6">
						<label for="whatsapp">WhatsApp*</label>
						<input type="text" class="form-control" name="whatsapp" value="<?=$cliente['whatsapp']?>" id="whatsapp" required>
					</div>
					<div class="form-group col-md-6">
						<label for="email">E-mail*</label>
						<input type="email" class="form-control" name="email" value="<?=$cliente['email']?>" id="email" required>
					</div>
					<div class="form-group col-md-6">
						<label for="facebook">Facebook</label>
						<input type="text" class="form-control" name="facebook" value="<?=$cliente['facebook']?>" id="facebook">
					</div>
					<div class="form-group col-md-6">
						<label for="instagram">Instagram</label>
						<input type="text" class="form-control" name="instagram" value="<?=$cliente['instagram']?>" id="instagram">
					</div>
					<div class="form-group col-md-6">
						<label for="twitter">Twitter</label>
						<input type="text" class="form-control" name="twitter" value="<?=$cliente['twitter']?>" id="twitter">
					</div>
					<div class="form-group col-md-6">
						<label for="youtube">Youtube</label>
						<input type="text" class="form-control" name="youtube" value="<?=$cliente['youtube']?>" id="youtube">
					</div>
					<div class="form-group col-md-6">
						<label for="googleplus">Google +</label>
						<input type="text" class="form-control" name="googleplus" value="<?=$cliente['googleplus']?>" id="googleplus">
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
	});

	$("#alterar-fotosobre").click(function(){
		if($("#fotosobre").prop('disabled')){
			$("#fotosobre").prop('disabled', false);
		}else{
			$("#fotosobre").prop('disabled', true);

		}
	});
</script>