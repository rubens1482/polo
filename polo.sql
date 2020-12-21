-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Set-2018 às 18:08
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_backupentrada`
--

CREATE TABLE `tb_backupentrada` (
  `id` int(5) NOT NULL,
  `matricula` int(20) NOT NULL,
  `tipo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `situacao` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `identidade` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `placa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `veiculo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dataentrada` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `horaentrada` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `horasaida` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cadastro`
--

CREATE TABLE `tb_cadastro` (
  `id` int(5) NOT NULL,
  `matricula` int(30) NOT NULL,
  `tipo` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `situacao` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `identidade` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `placa` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `veiculo` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `cidade` varchar(30) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `uf` char(2) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `empresa` varchar(30) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `datacadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foto` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_entrada`
--

CREATE TABLE `tb_entrada` (
  `id` int(5) NOT NULL,
  `matricula` int(20) NOT NULL,
  `tipo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `situacao` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `identidade` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `placa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `veiculo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dataentrada` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `horaentrada` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `horasaida` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(520) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `situacoe_id` int(11) NOT NULL DEFAULT '0',
  `niveis_acesso_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `situacoe_id`, `niveis_acesso_id`, `created`, `modified`) VALUES
(1, 'ADMINISTRADOR', 'adm@adm.com', '202cb962ac59075b964b07152d234b70', 1, 1, '2017-05-25 00:00:00', '2017-05-25 21:58:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_backupentrada`
--
ALTER TABLE `tb_backupentrada`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula` (`matricula`,`horasaida`);

--
-- Indexes for table `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identidade` (`identidade`),
  ADD UNIQUE KEY `id` (`id`,`tipo`,`nome`,`identidade`,`placa`,`veiculo`,`cidade`,`uf`,`empresa`),
  ADD UNIQUE KEY `tipo` (`tipo`,`nome`,`placa`,`veiculo`,`cidade`,`uf`,`empresa`),
  ADD UNIQUE KEY `matricula` (`matricula`);

--
-- Indexes for table `tb_entrada`
--
ALTER TABLE `tb_entrada`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula` (`matricula`,`horasaida`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_backupentrada`
--
ALTER TABLE `tb_backupentrada`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_cadastro`
--
ALTER TABLE `tb_cadastro`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_entrada`
--
ALTER TABLE `tb_entrada`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
