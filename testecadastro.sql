-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Out-2021 às 16:09
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testecadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(18) NOT NULL,
  `rg` int(10) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `telefone` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `client`
--

INSERT INTO `client` (`id`, `id_empresa`, `nome`, `cpf_cnpj`, `rg`, `data_nascimento`, `data_cadastro`, `telefone`, `email`, `cep`, `endereco`, `numero`) VALUES
(1, 1, 'Paulo Beber Neto', '05546390921', 94222540, '2021-12-31', '2021-10-06 14:47:51', '41985121279', 'beber.paulo@gmail.com', '82010-170', 'Rua Reinaldo Casagrande', 38),
(2, 2, 'Paulo Beber Neto', '05546390921', 94222540, '1987-01-05', '2021-10-06 16:09:18', '41985121279', 'beber.paulo@gmail.com', '82015610', 'Rua Guarandi - São Braz - Curitiba - PR', 37),
(3, 5, 'joao', '321654654', NULL, NULL, '2021-10-06 22:44:52', '4621654612', 'teste@teste.com', '82015610', 'Rua Guarandi - São Braz - Curitiba - PR', 321),
(4, 4, 'teste FK', '3546546', 46546546, '2000-10-05', '2021-10-07 08:42:10', '41985121456', 'teste@teste.com.br', '82015610', 'Rua Guarandi - São Braz - Curitiba - PR', 555),
(5, 6, 'Cliente teste', '1133977000180', NULL, NULL, '2021-10-07 10:54:49', '(41)98512-1279', 'clienteteste@teste.com', '82015-610', 'Rua Guarandi - São Braz - Curitiba - PR', 333);

-- --------------------------------------------------------

--
-- Estrutura da tabela `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `razao_social` varchar(200) NOT NULL,
  `cnpj` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `company`
--

INSERT INTO `company` (`id`, `uf`, `razao_social`, `cnpj`) VALUES
(1, 'PR', 'teste ltda', '36.354.490/0001-71'),
(2, 'RJ', 'BNDES LTDA', '11.338.988/4445-74'),
(4, 'PR', 'sdfasdf', '34.554.888/4444-52'),
(5, 'PR', 'Silvana LTDA', '65.555.555/4444/10'),
(6, 'PA', 'empresa teste', '11.339.770/0001-80');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empresa` (`id_empresa`);

--
-- Índices para tabela `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `company` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
