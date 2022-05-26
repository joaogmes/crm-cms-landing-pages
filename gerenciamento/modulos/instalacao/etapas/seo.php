<div class="jumbotron text-center padding-0">
    <h3>SEO</h3>
    <p>Gerencie as configurações avançadas de sua página</p>
</div>
<div class="container">
    <?php
    if(isset($_POST['titulo'])){
        $_POST['scripts'] = addslashes($_POST['scripts']);
        $_POST['scripts'] = htmlspecialchars($_POST['scripts']);
        $icone = upload($_FILES, "icone");
        $imagem = upload($_FILES, "imagem");
        if(verificarArquivos($icone, $imagem)){
            $imagens = array(
                'icone' => $icone,
                'imagem' => $imagem
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
            echo crud('inserir', 'seo', $dados, $sucesso, $falha, '');
        }else{
            $caminho = "./uploads/";
            $del_icone = (!$icone) ? '' : unlink($caminho.$icone); 
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
    <hr>
    <form method="POST" action="./?modulo=instalacao&acao=install&etapa=seo" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <h5>Aparência</h5>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="icone">Ícone</label>
                        <p class="small">Envie arquivo em PNG, 1:1, e de no máximo 100 kb</p>
                        <!-- <p class="small" id="alterar-icone">Alterar</p> -->
                        <input type="file" name="icone" id="icone" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="imagem">Imagem destaque</label>
                        <p class="small">Envie arquivo em JPG, 1:1, e de no máximo 100 kb</p>
                        <!-- <p class="small" id="alterar-imagem">Alterar</p> -->
                        <input type="file" name="imagem" id="imagem" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="titulo">Título do site</label>
                        <input type="text" class="form-control" name="titulo" value="" id="titulo" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="descricao">Descrição da empresa</label>
                        <textarea name="descricao" rows="2" class="form-control" id="descricao" required></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="autor">Autor do site</label>
                        <input type="text" class="form-control" name="autor" value="" id="autor" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="keywords">Palavras chave <small>(separadas por vírgula)</small></label>
                        <textarea name="keywords" rows="2" class="form-control" id="keywords" required></textarea>
                        <!-- <input type="text" class="form-control" name="keywords" value="<?=$seo['keywords']?>" id="keywords"> -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h5>Scripts</h5>
                <div class="form-row">
                    <div class="form-group">
                        <label for="scripts">Aqui vão os códigos de acompanhamento*</label>
                        <textarea rows="15" width="100vw" class="form-control" name="scripts" id="scripts" required>&nbsp;</textarea>
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
        // airMode: true
    });

    $(document).ready(function(){
        $(".btn-codeview").click();
    })


    $("#alterar-icone").click(function(){
        if($("#icone").prop('disabled')){
            $("#icone").prop('disabled', false);
        }else{
            $("#icone").prop('disabled', true);

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