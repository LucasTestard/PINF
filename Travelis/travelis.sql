-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 02 mai 2020 à 13:00
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

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
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `heure` datetime NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `nom_etablissement` varchar(255) NOT NULL,
  `client_diffculte_joindre_reservation` tinyint(1) NOT NULL,
  `date_difficulte` date NOT NULL,
  `heure_difficulte` datetime NOT NULL,
  `retard` tinyint(1) NOT NULL,
  `motif_retard` text NOT NULL,
  `vehicule_panne_accident` tinyint(1) NOT NULL,
  `circonstance_panne_accident` text NOT NULL,
  `autre_info_reclamation` text NOT NULL,
  `actions_conducteur` text NOT NULL,
  `traitement_id_user` int(11) NOT NULL,
  `traitement_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vehicule` (`id_vehicule`),
  KEY `id_user` (`id_user`),
  KEY `traitement_id_user` (`traitement_id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_journaliere`
--

DROP TABLE IF EXISTS `fiche_journaliere`;
CREATE TABLE IF NOT EXISTS `fiche_journaliere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_fiche_mensuelle` int(11) NOT NULL,
  `id_user_modif` int(11) DEFAULT NULL,
  `temps_attente` time DEFAULT NULL,
  `carburant_euro` float DEFAULT NULL,
  `date_envoi` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fiche_journaliere` (`id_fiche_mensuelle`),
  KEY `id_user` (`id_user`),
  KEY `id_vehicule` (`id_vehicule`),
  KEY `id_user_modif` (`id_user_modif`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fiche_journaliere`
--

INSERT INTO `fiche_journaliere` (`id`, `id_user`, `id_vehicule`, `date`, `id_fiche_mensuelle`, `id_user_modif`, `temps_attente`, `carburant_euro`, `date_envoi`) VALUES
(1, 4, 1, '2020-04-01', 1, NULL, NULL, NULL, '2020-05-02'),
(2, 4, 3, '2020-04-02', 1, NULL, '02:15:00', NULL, '2020-05-02'),
(3, 4, 3, '2020-04-04', 1, NULL, NULL, NULL, '2020-05-02'),
(4, 4, 1, '2020-04-05', 1, NULL, NULL, NULL, '2020-05-02'),
(5, 4, 1, '2020-04-12', 1, NULL, '00:15:00', NULL, '2020-05-02'),
(7, 4, 1, '2020-05-01', 2, NULL, '00:15:00', 17.55, '2020-05-02'),
(8, 4, 1, '2020-05-10', 2, NULL, '15:00:00', 15, '2020-05-02'),
(9, 4, 1, '2020-05-01', 2, 4, '00:00:00', 0.45, '2020-05-02');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fiche_mensuelle`
--

INSERT INTO `fiche_mensuelle` (`id`, `date`, `id_user`) VALUES
(1, '2020-04-01', 4),
(2, '2020-05-01', 4);

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
-- Structure de la table `prise_en_charge`
--

DROP TABLE IF EXISTS `prise_en_charge`;
CREATE TABLE IF NOT EXISTS `prise_en_charge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prise_en_charge` varchar(255) NOT NULL,
  `absent` varchar(5) NOT NULL,
  `observation` varchar(255) DEFAULT NULL,
  `id_vacation` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vacation` (`id_vacation`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prise_en_charge`
--

INSERT INTO `prise_en_charge` (`id`, `prise_en_charge`, `absent`, `observation`, `id_vacation`) VALUES
(1, 'az', 'a', '', 1),
(2, 'z', 'z', '', 2),
(3, '44', '44', '', 3),
(4, '44', '44', '', 4),
(5, 'a', 'a', '', 5),
(7, 'a', 'a', '', 7),
(8, '333', '3', '', 8),
(9, 'a', 'a', 'a', 9);

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
  `login` varchar(255) NOT NULL,
  `passe` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `droit`, `login`, `passe`) VALUES
(1, 'Bendris', 'Yannis', 2, 'Yannis', 'mysql'),
(2, 'aa', 'aa', 0, 'aa', 'aa'),
(3, 'aaa', 'aaa', 0, 'aaa', 'aaa'),
(4, 'Ben', 'Yan', 0, 'yben', 'mysql');

-- --------------------------------------------------------

--
-- Structure de la table `vacation`
--

DROP TABLE IF EXISTS `vacation`;
CREATE TABLE IF NOT EXISTS `vacation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heure_depart` time NOT NULL,
  `km_depart` int(11) NOT NULL,
  `premiere_prise_en_charge` time NOT NULL,
  `heure_retour` time NOT NULL,
  `km_retour` int(11) NOT NULL,
  `id_fiche_journaliere` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_fiche_journaliere` (`id_fiche_journaliere`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vacation`
--

INSERT INTO `vacation` (`id`, `heure_depart`, `km_depart`, `premiere_prise_en_charge`, `heure_retour`, `km_retour`, `id_fiche_journaliere`) VALUES
(1, '11:11:00', 12, '12:12:00', '13:13:00', 13, 1),
(2, '14:14:00', 14, '15:15:00', '15:16:00', 16, 2),
(3, '11:12:00', 12, '12:12:00', '13:13:00', 13, 3),
(4, '11:12:00', 12, '12:12:00', '13:13:00', 13, 4),
(5, '13:13:00', 14, '14:14:00', '15:15:00', 55, 5),
(7, '11:11:00', 12, '12:12:00', '13:03:00', 13, 7),
(8, '22:22:00', 22, '22:32:00', '23:33:00', 333, 8),
(9, '20:20:00', 20, '21:21:00', '21:25:00', 211, 9);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id`, `immatriculation`, `type_vehicule`, `km`) VALUES
(1, '9999', '1', 123),
(2, 'ax-218-bx', '1\r\n', 152),
(3, 'av-915-bj', '1', 0);

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
  ADD CONSTRAINT `fiche_journaliere_ibfk_2` FOREIGN KEY (`id_fiche_mensuelle`) REFERENCES `fiche_mensuelle` (`id`),
  ADD CONSTRAINT `fiche_journaliere_ibfk_3` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id`),
  ADD CONSTRAINT `fiche_journaliere_ibfk_4` FOREIGN KEY (`id_user_modif`) REFERENCES `user` (`id`);

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
-- Contraintes pour la table `prise_en_charge`
--
ALTER TABLE `prise_en_charge`
  ADD CONSTRAINT `prise_en_charge_ibfk_1` FOREIGN KEY (`id_vacation`) REFERENCES `vacation` (`id`);

--
-- Contraintes pour la table `vacation`
--
ALTER TABLE `vacation`
  ADD CONSTRAINT `vacation_ibfk_2` FOREIGN KEY (`id_fiche_journaliere`) REFERENCES `fiche_journaliere` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
