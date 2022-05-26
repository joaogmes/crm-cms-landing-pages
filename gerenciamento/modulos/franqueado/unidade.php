<?php
$id = $_SESSION['u_id'];
$afiliado = crud('listar', 'usuario', 'WHERE id = '.$id.' AND tipo = "afiliado"', '$sucesso', '$falha', '$id');
$form = (isset($_POST['lp'])) ? true : false;
if($form){
	extract($_POST);
	// $scripts = $_POST['scripts'];
	$mapa = addslashes($mapa);
	$atualizar = atualizarUnidade($logradouro,$numero,$bairro,$cidade,$estado,$latitude,$longitude,$facebook,$instagram,$mensagem_whatsapp,$mapa,$id);
	var_dump($atualizar);
	if($atualizar){
		echo "<p>Atualização bem sucedida!</p><script>window.location.href='./?pagina=unidade'</script>";
	}else{
		echo $atualizar;
	}
}
?>
<div class="container">
	<h5>Unidade</h5>
	<p>Configurações da unidade de:<strong> <?=$afiliado['nome']?> </strong></p>
	<hr>
	<div class="row">
		<form method="POST" accept-charset="utf8">
			<input type="hidden" name="id" value="<?=$id?>">
			<input type="hidden" name="tipo" value="afiliado">
			<input type="hidden" name="lp" value="<?=$afiliado['lp']?>">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="form-group mt-3 col-md-4">
							<label for="logradouro"><strong><?=strtoupper('logradouro')?>:</strong></label>
							<input class="form-control " type="text" name="logradouro" id="logradouro" value="<?=$afiliado['logradouro']?>" placeholder="Av fulano de tal" >
						</div>
						<div class="form-group mt-3 col-md-4">
							<label for="numero"><strong><?=strtoupper('numero')?>:</strong></label>
							<input class="form-control " type="text" name="numero" id="numero" value="<?=$afiliado['numero']?>" placeholder="1234" >
						</div>
						<div class="form-group mt-3 col-md-4">
							<label for="bairro"><strong><?=strtoupper('bairro')?>:</strong></label>
							<input class="form-control " type="text" name="bairro" id="bairro" value="<?=$afiliado['bairro']?>" placeholder="Jardim Beltrano" >
						</div>
						<div class="form-group mt-3 col-md-4">
							<label for="cidade"><strong><?=strtoupper('cidade')?>:</strong></label>
							<input class="form-control " type="text" name="cidade" id="cidade" value="<?=$afiliado['cidade']?>" placeholder="Cidadópolis" >
						</div>
						<div class="form-group mt-3 col-md-4">
							<label for="estado"><strong><?=strtoupper('estado')?>:</strong></label>
							<select class="form-control" id="estado" name="estado" >
								<option <?=($afiliado['estado'] == 'AC') ? 'selected' : ''?> value="AC">Acre</option>
								<option <?=($afiliado['estado'] == 'AL') ? 'selected' : ''?> value="AL">Alagoas</option>
								<option <?=($afiliado['estado'] == 'AP') ? 'selected' : ''?> value="AP">Amapá</option>
								<option <?=($afiliado['estado'] == 'AM') ? 'selected' : ''?> value="AM">Amazonas</option>
								<option <?=($afiliado['estado'] == 'BA') ? 'selected' : ''?> value="BA">Bahia</option>
								<option <?=($afiliado['estado'] == 'CE') ? 'selected' : ''?> value="CE">Ceará</option>
								<option <?=($afiliado['estado'] == 'DF') ? 'selected' : ''?> value="DF">Distrito Federal</option>
								<option <?=($afiliado['estado'] == 'ES') ? 'selected' : ''?> value="ES">Espírito Santo</option>
								<option <?=($afiliado['estado'] == 'GO') ? 'selected' : ''?> value="GO">Goiás</option>
								<option <?=($afiliado['estado'] == 'MA') ? 'selected' : ''?> value="MA">Maranhão</option>
								<option <?=($afiliado['estado'] == 'MT') ? 'selected' : ''?> value="MT">Mato Grosso</option>
								<option <?=($afiliado['estado'] == 'MS') ? 'selected' : ''?> value="MS">Mato Grosso do Sul</option>
								<option <?=($afiliado['estado'] == 'MG') ? 'selected' : ''?> value="MG">Minas Gerais</option>
								<option <?=($afiliado['estado'] == 'PA') ? 'selected' : ''?> value="PA">Pará</option>
								<option <?=($afiliado['estado'] == 'PB') ? 'selected' : ''?> value="PB">Paraíba</option>
								<option <?=($afiliado['estado'] == 'PR') ? 'selected' : ''?> value="PR">Paraná</option>
								<option <?=($afiliado['estado'] == 'PE') ? 'selected' : ''?> value="PE">Pernambuco</option>
								<option <?=($afiliado['estado'] == 'PI') ? 'selected' : ''?> value="PI">Piauí</option>
								<option <?=($afiliado['estado'] == 'RJ') ? 'selected' : ''?> value="RJ">Rio de Janeiro</option>
								<option <?=($afiliado['estado'] == 'RN') ? 'selected' : ''?> value="RN">Rio Grande do Norte</option>
								<option <?=($afiliado['estado'] == 'RS') ? 'selected' : ''?> value="RS">Rio Grande do Sul</option>
								<option <?=($afiliado['estado'] == 'RO') ? 'selected' : ''?> value="RO">Rondônia</option>
								<option <?=($afiliado['estado'] == 'RR') ? 'selected' : ''?> value="RR">Roraima</option>
								<option <?=($afiliado['estado'] == 'SC') ? 'selected' : ''?> value="SC">Santa Catarina</option>
								<option <?=($afiliado['estado'] == 'SP') ? 'selected' : ''?> value="SP">São Paulo</option>
								<option <?=($afiliado['estado'] == 'SE') ? 'selected' : ''?> value="SE">Sergipe</option>
								<option <?=($afiliado['estado'] == 'TO') ? 'selected' : ''?> value="TO">Tocantins</option>
								<option <?=($afiliado['estado'] == 'EX') ? 'selected' : ''?> value="EX">Estrangeiro</option>
							</select>
						</div>
						<div class="form-group mt-3 col-md-4">
							<label for="latitude"><strong><?=strtoupper('latitude')?>:</strong></label>
							<input class="form-control " type="text" name="latitude" id="latitude" value="<?=$afiliado['latitude']?>" placeholder="-123456789" >
						</div>
						<div class="form-group mt-3 col-md-4">
							<label for="longitude"><strong><?=strtoupper('longitude')?>:</strong></label>
							<input class="form-control " type="text" name="longitude" id="longitude" value="<?=$afiliado['longitude']?>" placeholder="-123456789" >
						</div>
						<div class="form-group mt-3 col-md-4">
							<label for="facebook"><strong><?=strtoupper('facebook')?>:</strong></label>
							<input class="form-control " type="text" name="facebook" id="facebook" value="<?=$afiliado['facebook']?>" placeholder="https://facebook.com/minha-unidade" >
						</div>
						<div class="form-group mt-3 col-md-4">
							<label for="instagram"><strong><?=strtoupper('instagram')?>:</strong></label>
							<input class="form-control " type="text" name="instagram" id="instagram" value="<?=$afiliado['instagram']?>" placeholder="https://instagram.com/minha-unidade" >
						</div>
						<div class="form-group mt-3 col-md-6">
							<label for="mensagem_whatsapp"><strong><?=strtoupper('mensagem_whatsapp')?>:</strong></label>
							<textarea class="form-control" rows="10" name="mensagem_whatsapp" id="mensagem_whatsapp" placeholder="Quero falar com um consultor Energy Brasil"><?=$afiliado['mensagem_whatsapp']?></textarea>
						</div>
						<div class="form-group mt-3 col-md-6">
							<label for="mapa"><strong><?=strtoupper('mapa')?>:</strong></label>
							<textarea class="form-control" rows="10" name="mapa" id="mapa" placeholder="Cole o código do Google Maps aqui"><?=$afiliado['mapa']?></textarea>
						</div>
						
					</div>
				</div>
				<div class="form-group mt-3 col-sm-12">
					<input class="form-control" type="submit" value="Enviar">
				</div>
			</div>
		</form>
	</div>
</div>