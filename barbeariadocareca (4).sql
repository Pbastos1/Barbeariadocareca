-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/11/2024 às 03:29
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `barbeariadocareca`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `abc`
--

CREATE TABLE `abc` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `data_de_nascimento` date NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `abc`
--

INSERT INTO `abc` (`id_usuario`, `nome`, `email`, `data_de_nascimento`, `id_grupo`, `data_criacao`) VALUES
(1, 'Gabriel seilhe', 'gabrielseilhe@gmail.com', '2024-12-05', 1, '2024-11-28 23:12:13'),
(2, 'José', 'josepereira@gmail.com', '2024-11-03', 2, '2024-11-28 23:12:45'),
(3, 'Germano', 'Germano@gmai.com', '0123-03-21', 3, '2024-11-28 23:13:06'),
(4, 'Saitama', 'Saitama@gmai.com', '0013-03-12', 3, '2024-11-28 23:13:20'),
(5, 'Leo', 'Leo@gmail.com', '0123-03-12', 2, '2024-11-28 23:14:33'),
(6, 'Kuririn', 'Kuririn@gmai.com', '0000-00-00', 3, '2024-11-28 23:15:09'),
(7, 'The rock', 'Therock@gmail.com', '1231-03-12', 3, '2024-11-28 23:15:45');

-- --------------------------------------------------------

--
-- Estrutura para tabela `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `dia_da_semana` int(11) NOT NULL,
  `horario_inicio` time NOT NULL,
  `id_usuario` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `dia_da_semana`, `horario_inicio`, `id_usuario`) VALUES
(1, 0, '08:00:00', '2'),
(2, 0, '08:30:00', '2'),
(3, 0, '09:00:00', '2'),
(4, 0, '09:30:00', '2'),
(5, 0, '10:00:00', '2'),
(6, 0, '10:30:00', '2'),
(7, 0, '11:00:00', '2'),
(8, 0, '11:30:00', '2'),
(9, 0, '14:00:00', '2'),
(10, 0, '14:30:00', '2'),
(11, 0, '15:00:00', '2'),
(12, 0, '15:30:00', '2'),
(13, 0, '16:00:00', '2'),
(14, 0, '16:30:00', '2'),
(15, 0, '17:00:00', '2'),
(16, 0, '17:30:00', '2'),
(17, 0, '18:00:00', '2'),
(18, 0, '18:30:00', '2'),
(19, 0, '19:00:00', '2'),
(20, 0, '19:30:00', '2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id_agendamento` int(11) NOT NULL,
  `id_servico` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_agenda` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `dados_bancarios`
--

CREATE TABLE `dados_bancarios` (
  `id_dados` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_banco` varchar(128) NOT NULL,
  `numero_conta` varchar(20) NOT NULL,
  `numero_agencia` varchar(20) NOT NULL,
  `chave_pix` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `dados_bancarios`
--

INSERT INTO `dados_bancarios` (`id_dados`, `id_usuario`, `nome_banco`, `numero_conta`, `numero_agencia`, `chave_pix`) VALUES
(1, 0, 'Banco do Brasil S.A.', '', '', '213123123'),
(2, 0, 'Banco Santander (Brasil) S. A.', '67567', '575675', '567563'),
(3, 0, 'Banco do Brasil S.A.', '', '', '12312'),
(4, 0, 'Banco do Brasil S.A.', '', '', '12312312321'),
(5, 0, 'Banco do Brasil S.A.', '44584545', '5 7824', '45252'),
(6, 0, 'Banco do Brasil S.A.', '2141562', '12414', '2623626'),
(7, 0, 'Banco do Brasil S.A.', '', '', '31212515251');

-- --------------------------------------------------------

--
-- Estrutura para tabela `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `nome_grupo` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `serviços`
--

CREATE TABLE `serviços` (
  `id_serviço` int(11) NOT NULL,
  `nome_serviço` varchar(128) NOT NULL,
  `valor_serviço` decimal(10,0) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_de_serviço`
--

CREATE TABLE `tipo_de_serviço` (
  `id_tipo` int(11) NOT NULL,
  `tipo_serviço` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `abc`
--
ALTER TABLE `abc`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices de tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Índices de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id_agendamento`);

--
-- Índices de tabela `dados_bancarios`
--
ALTER TABLE `dados_bancarios`
  ADD PRIMARY KEY (`id_dados`);

--
-- Índices de tabela `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Índices de tabela `serviços`
--
ALTER TABLE `serviços`
  ADD PRIMARY KEY (`id_serviço`);

--
-- Índices de tabela `tipo_de_serviço`
--
ALTER TABLE `tipo_de_serviço`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `abc`
--
ALTER TABLE `abc`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `dados_bancarios`
--
ALTER TABLE `dados_bancarios`
  MODIFY `id_dados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `serviços`
--
ALTER TABLE `serviços`
  MODIFY `id_serviço` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_de_serviço`
--
ALTER TABLE `tipo_de_serviço`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
