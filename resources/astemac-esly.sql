-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Nov-2020 às 13:08
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `astemac-esly`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `address`
--

CREATE TABLE `address` (
  `idAddress` int(11) NOT NULL,
  `idCity` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `street` varchar(150) NOT NULL,
  `number` varchar(20) NOT NULL,
  `district` varchar(150) NOT NULL,
  `cep` int(8) NOT NULL,
  `complement` varchar(100) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `mainAddress` int(11) NOT NULL,
  `codeCity` varchar(15) NOT NULL,
  `city` varchar(150) NOT NULL,
  `uf` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `address`
--

INSERT INTO `address` (`idAddress`, `idCity`, `idUser`, `street`, `number`, `district`, `cep`, `complement`, `reference`, `mainAddress`, `codeCity`, `city`, `uf`) VALUES
(18, 1, 1, 'Rua Capitão Airton P. Rebouças', '228', 'São Conrado', 79200200, 'Ao lado da conveniencia', 'Ao lado esquerdo da conveniencia Liberatti', 0, '11_19', 'Campo Grande', 'MS'),
(19, 1, 1, 'Rua Capitão Airton P. Rebouças', '208', 'São Conrado', 79020200, 'Ao lado da conveniencia', 'Ao lado esquerdo da conveniencia Liberatti', 0, '11_19', 'Campo Grande', 'MS'),
(23, 0, 10, 'AV.MATO GROSSO,', '2621', 'VILA CELIA', 79020200, '', '', 1, '11_19', 'Campo Grande', 'MS'),
(24, 0, 11, 'Av mato grosso', '2621', 'centro', 79020200, 'seila', 'n sei', 1, '11_19', 'Campo Grande', 'MS'),
(25, 0, 12, 'rua italva', '18', 'vila celia', 79020200, 'casa', 'muro azul', 1, '11_19', 'Campo Grande', 'MS'),
(26, 0, 1, 'Centro', '2621', 'Avenida Mato Grosso', 79020200, '', '', 1, '11_19', 'Campo Grande', 'MS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
--

CREATE TABLE `cart` (
  `idCart` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idStorePromo` int(11) NOT NULL,
  `subtotalCart` float NOT NULL,
  `totalCart` float NOT NULL,
  `discountCart` float NOT NULL,
  `statusCart` int(11) NOT NULL,
  `dateUpdate` date NOT NULL,
  `obsCart` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cart`
--

INSERT INTO `cart` (`idCart`, `idUser`, `idStorePromo`, `subtotalCart`, `totalCart`, `discountCart`, `statusCart`, `dateUpdate`, `obsCart`) VALUES
(61, 1, 0, 74.88, 74.88, 0, 0, '2020-11-03', ''),
(62, 10, 0, 139.82, 139.82, 0, 0, '2020-11-03', ''),
(63, 10, 0, 0, 0, 0, 1, '2020-11-03', ''),
(64, 11, 0, 6.98, 6.98, 0, 0, '2020-11-03', ''),
(65, 11, 0, 0, 0, 0, 1, '2020-11-03', ''),
(66, 1, 0, 46.39, 46.39, 0, 0, '2020-11-09', ''),
(67, 12, 0, 61.42, 61.42, 0, 0, '2020-11-03', ''),
(68, 12, 0, 350.92, 350.92, 0, 1, '2020-11-03', ''),
(69, 1, 0, 0, 0, 0, 1, '2020-11-09', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart_item`
--

CREATE TABLE `cart_item` (
  `idCartItem` int(11) NOT NULL,
  `idCart` int(11) NOT NULL,
  `codBars` varchar(20) NOT NULL,
  `codProduct` int(11) NOT NULL,
  `descProduct` varchar(100) NOT NULL,
  `quantity` float NOT NULL,
  `similar` int(11) NOT NULL,
  `unitReference` char(2) NOT NULL,
  `priceItem` float NOT NULL,
  `discount` float NOT NULL,
  `totalItem` float NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cart_item`
--

INSERT INTO `cart_item` (`idCartItem`, `idCart`, `codBars`, `codProduct`, `descProduct`, `quantity`, `similar`, `unitReference`, `priceItem`, `discount`, `totalItem`, `image`) VALUES
(345, 61, '7897101301531', 3026, 'CAFETEIRA C.COADOR CAMBE 02', 1, 0, 'UN', 41.69, 0, 41.69, '/resources/imgs/products/cod/7897101301531.png'),
(347, 62, '7896183900847', 496, 'LENTILHA ZAELI 500G', 6, 0, 'UN', 8.98, 0, 53.88, '/resources/imgs/products/cod/7896183900847.png'),
(349, 62, '7897101300510', 2963, 'BACIA CAMBE VENEZA 60', 1, 0, 'UN', 46.39, 0, 46.39, '/resources/imgs/products/cod/7897101300510.png'),
(350, 62, '7891515977412', 4548, 'CORACAO FRANGO PERDIGAO 1KG', 2, 0, 'KG', 15.98, 0, 31.96, '/resources/imgs/products/desc/CORACAO.png'),
(351, 62, '7896304000012', 10597, 'MACA TURMA DA MONICA 1KG', 1, 0, 'UN', 7.59, 0, 7.59, '/resources/imgs/products/cod/7896304000012.png'),
(352, 64, '001380', 6474, 'MORT.SADILAR SADIA KG', 1, 0, 'KG', 6.98, 0, 6.98, '/resources/imgs/products/desc/MORT.SADILAR.png'),
(353, 61, '7897101302477', 3051, 'CALDEIRAO C.ALCAS CAMBE 18', 1, 0, 'UN', 33.19, 0, 33.19, '/resources/imgs/products/cod/7897101302477.png'),
(354, 67, '78904972', 10764, 'CERVEJA HEINEKEN L.N.330ML', 4, 0, 'UN', 4.98, 0, 19.92, '/resources/imgs/products/cod/78904972.png'),
(355, 67, '7891149104932', 4642, 'CERVEJA BRAHMA LT 350ML ZERO', 2, 0, 'UN', 2.79, 0, 5.58, '/resources/imgs/products/cod/7891149104932.png'),
(357, 67, '7897216500010', 153, 'ARROZ PRATI T1 5KG', 2, 0, 'UN', 10.98, 0, 21.96, '/resources/imgs/products/cod/7897216500010.png'),
(358, 67, '001380', 6474, 'MORT.SADILAR SADIA KG', 2, 0, 'KG', 6.98, 0, 13.96, '/resources/imgs/products/desc/MORT.SADILAR.png'),
(359, 68, '7897101301531', 3026, 'CAFETEIRA C.COADOR CAMBE 02', 2, 0, 'UN', 41.69, 0, 83.38, '/resources/imgs/products/cod/7897101301531.png'),
(360, 68, '7897101302477', 3051, 'CALDEIRAO C.ALCAS CAMBE 18', 2, 0, 'UN', 33.19, 0, 66.38, '/resources/imgs/products/cod/7897101302477.png'),
(361, 68, '7897101301951', 3677, 'FORMA PUDIM CASA GRANDE 22', 2, 0, 'UN', 58.89, 0, 117.78, '/resources/imgs/products/cod/7897101301951.png'),
(362, 68, '7897101301531', 3026, 'CAFETEIRA C.COADOR CAMBE 02', 2, 0, 'UN', 41.69, 0, 83.38, '/resources/imgs/products/cod/7897101301531.png'),
(363, 66, '7897101300510', 2963, 'BACIA CAMBE VENEZA 60', 1, 0, 'UN', 46.39, 0, 46.39, '/resources/imgs/products/cod/7897101300510.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `freight`
--

CREATE TABLE `freight` (
  `idFreight` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `codeCity` varchar(15) NOT NULL,
  `district` varchar(150) NOT NULL,
  `cep` char(8) NOT NULL,
  `city` varchar(150) NOT NULL,
  `uf` char(2) NOT NULL,
  `onlyCity` int(11) NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`details`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `freight`
--

INSERT INTO `freight` (`idFreight`, `idStore`, `codeCity`, `district`, `cep`, `city`, `uf`, `onlyCity`, `details`) VALUES
(1, 1, '11_19', 'Jardim São Conrado', '79093541', 'Campo Grande', 'MS', 0, '{\"freight\":[{\"name\":\"Normal\",\"value\":50,\"status\":1},{\"name\":\"Express\",\"value\":10.5,\"status\":1}]}'),
(8, 1, '11_19', 'CENTRO', '79020200', 'Campo Grande', 'MS', 0, '{\"freight\":[{\"name\":\"Normal\",\"value\":10,\"status\":1},{\"name\":\"Express\",\"value\":20,\"status\":1}]}'),
(10, 1, '11_19', 'Santa Emilia', '79093543', 'Campo Grande', 'MS', 0, '{\"freight\":[{\"name\":\"Normal\",\"value\":0,\"status\":0},{\"name\":\"Express\",\"value\":0,\"status\":0}]}'),
(11, 1, '1_27', 'Alagoas', '79000000', 'Estrela de Alagoas', 'AL', 1, '{\"freight\":[{\"name\":\"Normal\",\"value\":0,\"status\":0},{\"name\":\"Express\",\"value\":0,\"status\":0}]}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horary_prime`
--

CREATE TABLE `horary_prime` (
  `idHorary` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`details`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `horary_prime`
--

INSERT INTO `horary_prime` (`idHorary`, `idStore`, `details`) VALUES
(1, 1, '{\"horary\":{\"1\":{\"name\":\"Segunda\",\"horary\":[{\"init\":\"07:30\",\"final\":\"14:59\",\"value\":0},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":0}],\"delivery\":[{\"init\":\"08:00\",\"final\":\"14:00\",\"value\":10},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":11}],\"withdrawal\":[{\"init\":\"08:00\",\"final\":\"14:25\",\"value\":15},{\"init\":\"14:30\",\"final\":\"21:00\",\"value\":40}]},\"2\":{\"name\":\"Ter\\u00e7a\",\"horary\":[{\"init\":\"08:00\",\"final\":\"14:00\",\"value\":0},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":0}],\"delivery\":[{\"init\":\"07:00\",\"final\":\"14:00\",\"value\":\"0.00\"},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":\"0.00\"}],\"withdrawal\":[{\"init\":\"07:00\",\"final\":\"14:00\",\"value\":\"0.00\"},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":\"0.00\"}]},\"3\":{\"name\":\"Quarta\",\"horary\":[{\"init\":\"07:00\",\"final\":\"14:00\",\"value\":\"0.00\"},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":\"0.00\"}],\"delivery\":[{\"init\":\"07:00\",\"final\":\"14:00\",\"value\":\"0.00\"},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":\"0.00\"}],\"withdrawal\":[{\"init\":\"07:00\",\"final\":\"14:00\",\"value\":\"0.00\"},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":\"0.00\"}]},\"4\":{\"name\":\"Quinta\",\"horary\":[{\"init\":\"07:00\",\"final\":\"14:00\",\"value\":\"0.00\"},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":\"0.00\"}],\"delivery\":[{\"init\":\"07:00\",\"final\":\"14:00\",\"value\":\"0.00\"},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":\"0.00\"}],\"withdrawal\":[{\"init\":\"07:00\",\"final\":\"14:00\",\"value\":\"0.00\"},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":\"0.00\"}]},\"5\":{\"name\":\"Sexta\",\"horary\":[{\"init\":\"07:00\",\"final\":\"14:00\",\"value\":\"0.00\"},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":\"0.00\"}],\"delivery\":[{\"init\":\"07:00\",\"final\":\"10:25\",\"value\":3},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":0}],\"withdrawal\":[{\"init\":\"07:00\",\"final\":\"10:00\",\"value\":0},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":0}]},\"6\":{\"name\":\"S\\u00e1bado\",\"horary\":[{\"init\":\"07:00\",\"final\":\"14:00\",\"value\":\"0.00\"},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":\"0.00\"}],\"delivery\":[{\"init\":\"07:00\",\"final\":\"14:00\",\"value\":\"0.00\"},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":\"0.00\"}],\"withdrawal\":[{\"init\":\"07:00\",\"final\":\"14:00\",\"value\":\"0.00\"},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":\"0.00\"}]},\"7\":{\"name\":\"Domingo\",\"horary\":[{\"init\":\"07:00\",\"final\":\"14:00\",\"value\":\"0.00\"},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":\"0.00\"}],\"delivery\":[{\"init\":\"07:00\",\"final\":\"14:00\",\"value\":\"0.00\"},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":\"0.00\"}],\"withdrawal\":[{\"init\":\"07:00\",\"final\":\"14:00\",\"value\":\"0.00\"},{\"init\":\"15:00\",\"final\":\"20:00\",\"value\":\"0.00\"}]}}}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `layout`
--

CREATE TABLE `layout` (
  `idLayout` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `txLayout` varchar(70) NOT NULL,
  `txH1Layout` varchar(50) NOT NULL,
  `txH2Layout` varchar(50) NOT NULL,
  `txH3Layout` varchar(50) NOT NULL,
  `txFooterLayout` varchar(70) NOT NULL,
  `bgLayout` varchar(70) NOT NULL,
  `bgH1Layout` varchar(50) NOT NULL,
  `bgH2Layout` varchar(50) NOT NULL,
  `bgH3Layout` varchar(50) NOT NULL,
  `bgFooterLayout` varchar(70) NOT NULL,
  `btnLayout` varchar(50) NOT NULL,
  `btnH1Layout` varchar(50) NOT NULL,
  `btnH2Layout` varchar(50) NOT NULL,
  `btnH3Layout` varchar(50) NOT NULL,
  `colorLayout` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `layout`
--

INSERT INTO `layout` (`idLayout`, `idStore`, `txLayout`, `txH1Layout`, `txH2Layout`, `txH3Layout`, `txFooterLayout`, `bgLayout`, `bgH1Layout`, `bgH2Layout`, `bgH3Layout`, `bgFooterLayout`, `btnLayout`, `btnH1Layout`, `btnH2Layout`, `btnH3Layout`, `colorLayout`) VALUES
(1, 0, 'text-primary', 'text-light', 'text-primary', 'text-primary', 'text-light', 'bg-white', 'bg-primary', 'bg-primary', 'bg-primary', 'bg-primary', 'btn-primary', 'btn-outline-primary', 'btn-primary', 'btn-light', 'primary'),
(2, 1, 'text-primary', 'text-light', 'text-primary', 'text-primary', 'text-light', 'bg-white', 'bg-primary', 'bg-primary', 'bg-primary', 'bg-primary', 'btn-primary', 'btn-outline-primary', 'btn-primary', 'btn-light', 'primary'),
(3, 2, 'text-primary', 'text-light', 'text-primary', 'text-primary', 'text-light', 'bg-white', 'bg-primary', 'bg-primary', 'bg-primary', 'bg-primary', 'btn-primary', 'btn-outline-primary', 'btn-primary', 'btn-light', 'primary'),
(4, 3, 'text-primary', 'text-light', 'text-primary', 'text-primary', 'text-light', 'bg-white', 'bg-primary', 'bg-primary', 'bg-primary', 'bg-primary', 'btn-primary', 'btn-outline-primary', 'btn-primary', 'btn-light', 'primary');

-- --------------------------------------------------------

--
-- Estrutura da tabela `layout_color`
--

CREATE TABLE `layout_color` (
  `idLayoutColor` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`options`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `layout_color`
--

INSERT INTO `layout_color` (`idLayoutColor`, `idStore`, `options`) VALUES
(1, 1, '{\"hd\":{\"name\":\"Cabe\\u00e7alho\",\"options\":{\"bck\":{\"title\":\"Fundo do Cabe\\u00e7alho\",\"value\":\"#5A08FF\",\"icon\":\"fas fa-fill-drip\"},\"tx\":{\"title\":\"Texto\",\"value\":\"#FFFFFF\",\"icon\":\"fas fa-font\"},\"btndep\":{\"title\":\"Bot\\u00e3o de Departamentos\",\"value\":\"#FFFFFF\",\"icon\":\"fas fa-bars\"}}},\"sc\":{\"name\":\"Se\\u00e7\\u00e3o - Principal\",\"options\":{\"bck\":{\"title\":\"Fundo da Se\\u00e7\\u00e3o\",\"value\":\"#FFFFFF\",\"icon\":\"fas fa-fill-drip\"},\"tx\":{\"title\":\"Texto Principal\",\"value\":\"#FFFFFF\",\"icon\":\"fas fa-font\"},\"txsec\":{\"title\":\"Texto Secund\\u00e1rio\",\"value\":\"#FFFFFF\",\"icon\":\"fas fa-font\"},\"txlk\":{\"title\":\"Texto Links\",\"value\":\"#FFFFFF\",\"icon\":\"fas fa-font\"},\"btn\":{\"title\":\"Bot\\u00e3o Principal\",\"value\":\"#FFFFFF\",\"icon\":\"far fa-hand-pointer\"},\"btnsec\":{\"title\":\"Bot\\u00e3o Secund\\u00e1rio\",\"value\":\"#FFFFFF\",\"icon\":\"far fa-hand-pointer\"},\"btncr\":{\"title\":\"Bot\\u00e3o Carrinho\",\"value\":\"#FFFFFF\",\"icon\":\"fas fa-shopping-cart\"},\"txbtn\":{\"title\":\"Texto do Bot\\u00e3o\",\"value\":\"#FFFFFF\",\"icon\":\"fas fa-font\"}}},\"ftsc\":{\"name\":\"Rodap\\u00e9 - Redes Sociais\",\"options\":{\"bck\":{\"title\":\"Fundo do Rodap\\u00e9\",\"value\":\"#FFFFFF\",\"icon\":\"fas fa-fill-drip\"},\"tx\":{\"title\":\"Texto\",\"value\":\"#FFFFFF\",\"icon\":\"fas fa-font\"}}},\"ft\":{\"name\":\"Rodap\\u00e9 - Principal\",\"options\":{\"bck\":{\"title\":\"Fundo do Rodap\\u00e9\",\"value\":\"#5D0E0E\",\"icon\":\"fas fa-fill-drip\"},\"tx\":{\"title\":\"Texto\",\"value\":\"#FFFFFF\",\"icon\":\"fas fa-font\"},\"btn\":{\"title\":\"Bot\\u00e3o Principal\",\"value\":\"#E11414\",\"icon\":\"far fa-hand-pointer\"},\"btnsec\":{\"title\":\"Bot\\u00e3o Secund\\u00e1rio\",\"value\":\"#FFFFFF\",\"icon\":\"far fa-hand-pointer\"},\"txbtn\":{\"title\":\"Texto do Bot\\u00e3o\",\"value\":\"#FFFFFF\",\"icon\":\"fas fa-font\"}}},\"ftcp\":{\"name\":\"Rodap\\u00e9 - Copyright\",\"options\":{\"bck\":{\"title\":\"Fundo do Rodap\\u00e9\",\"value\":\"#1A12BE\",\"icon\":\"fas fa-fill-drip\"},\"tx\":{\"title\":\"Texto\",\"value\":\"#FFFFFF\",\"icon\":\"fas fa-font\"}}}}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `layout_footer`
--

CREATE TABLE `layout_footer` (
  `idLayoutFooter` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `lyFooter1` int(11) NOT NULL,
  `lyFooter2` int(11) NOT NULL,
  `lyFooter3` int(11) NOT NULL,
  `lyFooter4` int(11) NOT NULL,
  `lyFooter5` int(11) NOT NULL,
  `lyFooter6` int(11) NOT NULL,
  `lyFooter7` int(11) NOT NULL,
  `lyFooter8` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `layout_footer`
--

INSERT INTO `layout_footer` (`idLayoutFooter`, `idStore`, `lyFooter1`, `lyFooter2`, `lyFooter3`, `lyFooter4`, `lyFooter5`, `lyFooter6`, `lyFooter7`, `lyFooter8`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 3, 1, 1, 1, 1, 1, 1, 1, 1),
(4, 4, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `layout_header`
--

CREATE TABLE `layout_header` (
  `idLayoutHeader` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `description` varchar(20) NOT NULL,
  `departament` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `layout_header`
--

INSERT INTO `layout_header` (`idLayoutHeader`, `idStore`, `description`, `departament`, `link`, `type`, `status`) VALUES
(1, 1, 'Aluminio', 'ALUMINIO', 'http://mercatosistemas.com.br/loja-01/departaments/ALUMINIO-0/', 1, 1),
(2, 1, 'Promoções', '0', 'http://mercatosistemas.com.br/loja-01/promotions/', 2, 1),
(3, 1, 'Cupons', '0', 'http://mercatosistemas.com.br/loja-01/promotions/', 2, 1),
(4, 1, 'Churrasco', 'AÇOUGUE', 'http://mercatosistemas.com.br/loja-01/departaments/AÇOUGUE-0/', 1, 1),
(5, 1, 'Dúvidas', '0', 'http://mercatosistemas.com.br/loja-01/help/', 2, 1),
(6, 1, 'Cervejas', 'CERVEJAS', 'http://mercatosistemas.com.br/loja-01/departaments/CERVEJAS-0/', 1, 1),
(7, 1, 'Frutas', 'FRUTAS', 'http://mercatosistemas.com.br/loja-01/departaments/FRUTAS-0/', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `layout_info`
--

CREATE TABLE `layout_info` (
  `idLayoutInfo` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `lyInfo1` int(11) NOT NULL,
  `lyInfo2` int(11) NOT NULL,
  `lyInfo3` int(11) NOT NULL,
  `lyInfo4` int(11) NOT NULL,
  `lyInfo5` int(11) NOT NULL,
  `lyInfo6` int(11) NOT NULL,
  `lyInfo7` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `layout_info`
--

INSERT INTO `layout_info` (`idLayoutInfo`, `idStore`, `lyInfo1`, `lyInfo2`, `lyInfo3`, `lyInfo4`, `lyInfo5`, `lyInfo6`, `lyInfo7`) VALUES
(1, 1, 1, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mercato`
--

CREATE TABLE `mercato` (
  `idMercato` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `port` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mercato`
--

INSERT INTO `mercato` (`idMercato`, `idStore`, `port`) VALUES
(1, 1, '8082');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `idOrder` int(11) NOT NULL,
  `idAddress` int(11) NOT NULL,
  `idCart` int(11) NOT NULL,
  `idOrderStatus` int(11) NOT NULL,
  `idPromo` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `idStorePayment` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `codOrder` int(11) NOT NULL,
  `nameRes` varchar(50) NOT NULL,
  `dateHorary` date NOT NULL,
  `timeInitial` time NOT NULL,
  `timeFinal` time NOT NULL,
  `priceHorary` float NOT NULL,
  `freight` varchar(50) NOT NULL,
  `typeFreight` int(11) NOT NULL,
  `priceFreight` float NOT NULL,
  `typeModality` int(11) NOT NULL,
  `changePay` float NOT NULL,
  `discount` float NOT NULL,
  `subtotal` float NOT NULL,
  `total` float NOT NULL,
  `paid` int(11) NOT NULL,
  `dateUpdate` date NOT NULL,
  `timeUpdate` time NOT NULL,
  `dateInsert` date NOT NULL,
  `timeInsert` time NOT NULL,
  `payment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`status`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`idOrder`, `idAddress`, `idCart`, `idOrderStatus`, `idPromo`, `idStore`, `idStorePayment`, `idUser`, `codOrder`, `nameRes`, `dateHorary`, `timeInitial`, `timeFinal`, `priceHorary`, `freight`, `typeFreight`, `priceFreight`, `typeModality`, `changePay`, `discount`, `subtotal`, `total`, `paid`, `dateUpdate`, `timeUpdate`, `dateInsert`, `timeInsert`, `payment`, `address`, `status`) VALUES
(57, 0, 62, 6, 0, 1, 0, 10, 59, 'VANESSA LUZ', '2020-11-03', '15:00:00', '20:00:00', 0, 'Express', 1, 20, 2, 200, 0, 139.82, 159.82, 0, '2020-11-03', '14:04:00', '2020-11-03', '13:57:43', '{\"payment\":{\"idPayment\":\"12\",\"pay\":\"Dinheiro\",\"description\":\"\\u00c0 Vista\",\"type\":\"2\",\"image\":\"dinheiro.png\"}}', '{\"address\":[{\"street\":\"Avenida Mato Grosso\",\"number\":\"2621\",\"district\":\"Centro\",\"cep\":\"79020200\",\"complement\":\"Ao Lado da Otica\",\"reference\":\"\",\"city\":\"Campo Grande\",\"uf\":\"MS\",\"codeCity\":\"11_19\"},{\"street\":\"AV.MATO GROSSO,\",\"number\":\"2621\",\"district\":\"VILA CELIA\",\"cep\":\"79020200\",\"complement\":\"\",\"reference\":\"\",\"city\":\"Campo Grande\",\"uf\":\"MS\",\"codeCity\":\"11_19\"}]}', '{\"orderStatus\":[{\"name\":\"Em An\\u00e1lise\",\"date\":\"2020-11-03\",\"time\":\"13:57:43\"},{\"name\":\"Aguardando Separa\\u00e7\\u00e3o\",\"date\":\"2020-11-03\",\"time\":\"13:57:43\"},{\"name\":\"Em Separa\\u00e7\\u00e3o\",\"date\":\"2020-11-03\",\"time\":\"13:58:47\"},{\"name\":\"Separado\",\"date\":\"2020-11-03\",\"time\":\"13:58:55\"},{\"name\":\"Em Rota\",\"date\":\"2020-11-03\",\"time\":\"14:01:25\"},{\"name\":\"Entregue\",\"date\":\"2020-11-03\",\"time\":\"14:04:01\"}]}'),
(58, 0, 64, 6, 0, 1, 0, 11, 60, 'jonathan de carvalho moreira', '2020-11-03', '15:00:00', '20:00:00', 0, 'Normal', 0, 10, 2, 31, 0, 6.98, 16.98, 0, '2020-11-03', '14:28:00', '2020-11-03', '14:24:56', '{\"payment\":{\"idPayment\":\"12\",\"pay\":\"Dinheiro\",\"description\":\"\\u00c0 Vista\",\"type\":\"2\",\"image\":\"dinheiro.png\"}}', '{\"address\":[{\"street\":\"Avenida Mato Grosso\",\"number\":\"2621\",\"district\":\"Centro\",\"cep\":\"79020200\",\"complement\":\"Ao Lado da Otica\",\"reference\":\"\",\"city\":\"Campo Grande\",\"uf\":\"MS\",\"codeCity\":\"11_19\"},{\"street\":\"Av mato grosso\",\"number\":\"2621\",\"district\":\"centro\",\"cep\":\"79020200\",\"complement\":\"seila\",\"reference\":\"n sei\",\"city\":\"Campo Grande\",\"uf\":\"MS\",\"codeCity\":\"11_19\"}]}', '{\"orderStatus\":[{\"name\":\"Em An\\u00e1lise\",\"date\":\"2020-11-03\",\"time\":\"14:24:56\"},{\"name\":\"Aguardando Separa\\u00e7\\u00e3o\",\"date\":\"2020-11-03\",\"time\":\"14:24:56\"},{\"name\":\"Em Separa\\u00e7\\u00e3o\",\"date\":\"2020-11-03\",\"time\":\"14:26:12\"},{\"name\":\"Separado\",\"date\":\"2020-11-03\",\"time\":\"14:26:17\"},{\"name\":\"Em Rota\",\"date\":\"2020-11-03\",\"time\":\"14:27:35\"},{\"name\":\"Entregue\",\"date\":\"2020-11-03\",\"time\":\"14:28:17\"}]}'),
(59, 0, 61, 4, 0, 1, 0, 1, 61, 'Edu Luz', '2020-11-05', '07:00:00', '14:00:00', 0, 'Sem Frete', 0, 0, 1, 0, 0, 74.88, 74.88, 0, '2020-11-03', '16:11:00', '2020-11-03', '16:10:11', '{\"payment\":{\"idPayment\":\"11\",\"pay\":\"MasterCard\",\"description\":\"Na Hora\",\"type\":\"1\",\"image\":\"mastercard.png\"}}', '{\"address\":[{\"street\":\"Avenida Mato Grosso\",\"number\":\"2621\",\"district\":\"Centro\",\"cep\":\"79020200\",\"complement\":\"Ao Lado da Otica\",\"reference\":\"\",\"city\":\"Campo Grande\",\"uf\":\"MS\",\"codeCity\":\"11_19\"}]}', '{\"orderStatus\":[{\"name\":\"Em An\\u00e1lise\",\"date\":\"2020-11-03\",\"time\":\"16:10:11\"},{\"name\":\"Aguardando Separa\\u00e7\\u00e3o\",\"date\":\"2020-11-03\",\"time\":\"16:10:11\"},{\"name\":\"Em Separa\\u00e7\\u00e3o\",\"date\":\"2020-11-03\",\"time\":\"16:10:39\"},{\"name\":\"Separado\",\"date\":\"2020-11-03\",\"time\":\"16:10:58\"}]}'),
(60, 0, 67, 6, 0, 1, 0, 12, 62, 'Roger Moralles', '2020-11-06', '07:00:00', '10:25:00', 3, 'Normal', 0, 10, 2, 100, 0, 61.42, 74.42, 0, '2020-11-03', '16:29:00', '2020-11-03', '16:22:55', '{\"payment\":{\"idPayment\":\"12\",\"pay\":\"Dinheiro\",\"description\":\"\\u00c0 Vista\",\"type\":\"2\",\"image\":\"dinheiro.png\"}}', '{\"address\":[{\"street\":\"Avenida Mato Grosso\",\"number\":\"2621\",\"district\":\"Centro\",\"cep\":\"79020200\",\"complement\":\"Ao Lado da Otica\",\"reference\":\"\",\"city\":\"Campo Grande\",\"uf\":\"MS\",\"codeCity\":\"11_19\"},{\"street\":\"rua italva\",\"number\":\"18\",\"district\":\"vila celia\",\"cep\":\"79020200\",\"complement\":\"casa\",\"reference\":\"muro azul\",\"city\":\"Campo Grande\",\"uf\":\"MS\",\"codeCity\":\"11_19\"}]}', '{\"orderStatus\":[{\"name\":\"Em An\\u00e1lise\",\"date\":\"2020-11-03\",\"time\":\"16:22:55\"},{\"name\":\"Aguardando Separa\\u00e7\\u00e3o\",\"date\":\"2020-11-03\",\"time\":\"16:22:56\"},{\"name\":\"Em Separa\\u00e7\\u00e3o\",\"date\":\"2020-11-03\",\"time\":\"16:23:56\"},{\"name\":\"Separado\",\"date\":\"2020-11-03\",\"time\":\"16:24:04\"},{\"name\":\"Em Rota\",\"date\":\"2020-11-03\",\"time\":\"16:24:29\"},{\"name\":\"Entregue\",\"date\":\"2020-11-03\",\"time\":\"16:29:07\"}]}'),
(61, 0, 66, 4, 0, 1, 0, 1, 63, 'Eduardo Santos Luz', '2020-11-13', '07:00:00', '10:25:00', 3, 'Normal', 0, 10, 2, 60, 0, 46.39, 59.39, 0, '2020-11-09', '09:51:00', '2020-11-09', '09:50:18', '{\"payment\":{\"idPayment\":\"12\",\"pay\":\"Dinheiro\",\"description\":\"\\u00c0 Vista\",\"type\":\"2\",\"image\":\"dinheiro.png\"}}', '{\"address\":[{\"street\":\"Avenida Mato Grosso\",\"number\":\"2621\",\"district\":\"Centro\",\"cep\":\"79020200\",\"complement\":\"Ao Lado da Otica\",\"reference\":\"\",\"city\":\"Campo Grande\",\"uf\":\"MS\",\"codeCity\":\"11_19\"},{\"street\":\"Rua Capit\\u00e3o Airton P. Rebou\\u00e7as\",\"number\":\"208\",\"district\":\"S\\u00e3o Conrado\",\"cep\":\"79020200\",\"complement\":\"Ao lado da conveniencia\",\"reference\":\"Ao lado esquerdo da conveniencia Liberatti\",\"city\":\"Campo Grande\",\"uf\":\"MS\",\"codeCity\":\"11_19\"}]}', '{\"orderStatus\":[{\"name\":\"Em An\\u00e1lise\",\"date\":\"2020-11-09\",\"time\":\"09:50:18\"},{\"name\":\"Aguardando Separa\\u00e7\\u00e3o\",\"date\":\"2020-11-09\",\"time\":\"09:50:18\"},{\"name\":\"Em Separa\\u00e7\\u00e3o\",\"date\":\"2020-11-09\",\"time\":\"09:50:49\"},{\"name\":\"Separado\",\"date\":\"2020-11-09\",\"time\":\"09:51:01\"}]}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders_status`
--

CREATE TABLE `orders_status` (
  `idOrderStatus` int(11) NOT NULL,
  `descStatus` varchar(50) NOT NULL,
  `typeOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `orders_status`
--

INSERT INTO `orders_status` (`idOrderStatus`, `descStatus`, `typeOrder`) VALUES
(1, 'Em Análise', 0),
(2, 'Aguardando Separação', 0),
(3, 'Em Separação', 0),
(4, 'Separado', 0),
(5, 'Em Rota', 2),
(6, 'Entregue', 2),
(7, 'Retirado', 1),
(8, 'Dados Atualizados', 3),
(9, 'Cancelado', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `partners`
--

CREATE TABLE `partners` (
  `idPartner` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `link` text NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `partners`
--

INSERT INTO `partners` (`idPartner`, `idStore`, `name`, `link`, `file`) VALUES
(16, 1, 'Coca Cola', 'https://cocacola.com.br', 'ampobE1ibEtCaFUyczU3OGZqTis3K3cxb2lQL1RlajhlNXlzeVBHNzVhbzc0RWRsK3Faa1pabVZXODZTcEQ4cg==.png'),
(17, 1, 'Ambev', 'https://ambev.com.br', 'OVFzVEhmK2JuV0xvTjMzY2Y5bnYzWVRBV3oreUdoN014UkdqT3FXR2RtVT0=.png'),
(18, 1, 'Nestle', 'https://nestle.com.br', 'VlprNUsyMVArRzVRWnJ2TnprNGhXeHBMZ1UzWll5UWl2U1paT0x1VGVJWT0=.png'),
(19, 1, 'Unilever', 'https://unilever.com.br', 'K1JDazQxSVVmbEJuY3E0TlVydjVsRUpOa1c4QjR2ejlWcktCajFBL3R0ND0=.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `payment`
--

CREATE TABLE `payment` (
  `idPayment` int(11) NOT NULL,
  `idPaymentType` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `payment`
--

INSERT INTO `payment` (`idPayment`, `idPaymentType`, `idStore`, `description`, `type`) VALUES
(2, 5, 1, 'Somente Débito', 2),
(4, 8, 1, 'Todas as Bandeiras', 3),
(8, 4, 1, 'À Vista', 1),
(11, 7, 1, 'Na Hora', 1),
(12, 4, 1, 'À Vista', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `payment_type`
--

CREATE TABLE `payment_type` (
  `idPaymentType` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `src` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `payment_type`
--

INSERT INTO `payment_type` (`idPaymentType`, `name`, `src`) VALUES
(1, 'Alelo', 'alelo.png'),
(2, 'American Express', 'american_express.png'),
(3, 'Cielo', 'cielo.png'),
(4, 'Dinheiro', 'dinheiro.png'),
(5, 'Elo', 'elo.png'),
(6, 'Hiper', 'hiper.png'),
(7, 'MasterCard', 'mastercard.png'),
(8, 'Pag Seguro', 'pagseguro.png'),
(9, 'Sodexo', 'sodexo.png'),
(10, 'Ticket', 'ticket.png'),
(11, 'Vale', 'vale.png'),
(12, 'Visa', 'visa.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `promotions`
--

CREATE TABLE `promotions` (
  `idPromo` int(11) NOT NULL,
  `idPromoType` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `code` varchar(20) NOT NULL,
  `value` float NOT NULL,
  `valueType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `promotions`
--

INSERT INTO `promotions` (`idPromo`, `idPromoType`, `idStore`, `title`, `description`, `code`, `value`, `valueType`) VALUES
(4, 1, 1, 'CUPOM DESCONTO DE 25%', 'CUPOM DESCONTO DE 25%', 'CODE25', 25, 2),
(6, 3, 1, 'Frete Grátis Em Compras Acima de R$100,00', 'Frete Grátis Em Compras Acima de R$100,00', '', 100, 1),
(7, 1, 1, 'CUPOM DESCONTO R$ 50,00', 'CUPOM DESCONTO R$ 50,00', 'CODE50', 50, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `promotions_type`
--

CREATE TABLE `promotions_type` (
  `idPromoType` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `promotions_type`
--

INSERT INTO `promotions_type` (`idPromoType`, `type`, `description`) VALUES
(1, 1, 'No SubTotal da Compra'),
(2, 2, 'Na Primeira Compra'),
(3, 2, 'Compras Acima de');

-- --------------------------------------------------------

--
-- Estrutura da tabela `social`
--

CREATE TABLE `social` (
  `idSocial` int(11) NOT NULL,
  `idSocialType` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `social`
--

INSERT INTO `social` (`idSocial`, `idSocialType`, `idStore`, `link`) VALUES
(1, 1, 1, 'https://www.instagram.com/'),
(2, 2, 1, 'https://www.facebook.com/'),
(3, 3, 1, 'https://www.twitter.com/'),
(4, 4, 1, 'https://www.youtube.com/'),
(5, 5, 1, 'https://play.google.com/store'),
(6, 6, 1, 'https://www.apple.com/ios/app-store/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `social_type`
--

CREATE TABLE `social_type` (
  `idSocialType` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `social_type`
--

INSERT INTO `social_type` (`idSocialType`, `name`, `icon`) VALUES
(1, 'Instagram', 'fab fa-instagram'),
(2, 'Facebook', 'fab fa-facebook-f'),
(3, 'Twitter', 'fab fa-twitter'),
(4, 'YouTube', 'fab fa-youtube'),
(5, 'Play Store', 'fab fa-google-play'),
(6, 'Apple Store', 'fab fa-apple');

-- --------------------------------------------------------

--
-- Estrutura da tabela `states`
--

CREATE TABLE `states` (
  `idState` int(11) NOT NULL,
  `idCountry` int(11) NOT NULL,
  `nameState` varchar(150) NOT NULL,
  `nickState` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `states`
--

INSERT INTO `states` (`idState`, `idCountry`, `nameState`, `nickState`) VALUES
(1, 1, 'Mato Grosso do Sul', 'MS'),
(2, 1, 'Mato Grosso', 'MT');

-- --------------------------------------------------------

--
-- Estrutura da tabela `store`
--

CREATE TABLE `store` (
  `idStore` int(11) NOT NULL,
  `idStoreAddress` int(11) NOT NULL,
  `store` varchar(3) NOT NULL,
  `nameStore` varchar(100) NOT NULL,
  `cnpjStore` varchar(255) NOT NULL,
  `emailStore` varchar(150) NOT NULL,
  `telephoneStore` varchar(255) NOT NULL,
  `whatsappStore` varchar(255) NOT NULL,
  `statusStore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `store`
--

INSERT INTO `store` (`idStore`, `idStoreAddress`, `store`, `nameStore`, `cnpjStore`, `emailStore`, `telephoneStore`, `whatsappStore`, `statusStore`) VALUES
(1, 1, '01', 'Astemac Automação Comercial', 'NEwzOWd5OUQ3eGNFRlVDd2lhSFI1UT09', 'MeuEmail@loja.com.br', 'UEVoVWRGZVA0Z3N0VlJ4em5qSkNsdz09', 'UEVoVWRGZVA0Z3N0VlJ4em5qSkNsdz09', 1),
(2, 2, '02', 'Astemac 2', 'QU1SSktIL2J5SGJXSzI4M0IyWUNOdz09', 'email@contato.com.br', 'K2c5UUNqRzJFMm9veTN5Z3VWSWQ0QT09', 'VGtSSWZBczdXV05ZWHVDTXlQaW11QT09', 0),
(3, 3, '03', 'Astemac 3', 'NEwzOWd5OUQ3eGNFRlVDd2lhSFI1UT09', 'email@contato.com.br', 'UEVoVWRGZVA0Z3N0VlJ4em5qSkNsdz09', 'UEVoVWRGZVA0Z3N0VlJ4em5qSkNsdz09', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `store_address`
--

CREATE TABLE `store_address` (
  `idStoreAddress` int(11) NOT NULL,
  `idCity` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `streetStore` varchar(150) NOT NULL,
  `numberStore` varchar(20) NOT NULL,
  `districtStore` varchar(150) NOT NULL,
  `cepStore` varchar(8) NOT NULL,
  `complementStore` varchar(100) NOT NULL,
  `codeCity` varchar(15) NOT NULL,
  `city` varchar(150) NOT NULL,
  `uf` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `store_address`
--

INSERT INTO `store_address` (`idStoreAddress`, `idCity`, `idStore`, `streetStore`, `numberStore`, `districtStore`, `cepStore`, `complementStore`, `codeCity`, `city`, `uf`) VALUES
(1, 1, 1, 'Avenida Mato Grosso', '2621', 'Centro', '79020200', 'Ao Lado da Otica', '11_19', 'Campo Grande', 'MS'),
(2, 3, 2, 'Av. Mato Grosso', '2621', 'Centro', '79020201', '', '11_15', 'Bonito', 'MS'),
(3, 2, 3, 'Av. Mato Grosso', '2621', 'Centro', '79020203', '', '1_27', 'Estrela de Alagoas', 'AL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `store_help`
--

CREATE TABLE `store_help` (
  `idStoreHelp` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `titleHelpStore` varchar(255) NOT NULL,
  `textHelpStore` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `store_help`
--

INSERT INTO `store_help` (`idStoreHelp`, `idStore`, `titleHelpStore`, `textHelpStore`) VALUES
(1, 1, 'Como Funciona?', 'Você digita seu CEP, seleciona um de nossos supermercados, monta seu carrinho de compras, escolhe o melhor horário para recebê-las na sua casa ou trabalho, e realiza o pagamento com cartão de crédito. Suas compras serão entregas em até 3 horas posteriores a confirmação do pagamento. Tomaremos o maior cuidado para suas compras chegarem perfeitamente até você.'),
(2, 1, 'Posso retirar as compras no mercado?', 'É claro, essa opção é livre, você ainda vai poder poupar um pouco com o frete.'),
(3, 1, 'Posso cancelar minha compra?', 'Caso sua compra não esteja agendada para as próximas duas horas, é possível realizar o cancelamento acessando o pedido e clicando no botão cancelar.'),
(4, 1, 'Quanto custa a entrega?', 'O valor da da taxa de entrega pode variar de R$ 0,00 à R$ 00,00, dependendo da região, do dia e do horário de entrega. Na hora de agendar o seu pedido, os valores do frete aparecem ao lado.'),
(5, 1, 'O site é seguro? ', 'Buscamos ao máximo ser 100% seguro. Somos uma empresa de tecnologia e investimos em qualidade para oferecermos um ambiente seguro. Além disso, os dados de pagamento são criptografados. '),
(6, 1, 'Os preços são os mesmos do mercado fisico?', 'Sim! Além do mais, temos ofertas que são válidas para clientes que compram apenas no site.'),
(15, 1, 'Quais regiões vocês atendem?', 'Hoje atuamos somente em: Campo Grande - MS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `store_info`
--

CREATE TABLE `store_info` (
  `idStoreInfo` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `textInfoStore` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `store_info`
--

INSERT INTO `store_info` (`idStoreInfo`, `idStore`, `textInfoStore`) VALUES
(1, 1, 'Simples, porque nos propomos a repensar e reinventar as formas de desenvolver projetos.&#013;Contamos com uma equipe de profissionais qualificados para desmistificar o cenário digital e propor as melhores soluções para cada projeto.­&#013;Somos apaixonados pelo que fazemos e damos o melhor de nós, afinal de contas, dedicamos nosso tempo a isso e queremos que tudo saia perfeito. Além disso, compreendemos a importância e os resultados que uma equipe produtiva e focada traz aos clientes. &#013;< Astemac >');

-- --------------------------------------------------------

--
-- Estrutura da tabela `store_institutional`
--

CREATE TABLE `store_institutional` (
  `idStoreInstitutional` int(11) NOT NULL,
  `idStore` int(11) NOT NULL,
  `infoStore` int(11) NOT NULL,
  `allStore` int(11) NOT NULL,
  `partnerStore` int(11) NOT NULL,
  `helpStore` int(11) NOT NULL,
  `promotionStore` int(11) NOT NULL,
  `contactStore` int(11) NOT NULL,
  `workStore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `store_institutional`
--

INSERT INTO `store_institutional` (`idStoreInstitutional`, `idStore`, `infoStore`, `allStore`, `partnerStore`, `helpStore`, `promotionStore`, `contactStore`, `workStore`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1, 1, 1, 1),
(3, 3, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nameUser` varchar(75) NOT NULL,
  `surnameUser` varchar(150) NOT NULL,
  `emailUser` varchar(150) NOT NULL,
  `passUser` varchar(255) NOT NULL,
  `recoveryUser` varchar(255) NOT NULL,
  `telephoneUser` varchar(255) NOT NULL,
  `whatsappUser` varchar(255) NOT NULL,
  `genreUser` int(11) NOT NULL,
  `cpfUser` varchar(255) NOT NULL,
  `dateBirthUser` date DEFAULT NULL,
  `admin` int(11) NOT NULL,
  `statusUser` int(11) NOT NULL,
  `dateInsert` date NOT NULL,
  `timeInsert` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`idUser`, `nameUser`, `surnameUser`, `emailUser`, `passUser`, `recoveryUser`, `telephoneUser`, `whatsappUser`, `genreUser`, `cpfUser`, `dateBirthUser`, `admin`, `statusUser`, `dateInsert`, `timeInsert`) VALUES
(1, 'Eduardo', 'Santos Luz', 'edyven100@gmail.com', 'N2JHSSttTzhScVBNdHFRaWFMdzVPcDJseEVIUkpLYmVuNXJjVy81UnV4N0RlK29aYmdXanFFL1dmeUFNcDdxSGxVZlk0bzd1SlA1TlBWNlZieDM2dkE9PQ==', 'R3RUMG54dXVISFgxRW83NlRTVVNUemxqR09CVDE1NHRtdlhWMytzSW1JUVlSQWpjbStEaEw3U016VXczdWhsd3RGUlBDYjhuNU1nOE1HN2IxTGo5ZXc9PQ==', 'UEVoVWRGZVA0Z3N0VlJ4em5qSkNsdz09', 'UEVoVWRGZVA0Z3N0VlJ4em5qSkNsdz09', 2, 'S2VQaFg1K1B6YjM4YlMxempwMHhmdz09', '2003-01-26', 2, 1, '2020-10-09', '00:00:00'),
(10, 'Vanessa', 'Luz Leal', 'astemac.vanessa@terra.com.br', 'Uzg1ZXZ1Q2tGVXk4TUdETGhJS2tEREgvSmdjZGV0RDBVUGxOQ3FoSWNldGpBR1pzc0dQVVVvUythOEJjblVoeVRqUE9vck9JTTlqRTVFUWU4Y013dFE9PQ==', 'QkNGem13blZSazlOdldiYVdycHBzbUV4WEJGYkRNQlUzRkJwSkdob05GaG1QWG1UenBxU0FIVmdHYWdGOEw4R3kwN3l0MG45RkV5c2JDZlM1eGNEbXc9PQ==', 'MTVJMkZHZHNsbzYvR0h1cklFNjM0QT09', 'MTVJMkZHZHNsbzYvR0h1cklFNjM0QT09', 1, 'a1VlTkRBYXpabDN4YSt5UzA5Tlp4Zz09', '1981-01-02', 0, 1, '2020-11-03', '13:41:14'),
(11, 'Jonathan', 'De Carvalho Moreira', 'jonathanexvb@gmail.com', 'SUlqSW1mRHhPUnYzUTNlMzNqcTF3RVY3SVlrcjhrTkhTd0VuSlk5b1Erbm1TSmtIdnhMZmgrSW5Tb2tST2lrWktiaFM1bjRZenVEYUduWGEzYWU0bVE9PQ==', 'ZG5ZZGZXb29rQW55SzQza2dpMCtSZGlBdWllMGYzd3RPa202MUxKdjZzcjhyVkx5djFSOG9hTjkzbmkzellRM3RGZnQ3cHROQkFaT0pYMHdRc001TWc9PQ==', 'TnJpNzNySy9RenE0WlR4d1pkNGQvUT09', 'bVdXYmN6ZkFDSUlOZ2ZZQnh5VzFmQT09', 3, 'WVhEM2RkczY1TUxOOSt1Vkx1U2NCZz09', '1994-10-25', 0, 1, '2020-11-03', '14:18:44'),
(12, 'Rogerio', 'Moralles', 'astemac@hotmail.com', 'RUNTUFE4bTJRdlNjeE5YaUJ1NWJxRkw1S3VoU3hpVWJ6S2JPM0kvcTlPRVVTUkJzSDlvVWluNEJVdHROWXdHbGtqeCs2NFJ4V01JTDVaQTF3ZDJzM3c9PQ==', 'UnZhSWZsLytvVXR2K2duZnB1cm9TTDlnSjd0MGE5eEF3SnNTeDBTOXNQaDNaYTk0WFNBci96amsxZnpzNS9tYktCVGNuQlozTjhTVUxpL1RYRVZPTEE9PQ==', 'M004dUY0U1RuS3FjS1pIaWhiU3FxUT09', 'aGN3TnpqeTk3NlhVc0h3czlYMjBQZz09', 2, 'RHdnU2pNc3FhcnRhaTV0Nks2WWU4Zz09', '1975-06-17', 0, 1, '2020-11-03', '16:18:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_device`
--

CREATE TABLE `user_device` (
  `idUserDevice` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `device` varchar(100) NOT NULL,
  `dateAccess` date NOT NULL,
  `timeAccess` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user_device`
--

INSERT INTO `user_device` (`idUserDevice`, `idUser`, `device`, `dateAccess`, `timeAccess`) VALUES
(11, 1, 'Linux; Android 10; SM-N9600', '2020-11-09', '09:48:39'),
(12, 10, 'Windows NT 6.3; Win64; x64', '2020-11-03', '13:41:15'),
(13, 11, 'Windows NT 6.3; Win64; x64', '2020-11-03', '14:18:45'),
(14, 1, 'Windows NT 10.0; Win64; x64', '2020-11-03', '16:09:53'),
(15, 12, 'Windows NT 10.0; Win64; x64', '2020-11-03', '16:18:03');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`idAddress`);

--
-- Índices para tabela `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idCart`);

--
-- Índices para tabela `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`idCartItem`);

--
-- Índices para tabela `freight`
--
ALTER TABLE `freight`
  ADD PRIMARY KEY (`idFreight`);

--
-- Índices para tabela `horary_prime`
--
ALTER TABLE `horary_prime`
  ADD PRIMARY KEY (`idHorary`);

--
-- Índices para tabela `layout`
--
ALTER TABLE `layout`
  ADD PRIMARY KEY (`idLayout`);

--
-- Índices para tabela `layout_color`
--
ALTER TABLE `layout_color`
  ADD PRIMARY KEY (`idLayoutColor`);

--
-- Índices para tabela `layout_footer`
--
ALTER TABLE `layout_footer`
  ADD PRIMARY KEY (`idLayoutFooter`);

--
-- Índices para tabela `layout_header`
--
ALTER TABLE `layout_header`
  ADD PRIMARY KEY (`idLayoutHeader`);

--
-- Índices para tabela `layout_info`
--
ALTER TABLE `layout_info`
  ADD PRIMARY KEY (`idLayoutInfo`);

--
-- Índices para tabela `mercato`
--
ALTER TABLE `mercato`
  ADD PRIMARY KEY (`idMercato`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrder`);

--
-- Índices para tabela `orders_status`
--
ALTER TABLE `orders_status`
  ADD PRIMARY KEY (`idOrderStatus`);

--
-- Índices para tabela `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`idPartner`);

--
-- Índices para tabela `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`idPayment`);

--
-- Índices para tabela `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`idPaymentType`);

--
-- Índices para tabela `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`idPromo`);

--
-- Índices para tabela `promotions_type`
--
ALTER TABLE `promotions_type`
  ADD PRIMARY KEY (`idPromoType`);

--
-- Índices para tabela `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`idSocial`);

--
-- Índices para tabela `social_type`
--
ALTER TABLE `social_type`
  ADD PRIMARY KEY (`idSocialType`);

--
-- Índices para tabela `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`idState`);

--
-- Índices para tabela `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`idStore`);

--
-- Índices para tabela `store_address`
--
ALTER TABLE `store_address`
  ADD PRIMARY KEY (`idStoreAddress`);

--
-- Índices para tabela `store_help`
--
ALTER TABLE `store_help`
  ADD PRIMARY KEY (`idStoreHelp`);

--
-- Índices para tabela `store_info`
--
ALTER TABLE `store_info`
  ADD PRIMARY KEY (`idStoreInfo`);

--
-- Índices para tabela `store_institutional`
--
ALTER TABLE `store_institutional`
  ADD PRIMARY KEY (`idStoreInstitutional`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Índices para tabela `user_device`
--
ALTER TABLE `user_device`
  ADD PRIMARY KEY (`idUserDevice`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `address`
--
ALTER TABLE `address`
  MODIFY `idAddress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `cart`
--
ALTER TABLE `cart`
  MODIFY `idCart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `idCartItem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT de tabela `freight`
--
ALTER TABLE `freight`
  MODIFY `idFreight` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `horary_prime`
--
ALTER TABLE `horary_prime`
  MODIFY `idHorary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `layout`
--
ALTER TABLE `layout`
  MODIFY `idLayout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `layout_color`
--
ALTER TABLE `layout_color`
  MODIFY `idLayoutColor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `layout_footer`
--
ALTER TABLE `layout_footer`
  MODIFY `idLayoutFooter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `layout_header`
--
ALTER TABLE `layout_header`
  MODIFY `idLayoutHeader` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `layout_info`
--
ALTER TABLE `layout_info`
  MODIFY `idLayoutInfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `mercato`
--
ALTER TABLE `mercato`
  MODIFY `idMercato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `orders_status`
--
ALTER TABLE `orders_status`
  MODIFY `idOrderStatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `partners`
--
ALTER TABLE `partners`
  MODIFY `idPartner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `payment`
--
ALTER TABLE `payment`
  MODIFY `idPayment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `idPaymentType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `promotions`
--
ALTER TABLE `promotions`
  MODIFY `idPromo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `promotions_type`
--
ALTER TABLE `promotions_type`
  MODIFY `idPromoType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `social`
--
ALTER TABLE `social`
  MODIFY `idSocial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `social_type`
--
ALTER TABLE `social_type`
  MODIFY `idSocialType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `states`
--
ALTER TABLE `states`
  MODIFY `idState` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `store`
--
ALTER TABLE `store`
  MODIFY `idStore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `store_address`
--
ALTER TABLE `store_address`
  MODIFY `idStoreAddress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `store_help`
--
ALTER TABLE `store_help`
  MODIFY `idStoreHelp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `store_info`
--
ALTER TABLE `store_info`
  MODIFY `idStoreInfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `store_institutional`
--
ALTER TABLE `store_institutional`
  MODIFY `idStoreInstitutional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `user_device`
--
ALTER TABLE `user_device`
  MODIFY `idUserDevice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
