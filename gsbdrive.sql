-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 07 mai 2020 à 16:05
-- Version du serveur :  10.3.12-MariaDB
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gsbdrive`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Vaccins'),
(2, 'antipéristaltiques'),
(3, 'Antibiotiques'),
(4, 'Gynécologie'),
(5, 'Cardiologie'),
(6, 'Antiagrégants plaquettaires');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_command` int(11) NOT NULL AUTO_INCREMENT,
  `date_command` date NOT NULL,
  `id_pharma` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_command`),
  KEY `command_pharmacie_FK` (`id_pharma`),
  KEY `command_user0_FK` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_command`, `date_command`, `id_pharma`, `id_user`) VALUES
(3, '2019-11-19', 1, 36),
(4, '2019-11-19', 1, 36),
(5, '2019-11-19', 2, 45),
(6, '2019-11-19', 1, 36),
(7, '2019-11-19', 2, 47),
(8, '2019-11-19', 1, 47),
(9, '2019-11-26', 2, 36),
(10, '2019-11-26', 2, 49),
(11, '2019-11-26', 2, 49),
(12, '2019-11-26', 2, 49),
(13, '2019-11-26', 2, 49),
(14, '2019-11-26', 2, 49),
(15, '2019-11-26', 2, 49),
(16, '2019-11-26', 2, 49),
(17, '2019-11-26', 2, 49),
(18, '2019-11-26', 2, 49),
(19, '2019-11-26', 2, 49),
(20, '2019-11-26', 2, 49),
(21, '2019-11-26', 2, 49),
(22, '2019-11-26', 2, 49),
(23, '2019-11-26', 2, 49),
(24, '2019-11-26', 2, 49),
(25, '2019-11-26', 2, 49),
(26, '2019-11-26', 2, 49),
(27, '2019-11-26', 2, 49),
(28, '2019-11-26', 2, 49),
(29, '2019-11-26', 1, 49),
(30, '2019-11-26', 1, 49),
(31, '2019-11-26', 1, 49),
(32, '2019-11-26', 1, 49),
(33, '2019-11-26', 1, 49),
(34, '2019-11-26', 1, 49),
(35, '2019-11-26', 1, 49),
(36, '2019-11-26', 1, 49),
(37, '2019-11-26', 1, 49),
(38, '2019-11-26', 1, 49),
(39, '2019-11-26', 1, 49),
(40, '2019-11-26', 1, 49),
(41, '2019-11-26', 1, 49),
(42, '2019-11-26', 1, 49),
(43, '2019-11-26', 1, 49),
(44, '2019-11-26', 1, 49),
(45, '2019-11-26', 1, 49),
(46, '2019-11-26', 1, 49),
(47, '2019-11-26', 1, 49),
(48, '2019-11-26', 1, 49),
(49, '2019-11-26', 1, 49),
(50, '2019-11-26', 1, 49),
(51, '2019-11-26', 1, 49),
(52, '2019-11-26', 1, 49),
(53, '2019-11-26', 1, 49),
(54, '2019-11-26', 1, 49),
(55, '2019-11-26', 1, 49),
(56, '2019-11-26', 1, 49),
(57, '2019-11-26', 1, 49),
(58, '2019-11-26', 1, 49),
(59, '2019-11-26', 1, 49),
(60, '2019-11-26', 1, 49),
(61, '2019-11-26', 2, 49),
(62, '2019-11-26', 1, 49),
(63, '2019-11-26', 1, 49),
(64, '2019-11-26', 1, 49),
(65, '2019-11-26', 1, 49),
(66, '2019-11-26', 1, 49),
(67, '2019-11-26', 1, 49),
(68, '2019-11-26', 1, 49),
(69, '2019-11-26', 1, 49),
(70, '2019-11-26', 1, 49),
(71, '2019-11-26', 1, 49),
(72, '2019-12-02', 1, 52),
(73, '2019-12-02', 1, 52),
(74, '2019-12-02', 2, 52),
(75, '2019-12-03', 1, 36),
(76, '2019-12-03', 2, 36),
(77, '2019-12-03', 2, 36),
(78, '2019-12-03', 1, 36),
(79, '2019-12-03', 1, 36),
(80, '2019-12-03', 2, 36),
(81, '2019-12-03', 1, 36),
(82, '2019-12-03', 2, 36),
(83, '2019-12-03', 2, 36),
(84, '2019-12-03', 1, 36),
(85, '2019-12-04', 2, 36),
(86, '2020-04-12', 2, 36),
(87, '2020-04-12', 1, 36),
(88, '2020-04-12', 1, 54),
(89, '2020-05-07', 2, 36);

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

DROP TABLE IF EXISTS `contient`;
CREATE TABLE IF NOT EXISTS `contient` (
  `id_medoc` int(11) NOT NULL,
  `id_command` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id_medoc`,`id_command`),
  KEY `relation4_command0_FK` (`id_command`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `contient`
--

INSERT INTO `contient` (`id_medoc`, `id_command`, `quantite`) VALUES
(1, 4, 2),
(1, 5, 4),
(1, 7, 4),
(1, 10, 0),
(1, 11, 0),
(1, 12, 0),
(1, 13, 0),
(1, 14, 0),
(1, 15, 0),
(1, 16, 0),
(1, 17, 0),
(1, 18, 0),
(1, 19, 0),
(1, 20, 0),
(1, 21, 0),
(1, 22, 0),
(1, 23, 0),
(1, 24, 0),
(1, 25, 0),
(1, 26, 0),
(1, 27, 0),
(1, 28, 0),
(1, 29, 0),
(1, 30, 0),
(1, 31, 0),
(1, 32, 0),
(1, 33, 0),
(1, 34, 0),
(1, 50, 1),
(1, 51, 1),
(1, 52, 1),
(1, 53, 1),
(1, 72, 5),
(1, 73, 5),
(1, 74, 1),
(1, 80, 5),
(1, 81, 6),
(1, 82, 18),
(1, 86, 1),
(1, 87, 1),
(2, 5, 17),
(2, 7, 16),
(2, 9, 3),
(2, 10, 10),
(2, 11, 10),
(2, 12, 10),
(2, 13, 10),
(2, 14, 10),
(2, 15, 10),
(2, 16, 10),
(2, 17, 10),
(2, 18, 10),
(2, 19, 10),
(2, 20, 10),
(2, 21, 10),
(2, 22, 10),
(2, 23, 10),
(2, 24, 10),
(2, 25, 10),
(2, 26, 10),
(2, 27, 10),
(2, 28, 10),
(2, 29, 10),
(2, 30, 10),
(2, 31, 10),
(2, 32, 10),
(2, 33, 10),
(2, 34, 10),
(2, 35, 10),
(2, 36, 10),
(2, 37, 10),
(2, 38, 10),
(2, 39, 10),
(2, 40, 10),
(2, 41, 10),
(2, 42, 10),
(2, 43, 10),
(2, 44, 10),
(2, 45, 10),
(2, 46, 10),
(2, 47, 10),
(2, 48, 10),
(2, 49, 10),
(2, 50, 10),
(2, 51, 10),
(2, 52, 10),
(2, 53, 10),
(2, 54, 400),
(2, 55, 400),
(2, 57, 400),
(2, 58, 400),
(2, 60, 400),
(2, 61, 400),
(2, 62, 400),
(2, 64, 400),
(2, 65, 400),
(2, 67, 400),
(2, 69, 4),
(2, 70, 4),
(2, 71, 4),
(2, 77, 4),
(2, 78, 4),
(2, 79, 4),
(2, 80, 5),
(2, 82, 2),
(2, 83, 5),
(2, 84, 5),
(2, 86, 2),
(2, 87, 1),
(3, 3, 4),
(3, 4, 4),
(3, 5, 2),
(3, 7, 5),
(3, 9, 1),
(3, 87, 1),
(4, 3, 14),
(4, 4, 14),
(4, 5, 2),
(4, 6, 4),
(4, 7, 3),
(4, 8, 1),
(4, 9, 3),
(4, 10, 1400),
(4, 11, 1400),
(4, 12, 1400),
(4, 13, 1400),
(4, 14, 1400),
(4, 15, 1400),
(4, 16, 1400),
(4, 17, 1400),
(4, 18, 1400),
(4, 19, 1400),
(4, 20, 1400),
(4, 21, 1400),
(4, 22, 1400),
(4, 23, 1400),
(4, 24, 1400),
(4, 25, 1400),
(4, 26, 1400),
(4, 27, 1400),
(4, 28, 1400),
(4, 29, 1400),
(4, 30, 1400),
(4, 31, 1400),
(4, 32, 1400),
(4, 33, 1400),
(4, 34, 1400),
(4, 35, 1400),
(4, 36, 1400),
(4, 37, 1400),
(4, 38, 1400),
(4, 39, 1400),
(4, 40, 1400),
(4, 41, 1400),
(4, 42, 1400),
(4, 43, 1400),
(4, 44, 1400),
(4, 45, 1400),
(4, 46, 1400),
(4, 47, 1400),
(4, 48, 1400),
(4, 49, 1400),
(4, 50, 1400),
(4, 51, 1400),
(4, 52, 1400),
(4, 53, 1400),
(4, 54, 2000),
(4, 55, 2000),
(4, 57, 2000),
(4, 58, 2000),
(4, 60, 2000),
(4, 61, 2000),
(4, 62, 2000),
(4, 64, 2000),
(4, 65, 2000),
(4, 67, 2000),
(4, 69, 2),
(4, 70, 2),
(4, 71, 2),
(4, 72, 5),
(4, 73, 5),
(4, 75, 1),
(4, 76, 1),
(4, 77, 2),
(4, 78, 2),
(4, 79, 2),
(4, 81, 5),
(4, 82, 9),
(4, 83, 4),
(4, 84, 4),
(4, 85, 5),
(4, 86, 1),
(5, 86, 1),
(6, 86, 1),
(7, 86, 1),
(8, 86, 2),
(9, 86, 1),
(9, 88, 1),
(9, 89, 1),
(10, 86, 1),
(10, 89, 1),
(11, 86, 1),
(12, 86, 1),
(14, 86, 1),
(14, 87, 10),
(15, 87, 1),
(16, 10, 100),
(16, 11, 100),
(16, 12, 100),
(16, 13, 100),
(16, 14, 100),
(16, 15, 100),
(16, 16, 100),
(16, 17, 100),
(16, 18, 100),
(16, 19, 100),
(16, 20, 100),
(16, 21, 100),
(16, 22, 100),
(16, 23, 100),
(16, 24, 100),
(16, 25, 100),
(16, 26, 100),
(16, 27, 100),
(16, 28, 100),
(16, 29, 100),
(16, 30, 100),
(16, 31, 100),
(16, 32, 100),
(16, 33, 100),
(16, 34, 100),
(16, 35, 100),
(16, 36, 100),
(16, 37, 100),
(16, 38, 100),
(16, 39, 100),
(16, 40, 100),
(16, 41, 100),
(16, 42, 100),
(16, 43, 100),
(16, 44, 100),
(16, 45, 100),
(16, 46, 100),
(16, 47, 100),
(16, 48, 100),
(16, 49, 100),
(16, 50, 100),
(16, 51, 100),
(16, 52, 100),
(16, 53, 100),
(16, 54, 70),
(16, 55, 70),
(16, 57, 70),
(16, 58, 70),
(16, 60, 70),
(16, 61, 70),
(16, 62, 70),
(16, 64, 70),
(16, 65, 70),
(16, 67, 70),
(16, 69, 7),
(16, 70, 7),
(16, 71, 7),
(16, 72, 4),
(16, 73, 4),
(16, 77, 7),
(16, 78, 7),
(16, 79, 7),
(16, 81, 4),
(16, 82, 1),
(16, 83, 13),
(16, 84, 13),
(16, 86, 1);

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

DROP TABLE IF EXISTS `medicament`;
CREATE TABLE IF NOT EXISTS `medicament` (
  `id_medoc` int(11) NOT NULL AUTO_INCREMENT,
  `nom_medoc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description_medoc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_medoc`),
  KEY `medicament_categorie_FK` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`id_medoc`, `nom_medoc`, `description_medoc`, `id_categorie`) VALUES
(1, 'romainite', 'Medicament contre les virus de type romain', 1),
(2, 'adamanite', 'Medicament contre le mal de ventre', 4),
(3, 'lucky', 'je sais paaaas', 3),
(4, 'Nadianite', 'Médicament contre les contractions se produisant de bas en haut dans l\'estomac et l\'intestin, \r\nou Contre les matières alimentaires qui vont dans le sens inverse du trajet normal.', 2),
(5, 'Pediacel®', 'Diphtérie, Coqueluche acellulaire, Tétanos, Polio inactivé, Haemophilus influenzae de type b', 1),
(6, 'Avaxim®', 'Hépatite A	', 1),
(7, 'Avaxim® Pediatric', 'Hépatite A	', 1),
(8, 'Havrix™ 1440', 'Hépatite A	', 1),
(9, 'DIARÉTYL', 'Ce médicament est un antidiarrhéique qui agit en ralentissant le transit intestinal et en réduisant les sécrétions intestinales.\r\n', 2),
(10, 'DIASTROLIB ', 'Ce médicament est un antidiarrhéique qui agit en ralentissant le transit intestinal et en réduisant les sécrétions intestinales.\r\n\r\nIl est utilisé dans le traitement symptomatique des diarrhées aiguës de l\'adulte, en complément des mesures diététiques.\r\n\r\n', 2),
(11, 'GASTROWELL LOPÉRAMIDE', 'Ce médicament est un antidiarrhéique qui agit en ralentissant le transit intestinal et en réduisant les sécrétions intestinales.\r\n\r\nIl est utilisé dans le traitement symptomatique des diarrhées aiguës de l\'adulte, en complément des mesures diététiques.\r\n', 2),
(12, 'LOPÉRAMIDE LYOC', 'C\'est un antidiarrhéique qui agit en ralentissant le transit intestinal et en réduisant les sécrétions intestinales.\r\n\r\nIl est utilisé dans le traitement symptomatique des diarrhées, en complément des mesures diététiques.\r\n', 2),
(13, 'amoxicilline', 'L\'amoxicilline est un antibiotique β-lactamine bactéricide de la famille des aminopénicillines indiqué dans le traitement des infections bactériennes à germes sensibles', 3),
(14, 'gentamicine', 'La gentamicine est un antibiotique de la famille des aminoglycosides utilisé pour traiter divers types d\'infections bactériennes, en particulier celles provoquées par des bactéries à Gram négatif', 3),
(15, 'métronidazole', 'Le métronidazole est un antibiotique et antiparasitaire appartenant aux nitroimidazoles. Il inhibe la synthèse des acides nucléiques et est utilisé pour le traitement des infections liées à des bactéries anaérobies ainsi qu\'à des protozoaires.', 3),
(16, 'triméthoprime - sulfamétoxazole', 'Le co-trimoxazole est une association d\'antibiotiques bactériostatiques, le triméthoprime et le sulfaméthoxazole, dans une proportion de 1 à 5, utilisée pour traiter une variété d\'infections bactériennes.', 3);

-- --------------------------------------------------------

--
-- Structure de la table `pharmacie`
--

DROP TABLE IF EXISTS `pharmacie`;
CREATE TABLE IF NOT EXISTS `pharmacie` (
  `id_pharma` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pharma` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ville_pharma` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `cp_pharma` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `adresse_pharma` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `lng_pharmacie` float NOT NULL,
  `lar_pharmacie` float NOT NULL,
  PRIMARY KEY (`id_pharma`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `pharmacie`
--

INSERT INTO `pharmacie` (`id_pharma`, `nom_pharma`, `ville_pharma`, `cp_pharma`, `adresse_pharma`, `lng_pharmacie`, `lar_pharmacie`) VALUES
(1, 'Pharmacie Ultsch', 'Bar-le-duc', '558000', 'Rue Landry-Gillon', 5.15962, 48.7784),
(2, 'Pharmacie du Boulevard', 'Bar-le-Duc', '55800', 'Boulevard de la Rochelle', 5.16332, 48.7721);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `prenom_user` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mail_user` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mdp_user` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ville_user` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `cp_user` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `adresse_user` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `telephone_user` varchar(21) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`, `mail_user`, `mdp_user`, `ville_user`, `cp_user`, `adresse_user`, `telephone_user`) VALUES
(36, 'reiter', 'romain', 'romain', '$2y$10$Pw8zjqsTilTc3hSxDgBFiOtyGi0dlaiaJ642kKYGAx3QN8nDbwuy2', 'Noyer-Auzecour', '558000', '7 rue saint coppin', '0646042882'),
(45, 'dfhwdgnc', 'gf', 'b.b@com', '$2y$10$B8OEWL65JqXWyqJVgcbNR.0MV/hhqGzfgasMDd7a9Y1WhsmwbLXSO', 'dfh', 'dghx', 'dghx', 'gnj'),
(47, 'branlo', 'sio', 'aaa@aaa.com', '$2y$10$mvYsC2OjgyN76XvQGZP03uvhIcgEFwJh6fo0VjJ407zZRpUTsyqwi', 'bordel', 'de', 'putain', 'merde'),
(49, 'Admin', '  ', 'admin@gmail.com', '$2y$10$TZY9qqxd0kMlXgHYKHg4eeXvkrxJV5A6RjcGxXuKewW7Kfuw.Q3EG', 'rue admin', 'admin', '', '00000'),
(51, 'yuki', 'Chiyu', 'nadia1.schwaller@gmail.com', '$2y$10$cLjsQonxh3ggUz5UgzYZiuny7U/BlSJ3d8nrzHKJMxr11Mq8WOcga', 'je sais pas', '57535', 'rue de l\'a paix', '0632646022'),
(52, 'Ferro', 'Pierre', 'pierre.ferro.pro@gmail', '$2y$10$eJM5czzsS33I9zBF2iYQIuNYUlWn.jimZHBjXaDb9tuCsS8AijA9e', 'bar le duc', '55000', '2 reu  du chene', '0000000000'),
(54, 'test', 'inscription', 'test.inscription@par.romain', '$2y$10$AE1tzDcr1uXZM/2HUrR59e3c0eXIqKBmFgqnLZXQsPNVjX3csZ0g6', '123456', '558000', 'mdp', '123456');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `command_pharmacie_FK` FOREIGN KEY (`id_pharma`) REFERENCES `pharmacie` (`id_pharma`),
  ADD CONSTRAINT `command_user0_FK` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `relation4_command0_FK` FOREIGN KEY (`id_command`) REFERENCES `commande` (`id_command`),
  ADD CONSTRAINT `relation4_medicament_FK` FOREIGN KEY (`id_medoc`) REFERENCES `medicament` (`id_medoc`);

--
-- Contraintes pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD CONSTRAINT `medicament_categorie_FK` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
