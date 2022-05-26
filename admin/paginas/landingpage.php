<div class="container">
		<h3>Landing Pages</h3>
		<p>Escolha uma opção:</p>
		<div class="col-6">
			
		</div>
		<div class="col-6">
		</div>
		<a href="?pagina=landingpage&acao=cadastrar" class="btn btn-lg btn-dark mt-2"><i class="fa fa-plus-square-o"></i> Cadastrar Nova LP</a>
		<a href="?pagina=landingpage&acao=listar" class="btn btn-lg btn-outline-dark mt-2"><i class="fa fa-list"></i> Listar LP's</a>

</div>

<div class="container mt-4">
	<?php
	if($acao != ''){
		$caminho = './paginas/landingpage/'.$acao.'.php';
		if(file_exists($caminho)){
			include($caminho);
		}
	}
	?>
</div>