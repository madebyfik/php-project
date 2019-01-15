-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 15 jan. 2019 à 12:38
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `list_tache`
--

DROP TABLE IF EXISTS `list_tache`;
CREATE TABLE IF NOT EXISTS `list_tache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `list_tache`
--

INSERT INTO `list_tache` (`id`, `nom`, `public`, `id_utilisateur`) VALUES
(27, 'fkurklu', 0, 2),
(41, 'test public', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `id_list` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_list` (`id_list`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`id`, `nom`, `description`, `completed`, `id_list`) VALUES
(23, 'fjikretqsdfsd', 'fdsqfsd', 0, 41);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mail`, `password`) VALUES
(1, 'QLF', 'Fikret', 'fikret63@hotmail.fr', '$2y$12$8fGnMpftpnUWLFMx5teoj.DuTvV7UX9EZh1cYJSM/uOP4OTTgDtYi'),
(2, 'Kurklu', 'Fikret', 'fkurklu68@gmail.com', '$2y$12$GjJsToRcCf70.up0nSlc1u1FsUPWdEZXCMdRZZ8wdH2pasLzeIJ2y'),
(3, 'Depardieu', 'GÃ©rard', 'gege.depardieu@gmail.com', '$2y$12$4B5kMLAz9Z23oFgfLuVyZOq6q2aEooYQ4k9EwPkM0iQGK7.EcUxQm');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `list_tache`
--
ALTER TABLE `list_tache`
  ADD CONSTRAINT `list_tache_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `tache_ibfk_1` FOREIGN KEY (`id_list`) REFERENCES `list_tache` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
