-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jun-2021 às 02:55
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crmall`
--
CREATE DATABASE IF NOT EXISTS `crmall` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `crmall`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dataNascimento` date NOT NULL,
  `sexo` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `dataNascimento`, `sexo`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `estado`, `cidade`) VALUES
(1, 'Manoela Ferreira Lopes', '1990-05-10', 'Feminino', '87043550', 'Rua Porto Seguro', 3, 'sei la', 'Conjunto João de Barro Itaparica', 'PR', 'Maringá'),
(2, 'JULIANA CRISTINA DE OLIVEIRA CASSIANO SILVA FLORINDO', '2021-06-01', 'Masculino', '87047550', 'Rua José Granado Parra', 78, '456', 'Jardim Paulista', 'PR', 'Maringá'),
(3, 'Murilo OLIVEIRA CASSIANO SILVA FLORINDO', '2021-06-04', 'Feminino', '87047550', 'Rua José Granado Parra', 3, 'lado ímpar', 'Jardim Paulista', 'PR', 'Maringá'),
(4, 'Ricardo Alves Florindo', '1986-04-06', 'Masculino', '71965-18', 'Rua Treze de Maio', 456, 'Condomínio Salas', 'Areal (Águas Claras)', 'PI', 'Teresina'),
(5, 'Carlos Danilo Luz', '2000-12-25', 'Masculino', '74550-14', 'Rua 510', 451, 'Zona Sul', 'Setor Centro Oeste', 'GO', 'Goiânia'),
(6, 'Gustavo Geraldino', '1089-10-14', 'Masculino', '76962-01', 'Rua Almirante Barroso', 12, 'até 2357/2358', 'Novo Horizonte', 'RO', 'Cacoal'),
(7, 'Ronie Tokumoto', '1980-10-10', 'Masculino', '77825-86', 'Rua 19', 78, '', 'Parque Bom Viver', 'TO', 'Araguaína'),
(8, 'Ronie Tokumoto', '1980-10-10', 'Masculino', '77825-86', 'Rua 19', 78, '', 'Parque Bom Viver', 'TO', 'Araguaína'),
(9, 'Anderson Silva', '1976-10-14', 'Masculino', '45078-15', 'Rua Doze', 0, '(Vl Serrana II)', 'Zabelê', 'BA', 'Vitória da Conquista'),
(10, 'Milena Souza Alcantara', '1952-12-10', 'Feminino', '57084-56', 'Rua Caina', 78, '', 'Benedito Bentes', 'AL', 'Maceió'),
(11, 'Tereza Souza', '1965-10-10', 'Feminino', '63118-28', 'Travessa São José', 45, '', 'Parque Recreio', 'CE', 'Crato');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
