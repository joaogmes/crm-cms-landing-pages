<?php
$chave = (isset($_POST['chave'])) ? $_POST['chave'] : null;
$valor = (isset($_POST['valor'])) ? $_POST['valor'] : null;

if(isset($chave) && isset($valor)){
	$listagem = filtrarLP($chave, $valor);
}else{
	$listagem = listarLP();
}

?>
<style type="text/css">
	@media only screen and (min-width: 600px) {
	td{
    line-break: anywhere;
    word-break: break-word;
    max-width: 10vw;
	}

	td.email{
	max-width: 15vw !important;	
	}
}
</style>
<h5>Lista de Landing Pages</h5>
<hr>
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form action="./?pagina=landingpage&acao=listar" method="POST">
			<div class="input-group">
				<select class="form-control" name="chave"> 
					<option value="">Filtrar por:</option>
					<option value="nome">Landing Page</option>
					<option value="franqueado">Franqueado</option>
					<option value="whatsapp">WhatsApp</option>
					<option value="email">E-mail</option>
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
					<th scope="col">Landing Page</th>
					<th scope="col">Link da unidade</th>
					<th scope="col">Franqueado</th>
					<th scope="col">E-mail</th>
					<th scope="col">Whatsapp</th>
					<th scope="col">Leads</th>
					<th scope="col">Msgs</th>
					<th scope="col">Site</th>
					<th scope="col">Mudar</th>
					<th scope="col">Apagar</th>
				</tr>
			</thead>
			<tbody>
				<?php
				
				while($row = $listagem->fetch(PDO::FETCH_ASSOC)){
					?>
					<tr>
						<th scope="row"><?=$row['id']?></th>
						<td><?=$row['nome']?></td>
						<td><?=$row['dominio']?></td>
						<td><?=$row['franqueado']?></td>
						<td class="email" ><?=$row['email']?></td>
						<td><?=$row['whatsapp']?></td>
						<td><a href="./?pagina=contatos&acao=ver&lp=<?=$row['id']?>" class="btn btn-success"><i class="fa fa-list-alt"></i></a></td>
						<td><a href="./?pagina=mensagens&acao=ver&lp=<?=$row['id']?>" class="btn btn-primary"><i class="fa fa-commenting-o"></i></a></td>
						<td><a href="../<?=$row['pasta']?>/" class="btn btn-outline-dark " target="_blank"><i class="fa fa-desktop"></i></a></td>
						<td><a href="./?pagina=landingpage&acao=editar&id=<?=$row['id']?>" class="btn btn-outline-dark  "><i class="fa fa-pencil"></i> </a></td>
						<td><a href="./?pagina=landingpage&acao=desativar&id=<?=$row['id']?>" class="btn btn-outline-danger "><i class="fa fa-times"></i></a></td>
						
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>