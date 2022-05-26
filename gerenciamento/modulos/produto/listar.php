<div class="jumbotron text-center padding-0">
	<h3>FAQ</h3>
	<p>Perguntas frequentes</p>
</div>
<div class="container">
	<ul class="list-inline">
		<li class="list-inline-item"><a href="./?modulo=produto&acao=cadastrar"><i class="fa fa-plus"></i> Adicionar pergunta<a></li>
		</ul>
	</div>
	<div class="container">
		<hr>
		<h5 class="mb-3"># FAQs Cadastradas</h5>
		<div class="row">
			<?php
			$credenciais = credenciais('backend');
			extract($credenciais);
			$conexao = conectaBanco($hostname, $dbname, $username, $password);	

			$query = "SELECT * FROM produto ORDER BY id DESC";
			$produtos = $conexao->prepare($query);
			$produtos->execute();
			while($produto = $produtos->fetch(PDO::FETCH_ASSOC)){
				if($produto['imagem']==''){
					$imagem = '';
				}else{
					$imagem = '<img class="img-thumbnail" src="./uploads/'.$produto['imagem'].'">';
				}
				?>
				<div class="col-md-3">
					<?=$imagem?>
					<h5 class=""><?=$produto['nome']?></h5>
					<p class=""><?=$produto['descricao']?></p>
					<p class=""><a href="./?modulo=produto&acao=atualizar&id=<?=$produto['id']?>"><i class="far fa-edit"></i> Editar</a></p>
					<p class=""><a href="./?modulo=produto&acao=excluir&id=<?=$produto['id']?>"><i class="fa fa-times"></i> Excluir</a></p>
				</div>
				<?php
			}
			?>
		</div>
	</div>