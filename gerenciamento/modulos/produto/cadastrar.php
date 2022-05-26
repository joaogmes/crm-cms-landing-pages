<?php
if(isset($_POST['enviar'])){
    //VERIFICA SE CHEGOU IMAGEM
    $foto = $_FILES['imagem'];

    //SE NÃO TIVER IMAGEM CADASTRA SEM FAZER O UPLOAD
    if(!isset($foto)){
        $verificarArquivo = true;
    }else{
        $imagem = upload($_FILES, "imagem");
        $verificarArquivo = verificarArquivo($imagem);
    }
    if($verificarArquivo){
        $imagens = array(
            'imagem' => $imagem
        );
        $dados = array_merge($_POST, $imagens);
        unset($dados["enviar"]);
        $sucesso = "./?modulo=produto&acao=listar";
        $falha = '<div
            // class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Erro!</strong> Não foi possível gravar no banco de dados, atualize a página e tente novamente.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
        echo crud('inserir', 'produto', $dados, $sucesso, $falha, '');
    }else{
        $caminho = "./uploads/";
        $del_resumo = (!$imagem) ? '' : unlink($caminho.$imagem); 
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
	<h3>FAQ</h3>
	<p>Cadastro das perguntas frequentes</p>
</div>
<div class="container">
	<hr>
	<form method="POST" action="./?modulo=produto&acao=cadastrar" enctype="multipart/form-data">
		<input type="hidden" name="enviar" value="sim">
		<div class="form-row">
            <div class="col-md-6">
               <div class="form-group">
                <label for="imagem">Imagem</label>
                <p class="small">Envie arquivo em PNG, 1:1, e de no máximo 100 kb</p>
                <input type="file" name="imagem" id="imagem" disabled>
            </div>
            <div class="form-group">
                <label for="nome">Pergunta*</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
               <!--  <label for="preco">Preço*</label>
                <input type="tel" class="form-control" name="preco" id="preco" required> -->
                <div class="form-group">
                   <label for="resumo">Resposta*</label>
                   <textarea class="form-control" name="resumo" id="resumo" placeholder="" required></textarea>
               </div>
           </div>
       </div>
       <div class="form-group col-md-6">
         <label for="descricao">Descrição*</label>
         <!-- ADICIONAR CLASSE SUMMERNOTE AO FORM CASO QUEIRA USAR FORMATAÇÃO HTML -->
         <textarea class="form-control " name="descricao" id="descricao" placeholder="" disabled></textarea>
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
		height: 220
	});
</script>