-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Dez-2019 às 18:23
-- Versão do servidor: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_locadora`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_film`
--

CREATE TABLE `tb_film` (
  `CODIGO` int(11) NOT NULL,
  `NOME` varchar(40) NOT NULL,
  `FOTO` varchar(100) NOT NULL,
  `GENERO` varchar(50) NOT NULL,
  `LANCAMENTO` date NOT NULL,
  `ELENCO` varchar(300) NOT NULL,
  `DURACAO` int(11) NOT NULL,
  `PRECO` float NOT NULL,
  `CLASSIFICACAO` varchar(10) NOT NULL,
  `ENREDO` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_film`
--

INSERT INTO `tb_film` (`CODIGO`, `NOME`, `FOTO`, `GENERO`, `LANCAMENTO`, `ELENCO`, `DURACAO`, `PRECO`, `CLASSIFICACAO`, `ENREDO`) VALUES
(1, 'Toy Story 3', 'Imagens/filmes/toy_story_3.jpg', 'Infantil', '2010-06-18', 'Tom Hanks, Tim Allen, Michael Keaton', 100, 5, 'Livre', 'Andy se prepara para ir para a faculdade e, inesperadamente, seus leais brinquedos acabando sendo enviados para uma creche. As crianças e seus dedinhos pegajosos não têm cuidado ao brincar, de modo que os brinquedos decidem unir forças e planejar uma grande fuga.'),
(3, 'Coringa', 'Imagens/filmes/coringa.jpg', 'Drama', '2019-10-03', 'Joaquin Phoenix, Robert De Niro, Zazie Beetz', 122, 10, '18', 'O filme conta como um dia ruim pode transformar uma pessoa normal em um vilão completamente doentio como o coringa'),
(4, 'Deadpool 2', 'Imagens/filmes/deadpool_2.jpg', 'Ação', '2018-05-17', 'Ryan Reynolds, Josh Brolin, Morena Baccarin', 120, 8, '16', 'Quando o super soldado Cable chega em uma missão para assassinar o jovem mutante Russel, o mercenário Deadpool precisa aprender o que é ser herói de verdade para salvá-lo. Para isso, ele recruta seu velho amigo Colossus e forma o novo grupo X-Force, sempre com o apoio do fiel escudeiro'),
(5, 'A Era do Gelo', 'Imagens/filmes/a_era_do_gelo.jpg', 'Infantil', '2002-03-22', ' Diogo Vilela, Tadeu Mello, Márcio Garcia', 81, 4, 'Livre', 'O mamute Manny, o tigre de dente de sabre Diego e a preguiça-gigante Sid são amigos em uma época muito distante dos dias atuais e vivem suas vidas em meio a muito gelo.Enquanto isso, o esquilo pré-histórico Scrat segue na sua saga para manter sua amada noz protegida de outros predadores.'),
(7, 'Homem Aranha no Aranhaverso', 'Imagens/filmes/homem_aranha_no_aranhaverso.jpg', 'Ação', '2019-01-10', ' Shameik Moore, Jake Johnson (XVI), Hailee Steinfeld', 118, 8, '10', 'Miles Morales é um jovem negro do Brooklyn que se tornou o Homem-Aranha inspirado no legado de Peter Parker, já falecido. Entretanto, ao visitar o túmulo de seu ídolo em uma noite chuvosa, ele é surpreendido com a presença do próprio Peter, vestindo o traje do herói aracnídeo sob um sobretudo.'),
(8, 'Vingadores Ultimato', 'Imagens/filmes/vingadores_ultimato.jpg', 'Ação', '2019-05-04', 'Mark Rufallo, Robert Dawne JR, Chris Evans', 182, 10, '14', 'Após Thanos eliminar metade das criaturas vivas, os Vingadores precisam lidar com a dor da perda de amigos e seus entes queridos. Com Tony Stark vagando perdido no espaço sem água nem comida, Steve Rogers e Natasha Romanov precisam liderar a resistencia contra o titã'),
(9, 'IT ', 'Imagens/filmes/it.jpg', 'Terror', '2017-09-07', ': Bill Skarsgård, Jaeden Martell, Finn Wolfhard', 132, 7, '18', 'Um grupo de sete adolescentes de Derry, uma cidade no Maine, formam o auto-intitulado \"Losers Club\" - o clube dos perdedores. A pacata rotina da cidade é abalada quando crianças começam a desaparecer e tudo o que pode ser encontrado delas são partes de seus corpos'),
(10, 'Minha mãe é uma peça 2', 'Imagens/filmes/minha_mae_e_uma_peça_2.jpg', 'Comédia', '2016-12-22', ' Paulo Gustavo, Rodrigo Pandolfo, Mariana Xavier', 96, 8, '12', 'Dona Hermínia (Paulo Gustavo) está de volta, desta vez rica, pois passou a apresentar um bem-sucedido programa de TV. Porém, a personagem superprotetora vai ter que lidar com o ninho vazio, afinal Juliano (Rodrigo Pandolfo) e Marcelina (Mariana Xavier) resolvem criar asas e sair de casa.'),
(11, 'Matrix ', 'Imagens/filmes/matrix.jpg', 'Ação', '1999-05-21', 'Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss', 135, 6, '14', 'Um jovem programador é atormentado por estranhos pesadelos nos quais sempre está conectado por cabos a um imenso sistema de computadores do futuro. Conforme isso acontece duvida surgem sobre realidade'),
(12, 'Homem Aranha ', 'Imagens/filmes/homem_aranha.jpg', 'Ação', '2002-05-17', ' Tobey Maguire, Willem Dafoe, Kirsten Dunst', 121, 4, '12', 'Depois de ser picado por uma aranha geneticamente modificada em uma demonstração científica, o jovem nerd Peter Parker ganha superpoderes. Inicialmente, ele pretende usá-los para para ganhar dinheiro,'),
(13, 'A culpa é das estrelas ', 'Imagens/filmes/a_culpa_e_das_estrelas.jpg', 'Drama', '2014-06-05', 'Shailene Woodley, Ansel Elgort, Nat Wolff', 125, 6, '12', 'Hazel Grace Lancaster e Augustus Waters são dois adolescentes que se conhecem em um grupo de apoio para pacientes com câncer.'),
(14, 'A Era do Gelo 2', 'Imagens/filmes/a_era_do_gelo_2.jpg', 'Infantil', '2006-03-31', ' Diogo Vilela, Tadeu Mello, Márcio Garcia', 86, 3, 'Livre', 'O aquecimento global traz ameaças de inundações generalizadas a regiões que antes eram geladas. Manny, Sid e Diego partem, então, em busca de um refúgio seguro.'),
(15, 'Até que a sorte nos separe', 'Imagens/filmes/ate_que_a_sorte_nos_separe.jpg', 'Comédia', '2012-10-05', ': Leandro Hassum, Danielle Winits, Kiko Mascarenhas', 90, 5, '10', 'Tino é um pai de família que tem sua rotina transformada ao ganhar na loteria. Em dez anos, o fanfarrão e sua mulher Jane gastam todo o dinheiro com uma vida de ostentação.'),
(16, 'Anabelle', 'Imagens/filmes/anabelle.jpg', 'Terror', '2014-10-09', ': Annabelle Wallis, Ward Horton, Alfre Woodard', 98, 6, '16', 'Um casal se prepara para a chegada de sua primeira filha e compra para ela uma boneca. Quando sua casa é invadida por membros de uma seita, o casal é violentamente atacado e a boneca, Anabelle, se tor'),
(17, 'Pulp Fiction - Tempos de Violência ', 'Imagens/filmes/pulp_fiction.jpg', 'Ação', '1995-02-18', ' John Travolta, Samuel L. Jackson, Uma Thurman ', 149, 6, '18', 'Os caminhos de vários criminosos se cruzam nestas três histórias de Quentin Tarantino. Um pistoleiro se apaixona pela mulher de seu chefe, um boxeador não se sai bem em uma luta e um casal tenta execu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_film`
--
ALTER TABLE `tb_film`
  ADD PRIMARY KEY (`CODIGO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_film`
--
ALTER TABLE `tb_film`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
