<?php

$id = (isset($_GET['id'])) ? $_GET['id'] : '';
if($id==''){
    die("<script>window.location.href='./?modulo=produto&acao=listar';</script>");
}

$credenciais = credenciais('backend');
extract($credenciais);
$conexao = conectaBanco($hostname, $dbname, $username, $password);
$query = "SELECT * FROM produto WHERE id = ".$id;
$produtos = $conexao->prepare($query);
$produtos->execute();

$produto = $produtos->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['atualizar'])){
    if(isset($_FILES['imagem'])){
        $imagem = upload($_FILES, "imagem");
        if($imagem){
            unlink("./uploads/".$produto['imagem']);
            if(verificarArquivo($imagem)){
                $dado_imagem = array('imagem' => $imagem);
            }
        }
    }
    $dados = isset($dado_imagem) ? array_merge($_POST, $dado_imagem) : $_POST;
    unset($dados["atualizar"]);
    $sucesso = "./?modulo=produto&acao=listar";
    $falha = '
    <div
    class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erro!</strong> Não foi possível gravar no banco de dados, atualize a página e tente novamente.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $atualizar = crud('alterar','produto', $dados, $sucesso, $falha, $id);
    echo $atualizar;
}
?>
<div class="jumbotron text-center padding-0">
	<h3>Cursos</h3>
	<p>Cadastro dos cursos</p>
</div>
<div class="container">
	<hr>
	<form method="POST" action="./?modulo=produto&acao=atualizar&id=<?=$id?>" enctype="multipart/form-data">
        <input type="hidden" name="atualizar" value="sim">
        <div class="form-row">
            <div class="col-md-6">
             <div class="form-group">
                <label for="imagem">Imagem</label>
                <div class="col-md-12 padding-0 mb-3">
                    <img src="./uploads/<?=$produto['imagem']?>" class="img-fluid" style="height: 100px !important;">
                </div>
                <p class="small">Envie arquivo em JPG e de no máximo 100 kb</p>
                <p class="small" id="alterar-imagem">Alterar</p>
                <input type="file" name="imagem" id="imagem" required disabled>
            </div>
            <div class="form-group">
                <label for="nome">Nome do curso*</label>
                <input type="text" class="form-control" name="nome" id="nome" value="<?=$produto['nome']?>" required>
                 <!-- <label for="preco">Preço*</label>
                <input type="tel" class="form-control" name="preco" id="preco" value="<?=$produto['preco']?>" required> -->
                <div class="form-group">
                 <label for="resumo">Mensagem*</label>
                 <textarea class="form-control" name="resumo" id="resumo" placeholder="" required><?=$produto['resumo']?></textarea>
             </div>
         </div>
     </div>
     <div class="form-group col-md-6">
       <label for="descricao">Descrição*</label>
       <textarea class="form-control summernote" name="descricao" id="descricao" required><?=$produto['descricao']?></textarea>
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
    $("#alterar-imagem").click(function(){
        if($("#imagem").prop('disabled')){
            $("#imagem").prop('disabled', false);
        }else{
            $("#imagem").prop('disabled', true);

        }
    });
</script>