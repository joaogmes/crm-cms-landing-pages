<div class="jumbotron text-center padding-0">
	<h3>Como funciona</h3>
	<p>Cadastre as etapas</p>
</div>
<div class="container">
	<ul class="list-inline">
		<li class="list-inline-item"><a href="./?modulo=servico&acao=cadastrar"><i class="fa fa-plus"></i> Adicionar Etapas<a></li>
		</ul>
	</div>
	<div class="container">
		<hr>
		<h5 class="mb-3"># Etapas Cadastrados</h5>
		<div class="row">
			
			<?php
			$credenciais = credenciais('backend');
			extract($credenciais);
			$conexao = conectaBanco($hostname, $dbname, $username, $password);
			$query = "SELECT * FROM servico ORDER BY id DESC";
			$servicos = $conexao->prepare($query);
			$servicos->execute();

			while($servico = $servicos->fetch(PDO::FETCH_ASSOC)){
				?>
				<div class="col-md-2 text-center">
					<?php
						if($servico['imagem']!=''){
							?>
								<img class="img-thumbnail" src="./uploads/<?=$servico['imagem']?>">
							<?php
						}
					?>
					<h5 class="mt-3"><?=$servico['nome']?></h5>
					<!-- <p ><?=$servico['descricao']?></p> -->
					<p ><a href="./?modulo=servico&acao=atualizar&id=<?=$servico['id']?>"><i class="far fa-edit"></i> Editar</a></p>
					<p ><a href="./?modulo=servico&acao=excluir&id=<?=$servico['id']?>"><i class="fa fa-times"></i> Excluir</a></p>
				</ul>
				<hr>
			</div>
			<?php
		}
		?>
	</div>
</div>