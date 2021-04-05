-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Abr-2021 às 01:09
-- Versão do servidor: 10.3.15-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jkphp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `data_cadastro` date NOT NULL,
  `usuario_fk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `celular`, `data_cadastro`, `usuario_fk`) VALUES
(24, 'lucas teste 3', '44999739474', '2020-11-27', 'carlos'),
(27, 'marilia menez', '44997654321', '2020-11-25', 'james');

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacao`
--

CREATE TABLE `locacao` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `celular2` varchar(15) NOT NULL,
  `endereco` varchar(120) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `data_entrega` date NOT NULL,
  `data_retirada` date NOT NULL,
  `qtd_litro` int(11) NOT NULL,
  `consignado` int(11) NOT NULL,
  `observacao` varchar(250) NOT NULL,
  `usuario_fk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `locacao`
--

INSERT INTO `locacao` (`id`, `nome`, `celular`, `celular2`, `endereco`, `bairro`, `numero`, `data_entrega`, `data_retirada`, `qtd_litro`, `consignado`, `observacao`, `usuario_fk`) VALUES
(9, 'teste 10', '44987453212', '', 'rua minas', 'olimpico', '325', '2021-03-31', '2021-04-01', 50, 30, 'teste', 'james');

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacao_realizada`
--

CREATE TABLE `locacao_realizada` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `celular2` varchar(15) NOT NULL,
  `endereco` varchar(120) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `numero` varchar(6) NOT NULL,
  `data_entrega` date NOT NULL,
  `data_retirada` date NOT NULL,
  `qtd_litro` int(11) NOT NULL,
  `consignado` int(11) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `observacao` varchar(250) NOT NULL,
  `usuario_fk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `locacao_realizada`
--

INSERT INTO `locacao_realizada` (`id`, `nome`, `celular`, `celular2`, `endereco`, `bairro`, `numero`, `data_entrega`, `data_retirada`, `qtd_litro`, `consignado`, `valor`, `observacao`, `usuario_fk`) VALUES
(9, 'joao', '44998717151', '', 'rua uruguai', 'alvorada', '456', '2021-03-20', '2021-03-21', 30, 30, '600,00', '   xxx', 'james'),
(10, 'teste', '44999739474', '', 'avenida pedro taques', 'jd alvorada', '2234', '2021-03-30', '2021-04-01', 50, 30, '800,00', ' teste', 'james');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `custo` decimal(9,2) NOT NULL,
  `venda` decimal(9,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  `usuario_fk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `categoria`, `custo`, `venda`, `estoque`, `usuario_fk`) VALUES
(10, 'pao de alho', 'espetos', '3.00', '5.00', 35, 'james'),
(11, 'coca cola 300ml', 'refrigerantes', '2.25', '4.00', 48, 'james'),
(12, 'queijo', 'espetos', '1.90', '5.00', 48, 'james'),
(14, 'chopp colonia litro', 'bebidas', '6.00', '10.00', 5, 'james');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `senha`) VALUES
(1, 'james', '1234'),
(2, 'james', '2020'),
(3, 'carlos', '2020'),
(4, 'marcos', '2323'),
(5, 'lucas', '1313'),
(6, 'james', '5678'),
(7, 'testando', '202020'),
(8, 'joao', '202020'),
(9, 'james', '909090'),
(10, 'joao lucas', '909090');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `locacao`
--
ALTER TABLE `locacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `locacao_realizada`
--
ALTER TABLE `locacao_realizada`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `locacao`
--
ALTER TABLE `locacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `locacao_realizada`
--
ALTER TABLE `locacao_realizada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
