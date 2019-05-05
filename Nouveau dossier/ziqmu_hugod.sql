-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 08 Octobre 2018 à 13:11
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ziqmu_hugod`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(3) NOT NULL,
  `dates_cours` int(1) DEFAULT NULL,
  `heure_cours` char(5) DEFAULT NULL,
  `id_enseignant` int(3) DEFAULT NULL,
  `id_type` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `enseignant` (
  `id_enseignant` int(3) NOT NULL,
  `nom_enseignant` char(50) DEFAULT NULL,
  `prenom_enseignant` char(15) DEFAULT NULL,
  `dateNaissance_enseignant` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `inscription` (
  `id_inscrit` int(3) NOT NULL DEFAULT '0',
  `id_cours` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`id_inscrit`, `id_cours`) VALUES
(1, 1),
(2, 1),
(7, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(8, 2),
(9, 2);

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

CREATE TABLE `inscrit` (
  `id_inscrit` int(3) NOT NULL,
  `nom_inscrit` char(50) DEFAULT NULL,
  `prenom_inscrit` char(5) DEFAULT NULL,
  `email_inscrit` char(80) NOT NULL,
  `dateNaissance_inscrit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscrit`
--

INSERT INTO `inscrit` (`id_inscrit`, `nom_inscrit`, `prenom_inscrit`, `email_inscrit`, `dateNaissance_inscrit`) VALUES
(1, 'DAVID', 'hugo', 'hugo__david@hotmail.fr', '1997-04-15'),
(2, 'JJ', 'gg', 'gg', '2018-01-01'),
(3, 'GGG', 'ggg', 'fff', '2018-01-01'),
(4, 'GGGG', 'ffff', 'ggggg', '2018-01-01'),
(5, 'GGGGG', 'ggggg', 'ggggggh', '2018-01-01'),
(6, 'AZE', 'za', 'e', '2018-01-01'),
(7, 'EEEE', '', '', '2018-01-01'),
(8, 'A', 'a', '', '2018-01-01'),
(9, 'B', 'b', '', '2018-01-01'),
(10, 'B', 'b', '', '2018-01-01'),
(11, 'E', 'e', '', '2018-01-01'),
(12, 'U', 'u', '', '2018-01-01'),
(13, 'CD', 'Cd', '', '2018-01-01'),
(14, 'DF', 'Fd', '', '2018-01-01'),
(15, 'HG', 'Hg', '', '2018-01-01');

-- --------------------------------------------------------

--
-- Structure de la table `type_cours`
--

CREATE TABLE `type_cours` (
  `id_type` int(3) NOT NULL,
  `libelle_type` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_cours`
--

INSERT INTO `type_cours` (`id_type`, `libelle_type`) VALUES
(1, 'guitare'),
(2, 'basse'),
(3, 'batterie');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`),
  ADD KEY `id_enseignant` (`id_enseignant`),
  ADD KEY `id_type` (`id_type`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id_enseignant`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id_inscrit`,`id_cours`),
  ADD KEY `id_cours` (`id_cours`);

--
-- Index pour la table `inscrit`
--
ALTER TABLE `inscrit`
  ADD PRIMARY KEY (`id_inscrit`);

--
-- Index pour la table `type_cours`
--
ALTER TABLE `type_cours`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id_enseignant` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `inscrit`
--
ALTER TABLE `inscrit`
  MODIFY `id_inscrit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `type_cours`
--
ALTER TABLE `type_cours`
  MODIFY `id_type` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
