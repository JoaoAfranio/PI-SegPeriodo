-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Nov-2017 às 13:51
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitepi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `login` varchar(535) NOT NULL,
  `email` varchar(535) NOT NULL,
  `senha` int(11) NOT NULL,
  `trabalho` varchar(535) NOT NULL,
  `nome` varchar(535) NOT NULL,
  `aniversario` date NOT NULL,
  `sexo` varchar(535) NOT NULL,
  `telefone` int(20) NOT NULL,
  `CEP` int(20) NOT NULL,
  `logradouro` varchar(535) NOT NULL,
  `numero` int(20) NOT NULL,
  `complemento` varchar(535) NOT NULL,
  `bairro` varchar(535) NOT NULL,
  `estado` varchar(535) NOT NULL,
  `cidade` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `login`, `email`, `senha`, `trabalho`, `nome`, `aniversario`, `sexo`, `telefone`, `CEP`, `logradouro`, `numero`, `complemento`, `bairro`, `estado`, `cidade`) VALUES
(1, 'joao', 'joaoafraniorosa@hotmail.com', 123456, 'protetico', 'Joao Afranio Silva Rosa', '1999-05-20', 'masculino', 99999, 38780, 'Avenida Paracatu', 386, '', 'Centro', 'MG', 'Vazante'),
(2, 'joaoantonio', 'Joaoantonio@hotmail.com', 123456, 'protetico', 'Joao Antonio Fulano', '1950-02-16', 'masculino', 99999999, 387801120, 'Seila Mano', 40, 'Tambem Nao Sei', 'Centro', 'MG', 'Patos de Minas'),
(3, 'ruan', 'ruan@hotmail.com', 123456, 'dentista', 'Ruan Lala Tete', '2017-10-11', 'masculino', 2147483647, 3878778, 'Avenida X', 586, 'Apt 305', 'Centro', 'MG', 'Patos de Minas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(50) NOT NULL,
  `trabalho` varchar(100) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `idade_paciente` varchar(50) NOT NULL,
  `num_dente` varchar(50) NOT NULL,
  `cor_dente` varchar(50) NOT NULL,
  `obs` varchar(500) NOT NULL,
  `dentista` varchar(500) NOT NULL,
  `disponibilidade` varchar(400) NOT NULL,
  `protetico_resp` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `trabalho`, `sexo`, `idade_paciente`, `num_dente`, `cor_dente`, `obs`, `dentista`, `disponibilidade`, `protetico_resp`) VALUES
(1, 'e.p.f', 'masculino', '18', '13', '1B', 'Sem Observacoes', '', '', ''),
(4, 'coroa.j.p', 'feminino', '25', '42', '2B', '-', '', '', ''),
(8, 'nucleo.d', 'feminino', '18', '27', '20', '', '', '', ''),
(9, 'nucleo.d', 'feminino', '18', '17', '2b', '', '', '', ''),
(10, 'copiny.r', 'masculino', '23', '18', '2n', '', '', '', ''),
(11, 'r.m', 'feminino', '23', '18', '32', '', 'joao', '', ''),
(12, 'coroav', 'feminino', '32', '17', '2b', '-', 'ruan', '', ''),
(13, 'nucleo.i', 'feminino', '25', '16', '2b', '', 'ruan', 'Aberto', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
