-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Fev-2022 às 02:46
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_planossaude`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratos`
--

DROP TABLE IF EXISTS `contratos`;
CREATE TABLE IF NOT EXISTS `contratos` (
  `cod_contrato` int(5) NOT NULL AUTO_INCREMENT,
  `nomes` text NOT NULL,
  `idades` text NOT NULL,
  `faixas` text,
  `precos` text,
  `total` float DEFAULT NULL,
  `data_contrato` date DEFAULT NULL,
  PRIMARY KEY (`cod_contrato`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contratos`
--

INSERT INTO `contratos` (`cod_contrato`, `nomes`, `idades`, `faixas`, `precos`, `total`, `data_contrato`) VALUES
(11, 'Laura;Jorge;Maria;Paulo;Elizabete', '5;25;45;23;65', '1;2;3;2;3', '55;65;75;65;75', 335, '2022-02-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

DROP TABLE IF EXISTS `planos`;
CREATE TABLE IF NOT EXISTS `planos` (
  `cod_plano` int(11) NOT NULL,
  `registro` varchar(40) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `descricao` text,
  PRIMARY KEY (`cod_plano`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`cod_plano`, `registro`, `nome`, `descricao`) VALUES
(2, 'reg2', 'Bitix Customer Plano 2', 'Voluptatum ducimus corporis, ullam, libero ipsa odit impedit alias voluptatem consequuntur laboriosam, commodi quia eaque reiciendis quam eveniet molestias fuga quo similique nihil numquam omnis nam esse quas? Pariatur nihil quas ipsa? Unde eum assumenda facere doloremque magnam quo tenetur obcaecati est labore nam natus adipisci distinctio, sint ab quibusdam?\r\n'),
(3, 'reg3', 'Bitix Customer Plano 3', 'Sapiente velit quidem sequi est voluptatem labore voluptas, ipsam, deleniti ratione illo nobis odit voluptates quo ducimus fugit pariatur eveniet nostrum amet obcaecati inventore soluta sed! Voluptates dolor inventore nesciunt numquam unde neque assumenda fugit quasi minus molestias excepturi labore incidunt magnam, animi voluptas perferendis obcaecati adipisci quod in sed.\r\n'),
(1, 'reg1', 'Bitix Customer Plano 1', 'Nesciunt laboriosam doloribus consequatur. Sunt, veniam maxime incidunt sit facere dolore explicabo commodi temporibus! Nesciunt voluptas reprehenderit deleniti, nam corrupti asperiores laboriosam ratione maiores, consequuntur ea aspernatur! Totam quod in impedit ratione, doloribus officiis tempore accusamus inventore assumenda laudantium corporis aliquid quos eligendi odio ad expedita culpa ipsam alias natus.\r\n'),
(4, 'reg4', 'Bitix Customer Plano 4', 'Placeat, porro magni rerum ut rem consequuntur minima hic perspiciatis quidem! Optio ullam provident eligendi beatae, facilis et temporibus porro rem unde dignissimos rerum reiciendis asperiores reprehenderit impedit voluptate eos non tempore. Ut laudantium aliquid consequuntur assumenda, tempore voluptatibus adipisci vero obcaecati! Beatae distinctio numquam sequi, nisi assumenda praesentium facilis!\r\n'),
(5, 'reg5', 'Bitix Customer Plano 5', 'Ab, doloribus aliquam! Iste placeat omnis ipsam error qui ab porro eius mollitia corrupti architecto quasi vel earum sed aut, nobis, repudiandae consequuntur. Perferendis voluptates in, laboriosam, fugiat repellendus atque quisquam facilis vitae, numquam quidem quas nihil quod voluptatibus quaerat non quasi asperiores corporis sapiente quos? Quisquam quos reiciendis vitae.\r\n'),
(6, 'reg6', 'Bitix Customer Plano 6', 'Eius officiis, quos iure sed ullam nulla quod adipisci odit natus enim odio quae dolore tempore molestias deserunt corporis facere vitae fugiat alias provident reiciendis rem eos quas obcaecati. Laborum repellendus deserunt a itaque, vitae facere! Quia aliquam minima cupiditate illo? Iure quas commodi repudiandae dolor iste minus vero? Minus!\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `precos`
--

DROP TABLE IF EXISTS `precos`;
CREATE TABLE IF NOT EXISTS `precos` (
  `cod_preco` int(5) NOT NULL AUTO_INCREMENT,
  `cod_plano` int(5) NOT NULL,
  `minimo_vidas` int(5) NOT NULL,
  `faixa1` float NOT NULL,
  `faixa2` float NOT NULL,
  `faixa3` float NOT NULL,
  PRIMARY KEY (`cod_preco`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `precos`
--

INSERT INTO `precos` (`cod_preco`, `cod_plano`, `minimo_vidas`, `faixa1`, `faixa2`, `faixa3`) VALUES
(4, 1, 4, 9, 11, 14),
(3, 1, 1, 10, 12, 15),
(5, 2, 1, 20, 30, 40),
(6, 3, 1, 30, 40, 50),
(7, 4, 1, 40, 50, 60),
(8, 5, 1, 50, 60, 70),
(9, 6, 1, 60, 70, 80),
(10, 6, 2, 55, 65, 75);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedores`
--

DROP TABLE IF EXISTS `vendedores`;
CREATE TABLE IF NOT EXISTS `vendedores` (
  `cod_vendedor` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`cod_vendedor`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
