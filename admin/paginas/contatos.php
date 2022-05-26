<?php
$chave = (isset($_POST['chave'])) ? $_POST['chave'] : false;
$valor = (isset($_POST['valor'])) ? $_POST['valor'] : false;
$lp = isset($_GET['lp']) ? $_GET['lp'] : false;
$mensagem_lp = '<p>Listando os últimos 10 registros efetuados nas landing pages</p>';
$get_lp = "";
$nome_lp = false;
if($lp){
	if($chave && $valor){
		$rows = filtrarLeadsLp($chave, $valor, $lp);
	}else{
		$rows=verLeads($lp);
	}
	$nome_lp = nomeLP($lp);
	$mensagem_lp = '<p>Listando os leads de: <strong>'.$nome_lp.'</strong> </p>';
	$get_lp = "&lp=".$lp;
}else{
	if($chave && $valor){
		$rows = filtrarLeads($chave, $valor);
	}else{
		$rows = listarLeads();
	}
}
?>
<h5>Últimos Leads</h5>
<?=$mensagem_lp?>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<a href="./paginas/exportar.php?&lp=<?=$lp?>" class="btn btn-outline-success mb-5">Exportar Leads</a>
			<form action="./?pagina=contatos&acao=listar<?=$get_lp?>" method="POST">
				<div class="input-group">
					<select class="form-control" name="chave">
						<option value="">Filtrar por:</option>
						<option value="id">#Código</option>
						<option value="nome">Nome</option>
						<option value="email">E-mail</option>
						<option value="telefone">Telefone</option>
						<option value="cep">Cep</option>
						<option value="cidade_uf">Cidade/Estado</option>
						<option value="valor_conta">Valor da Conta</option>
					</select>
					<div class="form-outline">
						<input type="search" id="form1" name="valor" class="form-control" placeholder="Sua busca..."/>
					</div>
					<input type="submit" class="btn btn-primary" value="Buscar">
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Cadastro</th>
						<th scope="col">Nome</th>
						<th scope="col">E-mail</th>
						<th scope="col">Cidade/UF</th>
						<th scope="col">CEP</th>
						<th scope="col">Valor Conta</th>
						<th scope="col">Telefone</th>
						<th scope="col">Origem</th>
						<th scope="col">Página</th>
						<th scope="col">Mensagens</th>
						<!-- <th scope="col"></th> -->
					</tr>
				</thead>
				<tbody>
					<?php
					
					while($row = $rows->fetch(PDO::FETCH_ASSOC)){
						$lp = $row['landingpage'];
						$nome_lp = nomeLP($lp);
					?>
					<tr>
						<th scope="row"><?=$row['id']?></th>
						<td><?=date_format(date_create($row['datacadastro']), 'd/m/Y')?></td>
						<td><?=['nome']?></td>
						<td><?=$row['email']?></td>
						<td><?=$row['cidade_uf']?></td>
						<td><?=$row['cep']?></td>
						<td><?=$row['valor_conta']?></td>
						<td><?=$row['telefone']?></td>
						<td><?=$row['origem']?></td>
						<td><?=$nome_lp?></td>
						<td><a href="./?pagina=mensagens&acao=ver&contato=<?=$row['id']?>" class="btn btn-success"><i class="fa fa-commenting-o" aria-hidden="true"></i>
						</a></td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>