<div class="jumbotron text-center padding-0">
	<h3>Depoimentos</h3>
	<p>Informe os Depoimentos que você presta</p>
</div>
<div class="container">
	<ul class="list-inline">
		<li class="list-inline-item"><a href="./?pagina=depoimento_cadastrar&acao=cadastrar"><i class="fa fa-plus"></i> Adicionar Depoimentos<a></li>
		</ul>
	</div>
	<div class="container">
		<hr>
		<h5 class="mb-3"># Depoimentos Cadastrados</h5>
		<div class="row">
			<?php
			$id = $_SESSION['u_id'];
			$afiliado = crud('listar', 'usuario', 'WHERE id = '.$id.' AND tipo = "afiliado"', '$sucesso', '$falha', '$id');
			$credenciais = credenciais('backend');
			extract($credenciais);
			$conexao = conectaBanco($hostname, $dbname, $username, $password);
			$query = "SELECT * FROM depoimento WHERE landingpage = ".$afiliado['lp']." ORDER BY id DESC";
			$depoimentos = $conexao->prepare($query);
			$depoimentos->execute();
			while($depoimento = $depoimentos->fetch(PDO::FETCH_ASSOC)){
				?>
				<div class="col-md-2">
					<img class="img-thumbnail" src="./uploads/<?=$depoimento['foto']?>">
					<h5 ><?=$depoimento['nome']?></h5>
					<p ><?=$depoimento['depoimento']?></p>
					<p ><a href="./?pagina=depoimento_atualizar&acao=atualizar&id=<?=$depoimento['id']?>"><i class="far fa-edit"></i> Editar</a></p>
					<p ><a href="./?pagina=depoimento_excluir&acao=excluir&id=<?=$depoimento['id']?>"><i class="fa fa-times"></i> Excluir</a></p>
				</ul>
				<hr>
			</div>
			<?php
		}
		?>
	</div>
</div>