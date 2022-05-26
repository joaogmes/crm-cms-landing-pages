-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: energy
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `razaosocial` varchar(100) DEFAULT NULL,
  `cnpj` varchar(30) DEFAULT NULL,
  `responsavel` varchar(50) DEFAULT NULL,
  `cpfresponsavel` varchar(30) DEFAULT NULL,
  `textosobre` text,
  `fotosobre` varchar(100) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `whatsapp` varchar(30) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `googleplus` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Energy Brasil','ENERGY BRASIL FRANCHISING LTDA','33.748.395/0001-64','Emmanuel dos Santos Pelozo','33559935851','<div class=\"elementor-element elementor-element-c5d9039 elementor-widget elementor-widget-heading\" data-id=\"c5d9039\" data-element_type=\"widget\" data-widget_type=\"heading.default\" style=\"max-width: none; position: relative; width: 648.734px; margin-bottom: 20px; color: rgb(0, 0, 0); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 20px;\"><div class=\"elementor-widget-container\" style=\"max-width: none; transition: background 0.3s ease 0s, border 0.3s ease 0s, border-radius 0.3s ease 0s, box-shadow 0.3s ease 0s, -webkit-border-radius 0.3s ease 0s, -webkit-box-shadow 0.3s ease 0s;\"><h2 class=\"elementor-heading-title elementor-size-default\" style=\"overflow-wrap: break-word; padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; -webkit-font-smoothing: antialiased; clear: both; font-family: Poppins, sans-serif; font-weight: 800; letter-spacing: var(--heading--letter-spacing-h2); line-height: 1.1em; color: var( --e-global-color-secondary );\">Energia Solar é&nbsp;<span style=\"color: rgb(255, 206, 0);\">fácil</span>, difícil é passar calor com medo da conta de energia.</h2></div></div><div class=\"elementor-element elementor-element-a61bdb5 elementor-widget elementor-widget-text-editor\" data-id=\"a61bdb5\" data-element_type=\"widget\" data-widget_type=\"text-editor.default\" style=\"max-width: none; position: relative; color: var( --e-global-color-secondary ); font-family: Poppins, sans-serif; width: 648.734px; margin-bottom: 20px; font-size: 20px;\"><div class=\"elementor-widget-container\" style=\"max-width: none; transition: background 0.3s ease 0s, border 0.3s ease 0s, border-radius 0.3s ease 0s, box-shadow 0.3s ease 0s, -webkit-border-radius 0.3s ease 0s, -webkit-box-shadow 0.3s ease 0s; margin: 1rem 0rem;\">Tranquilidade é aproveitar todo o conforto da sua casa sem se preocupar com a conta de energia.</div></div>','1649873984776496613276146659_991814958386695_4067398389984577161_n.png','','17997622554','','marketing@energybrasil.com.br','','','','','');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `config` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `cadastro` datetime DEFAULT NULL,
  `lp` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracoes`
--

DROP TABLE IF EXISTS `configuracoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `configuracoes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `modooperacao` varchar(100) DEFAULT NULL,
  `datainstalacao` datetime DEFAULT NULL,
  `tokenativacao` varchar(100) DEFAULT NULL,
  `statusativacao` varchar(10) DEFAULT NULL,
  `permissoesadm` text,
  `permissoeseditor` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracoes`
--

LOCK TABLES `configuracoes` WRITE;
/*!40000 ALTER TABLE `configuracoes` DISABLE KEYS */;
INSERT INTO `configuracoes` VALUES (1,'manutencao','2022-04-13 12:36:09',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `configuracoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contato`
--

DROP TABLE IF EXISTS `contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contato` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `datacadastro` datetime DEFAULT NULL,
  `origem` varchar(100) DEFAULT NULL,
  `newsletter` varchar(10) DEFAULT NULL,
  `landingpage` varchar(100) DEFAULT NULL,
  `cidade_uf` varchar(100) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `valor_conta` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato`
--

LOCK TABLES `contato` WRITE;
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `depoimento`
--

DROP TABLE IF EXISTS `depoimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `depoimento` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `depoimento` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depoimento`
--

LOCK TABLES `depoimento` WRITE;
/*!40000 ALTER TABLE `depoimento` DISABLE KEYS */;
INSERT INTO `depoimento` VALUES (1,'<b>Eduardo Lopes</b><br>Florianópolis/SC','16498823161682704871happy-g7f6a02485_640.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.'),(2,'<b>Carlos Batista</b><br>Belo Horizonte/MG','164988260451574145beanie-2562646_640.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in pharetra quam, sed malesuada nisl. Nullam ac odio pharetra, egestas orci quis, consectetur diam. In molestie malesuada pulvinar. '),(3,'<b>César Gouvea</b><br>Salvador/BA','16498828151877287812man-1845259_640.jpg','Maecenas viverra sapien non diam viverra, at egestas odio tristique. Fusce vel nulla et enim rutrum fermentum ut blandit tortor. Sed sapien mauris, eleifend eget aliquam et, vulputate vitae enim. Pellentesque egestas porttitor sem eget eleifend.');
/*!40000 ALTER TABLE `depoimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `landingpage`
--

DROP TABLE IF EXISTS `landingpage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `landingpage` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dominio` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pasta` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cadastro` datetime DEFAULT NULL,
  `status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `landingpage`
--

LOCK TABLES `landingpage` WRITE;
/*!40000 ALTER TABLE `landingpage` DISABLE KEYS */;
/*!40000 ALTER TABLE `landingpage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(10) DEFAULT NULL,
  `datahora` datetime DEFAULT NULL,
  `operacao` varchar(30) DEFAULT NULL,
  `tabela` varchar(30) DEFAULT NULL,
  `antigo` text,
  `novo` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagem`
--

DROP TABLE IF EXISTS `mensagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mensagem` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) DEFAULT NULL,
  `destinatario` varchar(100) DEFAULT NULL,
  `remetente` varchar(100) DEFAULT NULL,
  `canal` varchar(100) DEFAULT NULL,
  `contato` varchar(10) DEFAULT NULL,
  `assunto` varchar(150) DEFAULT NULL,
  `mensagem` text,
  `data` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagem`
--

LOCK TABLES `mensagem` WRITE;
/*!40000 ALTER TABLE `mensagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portifolio`
--

DROP TABLE IF EXISTS `portifolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portifolio` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portifolio`
--

LOCK TABLES `portifolio` WRITE;
/*!40000 ALTER TABLE `portifolio` DISABLE KEYS */;
INSERT INTO `portifolio` VALUES (10,'PARCEIRO-SOLFACIL','16509154021167812095LOGOS-10.png','10'),(11,'PARCEIRO-PORTO-SEGURO','1650915402246348249LOGOS-09.png','9'),(12,'PARCEIRO-CASHME','16509154011817183162LOGOS-08.png','8'),(13,'FORNECEDOR-WEG','1650915401686049678LOGOS-07.png','7'),(14,'FORNECEDOR-RENOVIGI','16509154001035206612LOGOS-06.png','6'),(15,'FORNECEDOR-GE','1650915508732388193LOGOS-05.png','5'),(16,'FORNECEDOR-ELGIN','1650915399236548779LOGOS-04.png','4'),(17,'FORNECEDOR-BYD','1650915398307906619LOGOS-03.png','3'),(18,'ASSOCIACAO-ABSOLAR','1650915398702778975LOGOS-02.png','2'),(19,'ASSOCIACAO-ABGD','16509153261180620153LOGOS-01.png','1');
/*!40000 ALTER TABLE `portifolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `resumo` text,
  `texto` text,
  `imagem` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `data` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produto` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `resumo` text,
  `descricao` text,
  `imagem` varchar(100) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (1,'Quanto custa a energia solar?','Os sistemas de energia solar são dimensionados exclusivamente a cada projeto de acordo com o consumo elétrico que precisa ser atendido e outras características relacionadas ao imóvel e local de instalação.',NULL,'',NULL),(2,'Como o sistema de energia solar funciona a noite?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',NULL,'',NULL);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seo`
--

DROP TABLE IF EXISTS `seo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seo` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `icone` varchar(100) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `descricao` text,
  `keywords` text,
  `imagem` varchar(100) DEFAULT NULL,
  `scripts` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seo`
--

LOCK TABLES `seo` WRITE;
/*!40000 ALTER TABLE `seo` DISABLE KEYS */;
INSERT INTO `seo` VALUES (1,'Energy Brasil','1649874474855592778favicon.png','EnergyBrasil','Energia Solar é fácil, difícil é passar calor com medo da conta de energia.\r\nTranquilidade é aproveitar todo o conforto da sua casa sem se preocupar com a conta de energia.','energia solar, energia, solar, fotovoltáica, economia, investimento, retorno','1649874474359182755276146659_991814958386695_4067398389984577161_n.png',' //');
/*!40000 ALTER TABLE `seo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servico` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` text,
  `imagem` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servico`
--

LOCK TABLES `servico` WRITE;
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
INSERT INTO `servico` VALUES (1,'Captação','Os raios solares incidem sobre os módulos e, por meio do efeito fotovoltaico, geram energia elétrica em corrente contínua.\r\n\r\n','1650367826293548317img-captacao.png'),(2,'Conversão','A energia que está em corrente contínua é transformada pelos inversores em corrente alternada (compatícel com a rede elétrica)\r\n\r\n','16503678141420185646img-conversao.png'),(3,'Utilização','Todos equipamentos elétricos da residência ou escritório podem utilizar, sumultaneamente, a energia gerada.\r\n','16503678362101986312img-utilizacao.png'),(4,'Retorno','O excedente da energia gerada vai para a rede da concessionária, resultado em crédito a serem utilizado nas próximas faturas.\r\n\r\n','1650367846753288834img-retorno.png');
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `template` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `logotipo` varchar(100) DEFAULT NULL,
  `bghero` varchar(100) DEFAULT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `subtitulo` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `tema` varchar(50) DEFAULT NULL,
  `corprimaria` varchar(50) DEFAULT NULL,
  `corsecundaria` varchar(50) DEFAULT NULL,
  `corterciaria` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template`
--

LOCK TABLES `template` WRITE;
/*!40000 ALTER TABLE `template` DISABLE KEYS */;
INSERT INTO `template` VALUES (1,'1649874252256572122logo-energy-positivo-pn8lbt77er0ojukue7qx91j43r1andrh01z779r4re.png','16498742521633192220hero-bg.jpg','Energia Solar é <span style=\"color:#FFCE00\">fácil, </span><span style=\"color: rgb(255, 206, 0);\">fácil</span>, difícil é passar calor com medo da conta de energia.','Tranquilidade é aproveitar todo o conforto da sua casa sem se preocupar com a conta de energia.','#form-mobile','lpenergy','#00299c','#ffce00','#333333');
/*!40000 ALTER TABLE `template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `nivel` varchar(30) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `lp` int DEFAULT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `scripts` text,
  `pixel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'ascending','asc','asc',NULL,NULL,'1','ativo','admin',NULL,NULL,NULL,NULL,NULL),(4,'Energy Brasil Franchising','energy','@eng','marketing@energybrasilsolar.com.br',NULL,'1','ativo','admin',NULL,NULL,NULL,NULL,NULL),(5,'Robson Martins Inácio','robson.martins','@robson','robson.martins@energybrasilsolar.com.br',NULL,NULL,'ativo','afiliado',1,'007','5517996351808','//','123123123'),(6,'Aline','aline','aline','aline@aline.aline',NULL,NULL,'ativo','afiliado',3,'aline','17997733150','','aline');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-05 18:03:55
