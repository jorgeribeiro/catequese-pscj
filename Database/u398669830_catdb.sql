-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2017 at 04:49 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u398669830_catdb`
--
CREATE DATABASE IF NOT EXISTS `u398669830_catdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `u398669830_catdb`;

-- --------------------------------------------------------

--
-- Table structure for table `catequizando`
--

DROP TABLE IF EXISTS `catequizando`;
CREATE TABLE IF NOT EXISTS `catequizando` (
  `idCatequizando` int(11) NOT NULL AUTO_INCREMENT,
  `fk_idUsuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nascimento` datetime NOT NULL,
  `naturalidade` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `estudante` tinyint(4) DEFAULT NULL,
  `instituicao` varchar(45) DEFAULT NULL,
  `databatismo` datetime DEFAULT NULL,
  `paroquiabatismo` varchar(45) DEFAULT NULL,
  `batismo` tinyint(4) NOT NULL,
  `eucaristia` tinyint(4) NOT NULL,
  PRIMARY KEY (`idCatequizando`),
  UNIQUE KEY `fk_idUser` (`fk_idUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `catequizando`:
--   `fk_idUsuario`
--       `usuario` -> `idUsuario`
--

-- --------------------------------------------------------

--
-- Table structure for table `encontro`
--

DROP TABLE IF EXISTS `encontro`;
CREATE TABLE IF NOT EXISTS `encontro` (
  `idEncontro` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `tema` varchar(100) NOT NULL,
  PRIMARY KEY (`idEncontro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `encontro`:
--

-- --------------------------------------------------------

--
-- Table structure for table `frequencia`
--

DROP TABLE IF EXISTS `frequencia`;
CREATE TABLE IF NOT EXISTS `frequencia` (
  `fk_idCatequizando` int(11) NOT NULL,
  `fk_idEncontro` int(11) NOT NULL,
  `presente` tinyint(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `fk_idCatequizando` (`fk_idCatequizando`),
  UNIQUE KEY `fk_idEncontro` (`fk_idEncontro`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `frequencia`:
--   `fk_idCatequizando`
--       `catequizando` -> `idCatequizando`
--   `fk_idEncontro`
--       `encontro` -> `idEncontro`
--

-- --------------------------------------------------------

--
-- Table structure for table `responsaveis`
--

DROP TABLE IF EXISTS `responsaveis`;
CREATE TABLE IF NOT EXISTS `responsaveis` (
  `fk_idCatequizando` int(11) NOT NULL,
  `nomepai` varchar(100) DEFAULT NULL,
  `nomemae` varchar(100) DEFAULT NULL,
  `telefonepai` varchar(45) DEFAULT NULL,
  `telefonemae` varchar(45) DEFAULT NULL,
  `telefonecasa` varchar(45) DEFAULT NULL,
  `paiscasados` tinyint(4) DEFAULT NULL,
  `paroquiacasamento` varchar(45) DEFAULT NULL,
  `vivemjuntos` tinyint(4) DEFAULT NULL,
  `frequentamparoquia` tinyint(4) DEFAULT NULL,
  `participamparoquia` tinyint(4) DEFAULT NULL,
  `participacaoparoquia` varchar(45) DEFAULT NULL,
  `frenquentamoutraparoquia` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `responsaveis`:
--   `fk_idCatequizando`
--       `catequizando` -> `idCatequizando`
--

-- --------------------------------------------------------

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `idTurma` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(45) NOT NULL,
  `dia` varchar(45) NOT NULL,
  `turno` varchar(45) NOT NULL,
  `ano_inicio` int(11) NOT NULL,
  `turma_ativa` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idTurma`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `turma`:
--

--
-- Dumping data for table `turma`
--

INSERT INTO `turma` (`idTurma`, `nivel`, `dia`, `turno`, `ano_inicio`, `turma_ativa`) VALUES
(1, 'Crisma', 'Sábado', 'Manhã', 2017, 1),
(2, 'Crisma', 'Sábado', 'Tarde', 2017, 1),
(3, 'Eucaristia', 'Sábado', 'Manhã', 2017, 1),
(4, 'Eucaristia', 'Sábado', 'Tarde', 2016, 1),
(5, 'Crisma', 'Sábado', 'Tarde', 2016, 1),
(6, 'Pré-iniciação', 'Sábado', 'Manhã', 2016, 1),
(7, 'Adultos', 'Sábado', 'Noite', 2017, 1),
(8, 'Iniciação', 'Sábado', 'Manhã', 2016, 1),
(9, 'Perseverança', 'Sábado', 'Tarde', 2017, 1),
(10, 'Eucaristia', 'Sábado', 'Tarde', 2017, 1);

-- --------------------------------------------------------

--
-- Table structure for table `turma_catequista`
--

DROP TABLE IF EXISTS `turma_catequista`;
CREATE TABLE IF NOT EXISTS `turma_catequista` (
  `fk_idTurma` int(11) NOT NULL,
  `fk_idCatequista` int(11) NOT NULL,
  UNIQUE KEY `fk_idTurma` (`fk_idTurma`,`fk_idCatequista`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `turma_catequista`:
--   `fk_idCatequista`
--       `usuario` -> `idUsuario`
--   `fk_idTurma`
--       `turma` -> `idTurma`
--

-- --------------------------------------------------------

--
-- Table structure for table `turma_catequizando`
--

DROP TABLE IF EXISTS `turma_catequizando`;
CREATE TABLE IF NOT EXISTS `turma_catequizando` (
  `fk_idTurma` int(11) NOT NULL,
  `fk_idCatequizando` int(11) NOT NULL,
  UNIQUE KEY `fk_idTurma` (`fk_idTurma`,`fk_idCatequizando`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `turma_catequizando`:
--   `fk_idCatequizando`
--       `catequizando` -> `idCatequizando`
--   `fk_idTurma`
--       `turma` -> `idTurma`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `fk_idTurma` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `usuario`:
--   `fk_idTurma`
--       `turma` -> `idTurma`
--

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `email`, `senha`, `admin`, `fk_idTurma`, `status`) VALUES
(2, 'Allana Silva', 'allana@gmail.com', '$2y$10$jo5c1Bb/wBagUpsrYDyx.eCYRmHkH7NLaFJndO5huOhx0TIr2L82q', 1, 5, 1),
(1, 'Jorge Ribeiro', 'joorgemelo@gmail.com', '$2y$10$vfPS3fuNwrrL9YQoISjbP.gjT5Ds4hsyFOmeg7lO/OCUx73G1Xix6', 1, 2, 1),
(3, 'Sammyra Garcia', 'garciasammyra@gmail.com', '$2y$10$yIlB6q2Whe6lx.hqv2xGBeaZ6Q9sPhmqjPg/yQOhJd9k5ZLfJivRW', 1, 1, 1),
(4, 'Matheus Soares', 'matheus@gmail.com', '$2y$10$w24USiYQWVMhROU0gNSSUOJ8zvtEnHfpFGtDFzlyPkX1q8aK.y8oK', 0, 5, 1),
(5, 'Nathalia Pinheiro', 'nathalia@gmail.com', '$2y$10$fMYjTRcgqhtgS358kny9HezyplW5sCam0M0SZb7.s1EGtGn2kAOaa', 0, 6, 1),
(6, 'Antônio José', 'antoniojose@gmail.com', '$2y$10$DAeWL8YBgEkDakiVzAOEG.sZDv/Qh5fB3Pn4oLhOceKBkV.fNnPWq', 0, 7, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
