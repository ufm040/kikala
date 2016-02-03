-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 03 Février 2016 à 12:39
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `wf3-kikala`
--

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE IF NOT EXISTS `formations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateFormation` datetime NOT NULL,
  `place` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` time(2) NOT NULL,
  `userId` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalNumberPlace` int(3) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` int(40) NOT NULL,
  `topAnnulation` tinyint(1) NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=68 ;

--
-- Contenu de la table `formations`
--

INSERT INTO `formations` (`id`, `title`, `dateFormation`, `place`, `duration`, `userId`, `description`, `image`, `totalNumberPlace`, `address`, `zip`, `city`, `country`, `topAnnulation`, `dateCreated`) VALUES
(37, 'Le chocolat pour la saint valentin ', '2016-02-13 10:18:59', '', '02:30:00.00', 5, 'Apprenez à faire un beau glaçage avec du chocolat pour la saint valentin !', '', 6, '215 rue de la Convention', '75015', 'Paris', 0, 0, '2016-02-03 10:18:59'),
(38, 'Le chocolat pour pâques !', '2016-03-26 10:21:09', '', '03:00:00.00', 5, 'Apprendre à faire un oeuf de pâques tout beau et tout brillant !', '', 6, '215 rue de la Convention', '75015', 'Paris', 0, 0, '2016-02-03 10:21:09'),
(39, 'Le chocolat', '2016-04-30 10:23:29', '', '02:00:00.00', 5, 'Découverte de produits chocolatés ...une surprise vous attend !', '', 6, '215 rue de la Convention', '75015', 'Paris', 0, 0, '2016-02-03 10:23:29'),
(40, 'Chanter 2 musiques de lady gaga', '2016-02-17 10:29:03', '', '02:00:00.00', 6, 'Apprendre à chanter "poker face", "born this way"', '', 4, 'Ecole de musique \r\n3 rue du chant infernal\r\n', '75006', 'Paris', 0, 0, '2016-02-03 10:29:03'),
(41, 'Chanter 2 musiques de lady gaga', '2016-04-06 10:32:26', '', '02:00:00.00', 6, 'Chanter "judas", "telephone" de" lady gaga', '56b1c92aba538.jpeg', 4, 'Ecole de musique\r\n3 rue du chant infernal', '75006', 'Paris', 0, 0, '2016-02-03 10:32:26'),
(42, 'Chanter 2 musiques de lady gaga', '2016-05-11 10:34:29', '', '02:00:00.00', 6, 'Chanter "bad romance" et "marry the night"', '56b1c9a5d888f.jpeg', 4, 'Ecole de musique \r\n3 rue du chant infernal', '75006', 'Paris', 0, 0, '2016-02-03 10:34:29'),
(43, 'Pompoponner son petit chien ', '2016-03-18 10:42:12', '', '01:30:00.00', 7, 'Apprendre à nettoyer correctement son chien ', '', 4, '34 rue de l''oublie', '67100', 'Strasbourg', 0, 0, '2016-02-03 10:42:12'),
(44, 'Apprendre à dresser son chien ', '2016-04-16 10:45:02', '', '02:00:00.00', 7, 'Savoir lui faire des trucs, genre donner la patte, assis, allonger comme dans nintendogs', '56b1cc1ee6250.jpeg', 4, '34 rue de l''oubli ', '67100', 'Strasbourg', 0, 0, '2016-02-03 10:45:02'),
(45, 'Les bases pour ien nourrir son chien ', '2016-05-13 10:46:09', '', '02:00:00.00', 7, 'Faire attention à l''alimentation de son chien', '56b1cc61cbce6.jpeg', 4, '34 rue de l''oubli', '67100', 'Strasbourg', 0, 0, '2016-02-03 10:46:09'),
(46, 'Code', '2016-03-05 10:51:55', '', '07:00:00.00', 8, 'Apprendre les bases de  html', '', 10, 'Hopital saint-vincent de paul\r\n64 rue denfert-rocheraud', '75014', 'Paris', 0, 0, '2016-02-03 10:51:55'),
(47, 'Code 2', '2016-06-04 10:54:24', '', '07:00:00.00', 8, 'Apprendre les bases de css', '', 10, 'Hopital saint vincent de paul\r\n64 rue denfert-rocheraud', '75014', 'Paris', 0, 0, '2016-02-03 10:54:24'),
(48, 'Code 3 ', '2016-06-10 10:56:06', '', '07:00:00.00', 8, 'Apprendre les bases de JavaScript (enfin déjà comprendre )', '', 10, 'Hopital saint vincent de paul ', '75014', 'Paris', 0, 0, '2016-02-03 10:56:06'),
(49, 'Parapente', '2016-04-03 11:03:59', '', '03:00:00.00', 9, 'Apprendre le parapente aux débutants ou intermédaires', '56b1d08f31f3a.jpeg', 3, 'Ecole de parapente', '05110', 'Claret', 0, 0, '2016-02-03 11:03:59'),
(50, 'Parapente', '2016-04-10 11:05:28', '', '03:00:00.00', 9, 'Session parapente pour les experts ', '56b1d0e8131a1.jpeg', 3, 'Ecole de parapente \r\n(vous ne pourrez pas vous tromper)', '05110', 'Claret', 0, 0, '2016-02-03 11:05:28'),
(51, 'Parapente 2 ', '2016-07-10 11:06:57', '', '04:00:00.00', 9, 'Apprendre le parapente pour les débutants et intermédiaires (session 2)', '56b1d141b330e.jpeg', 4, 'Ecole de parapente ', '05110', 'Claret', 0, 0, '2016-02-03 11:06:57'),
(52, 'Parapente 2', '2016-07-17 11:07:56', '', '04:00:00.00', 9, 'Session 2 pour les parapentistes experts ', '56b1d17c3fafb.jpeg', 4, 'Ecole de parapente', '05110', 'Claret', 0, 0, '2016-02-03 11:07:56'),
(53, 'Muscu des jambes', '2016-03-25 11:17:14', '', '02:00:00.00', 10, 'apprendre à se muscler en dessous de la ceinture avant l''été', '', 7, '141 rue marlius beriet', '69008', 'Lyon', 0, 0, '2016-02-03 11:17:14'),
(54, 'Muscu des bras ', '2016-05-19 11:19:37', '', '02:00:00.00', 10, 'Se muscler les bras ', '', 7, '141 rue marlius beriet', '69008', 'Lyon', 0, 0, '2016-02-03 11:19:37'),
(55, 'Muscu du tronc', '2016-05-26 11:22:42', '', '02:00:00.00', 10, 'Travailler essentiellement les abdos pour un ventre plat ou des tablettes de chocolat', '56b1d4c512998.jpeg', 7, '141 rue marlius beriet ', '69008', 'Lyon', 0, 0, '2016-02-03 11:22:42'),
(56, 'Apprendre la danse classique', '2016-09-05 11:28:35', '', '02:30:00.00', 11, 'Apprendre quelque pas et quelque saut ... attention aux courbatures', '', 5, '81 Rue de Trévise', '59000', 'Lille', 0, 0, '2016-02-03 11:28:35'),
(57, 'danse contemporaine', '2016-10-03 11:30:42', '', '02:30:00.00', 11, 'apprendre à bouger avec son corps avec une musique de sia ', '56b1d6d263571.jpeg', 5, '81 Rue de Trévise', '59000', 'Lille', 0, 0, '2016-02-03 11:30:42'),
(58, 'breakdance', '2016-11-07 11:32:07', '', '03:15:00.00', 11, 'Danse plus moderne et plus énergique pour les plus motivés', '56b1d72785190.jpeg', 5, '81 Rue de Trévise', '59000', 'Lille', 0, 0, '2016-02-03 11:32:07'),
(59, 'Art martial ', '2016-04-15 11:39:40', '', '03:00:00.00', 12, 'apprendre le karate en quelques heures ', '56b1d8ec176b4.jpeg', 12, '44 rue daguerre', '75014', 'Paris', 0, 0, '2016-02-03 11:39:40'),
(60, 'apprendre a tenir des baguettes', '2016-05-19 11:43:32', '', '01:15:00.00', 12, 'apprendre à quiconque à utiliser des baguettes !', '56b1d9d4c6144.jpeg', 15, 'Traiteur "Au bonheur de l''Asie"\r\n1 rue faubourg saint martin ', '75012', 'Paris', 0, 0, '2016-02-03 11:43:32'),
(61, 'Test culinaire ', '2016-02-11 11:47:22', '', '01:15:00.00', 12, 'Vous serez mes cobayes pour gouter ma cuisine culinaire chinoise ', '56b1daba68f29.jpeg', 17, 'Traiteur "Au Bonheur de l''Asie"\r\n1 rue faubourg saint martin', '75012', 'Paris', 0, 0, '2016-02-03 11:47:22'),
(62, 'yoga ', '2016-02-19 11:55:21', '', '01:30:00.00', 13, 'position simple pour commencer, femmes seulement ramener vos serviettes de bain afin detreen communion avec le sable', '56b1dc98efb22.jpeg', 6, 'plages de ploemeur', '56270', 'Ploemeur', 0, 0, '2016-02-03 11:55:21'),
(63, 'position du soleil', '2016-03-26 11:59:00', '', '02:00:00.00', 13, 'apprendre les positions qui représentent toutes les planètes (à l''aurore c''est mieux)', '56b1dd7451bc2.jpeg', 12, 'plage de ploemeur (Bretagne)\r\n', '56270', 'Ploemeur', 0, 0, '2016-02-03 11:59:00'),
(64, 'L''âme dans votre corps', '2016-04-23 12:00:24', '', '02:00:00.00', 13, 'Apprendre à dompter l''animal qui est en vous', '56b1ddc85110a.jpeg', 12, 'Plage de Ploemeur (Bretagne)', '56270', 'Ploemeur', 0, 0, '2016-02-03 12:00:24'),
(65, 'Apprendre à jouer à LOL', '2016-02-06 12:07:34', '', '04:00:00.00', 14, 'Apprendre à jouer à League Of Legends  ', '56b1df76db273.jpeg', 5, 'Meltdown Bar \r\n60 BIS Avenue du Pont Juvénal', '34000', 'Montpellier', 0, 0, '2016-02-03 12:07:34'),
(66, 'Apprendre à jouer à BO3 en zombie ', '2016-03-13 12:09:55', '', '05:00:00.00', 14, 'Apprendre à jouer à Call Of Duty Black Ops 3 ZOMBIE MODE + MULTI', '56b1e003b0369.jpeg', 3, 'Meltdown Bar \r\n60 BIS Avenue du Pont Juvénal', '34000', 'Montpellier', 0, 0, '2016-02-03 12:09:55'),
(67, 'Jouer à SplinterCell', '2016-03-27 12:11:50', '', '02:30:00.00', 14, 'Mission infiltration session de jeu en coop/multi/solo ', '56b1e0767ffe8.jpeg', 4, 'Meltdown Bar \r\n60 BIS Avenue du Pont Juvénal', '34000', 'Montpellier', 0, 0, '2016-02-03 12:11:50');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE IF NOT EXISTS `inscriptions` (
  `userId` int(11) NOT NULL,
  `formationId` int(11) NOT NULL,
  PRIMARY KEY (`userId`,`formationId`),
  KEY `formation_inscription` (`formationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenCookie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthyear` year(4) NOT NULL,
  `sex` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructorDescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentDescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` int(4) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=15 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `token`, `tokenCookie`, `lastname`, `firstname`, `birthyear`, `sex`, `job`, `instructorDescription`, `studentDescription`, `credit`, `image`, `dateCreated`) VALUES
(5, 'bibi123', 'bibi@gmail.com', '$2y$10$N9kNxgEJYcIzVn2CxHMx4OzZqFZlpY775ZH3oMUUElg.Sr8FklaVm', '', '', 'Bernard', 'Blazeur', 1965, 's', 'Chocolatier', 'Apprendre à utiliser le chocolat en respectant le produit', 'Apprendre tout et n''importe quoi !', 2, 'defaultImageUser.png', '2016-02-03 10:15:43'),
(6, 'ladygaga', 'ladygaga@gmail.com', '$2y$10$ew3M/cwNiH4gv1YjzE.g/OKmjCImbyXHssfTrMwrkClfejHbQiyuy', '', '', 'Stéphanie', 'Patois', 1987, 's', 'Chanteuse de rue ', 'Apprendre aux gens à chanter comme lady gaga', 'Recherche formations en rapport avec l''art', 2, '56b1c7d7c84a4.jpeg', '2016-02-03 10:26:47'),
(7, 'caramelo', 'caramelobestdogever@gmail.com', '$2y$10$EFmgFGfmzf/iN5M3iZRXtOswAaNZ9iVIEbVPg5h8kOdU6k6DdHxyC', '', '', 'Dupont', 'Micheline', 1952, 's', 'Retraité, donc j''ai tout mon temps', 'Je n''accepte que les personnes ayant des animaux de compagnie', 'Apprendre à faire des trcus de vieux avec mon petit chien Caramelo', 2, 'defaultImageUser.png', '2016-02-03 10:39:15'),
(8, 'geekdu13', 'geek@gmail.com', '$2y$10$2/IcNPAwm0Q6LGcrvraeSu/NGCWI4RypE8wJRQLvaBv10Lt5ARLMK', '', '', 'Plasto', 'Gaspard', 1990, 's', 'Intégrateur/Développeur web ', 'J''aime apprendre à coder et hacker !! ', 'Fan des petits ienchs trop cutie !', 2, '56b1cd5f3cbc4.jpeg', '2016-02-03 10:50:23'),
(9, 'fan2parapente', 'parabdou@gmail.com', '$2y$10$PIhMmCj.NkZ96sUvlxvhVuIBLZ9cuAVy.k3YkNHKZUH3t.9v5kMES', '', '', 'Abdi', 'Abdou', 1978, 's', 'Parapentiste', 'Apprendre aux hommes à voler comme des oiseaux', 'Je cherche à savoir cuisiner ', 2, '56b1d00c0caaf.jpeg', '2016-02-03 11:01:48'),
(10, 'misterBG', 'bgdumonde@gmail.com', '$2y$10$/ASEdg9fDjLKMkVCwskh9Oqz8QHH839qn/Ae6pEj1fJC0jxsWtuv6', '', '', 'Beaunito', 'Florentino', 1992, 's', 'Coach sportif', 'Apprendre aux femmes/hommes les bases de la msucu ', 'Suis fan protéine recherche cours de chimie pour en faire moi-même car à la longue ça coûte la peau du cul ', 2, '56b1d25c62e97.jpeg', '2016-02-03 11:11:40'),
(11, 'danseusetoile', 'dls@gmail.com', '$2y$10$OlZk4a/7bDoTvrOI6vQErOvt0EdW4cCFM/V/IGjKfqse/AUYIbG1e', '', '', 'Pietra', 'Vantine', 1989, 's', 'Danseuse pro ', 'Apprendre aux gens à se lâcher avec leur corps', 'apprendre à cuisiner, marre d''aller manger au resto tout le temps', 2, '56b1d5cc1ddad.jpeg', '2016-02-03 11:26:20'),
(12, 'asiateuro', 'asiateuro@gmail.com', '$2y$10$PyitXOcjmDE2LbipMx4cU.OPqFP6oj7ISFZalLCUqtfxdW71QV2ai', '', '', 'Nguyen', 'David', 1985, 's', 'Chef de son traiteur "Au Bonheur de l''Asie"', 'Apprendre à quiconque la culture asiatique dans n''importe quel domaine ', 'Je sais déjà tout pas besoin d''apprendre ', 2, 'defaultImageUser.png', '2016-02-03 11:37:15'),
(13, 'zenatittude', 'positive-attitude-zen@gmail.com', '$2y$10$jdeAXwh/YxJCFGZf09IegODsJyuRuEw37LqXd72P4mLAowHuT2uq6', '', '', 'Minérine', 'Mina', 1970, 's', 'prof de yoga pour les stars ', 'je redescends en bas de l''échelle pour donner des cours de yoga à de parfaits inconnus ', 'Aimerais avoir quelqu''un de mon niveau pour avoir une alimentaiton équilibrée', 2, '56b1dba5d98c8.jpeg', '2016-02-03 11:51:17'),
(14, 'PGMdu34', 'progamemaster@gmail.com', '$2y$10$LVgzO7orR7L99q0zCf6faOrEMyFDwvtJ16Rs7K4TV8MG.vYUR6m/a', '', '', 'Marcelin', 'Marcelino', 1994, 's', 'Chômage / essaye de percer en tant que youtuber ', 'Donner des tuyaux pour être bon en jeux vidéos sans toutefois dépasser mon niveau ', 'Apprendre à hacker pour jouer sans payer ', 2, '56b1ded813477.jpeg', '2016-02-03 12:04:56');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `formation_inscription` FOREIGN KEY (`formationId`) REFERENCES `formations` (`id`),
  ADD CONSTRAINT `user_inscription` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
