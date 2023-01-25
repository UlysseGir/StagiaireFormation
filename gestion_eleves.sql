-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 08 déc. 2022 à 16:56
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_eleves`
--

-- --------------------------------------------------------

--
-- Structure de la table `formateurs`
--

CREATE TABLE `formateurs` (
  `ID_FORMATEUR` varchar(20) NOT NULL,
  `ID_SALLE` varchar(20) NOT NULL,
  `NOM_FORMATEUR` varchar(30) DEFAULT NULL,
  `PRENOM_FORMATEUR` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formateurs`
--

INSERT INTO `formateurs` (`ID_FORMATEUR`, `ID_SALLE`, `NOM_FORMATEUR`, `PRENOM_FORMATEUR`) VALUES
('1', '1', 'Dupont', 'Robert'),
('2', '2', 'Martin', 'Jean'),
('3', '3', 'Durand', 'Paul'),
('4', '3', 'Duval', 'Alain');

-- --------------------------------------------------------

--
-- Structure de la table `nationnalite`
--

CREATE TABLE `nationnalite` (
  `ID_NATIONNALITE` varchar(20) NOT NULL,
  `LIBELLE_NATIONNALITE` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `nationnalite`
--

INSERT INTO `nationnalite` (`ID_NATIONNALITE`, `LIBELLE_NATIONNALITE`) VALUES
('1', 'français'),
('2', 'anglais');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `NUMERO_SALLE` int(11) DEFAULT NULL,
  `ID_SALLE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`NUMERO_SALLE`, `ID_SALLE`) VALUES
(101, '1'),
(102, '2'),
(103, '3');

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

CREATE TABLE `stagiaire` (
  `id_stagiaire` varchar(20) NOT NULL,
  `nom_stagiaire` varchar(30) NOT NULL,
  `prenom_stagiaire` varchar(30) NOT NULL,
  `id_formation` varchar(11) NOT NULL,
  `id_nationnalite` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stagiaire`
--

INSERT INTO `stagiaire` (`id_stagiaire`, `nom_stagiaire`, `prenom_stagiaire`, `id_formation`, `id_nationnalite`) VALUES
('639208e87939c', 'Giraud', 'Ulysse', '1', '1');

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire_formateur`
--

CREATE TABLE `stagiaire_formateur` (
  `ID_STAGIAIRE` varchar(20) NOT NULL,
  `ID_FORMATEUR` varchar(20) NOT NULL,
  `DATE_DEBUT` date DEFAULT NULL,
  `DATE_FIN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stagiaire_formateur`
--

INSERT INTO `stagiaire_formateur` (`ID_STAGIAIRE`, `ID_FORMATEUR`, `DATE_DEBUT`, `DATE_FIN`) VALUES
('639208e87939c', '1', '2022-12-01', '2022-12-30');

-- --------------------------------------------------------

--
-- Structure de la table `type_de_formation`
--

CREATE TABLE `type_de_formation` (
  `ID_FORMATION` varchar(20) NOT NULL,
  `LIBELLE_FORMATION` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_de_formation`
--

INSERT INTO `type_de_formation` (`ID_FORMATION`, `LIBELLE_FORMATION`) VALUES
('1', 'web designer'),
('2', 'developper'),
('3', 'cyber seccurité');

-- --------------------------------------------------------

--
-- Structure de la table `type_formation_formateur`
--

CREATE TABLE `type_formation_formateur` (
  `ID_FORMATEUR` varchar(20) NOT NULL,
  `ID_FORMATION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_formation_formateur`
--

INSERT INTO `type_formation_formateur` (`ID_FORMATEUR`, `ID_FORMATION`) VALUES
('1', '1'),
('2', '1'),
('3', '2'),
('4', '2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `formateurs`
--
ALTER TABLE `formateurs`
  ADD PRIMARY KEY (`ID_FORMATEUR`),
  ADD KEY `FK_APPARTIENT` (`ID_SALLE`);

--
-- Index pour la table `nationnalite`
--
ALTER TABLE `nationnalite`
  ADD PRIMARY KEY (`ID_NATIONNALITE`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`ID_SALLE`);

--
-- Index pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD PRIMARY KEY (`id_stagiaire`),
  ADD KEY `id_formation` (`id_formation`),
  ADD KEY `id_nationnalite` (`id_nationnalite`);

--
-- Index pour la table `stagiaire_formateur`
--
ALTER TABLE `stagiaire_formateur`
  ADD PRIMARY KEY (`ID_STAGIAIRE`,`ID_FORMATEUR`);

--
-- Index pour la table `type_de_formation`
--
ALTER TABLE `type_de_formation`
  ADD PRIMARY KEY (`ID_FORMATION`);

--
-- Index pour la table `type_formation_formateur`
--
ALTER TABLE `type_formation_formateur`
  ADD PRIMARY KEY (`ID_FORMATEUR`,`ID_FORMATION`),
  ADD KEY `FK_TYPE_FORMATION_FORMATUER` (`ID_FORMATION`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formateurs`
--
ALTER TABLE `formateurs`
  ADD CONSTRAINT `FK_APPARTIENT` FOREIGN KEY (`ID_SALLE`) REFERENCES `salle` (`ID_SALLE`);

--
-- Contraintes pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD CONSTRAINT `stagiaire_ibfk_1` FOREIGN KEY (`id_nationnalite`) REFERENCES `nationnalite` (`ID_NATIONNALITE`),
  ADD CONSTRAINT `stagiaire_ibfk_2` FOREIGN KEY (`id_formation`) REFERENCES `type_de_formation` (`ID_FORMATION`);

--
-- Contraintes pour la table `stagiaire_formateur`
--
ALTER TABLE `stagiaire_formateur`
  ADD CONSTRAINT `stagiaire_formateur_ibfk_1` FOREIGN KEY (`ID_STAGIAIRE`) REFERENCES `stagiaire` (`id_stagiaire`);

--
-- Contraintes pour la table `type_formation_formateur`
--
ALTER TABLE `type_formation_formateur`
  ADD CONSTRAINT `FK_TYPE_FORMATION_FORMATUER` FOREIGN KEY (`ID_FORMATION`) REFERENCES `type_de_formation` (`ID_FORMATION`),
  ADD CONSTRAINT `FK_TYPE_FORMATION_FORMATUER2` FOREIGN KEY (`ID_FORMATEUR`) REFERENCES `formateurs` (`ID_FORMATEUR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
