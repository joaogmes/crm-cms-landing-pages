<?php

$id = (isset($_GET['id'])) ? $_GET['id'] : '';
if($id==''){
    die("<script>window.location.href='./?modulo=depoimento&acao=listar';</script>");
}

$credenciais = credenciais('backend');
extract($credenciais);
$conexao = conectaBanco($hostname, $dbname, $username, $password);
$query = "SELECT * FROM depoimento WHERE id = ".$id;
$depoimentos = $conexao->prepare($query);
$depoimentos->execute();

$depoimento = $depoimentos->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['atualizar'])){
    if(isset($_FILES['foto'])){
        $foto = upload($_FILES, "foto");
        if($foto){
            unlink("./uploads/".$depoimento['foto']);
            if(verificarArquivo($foto)){
                $dado_foto = array('foto' => $foto);
            }
        }
    }
    $dados = isset($dado_foto) ? array_merge($_POST, $dado_foto) : $_POST;
    unset($dados["atualizar"]);
    $sucesso = "./?modulo=depoimento&acao=listar";
    $falha = '
    <div
    class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erro!</strong> Não foi possível gravar no banco de dados, atualize a página e tente novamente.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    $atualizar = crud('alterar','depoimento', $dados, $sucesso, $falha, $id);
    echo $atualizar;
}
?>
<div class="jumbotron text-center padding-0">
	<h3>depoimentos</h3>
	<p>Cadastro dos depoimentos prestados</p>
</div>
<div class="container">
	<hr>
	<form method="POST" action="./?modulo=depoimento&acao=atualizar&id=<?=$id?>" enctype="multipart/form-data">
		<input type="hidden" name="atualizar" value="sim">
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="nome">Nome*</label>
				<input type="text" class="form-control" name="nome" id="nome" value="<?=$depoimento['nome']?>" required>
			</div>
			<div class="form-group col-md-4">
				<div class="form-group col-md-12">
					<label for="depoimento">Descrição*</label>
					<textarea class="form-control" name="depoimento" id="depoimento" placeholder="" required><?=$depoimento['depoimento']?></textarea>
				</div>
			</div>
			<div class="form-group col-md-4">
				<label for="foto">foto</label>
                <div class="col-md-12 padding-0 mb-3">
                    <img src="./uploads/<?=$depoimento['foto']?>" class="img-fluid" style="height: 100px !important;">
                </div>
                <p class="small">Envie arquivo em PNG, 1:1, e de no máximo 100 kb</p>
                <p class="small" id="alterar-foto">Alterar</p>
                <input type="file" name="foto" id="foto" required disabled>
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
    $("#alterar-foto").click(function(){
        if($("#foto").prop('disabled')){
            $("#foto").prop('disabled', false);
        }else{
            $("#foto").prop('disabled', true);

        }
    });
</script>