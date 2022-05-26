<?php
$id = (isset($_GET['id'])) ? $_GET['id'] : '';
if($id==''){
die("<script>window.location.href='./?modulo=servico&acao=listar';</script>");
}
$credenciais = credenciais('backend');
extract($credenciais);
$conexao = conectaBanco($hostname, $dbname, $username, $password);
$query = "SELECT * FROM servico WHERE id = ".$id;
$servico = $conexao->prepare($query);
$servico->execute();
$servico = $servico->fetch(PDO::FETCH_ASSOC);
if(isset($_POST['deletar'])){
if(verificarArquivo($servico['imagem'])){
unlink("./uploads/".$servico['imagem']);
}
$sucesso = "./?modulo=servico&acao=listar";
$falha = '
<div
    class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erro!</strong> Não foi possível excluir do banco de dados, atualize a página e tente novamente.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>';
$excluir = crud('excluir','servico', '', $sucesso, $falha, $id);
echo $excluir;
}
?>
<div class="jumbotron text-center padding-0">
    <h3>Serviços</h3>
    <p>Exclusão do serviço</p>
</div>
<div class="container">
    <hr>
    <form action="./?modulo=servico&acao=excluir&id=<?=$id?>" method="POST">
        <input type="hidden" name="deletar" value="sim">
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="alert alert-warning fade show" role="alert">
            <strong>Deseja excluir o serviço '<?=$servico['nome']?>'?</strong><br>
            Os dados serão perdidos permanentemente, sem chance de recuperação.
        </div>
        <div class="text-center">
            <button class="btn btn-warning btn-lg"><i class="fa fa-times-circle"></i> Prosseguir</button>
            <a href="./?modulo=servico&acao=listar" class="btn btn-default btn-lg"><i class="fa fa-angle-double-left"></i> Cancelar</a>
        </div>
</form>
</div>