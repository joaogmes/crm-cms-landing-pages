(function ($) {
	$(document).ready(function(){

		//FUNÇÕES DE NAVEGAÇÃO
		var log = 'Iniciando log...\n\n';

		$("#criar-usuario").click(function(){
			$("#conteudo").load('../paginas/cadastrar.php');
		})
		$("#logar").click(function(){
			$("#conteudo").load('../paginas/entrar.php');
		})
		$("#sair").click(function(){
			$("#conteudo").load('../paginas/deslogar.php');
		})
		$("#lancamentos").click(function(){
			$("#conteudo").load('../paginas/lancamentos/painel.php', function(){irpara_es();});
			log = "Abrir o painel de lançamentos\n\n";
			console.log(log);
			$("#toggler").click();
			log = "Fechando o menu\n\n";
		})
		$(document).ready(function() {
			$(window).keydown(function(event){
				// if(event.keyCode == 13) {
				// 	event.preventDefault();
				// 	return false;
				// }
			});
		});
	})
})(jQuery);

function irpara_es(){
	//DIRECIONA PARA TIPO DO LANÇAMENTO
	$("#irpara-es").click(function(){
		//ABRE O LANÇAMENTO DE ENTRADAS OU SAÍDAS
		$("#conteudo-painel").load('../paginas/lancamentos/entrada-saida.php', function(){adicionar_es();});
		console.log("Abrindo entrada-saida.php\n\n");
	})
	$("#cadastrar-credor").click(function(){
		//ABRE O CADASTRO DE PESSOAS
		alert("cadastrar");
	})
}

function adicionar_es(){
		//INFORMA AO FORM O TIPO DE PAGAMENTO
		$("#lancamento-entrada").click(function(){
			var pagamento_tipo = 'entrada';
			$("#tipo-pagamento").val(pagamento_tipo);
			console.log('Tipo do pagamento:'+pagamento_tipo);
			$("#conteudo-painel").load('../paginas/lancamentos/categoria.php', function(){adicionar_categoria();});
			console.log("Abrindo categoria.php\n\n");
		})
		$("#lancamento-saida").click(function(){
			var pagamento_tipo = 'saida';
			$("#tipo-pagamento").val(pagamento_tipo);
			console.log('Tipo do pagamento:'+pagamento_tipo);
			$("#conteudo-painel").load('../paginas/lancamentos/categoria.php', function(){adicionar_categoria();});
			console.log("Abrindo categoria.php\n\n");
		})
	}

	function adicionar_categoria(){
	//INFORMA A CATEGORIA DO LANÇAMENTO
	$("#avancar-categoria").click(function(){
		var categoria = $("#categoria-temporaria").val();
		if(categoria != '' && categoria !=null){
			$("#categoria-pagamento").val(categoria);
			console.log('Categoria do pagamento:'+categoria);
			$("#conteudo-painel").load('../paginas/lancamentos/dados.php', function(){adicionar_dados();});
			console.log("Abrindo dados.php\n\n");
		}else{
			$("#categoria-temporaria").focus();
			$(".card-footer").html("<strong><p class='text-danger'>Informe a categoria do lançamento</p></strong>'");
		}
	})
}

function sugerir_categorias(){
	var tipo = $("#tipo-pagamento").val();
	console.log("Tipo da sugestão: "+tipo);
	if(tipo == 'entrada'){
		$("#categoria-temporaria").attr("list", "categorias-entrada");
	}else{
		$("#categoria-temporaria").attr('list', 'categorias-saida');
	}
}

function adicionar_dados(){
	$("#avancar-dados").click(function(){
		var data = $("#data-emissao-temporaria").val();
		var descricao = $("#descricao-temporaria").val();
		var valor = $("#valor-temporario").val();
		valor = valor.replace(',', '.');
		valor = parseFloat(valor);
		var erro = '';
		if(data != '' && data !=null){
			$("#data-emissao").val(data);
			console.log("Emissão: "+data);
		}else{
			erro += '<strong><p>Informe a data de emissão</p></strong>';
		}
		if(descricao !='' && descricao !=null){
			$("#descricao").val(descricao);
			console.log("Descrição: "+descricao);
		}else{
			erro += '<strong><p>Informe a descrição do lançamento</p></strong>';
		}
		if(valor !="" && valor!=null && valor > 0){
			$("#valor").val(valor);
			console.log("Valor: "+valor);
		}else{
			erro += '<strong><p>Informe corretamente o valor</p></strong>';
		}
		if(erro !="" && erro !=null){
			$(".card-footer").html(erro);
		}else{
			$(".card-footer").html('');
			console.log("Dados validados, enviando formulário...");
		}
	})

}