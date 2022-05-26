<?php
if(isset($_POST['enviar'])){

    $dados = $_POST;
    unset($dados["enviar"]);
    $sucesso = "./?modulo=contato&acao=listar";
    $falha = "./?modulo=contato&acao=cadastrar";
    echo crud('inserir', 'contato', $dados, $sucesso, $falha, '');
}
?>
<div class="jumbotron text-center padding-0">
	<h3>Contatos</h3>
	<p>Cadastro manual de contatos</p>
</div>
<div class="container">
	<hr>
	<form method="POST" action="./?modulo=contato&acao=cadastrar" enctype="multipart/form-data">
		<input type="hidden" name="enviar" value="sim">
        <input type="hidden" name="datacadastro" value="<?=date('Y-m-d H:i:s')?>">
        <input type="hidden" name="origem" value="manual">
		<div class="form-row">
			<div class="form-group col-md-3">
				<label for="nome">Nome do contato*</label>
				<input type="text" class="form-control" name="nome" id="nome" required>
			</div>
            <div class="form-group col-md-3">
                <label for="email">E-mail*</label>
                <input type="text" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group col-md-2">
                <label for="telefone">Telefone*</label>
                <input type="text" class="form-control" name="telefone" id="telefone" required>
            </div>
            <div class="form-group col-md-2">
                <label for="newsletter">Newsletter?*</label>
                <select class="form-control" name="newsletter" id="newsletter" required>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="">&nbsp;</label>
                <button type="submit" class="btn btn-primary btn-block"> Salvar</button>
            </div>
        </div>
        <div class="text-center">
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