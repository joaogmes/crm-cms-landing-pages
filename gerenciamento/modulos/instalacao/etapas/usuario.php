
<div class="jumbotron text-center">
    <h3>Usuário</h3>
    <p>Cadastre um usuário para acesso ao gerenciador</p>
</div>
<div class="container">
    <?php
    if(isset($_POST['enviar'])){

        $dados = $_POST;
        unset($dados["enviar"]);
        $sucesso = "./";
        $falha = './';
        echo crud('inserir', 'usuario', $dados, $sucesso, $falha, '');
    }
?>
<hr>
<form method="POST" action="./?modulo=instalacao&acao=install&etapa=usuario" enctype="multipart/form-data">
    <input type="hidden" name="enviar" value="sim">
    <input type="hidden" name="nivel" value="1">
    <input type="hidden" name="status" value="1">
    <div class="form-row">
        <hr>
        <div class="form-group col-md-3">
            <label for="nome">Nome completo</label>
            <input type="text" class="form-control" name="nome" id="nome" required>
        </div>
        <div class="form-group col-md-2">
            <label for="login">Login</label>
            <input type="text" class="form-control" name="login" id="login" required>
        </div>
        <div class="form-group col-md-2">
            <label for="senha">Senha</label>
            <input type="text" class="form-control" name="senha" id="senha" required>
        </div>
        <div class="form-group col-md-3">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="form-group col-md-2">
            <label for="telefone">Telefone</label>
            <input type="tel" class="form-control" name="telefone" id="telefone" required>
        </div>
    </div>

    <div class="text-center">
        <button class="btn btn-primary btn-lg"><i class="fa fa-angle-double-right"></i> Prosseguir</button>
    </div>
</form>
</div>