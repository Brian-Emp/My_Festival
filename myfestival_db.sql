-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 20 oct. 2025 à 12:07
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myfestival_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id_activite` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `lieu` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `heure_debut` time NOT NULL,
  PRIMARY KEY (`id_activite`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id_activite`, `titre`, `description`, `lieu`, `heure_debut`) VALUES
(1, 'Yoga Matinal', 'Cours de yoga doux pour bien commencer la journée et se détendre avant le rush.', 'Prairie Zen', '09:00:00'),
(2, 'Tournoi de Pétanque', 'Compétition amicale de pétanque, inscription sur place en doublette.', 'Terrain de Boules', '14:00:00'),
(3, 'Atelier Cocktails', 'Apprenez à faire des cocktails sans alcool avec des fruits locaux de l\'Ardèche.', 'Bar Éphémère', '16:30:00'),
(4, 'Chasse au Trésor', 'Grande chasse à travers le site du festival, réservez votre équipe !', 'Accueil Principal', '11:00:00'),
(5, 'Blind Test Géant', 'Testez vos connaissances musicales sur tous les genres, avec de nombreux lots à gagner.', 'Tente Animation', '18:00:00'),
(6, 'Initiation au Slackline', 'Apprenez à marcher sur une sangle tendue entre deux arbres. Équilibre et fun garantis !', 'Espace Détente', '15:00:00'),
(7, 'Yoga Matinal', 'Cours de yoga doux pour bien commencer la journée et se détendre avant le rush.', 'Prairie Zen', '09:00:00'),
(8, 'Tournoi de Pétanque', 'Compétition amicale de pétanque, inscription sur place en doublette.', 'Terrain de Boules', '14:00:00'),
(9, 'Atelier Cocktails', 'Apprenez à faire des cocktails sans alcool avec des fruits locaux de l\'Ardèche.', 'Bar Éphémère', '16:30:00'),
(10, 'Chasse au Trésor', 'Grande chasse à travers le site du festival, réservez votre équipe !', 'Accueil Principal', '11:00:00'),
(11, 'Blind Test Géant', 'Testez vos connaissances musicales sur tous les genres, avec de nombreux lots à gagner.', 'Tente Animation', '18:00:00'),
(12, 'Initiation au Slackline', 'Apprenez à marcher sur une sangle tendue entre deux arbres. Équilibre et fun garantis !', 'Espace Détente', '15:00:00'),
(13, 'Yoga Matinal', 'Cours de yoga doux pour bien commencer la journée et se détendre avant le rush.', 'Prairie Zen', '09:00:00'),
(14, 'Tournoi de Pétanque', 'Compétition amicale de pétanque, inscription sur place en doublette.', 'Terrain de Boules', '14:00:00'),
(15, 'Atelier Cocktails', 'Apprenez à faire des cocktails sans alcool avec des fruits locaux de l\'Ardèche.', 'Bar Éphémère', '16:30:00'),
(16, 'Chasse au Trésor', 'Grande chasse à travers le site du festival, réservez votre équipe !', 'Accueil Principal', '11:00:00'),
(17, 'Blind Test Géant', 'Testez vos connaissances musicales sur tous les genres, avec de nombreux lots à gagner.', 'Tente Animation', '18:00:00'),
(18, 'Initiation au Slackline', 'Apprenez à marcher sur une sangle tendue entre deux arbres. Équilibre et fun garantis !', 'Espace Détente', '15:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `concert`
--

DROP TABLE IF EXISTS `concert`;
CREATE TABLE IF NOT EXISTS `concert` (
  `id_concert` int NOT NULL AUTO_INCREMENT,
  `nom_artiste` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `duree_set` time NOT NULL,
  `heure_debut` time NOT NULL,
  `nom_scene` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_concert`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `concert`
--

INSERT INTO `concert` (`id_concert`, `nom_artiste`, `duree_set`, `heure_debut`, `nom_scene`) VALUES
(1, 'La Décharge', '01:30:00', '22:00:00', 'Scène Principale'),
(2, 'Electro-Choc', '00:45:00', '19:30:00', 'Le Dôme'),
(3, 'Jazzy Mood', '01:15:00', '21:00:00', 'Scène Forêt'),
(4, 'The Rockers', '02:00:00', '23:30:00', 'Scène Principale'),
(5, 'DJ Funky', '01:00:00', '00:30:00', 'Le Dôme'),
(6, 'Acoustic Soul', '00:50:00', '18:00:00', 'Scène Forêt'),
(7, 'La Décharge', '01:30:00', '22:00:00', 'Scène Principale'),
(8, 'Electro-Choc', '00:45:00', '19:30:00', 'Le Dôme'),
(9, 'Jazzy Mood', '01:15:00', '21:00:00', 'Scène Forêt'),
(10, 'The Rockers', '02:00:00', '23:30:00', 'Scène Principale'),
(11, 'DJ Funky', '01:00:00', '00:30:00', 'Le Dôme'),
(12, 'Acoustic Soul', '00:50:00', '18:00:00', 'Scène Forêt'),
(13, 'La Décharge', '01:30:00', '22:00:00', 'Scène Principale'),
(14, 'Electro-Choc', '00:45:00', '19:30:00', 'Le Dôme'),
(15, 'Jazzy Mood', '01:15:00', '21:00:00', 'Scène Forêt'),
(16, 'The Rockers', '02:00:00', '23:30:00', 'Scène Principale'),
(17, 'DJ Funky', '01:00:00', '00:30:00', 'Le Dôme'),
(18, 'Acoustic Soul', '00:50:00', '18:00:00', 'Scène Forêt');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id_utilisateur` int NOT NULL,
  `id_activite` int NOT NULL,
  `date_inscription` datetime NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_activite`),
  KEY `fk_inscription_activite` (`id_activite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id_utilisateur`, `id_activite`, `date_inscription`) VALUES
(1, 1, '2025-10-20 14:02:17'),
(1, 2, '2025-10-20 14:02:17'),
(2, 3, '2025-10-20 14:02:17'),
(2, 5, '2025-10-20 14:02:17'),
(3, 4, '2025-10-20 14:02:17');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `contenue_message` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_envoi_message` datetime NOT NULL,
  `id_utilisateur` int NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_message`, `contenue_message`, `date_envoi_message`, `id_utilisateur`) VALUES
(7, 'Salut Bob ! Tu vas voir The Rockers ce soir ?', '2025-10-20 13:56:47', 1),
(8, 'Salut Alice ! Oui, et toi ? Je suis aussi inscrit au Blind Test géant !', '2025-10-20 13:58:47', 2),
(9, 'Super ! Je m\'inscris au Blind Test aussi, à tout à l\'heure !', '2025-10-20 14:00:47', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `email`, `mot_de_passe`, `nom`, `prenom`) VALUES
(1, 'alice@festival.com', '*94BDCEBE19083CE2A1F9E345591C3F77AC2B27E3', 'Dupont', 'Alice'),
(2, 'bob@festival.com', '*94BDCEBE19083CE2A1F9E345591C3F77AC2B27E3', 'Martin', 'Bob'),
(3, 'charlie@festival.com', '*94BDCEBE19083CE2A1F9E345591C3F77AC2B27E3', 'Lefevre', 'Charlie');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `fk_inscription_activite` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_inscription_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
