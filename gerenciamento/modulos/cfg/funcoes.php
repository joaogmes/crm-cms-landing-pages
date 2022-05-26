<?php

function checarInstalacao($ambiente){

    if($ambiente=='frontend' || $ambiente=='backend'){
        $credenciais = credenciais($ambiente);
    }else{
        die("Erro na seleção do ambiente");
    }

    if(!($credenciais)){
        $etapa = 'conexao';
    }else{
        $etapa='';

        // die('tem conexao');
        extract($credenciais);
        $conexao = conectaBanco($hostname, $dbname, $username, $password);

        $q_tabelas = "SELECT * FROM information_schema.tables WHERE table_schema = '".$dbname."';";
        $tabelas = $conexao->prepare($q_tabelas);
        $tabelas->execute();
        $tabelas->closeCursor();

        if($tabelas->rowCount() < 14){
            $criacao = criarTabelas();
            $criar = $conexao->prepare($criacao);
            $criar->execute();
            $criar->closeCursor();
        }

        $soma_registros = 0;
        while($registros = $tabelas->fetch(PDO::FETCH_ASSOC)){
            $table = $registros['TABLE_NAME'];
            $amostra = "SELECT * FROM ".$table.";";
            $contagem = $conexao->prepare($amostra);
            $contagem->execute();
            $contagem->closeCursor();

            if($contagem->rowCount() > 0){
                $soma_registros++;
            }
        }
        if($soma_registros >= 5){
            $etapa = 'completo';
        }else{
            $teste = "SELECT * FROM configuracoes;";
            $q_configuracoes = $conexao->prepare($teste);
            $q_configuracoes->execute();
            $consulta_configuracoes = $q_configuracoes->rowCount();

            if($consulta_configuracoes < 1){
                $dados =  array(
                    'modooperacao' => 'manutencao',
                    'datainstalacao' => date('Y-m-d H:i:s')
                );
                $sucesso = './';
                $falha = './';
                $configuracoes = crud('inserir', 'configuracoes', $dados, $sucesso, $falha, '');
            }

            $q_usuario = "SELECT * FROM usuario;";
            $usuario = $conexao->prepare($q_usuario);
            $usuario->execute();

            $q_cliente = "SELECT * FROM cliente;";
            $cliente = $conexao->prepare($q_cliente);
            $cliente->execute();

            $q_template = "SELECT * FROM template;";
            $template = $conexao->prepare($q_template);
            $template->execute();

            $q_seo = "SELECT * FROM seo;";
            $seo = $conexao->prepare($q_seo);
            $seo->execute();

            if($usuario->rowCount() < 1){
                $etapa = 'usuario';
            }else if($cliente->rowCount() < 1){
                $etapa = 'cliente';
            }
            else if($template->rowCount() < 1){
                $etapa = 'template';
            }else if($seo->rowCount() < 1){
                $etapa = 'seo';
            }else{
                $etapa = 'completo';
            }
        }

    }


    return $etapa;

}

function checarLogin()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['usuario'])) {
        if ($_SESSION['usuario'] != "") {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function verificarUsuario($usuario, $senha)
{
    $credenciais = credenciais('backend');
    extract($credenciais);
    $conexao = conectaBanco($hostname, $dbname, $username, $password);

    $usuario = "SELECT * FROM usuario where login = '$usuario' AND senha = '$senha'";
    $stmt_usuario = $conexao->prepare($usuario);
    $stmt_usuario->execute();

    if($stmt_usuario->rowCount() < 1){
        return false;
    }else{
        $usuario = $stmt_usuario->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    }
    
}

function verificarConexao($banco)
{
    $credenciais = credenciais('backend');
    extract($credenciais);
    $conexao = conectaBanco($hostname, $dbname, $username, $password);
    if (!($conexao)) {
        $status = "<span class='error'>offline</span>";
    } else {
        $status = "<span class='success'>online</span>";
    }
    return $status;
}

function get_endereco($cep)
{
// formatar o cep removendo caracteres nao numericos
    $cep = preg_replace("/[^0-9]/", "", $cep);
    $url = "http://viacep.com.br/ws/$cep/xml/";

    $xml = simplexml_load_file($url);
    return $xml;
}

function validaCPF($cpf)
{
// Extrai somente os números
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);
// Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }
// Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }
// Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;
}

function contar($tabela, $campo, $criterio)
{
    $credenciais = credenciais('backend');
    extract($credenciais);
    $conexao = conectaBanco($hostname, $dbname, $username, $password);
    $qtd = 0;
    if ($campo != "" && $criterio != "") {
        $condicao = " WHERE " . $campo . " = " . $criterio;
    } else {
        $condicao = "";
    }
    $query =  "SELECT * FROM " . $tabela . $condicao;
    $contagem = $conexao->prepare($query);
    $contagem->execute();
    $qtd = $contagem->rowCount();
    return $qtd;
}

function crud($operacao, $tabela, $dados, $sucesso, $falha, $id)
{
    $credenciais = credenciais('backend');
    extract($credenciais);
    $conexao = conectaBanco($hostname, $dbname, $username, $password);
    switch ($operacao) {
        case 'listar':
        $query = "SELECT * FROM ".$tabela." ".$dados;
        $listar = $conexao->prepare($query);
        $listar->execute();
        $retorno = $listar->fetch(PDO::FETCH_ASSOC);
        return $retorno;
        break;

        case 'inserir':
        $campos = ' (';
        $valores = ') VALUES (';
        foreach ($dados as $chave => $valor) {
            if($chave == 'files'){

            }else{

                $campos .= " " . $chave . " ,";
                $valores .= " '" . $valor . "' ,";
            }
        }
        $campos = substr($campos, 0, -1);
        $valores = substr($valores, 0, -1);
        $query = "insert into " . $tabela . " " . $campos . " " . $valores . " )";
        $stmt = $conexao->prepare($query);
        if ($stmt->execute()) {
            $id = $conexao->lastInsertId();
            $retorno = "<script>window.location.href='".$sucesso."';</script>";
        } else {
            $retorno = "<h3>".$falha."</h3>";
        }
        return $retorno;
        break;

        case 'alterar':
        $campos = '';
        $valores = '';
        foreach ($dados as $chave => $valor) {
            if($chave == 'files'){
            }else{
                $campos .= " " . $chave . " = '".$valor."',";
            }
        }
        $campos = substr($campos, 0, -1);
        $id = isset($id) ? $id : '1';
        $query = "UPDATE " . $tabela . " SET " . $campos . " WHERE id='".$id."' ";
        $stmt = $conexao->prepare($query);
        if ($stmt->execute()) {
            $id = $conexao->lastInsertId();
        // die(var_dump($query));
            $retorno = "<script>window.location='./?modulo=".$tabela."&acao=atualizar';</script>";
        } else {
            $retorno = "<h3>Deu errado</h3>";
        }
        return $retorno;
        break;

        case 'excluir':
        $id = isset($id) ? $id : '1';
        $query = "DELETE FROM " . $tabela . " WHERE id='".$id."' ";
        $stmt = $conexao->prepare($query);
        if ($stmt->execute()) {
            $retorno = "<script>window.location='".$sucesso."';</script>";
        } else {
            $retorno = "<h3>Deu errado</h3>";
        }
        return $retorno;
        break;

        case 'inserir-contato':
        $campos = ' (';
        $valores = ') VALUES (';
        foreach ($dados as $chave => $valor) {
            if($chave == 'files'){

            }else{

                $campos .= " " . $chave . " ,";
                $valores .= " '" . $valor . "' ,";
            }
        }
        $campos = substr($campos, 0, -1);
        $valores = substr($valores, 0, -1);
        $query = "insert into " . $tabela . " " . $campos . " " . $valores . " )";
        $stmt = $conexao->prepare($query);
        if ($stmt->execute()) {
            $id = $conexao->lastInsertId();
            $retorno = $id;
        } else {
            $retorno = $falha;
        }
        return $retorno;
        break;

        default:
# code...
        break;
    }
}

function crud_front($operacao, $tabela, $dados, $sucesso, $falha, $id)
{
    $credenciais = credenciais('frontend');
    extract($credenciais);
    $conexao = conectaBanco($hostname, $dbname, $username, $password);
    switch ($operacao) {
        case 'listar':
        $query = "SELECT * FROM ".$tabela." ".$dados;
        $listar = $conexao->prepare($query);
        $listar->execute();
        $retorno = $listar->fetch(PDO::FETCH_ASSOC);
        return $retorno;
        break;

        case 'inserir':
        $campos = ' (';
        $valores = ') VALUES (';
        foreach ($dados as $chave => $valor) {
            if($chave == 'files'){

            }else{

                $campos .= " " . $chave . " ,";
                $valores .= " '" . $valor . "' ,";
            }
        }
        $campos = substr($campos, 0, -1);
        $valores = substr($valores, 0, -1);
        $query = "insert into " . $tabela . " " . $campos . " " . $valores . " )";
        $stmt = $conexao->prepare($query);
        if ($stmt->execute()) {
            $id = $conexao->lastInsertId();
            $retorno = "<script>window.location.href='".$sucesso."';</script>";
        } else {
            $retorno = "<h3>".$falha."</h3>";
        }
        return $retorno;
        break;

        case 'alterar':
        $campos = '';
        $valores = '';
        foreach ($dados as $chave => $valor) {
            if($chave == 'files'){
            }else{
                $campos .= " " . $chave . " = '".$valor."',";
            }
        }
        $campos = substr($campos, 0, -1);
        $id = isset($id) ? $id : '1';
        $query = "UPDATE " . $tabela . " SET " . $campos . " WHERE id='".$id."' ";
        $stmt = $conexao->prepare($query);
        if ($stmt->execute()) {
            $id = $conexao->lastInsertId();
        // die(var_dump($query));
            $retorno = "<script>window.location='./?modulo=".$tabela."&acao=atualizar';</script>";
        } else {
            $retorno = "<h3>Deu errado</h3>";
        }
        return $retorno;
        break;

        case 'excluir':
        $id = isset($id) ? $id : '1';
        $query = "DELETE FROM " . $tabela . " WHERE id='".$id."' ";
        $stmt = $conexao->prepare($query);
        if ($stmt->execute()) {
            $retorno = "<script>window.location='".$sucesso."';</script>";
        } else {
            $retorno = "<h3>Deu errado</h3>";
        }
        return $retorno;
        break;
        case 'inserir-contato':
        $campos = ' (';
        $valores = ') VALUES (';
        foreach ($dados as $chave => $valor) {
            if($chave == 'files'){

            }else{

                $campos .= " " . $chave . " ,";
                $valores .= " '" . $valor . "' ,";
            }
        }
        $campos = substr($campos, 0, -1);
        $valores = substr($valores, 0, -1);
        $query = "insert into " . $tabela . " " . $campos . " " . $valores . " )";
        $stmt = $conexao->prepare($query);
        if ($stmt->execute()) {
            $id = $conexao->lastInsertId();
            $retorno = $id;
        } else {
            $retorno = $falha;
        }
        return $retorno;
        break;

        default:
# code...
        break;
    }
}

function cadastrarpf($dados)
{
    if (isset($dados['status_cliente']) && $dados['status_cliente'] == "ativo") {
        $campos = ' (';
        $valores = ') VALUES (';
        foreach ($dados as $chave => $valor) {
            $campos .= " " . $chave . " ,";
            $valores .= " '" . $valor . "' ,";
        }
        $campos = substr($campos, 0, -1);
        $valores = substr($valores, 0, -1);
        $query = "insert into clientepf " . $campos . " " . $valores . " )";
        return $query;
    }
}

function upload($arquivo, $campo){
    $target_dir = "./uploads/";
    $numerador=strtotime('now').mt_rand();
    $arquivo= $numerador.str_replace(" ", "", basename($_FILES[$campo]["name"]));
    $target_file = $target_dir . $arquivo;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if ($_FILES[$campo]['size'] == 0)
    {
// return "Nenhum arquivo selecionado";
        return false;
    }

    $check = getimagesize($_FILES[$campo]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
// return "Arquivo inválido.";
        return false;
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
// return "Arquivo já enviado.";
// return $_FILES[$campo]["name"];
        return false;
        $uploadOk = 0;
    }

    if ($_FILES[$campo]["size"] > 5000000) {
// return "Arquivo muito grande.";
        return false;
        $uploadOk = 0;
    }

    if($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "svg") {
        return "Formato de imagem não permitido.";
// return false;
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
// return "Arquivo NÃO ENVIADO.";
        return false;
    } else {
        if (move_uploaded_file($_FILES[$campo]["tmp_name"], $target_file)) {
            return $arquivo;
        } else {
// return "Erro no upload.";
            return false;
        }
    }
}

function verificarArquivos($logotipo, $sobre){
    $caminho = "./uploads/";

    if($logotipo && $sobre){
        if(file_exists($caminho.$logotipo) && file_exists($caminho.$sobre)){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function verificarArquivo($arquivo){
    $caminho = "./uploads/";

    if($arquivo){
        if(file_exists($caminho.$arquivo)){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function atualizarAfiliado($nome,$login,$senha,$tipo,$lp,$codigo,$whatsapp,$pixel,$scripts, $id){
    $credenciais = credenciais('backend');
    extract($credenciais);
    $conexao = conectaBanco($hostname, $dbname, $username, $password);
    $query = "UPDATE usuario SET 
    nome = '".$nome."',
    login = '".$login."',
    senha = '".$senha."',
    tipo = '".$tipo."',
    lp = '".$lp."',
    codigo = '".$codigo."',
    whatsapp = '".$whatsapp."',
    pixel = '".$pixel."',
    scripts = '".$scripts."'
    WHERE id = ".$id;
    $stmt_query = $conexao->prepare($query);
    try{
        $stmt_query->execute();
        return true;
    }catch(Excepetion $e){
        return $e->getMessage();
    }
}

function atualizarUnidade($logradouro,$numero,$bairro,$cidade,$estado,$latitude,$longitude,$facebook,$instagram,$mensagem_whatsapp,$mapa, $id){
    $credenciais = credenciais('backend');
    extract($credenciais);
    $conexao = conectaBanco($hostname, $dbname, $username, $password);
    $query = "UPDATE usuario SET 
    logradouro = '".$logradouro."',
    numero = '".$numero."',
    bairro = '".$bairro."',
    cidade = '".$cidade."',
    estado = '".$estado."',
    latitude = '".$latitude."',
    longitude = '".$longitude."',
    facebook = '".$facebook."',
    instagram = '".$instagram."',
    mensagem_whatsapp = '".$mensagem_whatsapp."',
    mapa = '".$mapa."'
    WHERE id = ".$id;
    // die($query);
    $stmt_query = $conexao->prepare($query);
    try{
        $stmt_query->execute();
        return true;
    }catch(Excepetion $e){
        return $e->getMessage();
    }
}

function verificarBanner($landingpage){
    $credenciais = credenciais('backend');
    extract($credenciais);
    $conexao = conectaBanco($hostname, $dbname, $username, $password);
    $banner = "SELECT * FROM banner WHERE landingpage = ".$landingpage;
    $stmt_banner = $conexao->prepare($banner);
    $stmt_banner->execute();
    if($stmt_banner->rowCount()>0){
        return true;
    }else{
        return false;
    }    
}

function verificarBanner_fe($landingpage){
    $credenciais = credenciais('frontend');
    extract($credenciais);
    $conexao = conectaBanco($hostname, $dbname, $username, $password);
    $banner = "SELECT * FROM banner WHERE landingpage = ".$landingpage;
    $stmt_banner = $conexao->prepare($banner);
    $stmt_banner->execute();
    if($stmt_banner->rowCount()>0){
        return true;
    }else{
        return false;
    }    
}

function listarBanner($landingpage){
    $credenciais = credenciais('backend');
    extract($credenciais);
    $conexao = conectaBanco($hostname, $dbname, $username, $password);
    $banner = "SELECT * FROM banner WHERE landingpage = ".$landingpage;
    $stmt_banner = $conexao->prepare($banner);
    $stmt_banner->execute();
    $banner = $stmt_banner->fetch(PDO::FETCH_ASSOC);
    return $banner;
}

function listarBanner_fe($landingpage){
    $credenciais = credenciais('frontend');
    extract($credenciais);
    $conexao = conectaBanco($hostname, $dbname, $username, $password);
    $banner = "SELECT * FROM banner WHERE landingpage = ".$landingpage;
    $stmt_banner = $conexao->prepare($banner);
    $stmt_banner->execute();
    $banner = $stmt_banner->fetch(PDO::FETCH_ASSOC);
    return $banner;
}


function inserirBanner($landingpage, $usuario, $imagem){
    $credenciais = credenciais('backend');
    extract($credenciais);
    $conexao = conectaBanco($hostname, $dbname, $username, $password);
    $data = date('y-m-d H:i:s');
    $banner = "INSERT INTO banner (landingpage, usuario, data, imagem) VALUES ('".$landingpage."', '".$usuario."', '".$data."', '".$imagem."')";
        $stmt_banner = $conexao->prepare($banner);
        try {
            $stmt_banner->execute();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    function atualizarBanner($landingpage, $imagem){
        $credenciais = credenciais('backend');
        extract($credenciais);
        $conexao = conectaBanco($hostname, $dbname, $username, $password);

        $banner_atual = listarBanner($landingpage);
        $caminho = './uploads/';
        unlink($caminho.$banner_atual['imagem']);
        $atualizar_banner = "UPDATE banner SET imagem = '".$imagem."' WHERE landingpage = ".$landingpage;
        $stmt_atualizar = $conexao->prepare($atualizar_banner);
        try {
            $stmt_atualizar->execute();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }