<?php
    if(isset($_POST['enviar'])){
        $imagem = upload($_FILES, "imagem");
        if(!isset($_POST['imagem'])){
        	$verificarArquivo = true;
        }else{
        	$verificarArquivo = verificarArquivo($imagem);
        }
        if($verificarArquivo){
            $imagens = array(
                'imagem' => $imagem
            );
            $dados = array_merge($_POST, $imagens);
            unset($dados["enviar"]);
            $sucesso = "./?modulo=servico&acao=listar";
            $falha = '<div
            // class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro!</strong> Não foi possível gravar no banco de dados, atualize a página e tente novamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            echo crud('inserir', 'servico', $dados, $sucesso, $falha, '');
        }else{
            $caminho = "./uploads/";
            $del_imagem = (!$imagem) ? '' : unlink($caminho.$imagem); 
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
	<h3>Etapas</h3>
	<p>Cadastro das etapas de funcionamento</p>
</div>
<div class="container">
	<hr>
	<form method="POST" action="./?modulo=servico&acao=cadastrar" enctype="multipart/form-data">
		<input type="hidden" name="enviar" value="sim">
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="nome">Título*</label>
				<input type="text" class="form-control" name="nome" id="nome" required>
			</div>
			<div class="form-group col-md-4">
				<div class="form-group col-md-12">
					<label for="descricao">Descrição*</label>
					<textarea class="form-control" name="descricao" id="descricao" placeholder="" required></textarea>
				</div>
			</div>
			<div class="form-group col-md-4">
				<label for="imagem">Imagem</label>
                <p class="small">Envie arquivo em PNG, 1:1, e de no máximo 100 kb</p>
                <input type="file" name="imagem" id="imagem">
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