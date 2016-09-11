-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Set-2016 às 00:38
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tibico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE IF NOT EXISTS `alunos` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(20) NOT NULL,
  `nome_pai` varchar(255) DEFAULT NULL,
  `nome_mae` varchar(255) DEFAULT NULL,
  `situacao` tinyint(1) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_aluno`),
  UNIQUE KEY `IdAluno_UNIQUE` (`id_aluno`),
  UNIQUE KEY `Matricula_UNIQUE` (`matricula`),
  KEY `fk_Aluno_Usuario_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `matricula`, `nome_pai`, `nome_mae`, `situacao`, `id_usuario`) VALUES
(1, '20161bsi0001', 'Pai', 'Mae', 1, 1),
(2, '20161bsi0002', 'Pai', 'Mae', 1, 4),
(3, '20161BSI0003', 'Pai', 'Mae', 1, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_turmas`
--

CREATE TABLE IF NOT EXISTS `alunos_turmas` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `id_turma` int(11) NOT NULL,
  `frquencia_final` int(11) DEFAULT NULL,
  `nota_final` int(11) DEFAULT NULL,
  `situacao_aprovacao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_aluno`,`id_turma`),
  KEY `fk_AlunoTurma_Turma1_idx` (`id_turma`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `alunos_turmas`
--

INSERT INTO `alunos_turmas` (`id_aluno`, `id_turma`, `frquencia_final`, `nota_final`, `situacao_aprovacao`) VALUES
(1, 1, NULL, NULL, NULL),
(2, 1, NULL, NULL, NULL),
(3, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

CREATE TABLE IF NOT EXISTS `aulas` (
  `id_aula` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `quantidade_aulas` int(11) NOT NULL,
  `conteudo` mediumtext,
  `id_turma` int(11) NOT NULL,
  PRIMARY KEY (`id_aula`),
  UNIQUE KEY `IdAula_UNIQUE` (`id_aula`),
  KEY `fk_Aula_Turma1_idx` (`id_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE IF NOT EXISTS `avaliacoes` (
  `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_avaliacao` varchar(45) NOT NULL,
  `peso` decimal(10,0) NOT NULL,
  `data` datetime NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `id_turma` int(11) NOT NULL,
  PRIMARY KEY (`id_avaliacao`),
  KEY `fk_Avaliacao_Turma1_idx` (`id_turma`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id_avaliacao`, `tipo_avaliacao`, `peso`, `data`, `descricao`, `id_turma`) VALUES
(1, 'Prova', '1', '2016-09-07 00:00:00', 'Prova 1', 1),
(4, 'Trabalho', '2', '2016-09-10 00:00:00', 'Trabalho 1', 1),
(6, 'Prova', '1', '2016-09-15 00:00:00', 'Prova 2', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendarios_academicos`
--

CREATE TABLE IF NOT EXISTS `calendarios_academicos` (
  `id_calendario` int(11) NOT NULL AUTO_INCREMENT,
  `identificador` varchar(20) DEFAULT NULL,
  `duracao` int(11) DEFAULT NULL,
  `data_inicio_ca` datetime DEFAULT NULL,
  `data_inicio_pm` datetime DEFAULT NULL,
  `data_fim_pm` datetime DEFAULT NULL,
  `data_inicio_pl` datetime DEFAULT NULL,
  `data_fim_pl` datetime DEFAULT NULL,
  `data_fim_ca` datetime DEFAULT NULL,
  `situacao` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_calendario`),
  UNIQUE KEY `IdCalendario_UNIQUE` (`id_calendario`),
  UNIQUE KEY `Identifcador_UNIQUE` (`identificador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `calendarios_academicos`
--

INSERT INTO `calendarios_academicos` (`id_calendario`, `identificador`, `duracao`, `data_inicio_ca`, `data_inicio_pm`, `data_fim_pm`, `data_inicio_pl`, `data_fim_pl`, `data_fim_ca`, `situacao`) VALUES
(1, '20161', 101, '2016-07-04 00:00:00', '2016-07-04 00:00:00', '2016-07-04 00:00:00', '2016-07-04 00:00:00', '2016-07-04 00:00:00', '2016-07-04 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `regime` varchar(45) NOT NULL,
  `duracao` int(11) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `area_conhecimento` varchar(45) DEFAULT NULL,
  `grau_instrucao` varchar(30) NOT NULL,
  PRIMARY KEY (`id_curso`),
  UNIQUE KEY `IdCurso_UNIQUE` (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome`, `regime`, `duracao`, `sigla`, `descricao`, `area_conhecimento`, `grau_instrucao`) VALUES
(1, 'Bacharelado Em Sistemas de Informação', 'Creditos', 8, 'BSI', NULL, NULL, 'Superior');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE IF NOT EXISTS `disciplinas` (
  `id_disciplina` int(11) NOT NULL AUTO_INCREMENT,
  `nome_disciplina` varchar(45) NOT NULL,
  `num_creditos` int(11) NOT NULL,
  `periodo_correspondente` int(11) NOT NULL,
  `area_disciplina` varchar(45) DEFAULT NULL,
  `id_curso` int(11) NOT NULL,
  PRIMARY KEY (`id_disciplina`),
  UNIQUE KEY `IdDisciplina_UNIQUE` (`id_disciplina`),
  KEY `fk_Disciplina_Curso1_idx` (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id_disciplina`, `nome_disciplina`, `num_creditos`, `periodo_correspondente`, `area_disciplina`, `id_curso`) VALUES
(1, 'Fundamentos de Sistemas de Informação', 4, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencias`
--

CREATE TABLE IF NOT EXISTS `frequencias` (
  `id_aula` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `num_faltas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_aula`,`id_aluno`),
  KEY `fk_Frequencia_Aluno1_idx` (`id_aluno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `dia_semana` varchar(45) NOT NULL,
  `horario_inicio` varchar(45) NOT NULL,
  `horario_fim` varchar(45) NOT NULL,
  `id_turma` int(11) NOT NULL,
  PRIMARY KEY (`id_horario`),
  KEY `fk_Horario_Truma1_idx` (`id_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pre_requesitos`
--

CREATE TABLE IF NOT EXISTS `pre_requesitos` (
  `id_disciplina` int(11) NOT NULL,
  `id_disciplina_requisito` int(11) NOT NULL,
  PRIMARY KEY (`id_disciplina`,`id_disciplina_requisito`),
  KEY `fk_PreRequesito_Disciplina2_idx` (`id_disciplina_requisito`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE IF NOT EXISTS `professores` (
  `id_professor` int(11) NOT NULL AUTO_INCREMENT,
  `formacao_academica` varchar(255) DEFAULT NULL,
  `area_atuacao` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_professor`),
  UNIQUE KEY `IdProfessor_UNIQUE` (`id_professor`),
  KEY `fk_Professor_Usuario1_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id_professor`, `formacao_academica`, `area_atuacao`, `id_usuario`) VALUES
(1, 'Mestre em Engenharia da Computação', 'Redes de Computação', 2),
(2, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultados_avaliacoes`
--

CREATE TABLE IF NOT EXISTS `resultados_avaliacoes` (
  `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` int(11) NOT NULL,
  `nota` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_avaliacao`,`id_aluno`),
  KEY `fk_ResultadoAvaliacao_Aluno1_idx` (`id_aluno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `resultados_avaliacoes`
--

INSERT INTO `resultados_avaliacoes` (`id_avaliacao`, `id_aluno`, `nota`) VALUES
(1, 1, '10'),
(1, 2, '20'),
(1, 3, '30'),
(4, 1, '90'),
(4, 2, '80'),
(4, 3, '70'),
(6, 1, '7'),
(6, 2, '9'),
(6, 3, '8');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE IF NOT EXISTS `turmas` (
  `id_turma` int(11) NOT NULL AUTO_INCREMENT,
  `num_vagas` int(11) NOT NULL,
  `situacao` tinyint(1) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `id_calendario` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  PRIMARY KEY (`id_turma`),
  UNIQUE KEY `IdTruma_UNIQUE` (`id_turma`),
  KEY `fk_Truma_Disciplina1_idx` (`id_disciplina`),
  KEY `fk_Truma_CalendarioAcademico1_idx` (`id_calendario`),
  KEY `fk_Truma_Professor1_idx` (`id_professor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id_turma`, `num_vagas`, `situacao`, `id_disciplina`, `id_calendario`, `id_professor`) VALUES
(1, 50, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `identidade` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `endereco` text,
  `telefone` varchar(11) DEFAULT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ativado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `data_nascimento`, `cpf`, `identidade`, `email`, `endereco`, `telefone`, `login`, `senha`, `ativado`) VALUES
(1, 'Felipe Negrelli Martins', '1985-07-02', '12312312312', '1212123', 'felipenegrelli@gmail.com', NULL, '27981512106', 'felipe_negrelli', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 'Celio Maioli', '1970-01-01', '11111111111', '1212123', 'cpmaioli@gmail.com', 'rua', NULL, 'celio', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(3, 'Flavio Giraldelli', '1979-01-01', '12312312312', '1212123', 'giraldelli@ifes.edu.br', 'rua', NULL, 'giraldelli', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(4, 'Vivian Betzel', '1993-01-02', '12312312312', '1212123', 'vivian@outlook.com', 'Rua', '27999999999', 'vivian', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(5, 'Raone Dornedoni', '2016-09-05', '12312312312', '1212123', 'raone@gmail.com', 'Rua', '27999999999', 'raone', '81dc9bdb52d04dc20036dbd8313ed055', 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `fk_Aluno_Usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `alunos_turmas`
--
ALTER TABLE `alunos_turmas`
  ADD CONSTRAINT `fk_AlunoTurma_Aluno1` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_AlunoTurma_Turma1` FOREIGN KEY (`id_turma`) REFERENCES `turmas` (`id_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `aulas`
--
ALTER TABLE `aulas`
  ADD CONSTRAINT `fk_Aula_Turma1` FOREIGN KEY (`id_turma`) REFERENCES `turmas` (`id_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `fk_Avaliacao_Turma1` FOREIGN KEY (`id_turma`) REFERENCES `turmas` (`id_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD CONSTRAINT `fk_Disciplina_Curso1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `frequencias`
--
ALTER TABLE `frequencias`
  ADD CONSTRAINT `fk_Frequencia_Aluno1` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Frequencia_Aula1` FOREIGN KEY (`id_aula`) REFERENCES `aulas` (`id_aula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `fk_Horario_Truma1` FOREIGN KEY (`id_turma`) REFERENCES `turmas` (`id_turma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pre_requesitos`
--
ALTER TABLE `pre_requesitos`
  ADD CONSTRAINT `fk_PreRequesito_Disciplina1` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplinas` (`id_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PreRequesito_Disciplina2` FOREIGN KEY (`id_disciplina_requisito`) REFERENCES `disciplinas` (`id_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professores`
--
ALTER TABLE `professores`
  ADD CONSTRAINT `fk_Professor_Usuario1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `resultados_avaliacoes`
--
ALTER TABLE `resultados_avaliacoes`
  ADD CONSTRAINT `fk_ResultadoAvaliacao_Aluno1` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id_aluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ResultadoAvaliacao_Avaliacao1` FOREIGN KEY (`id_avaliacao`) REFERENCES `avaliacoes` (`id_avaliacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `fk_Truma_CalendarioAcademico1` FOREIGN KEY (`id_calendario`) REFERENCES `calendarios_academicos` (`id_calendario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Truma_Disciplina1` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplinas` (`id_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Truma_Professor1` FOREIGN KEY (`id_professor`) REFERENCES `professores` (`id_professor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
