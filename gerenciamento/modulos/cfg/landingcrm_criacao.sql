-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Dez-2021 às 06:32
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `landingenergy`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `razaosocial` varchar(100) DEFAULT NULL,
  `cnpj` varchar(30) DEFAULT NULL,
  `responsavel` varchar(50) DEFAULT NULL,
  `cpfresponsavel` varchar(30) DEFAULT NULL,
  `textosobre` text DEFAULT NULL,
  `fotosobre` varchar(100) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `whatsapp` varchar(30) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `googleplus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `razaosocial`, `cnpj`, `responsavel`, `cpfresponsavel`, `textosobre`, `fotosobre`, `endereco`, `whatsapp`, `telefone`, `email`, `facebook`, `instagram`, `twitter`, `youtube`, `googleplus`) VALUES
(1, 'Energy Brasil Solar', 'Energy Brasil', '', 'Marketing', '00', '<h1>troque sua<br>conta de energia</h1>\r\n							<h2>pela parcela do <br>financiamento do <br>seu kit de energia solar <br>e produza sua própria\r\n								<br>energia!\r\n							</h2>\r\n							<h3>invista em uma energia <br>limpa, renovável e <br>sustentável!</h3>', '1638847646568021452energia-painel.png', '', '5517988251166', '', 'energy@jotagomes.com.br', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracoes`
--

CREATE TABLE `configuracoes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `modooperacao` varchar(100) DEFAULT NULL,
  `datainstalacao` datetime DEFAULT NULL,
  `tokenativacao` varchar(100) DEFAULT NULL,
  `statusativacao` varchar(10) DEFAULT NULL,
  `permissoesadm` text DEFAULT NULL,
  `permissoeseditor` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `modooperacao`, `datainstalacao`, `tokenativacao`, `statusativacao`, `permissoesadm`, `permissoeseditor`) VALUES
(1, 'manutencao', '2021-12-07 00:22:58', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `datacadastro` datetime DEFAULT NULL,
  `origem` varchar(100) DEFAULT NULL,
  `newsletter` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `depoimento`
--

CREATE TABLE `depoimento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `depoimento` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `depoimento`
--

INSERT INTO `depoimento` (`id`, `nome`, `foto`, `depoimento`) VALUES
(1, 'Qual a garantia do sistema?', '1638870174895131282homologacao.png', 'Os painéis solares instalados possuem 25 anos de garantida de produção de energia, painéis com 10 – 12 anos de garantia contra defeito de fabricação. Todos nossos equipamentos possuem certificação Inmetro, exigido pelas concessionárias para que possa ser realizado sua homologação.'),
(2, 'Como funciona?', '16388702181466451151homologacao.png', 'Ao instalar nosso sistema, você se torna um pequeno produtor de energia elétrica. O sistema solar durante o dia transforma a luz do Sol em eletricidade e pode ser utilizada para alimentar qualquer aparelho no local instalado. O excedente dessa energia (energia não utilizada durante a geração) é registrado no relógio de saída e lançado na rede da concessionária de energia, gerando créditos em sua conta de energia elétrica. Durante a noite, como não há a disponibilidade do Sol, a casa volta a usar energia da rua e o relógio marca a entrada. Na conta de energia elétrica você vai se surpreender com o resultado, é descontado de seu consumo toda a energia elétrica gerada pelo sistema (Energia armazenada). A Economia de até 95% em sua conta de energia elétrica, garante o retorno de seu investimento.'),
(3, 'Qual a forma de pagamento?', '16388705341510683438homologacao.png', '\r\n\r\nO Faturamento do equipamento é realizado diretamente dos fabricantes homologados, o pagamento poderá ser realizado através de financiamento, depósito ou transferência bancária. No caso da implementação do sistema, nossa empresa é a responsável por emitir a nota fiscal.'),
(4, 'Quanto custa?', '1638870552302507155homologacao.png', '\r\n\r\nTodo projeto é realizado de forma individual, para calcularmos os custos da implementação é necessário realizar o estudo através de seu consumo informado em sua conta de energia.\r\n'),
(5, 'Nos dias nublados, o sistema funciona?', '1638870746262094392homologacao.png', '\r\n\r\nTranquilo, o sistema fotovoltaico não precisa de um dia de céu limpo e com muito sol para operar, em dias nublados ele produz energia, porém em intensidade menor.\r\n'),
(6, 'Como é instalado?', '16388707641190530837homologacao.png', '\r\n\r\nNão é necessário grandes obras ou mobilização do local para que possamos realizar a instalação do sistema. Utilizamos a instalação elétrica já existente e caso necessário informamos a necessidade de substituição do padrão de entrada no local.\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `datahora` datetime DEFAULT NULL,
  `operacao` varchar(30) DEFAULT NULL,
  `tabela` varchar(30) DEFAULT NULL,
  `antigo` text DEFAULT NULL,
  `novo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `destinatario` varchar(100) DEFAULT NULL,
  `remetente` varchar(100) DEFAULT NULL,
  `canal` varchar(100) DEFAULT NULL,
  `contato` varchar(10) DEFAULT NULL,
  `assunto` varchar(150) DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `portifolio`
--

CREATE TABLE `portifolio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `portifolio`
--

INSERT INTO `portifolio` (`id`, `titulo`, `imagem`, `categoria`) VALUES
(1, 'abf', '1638871133abf.jpg', ''),
(2, 'absolar', '1638871133absolar.jpg', ''),
(3, 'bv', '1638871133bv.jpg', ''),
(4, 'chubb', '1638871134chubb.jpg', ''),
(5, 'elgin', '1638871134elgin.jpg', ''),
(6, 'liberty-seguros', '1638871134liberty-seguros.jpg', ''),
(7, 'porto-seguro', '1638871134porto-seguro.jpg', ''),
(8, 'renovigi', '1638871134renovigi.jpg', ''),
(9, 'santander', '1638871134santander.jpg', ''),
(10, 'solfacil', '1638871134solfacil.jpg', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `resumo` text DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `resumo` text DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `preco` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `resumo`, `descricao`, `imagem`, `preco`) VALUES
(1, 'Economia', '&nbsp;', 'Com Kit de Energia <br>Solar Fotovoltaico, <br>você pode <span>economizar <br> até\r\n								95%</span> do valor da sua <br>conta de energia.', '1638872151998487231economia.png', 0),
(2, 'Confiabilidade', '&nbsp;', 'Os sistemas precisam <br>de <span>pouca manutenção</span><br>e possuem longa\r\n									<br>durabilidade.', '1638872188496253616confiabilidade.png', 0),
(3, 'Valorização<br>Imobiliária', '&nbsp;', 'A valorização em<br> média do imóvel<br> é de <span>10%.</span>', '16388722392145769082valorizacao-imobiliaria.png', 0),
(4, '&nbsp;', '&nbsp;', '100% dos produtos<br>são testados em todas<br>etapas de produção.', '16388723102008646809raio-vantagens.png', 0),
(5, '&nbsp;', '&nbsp;', 'Selo da classificação <br>energética A do <br>INMETRO.', '16388723651516845321raio-vantagens.png', 0),
(6, '&nbsp;', '&nbsp;', 'Certificados ISO, <br>TUV, IEC, CE, CEC <br>E CQC.', '1638872401206145870raio-vantagens.png', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `seo`
--

CREATE TABLE `seo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `icone` varchar(100) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `scripts` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `seo`
--

INSERT INTO `seo` (`id`, `titulo`, `icone`, `autor`, `descricao`, `keywords`, `imagem`, `scripts`) VALUES
(1, 'Energy Brasil Solar - CIDADE', '16388489531590036627favicon.png', 'Energy Brasil', 'Troque sua conta de energia pela parcela do financiamento do seu kit de energia solar e produza sua própria energia! Invista em uma energia limpa, renovável e sustentável!', 'energia, solar, fotovoltaica, energia solar, energia fotovoltaica, energy brasil', '16388489531322287694240736281_862561934645332_7272741971323477116_n.jpg', ' ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `nome`, `descricao`, `imagem`) VALUES
(1, 'Orçamento', ' Nossos orçamentos são gratuitos, sem qualquer compromisso e realizado a partir de duas informações: consumo médio anual em kWh e a cidade onde o equipamento será instalado. ', '1638866974933771810orçamento.png'),
(2, 'Visita Técnica', ' Após o cliente demonstrar interesse no sistema, realizamos a visita técnica para a verificação da viabilidade do espaço onde equipamento solar será instalado. ', '16388669991846464432visita-tecnica.png'),
(3, 'Instalação', ' Contamos com nossa engenharia e equipe de instalação altamente capacitada para atender residências, comércios e indústrias. ', '1638867022231856096instalacao.png'),
(4, 'homologação', ' Somos responsáveis em apresentar e acompanhar o seu projeto em todo o processo de homologação junto a concessionária de energia elétrica. ', '1638867051594537123homologacao.png'),
(5, 'Pós venda', ' Além da garantia de 25 anos de eficiência de seu sistema, acompanhamos juntos a geração de seu sistema de forma online. ', '1638867069202489803pos-venda.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `template`
--

CREATE TABLE `template` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logotipo` varchar(100) DEFAULT NULL,
  `bghero` varchar(100) DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `subtitulo` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `tema` varchar(50) DEFAULT NULL,
  `corprimaria` varchar(50) DEFAULT NULL,
  `corsecundaria` varchar(50) DEFAULT NULL,
  `corterciaria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `template`
--

INSERT INTO `template` (`id`, `logotipo`, `bghero`, `titulo`, `subtitulo`, `link`, `tema`, `corprimaria`, `corsecundaria`, `corterciaria`) VALUES
(1, '1638847873499216126logo.png', '1638847873681113790img-banner.png', '<h1>você ainda <br> <span>paga</span> conta <br> de <span>energia?</span></h1>', '<p>Produza 100% da <br>sua energia elétrica!</p>', '#formulario', 'energy', '#90ad3c', '#fedf00', '#1a1a1a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `nivel` varchar(30) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`, `email`, `telefone`, `nivel`, `status`) VALUES
(1, 'Padrão', 'energy', '#LpEnergy2021', 'energy@jotagomes.com.br', '17988251166', '1', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `depoimento`
--
ALTER TABLE `depoimento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `portifolio`
--
ALTER TABLE `portifolio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `configuracoes`
--
ALTER TABLE `configuracoes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `depoimento`
--
ALTER TABLE `depoimento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `portifolio`
--
ALTER TABLE `portifolio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `seo`
--
ALTER TABLE `seo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `template`
--
ALTER TABLE `template`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
