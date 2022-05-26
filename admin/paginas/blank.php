<?php
if($_SESSION['tipo'] != 'admin'){
      // header("Location: ./admin/paginas/sair.php");
    }
?>
<h5>Últimos Leads</h5>
<p>Listando os últimos 10 registros efetuados nas landing pages</p>
<hr>
<div class="container">
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
						<!-- <th scope="col"></th> -->
						<!-- <th scope="col"></th> -->
					</tr>
				</thead>
				<tbody>
					<?php
					$rows = listarLeads();
					while($row = $rows->fetch(PDO::FETCH_ASSOC)){
					?>
					<tr>
						<th scope="row"><?=$row['id']?></th>
						<td><?=date_format(date_create($row['datacadastro']), 'd/m/Y')?></td>
						<td><?=$row['nome']?></td>
						<td><?=$row['email']?></td>
						<td><?=$row['cidade_uf']?></td>
						<td><?=$row['cep']?></td>
						<td><?=$row['valor_conta']?></td>
						<td><?=$row['telefone']?></td>
						<td><?=$row['origem']?></td>
						<td><?=$row['landingpage']?></td>
						<!-- <td><a href="#" class="whatsapp" data-nome="<?=$row['nome']?>" data-contato="<?=$row['id']?>" data-destinatario="<?=$row['telefone']?>" data-telefone="<?=$row['telefone']?>"><i class="fa fa-whatsapp text-success fa-2x"></i></a> </td> -->
						<!-- <td><a href="#" class="email"  data-nome="<?=$row['nome']?>" data-contato="<?=$row['id']?>" data-destinatario="<?=$row['email']?>" data-email="<?=$row['email']?>"><i class="fa text-primary fa-2x fa-envelope"></i></a> </td> -->
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>