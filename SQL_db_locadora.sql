--
-- Base de Dados: `db_locadora`
--
CREATE DATABASE IF NOT EXISTS `db_locadora` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_locadora`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_film`
--

CREATE TABLE IF NOT EXISTS `tb_film` (
  `CODIGO` int NOT NULL AUTO_INCREMENT,
  `NOME` varchar(40) NOT NULL,
  `FOTO` varchar(100) NOT NULL,
  `GENERO` varchar(50) NOT NULL,
  `LANCAMENTO` date NOT NULL,
  `ELENCO` varchar(300) NOT NULL,
  `DURACAO` int NOT NULL,
  `PRECO` float NOT NULL,
  `CLASSIFICACAO` varchar(10) NOT NULL,
  `ENREDO` varchar(300) NOT NULL,
  PRIMARY KEY (`CODIGO`)
) DEFAULT CHARSET=utf8;

-- ------------------------




--
-- Usuário BD
-- 

CREATE USER IF NOT EXISTS 'aluno'@'localhost' IDENTIFIED BY 'aluno';


GRANT ALL PRIVILEGES ON `db_locadora` . * TO 'aluno'@'localhost';