<!DOCTYPE html>
<html lang="pt_br">
<head>
	<meta charset=UTF-8>
	<title><?=$seo['titulo']?></title>
	<meta name="author" content="<?=$seo['titulo']?>">
	<meta name="description" content="<?=$seo['descricao']?>">
	<meta name="keywords" content="<?=$seo['keywords']?>">
	<meta name="robots" content= "index, follow">
	<meta property="og:image" content="./gerenciamento/uploads/<?=$seo['imagem']?>">
	<meta property="og:image:type" content="image/jpeg">
	<meta property="og:image:width" content="800"> 
	<meta property="og:image:height" content="600">
	<style type="text/css" media="screen">
		:root{
			--cor-primaria: <?=$template['corprimaria']?>;
			--cor-secundaria: <?=$template['corsecundaria']?>;
			--cor-terciaria: <?=$template['corterciaria']?>;
		}
	</style>
	<meta name=viewport content="width=device-width, initial-scale=1.0">
	<meta name=facebook-domain-verification content=sm4rr9qj9b3jkmdac30i2u7i5v8dwe />
	<link rel="shortcut icon" href="<?=$icone_mostrar?>">
	<link rel=apple-touch-icon href="<?=$icone_mostrar?>"/>
	<link rel=apple-touch-icon-precomposed href="<?=$icone_mostrar?>"/>
	<!-- LIBS AND CSS -->
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel=stylesheet type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap-utilities.min.css">
	<link rel=stylesheet type="text/css" href="<?=$tema?>frameworks/css/grid.css">
	<link rel=stylesheet type="text/css" href="<?=$tema?>frameworks/slick/slick.css">
	<link rel=stylesheet type="text/css" href="<?=$tema?>frameworks/fontawesome/css/all.min.css">
	<link rel=stylesheet type="text/css" href="<?=$tema?>frameworks/lightbox/css/lightbox.min.css">
	<link rel=preconnect href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel=stylesheet>
	<link rel=stylesheet type="text/css" href="<?=$tema?>css/app.css">
	<link rel=stylesheet type="text/css" href="<?=$tema?>css/mobile.css">
	<script>
		<?=$seo['scripts']?>
	</script>
</head>
<body>
	<section class=banner>
		<div class=row>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class=chamada>
					<div class=logo>
						<script pagespeed_no_defer="">//<![CDATA[
						(function(){var g=this,h=function(b,d){var a=b.split("."),c=g;a[0]in c||!c.execScript||c.execScript("var "+a[0]);for(var e;a.length&&(e=a.shift());)a.length||void 0===d?c[e]?c=c[e]:c=c[e]={}:c[e]=d};var l=function(b){var d=b.length;if(0<d){for(var a=Array(d),c=0;c<d;c++)a[c]=b[c];return a}return[]};var m=function(b){var d=window;if(d.addEventListener)d.addEventListener("load",b,!1);else if(d.attachEvent)d.attachEvent("onload",b);else{var a=d.onload;d.onload=function(){b.call(this);a&&a.call(this)}}};var n,p=function(b,d,a,c,e){this.f=b;this.h=d;this.i=a;this.c=e;this.e={height:window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight,width:window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth};this.g=c;this.b={};this.a=[];this.d={}},q=function(b,d){var a,c,e=d.getAttribute("pagespeed_url_hash");if(a=e&&!(e in b.d))if(0>=d.offsetWidth&&0>=d.offsetHeight)a=!1;else{c=d.getBoundingClientRect();var f=document.body;a=c.top+("pageYOffset"in window?window.pageYOffset:(document.documentElement||f.parentNode||f).scrollTop);c=c.left+("pageXOffset"in window?window.pageXOffset:(document.documentElement||f.parentNode||f).scrollLeft);f=a.toString()+","+c;b.b.hasOwnProperty(f)?a=!1:(b.b[f]=!0,a=a<=b.e.height&&c<=b.e.width)}a&&(b.a.push(e),b.d[e]=!0)};p.prototype.checkImageForCriticality=function(b){b.getBoundingClientRect&&q(this,b)};h("pagespeed.CriticalImages.checkImageForCriticality",function(b){n.checkImageForCriticality(b)});h("pagespeed.CriticalImages.checkCriticalImages",function(){r(n)});var r=function(b){b.b={};for(var d=["IMG","INPUT"],a=[],c=0;c<d.length;++c)a=a.concat(l(document.getElementsByTagName(d[c])));if(0!=a.length&&a[0].getBoundingClientRect){for(c=0;d=a[c];++c)q(b,d);a="oh="+b.i;b.c&&(a+="&n="+b.c);if(d=0!=b.a.length)for(a+="&ci="+encodeURIComponent(b.a[0]),c=1;c<b.a.length;++c){var e=","+encodeURIComponent(b.a[c]);131072>=a.length+e.length&&(a+=e)}b.g&&(e="&rd="+encodeURIComponent(JSON.stringify(s())),131072>=a.length+e.length&&(a+=e),d=!0);t=a;if(d){c=b.f;b=b.h;var f;if(window.XMLHttpRequest)f=new XMLHttpRequest;else if(window.ActiveXObject)try{f=new ActiveXObject("Msxml2.XMLHTTP")}catch(k){try{f=new ActiveXObject("Microsoft.XMLHTTP")}catch(u){}}f&&(f.open("POST",c+(-1==c.indexOf("?")?"?":"&")+"url="+encodeURIComponent(b)),f.setRequestHeader("Content-Type","application/x-www-form-urlencoded"),f.send(a))}}},s=function(){var b={},d=document.getElementsByTagName("IMG");if(0==d.length)return{};var a=d[0];if(!("naturalWidth"in a&&"naturalHeight"in a))return{};for(var c=0;a=d[c];++c){var e=a.getAttribute("pagespeed_url_hash");e&&(!(e in b)&&0<a.width&&0<a.height&&0<a.naturalWidth&&0<a.naturalHeight||e in b&&a.width>=b[e].k&&a.height>=b[e].j)&&(b[e]={rw:a.width,rh:a.height,ow:a.naturalWidth,oh:a.naturalHeight})}return b},t="";h("pagespeed.CriticalImages.getBeaconData",function(){return t});h("pagespeed.CriticalImages.Run",function(b,d,a,c,e,f){var k=new p(b,d,a,e,f);n=k;c&&m(function(){window.setTimeout(function(){r(k)},0)})});})();pagespeed.CriticalImages.Run('/mod_pagespeed_beacon','','7U6awCPvzW',true,false,'7iqNdxX_-UI');
						//]]></script>
						<img src="<?=$tema?>img/logo.png" alt="" pagespeed_url_hash=3027126205 onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
					</div>
					<div class=texto>
						<?=$template['titulo']?>
					</div>
					<div class=item-banner>
						<?=$template['subtitulo']?>
					</div>
					<div class=botao-cta>
						<a href="<?=$template['link']?>">Solicitar orçamento</a>
					</div>
					<div class=arrow-down-banner>
						<img src="<?=$tema?>img/arrows-down-banner.png" alt="" pagespeed_url_hash=3581441766 onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-1 col-xs-12">
				<div class=imagem-banner>
					<img src="<?=$tema?>img/img-banner.png" alt="" pagespeed_url_hash=3468934992 onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
				<div class=formulario id=formulario style="z-index: 2000 !important">
					<div class=titulo>
						<h1>solicite um <br><span>orçamento</span></h1>
						<img src="<?=$tema?>img/arrow-down-form.png" alt="" pagespeed_url_hash=1181094531 onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
					</div>
					<form class=form id="form-email" method=post>
						<div class=campos>
							<input type="hidden" id="me-destinatario" value="<?=$cliente['email']?>">
							<div class="">
								<label for=nome class=form-label>Nome:</label>
								<input type=text class=form-control id="e-nome" name=nome required>
							</div>
							<div class=mt-3>
								<label for=email class=form-label>Email:</label>
								<input type=email class=form-control id="e-email" name=email required>
							</div>
							<div class=mt-3>
								<label for=telefone class=form-label>Telefone:</label>
								<input type=text class=form-control id="e-telefone" name=telefone required maxlength=15>
							</div>
							<div class="mt-3">
								<label for="me-assunto">Assunto</label>
								<input type="text" class="form-control" id="me-assunto" required value="Cotação de projeto">
							</div>
							<div class=mt-3>
								<label for="me-assunto">Mensagem</label>
								<textarea class="form-control" id="me-mensagem" required>Oi, gostaria de solicitar um orçamento!</textarea>
							</div>
							<input type="submit" id="e-submit" value="enviar" class="hide" style="display: none">
						</div>
						<div class=bt-section>
							<button type="button" class="btn-form btn" id="solicitar-orcamento">solicitar
							orçamento</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<section class=energia>
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class=titulo>
				<h1>produza sua própria <br><span>energia!</span></h1>
			</div>
			<div class=item>
				<div class=row>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class=imagem>
							<img src="./gerenciamento/uploads/<?=$cliente['fotosobre']?>" alt="" pagespeed_url_hash=517757111 onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class=texto>
							<?=$cliente['textosobre']?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class=barra-cta>
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class=row>
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
					<h1>Quer economizar muito?</h1>
					<h2>Preencha o formulário e receba nosso contato!</h2>
				</div>
			</div>
		</div>
	</section>
	<section class=passos>
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class=titulo>
				<h1>Conheça os 5 passos para <br>ter a sua <span>energia solar!</span></h1>
			</div>
			<div class=itens>
				<?php
				$servico = $servicos->fetchAll();
				$s = count($servico);
				
				for ($i=0; $i < $s; $i++) { 
					if($i % 2 == 0){
						$primeiro = 'order-first order-sm-1';
						$segundo = 'order-last order-sm-2';
						$numero = 'direita';
					}else{
						$primeiro = 'order-first order-sm-2';
						$segundo = 'order-last order-sm-1';
						$numero = 'esquerda';
					}
					?>
					<div class=item>
						<div class=row>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 d-flex align-items-center <?=$primeiro?>">
								<div class="imagem">
									<img src="./gerenciamento/uploads/<?=$servico[$i]['imagem']?>" alt="" pagespeed_url_hash=3727170950 onload="pagespeed.CriticalImages.checkImageForCriticality(this);">

									<div class="numero <?=$numero?>">
										<h1><?=$i+1?></h1>
									</div>
								</div>
							</div>

							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 d-flex align-items-center <?=$segundo?>">
								<div class=texto>
									<h1><?=$servico[$i]['nome']?></h1>
									<p>
										<?=$servico[$i]['descricao']?>
									</p>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</section>
	<section class=solucao>
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class=titulo>
				<h1>economize de verdade!</h1>
			</div>
			<div class=sub-titulo>
				<h2>quer continuar <br> dependendo</h2>
				<h3>das bandeiras tarifárias <br> da sua conta de energia ou produzir <br> sua própria energia?</h3>
			</div>
			<div class=imagem-solucao>
				<img src="<?=$tema?>img/solucao-painel.png" alt="" pagespeed_url_hash=229979744 onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
			</div>
		</div>
	</section>
	<section class=infinity-bar>
		<div class=tickerwrapper>
			<ul class=list>
				<li class=listitem>
					<span>#energiasolar</span>
				</li>
				<li class=listitem>
					<span>#energybrasil</span>
				</li>
				<li class=listitem>
					<span>#economia</span>
				</li>
				<li class=listitem>
					<span>#energybrasil</span>
				</li>
				<li class=listitem>
					<span>#energiasolar</span>
				</li>
			</ul>
		</div>
	</section>
	<section class=perguntas>
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class=titulo>
				<h1><span>perguntas</span> frequentes</h1>
				<h2>Fique por dentro de como funciona o sistema <br>
				de energia solar.</h2>
			</div>
			<div class=item>
				<div class=accordion>
					<?php
					while($depoimento = $depoimentos->fetch(PDO::FETCH_ASSOC)){
						?>
						<div class=accordion-item>
							<button class=accordion-item__button><?=$depoimento['nome']?></button>
							<div class=accordion-item__content>
								<p>
									<?=$depoimento['depoimento']?>
								</p>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<section class=vantagens>
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<div class=titulo>
				<h1>Você sabe o quanto <br>
					pode <span>economizar?</span></h1>
				</div>
				<div class=itens>
					<h3>Conheça algumas das vantagens</h3>
					<!-- ITEM 01 -->
					<div class=row>
						<?php
						while($produto = $produtos->fetch(PDO::FETCH_ASSOC)){
							?>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mt-3">
								<div class=item01>
									<h1><?=$produto['nome']?></h1>
									<img src="./gerenciamento/uploads/<?=$produto['imagem']?>" alt="" pagespeed_url_hash=3360721598 onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
									<p><?=$produto['descricao']?></p>
								</div>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</section>
		<section class=parceiros>
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class=titulo>
					<h1>parceiros <span>energy brasil</span></h1>
				</div>
				<div class=galeria-parceiros>
					<?php
					while($parceiro = $portfolio->fetch(PDO::FETCH_ASSOC)){
						?>
						<div class=item>
							<img src="./gerenciamento/uploads/<?=$parceiro['imagem']?>" alt="" pagespeed_url_hash=78754418 onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</section>
		<section class=barra-fixa>
			<div class=row>
				<div class=col-xs-12>
					<span>Ficou interessado? Saiba mais agora mesmo!</span>
				</div>
				<div class=col-xs-12>
					<button class="btn btn-block btn-barra" data-bs-toggle="modal" data-bs-target="#exampleModal"><strong><i class="fab fa-whatsapp"></i> Chamar no WhatsApp</strong></button>
				</div>
			</div>
		</section>
		<section class="secao-whatsapp">
			<!-- Button trigger modal -->
			<div class="d-none d-lg-block fixed-bottom">
				<button type="button" class="btn btn-success botao-whatsapp" data-bs-toggle="modal" data-bs-target="#exampleModal">
					<i class="fab fa-whatsapp"></i> Chamar no WhatsApp 
				</button>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header ">
							<h5 class="modal-title text-center" id="exampleModalLabel">WhatsApp</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body" id="corpo-modal">
							<p class="text-center"><small>Informe seu nome e telefone pra enviar uma mensagem!</small></p>
							<form id="form-whatsapp">
								<input type="hidden" id="w-datacadastro" value="<?=date('Y-m-d H:i:s')?>">
								<input type="hidden" id="m-destinatario" value="<?=$cliente['whatsapp']?>">
								<div class="row">
									<div class="form-group col-6 col-xs-6">
										<label for="w-nome"><small>Seu nome</small></label>
										<input type="text" class="form-control" name="nome" id="w-nome" placeholder="Fulano da Silva" required>
									</div>
									<div class="form-group col-6 col-xs-6">
										<label for="w-telefone"><small>Seu telefone</small></label>
										<input type="text" class="form-control" name="telefone" id="w-telefone" placeholder="55 17 99999 9999" required>
									</div>
								</div>
								<div class="row mt-3">
									<div class="col-12">
										<label for="w-mensagem"><small>Escreva sua mensagem</small></label>
										<textarea name="w-mensagem" id="w-mensagem" class="form-control" placeholder="Escreva aqui sua mensagem..." required></textarea>
									</div>
								</div>
								<input type="submit" id="w-submit" class="hide" name="Enviar">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancelar</button>
							<button id="enviar-whatsapp" type="button" class="btn btn-success bg-primary"><i class="fab fa-whatsapp"></i> Enviar Mensagem</button>
						</div>
					</div>
				</div>
			</div>
		</section>
		<footer class=footer>
			Energy Brasil Solar © 2021 - Todos os direitos reservados 
		</footer>
		<!-- LIBS VUE AND JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
		<script src="<?=$tema?>frameworks/jquery/jquery-3.5.1.min.js"></script>
		<!-- <script src="<?=$tema?>frameworks/jquery/jquery.sticky.js"></script> -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin=anonymous></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
		<!-- <script src="<?=$tema?>frameworks/bootstrap5/js/bootstrap.min.js"></script> -->
		<script src="<?=$tema?>frameworks/slick/slick.min.js"></script>
		<script src="<?=$tema?>frameworks/fontawesome/js/all.min.js"></script>
		<script src="<?=$tema?>frameworks/lightbox/js/lightbox.min.js"></script>
		<script src="<?=$tema?>js/estados-cidades.js"></script>
		<script src="<?=$tema?>js/app.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {

				$("#enviar-whatsapp").click(function(){
					$("#w-submit").click();
				})

				$("#solicitar-orcamento").click(function(){
					$("#e-submit").click();
				})

				$("#form-whatsapp").submit(function(event) {
					var ajaxRequest;
					event.preventDefault();
					$("#resultado-whats").html('');
					var email = '';
					var nome = $("#w-nome").val();
					var telefone = $("#w-telefone").val();
					// var datacadastro = $("#w-datacadastro").val();
					var today = new Date();
					var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
					var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
					var dateTime = date+' '+time
					var datacadastro = dateTime;
					var origem = 'site';
					var newsletter = '0';
					var cadastro_enviar = {
						'nome' : nome,
						'email' : email,
						'telefone' : telefone,
						'datacadastro' : datacadastro,
						'origem' : origem,
						'newsletter' : newsletter
					}

					var mensagem = $("#w-mensagem").val();
					var destinatario = $("#m-destinatario").val();
					var contato = ("tem que pegar o id do cadastro");
					var data = datacadastro;
					var remetente = telefone;
					var mensagem_enviar = {
						'tipo' : 'whatsapp',
						'destinatario' : destinatario,
						'remetente' : remetente,
						'canal' : 'site',
						'contato' : contato,
						'assunto' : 'Contato via WhatsApp',
						'mensagem' : mensagem,
						'data' : data
					};

					var dados = [cadastro_enviar, mensagem_enviar];
					ajaxRequest= $.ajax({
						url: "./gerenciamento/cadastrar-usuario.php",
						type: "post",
						data: {
							cadastro_enviar,
							mensagem_enviar
						}
					});
					ajaxRequest.done(function (response, textStatus, jqXHR){
						if(response!="Falha"){
							$("#form-whatsapp").html(response);
							var mensagem = '  <div id="content" class="text-center"><div class="notify successbox"><i class="far fa-3x text-success fa-check-circle"></i><h3>Mensagem enviada com sucesso!</h3><p>Responderemos pelo WhatsApp o mais rápido possível.</p></div></div>';
							$("#corpo-modal").html(mensagem);
						}else{
							$("#form-whatsapp").html(response);
							var mensagem = '  <div id="content" class="text-center"><div class="notify successbox"><i class="far fa-3x text-danger fa-times-circle"></i><h3>Mensagem não enviada!</h3><p>Atualize a página e tente novamente mais tarde.</p></div></div>';
							$("#corpo-modal").html(mensagem);

						}
					});
				})

				$("#form-email").submit(function(event) {
					var ajaxRequest;
					event.preventDefault();
					$("#resultado-email").html('');

					var today = new Date();
					var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
					var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
					var dateTime = date+' '+time
					var datacadastro = dateTime;
					var origem = 'site';
					var newsletter = '0';
					var nome = $("#e-nome").val();
					var email = $("#e-email").val();
					var telefone = $("#e-telefone").val();
					var cadastro_enviar = {
						'nome' : nome,
						'email' : email,
						'telefone' : telefone,
						'datacadastro' : datacadastro,
						'origem' : origem,
						'newsletter' : newsletter
					};

					var mensagem = $("#me-mensagem").val();
					var destinatario = $("#me-destinatario").val();
					var contato = ("tem que pegar o id do cadastro");
					var assunto = $("#me-assunto").val();
					var data = datacadastro;
					var remetente = email;
					var mensagem_enviar = {
						'tipo' : 'email',
						'destinatario' : destinatario,
						'remetente' : remetente,
						'canal' : 'site',
						'contato' : contato,
						'assunto' : 'Contato via WhatsApp',
						'mensagem' : mensagem,
						'data' : data
					};

					var dados = [cadastro_enviar, mensagem_enviar];
					console.log(dados);
					ajaxRequest= $.ajax({
						url: "./gerenciamento/cadastrar-usuario.php",
						type: "post",
						data: {
							cadastro_enviar,
							mensagem_enviar
						}
					});
					ajaxRequest.done(function (response, textStatus, jqXHR){
						if(response!="Falha"){
							$("#form-email").html(response);
							var mensagem = '  <div id="content" class="text-center"><div class="notify successbox"><i class="far fa-3x text-success fa-check-circle"></i><h3>Mensagem enviada com sucesso!</h3><p>Responderemos pelo WhatsApp o mais rápido possível.</p></div></div>';
							$("#corpo-modal").html(response);
						}else{
							$("#form-email").html(response);
							var mensagem = '  <div id="content" class="text-center"><div class="notify successbox"><i class="far fa-3x text-danger fa-times-circle"></i><h3>Mensagem não enviada!</h3><p>Atualize a página e tente novamente mais tarde.</p></div></div>';
							$("#corpo-modal").html(response);

						}
					});


				})
			})
		</script>
	</body>
	</html>