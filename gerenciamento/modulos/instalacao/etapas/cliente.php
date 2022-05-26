<?php
if(isset($_POST['nome']) && $_POST['nome']!=""){
 $fotosobre = upload($_FILES, "fotosobre");
 if(verificarArquivo($fotosobre)){
    $imagens = array(
        'fotosobre' => $fotosobre
    );
    $dados = array_merge($_POST, $imagens);
    $sucesso = "./";
    $falha = '<div
                // class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erro!</strong> Não foi possível gravar no banco de dados, atualize a página e tente novamente.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    echo crud('inserir', 'cliente', $dados, $sucesso, $falha, '');
}else{
    $caminho = "./uploads/";
    $del_sobre = (!$fotosobre) ? '' : unlink($caminho.$fotosobre); 
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
<div class="jumbotron text-center">
    <h3>Cliente</h3>
    <p>Informe os dados cadastrais do cliente</p>
</div>
<div class="container">
    <hr>
    <form method="POST" action="./?modulo=instalacao&acao=install&etapa=cliente" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
               <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nome">Nome Fantasia*</label>
                    <input type="text" class="form-control" name="nome" id="nome" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="razaosocial">Razão Social</label>
                    <input type="text" class="form-control" name="razaosocial" id="razaosocial">
                </div>
                <div class="form-group col-md-6">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" name="cnpj" id="cnpj">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="responsavel">Nome do Responsável*</label>
                    <input type="text" class="form-control" name="responsavel" id="responsavel" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="cpfresponsavel">CPF do Responsável*</label>
                    <input type="text" class="form-control" name="cpfresponsavel" id="cpfresponsavel" required>
                </div>
            </div>
            <h5>Midias online</h5>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" name="endereco" id="endereco">
                </div>
                <div class="form-group col-md-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" name="telefone" id="telefone">
                </div>
                <div class="form-group col-md-4">
                    <label for="whatsapp">WhatsApp*</label>
                    <input type="text" class="form-control" name="whatsapp" id="whatsapp" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="email">E-mail*</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="facebook">Facebook</label>
                    <input type="text" class="form-control" name="facebook" id="facebook">
                </div>
                <div class="form-group col-md-4">
                    <label for="instagram">Instagram</label>
                    <input type="text" class="form-control" name="instagram" id="instagram">
                </div>
                <div class="form-group col-md-4">
                    <label for="twitter">Twitter</label>
                    <input type="text" class="form-control" name="twitter" id="twitter">
                </div>
                <div class="form-group col-md-4">
                    <label for="youtube">Youtube</label>
                    <input type="text" class="form-control" name="youtube" id="youtube">
                </div>
                <div class="form-group col-md-4">
                    <label for="googleplus">Google +</label>
                    <input type="text" class="form-control" name="googleplus" id="googleplus">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="">
                <div class="form-group col-md-12">
                    <label for="fotosobre">Foto destaque</label>
                    <p class="small">Envie arquivo em JPG, 600x600, e de no máximo 100 kb</p>
                    <input type="file" name="fotosobre" id="fotosobre" required>
                </div>
            </div>
            <div class="">
                <div class="form-group col-md-12">
                    <label for="textosobre">Sobre a empresa*</label>
                    <textarea rows="10" class="form-control summernote" name="textosobre" id="textosobre" placeholder="Apresente sua empresa para o cliente" required></textarea>
                </div>
            </div>
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
        height: 400
    });
</script>