-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 08 fév. 2020 à 15:50
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `travelis`
--

-- --------------------------------------------------------

--
-- Structure de la table `fiche_information`
--

DROP TABLE IF EXISTS `fiche_information`;
CREATE TABLE IF NOT EXISTS `fiche_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_redaction` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `heure_redaction` time NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `nom_etablissement` varchar(255) NOT NULL,
  `date_difficulte` date NOT NULL,
  `heure_difficulte` time NOT NULL,
  `retard` tinyint(1) NOT NULL,
  `motif_retard` text NOT NULL,
  `difficulte_reservation` tinyint(1) NOT NULL,
  `date_incident` date NOT NULL,
  `heure_incident` time NOT NULL,
  `vehicule_panne_accident` tinyint(1) NOT NULL,
  `circonstance_panne_accident` text NOT NULL,
  `autre_info_reclamation` text NOT NULL,
  `actions_conducteur` text NOT NULL,
  `traitement_id_superuser` int(11) NOT NULL,
  `traitement_date` date NOT NULL,
  `traitement_desc` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vehicule` (`id_vehicule`),
  KEY `id_user` (`id_user`),
  KEY `traitement_id_user` (`traitement_id_superuser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_journaliere`
--

DROP TABLE IF EXISTS `fiche_journaliere`;
CREATE TABLE IF NOT EXISTS `fiche_journaliere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_fiche_mensuelle` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fiche_journaliere` (`id_fiche_mensuelle`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_mensuelle`
--

DROP TABLE IF EXISTS `fiche_mensuelle`;
CREATE TABLE IF NOT EXISTS `fiche_mensuelle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_reparation`
--

DROP TABLE IF EXISTS `fiche_reparation`;
CREATE TABLE IF NOT EXISTS `fiche_reparation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anomalies_constatees` text NOT NULL,
  `lieu_reparation` text NOT NULL,
  `travaux_effectues` text NOT NULL,
  `date_reparation` date NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vehicule` (`id_vehicule`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `droit` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vacation`
--

DROP TABLE IF EXISTS `vacation`;
CREATE TABLE IF NOT EXISTS `vacation` (
  `id` int(11) NOT NULL,
  `heure_depart` datetime NOT NULL,
  `km_depart` int(11) NOT NULL,
  `heure_retour` datetime NOT NULL,
  `km_retour` int(11) NOT NULL,
  `prise_en_charge` datetime NOT NULL,
  `absent` tinyint(1) NOT NULL,
  `observation` text NOT NULL,
  `modification_id_user` int(11) NOT NULL,
  `modification_date` date NOT NULL,
  `id_fiche_journaliere` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fiche_journaliere` (`id_fiche_journaliere`),
  KEY `modification_id_user` (`modification_id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `immatriculation` varchar(255) NOT NULL,
  `type_vehicule` varchar(255) NOT NULL,
  `km` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fiche_information`
--
ALTER TABLE `fiche_information`
  ADD CONSTRAINT `fiche_information_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fiche_information_ibfk_2` FOREIGN KEY (`traitement_id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fiche_information_ibfk_3` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id`);

--
-- Contraintes pour la table `fiche_journaliere`
--
ALTER TABLE `fiche_journaliere`
  ADD CONSTRAINT `fiche_journaliere_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fiche_journaliere_ibfk_2` FOREIGN KEY (`id_fiche_mensuelle`) REFERENCES `fiche_mensuelle` (`id`);

--
-- Contraintes pour la table `fiche_mensuelle`
--
ALTER TABLE `fiche_mensuelle`
  ADD CONSTRAINT `fiche_mensuelle_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `fiche_reparation`
--
ALTER TABLE `fiche_reparation`
  ADD CONSTRAINT `fiche_reparation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fiche_reparation_ibfk_2` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id`);

--
-- Contraintes pour la table `vacation`
--
ALTER TABLE `vacation`
  ADD CONSTRAINT `vacation_ibfk_1` FOREIGN KEY (`modification_id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `vacation_ibfk_2` FOREIGN KEY (`id_fiche_journaliere`) REFERENCES `fiche_journaliere` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;