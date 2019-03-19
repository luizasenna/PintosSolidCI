-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 19-Mar-2019 às 10:50
-- Versão do servidor: 10.0.34-MariaDB
-- versão do PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site_solidci`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `baseantiga`
--

CREATE TABLE `baseantiga` (
  `CODIGO` varchar(72) DEFAULT NULL,
  `DESCRICAO` varchar(44) DEFAULT NULL,
  `MARCA` varchar(60) DEFAULT NULL,
  `NOSERIE` varchar(60) DEFAULT NULL,
  `MODELO` varchar(60) DEFAULT NULL,
  `ACESSORIO` char(60) DEFAULT NULL,
  `VOLTS` varchar(60) DEFAULT NULL,
  `NOTA_FISCAL` varchar(50) DEFAULT NULL,
  `FORNECEDOR` varchar(80) DEFAULT NULL,
  `D_COMPRA` varchar(30) DEFAULT NULL,
  `VALOR` varchar(60) DEFAULT NULL,
  `GARANTIA` varchar(44) DEFAULT NULL,
  `SETOR_LOJA` varchar(50) DEFAULT NULL,
  `SUBSTITUTO` varchar(80) DEFAULT NULL,
  `GARANTIACO` varchar(60) DEFAULT NULL,
  `DTQUEBRA` varchar(80) DEFAULT NULL,
  `IDACONSERTO` varchar(36) DEFAULT NULL,
  `VOLCONSERTO` varchar(44) DEFAULT NULL,
  `EMPRESA` varchar(60) DEFAULT NULL,
  `OBSERVACAO` text,
  `HISTORICO` text,
  `LOJA` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `baseantiga2`
--

CREATE TABLE `baseantiga2` (
  `CODIGO` varchar(72) DEFAULT NULL,
  `DESCRICAO` varchar(200) DEFAULT NULL,
  `MARCA` varchar(120) DEFAULT NULL,
  `NOSERIE` varchar(120) DEFAULT NULL,
  `MODELO` varchar(130) DEFAULT NULL,
  `ACESSORIO` char(200) DEFAULT NULL,
  `VOLTS` varchar(100) DEFAULT NULL,
  `NOTA_FISCAL` varchar(120) DEFAULT NULL,
  `FORNECEDOR` varchar(150) DEFAULT NULL,
  `D_COMPRA` tinytext,
  `VALOR` varchar(20) DEFAULT NULL,
  `GARANTIA` varchar(30) DEFAULT NULL,
  `SETOR_LOJA` varchar(100) DEFAULT NULL,
  `SUBSTITUTO` varchar(120) DEFAULT NULL,
  `GARANTIACO` varchar(70) DEFAULT NULL,
  `DTQUEBRA` text,
  `IDACONSERTO` varchar(80) DEFAULT NULL,
  `VOLCONSERTO` varchar(80) DEFAULT NULL,
  `EMPRESA` varchar(230) DEFAULT NULL,
  `OBSERVACAO` text,
  `HISTORICO` text,
  `LOJA` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(20) NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` int(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `id` int(8) NOT NULL,
  `descricao` varchar(255) CHARACTER SET latin1 NOT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `idgrupo` int(8) DEFAULT NULL,
  `datacompra` datetime DEFAULT NULL,
  `idorcador` int(8) DEFAULT NULL,
  `idaprovador` int(8) DEFAULT NULL,
  `idcadastro` int(8) DEFAULT NULL,
  `chaveserial` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `voltagem` int(11) DEFAULT NULL,
  `idfornecedor` int(11) DEFAULT NULL,
  `idmarca` int(11) DEFAULT NULL,
  `idloja` int(11) DEFAULT NULL,
  `idsetor` int(11) DEFAULT NULL,
  `nota` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `valorcompra` float DEFAULT NULL,
  `modelo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `codigobarras` int(11) DEFAULT NULL,
  `garantia` datetime DEFAULT NULL,
  `observacoes` text CHARACTER SET latin1,
  `status` int(11) DEFAULT NULL,
  `caracteristicas` text CHARACTER SET latin1,
  `usuariolocal` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `situacao` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `razaosocial` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `cnpj` int(15) DEFAULT NULL,
  `inscricaoestadual` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `logradouro` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `bairro` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `cidade` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `cep` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `observacoes` text CHARACTER SET latin1,
  `ddd1` int(11) DEFAULT NULL,
  `telefone1` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ddd2` int(11) DEFAULT NULL,
  `telefone2` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ddd3` int(11) DEFAULT NULL,
  `telefone3` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupoequipamento`
--

CREATE TABLE `grupoequipamento` (
  `id` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `obs` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historicoequipamento`
--

CREATE TABLE `historicoequipamento` (
  `id` int(11) NOT NULL,
  `idequipamento` int(11) DEFAULT NULL,
  `idsetor` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `observacao` text CHARACTER SET latin1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `idtipohistorico` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lojas`
--

CREATE TABLE `lojas` (
  `id` int(11) NOT NULL DEFAULT '0',
  `descricao` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `lojas`
--

INSERT INTO `lojas` (`id`, `descricao`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Magazine', 0, NULL, NULL),
(3, 'Riverside', 0, NULL, NULL),
(5, 'Rio Branco', 0, NULL, '2016-02-01 19:37:02'),
(6, 'Valter Alencar', 0, NULL, NULL),
(8, 'Calçados', 0, NULL, NULL),
(9, 'Frei Serafim', 0, NULL, NULL),
(10, 'Zequinha Freire', 0, NULL, NULL),
(11, 'Pintos Shopping', 0, NULL, NULL),
(12, 'Rio Poty', 0, NULL, '2016-01-29 13:26:38'),
(123, 'desc', 1, '2016-02-01 19:37:19', '2016-02-01 19:37:31'),
(999, 'Externo ', 0, '2016-12-22 17:36:03', '2016-12-22 17:36:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `observacoes` text CHARACTER SET latin1,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes`
--

CREATE TABLE `permissoes` (
  `id` int(20) NOT NULL,
  `nome` varchar(250) CHARACTER SET latin1 NOT NULL,
  `status` int(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

CREATE TABLE `setores` (
  `id` int(20) NOT NULL,
  `nome` varchar(250) CHARACTER SET latin1 NOT NULL,
  `andar` int(5) NOT NULL,
  `status` int(20) DEFAULT NULL,
  `idloja` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `setores`
--

INSERT INTO `setores` (`id`, `nome`, `andar`, `status`, `idloja`, `created_at`, `updated_at`) VALUES
(58, 'Caixas - FS', 0, 0, 9, NULL, NULL),
(14, 'Caixas - MG', 0, 0, 1, NULL, NULL),
(51, 'Caixas - PC', 0, 0, 8, NULL, NULL),
(44, 'Caixas - PR', 0, 0, 3, NULL, NULL),
(37, 'Caixas - PS', 0, 0, 11, NULL, NULL),
(26, 'Caixas - RB', 0, 0, 5, NULL, NULL),
(60, 'Cartão - FS', 0, 0, 9, NULL, NULL),
(16, 'Cartão - MG', 0, 0, 1, NULL, NULL),
(53, 'Cartão - PC', 0, 0, 8, NULL, NULL),
(46, 'Cartão - PR', 0, 0, 3, NULL, NULL),
(39, 'Cartão - PS', 0, 0, 11, NULL, NULL),
(28, 'Cartão - RB', 0, 0, 5, NULL, NULL),
(7, 'Centro de Informática - MG', 0, 0, 1, NULL, NULL),
(8, 'Centro de Informática - PS', 0, 0, 11, NULL, NULL),
(17, 'Cobrança - MG', 0, 0, 1, NULL, NULL),
(59, 'Crediário - FS', 0, 0, 9, NULL, NULL),
(15, 'Crediário - MG', 0, 0, 1, NULL, NULL),
(52, 'Crediário - PC', 0, 0, 8, NULL, NULL),
(45, 'Crediário - PR', 0, 0, 3, NULL, NULL),
(38, 'Crediário - PS', 0, 0, 11, NULL, NULL),
(27, 'Crediário - RB', 0, 0, 5, NULL, NULL),
(63, 'Depósito  - FS', 0, 0, 9, NULL, NULL),
(20, 'Depósito  - MG', 0, 0, 1, NULL, NULL),
(56, 'Depósito  - PC', 0, 0, 8, NULL, NULL),
(49, 'Depósito  - PR', 0, 0, 3, NULL, NULL),
(42, 'Depósito  - PS', 0, 0, 11, NULL, NULL),
(31, 'Depósito  - RB', 0, 0, 5, NULL, NULL),
(292, 'Diretoria Administrativa', 0, 0, 1, '2016-03-04 13:05:03', '2016-03-04 13:05:03'),
(293, 'Diretoria Comercial - MG', 0, 0, 1, '2016-03-04 13:05:18', '2016-03-04 13:05:37'),
(294, 'Diretoria Comercial - RB', 0, 0, 5, '2016-03-04 13:05:54', '2016-03-04 13:05:54'),
(61, 'Lista de Presentes - FS', 0, 0, 9, NULL, NULL),
(18, 'Lista de Presentes - MG', 0, 0, 1, NULL, NULL),
(54, 'Lista de Presentes - PC', 0, 0, 8, NULL, NULL),
(47, 'Lista de Presentes - PR', 0, 0, 3, NULL, NULL),
(40, 'Lista de Presentes - PS', 0, 0, 11, NULL, NULL),
(29, 'Lista de Presentes - RB', 0, 0, 5, NULL, NULL),
(6, 'teste2 - CD2', 0, 1, 10, '2016-02-20 17:06:28', '2016-02-20 17:07:02'),
(62, 'Trocas - FS', 0, 0, 9, NULL, NULL),
(19, 'Trocas - MG', 0, 0, 1, NULL, NULL),
(55, 'Trocas - PC', 0, 0, 8, NULL, NULL),
(48, 'Trocas - PR', 0, 0, 3, NULL, NULL),
(41, 'Trocas - PS', 0, 0, 11, NULL, NULL),
(30, 'Trocas - RB', 0, 0, 5, NULL, NULL),
(57, 'Vendas  - FS', 0, 0, 9, NULL, NULL),
(50, 'Vendas  - PC', 0, 0, 8, NULL, NULL),
(43, 'Vendas  - PR', 0, 0, 3, NULL, NULL),
(11, 'Vendas Calçados - MG', 0, 0, 1, NULL, NULL),
(34, 'Vendas Calçados - PS', 0, 0, 11, NULL, NULL),
(23, 'Vendas Calçados - RB', 0, 0, 5, NULL, NULL),
(13, 'Vendas Celulares - MG', 0, 0, 1, NULL, NULL),
(36, 'Vendas Celulares - PS', 0, 0, 11, NULL, NULL),
(25, 'Vendas Celulares - RB', 0, 0, 5, NULL, NULL),
(10, 'Vendas Confecção - MG', 0, 0, 1, NULL, NULL),
(33, 'Vendas Confecção - PS', 0, 0, 11, NULL, NULL),
(22, 'Vendas Confecção - RB', 0, 0, 5, NULL, NULL),
(12, 'Vendas Infantil - MG', 0, 0, 1, NULL, NULL),
(35, 'Vendas Infantil - PS', 0, 0, 11, NULL, NULL),
(24, 'Vendas Infantil - RB', 0, 0, 5, NULL, NULL),
(9, 'Vendas Móveis Eletro - MG', 0, 0, 1, NULL, NULL),
(32, 'Vendas Móveis Eletro - PS', 0, 0, 11, NULL, NULL),
(21, 'Vendas Móveis Eletro - RB', 0, 0, 5, NULL, NULL),
(296, 'Caixas - Rio Poty', 0, 0, 12, '2016-12-21 20:46:46', '2016-12-29 17:32:22'),
(297, 'Cartao - Rio Poty', 0, 0, 12, '2016-12-21 20:48:11', '2016-12-29 17:32:47'),
(298, 'Troca - Rio poty', 0, 0, 12, '2016-12-21 20:48:26', '2016-12-29 17:33:07'),
(299, 'Vendas - Rio poty', 0, 0, 12, '2016-12-21 20:48:47', '2016-12-29 17:33:25'),
(300, 'Vendas Celulares - Rio Poty', 0, 0, 12, '2016-12-21 20:49:08', '2016-12-29 17:33:47'),
(301, 'Monitoramento - Rio Poty', 0, 0, 12, '2016-12-21 20:49:26', '2016-12-29 17:34:12'),
(302, 'Gerencia - Rio Poty', 0, 0, 12, '2016-12-21 20:49:40', '2016-12-29 17:34:35'),
(303, 'Deposito - Rio Poty', 0, 0, 12, '2016-12-21 20:49:56', '2016-12-29 17:34:58'),
(304, 'Assistência Técnica', 0, 0, 999, '2016-12-22 17:36:30', '2016-12-22 17:36:30'),
(305, 'Financeiro - MG', 0, 0, 1, '2016-12-28 13:06:59', '2016-12-28 13:09:23'),
(306, 'Contabilidade - MG', 0, 0, 1, '2016-12-28 13:07:19', '2016-12-28 13:09:53'),
(307, 'RH', 0, 0, 1, '2016-12-28 13:34:54', '2016-12-28 13:34:54'),
(308, 'Recursos Humanos - MG', 0, 0, 1, '2016-12-28 13:35:23', '2016-12-28 13:35:23'),
(309, 'Almoxarifado - VA', 0, 0, 1, '2016-12-28 13:36:52', '2016-12-28 13:36:52'),
(310, 'CD02', 0, 0, 10, '2016-12-28 13:38:31', '2016-12-28 13:38:31'),
(311, 'Comercial - VA', 0, 0, 6, '2016-12-28 13:40:51', '2016-12-28 13:40:51'),
(312, 'CD01', 0, 0, 10, '2016-12-29 14:38:24', '2016-12-29 14:38:24'),
(313, 'Depósito - ZF', 0, 0, 10, '2016-12-30 17:03:54', '2016-12-30 17:03:54'),
(314, 'Recepção/Telefonista - MG', 0, 0, 1, '2016-12-30 20:21:08', '2016-12-30 20:21:08'),
(315, 'Sucata', 0, 0, 1, '2017-01-02 13:39:54', '2017-01-02 13:39:54'),
(316, 'Infantil  - MG', 0, 0, 1, '2017-01-02 13:55:54', '2017-01-02 13:55:54'),
(317, 'Infantil - RB', 0, 0, 5, '2017-01-02 14:01:01', '2017-01-02 14:01:01'),
(318, 'Comercial - ZF', 0, 0, 10, '2017-01-02 14:04:26', '2017-01-02 14:04:26'),
(319, 'Comercial - MG', 0, 0, 1, '2017-01-02 14:10:19', '2017-01-02 14:10:19'),
(320, 'Reserva', 0, 0, 1, '2017-01-02 15:18:02', '2017-01-02 15:18:02'),
(321, 'Tesouraria - MG', 0, 0, 1, '2017-01-02 19:47:17', '2017-01-02 19:47:17'),
(322, 'Depósito  - VA', 0, 0, 6, '2017-01-04 12:25:28', '2017-01-04 12:25:28'),
(323, 'Centro de Informática - PS', 0, 0, 11, '2017-01-04 16:37:45', '2017-01-04 16:37:45'),
(324, 'Almoxarifado - MG', 0, 0, 1, '2017-01-04 17:05:54', '2017-01-04 17:05:54'),
(325, 'Vendas - PS', 0, 0, 11, '2017-01-04 17:59:17', '2017-01-04 17:59:17'),
(326, 'Vendas - RB', 0, 0, 5, '2017-01-04 18:26:47', '2017-01-04 18:27:24'),
(327, 'Vendas - MG', 0, 0, 1, '2017-01-04 19:40:12', '2017-01-04 19:40:12'),
(328, 'Vendas Celulares - PC', 0, 0, 8, '2017-01-05 17:58:35', '2017-01-05 17:58:35'),
(329, 'SPC - PR', 0, 0, 3, '2017-01-06 15:50:01', '2017-01-06 15:50:01'),
(330, 'Galpão - ZF', 0, 0, 10, '2017-01-07 16:26:50', '2017-03-02 12:11:28'),
(331, 'Escritório - VA', 0, 0, 6, '2017-01-12 14:43:38', '2017-01-12 14:43:38'),
(332, 'Térreo - MG', 0, 0, 1, '2017-01-13 12:08:01', '2017-01-13 12:08:01'),
(333, 'Apoio - MG', 0, 0, 1, '2017-01-13 15:18:26', '2017-01-13 15:18:26'),
(334, 'Administração  - PS', 0, 0, 11, '2017-01-16 13:55:24', '2017-01-16 13:55:24'),
(335, 'Sala de reunião - MG', 0, 0, 1, '2017-01-31 13:25:26', '2017-01-31 13:25:26'),
(336, 'EAC', 0, 0, 999, '2017-02-03 12:49:28', '2017-02-03 12:49:28'),
(337, 'Gerência Administrativa  - MG', 0, 0, 1, '2017-03-13 12:07:42', '2017-03-13 12:07:42'),
(338, 'Gerência Eletro - MG', 0, 0, 1, '2017-03-13 12:14:40', '2017-03-13 12:14:40'),
(339, 'Galpão - VA', 0, 0, 6, '2017-03-24 12:41:53', '2017-03-24 12:41:53'),
(340, 'Dep.Calçados  - MG', 0, 0, 1, '2017-04-07 13:10:15', '2017-04-07 13:10:15'),
(341, 'Caixa - ZF', 0, 0, 1, '2017-04-10 12:27:30', '2017-04-10 12:27:30'),
(342, 'Secretaria Administrativa - MG', 0, 0, 1, '2017-04-12 12:37:18', '2017-04-12 12:37:18'),
(343, 'Caixas 1º andar - RB', 0, 0, 5, '2017-04-18 12:56:23', '2017-04-18 12:56:23'),
(344, 'Vendas 2º andar - MG', 0, 0, 1, '2017-04-19 12:41:41', '2017-04-19 12:41:41'),
(345, 'Análise - PC', 0, 0, 8, '2017-05-04 14:40:51', '2017-05-04 14:40:51'),
(346, 'Entrega - ZF', 0, 0, 10, '2017-05-11 12:45:50', '2017-05-11 12:45:50'),
(347, 'Doado', 0, 0, 999, '2017-05-13 14:59:07', '2017-05-13 14:59:07'),
(348, 'Escritório - ZF', 0, 0, 10, '2017-06-01 16:55:22', '2017-06-01 16:55:22'),
(349, 'Comercial - RB', 0, 0, 5, '2017-06-03 15:49:09', '2017-06-03 15:49:09'),
(350, 'Central telefônica - VA', 0, 0, 6, '2017-06-14 12:34:47', '2017-06-14 12:34:47'),
(351, 'Vendas Móveis Eletro - FS', 0, 0, 9, '2017-06-29 15:54:07', '2017-06-29 15:54:07'),
(352, 'CI - Desenvolvimento - MG', 0, 0, 1, '2017-08-12 12:27:13', '2017-08-12 12:27:13'),
(353, 'Administração - MG', 0, 0, 1, '2017-08-26 13:23:58', '2017-08-26 13:23:58'),
(354, 'Estacionamento - PS', 0, 0, 11, '2017-09-28 14:22:47', '2017-09-28 14:22:47'),
(355, 'Sala dos Gerentes - MG', 0, 0, 1, '2017-09-29 14:14:20', '2017-09-29 14:14:20'),
(356, 'Sala de Switch/Nobreak 2º andar - MG', 0, 0, 1, '2017-10-14 12:42:28', '2018-10-25 12:53:13'),
(357, 'Relógio de Ponto - RB', 0, 0, 5, '2017-10-16 14:56:50', '2017-10-16 14:56:50'),
(358, 'RAD  - ZF', 0, 0, 10, '2017-11-23 13:11:53', '2017-11-23 13:11:53'),
(359, 'Recepção  - ZF', 0, 0, 10, '2017-12-20 11:22:37', '2017-12-20 11:22:37'),
(360, 'Utilidades MG', 0, 0, 1, '2018-06-04 13:12:35', '2018-06-04 13:13:04'),
(361, 'Utilidades RB', 0, 0, 5, '2018-06-04 13:12:45', '2018-06-04 13:12:45'),
(362, 'Avaria - V.A ', 0, 0, 6, '2018-06-04 13:20:18', '2018-06-04 13:21:27'),
(363, 'Depósito Eletro - RB', 0, 0, 5, '2018-10-08 13:18:17', '2018-10-08 13:18:17'),
(364, 'Depósito Utilidade - PS', 0, 0, 11, '2018-10-08 13:49:09', '2018-10-08 13:49:09'),
(365, 'Depósito Eletro - PS', 0, 0, 11, '2018-10-08 13:49:55', '2018-10-08 13:49:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setoresaux`
--

CREATE TABLE `setoresaux` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `andar` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `idloja` int(11) DEFAULT NULL,
  `cretaed_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `setoresaux`
--

INSERT INTO `setoresaux` (`id`, `nome`, `andar`, `status`, `idloja`, `cretaed_at`, `updated_at`) VALUES
(58, 'Caixas - FS', 0, 0, 9, NULL, NULL),
(14, 'Caixas - MG', 0, 0, 1, NULL, NULL),
(51, 'Caixas - PC', 0, 0, 8, NULL, NULL),
(44, 'Caixas - PR', 0, 0, 3, NULL, NULL),
(37, 'Caixas - PS', 0, 0, 11, NULL, NULL),
(26, 'Caixas - RB', 0, 0, 5, NULL, NULL),
(60, 'Cartão - FS', 0, 0, 9, NULL, NULL),
(16, 'Cartão - MG', 0, 0, 1, NULL, NULL),
(53, 'Cartão - PC', 0, 0, 8, NULL, NULL),
(46, 'Cartão - PR', 0, 0, 3, NULL, NULL),
(39, 'Cartão - PS', 0, 0, 11, NULL, NULL),
(28, 'Cartão - RB', 0, 0, 5, NULL, NULL),
(7, 'Centro de Informática - MG', 0, 0, 1, NULL, NULL),
(8, 'Centro de Informática - PS', 0, 0, 11, NULL, NULL),
(17, 'Cobrança - MG', 0, 0, 1, NULL, NULL),
(59, 'Crediário - FS', 0, 0, 9, NULL, NULL),
(15, 'Crediário - MG', 0, 0, 1, NULL, NULL),
(52, 'Crediário - PC', 0, 0, 8, NULL, NULL),
(45, 'Crediário - PR', 0, 0, 3, NULL, NULL),
(38, 'Crediário - PS', 0, 0, 11, NULL, NULL),
(27, 'Crediário - RB', 0, 0, 5, NULL, NULL),
(63, 'Depósito  - FS', 0, 0, 9, NULL, NULL),
(20, 'Depósito  - MG', 0, 0, 1, NULL, NULL),
(56, 'Depósito  - PC', 0, 0, 8, NULL, NULL),
(49, 'Depósito  - PR', 0, 0, 3, NULL, NULL),
(42, 'Depósito  - PS', 0, 0, 11, NULL, NULL),
(31, 'Depósito  - RB', 0, 0, 5, NULL, NULL),
(292, 'Diretoria Administrativa', 0, 0, 1, '2016-03-04 18:05:03', '2016-03-04 18:05:03'),
(293, 'Diretoria Comercial - MG', 0, 0, 1, '2016-03-04 18:05:18', '2016-03-04 18:05:37'),
(294, 'Diretoria Comercial - RB', 0, 0, 5, '2016-03-04 18:05:54', '2016-03-04 18:05:54'),
(61, 'Lista de Presentes - FS', 0, 0, 9, NULL, NULL),
(18, 'Lista de Presentes - MG', 0, 0, 1, NULL, NULL),
(54, 'Lista de Presentes - PC', 0, 0, 8, NULL, NULL),
(47, 'Lista de Presentes - PR', 0, 0, 3, NULL, NULL),
(40, 'Lista de Presentes - PS', 0, 0, 11, NULL, NULL),
(29, 'Lista de Presentes - RB', 0, 0, 5, NULL, NULL),
(6, 'teste2 - CD2', 0, 1, 10, '2016-02-20 22:06:28', '2016-02-20 22:07:02'),
(62, 'Trocas - FS', 0, 0, 9, NULL, NULL),
(19, 'Trocas - MG', 0, 0, 1, NULL, NULL),
(55, 'Trocas - PC', 0, 0, 8, NULL, NULL),
(48, 'Trocas - PR', 0, 0, 3, NULL, NULL),
(41, 'Trocas - PS', 0, 0, 11, NULL, NULL),
(30, 'Trocas - RB', 0, 0, 5, NULL, NULL),
(57, 'Vendas  - FS', 0, 0, 9, NULL, NULL),
(50, 'Vendas  - PC', 0, 0, 8, NULL, NULL),
(43, 'Vendas  - PR', 0, 0, 3, NULL, NULL),
(11, 'Vendas Calçados - MG', 0, 0, 1, NULL, NULL),
(34, 'Vendas Calçados - PS', 0, 0, 11, NULL, NULL),
(23, 'Vendas Calçados - RB', 0, 0, 5, NULL, NULL),
(13, 'Vendas Celulares - MG', 0, 0, 1, NULL, NULL),
(36, 'Vendas Celulares - PS', 0, 0, 11, NULL, NULL),
(25, 'Vendas Celulares - RB', 0, 0, 5, NULL, NULL),
(10, 'Vendas Confecção - MG', 0, 0, 1, NULL, NULL),
(33, 'Vendas Confecção - PS', 0, 0, 11, NULL, NULL),
(22, 'Vendas Confecção - RB', 0, 0, 5, NULL, NULL),
(12, 'Vendas Infantil - MG', 0, 0, 1, NULL, NULL),
(35, 'Vendas Infantil - PS', 0, 0, 11, NULL, NULL),
(24, 'Vendas Infantil - RB', 0, 0, 5, NULL, NULL),
(9, 'Vendas Móveis Eletro - MG', 0, 0, 1, NULL, NULL),
(32, 'Vendas Móveis Eletro - PS', 0, 0, 11, NULL, NULL),
(21, 'Vendas Móveis Eletro - RB', 0, 0, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `taggable_taggables`
--

CREATE TABLE `taggable_taggables` (
  `tag_id` int(11) NOT NULL,
  `taggable_id` int(10) UNSIGNED NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `taggable_tags`
--

CREATE TABLE `taggable_tags` (
  `tag_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `normalized` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipohistorico`
--

CREATE TABLE `tipohistorico` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` int(11) DEFAULT NULL,
  `info` text CHARACTER SET latin1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` int(11) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bio` text COLLATE utf8_unicode_ci,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `visaoEquipamentos`
-- (See below for the actual view)
--
CREATE TABLE `visaoEquipamentos` (
`id` int(8)
,`descricao` varchar(255)
,`status` int(11)
,`idcategoria` int(11)
,`idgrupo` int(8)
,`idloja` int(11)
,`idsetor` int(11)
,`modelo` varchar(255)
,`idmarca` int(11)
,`chaveserial` varchar(255)
,`nota` varchar(255)
,`idtipohistorico` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `visaoEquipamentos`
--
DROP TABLE IF EXISTS `visaoEquipamentos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`site`@`%` SQL SECURITY DEFINER VIEW `visaoEquipamentos`  AS  select `e`.`id` AS `id`,`e`.`descricao` AS `descricao`,`e`.`status` AS `status`,`e`.`idcategoria` AS `idcategoria`,`e`.`idgrupo` AS `idgrupo`,`e`.`idloja` AS `idloja`,`e`.`idsetor` AS `idsetor`,`e`.`modelo` AS `modelo`,`e`.`idmarca` AS `idmarca`,`e`.`chaveserial` AS `chaveserial`,`e`.`nota` AS `nota`,`h`.`idtipohistorico` AS `idtipohistorico` from (`equipamentos` `e` left join `historicoequipamento` `h` on((`e`.`id` = `h`.`idequipamento`))) where ((`e`.`status` = 0) and ((`h`.`status` = 0) or isnull(`h`.`status`))) order by `e`.`id` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupoequipamento`
--
ALTER TABLE `grupoequipamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `historicoequipamento`
--
ALTER TABLE `historicoequipamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lojas`
--
ALTER TABLE `lojas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setoresaux`
--
ALTER TABLE `setoresaux`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taggable_taggables`
--
ALTER TABLE `taggable_taggables`
  ADD KEY `taggable_taggables_taggable_id_index` (`taggable_id`);

--
-- Indexes for table `taggable_tags`
--
ALTER TABLE `taggable_tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `tipohistorico`
--
ALTER TABLE `tipohistorico`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grupoequipamento`
--
ALTER TABLE `grupoequipamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historicoequipamento`
--
ALTER TABLE `historicoequipamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setores`
--
ALTER TABLE `setores`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT for table `setoresaux`
--
ALTER TABLE `setoresaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `taggable_tags`
--
ALTER TABLE `taggable_tags`
  MODIFY `tag_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipohistorico`
--
ALTER TABLE `tipohistorico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
