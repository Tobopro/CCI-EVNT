-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 10 jan. 2024 à 08:39
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
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `idCategory` int NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idCategory`, `name`) VALUES
(1, 'Music'),
(2, 'Sports'),
(3, 'Food and Drink'),
(4, 'Technology'),
(5, 'Health and Wellness'),
(6, 'Arts and Culture'),
(7, 'Science'),
(8, 'Social'),
(9, 'Education'),
(10, 'Business');

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
  `isFreeEntry` tinyint(1) DEFAULT NULL,
  `idUser` int NOT NULL,
  `idCategory` int DEFAULT NULL,
  `urlImage` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nbLike` int NOT NULL DEFAULT '0',
  `nbReport` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`idEvent`, `title`, `dateEvnt`, `timeEvnt`, `adress`, `description`, `price`, `priceInfo`, `nbParticipants`, `isFreeEntry`, `idUser`, `idCategory`, `urlImage`, `nbLike`, `nbReport`) VALUES
(1, 'Event 1', '2023-05-10 00:00:00', 1800, 'Address 1', 'Event description 1', '20', 'Early bird discount available', 50, 0, 1, NULL, '', 0, 0),
(2, 'Event 2', '2023-05-15 00:00:00', 1900, 'Address 2', 'Event description 2', 'Free', 'Limited spots available', 30, 1, 2, NULL, '', 0, 0),
(3, 'Event 3', '2023-05-20 00:00:00', 2000, 'Address 3', 'Event description 3', '15', 'Special group rates', 40, 0, 3, NULL, '', 0, 0),
(4, 'Event 4', '2023-06-01 00:00:00', 1700, 'Address 4', 'Event description 4', '25', 'Food and drinks included', 60, 0, 4, NULL, '', 0, 0),
(5, 'Event 5', '2023-06-05 00:00:00', 2100, 'Address 5', 'Event description 5', '30', 'VIP packages available', 80, 1, 5, NULL, '', 0, 0),
(6, 'Event 6', '2023-06-10 00:00:00', 1930, 'Address 6', 'Event description 6', '10', 'Student discount available', 70, 1, 6, NULL, '', 0, 0),
(7, 'Event 7', '2023-06-15 00:00:00', 1800, 'Address 7', 'Event description 7', '50', 'Exclusive access for members', 100, 0, 7, NULL, '', 0, 0),
(8, 'Event 8', '2023-06-20 00:00:00', 2000, 'Address 8', 'Event description 8', '40', 'Cocktail reception included', 90, 0, 8, NULL, '', 0, 0),
(9, 'Event 9', '2023-06-25 00:00:00', 1830, 'Address 9', 'Event description 9', 'Free', 'Limited seats available', 30, 1, 9, NULL, '', 0, 0),
(10, 'Event 10', '2023-07-01 00:00:00', 2100, 'Address 10', 'Event description 10', '60', 'Dinner and entertainment', 120, 0, 10, NULL, '', 0, 0),
(11, 'test', '2021-06-01 00:00:00', NULL, 'test', 'test', '10', ' ', 10, 1, 1, 1, '', 0, 0),
(12, 'test', '2021-06-01 00:00:00', NULL, 'test', 'test', '10', ' ', 10, 1, 1, 1, '', 0, 0),
(13, 'Final', '2021-12-13 00:00:00', NULL, '13 rue ', 'Final de test', '15', ' ', 2, 1, 1, 1, '', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `isaccepted`
--

CREATE TABLE `isaccepted` (
  `idUser` int NOT NULL,
  `idEvent` int NOT NULL,
  `isAccepted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `isaccepted`
--

INSERT INTO `isaccepted` (`idUser`, `idEvent`, `isAccepted`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 0),
(4, 4, 1),
(5, 5, 0),
(6, 6, 1),
(7, 7, 0),
(8, 8, 1),
(9, 9, 1),
(10, 10, 0);

-- --------------------------------------------------------

--
-- Structure de la table `isblocked`
--

CREATE TABLE `isblocked` (
  `idUser` int NOT NULL,
  `idUser_1` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `isblocked`
--

INSERT INTO `isblocked` (`idUser`, `idUser_1`) VALUES
(10, 1),
(5, 2),
(1, 4),
(6, 4),
(2, 6),
(7, 6),
(3, 8),
(8, 8),
(4, 10),
(9, 10);

-- --------------------------------------------------------

--
-- Structure de la table `iscategory`
--

CREATE TABLE `iscategory` (
  `idEvent` int NOT NULL,
  `idCategory` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `iscategory`
--

INSERT INTO `iscategory` (`idEvent`, `idCategory`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `isenjoyed`
--

CREATE TABLE `isenjoyed` (
  `idUser` int NOT NULL,
  `idCategory` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `isenjoyed`
--

INSERT INTO `isenjoyed` (`idUser`, `idCategory`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `isfriend`
--

CREATE TABLE `isfriend` (
  `idUser` int NOT NULL,
  `idUser_1` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `isfriend`
--

INSERT INTO `isfriend` (`idUser`, `idUser_1`) VALUES
(10, 1),
(1, 2),
(2, 3),
(3, 4),
(4, 5),
(5, 6),
(6, 7),
(7, 8),
(8, 9),
(9, 10);

-- --------------------------------------------------------

--
-- Structure de la table `isliked`
--

CREATE TABLE `isliked` (
  `idUser` int NOT NULL,
  `idEvent` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `isliked`
--

INSERT INTO `isliked` (`idUser`, `idEvent`) VALUES
(10, 1),
(1, 2),
(2, 3),
(3, 4),
(4, 5),
(5, 6),
(6, 7),
(7, 8),
(8, 9),
(9, 10);

-- --------------------------------------------------------

--
-- Structure de la table `isreported`
--

CREATE TABLE `isreported` (
  `idUser` int NOT NULL,
  `idUser_1` int NOT NULL,
  `reportDate` varchar(50) DEFAULT NULL,
  `reportMessage` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `isreported`
--

INSERT INTO `isreported` (`idUser`, `idUser_1`, `reportDate`, `reportMessage`) VALUES
(1, 3, '2023-12-21', 'Comportement inapproprié'),
(2, 5, '2023-12-21', 'Propos offensants'),
(3, 7, '2023-12-21', 'Contenu inapproprié'),
(4, 9, '2023-12-21', 'Harcèlement'),
(5, 1, '2023-12-21', 'Spam'),
(6, 3, '2023-12-21', 'Fake account'),
(7, 5, '2023-12-21', 'Discours de haine'),
(8, 7, '2023-12-21', 'Informations trompeuses'),
(9, 9, '2023-12-21', 'Impersonification'),
(10, 1, '2023-12-21', 'Violation des droits d\'auteur');

-- --------------------------------------------------------

--
-- Structure de la table `isrepresented`
--

CREATE TABLE `isrepresented` (
  `idCategory` int NOT NULL,
  `idPicture` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `isrepresented`
--

INSERT INTO `isrepresented` (`idCategory`, `idPicture`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE `pictures` (
  `idPicture` int NOT NULL,
  `pictureUrl` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`idPicture`, `pictureUrl`) VALUES
(1, 'https://example.com/picture1.jpg'),
(2, 'https://example.com/picture2.jpg'),
(3, 'https://example.com/picture3.jpg'),
(4, 'https://example.com/picture4.jpg'),
(5, 'https://example.com/picture5.jpg'),
(6, 'https://example.com/picture6.jpg'),
(7, 'https://example.com/picture7.jpg'),
(8, 'https://example.com/picture8.jpg'),
(9, 'https://example.com/picture9.jpg'),
(10, 'https://example.com/picture10.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int NOT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `scoreCreation` varchar(50) DEFAULT NULL,
  `scoreParticipation` varchar(50) DEFAULT NULL,
  `isBan` tinyint(1) DEFAULT NULL,
  `lastActivity` date DEFAULT NULL,
  `nbReported` int DEFAULT NULL,
  `showFutureEvnts` tinyint(1) DEFAULT NULL,
  `showPastEvnts` tinyint(1) DEFAULT NULL,
  `showEvntScores` tinyint(1) DEFAULT NULL,
  `coverPicture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `lastName`, `firstName`, `description`, `picture`, `mail`, `password`, `scoreCreation`, `scoreParticipation`, `isBan`, `lastActivity`, `nbReported`, `showFutureEvnts`, `showPastEvnts`, `showEvntScores`, `coverPicture`) VALUES
(1, 'Doe', 'John', 'Description 1', 'picture1.jpg', 'john.doe@email.com', 'password1', '50', '30', 0, '2023-05-01', 0, NULL, NULL, NULL, NULL),
(2, 'Smith', 'Alice', 'Description 2', 'picture2.jpg', 'alice.smith@email.com', 'password2', '40', '20', 0, '2023-05-02', 2, NULL, NULL, NULL, NULL),
(3, 'Johnson', 'Emma', 'Description 3', 'picture3.jpg', 'emma.johnson@email.com', 'password3', '60', '40', 0, '2023-05-03', 1, NULL, NULL, NULL, NULL),
(4, 'Brown', 'Daniel', 'Description 4', 'picture4.jpg', 'daniel.brown@email.com', 'password4', '55', '35', 0, '2023-05-04', 3, NULL, NULL, NULL, NULL),
(5, 'Miller', 'Sophie', 'Description 5', 'picture5.jpg', 'sophie.miller@email.com', 'password5', '70', '45', 0, '2023-05-05', 2, NULL, NULL, NULL, NULL),
(6, 'Wilson', 'James', 'Description 6', 'picture6.jpg', 'james.wilson@email.com', 'password6', '75', '50', 0, '2023-05-06', 0, NULL, NULL, NULL, NULL),
(7, 'Anderson', 'Olivia', 'Description 7', 'picture7.jpg', 'olivia.anderson@email.com', 'password7', '65', '42', 0, '2023-05-07', 1, NULL, NULL, NULL, NULL),
(8, 'Moore', 'Ethan', 'Description 8', 'picture8.jpg', 'ethan.moore@email.com', 'password8', '80', '55', 0, '2023-05-08', 2, NULL, NULL, NULL, NULL),
(9, 'Taylor', 'Ava', 'Description 9', 'picture9.jpg', 'ava.taylor@email.com', 'password9', '55', '30', 0, '2023-05-09', 1, NULL, NULL, NULL, NULL),
(10, 'Walker', 'Liam', 'Description 10', 'picture10.jpg', 'liam.walker@email.com', 'password10', '90', '70', 0, '2023-05-10', 4, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCategory`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`idEvent`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `isaccepted`
--
ALTER TABLE `isaccepted`
  ADD PRIMARY KEY (`idUser`,`idEvent`),
  ADD KEY `idEvent` (`idEvent`);

--
-- Index pour la table `isblocked`
--
ALTER TABLE `isblocked`
  ADD PRIMARY KEY (`idUser`,`idUser_1`),
  ADD KEY `idUser_1` (`idUser_1`);

--
-- Index pour la table `iscategory`
--
ALTER TABLE `iscategory`
  ADD PRIMARY KEY (`idEvent`,`idCategory`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Index pour la table `isenjoyed`
--
ALTER TABLE `isenjoyed`
  ADD PRIMARY KEY (`idUser`,`idCategory`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Index pour la table `isfriend`
--
ALTER TABLE `isfriend`
  ADD PRIMARY KEY (`idUser`,`idUser_1`),
  ADD KEY `idUser_1` (`idUser_1`);

--
-- Index pour la table `isliked`
--
ALTER TABLE `isliked`
  ADD PRIMARY KEY (`idUser`,`idEvent`),
  ADD KEY `idEvent` (`idEvent`);

--
-- Index pour la table `isreported`
--
ALTER TABLE `isreported`
  ADD PRIMARY KEY (`idUser`,`idUser_1`),
  ADD KEY `idUser_1` (`idUser_1`);

--
-- Index pour la table `isrepresented`
--
ALTER TABLE `isrepresented`
  ADD PRIMARY KEY (`idCategory`,`idPicture`),
  ADD KEY `idPicture` (`idPicture`);

--
-- Index pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`idPicture`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategory` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `idEvent` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `idPicture` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `isaccepted`
--
ALTER TABLE `isaccepted`
  ADD CONSTRAINT `isaccepted_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `isaccepted_ibfk_2` FOREIGN KEY (`idEvent`) REFERENCES `events` (`idEvent`);

--
-- Contraintes pour la table `isblocked`
--
ALTER TABLE `isblocked`
  ADD CONSTRAINT `isblocked_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `isblocked_ibfk_2` FOREIGN KEY (`idUser_1`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `iscategory`
--
ALTER TABLE `iscategory`
  ADD CONSTRAINT `iscategory_ibfk_1` FOREIGN KEY (`idEvent`) REFERENCES `events` (`idEvent`),
  ADD CONSTRAINT `iscategory_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `categories` (`idCategory`);

--
-- Contraintes pour la table `isenjoyed`
--
ALTER TABLE `isenjoyed`
  ADD CONSTRAINT `isenjoyed_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `isenjoyed_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `categories` (`idCategory`);

--
-- Contraintes pour la table `isfriend`
--
ALTER TABLE `isfriend`
  ADD CONSTRAINT `isfriend_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `isfriend_ibfk_2` FOREIGN KEY (`idUser_1`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `isliked`
--
ALTER TABLE `isliked`
  ADD CONSTRAINT `isliked_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `isliked_ibfk_2` FOREIGN KEY (`idEvent`) REFERENCES `events` (`idEvent`);

--
-- Contraintes pour la table `isreported`
--
ALTER TABLE `isreported`
  ADD CONSTRAINT `isreported_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `isreported_ibfk_2` FOREIGN KEY (`idUser_1`) REFERENCES `users` (`idUser`);

--
-- Contraintes pour la table `isrepresented`
--
ALTER TABLE `isrepresented`
  ADD CONSTRAINT `isrepresented_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `categories` (`idCategory`),
  ADD CONSTRAINT `isrepresented_ibfk_2` FOREIGN KEY (`idPicture`) REFERENCES `pictures` (`idPicture`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
