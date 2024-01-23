-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 23 jan. 2024 à 09:24
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
(1, 'Musique'),
(2, 'Sports'),
(3, 'Alimentation et Boissons'),
(4, 'Technologie'),
(5, 'Santé et Bien-être'),
(6, 'Arts et Culture'),
(7, 'Science'),
(8, 'Social'),
(9, 'Éducation'),
(10, 'Affaires');

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
  `nbParticipants` int DEFAULT '1',
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
(1, 'Concert rock', '01/03/2024', NULL, 'Salle de concert XYZ', 'Un concert rock électrisant', 25, NULL, 10, 29, 4, '', 0, 0, 0),
(2, 'Exposition artistique', '05/04/2024', NULL, 'Galerie d\'art moderne', 'Découvrez des œuvres artistiques uniques', 15, NULL, 6, 31, 6, '', 0, 0, 0),
(3, 'Conférence sur la science', '10/05/2024', NULL, 'Amphithéâtre universitaire', 'Une conférence passionnante sur les avancées scientifiques', 10, NULL, 4, 32, 7, '', 0, 0, 0),
(4, 'Soirée costumée', '15/06/2024', NULL, 'Château hanté', 'Une soirée déguisée dans un château mystérieux', 20, NULL, 8, 34, 2, '', 0, 0, 1),
(5, 'Festival de cinéma', '20/07/2024', NULL, 'Cinéma Paradiso', 'Projection de films primés et rencontres avec des réalisateurs', 30, NULL, 15, 35, 8, '', 0, 0, 0),
(6, 'Tournoi de jeux vidéo', '25/08/2024', NULL, 'Centre de conventions', 'Compétition intense entre les meilleurs joueurs de jeux vidéo', 15, NULL, 12, 29, 9, '', 0, 0, 0),
(7, 'Atelier de cuisine', '01/09/2024', NULL, 'École de cuisine gourmet', 'Apprenez à préparer des plats délicieux avec des chefs renommés', 40, NULL, 8, 31, 10, '', 0, 0, 0),
(8, 'Bal masqué', '10/10/2024', NULL, 'Salle de bal élégante', 'Dansez toute la nuit dans un bal masqué glamour', 50, NULL, 7, 32, 2, '', 0, 0, 0),
(9, 'Tournoi de basketball', '15/11/2024', NULL, 'Stade municipal', 'Des équipes s\'affrontent dans un tournoi de basketball épique', 10, NULL, 8, 34, 8, '', 0, 0, 0),
(10, 'Journée environnementale', '20/12/2024', NULL, 'Parc écologique', 'Participez à des activités éco-responsables pour protéger l\'environnement', 5, NULL, 9, 35, 9, '', 0, 0, 1),
(11, 'Jeux de sociétés au CCI Campus', '2024-02-12', NULL, '5 rue de soultz', 'Retrouvons nous autour d\'un bon jeu de plateau', 13, ' ', 2, 29, 8, '', 0, 0, 1);

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
(2, 2, 1),
(3, 3, 0),
(4, 4, 1),
(5, 5, 0),
(6, 6, 1),
(7, 7, 0),
(8, 8, 1),
(9, 9, 1),
(10, 10, 0),
(29, 4, 1),
(29, 6, 1),
(29, 11, 1),
(29, 28, 1),
(29, 34, 1);

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
(29, 1),
(1, 2),
(2, 3),
(3, 4),
(4, 5),
(5, 6),
(6, 7),
(7, 8),
(8, 9),
(9, 10),
(29, 14),
(35, 29),
(29, 30),
(35, 30),
(29, 34);

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
  `picture` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'assets/img/profile-pictures/profiledefault.jpg',
  `mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
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
  `coverPicture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'assets/img/profile-pictures/cover-pictures/coverdefault.jpg',
  `role` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `lastName`, `firstName`, `description`, `picture`, `mail`, `city`, `password`, `scoreCreation`, `scoreParticipation`, `isBan`, `lastActivity`, `nbReported`, `isPublic`, `showFutureEvnts`, `showPastEvnts`, `showEvntScores`, `coverPicture`, `role`) VALUES
(29, 'Boyer', 'Tom', '', 'assets/img/profile-pictures/profile2.jpg', 't@b.fr', '', '$2y$10$bP1bGU8bzeGzHXoEVSp99em2hmVXJQvkkkyyaqfaWlUeXTt7sBBhS', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'assets/img/profile-pictures/cover-pictures/cover2.jpg', 'admin'),
(31, 'Dupont', 'Gerard', '', 'assets/img/profile-pictures/profiledefault.jpg', 'g@h.fr', '', '$2y$10$cvsF3e5.Xhzt8tGM38tW3./c6vW4.2jVGZTzR/C52F1V2inwoBgri', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 'assets/img/profile-pictures/cover-pictures/cover1.jpg', 'user'),
(32, 'Kirchhoffer', 'Nicolas', '', 'assets/img/profile-pictures/profile5.png', 'n@k.fr', '', '$2y$10$cTAjQkZe9G.wIUeTdYVifucqqqwRMOB.pZE/JzWmNgdKQ0akRm5ru', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 'assets/img/profile-pictures/cover-pictures/coverdefault.jpg', 'user'),
(34, 'Doe', 'Test', '', 'assets/img/profile-pictures/profiledefault.jpg', 't@t.fr', '', '$2y$10$SoQtbtKENefCR9wBdQOvAugqR0H1FBHreLAQkf8KSHkiIOZUzuqru', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 'assets/img/profile-pictures/cover-pictures/coverdefault.jpg', 'user'),
(35, 'Gandine', 'Goure', 'Un chouette personnage', 'assets/img/profile-pictures/profiledefault.jpg', 'g@d.fr', '', '$2y$10$5SbuKVwZiBAntZHV0C/IduVnU0H75fMQglLvuamEswPgBwQpovIPy', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 'assets/img/profile-pictures/cover-pictures/coverdefault.jpg', 'user');

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
  MODIFY `idEvent` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
