<?php
$chave = (isset($_POST['chave'])) ? $_POST['chave'] : false;
$valor = (isset($_POST['valor'])) ? $_POST['valor'] : false;
$contato = (isset($_GET['contato'])) ? $_GET['contato'] : false;
$lp = (isset($_GET['lp'])) ? $_GET['lp'] : false;
$mensagem_contato = '<p>Listando as mensagens recebidas</p>';
$get_lp = "";
if($lp){
	if($chave && $valor){
		$rows = filtrarMensagensLp($chave, $valor, $lp);
	}else{
		$rows=verMensagens($lp);
	}
	$nome_lp = nomeLP($lp);
	$mensagem_contato = '<p>Listando mensagens para: <strong>'.$nome_lp.'</strong> </p>';
	$get_lp = "&lp=".$lp;
}else if($contato){
	if($chave && $valor){
		$rows = filtrarMensagensLpContato($chave, $valor, $lp, $contato);
	}else{
		$rows=filtrarMensagensContato($contato);
	}
	$nome_lp = nomeLP($lp);
	$mensagem_contato = '<p>Listando mensagens para: <strong>'.$nome_lp.'</strong> </p>';
	$get_lp = "&lp=".$lp;
}else{
	if($chave && $valor){
		$rows = filtrarLMensagens($chave, $valor);
	}else{
		$rows = listarMensagens();
	}
}
?>
<h5>Mensagens Recebidas</h5>
<?=$mensagem_contato?>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<form action="./?pagina=mensagens&acao=listar<?=$get_lp?>" method="POST">
				<div class="input-group">
					<select class="form-control" name="chave">
						<option value="">Filtrar por:</option>
						<option value="id">#Código</option>
						<option value="contato">Nome do Contato</option>
						<option value="id_contato">Código do Contato</option>
						<option value="tipo">tipo</option>
						<option value="destinatario">destinatario</option>
						<option value="remetente">remetente</option>
						<option value="canal">canal</option>
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
						<th scope="col">Data</th>
						<th scope="col">Tipo</th>
						<th scope="col">Destinatário</th>
						<th scope="col">Remetente</th>
						<th scope="col">Canal</th>
						<th scope="col">Contato</th>
						<th scope="col">Assunto</th>
						<th scope="col">Mensagem</th>
						<!-- <th scope="col"></th> -->
						<!-- <th scope="col"></th> -->
					</tr>
				</thead>
				<tbody>
					<?php
					// $rows = listarMensagens();
					while($row = $rows->fetch(PDO::FETCH_ASSOC)){
					?>
					<tr>
						<th scope="row"><?=$row['id']?></th>
						<td><?=date_format(date_create($row['data']), 'd/m/Y - H:i')?></td>
						<td><?=$row['tipo']?></td>
						<td><?=$row['destinatario']?></td>
						<td><?=$row['remetente']?></td>
						<td><?=$row['canal']?></td>
						<td><?=$row['contato']?></td>
						<td><?=$row['assunto']?></td>
						<td><?=$row['mensagem']?></td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>