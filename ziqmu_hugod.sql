-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 14 Octobre 2018 à 18:50
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ziqmu_hugod`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
  `id_cours` int(3) NOT NULL AUTO_INCREMENT,
  `dates_cours` int(2) DEFAULT NULL,
  `heure_cours` char(5) DEFAULT NULL,
  `id_enseignant` int(3) DEFAULT NULL,
  `id_type` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_cours`),
  KEY `id_enseignant` (`id_enseignant`),
  KEY `id_type` (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `dates_cours`, `heure_cours`, `id_enseignant`, `id_type`) VALUES
(1, 1, '16h00', 1, 1),
(2, 1, '16h00', 2, 2),
(3, 2, '17h00', 1, 1),
(4, 2, '17h00', 2, 2),
(5, 3, '16h00', 1, 1),
(6, 3, '16h00', 2, 2),
(7, 4, '17h00', 1, 1),
(8, 4, '17h00', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE IF NOT EXISTS `enseignant` (
  `id_enseignant` int(3) NOT NULL AUTO_INCREMENT,
  `nom_enseignant` char(50) DEFAULT NULL,
  `prenom_enseignant` char(15) DEFAULT NULL,
  `dateNaissance_enseignant` date DEFAULT NULL,
  PRIMARY KEY (`id_enseignant`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `enseignant`
--

INSERT INTO `enseignant` (`id_enseignant`, `nom_enseignant`, `prenom_enseignant`, `dateNaissance_enseignant`) VALUES
(1, 'DUPUIT', 'Marc', '1986-06-22'),
(2, 'DESCHAMPS', 'Franck', '1966-04-26'),
(3, 'DUPAIN', 'Laura', '1995-02-19');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
  `id_inscrit` int(3) NOT NULL DEFAULT '0',
  `id_cours` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_inscrit`,`id_cours`),
  KEY `id_cours` (`id_cours`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`id_inscrit`, `id_cours`) VALUES
(1, 1),
(3, 1),
(5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

CREATE TABLE IF NOT EXISTS `inscrit` (
  `id_inscrit` int(3) NOT NULL AUTO_INCREMENT,
  `nom_inscrit` char(50) DEFAULT NULL,
  `prenom_inscrit` char(50) DEFAULT NULL,
  `email_inscrit` char(60) NOT NULL,
  `dateNaissance_inscrit` date DEFAULT NULL,
  PRIMARY KEY (`id_inscrit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `inscrit`
--

INSERT INTO `inscrit` (`id_inscrit`, `nom_inscrit`, `prenom_inscrit`, `email_inscrit`, `dateNaissance_inscrit`) VALUES
(1, 'A', 'A', 'a', '2018-01-01'),
(2, 'MARC', 'Dufou', 'a', '2018-01-01'),
(3, 'B', 'B', 'b', '2018-01-01'),
(4, 'DADADA', 'Fffff', 'fffffff', '2018-01-01'),
(5, 'DADADA', 'Ffffff', 'fffffff', '2018-01-01'),
(6, 'A', 'A', 'a', '2018-01-01'),
(7, 'A', 'A', 'a', '2018-01-01'),
(8, 'A', 'A', 'a', '2018-01-01'),
(9, 'A', 'A', 'a', '2018-01-01'),
(10, 'A', 'A', 'a', '2018-01-01'),
(11, 'A', 'A', 'a', '2018-01-01'),
(12, 'B', 'B', 'b', '2018-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `type_cours`
--

CREATE TABLE IF NOT EXISTS `type_cours` (
  `id_type` int(3) NOT NULL AUTO_INCREMENT,
  `libelle_type` char(30) DEFAULT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `type_cours`
--

INSERT INTO `type_cours` (`id_type`, `libelle_type`) VALUES
(1, 'Guitare'),
(2, 'Basse'),
(3, 'Batterie');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignant` (`id_enseignant`),
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `type_cours` (`id_type`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`id_inscrit`) REFERENCES `inscrit` (`id_inscrit`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id_cours`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
