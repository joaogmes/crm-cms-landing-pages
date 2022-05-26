<?php
$id = $_SESSION['u_id'];
$afiliado = crud('listar', 'usuario', 'WHERE id = '.$id.' AND tipo = "afiliado"', '$sucesso', '$falha', '$id');
$cadastrar = (isset($_GET['acao'])) ? true : false;
if($cadastrar){
	// die("bom dia meu lead");
}
?>
<div class="jumbotron text-center padding-0">
	<h3>Contatos</h3>
	<p>Cadastros e mensagens recebidos</p>
</div>
<!-- <div class="container">
	
	<form>
		<div class="form-row align-items-center mb-3">
			<div class="col-12 col-md-2 mb-2">
				<a class="btn btn-outline-primary" href="./?pagina=leads&acao=cadastrar"><i class="fa fa-plus"></i> Adicionar contato</a>
			</div>
		</div>
	</form>
</div> -->
<div class="container">
	<hr>
	<h5 class="mb-3"># Contatos Cadastrados</h5>
	<div class="row">
		<div class="table-responsive">
			<table class="table table-hover md-12 text-center">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Cadastro</th>
						<th scope="col">Nome</th>
						<th scope="col">E-mail</th>
						<th scope="col">Telefone</th>
						<th scope="col">Origem</th>
						<th scope="col"></th>
						<th scope="col"></th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$credenciais = credenciais('backend');
					extract($credenciais);
					$conexao = conectaBanco($hostname, $dbname, $username, $password);
					$query = "SELECT * FROM contato WHERE landingpage = ".$afiliado['lp']." ORDER BY id DESC";
					$contatos = $conexao->prepare($query);
					$contatos->execute();
					while($contato = $contatos->fetch(PDO::FETCH_ASSOC)){
						?>
						<tr>
							<th scope="row"><?=$contato['id']?></th>
							<td><?=date_format(date_create($contato['datacadastro']), 'd/m/Y H:i')?></td>
							<td><?=$contato['nome']?></td>
							<td><?=$contato['email']?></td>
							<td><?=$contato['telefone']?></td>
							<td><?=$contato['origem']?></td>
							<td><a href="?pagina=mensagens&lead=<?=$contato['id']?>"><i class="far fa-comments text-primary fa-2x "></i></a> </td>
							<td><a href="#" class="whatsapp" data-nome="<?=$contato['nome']?>" data-contato="<?=$contato['id']?>" data-destinatario="<?=$contato['telefone']?>" data-telefone="<?=$contato['telefone']?>"><i class="fab text-success fa-2x fa-whatsapp"></i></a> </td>
							<td><a href="#" class="email"  data-nome="<?=$contato['nome']?>" data-contato="<?=$contato['id']?>" data-destinatario="<?=$contato['email']?>" data-email="<?=$contato['email']?>"><i class="fa text-info fa-2x fa-envelope"></i></a> </td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
		</div>
		<!-- Button trigger modal -->
		<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			Launch demo modal
		</button> -->
		<!-- Modal -->
		<div class="modal fade" id="modalWhats" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content text-center">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Enviar mensagem via WhatsApp para: <span id="nome-texto"></span></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>O telefone deve conter o código do país e não pode haver nenhum caractere especial. Exemplo: 5511999999999</p>
						<form id="form-whats" method="post">
							<input type="hidden" name="destinatario" id="destinatario">
							<input type="hidden" name="remetente" id="remetente" value="<?=$cliente['nome']?>">
							<input type="hidden" name="nome" id="nome">
							<input type="hidden" name="contato" id="contato">
							<input type="hidden" name="data" id="data" value="<?=date('Y-m-d H:i:s')?>">
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="telefone">WhatsApp:</label>
									<input type="text" class="form-control" id="telefone" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<label for="mensagem">Mensagem:</label>
									<textarea class="form-control" id="mensagem-whats" required></textarea>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<button type="button" id="enviar-whatsapp" class="btn btn-primary">Enviar Mensagem</button>
					</div>
					<div class="modal-footer">
						<div id="resultado-whats"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="modalEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content text-center">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Enviar e-mail para: <span id="texto-email"></span></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form-email" method="post">
							<input type="hidden" name="destinatario" id="destinatario-email">
							<input type="hidden" name="remetente" id="remetente-email" value="<?=$cliente['nome']?>">
							<input type="hidden" name="nome" id="nome-email">
							<input type="hidden" name="contato" id="contato-email">
							<input type="hidden" name="data" id="data-email" value="<?=date('Y-m-d H:i:s')?>">
							<div class="form-row">
								<!-- <div class="form-group col-md-6">
											<input type="text" class="form-control" id="nome">
										</div> -->
										<div class="form-group col-md-12">
											<label for="email">E-mail</label>
											<input type="text" class="form-control" id="email" required>
										</div>
										<div class="form-group col-md-12">
											<label for="assunto">Assunto</label>
											<input type="text" class="form-control" id="assunto" required>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-12">
											<label for="mensagem">Mensagem:</label>
											<textarea class="form-control summernote" id="mensagem-email" required></textarea>
										</div>
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								<button type="button" class="btn btn-primary" id="enviar-email">Enviar E-mail</button>
								<div id="resultado-email"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				$(document).ready(function($) {
					$('.summernote').summernote({
						placeholder: 'Hello Bootstrap 4',
						tabsize: 2,
						height: 400
					});
					$(".whatsapp").click(function(){
						$("#resultado-whats").html('');
						$("#destinatario").val('');
						$("#telefone").val('');
						$("#mensagem-whats").val('');
						$("#contato").val('');
						var nome = $(this).data('nome');
						var destinatario = $(this).data('destinatario');
						var telefone = $(this).data('telefone');
						var contato = $(this).data('contato');
						$("#nome").val(nome);
						$("#destinatario").val(destinatario);
						$("#contato").val(contato);
						$("#nome-texto").html(nome);
						$("#telefone").val(telefone);
						$("#modalWhats").modal();
					})
					$(".email").click(function(){
						var email = $(this).data('email');
						$("#email").val(email);
						$("#texto-email").html(email);
						$("#resultado-email").html('');
						$("#destinatario-email").val('');
						$("#telefone-email").val('');
						$("#mensagem-email").val('');
						$("#contato-email").val('');
						var nome = $(this).data('nome');
						var destinatario = $(this).data('destinatario');
			// var telefone = $(this).data('telefone');
			var contato = $(this).data('contato');
			$("#nome-email").val(nome);
			$("#destinatario-email").val(destinatario);
			$("#contato-email").val(contato);
			$("#texto-email").html(nome);
			// $("#telefone-email").val(telefone);
			$("#modalEmail").modal();
			
		})
					$("#enviar-whatsapp").click(function(){
						$("#form-whats").submit();
					})
					$("#enviar-email").click(function(){
						$("#form-email").submit();
					})
				});
				$("#form-whats").submit(function(event) {
					var ajaxRequest;
					event.preventDefault();
					$("#resultado-whats").html('');
					var telefone = $("#telefone").val();
					var mensagem = $("#mensagem-whats").val();
					var destinatario = $("#destinatario").val();
					var contato = $("#contato").val();
					var nome = $("#nome").val();
					var data = $("#data").val();
					var dados = {
						'tipo' : 'whatsapp',
						'destinatario' : destinatario,
						'remetente' : 'portal',
						'canal' : 'portal',
						'contato' : contato,
						'assunto' : 'Contato via WhatsApp',
						'mensagem' : mensagem,
						'data' : data,
						'telefone' : telefone
					};
					console.log(dados);
					ajaxRequest= $.ajax({
						url: "./enviar-mensagem.php",
						type: "post",
						data: dados
					});
					ajaxRequest.done(function (response, textStatus, jqXHR){
						$("#resultado-whats").html(response);
					});
				})
				$("#form-email").submit(function(event) {
					var ajaxRequest;
					event.preventDefault();
					$("#resultado-email").html('');
					var telefone = $("#telefone").val();
					var mensagem = $("#mensagem-email").val();
					var destinatario = $("#destinatario-email").val();
					var assunto = $("#assunto").val();
					var contato = $("#contato-email").val();
					var nome = $("#nome-email").val();
					var data = $("#data-email").val();
					var dados = {
						'tipo' : 'email',
						'destinatario' : destinatario,
						'remetente' : 'portal',
						'canal' : 'portal',
						'contato' : contato,
						'assunto' : assunto,
						'mensagem' : mensagem,
						'data' : data,
						'telefone' : telefone
					};
					console.log(dados);
					ajaxRequest= $.ajax({
						url: "./enviar-mensagem.php",
						type: "post",
						data: dados
					});
					ajaxRequest.done(function (response, textStatus, jqXHR){
						$("#resultado-email").html(response);
					});
				})
			</script>