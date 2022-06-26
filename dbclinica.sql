-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jun-2022 às 22:18
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

CREATE DATABASE dbClinica;
USE dbClinica;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbclinica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbagenda`
--

CREATE TABLE `tbagenda` (
  `idAgenda` int(11) NOT NULL,
  `dtAgenda` date NOT NULL,
  `horaAgenda` time DEFAULT NULL,
  `idProfissional` int(11) DEFAULT NULL,
  `idPaciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpaciente`
--

CREATE TABLE `tbpaciente` (
  `idPaciente` int(11) NOT NULL,
  `nomePaciente` varchar(200) NOT NULL,
  `cpfPaciente` char(14) NOT NULL,
  `rgPaciente` char(13) NOT NULL,
  `dataNasc` date NOT NULL,
  `emailPaciente` varchar(200) DEFAULT NULL,
  `telefonePaciente` char(14) DEFAULT NULL,
  `celPaciente` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Estrutura da tabela `tbprofissional`
--

CREATE TABLE `tbprofissional` (
  `idProfissional` int(11) NOT NULL,
  `cpfProfissional` char(14) NOT NULL,
  `rgProfissional` char(13) NOT NULL,
  `nomeProfissional` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbagenda`
--
ALTER TABLE `tbagenda`
  ADD PRIMARY KEY (`idAgenda`),
  ADD KEY `idProfissional` (`idProfissional`),
  ADD KEY `idPaciente` (`idPaciente`);

--
-- Índices para tabela `tbpaciente`
--
ALTER TABLE `tbpaciente`
  ADD PRIMARY KEY (`idPaciente`);

--
-- Índices para tabela `tbprofissional`
--
ALTER TABLE `tbprofissional`
  ADD PRIMARY KEY (`idProfissional`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbagenda`
--
ALTER TABLE `tbagenda`
  MODIFY `idAgenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbpaciente`
--
ALTER TABLE `tbpaciente`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tbprofissional`
--
ALTER TABLE `tbprofissional`
  MODIFY `idProfissional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbagenda`
--
/*
ALTER TABLE `tbagenda`
  ADD CONSTRAINT `tbagenda_ibfk_1` FOREIGN KEY (`idProfissional`) REFERENCES `tbprofissional` (`idProfissional`),
  ADD CONSTRAINT `tbagenda_ibfk_2` FOREIGN KEY (`idPaciente`) REFERENCES `tbpaciente` (`idPaciente`);
COMMIT;
*/
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
