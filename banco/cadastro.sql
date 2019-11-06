-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Jun-2019 às 00:32
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adotar`
--

CREATE TABLE `adotar` (
  `nome` varchar(20) NOT NULL,
  `dog` varchar(20) NOT NULL,
  `adotar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `adotar`
--

INSERT INTO `adotar` (`nome`, `dog`, `adotar`) VALUES
('Lorran', 'Berenice', 'Apadrinhar'),
('Ester', 'Bud', 'Adotar'),
('Ester', 'FelÃ­cia', 'Adotar'),
('JoÃ£o Pedro', 'Simba', 'Apadrinhar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `doar`
--

CREATE TABLE `doar` (
  `nome` varchar(20) NOT NULL,
  `ajuda` varchar(20) NOT NULL,
  `doar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `doar`
--

INSERT INTO `doar` (`nome`, `ajuda`, `doar`) VALUES
('ester', 'Tratamento medico', 888);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `sobrenome` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `participacao` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `senha`, `cidade`, `estado`, `participacao`) VALUES
(27, 'JoÃ£o Pedr', 'Cotrim', 'joaopedro@gmail.com', '123456', 'PindaÃ­', 'Bahia', 'Adotador');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adotar`
--
ALTER TABLE `adotar`
  ADD PRIMARY KEY (`dog`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
