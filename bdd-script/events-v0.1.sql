-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 18 déc. 2023 à 10:55
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `evnt`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `idEvent` int NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `dateEvnt` datetime DEFAULT NULL,
  `timeEvnt` int DEFAULT NULL,
  `adress` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `priceInfo` varchar(50) DEFAULT NULL,
  `nbParticipants` int DEFAULT NULL,
  `isFreeEntry` varchar(50) DEFAULT NULL,
  `idUser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`idEvent`, `title`, `dateEvnt`, `timeEvnt`, `adress`, `description`, `price`, `priceInfo`, `nbParticipants`, `isFreeEntry`, `idUser`) VALUES
(1, 'Event 1', '2023-05-10 00:00:00', 1800, 'Address 1', 'Event description 1', '20', 'Early bird discount available', 50, 'No', 1),
(2, 'Event 2', '2023-05-15 00:00:00', 1900, 'Address 2', 'Event description 2', 'Free', 'Limited spots available', 30, 'Yes', 2),
(3, 'Event 3', '2023-05-20 00:00:00', 2000, 'Address 3', 'Event description 3', '15', 'Special group rates', 40, 'No', 3),
(4, 'Event 4', '2023-06-01 00:00:00', 1700, 'Address 4', 'Event description 4', '25', 'Food and drinks included', 60, 'No', 4),
(5, 'Event 5', '2023-06-05 00:00:00', 2100, 'Address 5', 'Event description 5', '30', 'VIP packages available', 80, 'No', 5),
(6, 'Event 6', '2023-06-10 00:00:00', 1930, 'Address 6', 'Event description 6', '10', 'Student discount available', 70, 'Yes', 6),
(7, 'Event 7', '2023-06-15 00:00:00', 1800, 'Address 7', 'Event description 7', '50', 'Exclusive access for members', 100, 'No', 7),
(8, 'Event 8', '2023-06-20 00:00:00', 2000, 'Address 8', 'Event description 8', '40', 'Cocktail reception included', 90, 'No', 8),
(9, 'Event 9', '2023-06-25 00:00:00', 1830, 'Address 9', 'Event description 9', 'Free', 'Limited seats available', 30, 'Yes', 9),
(10, 'Event 10', '2023-07-01 00:00:00', 2100, 'Address 10', 'Event description 10', '60', 'Dinner and entertainment', 120, 'No', 10),
(11, 'afazfaz', '0156-03-10 00:00:00', NULL, 'faz1az', '561azf', '15', ' ', 1, 'on', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`idEvent`),
  ADD KEY `idUser` (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `idEvent` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
