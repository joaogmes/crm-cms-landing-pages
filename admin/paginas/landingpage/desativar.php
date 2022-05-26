<h5>Exclusão de Landing Page</h5>
<hr>
<div class="alert alert-danger" role="alert">
	<strong>Aviso importante:</strong> as landing pages desativadas entrarão automaticamente em modo de manutanção. Essa ação pode prejudicar correntes ações de venda na página selecionada.
</div>
<?php
if(isset($_GET['id']) && isset($_GET['confirmacao'])){
	$id = $_GET['id'];
	if($_GET['confirmacao'] == 'sim'){
		if(desativarLP($id)){
			echo "Landing page desativada!";
			?>
			<a href="?pagina=landingpage&acao=listar" class="btn btn-primary mt-2">Voltar para listagem</a>
			<?php
			die();
		}else{
			echo "Erro ao desativar LP";
		}
	}
}
?>
<h4>Você deseja desativar a página?</h4>
<a href="./?pagina=landingpage&acao=desativar&id=<?=$_GET['id']?>&nome=<?=$_GET['nome']?>&confirmacao=sim" class="btn btn-danger mt-2"><i class="fa fa-times"></i> Sim, desativar a LP</a> 
<a href="?pagina=landingpage&acao=listar" class="btn btn-primary mt-2">Não, voltar</a>
</div>
</form>