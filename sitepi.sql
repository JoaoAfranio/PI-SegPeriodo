-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Nov-2017 às 00:48
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

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
(1, 'joao', 'joaoafraniorosa@hotmail.com', 123456, 'protetico', 'Joao Afranio Silva Rosa', '1999-05-20', 'masculino', 99999, 38780, 'Avenida Paracatu', 386, 'fonfon', 'Centro', 'MG', 'Vazante'),
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
  `protetico_resp` varchar(500) NOT NULL,
  `valor_medio` int(10) NOT NULL,
  `estado` varchar(500) NOT NULL,
  `data_entrega` date NOT NULL,
  `disponibilidade2` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `trabalho`, `sexo`, `idade_paciente`, `num_dente`, `cor_dente`, `obs`, `dentista`, `disponibilidade`, `protetico_resp`, `valor_medio`, `estado`, `data_entrega`, `disponibilidade2`) VALUES
(19, 'Montagem no Articulador', 'Masculino', '21', '11', 'amarelo12', '', 'Ruan Lala Tete', 'Pronto', 'Joao Afranio Silva Rosa', 0, 'MG', '2017-12-19', 'Aceito'),
(20, 'Elemento Ponte Fixa', 'Masculino', '41', '17', 'amarelo 25', 'alo molieres', 'Ruan Lala Tete', 'Pronto', 'Joao Afranio Silva Rosa', 600, 'MG', '2017-12-20', 'Aceito'),
(23, 'Elemento Ponte Fixa', 'Masculino', '35', '18', 'branco 7', '', 'Ruan Lala Tete', 'Pronto', 'Joao Afranio Silva Rosa', 100, 'MG', '2017-12-20', 'Aceito'),
(24, 'Elemento Ponte Fixa', 'Masculino', '96', '45', 'branco99', 'frehtjh', 'Ruan Lala Tete', 'Em Andamento', 'Joao Afranio Silva Rosa', 877, 'MG', '2017-12-20', 'Aceito');

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
