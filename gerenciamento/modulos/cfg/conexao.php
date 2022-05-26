<?php
date_default_timezone_set('America/Sao_Paulo');
function conectaBanco($hostname, $dbname, $username, $password)
{
    try {
        $conexao = new PDO(
            "mysql:host=$hostname;dbname=$dbname",
            $username,
            $password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
        );

        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conexao;
    } catch (PDOException $e) {
        return false;
        // echo $e->getMessage();
    }
}

function credenciais($ambiente){
    if($ambiente=='frontend'){
        $caminho = './gerenciamento/modulos/cfg/credenciais.json';
    }else{
        $caminho = './modulos/cfg/credenciais.json';
    }
    if(file_exists($caminho)){
        $credenciais = json_decode(file_get_contents($caminho), TRUE);
    return $credenciais;
    }else{
        return false;
    }
}

function criarTabelas(){
    $tabelas = file_get_contents('./modulos/cfg/landingcrm_criacao.sql');
    return $tabelas;
}