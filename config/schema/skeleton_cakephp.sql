-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 18/07/2015 às 12:56
-- Versão do servidor: 5.5.43-0ubuntu0.14.04.1-log
-- Versão do PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `skeleton_cakephp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `locale` varchar(6) NOT NULL,
  `date` date NOT NULL,
  `calendar` datetime NOT NULL,
  `hour` time NOT NULL,
  `currency` decimal(10,2) NOT NULL,
  `numeral` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `oauth_provider` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `oauth_uid` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `locale` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'pt_BR',
  `role` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `activation` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `auth_token` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `oauth_provider`, `oauth_uid`, `locale`, `role`, `activation`, `auth_token`, `status`, `created`, `modified`) VALUES
(1, 'Jorge', 'jorge@jorgejardim.com.br', 'jorge@jorgejardim.com.br', 'Hs@|dDRyNXpqag==', 'oauth-provider', 'oauth-uid', 'pt_BR', 'root', NULL, NULL, 1, '2015-05-30 07:16:18', '2015-07-17 03:10:21');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `oauth_uid` (`oauth_uid`), ADD KEY `password` (`password`), ADD KEY `oauth_provider` (`oauth_provider`), ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
