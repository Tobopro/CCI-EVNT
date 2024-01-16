-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 16 jan. 2024 à 08:57
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
  `dateEvnt` varchar(255) DEFAULT NULL,
  `timeEvnt` int DEFAULT NULL,
  `adress` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `priceInfo` varchar(50) DEFAULT NULL,
  `nbParticipants` int DEFAULT NULL,
  `idUser` int NOT NULL,
  `idCategory` int DEFAULT NULL,
  `urlImage` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nbLike` int NOT NULL DEFAULT '0',
  `nbReport` int NOT NULL DEFAULT '0',
  `isFreeEntry` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`idEvent`, `title`, `dateEvnt`, `timeEvnt`, `adress`, `description`, `price`, `priceInfo`, `nbParticipants`, `idUser`, `idCategory`, `urlImage`, `nbLike`, `nbReport`, `isFreeEntry`) VALUES
(4, 'Event 4', '2023-06-01 00:00:00', 1700, 'Address 4', 'Event description 4', 25, 'Food and drinks included', 60, 4, NULL, '', 0, 0, 0),
(6, 'Event 6', '2023-06-10 00:00:00', 1930, 'Address 6', 'Event description 6', 10, 'Student discount available', 70, 6, NULL, '', 0, 0, 0),
(7, 'Event 7', '2023-06-15 00:00:00', 1800, 'Address 7', 'Event description 7', 50, 'Exclusive access for members', 100, 7, NULL, '', 0, 0, 0),
(8, 'Event 8', '2023-06-20 00:00:00', 2000, 'Address 8', 'Event description 8', 40, 'Cocktail reception included', 90, 8, NULL, '', 0, 0, 0),
(10, 'Event 10', '2023-07-01 00:00:00', 2100, 'Address 10', 'Event description 10', 60, 'Dinner and entertainment', 120, 10, NULL, '', 0, 0, 0),
(11, 'test', '2021-06-01 00:00:00', NULL, 'test', 'test', 10, ' ', 10, 1, 1, '', 0, 0, 0),
(14, 'Un evnt de la night', '2020-02-12', NULL, '13 rue du cambodge', 'Un evnt du feu de dieu', 15, ' ', 2, 1, 1, '', 0, 0, 0),
(15, 'Un evnt de la night', '2020-02-12', NULL, '13 rue du cambodge', 'Un evnt du feu de dieu', 15, ' ', 2, 1, 1, '', 0, 0, 0),
(16, 'Un evnt de la night', '2050-05-12', NULL, '25', '2545', 25, ' ', 55, 1, 1, '', 0, 0, 0),
(17, 'Un evnt de la night', '2050-05-12', NULL, '25', '2545', 25, ' ', 55, 1, 1, '', 0, 0, 0),
(19, 'hqfghdfqhdfq', '275760-04-05', NULL, '535434', '543543', 65, ' ', 654654, 1, 5, '', 0, 0, 0),
(20, 'Une nuit de dingue', '2000-02-12', NULL, '13 rue de la gavaa', 'UIn truc de dingue', 15, ' ', 15, 1, 1, '', 0, 0, 1),
(21, 'test', '1555-12-15', NULL, 'test', 'test', 586, ' ', 2, 1, 4, '', 0, 0, 0),
(22, 'Une nuit de dinge', '2000-12-15', NULL, 'Test', 'test', 15, ' ', 2, 1, 3, '', 0, 0, 0),
(23, 'test', '2000-02-12', NULL, 'test', 'test', 15, ' ', 2, 1, 3, '', 0, 0, 1),
(24, 'fqezqaezfzg', '1511-06-15', NULL, 'z6', 'fgarfa', 2453243, ' ', 378378337, 1, 3, '', 0, 0, 1),
(27, 'Soirée au pub', '2000-02-12', NULL, '13 rue de l\'abysse', 'Un EVNT qui promet d\'être inoubliable', 13, ' ', 2, 1, 3, '', 0, 0, 0),
(28, 'Je refais un test', '2000-02-12', NULL, 'La rue de l\'abysse', 'Un EVNT qui promet d\'être inoubliable', 13, ' ', 2, 1, 7, '', 0, 0, 0);

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
  `title` varchar(255) NOT NULL,
  `pictureUrl` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`idPicture`, `title`, `pictureUrl`) VALUES
(1, 'Titre 1', 'https://example.com/picture1.jpg'),
(2, 'Titre 2', 'https://example.com/picture2.jpg'),
(3, 'Titre 3', 'https://example.com/picture3.jpg'),
(4, 'Titre 4', 'https://example.com/picture4.jpg'),
(5, 'Titre 5', 'https://example.com/picture5.jpg'),
(6, 'Titre 6', 'https://example.com/picture6.jpg'),
(7, 'Titre 7', 'https://example.com/picture7.jpg'),
(8, 'Titre 8', 'https://example.com/picture8.jpg'),
(9, 'Titre 9', 'https://example.com/picture9.jpg'),
(10, 'Titre 10', 'https://example.com/picture10.jpg');

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
  `city` varchar(50) NOT NULL DEFAULT 'Strasbourg',
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `scoreCreation` varchar(50) DEFAULT NULL,
  `scoreParticipation` varchar(50) DEFAULT NULL,
  `isBan` tinyint(1) DEFAULT NULL,
  `lastActivity` date DEFAULT NULL,
  `nbReported` int DEFAULT NULL,
  `isPublic` tinyint(1) DEFAULT '1',
  `showFutureEvnts` tinyint(1) DEFAULT '1',
  `showPastEvnts` tinyint(1) DEFAULT '1',
  `showEvntScores` tinyint(1) DEFAULT '1',
  `coverPicture` int DEFAULT NULL,
  `role` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `lastName`, `firstName`, `description`, `picture`, `mail`, `city`, `password`, `scoreCreation`, `scoreParticipation`, `isBan`, `lastActivity`, `nbReported`, `isPublic`, `showFutureEvnts`, `showPastEvnts`, `showEvntScores`, `coverPicture`, `role`) VALUES
(3, 'Johnson', 'Robert', 'Marketing Specialist', 'robert_johnson.jpg', 'robert.j@example.com', 'Strasbourg', 'pass123', '80', '150', 0, '2024-01-09', 1, 1, 0, 1, 3, NULL, 'user'),
(6, 'Anderson', 'Sophia', 'Software Engineer', 'sophia_anderson.jpg', 'sophia.a@example.com', 'Strasbourg', 'myp@ss', '160', '210', 0, '2024-01-11', 0, 1, 1, 1, 6, NULL, 'user'),
(7, 'Clark', 'Matthew', 'Content Writer', 'matthew_clark.jpg', 'matthew.c@example.com', 'Strasbourg', 'secure123', '140', '170', 0, '2024-01-10', 1, 1, 0, 0, 7, NULL, 'user'),
(8, 'White', 'Olivia', 'SEO Specialist', 'olivia_white.jpg', 'olivia.w@example.com', 'Strasbourg', 'password789', '190', '200', 1, '2024-01-12', 0, 1, 1, 1, 8, NULL, 'user'),
(10, 'Hall', 'Ava', 'Event Planner', 'ava_hall.jpg', 'ava.h@example.com', 'Strasbourg', 'avapwd', '170', '180', 1, '2024-01-08', 0, 1, 1, 0, 10, NULL, 'user'),
(27, 'test', 'test', '', NULL, 'test@ho.fr', '', '123', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 6, 'user'),
(28, 'admin', 'admin', '', NULL, 'admin@admin.fr', '', '123', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 'admin');

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
  MODIFY `idEvent` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
