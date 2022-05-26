<?php
$id = $_SESSION['u_id'];
$afiliado = crud('listar', 'usuario', 'WHERE id = '.$id.' AND tipo = "afiliado"', '$sucesso', '$falha', '$id');
$credenciais = credenciais('backend');
extract($credenciais);
$conexao = conectaBanco($hostname, $dbname, $username, $password);
?>
<div class="jumbotron text-center padding-0">
	<h3>Template</h3>
	<p>Configuração dos elementos visuais do site</p>
</div>
<div class="container">
	<?php
	$banner = listarBanner($afiliado['lp']);

	if(isset($_POST['enviar'])){

		$verificar = verificarBanner($afiliado['lp']);
		if($verificar){
			$imagem = upload($_FILES, "imagem");
			$atualizar = atualizarBanner($afiliado['lp'], $imagem);
			if(!$atualizar){
				echo $atualizar;
			}else{
				echo "<p>Atualização bem sucedida!</p>";
				echo "<script>window.location.href='?pagina=banner&acao=atualizar';</script>";
			}
		}else{
			$imagem = upload($_FILES, "imagem");
			$inserir = inserirBanner($afiliado['lp'], $id, $imagem);
			if(!$inserir){
				echo $inserir;
			}else{
				echo "<p>Atualização bem sucedida!</p>";
				echo "<script>window.location.href='?pagina=banner&acao=atualizar';</script>";
			}
		}
	}else{
	}
	?>
	<hr>
	<form method="POST" action="?pagina=banner" enctype="multipart/form-data">
		<input type="hidden" name="enviar" value="sim">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="imagem">Banner Atual</label>
				<div class="col-md-12 padding-0 mb-3">
					<img src="./uploads/<?=$template['bghero']?>" class="img-fluid" style="max-height: 200px !important;">
				</div>
				<p class="small">Esse é o banner padrão Energy Brasil, se você cadastrar uma imagem própria ela irá sobrepor a da franquia</p>
			</div>
			<div class="form-group col-md-6">
				<label for="imagem">Banner Novo</label>
				<div class="col-md-12 padding-0 mb-3">
					<?php
					if(isset($banner['imagem'])){
						?>
						<img src="./uploads/<?=$banner['imagem']?>" class="img-fluid" style="max-height: 200px !important;">
						<?php
					}
					?>
				</div>
				<p class="small">Envie arquivo em JPG, 1920x1270, e de no máximo 300 kb</p>
				<p class="small" id="alterar-imagem">Alterar</p>
				<input type="file" name="imagem" id="imagem" required disabled>
			</div>
			<hr>
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
	$("#alterar-imagem").click(function(){
		if($("#imagem").prop('disabled')){
			$("#imagem").prop('disabled', false);
		}else{
			$("#imagem").prop('disabled', true);
		}
	});
</script>