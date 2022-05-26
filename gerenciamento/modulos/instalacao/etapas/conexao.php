<?php
if(isset($_POST['hostname']) && $_POST['hostname']!=""){

    extract($_POST);

    $teste = conectaBanco($hostname, $dbname, $username, $password);
    if($teste != false){
        $credenciais = array(
            'hostname' => $hostname,
            'dbname' => $dbname,
            'username' => $username,
            'password' => $password
        );
        $fp = fopen('./modulos/cfg/credenciais.json', 'w');
        fwrite($fp, json_encode($credenciais));
        fclose($fp);
        $credenciais = credenciais('backend');
        echo "<script>window.location.href='./'</script>";
    }else{
        ?>
        <div class="text-center">
            <h3>Erro</h3>
            <p>Verifique as credenciais de acesso ao banco de dados e tente novamente</p>
        </div>
        <?php
    }
}
?>
<div class="jumbotron text-center">
    <h3>Conexão</h3>
    <p>Informe as credenciais para acesso ao banco de dados</p>
</div>
<div class="container">
    <hr>
    <form method="POST" action="./?modulo=instalacao&acao=install&etapa=conexao">
        <h5 class="text-center">Credenciais</h5>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="hostname">Hostname*</label>
                <input type="text" class="form-control" name="hostname" id="hostname" required>
            </div>
            <div class="form-group col-md-3">
                <label for="dbname">Banco de dados*</label>
                <input type="text" class="form-control" name="dbname" id="dbname" required>
            </div>
            <div class="form-group col-md-3">
                <label for="username">Usuário*</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="form-group col-md-3">
                <label for="password">Senha*</label>
                <input type="text" class="form-control" name="password" id="password">
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