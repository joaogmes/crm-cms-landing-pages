<div class="jumbotron text-center">
    <h3>Template</h3>
    <p>Configuração dos elementos visuais do site</p>
</div>
<div class="container">
    <?php
    if(isset($_POST['enviar'])){
        $logotipo = upload($_FILES, "logotipo");
        $bghero = upload($_FILES, "bghero");
        if(verificarArquivos($logotipo, $bghero)){
            $imagens = array(
                'logotipo' => $logotipo,
                'bghero' => $bghero
            );
            $dados = array_merge($_POST, $imagens);
            unset($dados["enviar"]);
            $sucesso = "./?modulo=instalacao&acao=install&etapa=4";
            $falha = '<div
            // class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro!</strong> Não foi possível gravar no banco de dados, atualize a página e tente novamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            echo crud('inserir', 'template', $dados, $sucesso, $falha, '');
        }else{
            $caminho = "./uploads/";
            $del_logo = (!$logotipo) ? '' : unlink($caminho.$logotipo); 
            $del_bghero = (!$bghero) ? '' : unlink($caminho.$bghero); 
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
    <form method="POST" action="./?modulo=instalacao&acao=install&etapa=3" enctype="multipart/form-data">
        <input type="hidden" name="enviar" value="sim">
        <div class="row">
            <div class="col-md-6">
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="titulo">Título</label>
                        <textarea class="form-control summernote" name="titulo" id="titulo" required></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="subtitulo">Subtítulo</label>
                        <textarea class="form-control summernote" name="subtitulo" id="subtitulo" required></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="logotipo">Logotipo</label>
                        <p class="small">Envie arquivo em PNG, 3:1, e de no máximo 500 kb</p>
                        <input type="file" name="logotipo" id="logotipo" required>
                    </div>
                    <div class="form-group col-md-6>
                        <label for="bghero">Banner bghero</label>
                        <p class="small">Envie arquivo em JPG, 1920x1270, e de no máximo 300 kb</p>
                        <input type="file" name="bghero" id="bghero" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="link">Link</label>
                        <input type="text" class="form-control" name="link" id="link" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tema">Tema</label>
                        <select name="tema" id="tema">
                            <option value="padrao">Padrão</option>
                            <option value="energy" selected>Energy</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="corprimaria">Cor primária</label>
                        <p class="small">Selecione a cor de maior destaque. a que é mais presente na identidade visual</p>
                        <input type="color" class="form-control" style="height:3em" name="corprimaria" id="corprimaria" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="corsecundaria">Cor secundária</label>
                        <p class="small">Selecione uma cor para contrastar com a cor principal.</p>
                        <input type="color" class="form-control" style="height:3em" name="corsecundaria" id="corsecundaria" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="corterciaria">Cor terciaria</label>
                        <p class="small">Selecione uma cor neutra que combine com a primária e secundária</p>
                        <input type="color" class="form-control" style="height:3em" name="corterciaria" id="corterciaria" required>
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
        height: 300
    });
</script>