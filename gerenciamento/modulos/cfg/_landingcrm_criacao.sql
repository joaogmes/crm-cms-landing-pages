create table cliente(
	id serial primary key,
	nome varchar(100),
	razaosocial varchar(100),
	cnpj varchar(30),
	responsavel varchar(50),
	cpfresponsavel varchar(30),
	textosobre text,
	fotosobre varchar(100),
	endereco varchar(150),
	whatsapp varchar(30),
	telefone varchar(30),
	email varchar(100),
	facebook varchar(100),
	instagram varchar(100),
	twitter varchar(100),
	youtube varchar(100),
	googleplus varchar(100)
	);

create table contato(
	id serial primary key,
	nome varchar(100),
	email varchar(100),
	telefone varchar(30),
	datacadastro datetime,
	origem varchar(100),
	newsletter varchar(10)
);

create table mensagem(
	id serial primary key,
	tipo varchar(10),
	destinatario varchar(100),
	remetente varchar(100),
	canal varchar(100),
	contato varchar(10),
	assunto varchar(150),
	mensagem text,
	data datetime
);

create table depoimento(
	id serial primary key,
	nome varchar(100),
	foto varchar(100),
	depoimento text
);

create table template(
	id serial primary key,
	logotipo varchar(100),
	bghero varchar(100),
	titulo varchar(200),
	subtitulo varchar(200),
	link varchar(200),
	tema varchar(50),
	corprimaria varchar(50),
	corsecundaria varchar(50),
	corterciaria varchar(50)
);

create table categoria(
	id serial primary key,
	nome varchar(100)
);

create table portifolio(
	id serial primary key,
	titulo varchar(100),
	imagem varchar(100),
	categoria varchar(100)
);

create table servico(
	id serial primary key,
	nome varchar(100),
	descricao text,
	imagem varchar(100)
);

create table post(
	id serial primary key,
	titulo varchar(100),
	resumo text,
	texto text,
	imagem varchar(100),
	categoria varchar(100),
	data datetime,
	status varchar(50)
);

create table produto(
	id serial primary key,
	nome varchar(100),
	resumo text,
	descricao text,
	imagem varchar(100),
	preco double
);

create table seo(
	id serial primary key,
	titulo varchar(100),
	icone varchar(100),
	autor varchar(100),
	descricao text,
	keywords text,
	imagem varchar(100),
	scripts text
);

create table usuario(
	id serial primary key,
	nome varchar(100),
	login varchar(50),
	senha varchar(50),
	email varchar(150),
	telefone varchar(30),
	nivel varchar(30),
	status varchar(10)
);

create table log(
	id serial primary key,
	usuario varchar(10),
	datahora datetime,
	operacao varchar(30),
	tabela varchar(30),
	antigo text,
	novo text
);

create table configuracoes(
	id serial primary key,
	modooperacao varchar(100),
	datainstalacao datetime,
	tokenativacao varchar(100),
	statusativacao varchar(10),
	permissoesadm text,
	permissoeseditor text
);