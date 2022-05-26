<?php 
// Load the database configuration file 
include_once '../config.php'; 
$conn = database();
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 

$tabela = (isset($_REQUEST['tabela'])) ? $_REQUEST['tabela'] : false;
$lp = (isset($_REQUEST['lp'])) ? $_REQUEST['lp'] : false;
$chave = (isset($_REQUEST['chave'])) ? $_REQUEST['chave'] : false;
$valor = (isset($_REQUEST['valor'])) ? $_REQUEST['valor'] : false;

// die(var_dump($_REQUEST));

// Excel file name for download 
if($lp){
    $nome_lp = nomeLP($lp);
    $fileName = "leads-".$nome_lp."-" . date('d-m-Y') . ".xlsx"; 
    $sql_lp = " WHERE landingpage = ".$lp;
}else{
    $nome_lp = 'energyBrasil';
    $fileName = "leads-".$nome_lp."-" . date('d-m-Y') . ".xlsx"; 
    $sql_lp = " ";
}

// Column names 
$camposContato = array('id', 'nome', 'email', 'telefone', 'datacadastro', 'origem', 'newsletter', 'landingpage', 'cidade_uf', 'cep', 'valor_conta'); 

// Display column names as first row 
$excelData = implode("\t", array_values($camposContato)) . "\n"; 

// Fetch records from database 
$query = $conn->prepare("SELECT * FROM contato ".$sql_lp."  ORDER BY id ASC"); 
$query->execute();
if($query->rowCount() > 0){ 
    // Output each row of the data 
    while($row = $query->fetch(PDO::FETCH_ASSOC)){ 
        $status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['id'], $row['nome'], $row['email'], $row['telefone'], $row['datacadastro'], $row['origem'], $row['newsletter'], $row['landingpage'], $row['cidade_uf'], $row['cep'], $row['valor_conta'] ); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 

// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 

// Render excel data 
echo $excelData; 

exit;